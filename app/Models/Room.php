<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = [
        'user_id', 
        'user_type',
        'UUID',//roomid
        'rooms_notification'
    ];

    public function user(){
        return $this->belongsTo(user::class,'user_id','id')->select('id','name');
    }

    public function message(){
        return $this->belongsTo(Message::class,'UUID','id')->select('id','name');
    }
}

