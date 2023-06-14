<?php

use App\Containers\Department\UI\Web\Controllers\DepartmentCategoryController;
use App\Containers\Department\UI\Web\Controllers\DepartmentsResultController;
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
use App\Containers\Department\UI\Web\Controllers\DepartmentController;



Route::middleware(['auth', 'auth.admin'])->prefix('department')->group(function () {
    Route::get('/', [DepartmentController::class, 'index'])->name('department_index');
    Route::get('/{id}/edit', [DepartmentController::class, 'edit'])->name('department_edit');
    Route::post('/{id}/update', [DepartmentController::class, 'update'])->name('department_update');
    Route::get('/{id}/delete', [DepartmentController::class, 'delete'])->name('department_delete');
    Route::get('/create', [DepartmentController::class, 'create'])->name('department_create');
    Route::post('/store', [DepartmentController::class, 'store'])->name('department_store');
    Route::get('/{id}/dataset', [DepartmentController::class, 'dataset']) -> name('department_dataset');
    Route::get('/{id}/dataset/create', [DepartmentController::class, 'dataset_create']) -> name('department_dataset_create');
    Route::post('/{id}/dataset/store', [DepartmentController::class, 'dataset_store']) -> name('department_dataset_store');
    Route::get('/{id}/dataset/{id_ds}/edit', [DepartmentController::class, 'dataset_edit']) -> name('department_dataset_edit');
    Route::post('/{id}/dataset/{id_ds}/update', [DepartmentController::class, 'dataset_update']) -> name('department_dataset_update');
    Route::get('/{id}/dataset/{id_ds}/delete', [DepartmentController::class, 'dataset_delete']) -> name('department_dataset_delete');
    Route::get('/{id}/category', [DepartmentCategoryController::class, 'index']) -> name('department_category_index');

});

Route::middleware(['auth', 'auth.admin'])->prefix('rebuild')->group(function () {
   Route::get('/',[DepartmentController::class, 'reset_values'])->name('department_reset_values');

});

Route::middleware(['auth', 'auth.admin'])->prefix('dashboard')->group(function () {
    Route::get('/',[DepartmentsResultController::class, 'index'])->name('departments_result_index');

});


