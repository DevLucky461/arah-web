<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Transaction;
use App\Models\UserInfo;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function view_transactions(Request $request)
    {
        //token
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();
        $userinfo = UserInfo::where('user_id', $user->id)->first();

        if ($userinfo->address_key == null) {
            return response()->json(array(
                "success" => false,
                "message" => "Address Key Required"
            ));
        }
        $data = [];
        $data['coins_balance'] = "60,000";
        $data['market_price'] = '';

        $trans = Transaction::where('user_id', $user->id)->latest()->first();
        $response = Http::get('https://nodes.wavesnodes.com/transactions/address/' . $userinfo->address_key . '/limit/1000');
        $balance_response = Http::get('https://nodes.wavesnodes.com/assets/balance/' . $userinfo->address_key . '/G4jowGKiLsW1hUE8sF2VASNtHUHjELXGAshQugc2zcq6');

        if ($response->failed() || $balance_response->failed()) {
            return response()->json(array(
                "success" => false,
                "message" => "Wrong address key.\nMinimum 60 characters"
            ));
        }

        if ($trans == null) {
            foreach ($response->json()[0] as $transaction) {
                if (isset($transaction['assetId']) && $transaction['assetId'] == "G4jowGKiLsW1hUE8sF2VASNtHUHjELXGAshQugc2zcq6") {
                    if ($transaction['sender'] != $userinfo->address_key) {
                        Transaction::create([
                            "transactionid" => $transaction['id'],
                            "user_id" => $user->id,
                            "quantity_of_coins" => $transaction['amount'],
                            "description" => "Received from " . $transaction['sender'],
                            "operation" => "+",
                            "wave_timestamp" => Carbon::createFromTimestamp($transaction['timestamp'] / 1000)->format('Y-m-d H:i:s')
                        ]);
                    }
                    if ($transaction['sender'] == $userinfo->address_key) {
                        Transaction::create([
                            "transactionid" => $transaction['id'],
                            "user_id" => $user->id,
                            "quantity_of_coins" => $transaction['amount'],
                            "description" => "Transfer to " . $transaction['recipient'],
                            "operation" => "-",
                            "wave_timestamp" => Carbon::createFromTimestamp($transaction['timestamp'] / 1000)->format('Y-m-d H:i:s')
                        ]);
                    }
                }
            }
        } else {
            foreach ($response->json()[0] as $transaction) {
                if (isset($transaction['assetId']) && $transaction['assetId'] == "G4jowGKiLsW1hUE8sF2VASNtHUHjELXGAshQugc2zcq6") {
                    $date = Carbon::create(Carbon::parse($trans->wave_timestamp)->toDateTimeString())->getTimestamp();
                    $php_timestamp = intval($transaction['timestamp'] / 1000);
                    //dd($date , $php_timestamp);
                    if ($php_timestamp > $date) {
                        if ($transaction['sender'] != $userinfo->address_key) {
                            Transaction::create([
                                "transactionid" => $transaction['id'],
                                "user_id" => $user->id,
                                "quantity_of_coins" => $transaction['transfers']['amount'],
                                "description" => "Received from " . $transaction['sender'],
                                "operation" => "+",
                                "wave_timestamp" => Carbon::createFromTimestamp($transaction['timestamp'] / 1000)->format('Y-m-d H:i:s'),
                            ]);
                        }

                        if ($transaction['sender'] == $userinfo->address_key) {
                            Transaction::create([
                                "transactionid" => $transaction['id'],
                                "user_id" => $user->id,
                                "quantity_of_coins" => $transaction['amount'],
                                "description" => "Transfer to " . $transaction['recipient'],
                                "operation" => "-",
                                "wave_timestamp" => Carbon::createFromTimestamp($transaction['timestamp'] / 1000)->format('Y-m-d H:i:s')
                            ]);
                        }
                    } else {
                        break;
                    }
                }
            }
        }

        $coins_transaction = DB::table('transactions')
            ->select('transactionid', 'quantity_of_coins', 'description', 'operation', 'wave_timestamp')
            ->where('user_id', $user->id)
            ->orderby('wave_timestamp', "desc")
            ->get();

        $data['transactions'] = $coins_transaction;
        $data['coins_balance'] = $balance_response->json()['balance'];

        return response()->json(array(
            "success" => true,
            "data" => $data,
        ));
    }

    public function get_address_public_key(Request $request)
    {
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        } else if ($request->address_key == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Address Key Required"
            ));
        } else if ($request->public_key == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Public Key Required"
            ));
        }

        $response = Http::get('https://nodes.wavesnodes.com/transactions/address/' . $request->address_key . '/limit/1000');
        $balance_response = Http::get('https://nodes.wavesnodes.com/assets/balance/' . $request->address_key . '/G4jowGKiLsW1hUE8sF2VASNtHUHjELXGAshQugc2zcq6');

        if ($response->failed() || $balance_response->failed()) {
            return response()->json(array(
                "success" => false,
                "message" => "Wrong address key.\nMinimum 60 characters"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();

        UserInfo::where('user_id', $user->id)->update([
            "address_key" => $request->address_key,
            "public_key" => $request->public_key,
        ]);

        return response()->json(array(
            "success" => true,
            "message" => "Address & Public key saved",
        ));
    }
}
