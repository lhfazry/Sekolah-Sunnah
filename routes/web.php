<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('coming_soon');
});

Route::group([
    'prefix' => 'admin'
], function ($router) {
    Auth::routes();
});

Route::get('landing', 'WebController@index');

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth'
], function ($router) {
    //Auth::routes();
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });
    Route::get('home', function () {
        return redirect('/admin/dashboard');
    });


    //Route::post('schools\{id}\media', 'SchoolController@storeMedia')->name('schools.media')->where('id', '[0-9]+');Route::post('schools\{id}\media', 'SchoolController@storeMedia')->name('schools.media')->where('id', '[0-9]+');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('cities/autocomplete', 'CityController@autocomplete')->name('cities.autocomplete');
    Route::get('schools/{id}/verify', 'SchoolController@verify')->name('schools.verify');
    Route::get('schools/{id}/publish', 'SchoolController@publish')->name('schools.publish');
    Route::get('schools/{id}/unpublish', 'SchoolController@unpublish')->name('schools.unpublish');
    Route::get('cities/cleaning', 'CityController@cleaning')->name('cities.cleaning');

    Route::resource('provinces', 'ProvinceController');
    Route::resource('cities', 'CityController');
    Route::resource('schools', 'SchoolController');
    Route::resource('facilities', 'FacilityController');
    Route::resource('schoolFacilities', 'SchoolFacilityController');
    Route::resource('levels', 'LevelController');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');

    Route::get('verified_schools', 'SchoolController@verified')->name('schools.verified');
    Route::get('unverified_schools', 'SchoolController@unverified')->name('schools.unverified');
    Route::post('media', 'MediaController@storeMedia')->name('media.store');
});
