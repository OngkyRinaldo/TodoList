<?php

use App\Http\Controllers\TodoListController;
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

Route::get('', [TodoListController::class, 'index']);
Route::post('/store', [TodoListController::class, 'store']);
Route::get('/{id}/edit', [TodoListController::class, 'edit']);
// Route::patch('/update', [TodoListController::class, 'update']);
Route::get('/{id}/completed', [TodoListController::class, 'completed']);
Route::get('/{id}/delete', [TodoListController::class, 'delete']);
Route::patch('/update', [TodoListController::class, 'update']);
