<?php

namespace App\Http\Controllers;

use App\Models\CoinAccount;
use App\Models\CoinHolder;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CoinAdminController extends Controller
{
    public function dashboard(Request $request){
        if (session()->has('locale')) {
            App::setlocale(session()->get('locale'));
        }
        else{
            App::setlocale('en');
            session()->put('locale', 'en');
        }

        $coin_account = CoinAccount::where('user_id',Auth::user()->id)->first();
        $coin_holder = CoinHolder::where('seller_id',Auth::user()->id)->with('buyer')->get();

        return view('dashboard',compact('coin_account','coin_holder'));
    }

    public function createNewSugarDaddy(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc',
            'phone' => 'required',
            'nric' => 'required',
            'amount_purchased' => 'required',
            'coin_quantity' => 'required',
        ]);
        if (session()->has('locale')) {
            App::setlocale(session()->get('locale'));
        }
        else{
            App::setlocale('en');
            session()->put('locale', 'en');
        }

        DB::beginTransaction();

        try {
            $coin_account = CoinAccount::where('user_id',Auth::user()->id)->first();
            if($coin_account->balance >= $request->coin_quantity){
                CoinAccount::where("user_id",Auth::user()->id)->update([
                    "balance"=> $coin_account->balance - $request->coin_quantity
                ]);
            }
            else{
                return back()->withError('Balance Not Enough')->withInput();
            }
            $user = User::where("email",$request->email)->first();
            if($user){
                //might need to check whether the info is it same. if not same need to do what?
            }
            else{
                $user = User::create([
                    "name"=>$request->name,
                    "email"=>$request->email,
                    "password"=>Hash::make("DefaultPasswordReset"),
                ]);
                $user_info = UserInfo::create([
                    "user_id"=>$user->id,
                    "phone"=>$request->phone,
                    "nric"=>$request->nric,
                    "nu_member"=>$request->nu_member,
                ]);
            }
            $coin_holder = CoinHolder::create([
                "serial_number"=>(string) Str::uuid(),
                "seller_id"=>Auth::user()->id,
                "buyer_id"=>$user->id,
                "amount_purchased"=>$request->amount_purchased,
                "coin_quantity"=>$request->coin_quantity,
            ]);
            
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
            return back()->withError("Invalid request")->withInput();
            // something went wrong
        }

        $coin_account = CoinAccount::where('user_id',Auth::user()->id)->first();  
        $coin_holder = CoinHolder::where('seller_id',Auth::user()->id)->with('buyer')->get();

        return view('dashboard',compact('coin_account','coin_holder'));
    }
}
