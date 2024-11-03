<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MutasiController;

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('barangs', BarangController::class);
    Route::apiResource('mutasis', MutasiController::class);

    Route::get('barangs/{barang_id}/history', [MutasiController::class, 'historyByBarang']);
    Route::get('users/{user_id}/history', [MutasiController::class, 'historyByUser']);
});
