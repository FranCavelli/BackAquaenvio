<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::post('/company', [RegisteredUserController::class, 'store'])
                ->middleware('auth')
                ->name('company.create');