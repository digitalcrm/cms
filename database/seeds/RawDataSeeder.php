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

        # create roles
        // $role1 = Role::create(['name' => 'superadmin']);
        // $role2 = Role::create(['name' => 'admin']);
        // $role3 = Role::create(['name' => 'user']);
        // $role3 = Role::find(3);

        # Permission For User create
        // Permission::create(['name' => 'user-create']);
        // Permission::create(['name' => 'all-users']);

        # Permission For Post
        // Permission::create(['name' => 'list-post']);
        // Permission::create(['name' => 'create-post']);
        // Permission::create(['name' => 'edit-post']);
        // Permission::create(['name' => 'view-post']);
        // Permission::create(['name' => 'delete-post']);

        # Permission For Category
        // Permission::create(['name' => 'category-list']);
        // Permission::create(['name' => 'category-create']);
        // Permission::create(['name' => 'category-edit']);
        // Permission::create(['name' => 'category-view']);
        // Permission::create(['name' => 'category-delete']);

        # Permission For Tags
        // Permission::create(['name' => 'tag-list']);
        // Permission::create(['name' => 'tag-create']);
        // Permission::create(['name' => 'tag-edit']);
        // Permission::create(['name' => 'tag-view']);
        // Permission::create(['name' => 'tag-delete']);

        # Give permission to roles
        // $role2->givePermissionTo('user-create');
        // $role2->givePermissionTo('all-users');

        // $role3->givePermissionTo('category-list');
        // $role3->givePermissionTo('category-create');
        // $role3->givePermissionTo('category-edit');
        // $role3->givePermissionTo('category-view');
        // $role3->givePermissionTo('category-delete');

        // $role3->givePermissionTo('tag-list');
        // $role3->givePermissionTo('tag-create');
        // $role3->givePermissionTo('tag-edit');
        // $role3->givePermissionTo('tag-view');
        // $role3->givePermissionTo('tag-delete');

    }
}
