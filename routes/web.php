<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Frontend\PasswordResetController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;

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

Route::group(['middleware' => 'auth'], function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'panel', 'middleware' => 'author'], function () {

        Route::get('/', [DashboardController::class,'index'])->name('dashboard');

        Route::resource('posts', PostController::class);

        Route::resource('categories', CategoryController::class)->middleware('admin');

        Route::resource('users', UserController::class)->middleware('admin');
    });

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */
    Route::get('profile', [FrontendAuthController::class, 'profile'])->name('myProfile');
    Route::get('my_profile', [FrontendAuthController::class, 'profile'])->name('profile');
    Route::get('edit_profile', [FrontendAuthController::class, 'edit'])->name('editProfile');
    Route::post('edit_profile', [FrontendAuthController::class, 'update'])->name('PostEditProfile');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');


    /*
    |--------------------------------------------------------------------------
    | Posts comments
    |--------------------------------------------------------------------------
    */
    // Route::post('{post}/add_comment', [CommentController::class, 'postComment'])->name('postComment');
    // Route::delete('delete_comment/{comment}', [CommentController::class, 'deleteComment'])->name('deleteComment');

});

Route::group(['middleware' => 'guest'], function () {

    /*
    |--------------------------------------------------------------------------
    | Auth
    |--------------------------------------------------------------------------
    */
    Route::view('register', 'frontend/auth/register')->name('register');
    Route::post('register', [FrontendAuthController::class, 'register'])->name('PostRegister');
    Route::view('login', 'frontend/auth/login')->name('login');
    Route::post('login', [FrontendAuthController::class, 'login'])->name('PostLogin');

    Route::get('/redirect', [FrontendAuthController::class, 'googleRedirect'])->name('googleRedirect');
    Route::get('/callback', [FrontendAuthController::class, 'googleCallback']);

    Route::get('/forgot-password', [PasswordResetController::class,'requestView'])->name('password.request');

    Route::post('/forgot-password', [PasswordResetController::class,'handlePasswordRequest'])->name('password.email');

    Route::get('/reset-password/{token}', [PasswordResetController::class,'resetView'])->name('password.reset');

    Route::post('/reset-password', [PasswordResetController::class,'handlePasswordReset'])->name('password.update');
});

    /*
    |--------------------------------------------------------------------------
    |   Email verification
    |--------------------------------------------------------------------------
    */
    Route::get('email/verify', [FrontendAuthController::class, 'verify'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [FrontendAuthController::class, 'handleVerificationEmailUrl'])->middleware(['auth', 'signed'])->name('verification.verify');

    Route::post('/email/verification-notification', [FrontendAuthController::class, 'resendEmailVerificationUrl'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');



    /*
    |--------------------------------------------------------------------------
    |   Frontend
    |--------------------------------------------------------------------------
    */
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::post('search', [FrontendController::class, 'search'])->name('search');
    Route::get('author/{user:username}', [FrontendController::class, 'author'])->name('author');
    Route::get('category/{category}', [FrontendController::class, 'category'])->name('category');

    Route::get('{category:name}/{post}', [FrontendController::class, 'post'])->name('post');

