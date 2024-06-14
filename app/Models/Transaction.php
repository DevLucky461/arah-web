<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = [
        'transactionid',
        'user_id', 
        'quantity_of_coins', 
        'description',
        'operation',
        'wave_timestamp'
    ];
}
