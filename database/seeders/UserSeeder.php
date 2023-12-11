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
            'name' => 'sebastian',
            'last_name' => 'belmar',
            'email' => 's.belmar01@ufromail.cl',
            'phone' => 96679437,

            'email_verified_at' => now(),
            'password' => bcrypt(123456789), // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => 1234567890,
            'profile_photo_path' => null,
            'current_team_id' => null,
        ])->assignRole('Administrador');

        User::create([
            'name' => 'vendedor',
            'last_name' => 'vendedor',
            'email' => 'vendedor@gmail.com',
            'phone' => 96679435,

            'email_verified_at' => now(),
            'password' => bcrypt(123456789), // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => 1234567890,
            'profile_photo_path' => null,
            'current_team_id' => null,
        ])->assignRole('Vendedor');

        //User::factory(99)->create();
    }
}
