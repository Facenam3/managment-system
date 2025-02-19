<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('projects')->group(function(){
    Route::get('/projects/all', [ProjectController::class, 'allProjects']);
    Route::post('/projects/create' ,[ProjectController::class, 'store']);
    Route::post('/projects/filter', [ProjectController::class, 'filterByDueDate']);
});

Route::prefix('categories')->group(function(){
    Route::get('/categories/all', [CategoryController::class, 'allCategories']);
    Route::post('/categories/create' ,[CategoryController::class, 'store']);
});

Route::prefix('tasks')->group(function(){
    Route::get('/tasks/all', [TaskController::class, 'allTasks']);
    Route::post('/tasks/create' ,[TaskController::class, 'store']);
    Route::get('/tasks/filter', [TaskController::class, 'listTasks']);
    Route::patch('/{task}/complete', [TaskController::class, 'markAsCompleted']);
});
