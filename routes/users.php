<?php

use App\Http\Controllers\Users\UsersListController;
use Illuminate\Support\Facades\Route;

Route::get('/getUsers', [UsersListController::class, 'getUsers'])
                ->middleware('auth')
                ->name('users.getUsers');