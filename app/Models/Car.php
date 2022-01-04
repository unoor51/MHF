<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $fillable = [
        'reg_no',
        'car_name',
        'car_model',
        'car_brand',
        'car_image'
        // add all other fields
    ];

}
