<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'name',
            'last_name' => 'apellido',
            'email' => 'email@email.com',
            'phone' => 96679437,

            'email_verified_at' => now(),
            'password' => bcrypt(123456789), // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => 1234567890,
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);

        User::factory(10)->create();
    }
}
