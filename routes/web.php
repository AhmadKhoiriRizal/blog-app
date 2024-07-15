<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/single', function () {
    return view('include.single');
});

Route::get('/abouth', function () {
    return view('include.about');
});
Route::get('/contact', function () {
    return view('include.contact');
});
Route::get('/list', function () {
    return view('search.list');
});

// Route::get('/coba', function () {
//     return view('subinclude.coba');
// });

// Route::get('/', function () {
//     return view('welcome');
// })->middleware('auth');

// Login
Route::get('/admin', [AuthController::class, 'login'])->name('login');
Route::post('/admin', [AuthController::class, 'authenticate'])->name('auth.authenticate');

// Register
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Admin
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/akun', [AdminController::class, 'store'])->name('akun')->middleware('auth');
Route::post('/akun/create', [AdminController::class, 'create'])->name('add.admin')->middleware('auth');
Route::post('/akun/destroy/{id}', [AdminController::class, 'destroy'])->name('destroy.admin')->middleware('auth');
Route::get('/akun/edit/{id}', [AdminController::class, 'edit'])->name('edit.admin')->middleware('auth');
Route::post('/akun/update/{id}', [AdminController::class, 'update'])->name('update.admin')->middleware('auth');

// About
Route::get('/abouta', [AboutController::class, 'store'])->name('abouta')->middleware('auth');
Route::post('/abouta/create', [AboutController::class, 'create'])->name('add.abouta')->middleware('auth');
Route::post('/abouta/destroy/{id}', [AboutController::class, 'destroy'])->name('destroy.abouta')->middleware('auth');
Route::post('/abouta/update/{id}', [AboutController::class, 'update'])->name('update.abouta')->middleware('auth');

// Blog
Route::get('/bloga', [BlogController::class, 'store'])->name('bloga')->middleware('auth');
Route::post('/bloga/create', [BlogController::class, 'create'])->name('add.bloga')->middleware('auth');
Route::post('/bloga/destroy/{id}', [BlogController::class, 'destroy'])->name('destroy.bloga')->middleware('auth');
Route::post('/bloga/update/{id}', [BlogController::class, 'update'])->name('update.bloga')->middleware('auth');

// Kategori
Route::get('/categorya', [CategoryController::class, 'store'])->name('categorya')->middleware('auth');
Route::post('/categorya/create', [CategoryController::class, 'create'])->name('add.categorya')->middleware('auth');
Route::post('/categorya/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy.categorya')->middleware('auth');
Route::post('/categorya/update/{id}', [CategoryController::class, 'update'])->name('update.categorya')->middleware('auth');

// ApplicationsController
Route::get('/app', [ApplicationController::class, 'store'])->name('app')->middleware('auth');
Route::post('/app/create', [ApplicationController::class, 'create'])->name('add.app')->middleware('auth');
Route::post('/app/destroy/{id}', [ApplicationController::class, 'destroy'])->name('destroy.app')->middleware('auth');
Route::post('/app/update/{id}', [ApplicationController::class, 'update'])->name('update.app')->middleware('auth');
