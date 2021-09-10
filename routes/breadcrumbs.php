<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Breadcrumb for Super Admin

// Dashboard
Breadcrumbs::for('super-admin.dashboard.index', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('super-admin.dashboard.index'));
});

// Breadcrumbs for Admin

// Dashboard
Breadcrumbs::for('admin.dashboard.index', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard.index'));
});
