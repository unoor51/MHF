<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User; 
use Auth;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user_id = Auth::id();
        // $companies = User::where('user_id',$user_id)->get()->toArray();
        $companies = User::where('user_type','admin')->get()->toArray();
        
        $data['title'] = 'Companies List'; 
        $data['active'] = 'companies'; 
        $data['companies'] = $companies; 
        return view('admin.companies.index',$data);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Company'; 
        $data['active'] = 'Companies'; 
        return view('admin.companies.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $password=$request->get('company_password');
        $hashed = Hash::make($password);
        
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
        ]);  
        
        if ($request->hasFile('logo')) {

            $validated = $request->validate([
                'logo' => 'mimes:jpg,jpeg,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /companies
            $request->logo->store('companies', 'public');
            $file_name = $request->logo->hashName();
        }
        
        // Store the record, using the new file hashname which will be it's new filename identity.
        $user = new User([
            "name" => $request->get('name'),
            "email" => $request->get('email'),
            "registration_no" => $request->get('registration_no'),
            "logo" =>  $file_name,
            "password" => $hashed,
            "user_type" =>"admin",
            "remember_token" => Str::random(32)
        ]);
        //echo "<pre>";print_r($user);echo "</pre>";die;
        $user->save(); // Finally, save the record.
        $data['title'] = 'Companies'; 
        $data['active'] = 'companies'; 
        return redirect('companies')->with('status', 'Company Addedd Successfully');
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
