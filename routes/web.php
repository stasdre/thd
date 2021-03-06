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

use Thd\Inspiration;
use Thd\Plan;
use Illuminate\Support\Facades\Auth;

Route::middleware(['promo'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
});

Auth::routes();
Route::get('logout', '\Thd\Http\Controllers\Auth\LoginController@logout');

Route::prefix('admin-dwhp')->group(function () {
    Route::middleware(['auth', 'role:owner|admin|manager'])->group(function () {
        Route::get('/', 'Admin\DashboardController@index')->name('dashboard');

        Route::resource('house-plan', 'Admin\HousePlansController', ['except' => ['show']]);
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

        Route::post('plan-images-car/{plan}', 'Admin\PlanImagesCarController@store')->where('id', '[0-9]+')->name('plan-images-car.store');
        Route::get('plan-images-car/{image}/edit', 'Admin\PlanImagesCarController@edit')->where('image', '[0-9]+')->name('plan-images-car.edit');
        Route::put('plan-images-car/{image}', 'Admin\PlanImagesCarController@update')->where('image', '[0-9]+')->name('plan-images-car.update');
        Route::delete('plan-images-car/{image}', 'Admin\PlanImagesCarController@destroy')->where('image', '[0-9]+')->name('plan-images-car.destroy');
        Route::post('plan-images-car-sotr/{id}', 'Admin\PlanImagesCarController@sort')->where('id', '[0-9]+')->name('plan-images-car.sort');

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

        Route::post('upload-image/', 'Admin\ImageController@upload')->name('image-upload');

        Route::get('orders', 'Admin\OrderController@index')->name('order.index');
        Route::get('orders/data', 'Admin\OrderController@anyData')->name('order.data');
        Route::get('orders/view/{order}', 'Admin\OrderController@view')->name('order.view');
    });
    Route::middleware(['auth', 'role:owner|admin'])->group(function () {
        Route::resource('styles', 'Admin\StyleController', ['except' => ['show']]);
        Route::get('styles/data', 'Admin\StyleController@anyData')->name('styles.data');
        Route::post('styles/store-data', 'Admin\StyleController@storeData')->name('styles.storeData');
        Route::get('styles/publish/{style}', 'Admin\StyleController@publish')->where('style', '[0-9]+')->name('style.publish');
        Route::get('styles/unpublish/{style}', 'Admin\StyleController@unpublish')->where('style', '[0-9]+')->name('style.unpublish');


        Route::resource('collections', 'Admin\CollectionController', ['except' => ['show']]);
        Route::get('collections/data', 'Admin\CollectionController@anyData')->name('collections.data');
        Route::post('collections/store-data', 'Admin\CollectionController@storeData')->name('collections.storeData');
        Route::get('collections/publish/{collection}', 'Admin\CollectionController@publish')->where('collection', '[0-9]+')->name('collection.publish');
        Route::get('collections/unpublish/{collection}', 'Admin\CollectionController@unpublish')->where('collection', '[0-9]+')->name('collection.unpublish');

        Route::resource('packages', 'Admin\PackageController', ['except' => ['show']]);
        Route::get('packages/data', 'Admin\PackageController@anyData')->name('packages.data');

        Route::resource('foundation-options', 'Admin\FoundationOptionController', ['except' => ['show']]);
        Route::get('foundation-options/data', 'Admin\FoundationOptionController@anyData')->name('foundation-options.data');

        Route::resource('addons', 'Admin\AddonsController', ['except' => ['show']]);
        Route::get('addons/data', 'Admin\AddonsController@anyData')->name('addons.data');

        Route::resource('gallery', 'Admin\GalleryController', ['except' => ['show']]);
        Route::get('gallery/data', 'Admin\GalleryController@anyData')->name('gallery.data');

        Route::get('about-david/edit', 'Admin\AboutDavidController@edit')->name('about-david.edit');
        Route::post('about-david/update', 'Admin\AboutDavidController@update')->name('about-david.update');

        Route::resource('user', 'Admin\UserController', ['except' => ['show']]);
        Route::get('user/data', 'Admin\UserController@anyData')->name('user.data');

        Route::post('admin-dwhp/get-state', 'Admin\DashboardController@getCountryState')->name('getCountryState');

        Route::get('home-page/desktop-dream', 'Admin\HomePageController@desktopDream')->name('home-page.desktop-dream');
        Route::post('home-page/desktop-dream', 'Admin\HomePageController@desktopDream')->name('home-page.desktop-dream.post');

        Route::get('home-page/desktop-best', 'Admin\HomePageController@desktopBest')->name('home-page.desktop-best');
        Route::post('home-page/desktop-best', 'Admin\HomePageController@desktopBest')->name('home-page.desktop-best.post');

        Route::get('home-page/desktop-favorite', 'Admin\HomePageController@desktopFavorite')->name('home-page.desktop-favorite');
        Route::post('home-page/desktop-favorite', 'Admin\HomePageController@desktopFavorite')->name('home-page.desktop-favorite.post');

        Route::get('home-page/mobile-dream', 'Admin\HomePageController@mobileDream')->name('home-page.mobile-dream');
        Route::post('home-page/mobile-dream', 'Admin\HomePageController@mobileDream')->name('home-page.mobile-dream.post');

        Route::resource('mobile-favorite', 'Admin\MobileFavoriteController', ['except' => ['show']]);
        Route::get('mobile-favorite/data', 'Admin\MobileFavoriteController@anyData')->name('mobile-favorite.data');

        Route::resource('mobile-new', 'Admin\MobileNewController', ['except' => ['show']]);
        Route::get('mobile-new/data', 'Admin\MobileNewController@anyData')->name('mobile-new.data');

        Route::get('home-page/mobile-best', 'Admin\HomePageController@mobileBest')->name('home-page.mobile-best');
        Route::post('home-page/mobile-best', 'Admin\HomePageController@mobileBest')->name('home-page.mobile-best.post');

        Route::resource('shipping', 'Admin\ShippingController', ['except' => ['show']]);
        Route::get('shipping/data', 'Admin\ShippingController@anyData')->name('shipping.data');

        Route::resource('promo', 'Admin\PromoController', ['except' => ['show']]);
        Route::get('promo/data', 'Admin\PromoController@anyData')->name('promo.data');

        Route::resource('mobile-gallery', 'Admin\MobileGalleryController', ['except' => ['show']]);
        Route::get('mobile-gallery/data', 'Admin\MobileGalleryController@anyData')->name('mobile-gallery.data');

        Route::resource('inspiration', 'Admin\InspirationController', ['except' => ['show']]);
        Route::get('inspiration/data', 'Admin\InspirationController@anyData')->name('inspiration.data');

        Route::resource('inspiration-slider', 'Admin\InspirationSliderController', ['except' => ['show']]);
        Route::get('inspiration-slider/data', 'Admin\InspirationSliderController@anyData')->name('inspiration-slider.data');

        Route::get('inspiration-blocks/edit', 'Admin\InspirationBlocksController@edit')->name('inspiration-blocks.edit');
        Route::post('inspiration-blocks/update', 'Admin\InspirationBlocksController@update')->name('inspiration-blocks.update');

        Route::resource('inspiration-products', 'Admin\InspirationProductsController', ['except' => ['show']]);
        Route::get('inspiration-products/data', 'Admin\InspirationProductsController@anyData')->name('inspiration-products.data');

        Route::get('plan-images-refactor', 'Admin\PlanImageController@refactor')->name('image-refactor');

        Route::resource('pages', 'Admin\PagesController', ['except' => ['show']]);
        Route::get('pages/data', 'Admin\PagesController@anyData')->name('pages.data');
        Route::get('pages/about', 'Admin\PagesController@about')->name('pages.about');
        Route::post('pages/about', 'Admin\PagesController@aboutStore')->name('pages.about-store');

        Route::resource('about-article', 'Admin\AboutArticleController', ['except' => ['show']]);
        Route::get('about-article/data', 'Admin\AboutArticleController@anyData')->name('about-article.data');
        Route::resource('footer-blocks', 'Admin\FooterBlockController', ['except' => ['show']]);

        Route::post('update-footer-block-name/{block}', 'Admin\FooterBlockController@update');

        Route::resource('footer-items', 'Admin\FooterItemController', ['except' => ['show', 'index']]);

        Route::resource('builders', 'Admin\BuildersController', ['except' => ['show']]);
        Route::get('builders/data', 'Admin\BuildersController@anyData')->name('builders.data');

        Route::resource('builders-preferred', 'Admin\BuiderPreferredController', ['except' => ['show']]);
        Route::get('builders-preferred/data', 'Admin\BuiderPreferredController@anyData')->name('builders-preferred.data');

        Route::get('builder-landing-blocks/edit', 'Admin\BuildersLandingBlocks@index')->name('builder-landing-blocks.edit');
        Route::post('builder-landing-blocks/update', 'Admin\BuildersLandingBlocks@update')->name('builder-landing-blocks.update');

        Route::get('sitemap', function () {

            $aspsData = DB::table('asps')->orderBy('id', 'asc')->get();

            // create new sitemap general
            $sitemap_general = App::make("sitemap");

            $dataHome = DB::table('about_david')->first();
            $sitemap_general->add(route('home'), $dataHome->updated_at, '1.0', 'weekly');

            $dataAbout = DB::table('special_pages')->where('id', 1)->first();
            $sitemap_general->add(route('about-us'), $dataAbout->updated_at, '1.0', 'weekly');

            $sitemap_general->add(route('contact-us'), '2020-02-11 00:00:00', '1.0', 'monthly');
            $sitemap_general->add(route('advanced-search'), '2020-02-11 00:00:00', '1.0', 'weekly');
            $sitemap_general->store('xml', 'sitemap-general');

            // create new sitemap collections
            $sitemap_collections = App::make("sitemap");
            $collections = DB::table('collections')->where('is_active', 1)->orderBy('created_at', 'desc')->get();
            $sitemap_collections->add(route('collections'), $aspsData[0]->updated_at, '1.0', 'weekly');
            foreach ($collections as $item) {
                $sitemap_collections->add(route('collection.slug', $item->slug), $item->updated_at, '1.0', 'weekly');
            }
            $sitemap_collections->store('xml', 'sitemap-collections');

            // create new sitemap styles
            $sitemap_styles = App::make("sitemap");
            $styles = DB::table('styles')->where('is_active', 1)->orderBy('created_at', 'desc')->get();
            $sitemap_styles->add(route('styles'), $aspsData[1]->updated_at, '1.0', 'weekly');
            foreach ($styles as $item) {
                $sitemap_styles->add(route('style.slug', $item->slug), $item->updated_at, '1.0', 'weekly');
            }
            $sitemap_styles->store('xml', 'sitemap-styles');

            // create new sitemap plans
            $sitemap_plans = App::make("sitemap");
            $plans = DB::table('plans')->where('is_active', 1)->orderBy('created_at', 'desc')->get();
            $sitemap_plans->add(route('plan.all'), '2020-02-11 00:00:00', '1.0', 'weekly');
            foreach ($plans as $plan) {
                $sitemap_plans->add(route('plan.view', $plan->plan_number), $plan->updated_at, '1.0', 'weekly');
            }
            $sitemap_plans->store('xml', 'sitemap-plans');

            // create new sitemap inspiration
            $sitemap_insp = App::make("sitemap");
            $inspData = DB::table('inspirations')->orderBy('created_at', 'desc')->get();
            $inspHome = DB::table('inspiration-blocks')->first();
            $sitemap_insp->add(route('inspiration'), $inspHome->updated_at, '1.0', 'weekly');
            foreach ($inspData as $item) {
                $sitemap_insp->add(route('inspiration.page', $item->link), $item->updated_at, '1.0', 'weekly');
            }
            $sitemap_insp->store('xml', 'sitemap-inspirations');

            // create new sitemap builders
            $sitemap_builders = App::make("sitemap");
            $buildersHome = DB::table('builder_landing_blocks')->first();
            $sitemap_builders->add(route('builders-home.index'), $buildersHome->updated_at, '1.0', 'weekly');
            $sitemap_builders->add(route('builders.search'), $buildersHome->updated_at, '1.0', 'weekly');
            $sitemap_builders->store('xml', 'sitemap-builders');

            // create new sitemap pages
            $sitemap_pages = App::make("sitemap");
            $pagesData = DB::table('pages')->orderBy('created_at', 'desc')->get();
            foreach ($pagesData as $item) {
                $sitemap_pages->add(route('pages', $item->link), $item->updated_at, '1.0', 'weekly');
            }
            $sitemap_pages->store('xml', 'sitemap-pages');

            // create sitemap index
            $sitemap = App::make("sitemap");
            $sitemap->addSitemap(URL::to('sitemap-general.xml'));
            $sitemap->addSitemap(URL::to('sitemap-collections.xml'));
            $sitemap->addSitemap(URL::to('sitemap-styles.xml'));
            $sitemap->addSitemap(URL::to('sitemap-plans.xml'));
            $sitemap->addSitemap(URL::to('sitemap-inspirations.xml'));
            $sitemap->addSitemap(URL::to('sitemap-builders.xml'));
            $sitemap->addSitemap(URL::to('sitemap-pages.xml'));
            $sitemap->store('sitemapindex', 'sitemap');
        });
    });
});

