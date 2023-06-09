<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class UpdatePassword extends Controller
{
  
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function changepassword(){
        return view('admin/updatepassword');
    }
     
    public function update_passworddb(Request $request)
    {

         $request->validate([
            'current_password'=>['required'],
            'new_password'=>['required'],
            'confirm_password'=>['same:new_password'],
        ]);

        if (strcmp($request->get('current_password'), $request->new_password) == 0) 
        {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $user =  Admin::find(1);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        return redirect()->back()->with('success', "Password Changed Successfully");
    


        // if($request)
        // {
        //     dd($request);
        // }else
        // {
        //     dd($request->password);
        // }

    }






}
