<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('projects')->group(function(){
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.all');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects/store' ,[ProjectController::class, 'store'])->name('projects.store');
});

Route::prefix('categories')->group(function(){
    Route::get("/categories", [CategoryController::class, 'index'])->name('categories.all');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.form');
    Route::post('/categories/store' ,[CategoryController::class, 'store'])->name('categories.store');
});

Route::prefix('tasks')->group(function(){
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.all');
    Route::get("/tasks/create", [TaskController::class, 'create'])->name('tasks.form');
    Route::post('/tasks/store' ,[TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/task-edit/{task}', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
});



require __DIR__.'/auth.php';
