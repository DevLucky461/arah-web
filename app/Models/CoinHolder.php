<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinHolder extends Model
{
    use HasFactory;
    protected $table = 'coin_holder';
    protected $fillable = [
        'serial_number',
        'seller_id', //link to user_id
        'buyer_id', //link to user_id
        'amount_purchased',
        'coin_quantity',
    ];
    
    public function buyer()
    {
        return $this->belongsTo('App\Models\User','buyer_id','id')->select('id','name');
    }
    public function buyer_info()
    {
        return $this->belongsTo('App\Models\UserInfo','buyer_id','user_id')->select('user_id','phone','nric');
    }
}
