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
        $role1 = Role::create(['name' => 'superadmin']);
        $role2 = Role::create(['name' => 'admin']);
        $role3 = Role::create(['name' => 'user']);
        // create permissions
        Permission::create(['name' => 'user-create']);
        Permission::create(['name' => 'all-users']);


        $role2->givePermissionTo('user-create');
        $role2->givePermissionTo('all-users');

        // $role1->givePermissionTo('user-create');
        // $role1->givePermissionTo('all-users');
    }
}
