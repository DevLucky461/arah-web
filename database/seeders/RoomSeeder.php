<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\Message;
use App\Models\RoomImage;
use Illuminate\Support\Str;
use App\Models\RoomInfo;

class RoomSeeder extends Seeder
{
    public function run()
    {
          $UUID = Str::uuid();
          $UUID2 = Str::uuid();
          $UUID3 = Str::uuid();
          $UUID4 = Str::uuid();

          Room::create([
            "user_id" => 1,
            "user_type" => "user",
            "UUID" => $UUID
          ]); 

           Room::create([
            "user_id" => 2,
            "user_type" => "user",
            "UUID" => $UUID
          ]);

          RoomInfo::create([
            "UUID" =>  $UUID,
            "group_type" => "personal",
          ]);

          Room::create([
            "user_id" => 1,
            "user_type" => "user",
            "UUID" => $UUID2
          ]); 

          Room::create([
            "user_id" => 3,
            "user_type" => "user",
            "UUID" => $UUID2
          ]); 

          RoomInfo::create([
            "UUID" =>  $UUID2,
            "group_type" => "personal",
          ]);
         
          Room::create([
            "user_id" => 1,
            "user_type" => "user",
            "UUID" => $UUID3
          ]); 

          Room::create([
            "user_id" => 4,
            "user_type" => "user",
            "UUID" => $UUID3
          ]); 

          RoomInfo::create([
            "UUID" =>  $UUID3,
            "group_type" => "personal",
          ]);
      
          Room::create([
            "user_id" => 3,
            "user_type" => "user",
            "UUID" => $UUID4
          ]); 

          Room::create([
            "user_id" => 4,
            "user_type" => "user",
            "UUID" => $UUID4
          ]);

          RoomInfo::create([
            "UUID" =>  $UUID4,
            "group_type" => "personal",
          ]);
    }
}
