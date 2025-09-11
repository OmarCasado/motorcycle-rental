<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotorcycleController;

Route::get('/', function () {
    return view('welcome');
});

// トップページ
Route::get('/motorcycles', [MotorcycleController::class, 'index'])->name('topPage');

// バイクを追加
Route::get('/motorcycles/create', [MotorcycleController::class, 'create'])->name('createMotorcycle');

// バイクを編集ページを表示
Route::get('/motorcycles/{id}/edit', [MotorcycleController::class, 'edit'])->name('editMotorcycle');

// バイクを編集
Route::post('/motorcycles/update/{id}', [MotorcycleController::class, 'update'])->name('updateMotorcycle');

// バイクを削除
Route::get('/motorcycles/delete/{id}', [MotorcycleController::class, 'delete'])->name('deleteMotorcycle');

// 詳細ページ
Route::get('/motorcycles/{id}', [MotorcycleController::class, 'show'])->name('showMotorcycle');

// バイクを保存
Route::post('/motorcycles/store', [MotorcycleController::class, 'store'])->name('storeMotorcycle');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

