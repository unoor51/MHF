<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = 'drivers';
    protected $fillable = [
        'driver_name',
        'driver_email',
        'driver_number',
        'driver_token',
        'user_id',
        'driver_token',
        'profile_img',
        'device_token'
        // add all other fields
    ];

}
