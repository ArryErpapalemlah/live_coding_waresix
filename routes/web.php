<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/', [Controller::class, 'index'])->name('directory');
Route::get('/home', [Controller::class, 'home'])->name('home');
Route::get('/add_user', [Controller::class, 'add_usr'])->name('add_usr');
Route::get('/edit_user/{id}', [Controller::class, 'edit_usr'])->name('edit_usr');

Route::post('/login', [Controller::class, 'login_process'])->name('login.process');
Route::post('/logout_action', [Controller::class, 'logout'])->name('logout.action');
Route::post('/user_store', [Controller::class, 'user_store'])->name('user.store');