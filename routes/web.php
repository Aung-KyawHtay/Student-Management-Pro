<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {

    Route::get('/students', [StudentController::class, 'index'])
        ->name('students.index');

    Route::get('/students/create', [StudentController::class, 'create'])
        ->name('students.create');

    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])
        ->name('students.edit');

    Route::put('/students/{student}', [StudentController::class, 'update'])
        ->name('students.update');

    Route::delete('/students/{student}', [StudentController::class, 'destroy'])
        ->middleware('admin')
        ->name('students.destroy');

    Route::post('/students', [StudentController::class, 'store'])
        ->name('students.store');
});
Route::get('/about', [AboutController::class, 'index'])
    ->name('students.about');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/admin/students', [StudentController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.students.index');
