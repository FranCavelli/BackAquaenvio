<?php

use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::post('/setSessionValue', [SessionController::class, 'store'])
                ->middleware('auth')
                ->name('session.store');

Route::post('/getSessionValue', [SessionController::class, 'show'])
                ->middleware('auth')
                ->name('session.show');

Route::get('/getSessionAll', [SessionController::class, 'showAll'])
                ->middleware('auth')
                ->name('session.showAll');

Route::post('/deleteSessionValue', [SessionController::class, 'delete'])
                ->middleware('auth')
                ->name('session.delete');