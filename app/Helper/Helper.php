<?php

namespace App\Helper;

class Helper
{
    public static function sendPushNotification($notification_id, $title, $message, $data = null, $image = null, $icon = null)
    {
        $notification = array();
        $notification['to'] = $notification_id;
        $notification['priority'] = 'high';
        $notification['notification']['title'] = $title;
        $notification['notification']['body'] = $message ?: 'New message';
        if ($image) $notification['notification']['image'] = $image;
        if ($icon) $notification['notification']['icon'] = $icon;
        $notification['notification']['sound'] = true;

        $notification['data']['phone'] = $data['user_phone'];
        $notification['data']['name'] = $data['sender_name'];
        $notification['data']['message'] = $data['message'];
        $notification['data']['type'] = $data['message_type'];
        $notification['data']['UUID'] = $data['UUID'];
        $notification['data']['created_at'] = $data['created_at'];
        $notification['data']['image'] = $data['user_image'];

        $crl = curl_init();

        $headr = array();
        $headr[] = 'Content-type: application/json';
        $headr[] = 'Authorization: key=' . env('FCM_KEY');
        curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($crl, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($crl, CURLOPT_HTTPHEADER, $headr);

        curl_setopt($crl, CURLOPT_POST, true);
        curl_setopt($crl, CURLOPT_POSTFIELDS, json_encode($notification));
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($crl);

        curl_close($crl);

        return $response === false;
    }
}
