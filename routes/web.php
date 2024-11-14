<?php

use App\Http\Controllers\image;
use App\Http\Controllers\ImageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [ImageController::class, 'index'])->name('index');
Route::get('/create', [ImageController::class, 'create'])->name('create');
Route::post('/store', [ImageController::class, 'store'])->name('store');
Route::get('/delete/{id}', [ImageController::class, 'destroy'])->name('delete');
Route::get('/edit/{id}', [ImageController::class, 'edit'])->name('edit');
Route::post('update/{id}', [ImageController::class, 'update'])->name('update');


