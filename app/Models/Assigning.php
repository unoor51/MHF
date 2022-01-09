<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assigning extends Model
{
    use HasFactory;
    protected $table = 'vehicle_assigning';
    protected $fillable = [
        'user_id',
        'driver_id',
        'vehicle_id',
        'date',
        'shift'
        // add all other fields
    ];
}
 