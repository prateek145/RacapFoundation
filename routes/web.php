<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\AboutsUsController;
use App\Http\Controllers\backend\VisionController;
use App\Http\Controllers\backend\InterventionImageController;
use App\Http\Controllers\backend\OurProjectController;
use App\Http\Controllers\backend\MissionController;
use App\Http\Controllers\backend\ImpactController;
use App\Http\Controllers\backend\InterventionController;
use App\Http\Controllers\frontend\HomeController as FHomeController;

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

//routes for frontend

Route::get('/', [FHomeController::class, 'frontend_home'])->name('frontend.home');
Route::get('memberlist', [FHomeController::class, 'memberlist'])->name('memberlist');
Route::get('user/home', [FHomeController::class, 'user_home'])->name('user.home')->middleware('auth');

Route::post('send/otp', [LoginController::class, 'send_otp'])->name('send.otp');
Route::get('send/otp', [LoginController::class, 'sendotp'])->name('sendotp');

//contact form
Route::post('contact/form', [FHomeController::class, 'contact'])->name('contact.form');



// backend ROutes
Auth::routes();
Route::get('/home', [HomeController::class, 'backend_home'])->name('backend.home');
Route::get('contact/list', [HomeController::class, 'contact_list'])->name('contact.list');
Route::resource('aboutus', AboutsUsController::class);
Route::resource('vision', VisionController::class);
Route::resource('mission', MissionController::class);
Route::resource('intervention-images', InterventionImageController::class);
Route::resource('intervention', InterventionController::class);
Route::resource('impact', ImpactController::class);
Route::resource('ourproject', OurProjectController::class);