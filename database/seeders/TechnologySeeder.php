<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologyArray = ['PHP', 'MySQL', 'Laravel', 'CodeIgniter', 'VueJs']; // Technology sample data
        foreach($technologyArray as $val){
            Technology::create([
                'name' => $val,
            ]);
        }
    }
}
