<?php

namespace App\Http\Controllers;

use App\Models\OperatedCity;
use Illuminate\Http\Request;

class OperatedCityController extends Controller
{
    public function index()
    {
        $result['data']=CabCatagory::all();

        //echo "hell"
        return view('admin/cab_category',$result);    
    }
   
    public function manage_cab_category(Request $request,$id=''){
        if($id>0){ //if get id > 0 then it is on edit mode
          //$model= Cab_Category::where(['id'=>$id])->get(); 
            $arr= CabCatagory::where(['id'=>$id])->get(); 

            $result['category_name']=$arr['0']->category_name; //->db name given
            $result['feature']=$arr['0']->feature;
            $result['similar_car']=$arr['0']->similar_car;
            $result['category_slug']=$arr['0']->category_slug;
            $result['id']=$arr['0']->id;
        }else{
            $result['category_name']='';
            $result['feature']='';
            $result['similar_car']='';
            $result['category_slug']='';
            $result['id']=0;
        }
        // echo '<pre>';
        // print_r($result);
        // die();
        return view('admin/manage_cab_category',$result); 
    }

    //for insertion
    public function manage_cab_category_process(Request $request){
       // return $request->post();

       $request->validate([
           'category_name'=>'required',
           'feature'=>'required',
           'similar_car'=>'required',
           'category_slug'=>'required|unique:cab_catagories,category_slug,'.$request->post('id'),
       ]);

       if($request->post('id')>0){
           $model = CabCatagory::find($request->post('id'));
           $msg="Category Updated";
       }else{
           $model = new CabCatagory();
           $msg="Category Inserted";
       }
       $model->category_name=$request->post('category_name');
       $model->feature=$request->post('feature');
       $model->similar_car=$request->post('similar_car');
       $model->status=1;
       $model->category_slug=$request->post('category_slug');

       $model->save();
       $request->session()->flash('message',$msg);
       return redirect('admin/cab_category');
    }

    public function delete(Request $request,$id){
        $model=CabCatagory::find($id);
        $model->delete();
        $request->session()->flash('message','Category Deleted');
       return redirect('admin/cab_category');
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
