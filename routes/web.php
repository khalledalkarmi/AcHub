<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ProfileController;
use App\Models\Courses;
use App\Models\User;
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
    $courses = Courses::all();
    return view('courses', ['courses' => $courses]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/course-details/{id}', [CoursesController::class,'index']);
Route::get('/rollin/{id}', [CoursesController::class,'rollIn']);

Route::get('/events', function () {
    return view('events');
});

Route::get('/pricing', function () {
    return view('pricing');
});

Route::get('/trainers', function () {
    $trainer = \App\Models\User::all()->where('role',1);

    return view('trainers',['trainers'=>$trainer]);
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
Route::get('/addCourses', function () {
    $trainer = User::where('role', 1)->get();
    return view('admin.addCourses', ['trainer' => $trainer]);
});

Route::post('/addc', [AdminController::class, 'addCourses']);
//Profile
Route::get('/profile', [ProfileController::class, 'index']);
Route::post('update_profile', [ProfileController::class, 'update']);
Route::post('/profile/update_password', [PasswordController::class, 'update'])->name('update_password');
