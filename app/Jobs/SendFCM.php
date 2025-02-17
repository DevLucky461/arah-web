<?php

namespace App\Jobs;

use App\Helper\Helper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendFCM implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $notification_id;
    public $title;
    public $message;
    public $data;
    public $image;
    public $icon;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($notification_id, $title, $message, $data = null, $image = null, $icon = null)
    {
        $this->notification_id = $notification_id;
        $this->title = $title;
        $this->message = $message;
        $this->data = $data;
        $this->image = $image;
        $this->icon = $icon;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Helper::sendPushNotification($this->notification_id, $this->title, $this->message, $this->data, $this->image, $this->icon);
    }
}
