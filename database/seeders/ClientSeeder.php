<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use App\Helpers\Helper;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hearAboutUsArray = Helper::getHearAboutUsArray();
        $technologyArray = Helper::getTechnologyArray();
        for ($i=0; $i < 100; $i++) {
            $productData[] = [
                'first_name' => 'client'.Str::random(3),
                'last_name' => 'client'.Str::random(3),
                'email' => 'client'.Str::random(4).'@yopmail.com',
                'password' => bcrypt('Client@123'),
                'phone' => implode('', str_split(rand(100000000, 999999999))),
                'hear_about_us' => array_rand($hearAboutUsArray,1),
                'technology_id' => array_rand($technologyArray,1),
                'role_id' => 2,
                'status' => 1,
            ];
        }

        // custom set client user for login
        $productData[] = [
            'first_name' => 'Hiren',
            'last_name' => 'Patel',
            'email' => 'hiren@yopmail.com',
            'password' => bcrypt('Hiren@123'),
            'phone' => implode('', str_split(rand(100000000, 999999999))),
            'hear_about_us' => array_rand($hearAboutUsArray,1),
            'technology_id' => array_rand($technologyArray,1),
            'role_id' => 2,
            'status' => 1,
        ];

        foreach ($productData as $product) {
            User::create($product);
        }
    }
}
