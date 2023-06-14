<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




use App\Containers\Login\UI\Api\Controllers\LoginController;

Route::get('/api/login', [LoginController::class, 'index'])->name('login');
Route::post('/api/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/login/authenticate', [LoginController::class, 'authenticate']);