Route::post('modify-plan/{plan_number}', 'PlanController@modifyplanpost')->name('modify-plan-submit')->where('plan_number', '[0-9]+');

Route::post('contact-us/send', 'ContactUsController@send')->name('contact-us.send');

Route::post('cart/update/', 'ShoppingCartController@update')->name('cart.update');
Route::post('purchase/', 'ShoppingCartController@purchase')->name('purchase');
Route::post('promo/', 'ShoppingCartController@promo')->name('promo');

Route::post('checkout/create', 'CheckoutController@store')->name('checkout.store');
Route::post('checkout/payd', 'CheckoutController@payd')->name('checkout.payd');
Route::get('checkout/done/{orderID}/{paydID}', 'CheckoutController@done')->name('checkout.done');

Route::get('search/result', 'SearchController@result')->name('search-result');

Route::post('promo-email-send/{email}', 'HomeController@sendPromotoEmail');

Route::middleware(['auth'])->group(function () {
    Route::post('save-plan/{plan}', 'SavedPlanController@save');
});

Route::post('change-filter-url', function () {
    $newParams = request()->except(['_token', 'action_name', 'action_params', 'page', 'old_page']);
    $oldParams = json_decode(request()->post('action_params'), true);
    $mergeParams = array_merge($oldParams, $newParams);
    $actionName = request()->post('action_name');
    $page = request()->post('old_page') != request()->post('page') ? "?page=" . request()->post('page') : "";

    return redirect(route($actionName, $mergeParams) . $page);
})->name('change-filter-url');

