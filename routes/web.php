<?php

use App\Http\Controllers\MathProblemController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/language/{language}', [LanguageController::class, 'changeLanguage']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'teacher'])->group(function() {
    Route::get('/upload/set', [FileController::class, 'create'])->name('upload.file.form');
    Route::get('/upload/images', [FileController::class, 'addImages'])->name('upload.images.form');

    Route::post('/upload/set', [FileController::class, 'store'])->name('upload.file');
    Route::post('/upload/images', [FileController::class, 'storeImages'])->name('upload.images');

    Route::get('/sets', [FileController::class, 'index'])->name('sets.index');
    Route::get('/sets/{id}', [FileController::class, 'show'])->name('sets.view');

    Route::get('/sets/{id}/edit', [FileController::class, 'edit'])->name('sets.edit');
    Route::post('/sets/{id}/edit', [FileController::class, 'update'])->name('sets.update');

    Route::get('/sets/{id}/download', [FileController::class, 'download'])->name('sets.download');

    Route::delete('/sets/{id}/delete', [FileController::class, 'destroy'])->name('sets.destroy');

    Route::get('/images', [FileController::class, 'showImages'])->name('images.index');

    Route::delete('/images/{imageName}/delete', [FileController::class, 'destroyImage'])->name('images.destroy');
});

Route::get('/editor', [EditorController::class, 'show']);

require __DIR__.'/auth.php';
