<?php

use Illuminate\Support\Facades\Route;

Route::group (['namespace' => 'App\Http\Controllers\User'], function() {
    Route::get('/', 'ReservationController@index')->name('main');
    Route::get('/account', 'AccountController@index')->name('account');
    Route::get('/about', 'AboutController@index')->name('about');
    Route::get('/service/{service}', 'ServiceController@service')->name('service');
    Route::get('/news', 'NewController@index')->name('news');
    Route::post('/', 'ReservedServiceController@store')->name('reservedservice');
});
Route::get('/contacts', function () {
    return view('user/contacts');
})->name('contacts');

Route::get('/forsalons', function () {
    return view('user/forsalons');
})->name('forsalons');


Route::group (['namespace' => 'App\Http\Controllers\Admin'], function() {
    Route::resource('admin/service', 'ServiceController');
    Route::resource('admin/user', 'UserController');
    Route::resource('admin/admin', 'AdminController');
    Route::resource('admin/reservation', 'ReservationController');
    Route::resource('admin/new', 'NewController');
    Route::resource('admin/role', 'RoleController');
    Route::resource('admin/place', 'PlaceController');
    Route::resource('admin/reservedservice', 'ReservedServiceController');
    Route::get('/admin/home', 'HomeController@index')->name('adminhome');
    Route::get('admin-login','Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
