<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminEventsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\EventOpinionsController;
use App\Http\Controllers\FoundationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\VerifyEmailController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/profil', function () {
    return view('/profil'); 
  }); 

Route::get('/wydarzenia', [PagesController::class, 'events'])->name('wydarzenia');
Route::get('/wydarzenia/{id}', [AdminEventsController::class, 'event'])->name('wydarzenie');
Route::resource('/profil', UserController::class)->middleware('verified');
Route::get('/eventRegistration/{id}', [UserController::class, 'eventRegistration'])->name('eventRegistration');
Route::get('/rankingRegistration/{id}', [UserController::class, 'rankingRegistration'])->name('rankingRegistration');;
Route::get('/ranking', [PagesController::class, 'ranking'])->name('ranking');
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::resource('admin/opinie', EventOpinionsController::class);
Route::patch('admin/opinie/verification/{id}', [EventOpinionsController::class, 'updateVerification'])->name('updateVerification');
Route::patch('/updateFoundation/{id}', [UserController::class, 'updateFoundation'])->name('updateFoundation');
Route::patch('/updateFoundation/{id}', [UserController::class, 'updateFoundation'])->name('updateFoundation');

Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('changePassword');
Route::post('/change-password', [ChangePasswordController::class, 'store'])->name('change.password');

Route::group(['middleware'=>'admin'], function(){
    Route::get('/admin', function(){
      return view('admin/index');
    })->name('admin.index');
    
    Route::resources([
      'admin/uzytkownicy' => AdminUsersController::class,
      'admin/wydarzenia' => AdminEventsController::class,
      'admin/kategorie' => AdminCategoriesController::class,
      'admin/fundacje' => FoundationController::class
    ]);
});

Route::get('/regulamin', function(){
  return view('regulamin');
})->name('regulation');

Route::get('/polityka-prywatnosci', function(){
  return view('polityka-prywatnosci');
})->name('privacyPolicy');

Route::get('/fundacje', function(){
  return view('fundacje');
})->name('fundacje');

Route::get('/faq', function(){
  return view('faq');
})->name('faq');

Route::get('/email/verify', function () {
  return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
