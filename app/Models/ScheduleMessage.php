<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleMessage extends Model
{
    use HasFactory;
    protected $table = 'schedulemessages';
    protected $fillable = [
        'user_id',
        'message',
        'message_type',
        'message_datetime',
        'UUID'
    ];
}
