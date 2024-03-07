<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\OrganizerSubController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing-page');
});

/* main route */
Route::get('/main', [MainController::class, 'index'])->name('main')->middleware('auth');
Route::get('/managecategorie', [CategoriesController::class, 'index'])->name('managecategorie')->middleware('auth');
Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store')->middleware('auth');
Route::delete('/categories.destroySelected', [CategoriesController::class, 'destroy'])->name('categories.destroySelected')->middleware('auth');

/* auth route */
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'store'])->name('register.store')->middleware('guest');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::delete('/user/delete', [AuthController::class, 'destroy'])->name('user.delete');

/* forget-password route */
Route::get('/forget-password', [ForgetPasswordController::class, 'forgetPassword'])->name('forget.password');

Route::post('/forget-password', [ForgetPasswordController::class, 'forgetPasswordPost'])->name('forget.password.post');

Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('reset.password');

Route::post('/reset-password', [ForgetPasswordController::class, 'resetPasswordPost'])->name('reset.password.post');

/* subscribe route */
Route::post('/subscribe/store', [OrganizerSubController::class, 'subscribe'])->name('subscribe.store');

Route::get('/subscribe', function () {
    $black_hover = 'Be an organizer';
    return view('subscribe', compact('black_hover'));
})->name('subscribe');


Route::get('/reserve', function () {
    $black_hover = 'Reserve a ticket';
    return view('reserve', compact('black_hover'));
})->name('reserve');

Route::get('/manageEvent',function (){
    $black_hover = 'Manage events';
    return view('manageEvent', compact('black_hover'));
})->name('manageEvent');




Route::get('/reservation',function (){
    $black_hover='Reservations';
    return view('reservation',compact('black_hover'));
})->name('reservation');


/* Event Route:*/

Route::post('/create.event', [MainController::class, 'create'])->name('createevent');