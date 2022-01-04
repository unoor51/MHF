<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Driver; 
use Auth;
class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $drivers = Driver::where('user_id',$user_id)->get()->toArray();
        
        $data['title'] = 'Drivers List'; 
        $data['active'] = 'drivers'; 
        $data['drivers'] = 'drivers'; 
        return view('admin.drivers.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $data['title'] = 'Add Driver'; 
        $data['active'] = 'drivers'; 
        return view('admin.drivers.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        //
        $user_id = Auth::user()->id;
        $validated = $request->validate([
            'driver_name' => 'required',
            'driver_email' => 'required|unique:drivers',
        ]);  

        if ($request->hasFile('profile_img')) {

            $validated = $request->validate([
                'profile_img' => 'mimes:jpg,jpeg,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /drivers
            $request->profile_img->store('drivers', 'public');
            $file_name = $request->profile_img->hashName();
        }
        // Store the record, using the new file hashname which will be it's new filename identity.
        $driver = new Driver([
            "driver_name" => $request->get('driver_name'),
            "driver_email" => $request->get('driver_email'),
            "driver_number" => $request->get('driver_number'),
            "profile_img" =>  $file_name,
            "user_id" => $user_id,
            "driver_token" => Str::random(32)
        ]);

        $driver->save(); // Finally, save the record.
        $data['title'] = 'Drivers'; 
        $data['active'] = 'drivers'; 
        return redirect('drivers')->with('status', 'Driver Addedd Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
