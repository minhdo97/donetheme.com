<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return PermissionResource::collection(Permission::all());
    }

    public function store(Request $request)
    {
        $permissions = collect();
        foreach ($request->actions as $action) {
            $permission = Permission::create([
                'name' => \Str::ucfirst($action) . ' ' . $request->modalPermissionName,
                'guard_name' => 'admin',
                'group' => $request->modalPermissionName,
                'core' => $request->has('core') ? 1 : 0,
                'action' => \Str::ucfirst($action),
            ]);
            $permissions = collect($permissions)->push($permission);
        }

        return PermissionResource::collection($permissions);
    }

    public function update($id, Request $request)
    {

        $permission = Permission::findById($id, 'admin');
        $permission->name = $request->editPermissionName;
        $permission->update();
        return new PermissionResource($permission);
    }

    public function show($id)
    {
        return new PermissionResource(Permission::findById($id, 'admin'));
    }

    public function destroy($id)
    {
        return Permission::where('core',0)->findById($id, 'admin')->delete();
    }
}
