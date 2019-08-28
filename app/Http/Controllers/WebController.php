<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateSchoolRequest;
use App\Repositories\SchoolRepository;
use Flash;
use Response;

class WebController extends AppBaseController
{
    private $schoolRepository;

    public function __construct(SchoolRepository $schoolRepo)
    {
        //$this->middleware('auth');
        $this->schoolRepository = $schoolRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = \App\Models\Facility::where('display', true)->get();
        $editor_choices = \App\Models\School::orderBy('created_at', 'desc')->where('status', 'Published')->where('editor_choice', true)->take(4)->get();
        $latest_schools = \App\Models\School::orderBy('created_at', 'desc')->where('status', 'Published')->take(8)->get();
        $levels = \App\Models\Level::orderBy('sequence')->get();

        $theCities = \App\Models\City::all();
        $cities = [];
        //$cities[] = ['id' => '', 'text' => 'Ketik nama Kota'];
        $cities[''] = 'Ketik nama Kota';

        foreach($theCities as $city) {
            //$cities[] = ['id' => $city->id, 'text' => $city->city_province()];
            $cities[$city->id] = $city->city_province();
        }

        return view('web.index', compact('facilities', 'editor_choices', 'latest_schools', 'levels', 'cities'));
    }

    public function search() {
        $keyword = Input::get('keyword');
        $city = Input::get('city');
        $facilities = Input::get('facilities');
        $min_price = Input::get('min_price');
        $max_price = Input::get('max_price');

        $schools = \App\Models\School::orderBy('created_at', 'desc')
            ->where('status', 'Published');

        if(!empty($keyword)) {
            $schools = $schools->where('nama_sekolah', 'LIKE', "%{$keyword}%");
        }

        if(!empty($city)) {
            $schools = $schools->where('city_id', $city);
        }

        if(isset($facilities)) {
            $schools->whereHas('facilities', function($query) use($facilities) {
                $query->whereIn('facility_id', $facilities);
            });
        }

        if(!empty($min_price)) {
            $schools = $schools->where('biaya_spp', '>=', $min_price);
        }

        if(!empty($max_price)) {
            $schools = $schools->where('biaya_spp', '<=', $min_price);
        }

        $schools = $schools->get();

        return view('web.search', compact('schools'));
    }

    public function level() {
        $id = Input::get('id');

        $schools = \App\Models\School::orderBy('created_at', 'desc')
            ->where('level_id', $id)
            ->where('status', 'Published');

        $schools = $schools->get();

        return view('web.level', compact('schools'));
    }

    public function submit() {
        //$provinces = $this->dropDown(\App\Models\Province::orderBy('name')->get(), 'name', 'id', 'Pilih Provinsi');
        $theCities = \App\Models\City::all();
        $levels = $this->dropDownWithoutNone(\App\Models\Level::orderBy('sequence')->get(), 'name', 'id');
        $facilities = \App\Models\Facility::all();
        $cities = [];

        foreach($theCities as $city) {
            $cities[$city->id] = $city->city_province();
        }

        return view('web.submit', compact('levels', 'facilities', 'cities'));
    }

    public function store(CreateSchoolRequest $request)
    {
        $input = $request->all();

        $school = $this->schoolRepository->create($input);

        for($i = 0; $i < 8; $i++){
            $school->{"brochure".($i+1)} = null;
            $school->{"photo".($i+1)} = null;
        }

        foreach ($request->input('brochures', []) as $k=>$brochure) {
            $school->{"brochure".($k+1)} = $brochure;
        }

        foreach ($request->input('photos', []) as $k=>$photo) {
            $school->{"photo".($k+1)} = $photo;
        }

        \App\Models\SchoolFacility::where('school_id', $school->id)->delete();

        foreach ($request->input('facilities', []) as $k=>$facility) {
            $schoolFacility = new \App\Models\SchoolFacility;
            $schoolFacility->school_id = $school->id;
            $schoolFacility->facility_id = $facility;
            $schoolFacility->save();
        }

        $school->save();

        Flash::success('Data sekolah berhasil ditambahkan.');

        return redirect(route('web.submit'));
    }

    public function subscribe() {
        $email = Input::get('email');

        $subsriber = new \App\Models\Subscriber;
        $subsriber->email = $email;
        $subsriber->save();

        return redirect(route('web.subscribed'));
    }

    public function subscribed() {
        return view('web.subscribed');
    }

}
