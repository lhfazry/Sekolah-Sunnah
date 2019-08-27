<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
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
        $all_schools = \App\Models\School::count();
        $verified_schools = \App\Models\School::whereNotNull('verified_at')->count();
        $unverified_schools = \App\Models\School::whereNull('verified_at')->count();
        $published_schools = \App\Models\School::where('status', 'Published')->count();
        $most_cities = \App\Models\School::selectRaw("cities.name as city, provinces.name as province, COUNT(*) total")
            ->join('cities', 'city_id', '=', 'cities.id')
            ->join('provinces', 'province_id', '=', 'provinces.id')
            ->groupBy('city_id')
            ->get();

        $schools = \App\Models\School::orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        return view('dashboard.index', compact('schools', 'all_schools', 'most_cities', 'verified_schools', 'unverified_schools', 'published_schools'));
    }
}
