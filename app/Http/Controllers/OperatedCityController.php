<?php

namespace App\Http\Controllers;

use App\Models\OperatedCity;
use App\Models\CabCatagory;
use Illuminate\Http\Request;

class OperatedCityController extends Controller
{
    public function index()
    {
        $result['data']=OperatedCity::all();

        //echo "hell"
        return view('admin/city_list',$result);    
    }
   
    public function manage_city_list(Request $request,$id=''){
        if($id>0){ //if get id > 0 then it is on edit mode
          //$model= Cab_Category::where(['id'=>$id])->get(); 
            $arr= OperatedCity::where(['id'=>$id])->get(); 

            $result['operate_city']=$arr['0']->operate_city; //->db name given
            $result['id']=$arr['0']->id;
        }else{
            $result['operate_city']='';
            $result['id']=0;
        }
        // echo '<pre>';
        // print_r($result);
        // die();
        return view('admin/manage_city_list',$result); 
    }

    //for insertion
    public function manage_city_list_process(Request $request){
       // return $request->post();

       $request->validate([
           'operate_city'=>'required',
       ]);

       if($request->post('id')>0){
           $model = OperatedCity::find($request->post('id'));
           $msg="City Updated";
       }else{
           $model = new OperatedCity();
           $msg="City Inserted";
       }
       $model->operate_city=$request->post('operate_city');
       $model->status=1;
       $model->save();
       $request->session()->flash('message',$msg);
       return redirect('admin/city_list');
    }
  

    public function delete(Request $request,$id){
        $model=OperatedCity::find($id);
        $model->delete();
        $request->session()->flash('message','City Deleted');
       return redirect('admin/city_list');
    }

    public function status(Request $request,$status,$id){
        $model=OperatedCity::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','City Status Updated');
       return redirect('admin/city_list');
    }


    
       //for image image insert
    //    if($request->hasfile('image')){
    //        $image=$request->file('image');
    //        $ext=$image->extension(); //to find out image exe.
    //        $image_name=time().'.'.$ext; //to make name of image.
    //        $image->storeAs('/public/media',$image_name);
    //        $model->image=$image_name;
    //    }

}
