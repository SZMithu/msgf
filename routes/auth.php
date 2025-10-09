<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\FormController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Models\PhoneBurnerToken;
use GuzzleHttp\Client;

// Route::middleware('guest')->group(function () {
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');


    return "Cache cleared successfully";
});


Route::get('/install-package', function () {
    // Example: Run `composer require` command
    $output = shell_exec('composer require setasign/fpdi 2>&1');

    // Output results securely
    return "<pre>" . htmlspecialchars($output) . "</pre>";
});


Route::get('/{any?}', [FormController::class, 'index'])
    ->name('form')
    ->where('any', '^(?!login$|applynow$|submit/[0-9a-zA-Z]+$|form-submit$|pdf-generate$|pdf-merger$|form-test$|refresh-phoneburner-token$).*');

Route::get('submit/{id}', [FormController::class, 'submit'])
    ->name('submit');

Route::get('applynow', [FormController::class, 'applynow'])
    ->name('applynow');

Route::post('form', [FormController::class, 'store'])->name('form');

Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::get('form-submit', [FormController::class, 'formSubmit'])
    ->name('form-submit');

Route::get('pdf-generate', [FormController::class, 'pdf'])
    ->name('pdf-generate');

Route::get('pdf-merger', [FormController::class, 'mergeAndDownload'])
    ->name('pdf-merger');

Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->name('password.update');

Route::post('step-second', [FormController::class, 'form_step_second']);

Route::post('pdf-send', [FormController::class, 'pdf']);

Route::get('terms-conditions', [FormController::class, 'terms']);

Route::get('policy', [FormController::class, 'policy']);
Route::get('form-test', [FormController::class, 'form_test']);

// });

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});


Route::get('first', [FormController::class, 'first']);



Route::get('/refresh-phoneburner-token', function () {
    $token = PhoneBurnerToken::latest()->first();



        $client = new Client();
        $response = $client->post('https://www.phoneburner.com/oauth/refreshtoken', [
            'form_params' => [
                'client_id' => 'ada23d818d27dbeb1f2d65ae29a78a8e07430faa', // Replace with your client ID
                'client_secret' => '017614d73873bf5475b30fc1e85a98efd1f318f8', // Replace with your client secret
                'refresh_token' => $token->refresh_token,
                'grant_type' => 'refresh_token',
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        $token->update([
            'access_token' => $data['access_token'],
            'expires_at' => now()->addSeconds($data['expires_in']),
        ]);
 

    return response()->json('Token refreshed successfully.');
});
        


// support@msfg.finance  adirmargaliot@gmail.com
