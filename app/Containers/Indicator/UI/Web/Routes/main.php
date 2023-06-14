<?php


use Illuminate\Support\Facades\Route;
use App\Containers\Indicator\UI\Web\Controllers\IndicatorController;
use App\Containers\Indicator\UI\Web\Controllers\CategoryController;
use App\Containers\Indicator\UI\Web\Controllers\DatasetTypesController;



/*Route::middleware(['auth.admin', 'admin'])->prefix('department')->group(function () {
    Route::get('/', [DepartmentController::class, 'index'])->name('department_index');
    Route::get('/{id}/edit', [DepartmentController::class, 'edit'])->name('department_edit');
    Route::post('/{id}/store', [DepartmentController::class, 'store'])->name('department_store');
});
*/



Route::middleware(['auth', 'auth.admin'])->prefix('indicator')->group(function () {
    Route::get('/', [IndicatorController::class, 'index'])->name('indicator_index');
    Route::get('/{id}/edit', [IndicatorController::class, 'edit'])->name('indicator_edit');
    Route::post('/{id}/update', [IndicatorController::class, 'update'])->name('indicator_update');
    Route::get('/create', [IndicatorController::class, 'create'])->name('indicator_create');
    Route::post('/store', [IndicatorController::class, 'store'])->name('indicator_store');
    Route::get('{id}/delete', [IndicatorController::class, 'delete'])->name('indicator_delete');
});

Route::middleware(['auth', 'auth.admin'])->prefix('/category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category_index');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category_edit');
    Route::post('/{id}/update', [CategoryController::class, 'update'])->name('category_update');
    Route::get('/create', [CategoryController::class, 'create'])->name('category_create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category_store');
    Route::get('/{id}/delete', [CategoryController::class, 'delete'])->name('category_delete');
});

Route::middleware(['auth', 'auth.admin'])->prefix('dataset')->group(function () {
    Route::get('/', [DatasetTypesController::class, 'index']) -> name('datasettypes_index');
    Route::get('/create', [DatasetTypesController::class, 'create']) ->name('datasettypes_create');
    Route::post('/store', [DatasetTypesController::class, 'store']) -> name('datasettypes_store');
    Route::get('/{id}/edit', [DatasetTypesController::class, 'edit'] ) -> name('datasettypes_edit');
    Route::post('/{id}/update', [DatasetTypesController::class, 'update'] ) -> name('datasettypes_edit');
    Route::get('/{id}/delete', [DatasetTypesController::class, 'delete'] ) -> name('datasettypes_delete');
});



