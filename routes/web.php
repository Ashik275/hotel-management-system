<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/',[AdminController::class,'home']);
Route::get('/home',[AdminController::class,'index'])->name('home');
Route::get('/create_room',[AdminController::class,'create_room'])->name('create_room');
