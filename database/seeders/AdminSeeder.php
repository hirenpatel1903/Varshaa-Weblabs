<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'admin',
            'last_name' => 'varshaweb',
            'email' => 'admin@yopmail.com',
            'password' => bcrypt('Admin@123'),
            'role_id' => 1,
            'status' => 1,
        ]);
    }
}
