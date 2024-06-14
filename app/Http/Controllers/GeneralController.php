<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    public function index(Request $request){
        if (session()->has('locale')) {
            App::setlocale(session()->get('locale'));
        }
        else{
            App::setlocale('bi');
            session()->put('locale', 'bi');
        }
        if (session()->has('subscribe_status')) {
            $status = session()->pull('subscribe_status');
        }
        else{
            $status = 'none';
        }
        return view('landing',compact("status"));
    }

    public function aboutUs(){
        if (session()->has('subscribe_status')) {
            $status = session()->pull('subscribe_status');
        }
        else{
            $status = 'none';
        }
        return view('about_us',compact("status"));
    }

    public function arahApp(){
        if (session()->has('subscribe_status')) {
            $status = session()->pull('subscribe_status');
        }
        else{
            $status = 'none';
        }
        return view('arah_app',compact("status"));
    }

    public function arahCoin(){
        if (session()->has('subscribe_status')) {
            $status = session()->pull('subscribe_status');
        }
        else{
            $status = 'none';
        }
        return view('arah_coin',compact("status"));
    }

    public function newsroom(){
        if (session()->has('subscribe_status')) {
            $status = session()->pull('subscribe_status');
        }
        else{
            $status = 'none';
        }
        return view('newsroom',compact("status"));
    }

    public function setEN(){
        App::setlocale('en');
        session()->put('locale', 'en');
        return redirect()->back();
    }
    public function setBI(){
        App::setlocale('bi');
        session()->put('locale', 'bi');
        return redirect()->back();
    }

    public function subscribe(Request $request){
        $validated = $request->validate([
            'email' => 'required|email:rfc',
        ]);
        $email = Subscribe::where("email",$request->email)->first();
        if(!$email){
            $email = Subscribe::create([
                'email' => $request->email,
            ]);
            $status = 'success';
        }
        else{
            $status = 'failed';
        }
        session()->put('subscribe_status', $status);
        return redirect()->back();
    }

    public function getNumber()
    {
        $total_register_with_phone = DB::select( DB::raw("select count(*) from user_info where registered_through_app ='1'") );
        $total_completed = DB::select( DB::raw("select count(*) from user_info where registered_through_app ='1' and nric is not null") );
        $total_completed_nu_member = DB::select( DB::raw("select count(*) from user_info where registered_through_app ='1' and nric is not null and nu_member = 'yes' ") );
        $total_completed_not_nu_member = DB::select( DB::raw("select count(*) from user_info where registered_through_app ='1' and nric is not null and nu_member != 'yes' ") );
        $total_wallet_linked = DB::select( DB::raw("select count(*) from user_info where registered_through_app ='1' and public_key is not null") );
        $total_unique_wallet_linked = DB::select( DB::raw("select count(distinct(public_key)) from user_info where registered_through_app ='1' and public_key is not null") );
        $total_registered_not_completed = DB::select( DB::raw("select count(*) from user_info where registered_through_app ='1' and nric is null") );

        echo$total_register_with_phone[0]->count;
        echo "<br>";
        echo $total_completed[0]->count;
        echo "<br>";
        echo $total_completed_nu_member[0]->count;
        echo "<br>";
        echo $total_completed_not_nu_member[0]->count;
        echo "<br>";
        echo $total_wallet_linked[0]->count;
        echo "<br>";
        echo $total_unique_wallet_linked[0]->count;
        echo "<br>";
        echo $total_registered_not_completed[0]->count;
    }
}
