<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
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

Route::controller(AdminController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/edit/{id}', 'show')->name('edit');
    Route::get('/add','addBook');
});

Route::controller(BookController::class)->group(function () {
    Route::post('add', 'store');
    Route::put('/edit/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
});

Route::controller(AuthorController::class)->prefix('authors')->group(function () {
    Route::get('/', 'index')->name('authors');
    Route::get('/add', 'addAuthor');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'delete');
});


