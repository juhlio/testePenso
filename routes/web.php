<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);

Route::get('/', [TaskController::class, 'index'])->name('index');

Route::get('/newtask', [TaskController::class, 'screenCreateTask'])->name('createTask');
Route::post('/newtask', [TaskController::class, 'store']);

Route::get('tasks/:id/edit', [TaskController::class, 'screenUpdateTask'])->name('updateTask');

Route::get('tasks/{id}', [TaskController::class, 'detailTask'])->name('detailTask');



