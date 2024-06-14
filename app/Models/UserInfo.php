<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $table = 'user_info';
    protected $fillable = [
        'user_id',
        'phone',
        'nric',
        'nu_member',
        'interested_quantity',
        'email_array',
        'dob',
        "gender",
        'occupation',
        'income',
        'country',
        'state',
        'others_residency',
        'address_key',
        'public_key'
    ];
}
