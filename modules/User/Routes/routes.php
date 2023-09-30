<?php
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AppController;

Route::middleware('guest')->get('/token',[AppController::class, 'token']);
Route::middleware('auth:sanctum')->get('/user', [AppController::class, 'user']);
Route::middleware('auth:sanctum')->post('/logout', [AppController::class, 'logout'])->name('logout');
Route::middleware('guest')->post('/login', [AppController::class, 'login'])->name('login');
