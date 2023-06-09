<?php

namespace App\Http\Controllers;

use App\Models\CabPrices;
use App\Models\Cab;
use App\Models\OperatedCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// class CabPricesController extends Controller
// {
//     public function index()
//     {
//         $result['data']=CabPrices::all();

//         //echo "hell"
//         return view('admin/cab_price',$result);    
//     }
   
//     public function manage_cab_price(Request $request,$id=''){
       
//         //$cabcat['data']=CabCatagory::all('id','category_name');// to fetch option value
//         $cabcity=OperatedCity::all('id','operate_city');// to fetch option value
//         //$cabcity['arrcity']=OperatedCity::all('id','operate_city');// to fetch option value
//         $city=cab::all('id','address');
//         $cty['address']=$city['0']->address;
//         $rec['data']=DB::table('cabs')
//                     ->where('address',"=",$cty)
//                     ->select('cabs.cab_category_id')
//                     ->get();
        
//         //$cbs['cab_category_id']=$rec['0']->cab_category_id;
//         // echo '<pre>';
//         // print_r($rec);
//         // die(); 


       

//         if($id>0){ //if get id > 0 then it is on edit mode
//           //$model= Cab_Category::where(['id'=>$id])->get(); 
//             $arr= CabPrices::where(['id'=>$id])->get(); 

//             $result['operate_city_id']=$arr['0']->operate_city_id;
//             $result['cab_category_id']=$arr['0']->cab_category_id; //->db name given
//             $result['price']=$arr['0']->price;
//             $result['price_type']=$arr['0']->price_type;
//             $result['id']=$arr['0']->id;
//         }else{
//             $result['operate_city_id']='';
//             $result['cab_category_id']='';
//             $result['price']='';
//             $result['price_type']='';
//             $result['id']=0;
//         }
//         // echo '<pre>';
//         // print_r($result);
//         // die();
//         return view('admin/manage_cab_price',$result,$rec)->with('res',$cabcity); 
//     }

//     //for insertion
//     public function manage_cab_price_process(Request $request){
//        // return $request->post();

//        $request->validate([
//            'opeate_city_id'=>'required',
//            'cab_category_id'=>'required',
//            'price'=>'required',
//            'price_type'=>'required',
//            //'category_slug'=>'required|unique:cab_catagories,category_slug,'.$request->post('id'),
//        ]);

//        if($request->post('id')>0){
//            $model = CabPrices::find($request->post('id'));
//            $msg="Dhanrashi Updated";
//        }else{
//            $model = new CabPrices();
//            $msg="Price Inserted";
//        }
//        $model->operate_city_id=$request->post('operate_city_id');
//        $model->cab_category_id=$request->post('cab_category_id');
//        $model->name=$request->post('price');
//        $model->address=$request->post('price_type');

//        $model->save();
//        $request->session()->flash('message',$msg);
//        return redirect('admin/cab_price');
//     }

//     public function delete(Request $request,$id){
//         $model=CabPrices::find($id);
//         $model->delete();
//         $request->session()->flash('message','Price Deleted');
//        return redirect('admin/cab_price');
//     }
// }

// $category = Request(category) ;
// foreach($cabs_categoryid as $key=>$x)
// {
//     $cabscategoryid=$key;
//     $price=$x;


//     save
//     submit
// }       

// cityid,categoryid,price

class CabPricesController extends Controller
{
    public function index()
    {
        $result['data']=CabPrices::all();

        //echo "hell"
        return view('admin/cab_price',$result);    
    }
   
    public function manage_cab_price(Request $request,$id=''){

        if($id>0){ //if get id > 0 then it is on edit mode
          //$model= Cab_Category::where(['id'=>$id])->get(); 
            $arr= CabPrices::where(['id'=>$id])->get(); 

            $result['price']=$arr['0']->price;
            $result['operate_city_id']=$arr['0']->operate_city_id; //->db name given
            //$result['price']=$arr['0']->price;
            //$result['price_type']=$arr['0']->price_type;
            $result['id']=$arr['0']->id;
        }else{
            $result['price']='';
            $result['operate_city_id']='';
            //$result['price']='';
            //$result['price_type']='';
            $result['id']=0;
        }

        //to retrive cab_catagories in dropdown
        $result['category']=DB::table('cab_catagories')->where(['status'=>1])->get();
        
        $result['city']=DB::table('operated_cities')->where(['status'=>1])->get();


        // echo '<pre>';
        // print_r($result);
        // die();
        return view('admin/manage_cab_price',$result);
    }

    //for insertion
    public function manage_cab_price_process(Request $request){

        $request->validate([
            'operate_city_id'=>'required',
        ]);

        if($request->post('id')>0){
            $model = CabPrices::find($request->post('id'));
            $msg="Category Updated";
        }else{
            $model = new CabPrices();
            $msg="Category Inserted";
        }
        $cab_prices=$request->price;
        
        foreach($cab_prices as $key=>$value)
        {
            // $cab_category_id=$key;
            // $cab_price=$value;
            //$cab_price_type=$value;
            //insert command;
            
            $model= new CabPrices;
            $model->operate_city_id=$request->post('operate_city_id');
            //$model->operate_city_id=;
            $model->cab_category_id=$key;
            $model->price=$value;
            //$model->price_type=$cab_price_type;
            
            $model->save();
    
        }
        $request->session()->flash('message');
        return redirect('admin/cab_price');

       
        
    

        //return $request->post();
        // echo '<pre>';
        // print_r($request->post());
        // die();

    //    $request->validate([
    //        'opeate_city_id'=>'required',
    //        'cab_category_id'=>'required',
    //        'price'=>'required',
    //        'price_type'=>'required',
    //        //'category_slug'=>'required|unique:cab_catagories,category_slug,'.$request->post('id'),
    //    ]);

    //    if($request->post('id')>0){
    //        $model = CabPrices::find($request->post('id'));
    //        $msg="Dhanrashi Updated";
    //    }else{
    //        $model = new CabPrices();
    //        $msg="Price Inserted";
    //    }
    //    $model->operate_city_id=$request->post('operate_city_id');
    //    $model->cab_category_id=$request->post('cab_category_id');
    //    $model->price=$request->post('price');
    //    $model->price_type=$request->post('price_type');

    //    $model->save();


    //    $request->session()->flash('message',$msg);
    //    return redirect('admin/cab_price');
    }

    public function delete(Request $request,$id){
        $model=CabPrices::find($id);
        $model->delete();
        $request->session()->flash('message','Price Deleted');
       return redirect('admin/cab_price');
    }
}

