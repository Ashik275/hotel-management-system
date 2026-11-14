<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AdminController::class, 'home']);
Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/create_room', [AdminController::class, 'create_room'])->name('create_room');
Route::get('/view_room', [AdminController::class, 'view_room'])->name('view_room');
Route::post('/add_room', [AdminController::class, 'add_room'])->name('add_room');
Route::delete('/delete_room/{id}', [AdminController::class, 'delete_room'])
    ->name('delete_room');
