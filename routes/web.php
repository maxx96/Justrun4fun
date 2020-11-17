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

Route::get('/wydarzenia', [PagesController::class, 'events']);
Route::get('/wydarzenia/{id}', [AdminEventsController::class, 'event']);
Route::resource('/profil', UserController::class);
Route::get('/eventRegistration/{id}', [UserController::class, 'eventRegistration'])->name('eventRegistration');
Route::get('/rankingRegistration/{id}', [UserController::class, 'rankingRegistration']);
Route::get('/ranking', [PagesController::class, 'ranking']);
Route::get('/wyszukaj', [PagesController::class, 'filterSearch']);
Route::get('/', [PagesController::class, 'index']);
Route::resource('admin/opinie', EventOpinionsController::class);
Route::patch('admin/opinie/verification/{id}', [EventOpinionsController::class, 'updateVerification']);
Route::patch('/updateFoundation/{id}', [UserController::class, 'updateFoundation']);

Route::group(['middleware'=>'admin'], function(){
    Route::get('/admin', function(){
      return view('admin/index');
    });
    Route::resources([
      'admin/uzytkownicy' => AdminUsersController::class,
      'admin/wydarzenia' => AdminEventsController::class,
      'admin/kategorie' => AdminCategoriesController::class,
      'admin/fundacje' => FoundationController::class
    ]);
});

Route::get('/regulamin', function(){
  return view('footer/regulamin');
});

Route::get('/polityka-prywatnosci', function(){
  return view('footer/polityka-prywatnosci');
});
