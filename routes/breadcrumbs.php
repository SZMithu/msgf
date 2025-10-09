<?php

use App\Models\MCAFileForAdmin;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

// Home > Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Dashboard', route('dashboard'));
});

// Home > Dashboard > User Management
Breadcrumbs::for('user-management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User Management', route('user-management.users.index'));
});

// Home > Dashboard > User Management > Users
Breadcrumbs::for('user-management.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Users', route('user-management.users.index'));
});

// Home > Dashboard > User Management > Users > [User]
Breadcrumbs::for('user-management.users.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.users.index');
    $trail->push(ucwords($user->name), route('user-management.users.show', $user));
});

// Home > Dashboard > User Management > Roles
Breadcrumbs::for('user-management.roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Roles', route('user-management.roles.index'));
});

// Home > Dashboard > User Management > Roles > [Role]
Breadcrumbs::for('user-management.roles.show', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('user-management.roles.index');
    $trail->push(ucwords($role->name), route('user-management.roles.show', $role));
});

// Home > Dashboard > User Management > Permission
Breadcrumbs::for('user-management.permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Permissions', route('user-management.permissions.index'));
});

// Home > Dashboard > MCA Report
Breadcrumbs::for('mca.reports', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Reports', route('mca.reports'));
});
// Home > Dashboard > MCA Report > New Report
Breadcrumbs::for('mca.reports.new', function (BreadcrumbTrail $trail) {
    $trail->parent('mca.reports');
    $trail->push('New Report', route('mca.reports.new'));
});

// Home > Dashboard > MCA Report > view
Breadcrumbs::for('mca.reports.show', function (BreadcrumbTrail $trail, MCAFileForAdmin $mcaFileForAdmin) {
    $trail->parent('mca.reports');
    $trail->push('Report', route('mca.reports.show', $mcaFileForAdmin->id));
});

// Home > Dashboard > MCA Report > settings
Breadcrumbs::for('mca.reports.settings', function (BreadcrumbTrail $trail) {
    $trail->parent('mca.reports');
    $trail->push('Settings', route('mca.reports.settings'));
});

// Home > Dashboard > MCA Report > scanned email List
Breadcrumbs::for('mca.reports.scanned.emails', function (BreadcrumbTrail $trail) {
    $trail->parent('mca.reports');
    $trail->push('Scanned Emails', route('mca.reports.scanned.emails'));
});
// Breadcrumbs::for('forms-user', function (BreadcrumbTrail $trail, User $user) {
//     $trail->parent('user-management.users.index');
//     $trail->push(ucwords($user->name), route('user-management.users.show', $user));
// });
