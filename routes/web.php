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

        Route::get('plan-info/create/{id}', 'Admin\PlanInformationController@create')->where('id', '[0-9]+')->name('plan-info.create');
        Route::post('plan-info/store/{id}', 'Admin\PlanInformationController@store')->where('id', '[0-9]+')->name('plan-info.store');

        Route::get('plan-images/create/{plan}', 'Admin\PlanImageController@create')->where('plan', '[0-9]+')->name('plan-images.create');
        Route::post('plan-images/{plan}', 'Admin\PlanImageController@store')->where('id', '[0-9]+')->name('plan-images.store');
        Route::get('plan-images/{image}/edit', 'Admin\PlanImageController@edit')->where('image', '[0-9]+')->name('plan-images.edit');
        Route::put('plan-images/{image}', 'Admin\PlanImageController@update')->where('image', '[0-9]+')->name('plan-images.update');
        Route::delete('plan-images/{image}', 'Admin\PlanImageController@destroy')->where('image', '[0-9]+')->name('plan-images.destroy');
        Route::post('plan-images-sotr/{id}', 'Admin\PlanImageController@sort')->where('id', '[0-9]+')->name('plan-images.sort');

        Route::get('plan-packages/create/{plan}', 'Admin\PlanPackageController@create')->where('plan', '[0-9]+')->name('plan-packages.create');
        Route::post('plan-packages/store/{plan}', 'Admin\PlanInformationController@store')->where('id', '[0-9]+')->name('plan-packages.store');

        Route::get('plan-features/create/{id}', 'Admin\PlanFeaturesController@create')->where('id', '[0-9]+')->name('plan-features.create');

    });
    Route::middleware(['auth', 'role:owner|admin'])->group(function(){
        Route::resource('styles', 'Admin\StyleController', ['except'=>['show']]);
        Route::get('styles/data', 'Admin\StyleController@anyData')->name('styles.data');

        Route::resource('collections', 'Admin\CollectionController', ['except'=>['show']]);
        Route::get('collections/data', 'Admin\CollectionController@anyData')->name('collections.data');

        Route::resource('packages', 'Admin\PackageController', ['except'=>['show']]);
        Route::get('packages/data', 'Admin\PackageController@anyData')->name('packages.data');

        Route::resource('foundation-options', 'Admin\FoundationOptionController', ['except'=>['show']]);
        Route::get('foundation-options/data', 'Admin\FoundationOptionController@anyData')->name('foundation-options.data');

        Route::resource('addons', 'Admin\AddonsController', ['except'=>['show']]);
        Route::get('addons/data', 'Admin\AddonsController@anyData')->name('addons.data');

        Route::resource('gallery', 'Admin\GalleryController', ['except'=>['show']]);
        Route::get('gallery/data', 'Admin\GalleryController@anyData')->name('gallery.data');

        Route::get('about-david/edit', 'Admin\AboutDavidController@edit')->name('about-david.edit');
        Route::post('about-david/update', 'Admin\AboutDavidController@update')->name('about-david.update');
    });
});