<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRoom;
use App\Models\Room;
use Illuminate\Support\Str;
use App\Models\UserInfo;
use App\Models\User;
use App\Models\Message;
use App\Events\ChatEvent;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;

class DebugController extends Controller
{
   public function viewPage(){

    $user = User::find(1);
    $UUID = "asda";

    $message = Message::where("UUID", $UUID)->get();

    $receiver = User::where('users.id', 2)
    ->leftJoin('user_info', 'user_info.user_id' , '=', 'users.id')
    ->first();
    //dd($receiver);

    return view('debug.debug', compact( 'user', 'UUID', 'message', 'receiver'));

   }

   public function viewPage2(){

      $user = User::find(2);
      $UUID = "asda";

      $message = Message::where("UUID", $UUID)->get();

      $receiver = User::where('users.id', 2)
      ->leftJoin('user_info', 'user_info.user_id' , '=', 'users.id')
      ->first();


      //dd($receiver);

      return view('debug.debug', compact( 'user', 'UUID', 'message', 'receiver'));

     }

     public function people_view(){

      $allUser  = User::where('id', '!=', 1)->get();
      $user = User::find(1);
      $token = auth('api')->login($user);

      return view('debug.user', compact('user', 'allUser','token'));
     }

     public function roomView(Request $request){

     }
}
