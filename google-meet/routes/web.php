<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
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
// Redirect to Google for authentication
Route::get('/auth/google', [AuthController::class,'redirectToGoogle'])->name('auth.google');

// Handle the callback from Google
Route::get('/auth/google/callback', [AuthController::class,'handleGoogleCallback']);

// Create an event with a Google Meet link
Route::get('/create-event', 'EventController@createEvent')->middleware('auth');