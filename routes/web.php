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

/*Route::get('/', function () {
    return view('coming_soon');
});*/

Route::group([
    'prefix' => 'admin'
], function ($router) {
    Auth::routes();
});

Route::get('/', 'WebController@index');
Route::get('search', 'WebController@search')->name('web.search');
Route::get('submit', 'WebController@submit')->name('web.submit');
Route::post('submit', 'WebController@store')->name('web.store');
Route::post('subscribe', 'WebController@subscribe')->name('web.subscribe');
Route::get('subscribed', 'WebController@subscribed')->name('web.subscribed');
Route::get('level/{name}', 'WebController@level')->name('web.level');
Route::get('cities/autocomplete', 'CityController@autocomplete')->name('cities.autocomplete');
Route::get('tentang', 'WebController@tentang')->name('web.tentang');
Route::get('contact', 'WebController@contact')->name('web.contact');

// Keep below route at bottom
Route::get('{slug_sekolah}', 'WebController@detail')->name('web.detail');

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
    Route::get('schools/{id}/verify', 'SchoolController@verify')->name('schools.verify')->where('id', '[0-9]+');
    Route::get('schools/{id}/publish', 'SchoolController@publish')->name('schools.publish')->where('id', '[0-9]+');
    Route::get('schools/{id}/unpublish', 'SchoolController@unpublish')->name('schools.unpublish')->where('id', '[0-9]+');
    Route::get('schools/{id}/make_choice', 'SchoolController@make_choice')->name('schools.make_choice')->where('id', '[0-9]+');
    Route::get('schools/{id}/remove_from_choice', 'SchoolController@remove_from_choice')->name('schools.remove_from_choice')->where('id', '[0-9]+');
    Route::get('cities/cleaning', 'CityController@cleaning')->name('cities.cleaning');
    Route::get('schools/editor_choice', 'SchoolController@editor_choice')->name('schools.editor_choice');
    Route::get('provinces/cities', 'ProvinceController@getCities')->name('provinces.cities');
    Route::get('reports/cities', 'ReportController@byCity')->name('reports.cities');

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
