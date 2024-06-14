<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    
    public function run()
    {
        $userAll = User::all();
        DB::table('transactions')->truncate();
    
        for ($i=0; $i < 10; $i++) { 

            foreach ($userAll as $key => $value) {

                Transaction::create([
                    "transactionid" => Str::uuid(),
                    "user_id" => $value->id,
                    "operation" => "+",
                    "quantity_of_coins" => 100 + $key,
                    "description" => "Buying new coins"
                ]);
            }
        }
    }
}
