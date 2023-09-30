<?php
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AppController;

Route::middleware('guest')->get('/users', [AppController::class, 'index']);
