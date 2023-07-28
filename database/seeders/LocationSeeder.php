<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location = ['Singapore','Bali','Jakarta'];
        for ($i = 0 ; $i <=2; $i++){
            Location::create([
                'name' => $location[$i],
            ]);
        }
    }
}
