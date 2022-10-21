<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        $pageConfigs = ['pageHeader' => false,];

        $roles = Role::withCount(['users'])->with(['permissions'])->get();
        $permissions = Permission::all();

        return view('/admin/apps/rolesPermission/app-access-roles', ['pageConfigs' => $pageConfigs, 'roles' => $roles, 'permissions' => $permissions]);
    }
}
