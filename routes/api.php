<?php

use App\Http\Controllers\Api\GuruController;
use App\Http\Controllers\Api\KelasController;
use App\Http\Controllers\Api\SiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::prefix('admin')->group(function () {
    // Route::post('login',)
});
Route::prefix('kelas')->group(function () {
    Route::get('/', [KelasController::class, 'index']);
});
Route::prefix('siswa')->group(function () {
    Route::get('/', [SiswaController::class, 'index']);
    Route::post('/', [SiswaController::class, 'store']);
    Route::get('/{id}', [SiswaController::class, 'show']);
    Route::put('/{id}', [SiswaController::class, 'update']);
    Route::delete('/{id}', [SiswaController::class, 'destroy']);
});
Route::prefix('guru')->group(function () {
    Route::get('/', [GuruController::class, 'index']);
    Route::post('/', [GuruController::class, 'store']);
    Route::get('/{id}', [GuruController::class, 'show']);
    Route::put('/{id}', [GuruController::class, 'update']);
    Route::delete('/{id}', [GuruController::class, 'destroy']);
});

