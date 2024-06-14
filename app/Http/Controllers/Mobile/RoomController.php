<?php

namespace App\Http\Controllers\Mobile;

use App\Events\ChatEvent;
use App\Jobs\SendFCM;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\UserInfo;
use App\Models\RoomInfo;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;


class RoomController extends Controller
{
    public function view_room(Request $request)
    {
        //token
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        }
        $user = JWTAuth::parseToken()->authenticate();

        $user->fcm_token = $request->fcm_token;
        $user->save();

        $rooms = Room::where('user_id', $user->id)->get();

//        $personalData = Room::select('rooms.id', 'rooms.user_id', 'rooms.UUID', 'users.name', 'users.image', 'user_info.phone',
//            DB::raw('max(all_messages.created_at) as last_received'), DB::raw("null as last_message"),
//            DB::raw('count(unread_messages.message) as unread'), 'rooms_info.group_type')
//            ->whereIn('rooms.UUID', $rooms->pluck('UUID'))
//            ->where('rooms.user_id', '!=', $user->id)
//            ->leftJoin('users', 'rooms.user_id', '=', 'users.id')
//            ->leftJoin('user_info', 'user_info.user_id', '=', 'users.id')
//            ->rightJoin('rooms_info', function ($join) {
//                $join->on('rooms_info.UUID', '=', 'rooms.UUID');
//                $join->on('rooms_info.group_type', '=', DB::raw("'personal'"));
//            })
//            ->leftJoin('messages as unread_messages', function ($join) use ($user) {
//                $join->on('unread_messages.UUID', '=', 'rooms.UUID');
//                $join->on('unread_messages.user_id', '!=', DB::raw($user->id));
//                $join->on('unread_messages.status', '=', DB::raw("'unread'"));
//            })
//            ->leftJoin('messages as all_messages', function ($join) use ($user) {
//                $join->on('all_messages.UUID', '=', 'rooms.UUID');
//            })
//            ->groupBy('rooms.id', 'rooms.user_id', 'rooms.UUID', 'users.name', 'users.image', 'user_info.phone', 'rooms_info.group_type')
//            ->get();
//
//
//        $roomData = Room::select('rooms.id', 'rooms.user_id', 'rooms.UUID', 'rooms_info.group_name',
//            'rooms_info.group_image', 'user_info.phone', DB::raw('max(all_messages.created_at) as last_received'),
//            DB::raw("null as last_message"), DB::raw('count(unread_messages.message) as unread'), 'rooms_info.group_type')
//            ->whereIn('rooms.UUID', $rooms->pluck('UUID'))
//            //->where('rooms.user_id', $user->id)
//            ->where('rooms.user_type', 'admin')
//            ->leftJoin('users', 'rooms.user_id', '=', 'users.id')
//            ->leftJoin('user_info', 'user_info.user_id', '=', 'users.id')
//            ->rightJoin('rooms_info', function ($join) {
//                $join->on('rooms_info.UUID', '=', 'rooms.UUID');
//                $join->on('rooms_info.group_type', "!=", DB::raw("'personal'"));
//            })
//            ->leftJoin('messages as unread_messages', function ($join) use ($user) {
//                $join->on('unread_messages.UUID', '=', 'rooms.UUID');
//                $join->on('unread_messages.user_id', '!=', DB::raw($user->id));
//                $join->on('unread_messages.status', '=', DB::raw("'unread'"));
//            })
//            ->leftJoin('messages as all_messages', function ($join) use ($user) {
//                $join->on('all_messages.UUID', '=', 'rooms.UUID');
//            })
//            ->groupBy('rooms.id', 'rooms.user_id', 'rooms.UUID', 'rooms_info.group_name', 'rooms_info.group_image', 'user_info.phone', 'rooms_info.group_type')
//            ->union($personalData)
//            ->get();

