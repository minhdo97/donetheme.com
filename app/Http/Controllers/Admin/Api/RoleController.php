<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return PermissionResource::collection(Permission::all());
    }

    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->modalRoleName, 'guard_name' => 'admin']);
        $role->givePermissionTo($request->permissions);
        return new RoleResource($role);
    }

    public function update($id, Request $request)
    {
        $role = Role::findById($id, 'admin');
        $role->name = $request->modalRoleName;
        $role->update();
        $role->syncPermissions($request->permissions);
        return new RoleResource($role);
    }

    public function show($id)
    {
        $role = Role::findById($id, 'admin');
        $permissions = Permission::all();
        return view()->make('admin/apps/rolesPermission/edit-role', ['permissions' => $permissions, 'role' => $role])->render();
    }

    public function destroy($id)
    {
        return Permission::findById($id, 'admin')->delete();
    }
}
