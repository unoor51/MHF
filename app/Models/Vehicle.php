<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicle';
    protected $fillable = [
        'reg_no',
        'vehicle_name',
        'vehicle_model',
        'is_leased',
        'leased_company_name',
        'vehicle_color',
        'vehicle_brand',
        'vehicle_image'
        // add all other fields
    ];
}
 