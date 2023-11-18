<?php

use App\Http\Controllers\upController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [upController::class, 'index']);
Route::post('index/proses', [upController::class, 'store']);
Route::get('image/{file}', [upController::class, 'show']);
Route::get('item/delete/{id}', [upController::class, 'destroy']);