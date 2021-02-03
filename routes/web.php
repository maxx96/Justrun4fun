<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminEventsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\EventOpinionsController;
use App\Http\Controllers\FoundationController;
use App\Http\Controllers\UserController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('/'); 
  })->name('index'); 

Route::get('/wydarzenia', [PagesController::class, 'events'])->name('wydarzenia');
Route::get('/wydarzenia/{id}', [AdminEventsController::class, 'event'])->name('wydarzenie');
Route::resource('/profil', UserController::class);
Route::get('/eventRegistration/{id}', [UserController::class, 'eventRegistration'])->name('eventRegistration');
Route::get('/rankingRegistration/{id}', [UserController::class, 'rankingRegistration'])->name('rankingRegistration');;
Route::get('/ranking', [PagesController::class, 'ranking'])->name('ranking');
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::resource('admin/opinie', EventOpinionsController::class);
Route::patch('admin/opinie/verification/{id}', [EventOpinionsController::class, 'updateVerification'])->name('updateVerification');;
Route::patch('/updateFoundation/{id}', [UserController::class, 'updateFoundation'])->name('updateFoundation');;

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
