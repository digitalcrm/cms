<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name' => 'Super Admin',
                'email' => 'support@example.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Demo Admin',
                'email' => 'demoadmin@example.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Demo User',
                'email' => 'demouser@example.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
        ];
        // $user = User::factory()->times(3)->create();
        
        // Create Bydefault 3 User for Our app
        User::insert($userData);

        // After that assigning each user have a role
        $superAdmin = User::findOrFail(1);
        $superAdmin->assignRole('superadmin');
        
        $demoadmin = User::findOrFail(2);
        $demoadmin->assignRole('admin');
        
        $demouser = User::findOrFail(3);
        $demouser->assignRole('user');
    }
}
