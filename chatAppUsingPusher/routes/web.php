<?php

use App\Events\myEvent;
use App\Http\Controllers\pusherChat;
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
Route::get('/fire', function () {
    event(new myEvent('hello world'));
});
Route::get('/new',[pusherChat::class,'index']);