Route::get('get-plan-data/{id}', function ($id) {
    return Plan::select(
        'id',
        'name',
        'plan_number',
        'rooms',
        'dimensions',
        'square_ft',
        'garage'
    )
        ->where('id', $id)
        ->where('is_active', 1)
        ->with(['images' => function ($query) {
            $query->orderBy('for_search', 'desc');
            $query->orderBy('sort_number', 'asc');
        }])
        ->with('images_first')
        ->with('images_second')
        ->with('images_basement')
        ->with(['saved_plans' => function ($query) {
            $query->where('user_id', Auth::id());
        }])
        ->first();
});

Route::middleware(['promo'])->group(function () {
    Route::get('search/', 'SearchController@index')->name('search');
    Route::get('advanced-search/', 'SearchController@advanced')->name('advanced-search');

    Route::get('collection/{slug}/{views?}/{order?}', 'CollectionController@slug')->name('collection.slug');
    Route::get('architectural-styles/{slug}/{views?}/{order?}', 'StyleController@slug')->name('style.slug');

    Route::get('collections/', 'CollectionController@all')->name('collections');
    Route::get('architectural-styles/', 'StyleController@all')->name('styles');

    Route::get('plan/{plan_number}', 'PlanController@view')->name('plan.view')->where('plan_number', '[0-9]+');
    Route::get('modify-plan/{plan_number}', 'PlanController@modifyplan')->name('modify-plan')->where('plan_number', '[0-9]+');
    Route::get('plan/all', 'PlanController@all')->name('plan.all');

    Route::get('contact-us/', 'ContactUsController@index')->name('contact-us');

    Route::get('cart/', 'ShoppingCartController@index')->name('cart');

    Route::get('inspiration/', 'InspirationController@index')->name('inspiration');
    Route::get('inspiration/{link}', 'InspirationController@pages')->name('inspiration.page');
    Route::get('checkout/', 'CheckoutController@index')->name('checkout');

    Route::middleware(['auth'])->group(function () {
        Route::get('saved-plans/', 'SavedPlanController@index');
    });

    Route::get('/about-us', 'SpecialPageController@about')->name('about-us');

    Route::get('/builders', 'BuildersController@index')->name('builders-home.index');
    Route::get('/builders-search', 'BuildersController@search')->name('builders.search');

    Route::get('/step-by-step', function () {
        $menu = Inspiration::select('name', 'link')->where('in_menu', '=', 1)->orderBy('order', 'asc')->get();
        return view('inspirations.step-by-step', [
            'menu' => $menu,
        ]);
    });

    Route::get('/{page}', function (Thd\Page $page) {
        return view('page', ['page' => $page]);
    })->where('page', '[a-zA-Z0-9_-]+')->name('pages');
});
