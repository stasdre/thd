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