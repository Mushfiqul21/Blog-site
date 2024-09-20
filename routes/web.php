<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Dashboard

Route::get('/', [DashboardController::class, 'dashboardGeneral'])->name('dashboard');

//Blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blog.list');
Route::get('/blog/add', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog/add', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/{id}/show', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

//Category Route
Route::get('/categories', [CategoryController::class, 'index'])->name('category.list');
Route::get('/categories/add', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories/add', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
