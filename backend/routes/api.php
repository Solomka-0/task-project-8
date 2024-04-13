<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('user', \App\Http\Controllers\SimpleUserController::class);
Route::apiResource('user.setting', \App\Http\Controllers\SimpleUserSettingController::class);
Route::get('/user-settings', [\App\Http\Controllers\SimpleUserSettingController::class, 'index']);
Route::get('/users/confirm-setting/{confirmation_id}/{code}', [\App\Http\Controllers\Settings\NameSettingsController::class, 'confirm'])->name('users-confirm-setting');
