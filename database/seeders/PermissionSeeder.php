<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Permission For User create
        Permission::create(['name' => 'list-users']);
        Permission::create(['name' => 'create-user']);

        # Permission For Post
        Permission::create(['name' => 'list-post']);
        Permission::create(['name' => 'create-post']);
        Permission::create(['name' => 'edit-post']);
        Permission::create(['name' => 'view-post']);
        Permission::create(['name' => 'delete-post']);

        # Permission For Category
        Permission::create(['name' => 'category-list']);
        Permission::create(['name' => 'category-create']);
        Permission::create(['name' => 'category-edit']);
        Permission::create(['name' => 'category-view']);
        Permission::create(['name' => 'category-delete']);

        # Permission For Tags
        Permission::create(['name' => 'tag-list']);
        Permission::create(['name' => 'tag-create']);
        Permission::create(['name' => 'tag-edit']);
        Permission::create(['name' => 'tag-view']);
        Permission::create(['name' => 'tag-delete']);

        # Permission For subcategory
        Permission::create(['name' => 'subcategory-lists']);
        Permission::create(['name' => 'subcategory-create']);
        Permission::create(['name' => 'subcategory-edit']);
        Permission::create(['name' => 'subcategory-view']);
        Permission::create(['name' => 'subcategory-delete']);
    }
}
