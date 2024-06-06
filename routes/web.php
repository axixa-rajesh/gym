<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ImgtableController;
use App\Http\Controllers\TrainerpaymentController;
use App\Models\Trainer;
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

Route::get('/', [ App\Http\Controllers\HomeController::class, 'main']);
Route::get('/plan', [ App\Http\Controllers\HomeController::class, 'plan']);
Route::get('/about', [ App\Http\Controllers\HomeController::class, 'about']);
Route::get('/trainer', [App\Http\Controllers\HomeController::class, 'trainer']);

//  Auth::routes();
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/memberregister', [RegisterController::class,'showRegistrationForm'])->name('custom.memberregister');
Route::post('/mregister', [RegisterController::class,'register'])->name('register');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('members', MemberController::class)->middleware('auth');
Route::resource('plans', PlanController::class)->middleware('auth');
Route::get('/payment/{member_id}', [PaymentController::class, 'create'])->name('payment')->middleware('auth');
Route::get('/getplandetail/{plan_id}', [PaymentController::class, 'getplandetail'])->middleware('auth');
Route::get('/getslip/{id}', [PaymentController::class, 'getslip'])->middleware('auth');
Route::post('/payment', [PaymentController::class, 'store'])->middleware('auth');
Route::resource('trainers', TrainerController::class)->middleware('auth');
Route::get('/trainerpayment/{member_id}', [TrainerpaymentController::class,'create'])->middleware('auth');
Route::get('/gettrainerdetail/{trainer_id}', [TrainerpaymentController::class, 'gettrainerdetail'])->middleware('auth');
Route::post('/trainerpayment', [TrainerpaymentController::class, 'store'])->middleware('auth');

Route::resource('/myimages', ImgtableController::class)->middleware('auth');
