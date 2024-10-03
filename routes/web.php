<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/', [ \App\Http\Controllers\HomeController::class, 'index' ])->name('home');
    Route::get('/logout', [ \App\Http\Controllers\LogoutController::class, 'index' ])->name('logout');

    Route::post('/todo', [ \App\Http\Controllers\TodoController::class, 'store' ])->name('todo.create');
    Route::delete('/todo/{id}', [ \App\Http\Controllers\TodoController::class, 'destroy' ])->name('todo.destroy');
    Route::put('/todo/{id}/status', [ \App\Http\Controllers\TodoController::class, 'setComplete' ])->name('todo.set_complete');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', [ \App\Http\Controllers\LoginController::class, "login" ])->name('login');
    Route::post('/login', [ \App\Http\Controllers\LoginController::class, "store" ])->name('login.store');
    
    Route::resource('register', \App\Http\Controllers\RegisterController::class);
    //Route::post('/register', [ \App\Http\Controllers\RegisterController::class, 'store'])->name('register.action');
});