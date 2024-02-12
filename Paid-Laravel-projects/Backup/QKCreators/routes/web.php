<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;

// Clients Routes 
// 1) Client Login 
Route::get('/login', [UsersController::class,'client_loginForm'])->name('client.login.page')->middleware('clientNotLogin');
Route::post('/login', [UsersController::class,'client_login'])->name('client.login');
// 2) Client Home Page 
Route::get('/',[ClientsController::class,'index'])->name('client.home')->middleware('clientLogin');
// 3) Client Logout 
Route::get('/logout',[ClientsController::class,'logout'])->name('client.logout');
// 3) Create Request Page 
Route::get('/request',[ClientsController::class,'requestPage'])->name('client.request.form');
// 3) Create Request
Route::post('/request',[ClientsController::class,'request'])->name('client.request');

Route::get('/signUp', [UsersController::class,'client_signUpForm'])->name('client.signUp.page');



// Admin Routes 
// 1) Admin Login Form 
Route::get('/QKCreators/Dashboard/login', [UsersController::class,'admin_login'])->name('dashboard.admin.form')->middleware('checkNotLogin');
// 2) Admin Login Verification 
Route::post('/QKCreators/Dashboard/login', [UsersController::class,'login_Admin'])->name('dashboard.admin.login');
// 3) Home Page of Dashboard 
Route::get('/QKCreators/Dashboard/home', [DashboardController::class,'index'])->name('dashboard.home')->middleware('checkLogin');
// 4) Admin Logout 
Route::get('/QKCreators/Dashboard/logout', [DashboardController::class,'logout'])->name('dashboard.logout');
// 4) Client Registeration Form
Route::get('/QKCreators/Dashboard/register', [DashboardController::class,'registerForm'])->name('dashboard.registerForm');
// 4) Client Registeration
Route::post('/QKCreators/Dashboard/register', [DashboardController::class,'register'])->name('dashboard.register');
