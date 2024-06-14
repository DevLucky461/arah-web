<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Room;
use App\Models\Message;
use App\Models\RoomInfo;
use App\Models\AppSetting;

use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;


class AuthenticationController extends Controller
{
    public function checkToken(Request $request)
    {
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();

        if ($request->email != null) {
            $userData = UserInfo::leftJoin('users', 'users.id', '=', 'user_info.user_id')
                ->where('users.email', $request->email)
                ->select([
                    'users.id', 'users.name', 'users.full_name', 'users.email', 'user_info.phone',
                    'users.image', 'user_info.nric', 'user_info.nu_member', 'user_info.dob',
                    'user_info.gender', 'user_info.occupation', 'user_info.income',
                    'user_info.country', 'user_info.state',
                ])
                ->first();
        } else if ($request->phone_number != null) {
            $userData = UserInfo::leftJoin('users', 'users.id', '=', 'user_info.user_id')
                ->where('user_info.phone', "+" . $request->phone_number)
                ->select(['users.id', 'users.name', 'users.email', 'user_info.phone', 'users.image'])
                ->first();
        } else {
            $userData = UserInfo::leftJoin('users', 'users.id', '=', 'user_info.user_id')
                ->where('users.id', $user->id)
                ->select([
                    'users.id', 'users.name', 'users.full_name', 'users.email', 'user_info.phone',
                    'users.image', 'user_info.nric', 'user_info.nu_member', 'user_info.dob',
                    'user_info.gender', 'user_info.occupation', 'user_info.income',
                    'user_info.country', 'user_info.state', 'user_info.address_key', 'user_info.public_key',
                ])
                ->first();
        }

        return response()->json(array(
            "success" => true,
            "user" => $userData,
            "message" => "Token Validated",
        ));
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $token = "";
        if (Auth::attempt(array('name' => $request->username, 'password' => $request->password))) {
            $token = auth('api')->login($user);
            session(['token' => $token]);
            return response()->json(array(
                "success" => true,
                "token" => $token,
                "user" => $user,
                "message" => "User Authenticated"
            ));
        } else {
            return response()->json(array(
                "success" => false,
                "token" => $token,
                "user" => $user,
                "message" => "Invalid credentials, Please login again"
            ));
        }
    }

    public function getPhone(Request $request)
    {
        //phone
        $user = UserInfo::leftJoin('users', 'users.id', '=', 'user_info.user_id')
            ->where('user_info.phone', "+" . $request->phone_number)
            ->select([
                'users.id', 'users.name', 'users.full_name', 'users.email', 'user_info.phone',
                'users.image', 'user_info.nric', 'user_info.nu_member', 'user_info.dob',
                'user_info.gender', 'user_info.occupation', 'user_info.income',
                'user_info.country', 'user_info.state', 'user_info.address_key', 'user_info.public_key',
            ])
            ->first();

        //send sms
        $token = '';
        // TODO: You should uncomment this.
        $account_sid = env('TWILIO_SID', '');
        $auth_token = env('TWILIO_AUTH_TOKEN', '');
        $randomNumber = $this->generateRandomString();
        try {
            $twilio = new Client($account_sid, $auth_token);
        } catch (ConfigurationException $e) {
            Log::error($e->getMessage());
        }

        try {
            $message = $twilio->messages
                ->create("+" . $request->phone_number,
                    [
                        "body" => "Your ARAH verification code : " . $randomNumber,
                        "from" => env("TWILIO_NUMBER", "+15392245263")
                    ]);

            if ($user != null)
                $token = auth('api')->login(User::firstWhere('id', $user['id']));
            return response()->json(array(
                "success" => true,
                "user" => $user,
                "token" => $token,
                "OTP" => $randomNumber,
                "message" => "Sms Send"
            ));
        } catch (TwilioException $e) {
            return response()->json(array(
                "success" => false,
                "message" => $e->getCode()
            ));
        }
    }

