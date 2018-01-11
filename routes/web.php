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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('logout', '\Thd\Http\Controllers\Auth\LoginController@logout');

Route::prefix('admin-thd')->group(function(){
    Route::middleware(['auth', 'role:owner|admin|manager'])->group(function(){
        Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
        Route::resource('house-plan', 'Admin\HousePlansController');
    });
    Route::middleware(['auth', 'role:owner|admin'])->group(function(){
        Route::resource('styles', 'Admin\StyleController', ['except'=>['show']]);
        Route::get('styles/data', 'Admin\StyleController@anyData')->name('styles.data');

        Route::resource('collections', 'Admin\CollectionController', ['except'=>['show']]);
        Route::get('collections/data', 'Admin\CollectionController@anyData')->name('collections.data');
    });
});