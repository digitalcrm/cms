<?php

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
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class, // User create
            RawDataSeeder::class, // Role assign to the user
            CategorySeeder::class,
            TagSeeder::class,
            // BookingEventSeeder::class, // BookingEvent generate
        ]);
    }
}
