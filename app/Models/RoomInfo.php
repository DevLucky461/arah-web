<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomInfo extends Model
{
    use HasFactory;

    protected $table = 'rooms_info';

    protected $fillable = [
        'UUID',
        'group_image', 
        'group_name',
        'group_type'
    ];


}
