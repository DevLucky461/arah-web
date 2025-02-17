<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesPermissionSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(MosqueSeeder::class);
    }
}
