<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->truncate();

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create([
            'name' => 'Browser Dashboard',
            'action' => 'browser',
            'group' => 'Dashboard',
            'core' => 1,
            'guard_name' => 'admin',
        ]);

        // create roles and assign existing permissions
        $role = Role::create(['name' => 'Admin', 'guard_name' => 'admin']);
        $role2 = Role::create(['name' => 'Manager', 'guard_name' => 'admin']);
        $role3 = Role::create(['name' => 'Users', 'guard_name' => 'admin']);
        $role4 = Role::create(['name' => 'Support', 'guard_name' => 'admin']);
        $role5 = Role::create(['name' => 'Restricted', 'guard_name' => 'admin']);
        $role6 = Role::create(['name' => 'Client', 'guard_name' => 'web']);


        $role->givePermissionTo('Browser Dashboard');

        // create demo users
        $user = \App\Models\Admin::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make(1),
            'avatar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLdW5K6bg0F1d2Yboler2Zs6wuXqgFrBkF0A&usqp=CAU',
            'status' => 1,
        ]);
        $user->assignRole($role);

    }
}
