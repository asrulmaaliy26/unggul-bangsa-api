<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\Api\{
    HomeController,
    NewsController,
    ProjectController,
    JournalController,
    FacilityController,
    AboutController,
    CategoryController
};

Route::get('/home', [HomeController::class, 'index']);

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);

Route::get('/journals', [JournalController::class, 'index']);

Route::get('/facilities', [FacilityController::class, 'index']);

Route::get('/about/{jenjang}', [AboutController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);