<?php

use App\Http\Controllers\Roles\RolesListController;
use Illuminate\Support\Facades\Route;

Route::get('/getRoles', [RolesListController::class, 'getRoles'])
                ->middleware('auth')
                ->name('roles.getRoles');