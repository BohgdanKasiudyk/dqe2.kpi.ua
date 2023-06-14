<?php

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
use App\Containers\Registration\UI\Web\Controllers\RegistrationController;

#Route::get('/registration', [RegistrationController::class, 'index']);
#Route::post('/registration/store', [RegistrationController::class, 'store']);

Route::middleware(['auth', 'auth.admin'])->prefix('registration')->group(function (){
    Route::get('/', [RegistrationController::class, 'index']);
    Route::post('/store', [RegistrationController::class, 'store']);
});
