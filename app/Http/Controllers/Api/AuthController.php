<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;

class AuthController extends Controller
{
    //

	public function login(Request $request){
		$validate = $request->validate([
			'email' => 'bail|required|string',
			'token' => 'bail|required|string',
			'device_token' => 'bail|required|string',
		]);
		$driver = Driver::where('driver_email',$request->get('email'))->first();
		if(!$driver){
			return response([
				'code' => 401,
				'message' => 'Email or token is invalid',
			],401);
		}
		// $token = $driver->createToken('MyApp')->plainTextToken;echo $token;die();
		$driverUpdate = Driver::where('driver_email',$request->get('email'))->update(['device_token' => $request->get('device_token')]);
		$response = [
			'code' => 200,
			'message' => 'User Login Successfully',
			'data' => $driver,
			// 'AppToken' => $token
		];

		return response($response,200);

	}

}
