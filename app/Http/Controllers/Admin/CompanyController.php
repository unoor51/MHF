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
        $companies = User::where('user_type','admin')->get();        
        $title = 'Companies List'; 
        $active = 'companies'; 
//        dd($companies, $a, $b asdasd);
        return view('admin.companies.index', compact('companies', 'title', 'active'));

        
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

            $request->logo->store('companies', 'public');
            $file_name = $request->logo->hashName();
        }
        $user = new User([
            "name" => $request->get('name'),
            "email" => $request->get('email'),
            "registration_no" => $request->get('registration_no'),
            "logo" =>  $file_name,
            "password" => $hashed,
            "user_type" =>"admin",
            "remember_token" => Str::random(32)
        ]);
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
    public function edit($id)
    {
        $company = User::find($id);        
        $title = 'Edit Companies'; 
        $active = 'companies'; 
        //dd($company);
        return view('admin.companies.edit', compact('company', 'title', 'active'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
        ]);  
        
        if ($request->hasFile('logo')) {

            $validated = $request->validate([
                'logo' => 'mimes:jpg,jpeg,png' // Only allow .jpg, .bmp and .png file types.
            ]);
            $request->logo->store('companies', 'public');
            $file_name = $request->logo->hashName();
        }else{
            $file_name=$request->get('old_logo');
        }
        $users = User::find($request->get('id'));
        $users->name = $request->get('name');
        $users->email = $request->get('email');
        $users->registration_no = $request->get('registration_no');
        $users->logo = $file_name;
        $users->user_type = 'admin';
        $users->remember_token = Str::random(32);

        $users->save();
        return redirect('companies')->with('status', 'Company updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->withSuccess(['User deleted!!']);

    }
}
