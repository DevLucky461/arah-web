<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CoinAccount;
use App\Models\User;
use App\Models\UserInfo;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (session()->has('locale')) {
            App::setlocale(session()->get('locale'));
        }
        else{
            App::setlocale('bi');
            session()->put('locale', 'bi');
        }
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email_account' => 'required|string|email|max:255|unique:users,email',
            //'password' => 'required|string|confirmed|min:8',
            'phone'=>'required|string|max:255',
            //'nu_member'=>'required',
            //'dob'=>'required',
        ]);
        
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email_account,
                //'password' => Hash::make($request->password), disable as no login required
                "password"=>Hash::make("DefaultPasswordReset"),
            ]);
            
            $user->assignRole('user');
            UserInfo::create([
                'user_id'=> $user->id,
                'phone' => $request->phone,
                'nric' => $request->nric,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'occupation' => $request->occupation,
                'income' => $request->income,
                'state' => $request->state,
                'others_residency' => $request->others_residency,
                'nu_member' => $request->nu_member,
                //'interested_quantity'=>$request->interested_quantity,
               // 'email_array'=>implode(",",$request->email_array)
            ]);
           /* if($request->nu_member == "nu_member1"){
                CoinAccount::create([
                    'user_id'=> $user->id,
                    'initial_coin' => 100, 
                    'balance' => 100,
                ]);
            }
            else{*/
                CoinAccount::create([
                    'user_id'=> $user->id,
                    'initial_coin' => 0, 
                    'balance' => 0,
                ]);
            //}
            
            DB::commit();
            //Auth::login($user); dont need to login yet
            //event(new Registered($user));
            
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
            return back()->withError("Invalid request")->withInput();
            // something went wrong
        }
        return view("thank-you");
        //return redirect(RouteServiceProvider::HOME);
    }
}
