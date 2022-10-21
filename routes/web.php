<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy-policy');
Route::get('/terms-condition', [HomeController::class, 'term'])->name('terms-condition');
Route::get('/teams', [HomeController::class, 'team'])->name('team');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('testimonials');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');

Route::resource('/services', ServiceController::class);
Route::resource('/blogs', BlogController::class);
Route::resource('/projects', ProjectController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('/project-categories', ProjectCategoryController::class);
