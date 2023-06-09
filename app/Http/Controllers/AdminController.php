<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }else{
            return view('admin.login');
        }
        return view('admin.login');
    }   
    

    public function auth(Request $request){
       // return $request->post();
        $email = $request->post('email');
        $password = $request->post('password');

        //$result=Admin::where(['email'=>$email,'password'=>$password])->get();
       
        $result=Admin::where(['email'=>$email])->first();
        if($result){
                if(Hash::check($request->post('password'),$result->password)){
                    $request->session()->put('ADMIN_LOGIN',true);
                    $request->session()->put('ADMIN_ID',$result->id);
                    return redirect('admin/dashboard');
                }else{
                    
                    $request->session()->flash('error','Please Entered Correct Password!!');
                    return redirect('admin');
                }
            }
            else
            {
                $request->session()->flash('error','Please Enter Valid Details!!');
                return redirect('admin');
            }
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    
    // public function checkemail(Request $req)
    // {
    //     $email = $req->email;
    //     $emailcheck = DB::table('admins')->where('email'.$email)->count();
    //     if($emailcheck>0)
    //     {
    //         echo "Email Already In Use!";
    //     }
    // }
    

}




