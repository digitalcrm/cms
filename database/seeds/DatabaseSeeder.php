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
            CategorySeeder::class,
            TagSeeder::class,
            // RawDataSeeder::class, // Role assign to the user
            // BookingEventSeeder::class, // BookingEvent generate
        ]);
    }
}
