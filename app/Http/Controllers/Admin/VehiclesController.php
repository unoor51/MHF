<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Vehicle; 
use Auth;

class VehiclesController extends Controller
{
    public function index() 
    {
        $vehicles = Vehicle::get();        
        $title = 'Vehicles List'; 
        $active = 'vehicles'; 
//        dd($companies, $a, $b asdasd);
        return view('admin.vehicles.index', compact('vehicles', 'title', 'active'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Vehicle'; 
        $data['active'] = 'vehicles'; 
        return view('admin.vehicles.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'reg_no' => 'required|unique:vehicle',
            'vehicle_name' => 'required',
            'vehicle_model' => 'required',
            'is_leased' => 'required',
            'vehicle_color' => 'required',
            'vehicle_brand' => 'required',
        ]);  
        
        if ($request->hasFile('vehicle_image')) {

            $validated = $request->validate([
                'vehicle_image' => 'mimes:jpg,jpeg,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $request->vehicle_image->store('vehicles', 'public');
            $file_name = $request->vehicle_image->hashName();
        }
        $vehicles = new Vehicle([
            "reg_no" => $request->get('reg_no'),
            "vehicle_name" => $request->get('vehicle_name'),
            "vehicle_model" => $request->get('vehicle_model'),
            "is_leased" => $request->get('is_leased'),
            "leased_company_name" => $request->get('leased_company_name'),
            "vehicle_color" => $request->get('vehicle_color'),
            "vehicle_brand" => $request->get('vehicle_brand'),
            "vehicle_image" =>  $file_name,   
        ]);
        $vehicles->save(); // Finally, save the record.
        $data['title'] = 'Vehilces'; 
        $data['active'] = 'vehicles'; 
        return redirect('vehicles')->with('status', 'Vehicle Addedd Successfully');
    }

    public function edit($id)
    {
        $vehicle = Vehicle::find($id);        
        $title = 'Edit Vehicle'; 
        $active = 'vehilces'; 
        //dd($company);
        return view('admin.vehicles.edit', compact('vehicle', 'title', 'active'));
    }

    public function update(Request $request)
    {   
       
        $validated = $request->validate([
            'reg_no' => 'required',
            'vehicle_name' => 'required',
            'vehicle_model' => 'required',
            'is_leased' => 'required',
            'vehicle_color' => 'required',
            'vehicle_brand' => 'required',
        ]);  
        
        if ($request->hasFile('vehicle_image')) {
            $validated = $request->validate([
                'vehicle_image' => 'mimes:jpg,jpeg,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            $request->vehicle_image->store('vehicles', 'public');
            $file_name = $request->vehicle_image->hashName();
        }else{
            $file_name=$request->get('old_image');
        }
        
        $vehicles = Vehicle::find($request->get('id'));
        $vehicles->reg_no = $request->get('reg_no');
        $vehicles->vehicle_name = $request->get('vehicle_name');
        $vehicles->vehicle_model = $request->get('vehicle_model');
        $vehicles->is_leased = $request->get('is_leased');
        $vehicles->leased_company_name = $request->get('leased_company_name');
        $vehicles->vehicle_color = $request->get('vehicle_color');
        $vehicles->vehicle_brand = $request->get('vehicle_brand');
        $vehicles->vehicle_image = $file_name;

        $vehicles->save();
        return redirect('vehicles')->with('status', 'Vehicle updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehicle::find($id)->delete();
       // return back()->withSuccess(['Vehicle deleted!!']);
        return redirect('vehicles')->with('status', 'Vehicle deleted!!');
    } 
}
