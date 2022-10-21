<?php

use App\Http\Controllers\Admin\Api\AdminController;
use App\Http\Controllers\Admin\Api\PermissionController;
use App\Http\Controllers\Admin\Api\RoleController;
use App\Http\Controllers\Admin\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::resources([
        'permissions' => PermissionController::class,
        'roles' => RoleController::class,
        'users' => UserController::class,
        'admins' => AdminController::class,
    ]);
});
