<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RawDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // create roles
        // $role1 = Role::create(['name' => 'superadmin']);
        // $role2 = Role::create(['name' => 'admin']);
        // $role3 = Role::create(['name' => 'user']);
        $role3 = Role::find(3);

        // create permissions
        // Permission::create(['name' => 'user-create']);
        // Permission::create(['name' => 'all-users']);
        Permission::create(['name' => 'edit-post']);
        Permission::create(['name' => 'delete-post']);
        Permission::create(['name' => 'list-post']);
        Permission::create(['name' => 'create-post']);
        Permission::create(['name' => 'view-post']);

        // Give permission to role
        // $role2->givePermissionTo('user-create');
        // $role2->givePermissionTo('all-users');
        $role3->givePermissionTo('edit-post');
        $role3->givePermissionTo('delete-post');
        $role3->givePermissionTo('list-post');
        $role3->givePermissionTo('create-post');
        $role3->givePermissionTo('view-post');

    }
}
