<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RawDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role1 = Role::create(['name' => 'superadmin']);
        $role2 = Role::create(['name' => 'admin']);
        $role3 = Role::create(['name' => 'user']);
        $role4 = Role::create(['name' => 'editor']);
        $role5 = Role::create(['name' => 'writer']);
    }
}
