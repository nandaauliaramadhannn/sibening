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
        $user = User::create([
            'name'  => 'admin',
            'email' => 'admin@root.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'no_hp' => '082138128312',
            'status' => 'active',
        ]);
    }
}