        $personalDatas = Room::select('rooms.id', 'rooms.user_id', 'rooms.UUID', 'users.name',
            'users.image', 'user_info.phone', DB::raw('max(all_messages.created_at) as last_received'),
            DB::raw("rooms.created_at as room_created"), 'rooms_info.group_type')
            ->whereIn('rooms.UUID', $rooms->pluck('UUID'))
            ->where('rooms.user_id', '!=', $user->id)
            ->leftJoin('users', 'rooms.user_id', '=', 'users.id')
            ->leftJoin('user_info', 'user_info.user_id', '=', 'users.id')
            ->rightJoin('rooms_info', function ($join) {
                $join->on('rooms_info.UUID', '=', 'rooms.UUID');
                $join->on('rooms_info.group_type', '=', DB::raw("'personal'"));
            })
            ->leftJoin('messages as all_messages', function ($join) use ($user) {
                $join->on('all_messages.UUID', '=', 'rooms.UUID');
            })
            ->groupBy('rooms.id', 'rooms.user_id', 'rooms.UUID', 'users.name', 'users.image', 'user_info.phone', 'rooms_info.group_type');

        $datas = Room::select('rooms.id', 'rooms.user_id', 'rooms.UUID', 'rooms_info.group_name',
            'rooms_info.group_image', 'user_info.phone', DB::raw('max(all_messages.created_at) as last_received'),
            DB::raw("rooms.created_at as room_created"), 'rooms_info.group_type')
            ->whereIn('rooms.UUID', $rooms->pluck('UUID'))
            //->where('rooms.user_id', $user->id)
            ->where('rooms.user_type', 'admin')
            ->leftJoin('users', 'rooms.user_id', '=', 'users.id')
            ->leftJoin('user_info', 'user_info.user_id', '=', 'users.id')
            ->rightJoin('rooms_info', function ($join) {
                $join->on('rooms_info.UUID', '=', 'rooms.UUID');
                $join->on('rooms_info.group_type', "!=", DB::raw("'personal'"));
            })
            ->leftJoin('messages as all_messages', function ($join) use ($user) {
                $join->on('all_messages.UUID', '=', 'rooms.UUID');
            })
            ->groupBy('rooms.id', 'rooms.user_id', 'rooms.UUID', 'rooms_info.group_name', 'rooms_info.group_image', 'user_info.phone', 'rooms_info.group_type')
            ->union($personalDatas)
            ->get();

        $roomData = [];
        foreach ($datas as $data) {
            if ($data['group_name'] != null && $data['group_name'] != '') {
                $messages = Message::where('UUID', DB::raw("'" . $data['UUID'] . "'"))
                    ->where('user_id', '!=', DB::raw($user->id))
                    ->get();

                $unread = 0;
                foreach ($messages as $message) {
                    $status = $message->status;
                    $ids = explode(" ", $status);
                    if (!in_array($user->id, $ids)) $unread++;
                }

                $data['unread'] = $unread;
                $last_message = Message::select('user_id', 'message', 'message_type')
                    ->orderBy('created_at', 'desc')
                    ->firstWhere('UUID', DB::raw("'" . $data['UUID'] . "'"));
                if ($last_message) {
                    $last_msg_user = User::firstWhere('id', $last_message->user_id);
                    $data['last_message'] = $last_message->message;
                    $data['last_message_type'] = $last_message->message_type;
                    $data['last_msg_sender_id'] = $last_message->user_id;
                    if ($last_msg_user)
                        $data['last_msg_sender_name'] = $last_msg_user->name;
                }
                $roomData[] = json_decode(json_encode($data));
            }
        }

