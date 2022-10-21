<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\StaterkitController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// Admin
Route::group(['as' => 'admin.'], function () {
    Route::group(['prefix' => 'auth', 'as' => 'auth.', 'middleware' => ['admin.guest']], function () {
        Route::get('login', [AuthenticationController::class, 'login'])->name('login');
        Route::get('register', [AuthenticationController::class, 'register'])->name('register');
        Route::get('reset-password', [AuthenticationController::class, 'reset_password'])->name('reset_password');
        Route::get('forgot-password', [AuthenticationController::class, 'forgot_password'])->name('forgot_password');

        Route::post('register', [AuthenticationController::class, 'createUser'])->name('post.register');
        Route::post('login', [AuthenticationController::class, 'postLogin'])->name('post.login');
    });
    Route::group(['middleware' => ['admin.auth']], function () {
        Route::get('/', [StaterkitController::class, 'home'])->name('dashboard');
        Route::get('lang/{locale}', [LanguageController::class, 'swap']);
        Route::post('auth/logout', [AuthenticationController::class, 'logout'])->name('auth.logout');
        Route::get('lock-screen', [AuthenticationController::class, 'lock_screen'])->name('lock_screen');


        Route::group(['prefix' => 'account', 'as' => 'account.settings.'], function () {
            Route::get('account', [AccountController::class, 'account_settings_account'])->name('account');
            Route::get('security', [AccountController::class, 'account_settings_security'])->name('security');
            Route::get('billing', [AccountController::class, 'account_settings_billing'])->name('billing');
            Route::get('notifications', [AccountController::class, 'account_settings_notifications'])->name('notifications');
            Route::get('connections', [AccountController::class, 'account_settings_connections'])->name('connections');
            Route::get('profile', [AccountController::class, 'profile'])->name('profile');
        });

        Route::resources([
            'admins' => AccountController::class,
            'users' => UserController::class,
            'roles' => RoleController::class,
            'permissions' => PermissionController::class,
            'file-manager' => FileController::class,
            'posts' => PostController::class,
            'categories' => CategoryController::class,
            'menu' => MenuController::class,
            'projects' => ProjectController::class,
            'project-categories' => ProjectCategoryController::class,
            'services' => ServiceController::class,
            'pages' => PageController::class,
        ]);

        //Api get List
        Route::get('api/posts', [PostController::class, 'getList'])->name('api.posts');
        Route::get('api/categories', [CategoryController::class, 'getList'])->name('api.categories');
        Route::get('api/projects', [ProjectController::class, 'getList'])->name('api.projects');
        Route::get('api/project-categories', [ProjectCategoryController::class, 'getList'])->name('api.project_categories');
        Route::get('api/pages', [PageController::class, 'getList'])->name('api.pages');
        Route::get('api/services', [ServiceController::class, 'getList'])->name('api.services');
    });
});

