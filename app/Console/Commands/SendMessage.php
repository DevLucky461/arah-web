<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\ScheduleMessage;
use App\Jobs\MessageJob;

class SendMessage extends Command
{
    protected $signature = 'message:send';
    protected $description = 'To Send Message to User -Arah';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $schedule_message = ScheduleMessage::where("message_datetime", "<=", Carbon::now()->toDateTimeString())->get();

        MessageJob::dispatch($schedule_message);
    }
}
