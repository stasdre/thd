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