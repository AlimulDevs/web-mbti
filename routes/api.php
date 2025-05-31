<?php

use App\Http\Controllers\API\DummyApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("create-school-criteria", [DummyApiController::class, 'createSchoolCriteria']);
