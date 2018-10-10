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

        Route::resource('house-plan', 'Admin\HousePlansController', ['except'=>['show']]);
        Route::get('house-plan/data', 'Admin\HousePlansController@anyData')->name('house-plan.data');
        Route::get('house-plan/getid/{str}', 'Admin\HousePlansController@getPlanID')->name('getPlanID');

        Route::get('plan-info/create/{id}', 'Admin\PlanInformationController@create')->where('id', '[0-9]+')->name('plan-info.create');
        Route::post('plan-info/store/{id}', 'Admin\PlanInformationController@store')->where('id', '[0-9]+')->name('plan-info.store');

        Route::get('plan-images/create/{plan}', 'Admin\PlanImageController@create')->where('plan', '[0-9]+')->name('plan-images.create');
        Route::post('plan-images/{plan}', 'Admin\PlanImageController@store')->where('id', '[0-9]+')->name('plan-images.store');
        Route::get('plan-images/{image}/edit', 'Admin\PlanImageController@edit')->where('image', '[0-9]+')->name('plan-images.edit');
        Route::put('plan-images/{image}', 'Admin\PlanImageController@update')->where('image', '[0-9]+')->name('plan-images.update');
        Route::delete('plan-images/{image}', 'Admin\PlanImageController@destroy')->where('image', '[0-9]+')->name('plan-images.destroy');
        Route::post('plan-images-sotr/{id}', 'Admin\PlanImageController@sort')->where('id', '[0-9]+')->name('plan-images.sort');

        Route::post('plan-images-first/{plan}', 'Admin\PlanImagesFirstController@store')->where('id', '[0-9]+')->name('plan-images-first.store');
        Route::get('plan-images-first/{image}/edit', 'Admin\PlanImagesFirstController@edit')->where('image', '[0-9]+')->name('plan-images-first.edit');
        Route::put('plan-images-first/{image}', 'Admin\PlanImagesFirstController@update')->where('image', '[0-9]+')->name('plan-images-first.update');
        Route::delete('plan-images-first/{image}', 'Admin\PlanImagesFirstController@destroy')->where('image', '[0-9]+')->name('plan-images-first.destroy');
        Route::post('plan-images-first-sotr/{id}', 'Admin\PlanImagesFirstController@sort')->where('id', '[0-9]+')->name('plan-images-first.sort');

        Route::post('plan-images-second/{plan}', 'Admin\PlanImagesSecondController@store')->where('id', '[0-9]+')->name('plan-images-second.store');
        Route::get('plan-images-second/{image}/edit', 'Admin\PlanImagesSecondController@edit')->where('image', '[0-9]+')->name('plan-images-second.edit');
        Route::put('plan-images-second/{image}', 'Admin\PlanImagesSecondController@update')->where('image', '[0-9]+')->name('plan-images-second.update');
        Route::delete('plan-images-second/{image}', 'Admin\PlanImagesSecondController@destroy')->where('image', '[0-9]+')->name('plan-images-second.destroy');
        Route::post('plan-images-second-sotr/{id}', 'Admin\PlanImagesSecondController@sort')->where('id', '[0-9]+')->name('plan-images-second.sort');

        Route::post('plan-images-basement/{plan}', 'Admin\PlanImagesBasementController@store')->where('id', '[0-9]+')->name('plan-images-basement.store');
        Route::get('plan-images-basement/{image}/edit', 'Admin\PlanImagesBasementController@edit')->where('image', '[0-9]+')->name('plan-images-basement.edit');
        Route::put('plan-images-basement/{image}', 'Admin\PlanImagesBasementController@update')->where('image', '[0-9]+')->name('plan-images-basement.update');
        Route::delete('plan-images-basement/{image}', 'Admin\PlanImagesBasementController@destroy')->where('image', '[0-9]+')->name('plan-images-basement.destroy');
        Route::post('plan-images-basement-sotr/{id}', 'Admin\PlanImagesBasementController@sort')->where('id', '[0-9]+')->name('plan-images-basement.sort');

        Route::post('plan-images-bonus/{plan}', 'Admin\PlanImagesBonusController@store')->where('id', '[0-9]+')->name('plan-images-bonus.store');
        Route::get('plan-images-bonus/{image}/edit', 'Admin\PlanImagesBonusController@edit')->where('image', '[0-9]+')->name('plan-images-bonus.edit');
        Route::put('plan-images-bonus/{image}', 'Admin\PlanImagesBonusController@update')->where('image', '[0-9]+')->name('plan-images-bonus.update');
        Route::delete('plan-images-bonus/{image}', 'Admin\PlanImagesBonusController@destroy')->where('image', '[0-9]+')->name('plan-images-bonus.destroy');
        Route::post('plan-images-bonus-sotr/{id}', 'Admin\PlanImagesBonusController@sort')->where('id', '[0-9]+')->name('plan-images-bonus.sort');

        Route::get('plan-packages/edit/{plan}', 'Admin\PlanPackageController@edit')->where('plan', '[0-9]+')->name('plan-packages.edit');
        Route::post('plan-packages/update/{plan}', 'Admin\PlanPackageController@update')->where('id', '[0-9]+')->name('plan-packages.update');
        Route::post('plan-packages/file-upload/{plan}/{package}', 'Admin\PlanPackageController@upload')->name('plan-packages.upload');
        Route::delete('plan-packages/file-destroy/{plan}/{package}/{filename}', 'Admin\PlanPackageController@destroy')->name('plan-packages.destroy');
        Route::get('plan-packages/file-download/{plan}/{package}/{filename}', 'Admin\PlanPackageController@download')->name('plan-packages.download');

        Route::post('plan-foundation/file-upload/{plan}/{foundation}', 'Admin\PlanFoundationController@upload')->name('plan-foundation.upload');
        Route::delete('plan-foundation/file-destroy/{plan}/{foundation}/{filename}', 'Admin\PlanFoundationController@destroy')->name('plan-foundation.destroy');
        Route::get('plan-foundation/file-download/{plan}/{foundation}/{filename}', 'Admin\PlanFoundationController@download')->name('plan-foundation.download');

        Route::post('plan-addon/file-upload/{plan}/{addon}', 'Admin\PlanAddonController@upload')->name('plan-addon.upload');
        Route::delete('plan-addon/file-destroy/{plan}/{addon}/{filename}', 'Admin\PlanAddonController@destroy')->name('plan-addon.destroy');
        Route::get('plan-addon/file-download/{plan}/{addon}/{filename}', 'Admin\PlanAddonController@download')->name('plan-addon.download');

        Route::get('plan-features/edit/{plan}', 'Admin\PlanFeaturesController@edit')->where('plan', '[0-9]+')->name('plan-features.edit');
        Route::post('plan-features/update/{plan}', 'Admin\PlanFeaturesController@update')->where('plan', '[0-9]+')->name('plan-features.update');

        Route::get('plan-desc/edit/{plan}', 'Admin\PlanDescriptionController@edit')->where('plan', '[0-9]+')->name('plan-desc.edit');
        Route::post('plan-desc/update/{plan}', 'Admin\PlanDescriptionController@update')->where('plan', '[0-9]+')->name('plan-desc.update');

        Route::get('house-plan/publish/{plan}', 'Admin\HousePlansController@publish')->where('plan', '[0-9]+')->name('house-plan.publish');
        Route::get('house-plan/unpublish/{plan}', 'Admin\HousePlansController@unpublish')->where('plan', '[0-9]+')->name('house-plan.unpublish');

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

        Route::resource('user', 'Admin\UserController', ['except'=>['show']]);
        Route::get('user/data', 'Admin\UserController@anyData')->name('user.data');

        Route::post('admin-thd/get-state', 'Admin\DashboardController@getCountryState')->name('getCountryState');
    });
});

Route::get('search/', 'SearchController@index')->name('search');

Route::get('collection/{slug}', 'CollectionController@slug')->name('collection.slug');
Route::get('style/{slug}', 'StyleController@slug')->name('style.slug');

Route::get('collections/', 'CollectionController@all')->name('collections');
Route::get('styles/', 'StyleController@all')->name('styles');