        return response()->json(array(
            "success" => true,
            "room" => $roomData,
            "message" => "Success"
        ));
    }

    public function create_room_for_two(Request $request)
    {
        //token receiver_phone
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        } else if (($request->receiver_phone == null || $request->receiver_phone == "") &&
            ($request->receiver_id == null || $request->receiver_id == "")) {
            return response()->json(array(
                "success" => false,
                "message" => "No Receiver Data"
            ));
        }

        $receiverInfo = null;
        if ($request->receiver_phone != null && $request->receiver_phone != "")
            $receiverInfo = UserInfo::where('phone', $request->receiver_phone)->first();
        if ($request->receiver_id != null && $request->receiver_id != "")
            $receiverInfo = UserInfo::where('user_id', $request->receiver_id)->first();

        if ($receiverInfo == null) {
            return response()->json(array(
                "success" => false,
                "message" => "Receiver not found"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();
        $receiver = User::where('id', $receiverInfo->user_id)->first();
        $room = Room::where('rooms.user_id', $user->id)
            ->leftJoin('rooms_info', 'rooms_info.UUID', '=', 'rooms.UUID')
            ->where('rooms_info.group_type', DB::raw("'personal'"))
            ->select('rooms.UUID')
            ->get();

        $receiverCheck = Room::whereIn('UUID', $room->pluck('UUID')) //get UUID record
        ->where('user_id', '!=', $user->id) // get data not userid
        ->where('user_id', $receiver->id) // get data of receiver
        ->first();

        if ($receiverCheck == null) {
            $UUID = Str::uuid();
            Room::create([
                "user_id" => $user->id,
                "user_type" => "user",
                "UUID" => $UUID,
                "rooms_notification" => "on"
            ]);

            Room::create([
                "user_id" => $receiver->id,
                "user_type" => "user",
                "UUID" => $UUID,
                "rooms_notification" => "on"
            ]);

            RoomInfo::create([
                "UUID" => $UUID,
                "group_type" => "personal"
            ]);

            return response()->json(array(
                "success" => true,
                "UUID" => $UUID,
                "phone" => $receiverInfo->phone,
                "message" => "Room Created"
            ));
        }

        return response()->json(array(
            "success" => true,
            "UUID" => $receiverCheck->UUID,
            "phone" => $receiverInfo->phone,
            "message" => "Room Found"
        ));
    }

    public function delete_room(Request $request)
    {
        //token, UUID
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();
        $room = Room::where('UUID', $request->UUID)->where('user_id', $user->id)->delete();

        if ($room > 0) {
//            Room::where("UUID", $request->UUID)->delete();
            return response()->json(array(
                "success" => true,
                "message" => "Room deleted"
            ));
        }

        return response()->json(array(
            "success" => false,
            "message" => "Cannot find room"
        ));
    }

    public function view_people(Request $request)
    {
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();
        $userData = User::select('users.id', 'users.name', 'users.email', 'users.image', 'user_info.phone')
            ->where('users.id', '!=', $user->id)
            ->leftJoin('user_info', 'user_info.user_id', '=', 'users.id')
            ->orderBy('name')
            ->get();

        return response()->json(array(
            "success" => true,
            "user" => $userData,
            "message" => "View People Success"
        ));
    }

    public function view_group_details(Request $request)
    {
        //token , UUID
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        } else if ($request->UUID == "") {
            return response()->json(array(
                "success" => false,
                "message" => "UUID Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate(); //validate token

        $room = RoomInfo::where('UUID', $request->UUID)
            ->select('UUID', 'group_image', 'group_name', 'group_description', 'created_at')
            ->first();

        $roomMember = Room::where('rooms.UUID', $request->UUID)
            ->select('users.id', 'rooms.user_type', 'users.name', 'users.image', 'rooms.created_at as date_join', 'rooms.rooms_notification')
            ->leftJoin('users', 'users.id', '=', 'rooms.user_id')
            ->orderby('date_join')
            ->get();

        return response()->json(array(
            "success" => true,
            "room_details" => $room,
            "room_member" => $roomMember,
        ));
    }

    public function create_group_room(Request $request)
    {
        //multiple phone_number // token //group_name //group_type
        if ($request->phone_number == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Phone Number Required"
            ));
        } else if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        } else if ($request->group_name == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Group Name Required"
            ));
        } else if ($request->group_type == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Group Type Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();
        $userInfo = UserInfo::where('user_id', $user->id)->first();
        $UUID = Str::uuid();

        $admin = Room::create([
            "user_id" => $user->id,
            "user_type" => "admin",
            "UUID" => $UUID,
            "rooms_notification" => "on"
        ]);

        if ($request->hasFile('group_image')) {
            $file = $request->file('group_image');
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storages/files'), $fileName);

            RoomInfo::create([
                "UUID" => $UUID,
                "group_image" => "/storages/files/" . $fileName,
                "group_name" => $request->group_name,
                "group_type" => $request->group_type
            ]);
        } else {
            RoomInfo::create([
                "UUID" => $UUID,
                "group_name" => $request->group_name,
                "group_type" => $request->group_type
            ]);
        }

        $message = Message::create([
            "user_id" => null,
            "UUID" => $request->UUID,
            "message" => "",
            "message_type" => "notification",
            "status" => "",
        ]);

        $phone_number_data = explode(',', $request->phone_number);

        foreach ($phone_number_data as $phone) {
            $userInfo = UserInfo::where('phone', $phone)->first();
            $userData = User::where('id', $userInfo->user_id)->first();

            Room::create([
                "user_id" => $userData->id,
                "user_type" => "user",
                "UUID" => $UUID,
                "rooms_notification" => "on"
            ]);

            if ($message->message == "")
                $message->message = $userData->name;
            else
                $message->message = $message->message . ", " . $userData->name;
        }
        $message->save();

        $fcm_msg = $message->message;

        $fcm_users = Room::leftJoin('users', 'users.id', '=', 'rooms.user_id')
            ->where('rooms.UUID', $UUID)
            ->where('users.fcm_token', '!=', null)
            ->where('users.fcm_token', '!=', '')
            ->where('rooms.rooms_notification', 'on')
            ->select([
                'users.fcm_token',
            ])
            ->get();

        $data = [];
        $data['user_phone'] = $userInfo->phone;
        $data['user_image'] = $user->image;
        $data["sender_name"] = $user->name;
        $data["message"] = $message->message;
        $data["message_type"] = $message->message_type;
        $data["UUID"] = $message->UUID;
        $data["created_at"] = $message->created_at->toDateTimeString();

        event(new ChatEvent($data));

        foreach ($fcm_users as $fcm_user)
            SendFCM::dispatch($fcm_user->fcm_token, $user->name, $fcm_msg, $data);

        return response()->json(array(
            "success" => true,
            "UUID" => $UUID,
            "message" => "Group Room Created"
        ));
    }

    public function delete_group_room(Request $request)
    {
        //token //UUID
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        } else if ($request->UUID == "") {
            return response()->json(array(
                "success" => false,
                "message" => "UUID Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();
        $room = Room::where('user_id', $user->id)->where('UUID', $request->UUID)->first();

        if ($room != null)
            Room::where('user_id', $user->id)->where('UUID', $request->UUID)->delete();
        return response()->json(array(
            "success" => true,
            "message" => "Group Room deleted"
        ));
    }

    public function room_change_notification(Request $request)
    {
        //token //UUID
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        } else if ($request->UUID == "") {
            return response()->json(array(
                "success" => false,
                "message" => "UUID Required"
            ));
        } else if ($request->rooms_notification == null) {
            return response()->json(array(
                "success" => false,
                "message" => "Notification Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();
        $room = Room::where('user_id', $user->id)->where('UUID', $request->UUID)->first();

        if ($room != null)
            Room::where('user_id', $user->id)->where('UUID', $request->UUID)->update([
                "rooms_notification" => $request->rooms_notification
            ]);
        return response()->json(array(
            "success" => true,
            "message" => "Group Room Notification " . $request->rooms_notification
        ));
    }

    public function invite_people_room(Request $request)
    {
        //token, UUID, multiple phone_number
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        } else if ($request->UUID == "") {
            return response()->json(array(
                "success" => false,
                "message" => "UUID Required"
            ));
        } else if ($request->phone_number == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Phone Number Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();
        $userInfo = UserInfo::where('user_id', $user->id)->first();

        $message = Message::create([
            "user_id" => null,
            "UUID" => $request->UUID,
            "message" => "",
            "message_type" => "notification",
            "status" => $user->id,
        ]);

        foreach ($request->phone_number as $phone) {
            $userInfo = UserInfo::where('phone', $phone)->first();
            $userData = User::where('id', $userInfo->user_id)->first();

            $checkRoom = Room::where('user_id', $userData->id)->where('UUID', $request->UUID)->first();

            if ($checkRoom == null) {
                Room::create([
                    "user_id" => $userData->id,
                    "user_type" => "user",
                    "UUID" => $request->UUID
                ]);

                if ($message->message == "")
                    $message->message = $userData->name;
                else
                    $message->message = $message->message . ", " . $userData->name;
            }
        }
        $message->save();

        $fcm_msg = $message->message;

        $fcm_users = Room::leftJoin('users', 'users.id', '=', 'rooms.user_id')
            ->where('rooms.UUID', $request->UUID)
            ->where('users.fcm_token', '!=', null)
            ->where('users.fcm_token', '!=', '')
            ->where('rooms.rooms_notification', 'on')
            ->select([
                'users.fcm_token',
            ])
            ->get();

        $data = [];
        $data['user_phone'] = $userInfo->phone;
        $data['user_image'] = $user->image;
        $data["sender_name"] = $user->name;
        $data["message"] = $message->message;
        $data["message_type"] = $message->message_type;
        $data["UUID"] = $message->UUID;
        $data["created_at"] = $message->created_at->toDateTimeString();

        event(new ChatEvent($data));

        foreach ($fcm_users as $fcm_user)
            SendFCM::dispatch($fcm_user->fcm_token, $user->name, $fcm_msg, $data);

        return response()->json(array(
            "success" => true,
            "message" => "Invite Success"
        ));
    }

    public function edit_group_name(Request $request)
    {
        //group_name, token, UUID

        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        } else if ($request->UUID == "") {
            return response()->json(array(
                "success" => false,
                "message" => "UUID Required"
            ));
        } else if ($request->group_name == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Group Name Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();

        $roomInfo = RoomInfo::where('UUID', $request->UUID)->first();

        if ($roomInfo != null) {
            RoomInfo::where('UUID', $request->UUID)->update([
                "group_name" => $request->group_name
            ]);

            return response()->json(array(
                "success" => true,
                "message" => "Group Name Updated"
            ));
        }

        return response()->json(array(
            "success" => true,
            "message" => "Cannot find group"
        ));
    }

    public function edit_group_description(Request $request)
    {
        //group_description, token, UUID

        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        } else if ($request->UUID == "") {
            return response()->json(array(
                "success" => false,
                "message" => "UUID Required"
            ));
        } else if ($request->group_description == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Group Desription Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();

        $roomInfo = RoomInfo::where('UUID', $request->UUID)->first();

        if ($roomInfo != null) {
            RoomInfo::where('UUID', $request->UUID)->update([
                "group_description" => $request->group_description
            ]);

            return response()->json(array(
                "success" => true,
                "message" => "Group Desription Updated"
            ));
        }

        return response()->json(array(
            "success" => true,
            "message" => "Cannot find group"
        ));
    }

    public function edit_group_photo(Request $request)
    {
        //group_photo, token, UUID
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        } else if ($request->UUID == "") {
            return response()->json(array(
                "success" => false,
                "message" => "UUID Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();

        $roomInfo = RoomInfo::where('UUID', $request->UUID)->first();

        if ($roomInfo->group_image != null) {
            $pathFile = explode('/', $roomInfo->group_image);
            $end = end($pathFile);

            if (file_exists(public_path('storages/files/' . $end))) {
                unlink(public_path('storages/files/' . $end));
            }//delete user image
        }

        $file = $request->file('group_photo');
        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('storages/files'), $fileName);

        $roomInfo = RoomInfo::where('UUID', $request->UUID)->first();

        if ($roomInfo != null) {
            RoomInfo::where('UUID', $request->UUID)->update([
                "group_image" => "/storages/files/" . $fileName
            ]);

            return response()->json(array(
                "success" => true,
                "message" => "Group Photo Updated"
            ));
        }

        return response()->json(array(
            "success" => true,
            "message" => "Cannot find group"
        ));
    }
}
