<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mosque;

class MosqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mosque::create(["mosque_name" => "Masjid Jamek Sri Petaling","latitude"=>"3.0692", "longitude"=> "101.6891" ]);
        Mosque::create(["mosque_name" => "Masjid Jamek Ibnu Khaldun","latitude"=>"3.0641", "longitude"=> "101.7093"]);
        Mosque::create(["mosque_name" => "Masjid Abdul Rahman Bin Auf","latitude"=>"3.0794", "longitude"=> "101.6658"]); 
    }
}
