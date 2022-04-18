<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
// use Auth;
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

Route::get('/', function () {
    return view('welcome');
});

// // Authentication Routes...
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...

// Route::get('/allow', [App\Http\Controllers\HomeController::class, 'alaa'])->name('allow');
// Route::post('/belal', [App\Http\Controllers\HomeController::class, 'create'])->name('belal');

// // Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');
// Route::get('register', 'Auth\RegisterController@showRegistrationForm');
// Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
// // Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
// Auth::routes('register')->middleware('signed');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Auth::routes(['register' => false]);
// Auth::routes();
Route::group(['middleware' => ['signed']], function() {
    // Auth::routes(['verify' => true]);
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');

});
Route::resource('tasks', TaskController::class);
Route::get('/home', [App\Http\Controllers\TaskController::class, 'index'])->name('home');
Route::get('/task/edit/{id}', [App\Http\Controllers\TaskController::class, 'edit'])->name('edit');
Route::get('/task/delete/{id}', [App\Http\Controllers\TaskController::class, 'delete'])->name('delete');
Route::post('/task/update/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('update');
// Route::get('/register', function (Request $request) {
//     if (! $request->hasValidSignature()) {
//         abort(401);
//     }
// return view('auth.register');
// // route('');

// });

//     return Auth::routes()->only('register');
// Route::get('/generate',[App\Http\Controllers\ShortLinkController::class, 'index'])->name('generate');
// URL::action();

// Route::post('/generate-shorten-link/store',[App\Http\Controllers\ShortLinkController::class, 'store'])->name('generate.shorten.link.post');
   
// Route::get('/{code}', [App\Http\Controllers\ShortLinkController::class, 'shortenLink'])->name('shorten.link');

// Route::get('generate', ['before' => 'auth', 'uses' => 'App\Http\Controllers\ShortLinkController@index'])->name('generate');
