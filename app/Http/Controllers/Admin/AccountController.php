<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class AccountController extends Controller
{
    public function index()
    {
        $pageConfigs = ['pageHeader' => false];
        return view('/admin/apps/account/app-user-list', ['pageConfigs' => $pageConfigs]);
    }

    public function update($id, Request $request)
    {
        $user = Auth::guard('admin')->user();
        $user->name = $request->name;
        $user->status = $request->status;
        $user->update();

        if ($request->hasFile('avatar')) {
            $user->clearMediaCollection('avatar');
            $user->addMedia($request->file('avatar'))->toMediaCollection('avatar');
        }
        $user->syncRoles([$request->role]);
        return back();
    }

    // Account Settings account
    public function account_settings_account()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Account Settings"], ['name' => "Account"]];

        $roles = Role::all();
        $user = Auth::guard('admin')->user();
        return view('/admin/apps/account/page-account-settings-account', ['breadcrumbs' => $breadcrumbs, 'roles' => $roles, 'user' => $user]);
    }

    // Account Settings security
    public function account_settings_security()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Account Settings"], ['name' => "Security"]];
        return view('admin/apps/account/page-account-settings-security', ['breadcrumbs' => $breadcrumbs]);
    }

    // Account Settings billing
    public function account_settings_billing()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Account Settings"], ['name' => "Billing & Plans"]];
        return view('admin/apps/account/page-account-settings-billing', ['breadcrumbs' => $breadcrumbs]);
    }

    // Account Settings notifications
    public function account_settings_notifications()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Account Settings"], ['name' => "Notifications"]];
        return view('admin/apps/account/page-account-settings-notifications', ['breadcrumbs' => $breadcrumbs]);
    }

    // Account Settings connections
    public function account_settings_connections()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Account Settings"], ['name' => "Connections"]];
        return view('admin/apps/account/page-account-settings-connections', ['breadcrumbs' => $breadcrumbs]);
    }

    // Profile
    public function profile()
    {
        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['name' => "Profile"]];

        return view('admin/apps/account/page-profile', ['breadcrumbs' => $breadcrumbs]);
    }
}
