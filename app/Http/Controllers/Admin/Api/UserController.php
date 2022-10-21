<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Admin;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = Admin::all();
        return UserResource::collection($users);
    }
}
