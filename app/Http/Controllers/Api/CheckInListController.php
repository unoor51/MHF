<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CheckinList;

class CheckInListController extends Controller
{
    //
    public function checkinlist(Request $request){
    	        //
        $validate = $request->validate([
            'car_id' => 'required|string',
            'mileage' => 'required|string',
            'week_commencing_date' => 'required|string',
            'week_commencing_day' => 'required|string',
            'mirrors_and_glass' => 'required|string',
            'wipers_washers' => 'required|string',
            'front_view' => 'required|string',
            'warning_lamps' => 'required|string',
            'steering' => 'required|string',
            'horn' => 'required|string',
            'brakes' => 'required|string',
            'height_marker' => 'required|string',
            'seatbelts' => 'required|string',
            'lights_indicators' => 'required|string',
            'fuel_leaks' => 'required|string',
            'battery_security_condition' => 'required|string',
            'dissel_exhaust_fluid' => 'required|string',
            'engine_smoke' => 'required|string',
            'body_security' => 'required|string',
            'spray_suppression' => 'required|string',
            'types_wheel_fixing' => 'required|string',
            'brake_line' => 'required|string',
            'electrical_connections' => 'required|string',
            'coupling_security' => 'required|string',
            'security_load' => 'required|string',
            'number_plate' => 'required|string',
            'reflectors_light' => 'required|string',
            'markers' => 'required|string',
            'fault' => 'required|string',
            'status' => 'required|string'
        ]);
        // Store the record, using the new file hashname which will be it's new filename identity.
        $CheckinList = CheckinList::create($request->all());
	
        if( $CheckinList){
            $response = [
                'code' => 200,
                'message' => 'Check List added Successfully',
                // 'data' => $driver,
                // 'AppToken' => $token
            ];
        }else{
            $response = [
                'code' => 401,
                'message' => 'Error occurs while adding checklist. Please contact tech support',
                // 'data' => $driver,
                // 'AppToken' => $token
            ];
        }    
        return response($response,200);
    }
}
