<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class,'index']);
Route::get('/register', [HomeController::class,'register']);
Route::post('/register', [HomeController::class,'insert']);
Route::get('/empregado/delete/{id}', [HomeController::class, 'delete']);
Route::get('/empregado/edit/{id}', [HomeController::class, 'update']);  
Route::post('/empregado/edit/{id}', [HomeController::class, 'updateperson']);
Route::post('/search', [HomeController::class, 'search']);
