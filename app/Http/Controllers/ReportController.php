<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateSchoolRequest;
use App\Repositories\SchoolRepository;
use Flash;
use Response;

class ReportController extends AppBaseController
{
    private $schoolRepository;

    public function __construct(SchoolRepository $schoolRepo)
    {
        //$this->middleware('auth');
        $this->schoolRepository = $schoolRepo;
    }

    public function byCity() {
        $theCities = \App\Models\City::all();
        $cities = [];

        foreach($theCities as $city) {
            $cities[$city->id] = $city->city_province();
        }

        $city_id = Input::get('city_id');

        if(empty($city_id)) {
            $city_id = $theCities[0]->id;
        }

        $schools = \App\Models\School::where('city_id', $city_id)->get();

        return view('reports.cities', compact('city_id', 'cities', 'schools'));
    }

}
