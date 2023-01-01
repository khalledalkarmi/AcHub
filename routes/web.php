<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/courses', function () {
    return view('courses');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/course-details', function () {
    return view('course-details');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/trainers', function () {
    return view('trainers');
});

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/login', function () {
    return view('login');
});



Route::post('register', [RegisteredUserController::class, 'store'])->name('register');
Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


//Admin
Route::get('/admin', function () {
    return view('admin.index');
});

//Profile
Route::get('/profile', [ProfileController::class,'index']);
Route::post('update_profile',[ProfileController::class,'update']);
