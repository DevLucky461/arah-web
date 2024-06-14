<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use Tymon\JWTAuth\Facades\JWTAuth;

class AppSettingController extends Controller
{
    public function view_settings(Request $request){

        if($request->token == ""){
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        }

        $user =  JWTAuth::parseToken()->authenticate();
        $setting = AppSetting::where('user_id', $user->id)->first();

        return response()->json(array(
            "success" => true,
            "settings" => $setting,
            "message" => "Success"
        ));
    }

    public function change_language(Request $request){

        if($request->token == ""){
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        }

        if($request->language != ""){
            AppSetting::where('user_id', $user->id)->update([
                "language" => $request->language
            ]);

            return response()->json(array(
                "success" => true,
                "message" => "Language updated successfull"
            ));
        }

        if($request->last_delete_chat != ""){
            AppSetting::where('user_id', $user->id)->update([
                "last_delete_chat" => $request->last_delete_chat
            ]);

            return response()->json(array(
                "success" => true,
                "message" => "Last Delete Chat updated successfull"
            ));
        }

        if($request->last_chat_backup != ""){
            AppSetting::where('user_id', $user->id)->update([
                "last_delete_chat" => $request->last_chat_backup
            ]);

            return response()->json(array(
                "success" => true,
                "message" => "Last Chat Backup updated successfull"
            ));
        }

        return response()->json(array(
            "success" => false,
            "message" => "language, last_delete_chat or last_chat_backup required"
        ));

    }
}
