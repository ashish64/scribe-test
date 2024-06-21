<?php

use App\Http\Controllers\Api\V1\CaseController;
use App\Http\Controllers\Api\V1\LegalCaseController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class)->except(['store']);
    Route::apiResource('cases', LegalCaseController::class)->except(['create','edit']);
});
