<?php

namespace Database\Seeders;

use App\Models\Dress;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $dressName = ['Ball Gown','Mermaid/Trumpet','Empire Waist', 'Tea-Length', 'Illusion Neckline', 'Cape Dress', 'Sheath', 'A-Line', 'Off-Shoulder'];
        $img = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg'];
        for ($i = 0 ; $i <=14; $i++){
            Dress::create([
               'location_id' => mt_rand(1,3),
               'name' => $dressName[$i % 9],
               'location' => $faker->sentence(2),
               'price' => $faker->numberBetween($min = 1000, $max = 5000),
               'description' => $faker->sentence(22),
               'img'=>$img[$i % 5]
            ]);
        }
    }
}
