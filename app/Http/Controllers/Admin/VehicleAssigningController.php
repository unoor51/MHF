<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Assigning;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Driver; 
use Auth;
use Illuminate\Support\Str;

class VehicleAssigningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $user_id = Auth::id();
        $vehicles = Assigning::where('user_id',$user_id)->get();        
        $title = 'Assigned Vehilces'; 
        $active = 'vehicle_assigning'; 
//        dd($companies, $a, $b asdasd);
        return view('admin.vehicle_assigning.index', compact('vehicles', 'title', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::id();
        $vehicles = Vehicle::where('user_id',$user_id)->get();
        $drivers = Driver::where('user_id',$user_id)->get();  
        $title = 'Assign Vehicle'; 
        $active = 'vehicle_assigning'; 
        return view('admin.vehicle_assigning.add',compact('vehicles','drivers','title','active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $validated = $request->validate([
            'driver_id' => 'required',
            'vehicle_id' => 'required',
            'shift' => 'required',
            'date' => 'required',
        ]);  
        
        $vehiclesAssign = new Assigning([
            "driver_id" => $request->get('driver_id'),
            "vehicle_id" => $request->get('vehicle_id'),
            "shift" => $request->get('shift'),
            "date" => $request->get('date'),
            "user_id"       => $user_id,  
        ]);
        $vehiclesAssign->save(); // Finally, save the record.
        $data['title'] = 'Assigned Vehilces'; 
        $data['active'] = 'vehicle_assigning'; 
        return redirect('vehicle_assigning')->with('status', 'Vehicle Assigned Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assigning  $assigning
     * @return \Illuminate\Http\Response
     */
    public function show(Assigning $assigning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assigning  $assigning
     * @return \Illuminate\Http\Response
     */
    public function edit(Assigning $assigning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assigning  $assigning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assigning $assigning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assigning  $assigning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assigning $assigning)
    {
        $id= decrypt($id);
        Assigning::find($id)->delete();
        return redirect('vehicle_assigning')->with('status', 'Vehicle unassigned!!');
    }
}
