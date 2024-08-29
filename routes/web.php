<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);

Route::get('/', [TaskController::class, 'index'])->name('index');

Route::get('/novatask', [TaskController::class, 'screenCreateTask'])->name('createTask');
Route::post('/novatask', [TaskController::class, 'store']);


