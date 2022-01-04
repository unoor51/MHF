<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckinList extends Model
{
    use HasFactory;
    protected $table = 'checkin_list';
    protected $fillable = [
        'car_id',
        'mileage',
        'week_commencing_date',
        'week_commencing_day',
        'mirrors_and_glass',
        'wipers_washers',
        'front_view',
        'warning_lamps',
        'steering',
        'horn',
        'brakes',
        'height_marker',
        'seatbelts',
        'lights_indicators',
        'fuel_leaks',
        'battery_security_condition',
        'dissel_exhaust_fluid',
        'engine_smoke',
        'body_security',
        'spray_suppression',
        'types_wheel_fixing',
        'brake_line',
        'electrical_connections',
        'coupling_security',
        'security_load',
        'number_plate',
        'reflectors_light',
        'markers',
        'fault',
        'status',
        // add all other fields
    ];
}
