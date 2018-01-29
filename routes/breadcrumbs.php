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
