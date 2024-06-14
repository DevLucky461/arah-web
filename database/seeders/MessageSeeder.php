<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\Room;
use App\Models\RoomInfo;
class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            "user_id" => 1,
            "UUID" => "asda",
            "message" => "hai",
            "message_type" => "message",
            "status" => ""
          ]);

          Message::create([
            "user_id" => 2,
            "UUID" => "asda",
            "message" => "hai back",
            "message_type" => "message",
            "status" => ""
          ]);

          Message::create([
            "user_id" => 1,
            "UUID" => "fafa",
            "message" => "hai",
            "message_type" => "message",
            "status" => ""
          ]);

          Message::create([
            "user_id" => 3,
            "UUID" => "fafa",
            "message" => "hello ",
            "message_type" => "message",
            "status" => ""
          ]);

          //for group
          Room::create([
            "user_id"=>1,
            "user_type"=>'admin',
            'UUID'=>'fafa'
          ]);
          Room::create([
            "user_id"=>2,
            "user_type"=>'user',
            'UUID'=>'fafa'
          ]);
          Room::create([
            "user_id"=>3,
            "user_type"=>'user',
            'UUID'=>'fafa'
          ]);
          RoomInfo::create([
            "UUID"=>"fafa",
            "group_name"=>"GODLIKE",
            "group_type"=>"group",
            "group_description"=>"Every asodaosdjk"
          ]);
          Message::create([
            "user_id" => 1,
            "UUID" => "fafa",
            "message" => "hello ",
            "message_type" => "message",
            "status" => ""
          ]);
          Message::create([
            "user_id" => 2,
            "UUID" => "fafa",
            "message" => "hello to u",
            "message_type" => "message",
            "status" => ""
          ]);

          //for community
          Room::create([
            "user_id"=>1,
            "user_type"=>'admin',
            'UUID'=>'tttt'
          ]);
          Room::create([
            "user_id"=>2,
            "user_type"=>'user',
            'UUID'=>'tttt'
          ]);
          Room::create([
            "user_id"=>3,
            "user_type"=>'user',
            'UUID'=>'tttt'
          ]);
          RoomInfo::create([
            "UUID"=>"tttt",
            "group_name"=>"asddssssKE",
            "group_type"=>"community",
            "group_description"=>"Every asodaosdjk"
          ]);
          Message::create([
            "user_id" => 1,
            "UUID" => "fafa",
            "message" => "hello ",
            "message_type" => "message",
            "status" => ""
          ]);
    }
}
