<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;
    protected $table = 'app_settings';
    protected $fillable = [
        'language',
        'user_id', 
        'last_delete_chat',
        'last_chat_backup',
    ];
}
