<?php

use Dompdf\Options;
use App\Models\MCAFileForAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\DashboardController;


use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Apps\Mca\MCAReportController;
use App\Http\Controllers\Apps\FormManagementController;
//use App\Http\Controllers\FormController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\Mca\MCAFetchDocFromEmailController;


Route::get('/email-status', function () {
    Artisan::call('Create:report');
});

Route::get('/test-email', function () {
    Artisan::call('Create:mcareportfromemaildoc');
    return redirect()->route('mca.reports');
})->name('mca.scan.email');
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

Route::get('/report/download/{id}', function ($id) {
    $report = MCAFileForAdmin::findOrFail($id);
    $html = $report->report->response; // The content to render in PDF

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new \Dompdf\Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    return response($dompdf->output(), 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'attachment; filename="mca_report_' . $report->id . '.pdf"');
})->name('report.download');

Route::middleware(['auth', 'verified'])->group(function () {

    // Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });

    Route::get('/forms-entries', [FormManagementController::class, 'index'])->name('forms.user');
    Route::get('/forms-show/{id}', [FormManagementController::class, 'show'])->name('forms.show');
    Route::get('/server-info/{id}', [FormManagementController::class, 'leads'])->name('forms.leads');
    Route::delete('forms/delete-selected', [FormManagementController::class, 'deleteSelected'])->name('forms.deleteSelected');
    Route::get('/general-setting', [FormManagementController::class, 'generalSetting'])->name('setting.general.setting');
    Route::get('/website-pages', [FormManagementController::class, 'websitePages'])->name('setting.website.pages');
    Route::post('/update-setting', [FormManagementController::class, 'updateSetting'])->name('update.setting');

    Route::post('/update-congrats-setting', [FormManagementController::class, 'updateCongrats'])->name('update.congrats.setting');
    Route::get('/congrats-setting', [FormManagementController::class, 'congrats'])->name('setting.congrats.setting');

    Route::get('/tracking-links', [FormManagementController::class, 'tracking'])->name('setting.tracking.links');
    Route::post('/update-tracking', [FormManagementController::class, 'updatetracking'])->name('update.tracking');
    Route::delete('links-delete/{id}', [FormManagementController::class, 'linksdelete'])->name('links.delete');
    Route::get('/tracking-link/{id}', [FormManagementController::class, 'referrallinks'])->name('setting.referral.links');
    Route::get('/tracking-server-info/{id}', [FormManagementController::class, 'serverinfo'])->name('setting.tracking.server');


    // MCA REPORTS ROUTES
    Route::controller(MCAReportController::class)->group(function () {
        Route::get('/mca_reports', 'index')->name('mca.reports');
        Route::get('/mca_reports/create', 'create')->name('mca.reports.new');
        Route::post('/mca_reports/save', 'save')->name('mca.reports.save');
        Route::get('/mca_reports/show/{id}', 'show')->name('mca.reports.show');

        Route::post('/mca_reports/delete', 'delete')->name('mca.reports.delete');
        Route::post('/mca_reports/regenerate', 'regenerateReport')->name('mca.reports.regenerate');
        Route::post('/mca_reports/manual_approval', 'manualApprove')->name('mca.reports.manualApprove');

        Route::get('/mca_reports/settings', 'settings')->name('mca.reports.settings');
        Route::post('/mca_report/settings_save', 'settingsSave')->name('mca.reports.settings.save');
        Route::post('/report/send/{id}', 'sendReportOnEmail')->name('report.send');
    });
    //MCA REPORT FETCH EMAIL ROUTS
    Route::controller(MCAFetchDocFromEmailController::class)->group(function () {
        Route::get('/mca_report/scanned_emails', 'index')->name('mca.reports.scanned.emails');
        Route::post('/mca_reports/scanned_emails/re-scan', 'reScanEmail')->name('mca.reports.scanned.emails.rescan');
        Route::post('/mca_reports/scanned_emails/delete', 'deleteEmail')->name('mca.reports.scanned.emails.delete');
        Route::get('/mca_report/scanned_emails/view-file/{id}', 'viewFile')->name('mca.reports.scanned.emails.viewFile');
    });
});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';


// adirmargaliot@gmail.com
// support@msfg.finance

/* Route::get('form', [FormController::class, 'index'])->name('form');

Route::get('/form1',  [FormController::class, 'index']);
 */
//Route::get('form', [FormController::class, 'index'])->name('form');
