<?php

namespace App\Http\Controllers;

use App\Models\Cab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CabController extends Controller
{
    public function index()
    {
        $result['data']=Cab::all();

        //echo "hell"
        return view('admin/cab_list',$result);    
    }
   
    public function manage_cab_list(Request $request,$id=''){
       
        //$cabcat['data']=CabCatagory::all('id','category_name');// to fetch option value

        if($id>0){ //if get id > 0 then it is on edit mode
          //$model= Cab_Category::where(['id'=>$id])->get(); 
            $arr= Cab::where(['id'=>$id])->get(); 

            $result['cab_category_id']=$arr['0']->cab_category_id; //->db name given
            $result['name']=$arr['0']->name;
            $result['address']=$arr['0']->address;
            $result['operate_city_id']=$arr['0']->operate_city_id;
            //$result['image']=$arr['0']->city;
            $result['id']=$arr['0']->id;
        }else{
            $result['cab_category_id']='';
            $result['name']='';
            $result['address']='';
            $result['operate_city_id']='';
            //$result['image']='';
            $result['id']=0;
        }

        //to retrive cab_catagories in dropdown
        $result['category']=DB::table('cab_catagories')->where(['status'=>1])->get();
        $result['city']=DB::table('operated_cities')->where(['status'=>1])->get();

        // echo '<pre>';
        // print_r($result);
        // die();
        return view('admin/manage_cab_list',$result); 
    }

    //for insertion
    public function manage_cab_list_process(Request $request){
       // return $request->post();

       //at time of image update
       if($request->post('id')>0){
            $image_validation="mimes:jpeg,jpg,png";
        }else{
            $image_validation="required|mimes:jpeg,jpg,png";
        }

       $request->validate([
           'cab_category_id'=>'required',
           'name'=>'required',
           'address'=>'required',
           'operate_city_id'=>'required',
           'image'=>$image_validation,
           //'category_slug'=>'required|unique:cab_catagories,category_slug,'.$request->post('id'),
       ]);

       if($request->post('id')>0){
           $model = Cab::find($request->post('id'));
           $msg="Cabs Updated";
       }else{
           $model = new Cab();
           $msg="Cabs Inserted";
       }

       //for image image insert
       if($request->hasfile('image')){
           $image=$request->file('image');
           $ext=$image->extension(); //to find out image exe.
           $image_name=time().'.'.$ext; //to make name of image.
           $image->storeAs('img',$image_name);
           $model->image=$image_name;
       }

       $model->cab_category_id=$request->post('cab_category_id');
       $model->name=$request->post('name');
       $model->address=$request->post('address');
       $model->operate_city_id=$request->post('operate_city_id');
       $model->status=1;

       $model->save();
       $request->session()->flash('message',$msg);
       return redirect('admin/cab_list');
    }

    public function delete(Request $request,$id){
        $model=Cab::find($id);
        $model->delete();
        $request->session()->flash('message','Category Deleted');
       return redirect('admin/cab_list');
    }

    public function status(Request $request,$status,$id){
        $model=Cab::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Cab Status Updated');
       return redirect('admin/cab_list');
    //    echo $type;
    //    echo $id;
    }
}
