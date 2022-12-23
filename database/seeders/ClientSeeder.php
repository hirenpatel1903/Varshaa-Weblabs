<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) {
            $productData[] = [
                'first_name' => 'client'.Str::random(3),
                'last_name' => 'client'.Str::random(3),
                'email' => 'client'.Str::random(4).'@yopmail.com',
                'password' => bcrypt('Client@123'),
                'role_id' => 2,
                'status' => 1,
            ];
        }

        foreach ($productData as $product) {
            User::create($product);
        }
    }
}
