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
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['roles', 'auth'], 'roles' => 'admin'], function (){
    Route::get('/admin/index', function () {
        // return 'ini halaman admin';
        return view('admin.index');
    });

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});

Route::group(['middleware' => ['roles', 'auth'], 'roles' => 'user'], function (){
    Route::get('/user/index', function () {
        return 'ini halaman user';
    });
});

//admin/dashboard/