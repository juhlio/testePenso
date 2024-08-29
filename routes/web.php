<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;




    Route::get('/', [TaskController::class, 'index'])->name('index');

    Route::get('/newtask', [TaskController::class, 'screenCreateTask'])->name('createTask');


    Route::get('tasks/:id/edit', [TaskController::class, 'screenUpdateTask'])->name('updateTask');

    Route::get('tasks/{id}', [TaskController::class, 'detailTask'])->name('detailTask');





