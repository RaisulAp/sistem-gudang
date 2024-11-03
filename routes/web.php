<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\BarangController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sistemgudang', [GudangController::class, 'index']);
Route::get('/sistemgudang', [BarangController::class, 'index'])->name('barangs.index');
