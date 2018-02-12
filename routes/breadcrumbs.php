<?php

// Dashboard
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('dashboard'));
});

// House Plans
Breadcrumbs::register('plans', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('House Plans', route('house-plan.index'));
});

Breadcrumbs::register('plans-create', function ($breadcrumbs) {
    $breadcrumbs->parent('plans');
    $breadcrumbs->push('Create New House Plan', route('house-plan.create'));
});

// House Plans styles
Breadcrumbs::register('style', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('House Plans styles', route('styles.index'));
});

Breadcrumbs::register('style-create', function ($breadcrumbs) {
    $breadcrumbs->parent('style');
    $breadcrumbs->push('Create New House Plan style', route('styles.create'));
});

Breadcrumbs::register('style-edit', function ($breadcrumbs, $style) {
    $breadcrumbs->parent('style');
    $breadcrumbs->push('Edit '.$style->name, route('styles.edit', ['style'=>$style->id]));
});

// House Plans collections
Breadcrumbs::register('collection', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Specialty Collections', route('collections.index'));
});

Breadcrumbs::register('collection-create', function ($breadcrumbs) {
    $breadcrumbs->parent('collection');
    $breadcrumbs->push('Create New Collection', route('collections.create'));
});

Breadcrumbs::register('collection-edit', function ($breadcrumbs, $collection) {
    $breadcrumbs->parent('collection');
    $breadcrumbs->push('Edit '.$collection->name, route('collections.edit', ['collection'=>$collection->id]));
});

// House Plans packages
Breadcrumbs::register('package', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Packages', route('packages.index'));
});

Breadcrumbs::register('package-create', function ($breadcrumbs) {
    $breadcrumbs->parent('package');
    $breadcrumbs->push('Create New Package', route('packages.create'));
});

Breadcrumbs::register('package-edit', function ($breadcrumbs, $package) {
    $breadcrumbs->parent('package');
    $breadcrumbs->push('Edit '.$package->name, route('packages.edit', ['package'=>$package->id]));
});


// House Plans foundation options
Breadcrumbs::register('foundation-options', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Foundation options', route('foundation-options.index'));
});

Breadcrumbs::register('foundation-options-create', function ($breadcrumbs) {
    $breadcrumbs->parent('foundation-options');
    $breadcrumbs->push('Create New Foundation option', route('foundation-options.create'));
});

Breadcrumbs::register('foundation-options-edit', function ($breadcrumbs, $foundationOption) {
    $breadcrumbs->parent('foundation-options');
    $breadcrumbs->push('Edit '.$foundationOption->name, route('foundation-options.edit', ['option'=>$foundationOption->id]));
});

// House Plans Add-Ons
Breadcrumbs::register('addons', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Add-Ons', route('addons.index'));
});

Breadcrumbs::register('addons-create', function ($breadcrumbs) {
    $breadcrumbs->parent('addons');
    $breadcrumbs->push('Create New Add-On', route('addons.create'));
});

Breadcrumbs::register('addons-edit', function ($breadcrumbs, $addon) {
    $breadcrumbs->parent('addons');
    $breadcrumbs->push('Edit '.$addon->name, route('addons.edit', ['addon'=>$addon->id]));
});

// Home Page Gallery
Breadcrumbs::register('gallery', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Home Page Gallery', route('gallery.index'));
});
Breadcrumbs::register('gallery-create', function ($breadcrumbs) {
    $breadcrumbs->parent('gallery');
    $breadcrumbs->push('Create New Slide', route('gallery.create'));
});
Breadcrumbs::register('gallery-edit', function ($breadcrumbs, $gallery) {
    $breadcrumbs->parent('gallery');
    $breadcrumbs->push('Edit slide '.$gallery->name, route('gallery.edit', ['gallery'=>$gallery->id]));
});

// About David E.
Breadcrumbs::register('about-david', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('About David E. Wiggins', route('about-david.edit'));
});
