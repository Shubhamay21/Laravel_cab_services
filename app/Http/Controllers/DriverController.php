<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    public function index()
    {
        $result['data']=Driver::all();

        //echo "hell"
        return view('admin/driver_list',$result);    
    }
   
    public function manage_driver_list(Request $request,$id=''){
       
        //$cabcat['data']=CabCatagory::all('id','category_name');// to fetch option value

        if($id>0){ //if get id > 0 then it is on edit mode
          //$model= Cab_Category::where(['id'=>$id])->get(); 
            $arr= Driver::where(['id'=>$id])->get(); 

            $result['cabs_id']=$arr['0']->cabs_id; //->db name given
            $result['name']=$arr['0']->name;
            $result['mobile']=$arr['0']->mobile;
            $result['address']=$arr['0']->address;
            $result['lic_no']=$arr['0']->lic_no;
            //$result['image']=$arr['0']->city;
            $result['id']=$arr['0']->id;
        }else{
            $result['cabs_id']='';
            $result['name']='';
            $result['mobile']='';
            $result['address']='';
            $result['lic_no']='';
            //$result['image']='';
            $result['id']=0;
        }

        //to retrive cabs in dropdown
        // $result['category']=DB::table('cab_catagories')->where(['status'=>1])->get();
        // $result['city']=DB::table('operated_cities')->where(['status'=>1])->get();
        $result['cablist']=DB::table('cabs')->where(['status'=>1])->get();

        // echo '<pre>';
        // print_r($result);
        // die();
        return view('admin/manage_driver_list',$result); 
    }

    //for insertion
    public function manage_driver_list_process(Request $request){
       // return $request->post();

        //at time of image update
        // if($request->post('id')>0){
        //     $image_validation="mimes:jpeg,jpg,png";
        // }else{
        //     $image_validation="required|mimes:jpeg,jpg,png";
        // }

       $request->validate([
           'cabs_id'=>'required',
           'name'=>'required',
           'mobile'=>'required|unique:drivers,mobile',
           'address'=>'required',
           'lic_no'=>'required|unique:drivers,lic_no,',
           //'image'=>$image_validation,
           //'category_slug'=>'required|unique:cab_catagories,category_slug,'.$request->post('id'),
       ]);

       if($request->post('id')>0){
           $model = Driver::find($request->post('id'));
           $msg="Driver Updated";
       }else{
           $model = new Driver();
           $msg="Driver Inserted";
       }

       //for image image insert
    //    if($request->hasfile('image')){
    //        $image=$request->file('image');
    //        $ext=$image->extension(); //to find out image exe.
    //        $image_name=time().'.'.$ext; //to make name of image.
    //        $image->storeAs('/public/media',$image_name);
    //        $model->image=$image_name;
    //    }

       $model->cabs_id=$request->post('cabs_id');
       $model->name=$request->post('name');
       $model->mobile=$request->post('mobile');
       $model->address=$request->post('address');
       $model->lic_no=$request->post('lic_no');
       $model->status=1;

       $model->save();
       $request->session()->flash('message',$msg);
       return redirect('admin/driver_list');
    }

    public function delete(Request $request,$id){
        $model=Driver::find($id);
        $model->delete();
        $request->session()->flash('message','Driver Deleted');
       return redirect('admin/driver_list');
    }

    public function status(Request $request,$status,$id){
        $model=Driver::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Driver Status Updated');
       return redirect('admin/driver_list');
    //    echo $type;
    //    echo $id;
    }

}
