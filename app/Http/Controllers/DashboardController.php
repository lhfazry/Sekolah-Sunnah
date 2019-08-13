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

        $schools = \App\Models\School::orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        return view('dashboard.index', compact('schools', 'all_schools', 'verified_schools', 'unverified_schools', 'published_schools'));
    }
}
