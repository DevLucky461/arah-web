<?php

namespace App\Jobs;

use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\ScheduleMessage;
use App\Models\User;
use App\Models\UserInfo;
use App\Events\ChatEvent;
use App\Models\Message;

class MessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $schedule_message;

    public function __construct($schedule_message)
    {
        $this->schedule_message = $schedule_message;
    }

    public function handle()
    {
        foreach ($this->schedule_message as $item) {
            $user = User::where('id', $item->user_id)->first();
            $userInfo = UserInfo::where('user_id', $user->id)->first();

            $message_type = str_replace("schedule_", "", $item->message_type);
            Message::create([
                "user_id" => $user->id,
                "UUID" => $item->UUID,
                "message" => $item->message,
                "message_type" => $message_type,
                "status" => "",
            ]);

            $data = [];
            $data['user_phone'] = $userInfo->phone;
            $data['user_image'] = $user->image;
            $data["sender_name"] = $user->name;
            $data["message"] = $item->message;
            $data["message_type"] = $message_type;
            $data["UUID"] = $item->UUID;
            $data["created_at"] = Carbon::now()->toDateTimeString();

            event(new ChatEvent($data));

            $fcm_users = Room::leftJoin('users', 'users.id', '=', 'rooms.user_id')
                ->where('rooms.UUID', $item->UUID)
                ->where('users.fcm_token', '!=', null)
                ->where('users.fcm_token', '!=', '')
                ->where('rooms.rooms_notification', 'on')
                ->select([
                    'users.fcm_token',
                ])
                ->get();

            if ($message_type == "text")
                $fcm_msg = $item->message;
            else
                $fcm_msg = 'New media message';

            foreach ($fcm_users as $fcm_user)
                SendFCM::dispatch($fcm_user->fcm_token, $user->name, $fcm_msg, $data);

            ScheduleMessage::where('id', $item->id)->delete();
        }
    }
}
