<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskStatusController;
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

Route::middleware('auth.token')->group(function () {
    Route::get('/task_status', [TaskStatusController::class, 'index'])->name('taskStatus.index');
    Route::post('/task_status', [TaskStatusController::class, 'create'])->name('taskStatus.create');
    Route::put('/task_status/{id}', [TaskStatusController::class, 'update'])->where('id', '[0-9]+')->name('taskStatus.update');
    Route::delete('/task_status/{id}', [TaskStatusController::class, 'delete'])->where('id', '[0-9]+')->name('taskStatus.delete');

    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/{id}', [TaskController::class, 'show'])->where('id', '[0-9]+')->name('tasks.show');
    Route::post('/tasks', [TaskController::class, 'create'])->name('tasks.create');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->where('id', '[0-9]+')->name('tasks.update');
    Route::delete('/tasks/{id}', [TaskController::class, 'delete'])->where('id', '[0-9]+')->name('tasks.delete');
});



