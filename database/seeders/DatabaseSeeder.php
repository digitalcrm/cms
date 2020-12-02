<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // RoleSeeder::class,
            // PermissionSeeder::class,
            // UserSeeder::class,
            // CategorySeeder::class,
            // SubcategorySeeder::class,
            // TagSeeder::class,
            // PostSeeder::class,
            // BookingServiceSeeder::class,
            // BookingEventSeeder::class,

            // Below are mandatory part for seeding the value
            // LogoSeeder::class,
            // SettingCmsVisibilitySeeder::class,
            // ThemeSliderSeeder::class,
            ThemeServiceSeeder::class,
        ]);
    }
}
