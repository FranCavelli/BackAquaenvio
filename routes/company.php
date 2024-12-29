<?php

use App\Http\Controllers\Company\CompanyCreateController;
use App\Http\Controllers\Company\CompanysListController;
use Illuminate\Support\Facades\Route;

Route::post('/company', [CompanyCreateController::class, 'store'])
                ->middleware('auth')
                ->name('company.create');

Route::get('/getCompanys', [CompanysListController::class, 'getCompanys'])
                ->middleware('auth')
                ->name('company.getCompanys');

Route::get('/companysByUser', [CompanysListController::class, 'listByUser'])
                ->middleware('auth')
                ->name('company.listByUser');