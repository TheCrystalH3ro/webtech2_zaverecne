<?php

use App\Http\Controllers\MathProblemController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\StudentController;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
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

    if(Auth::check() && Auth::user()->role->name == Role::$STUDENT) {
        $studentController = new StudentController();
        return $studentController->dashboard();
    }

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


Route::get('/mathTasks', [EditorController::class, 'getTasks']);

Route::middleware(['auth', 'teacher'])->group(function() {
    Route::get('/sets/upload', [FileController::class, 'create'])->name('upload.file.form');
    Route::get('/images/upload', [FileController::class, 'addImages'])->name('upload.images.form');

    Route::post('/upload/set', [FileController::class, 'store'])->name('upload.file');
    Route::post('/upload/images', [FileController::class, 'storeImages'])->name('upload.images');

    Route::get('/sets', [FileController::class, 'index'])->name('sets.index');
    Route::get('/sets/{id}', [FileController::class, 'show'])->name('sets.view');

    Route::get('/sets/{id}/edit', [FileController::class, 'edit'])->name('sets.edit');
    Route::patch('/sets/{id}/edit', [FileController::class, 'update'])->name('sets.update');
    Route::put('/sets/{id}/edit', [FileController::class, 'reupload'])->name('sets.reupload');

    Route::get('/sets/{id}/download', [FileController::class, 'download'])->name('sets.download');

    Route::delete('/sets/{id}/delete', [FileController::class, 'destroy'])->name('sets.destroy');

    Route::get('/images', [FileController::class, 'showImages'])->name('images.index');

    Route::delete('/images/{imageName}/delete', [FileController::class, 'destroyImage'])->name('images.destroy');

    Route::get('/sets/{id}/assign', [FileController::class, 'manageStudents'])->name('sets.assign');
    Route::post('/sets/{id}/assign', [FileController::class, 'assign']);

    Route::delete('/sets/{id}/unassign/{user}', [FileController::class, 'unassign'])->name('sets.unassign');

    Route::get('/student/{id}', [StudentController::class, 'show'])->name('student.view');

    Route::get('/student/{id}/sets', [StudentController::class, 'manageSets'])->name('student.sets');
    Route::post('/student/{id}/sets', [StudentController::class, 'assignSet']);
    Route::delete('/student/{id}/sets/{set}', [StudentController::class, 'unassignSet'])->name('student.sets.unassign');

    Route::get('/students', [StudentController::class, 'index'])->name('student.index');
});

Route::middleware(['auth', 'student'])->group(function() {

    Route::get('/problem/generate', [StudentController::class, 'pickProblemSets'])->name('problems.pick');
    Route::post('/problem/generate', [StudentController::class, 'generateMathProblems'])->name('problems.generate');

    Route::get('/problem/{id}/solve', [MathProblemController::class, 'show'])->name('problem.solve');
    Route::post('/problem/{id}/solve', [MathProblemController::class, 'submitAnswer']);

});

Route::get('/editor', [EditorController::class, 'show']);

require __DIR__.'/auth.php';
