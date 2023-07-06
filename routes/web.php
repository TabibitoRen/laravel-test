<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\TodoController;

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

Route::get('/', [TodoListController::class, 'index']);

Route::post('/saveRoute', [TodoListController::class, 'save'])->name('saveRoute');

Route::post('/deleteRoute/{id}', [TodoListController::class, 'delete'])->name('deleteRoute');

Route::post('/updateRoute/{id}', [TodoListController::class, 'update'])->name('updateRoute');

Route::get('/todo_list/{id}', [TodoController::class, 'view'])->name('todo_list');

Route::post('/todo_list/saveRoute/{todo_list_id}', [TodoController::class, 'save'])->name('todo/saveRoute');

Route::post('/todo_list/deleteRoute/{todo_list_id}/{id}', [TodoController::class, 'delete'])->name('todo/deleteRoute');

Route::post('/todo_list/markCompleted/{todo_list_id}/{id}', [TodoController::class, 'markCompleted'])->name('todo/markCompleted');
