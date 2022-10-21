<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
// User List Page
    public function index()
    {
        $pageConfigs = ['pageHeader' => false];
        return view('/admin/apps/user/app-user-list', ['pageConfigs' => $pageConfigs]);
    }
}