    public function getPhoneNameImage(Request $request)
    {
        //phone_number, name, image
        if ($request->name == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Please Enter Name"
            ));
        } else if ($request->phone_number == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Please send Phone"
            ));
        }

        $previousPhone = UserInfo::where('phone', "+" . $request->phone_number)->first();

        if ($previousPhone != null) {
            $user = User::where('id', $previousPhone->user_id)->first();

            $token = auth('api')->login($user);

            return response()->json(array(
                "success" => true,
                "token" => $token,
                "user" => $user,
                "message" => "User Authenticated"
            ));
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storages/profiles'), $fileName);

            $user = User::create([
                "name" => $request->name,
                "image" => "/storages/profiles/" . $fileName,
            ]);
        } else {
            $user = User::create([
                "name" => $request->name,
            ]);
        }

        $userInfo = UserInfo::create([
            "user_id" => $user->id,
            "phone" => "+" . $request->phone_number
        ]);

        $userData = User::where('id', $user->id)->first();
        $user->assignRole("user");
        $token = auth('api')->login($user);

        //create room and message

        $room = Room::create([
            "user_id" => $user->id,
            "user_type" => "admin",
            "UUID" => $UUID = Str::uuid(),
            "rooms_notification" => "off"
        ]);

        RoomInfo::create([
            "UUID" => $room->UUID,
            "group_name" => "ARAH Network",
            "group_type" => "group",
        ]);

        Message::create([
            "user_id" => null,
            "UUID" => $room->UUID,
            "message" => 'Hi ' . $user->name . ', welcome to ARAH! If you are NU Member, please fill in your information at https://arahglobal.com/register to redeem your coins and insurance.',
            "status" => "",
            "message_type" => "text",
        ]);

        //create notification
        AppSetting::create([
            "language" => "english",
            "user_id" => $user->id,
        ]);

        return response()->json(array(
            "success" => true,
            "token" => $token,
            "user" => $userData,
            "message" => "User Authenticated"
        ));
    }

    public function register(Request $request)
    {
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();
        $user->email = $request->email;
        $user->full_name = $request->full_name;
        $user->save();

        $userInfo = UserInfo::firstWhere('user_id', $user->id);
        $userInfo->nric = $request->id_number;
        $userInfo->dob = $request->dob;
        $userInfo->gender = $request->gender;
        $userInfo->occupation = $request->occupation;
        $userInfo->income = $request->income;
        $userInfo->state = $request->state;
        $userInfo->nu_member = $request->nu_member;
        $userInfo->save();

        $userData = UserInfo::leftJoin('users', 'users.id', '=', 'user_info.user_id')
            ->where('users.id', $user->id)
            ->select([
                'users.id', 'users.name', 'users.full_name', 'users.email', 'user_info.phone',
                'users.image', 'user_info.nric', 'user_info.nu_member', 'user_info.dob',
                'user_info.gender', 'user_info.occupation', 'user_info.income',
                'user_info.country', 'user_info.state', 'user_info.address_key', 'user_info.public_key',
            ])
            ->first();

        return response()->json(array(
            "success" => true,
            "user" => $userData,
            "message" => "User Registered"
        ));
    }

    public function addContact(Request $request)
    {
        //token //phone_number
        $phone_number = $request->phone_number;
        $userData = collect();

        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        }

        if ($request->phone_number == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Phone Number Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();


        foreach ($phone_number as $key => $phone) {
            $userInfo = UserInfo::where("phone", "+" . str_replace("-", "", $phone))->first();

            if ($userInfo != null) {
                $userData->push(
                    User::select('users.id', 'users.name', 'users.image', 'user_info.phone')
                        ->where('users.id', $userInfo->user_id)
                        ->leftJoin('user_info', 'user_info.user_id', 'users.id')
                        ->first());
            }
        }
        return response()->json(array(
            "success" => true,
            "contact" => $userData,
        ));
    }

    public function edit_profile_photo(Request $request)
    {
        //token, profile_photo
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();

        if ($user->image != null) {
            $pathFile = explode('/', $user->image);
            $end = end($pathFile);

            if (file_exists(public_path('storages/profiles/' . $end))) {
                unlink(public_path('storages/profiles/' . $end));
            }//delete user image
        }

        $file = $request->file('profile_photo');
        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('storages/profiles'), $fileName);

        User::where("id", $user->id)->update([
            "image" => '/storages/profiles/' . $fileName,
        ]);

        return response()->json(array(
            "success" => true,
            "message" => "Profile Photo Updated",
            "image" => '/storages/profiles/' . $fileName
        ));
    }

    public function edit_profile_name(Request $request)
    {
        //token, profile_name
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        } else if ($request->profile_name == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Profile Name Required"
            ));
        }
        $user = JWTAuth::parseToken()->authenticate();

        User::where("id", $user->id)->update([
            "name" => $request->profile_name
        ]);

        return response()->json(array(
            "success" => true,
            "message" => "Profile Name Updated"
        ));
    }

    public function edit_profile_phone(Request $request)
    {
        //token, profile_phone
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        } else if ($request->profile_phone == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Profile Phone Required"
            ));
        }
        $user = JWTAuth::parseToken()->authenticate();

        UserInfo::where("user_id", $user->id)->update([
            "phone" => $request->profile_phone
        ]);

        return response()->json(array(
            "success" => true,
            "message" => "Profile Phone Updated"
        ));
    }

    function generateRandomString($length = 5)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
