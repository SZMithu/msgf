<?php

use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Apps\FormManagementController;

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
//use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });

   
    Route::get('/forms-entries', [FormManagementController::class, 'index'])->name('forms.user');
    Route::get('/forms-show/{id}', [FormManagementController::class, 'show'])->name('forms.show');
    Route::delete('forms/delete-selected', [FormManagementController::class, 'deleteSelected'])->name('forms.deleteSelected');
    Route::get('/general-setting', [FormManagementController::class, 'generalSetting'])->name('setting.general.setting');
    Route::get('/website-pages', [FormManagementController::class, 'websitePages'])->name('setting.website.pages');
    Route::post('/update-setting', [FormManagementController::class, 'updateSetting'])->name('update.setting');

    Route::post('/update-congrats-setting', [FormManagementController::class, 'updateCongrats'])->name('update.congrats.setting');
    Route::get('/congrats-setting', [FormManagementController::class, 'congrats'])->name('setting.congrats.setting');


    Route::get('/tracking-links', [FormManagementController::class, 'tracking'])->name('setting.tracking.links');
    Route::post('/update-tracking', [FormManagementController::class, 'updatetracking'])->name('update.tracking');
    Route::delete('links-delete/{id}', [FormManagementController::class, 'linksdelete'])->name('links.delete');






});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';

/* Route::get('form', [FormController::class, 'index'])->name('form');

Route::get('/form1',  [FormController::class, 'index']);
 */
//Route::get('form', [FormController::class, 'index'])->name('form'); 