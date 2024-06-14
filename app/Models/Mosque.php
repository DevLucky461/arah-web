<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mosque extends Model
{
    use HasFactory;

    
    protected $table = 'mosque';
    protected $fillable = [
        'mosque_name',
        'mosque_image',
        'latitude',
        'longitude',
    ];
}
