<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;

class WebController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = \App\Models\Facility::all();
        $editor_choices = \App\Models\School::orderBy('created_at', 'desc')->where('editor_choice', true)->take(4)->get();
        $latest_schools = \App\Models\School::orderBy('created_at', 'desc')->take(8)->get();
        $levels = \App\Models\Level::orderBy('sequence')->get();

        return view('web.index', compact('facilities', 'editor_choices', 'latest_schools', 'levels'));
    }

    public function search() {
        $keyword = Input::get('keyword');
        $city = Input::get('city');
        $facilities = Input::get('facilities');
        $min_price = Input::get('min_price');
        $max_price = Input::get('max_price');

        $schools = \App\Models\School::orderBy('created_at', 'desc');

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

    public function submit() {

    }
}
