<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\invoice;
use App\Http\Controllers\login;
use App\Http\Middleware\myAuth;

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

// Route::get('/', function () {
//     return view('form');
// });

Route::get('/', [login::class, 'index'])->name('login');
Route::post('/loginauth', [login::class, 'login']);
Route::get('/logout', [login::class, 'logout']);


Route::middleware('myauth')->group(function () {
    Route::get('/form', [invoice::class, 'index'])->name('form');
    Route::post('/proses',[invoice::class, 'proses']);
    Route::get('/print',[invoice::class,'invoice']);    
    });
