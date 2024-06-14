<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinAccount extends Model
{
    use HasFactory;
    protected $table = 'coin_account';
    protected $fillable = [
        'user_id',
        'initial_coin', 
        'balance',
    ];
}
