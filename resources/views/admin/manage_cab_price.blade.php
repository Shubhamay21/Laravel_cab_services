@extends('admin/layout')
@section('container')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
            <div class="card-body">
                <form method="post" action="{{Route('cab_price.manage_cab_price_process')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">City</label>
                            <select class="form-control" name="operate_city_id" id="">
                                <option value="">Select City</option>
                                @foreach($city as $list)
                                    @if($operate_city_id==$list->id)
                                    <option selected value="{{$list->id}}">
                                    @else
                                    <option value="{{$list->id}}">
                                    @endif
                                    {{$list->operate_city}}</option>
                                @endforeach
                            </select>
                        @error('operate_city_id')
                        <div class="alert alert-danger" role="alert">
                        {{$message}}
                        </div> 
                        @enderror
                    </div>

                        <div class="row">
                            @foreach($category as $list)
                            <div class="col-md-6">
                            
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName">Add Price for {{$list->category_name}}</label>
                                    <input class="form-control" name="price[{{$list->id}}]" id="price" value="{{$price}}" type="text" aria-describedby="emailHelp" placeholder="Enter Price" /> <!--py-4-->
                                    <!-- @error('price')
                                    <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                    </div> 
                                    @enderror -->
                                </div>
                            
                            </div>
                            @endforeach
                        </div>


                    </div>
                    
                    <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit">Add Category</button></div>
                    <input type="hidden" name="id" value="{{$id}}">
                </form>
            </div>
            
        </div>
    </div>
</div>


<script>
    function add_more(){u
        //alert("dfdfd");
        var html='<div class="card"><div class="card-body"><div class="form-row">';

            var cab_category_id_html=jQuery('#cab_category_id').html();
            html+='<div class="col-md-4"><div class="form-group"><label class="small mb-1" for="cab_category_id">Category Name</label><select id="cab_category_id" name="cab_category_id" class="form-control" required="">'+cab_category_id_html+'</select></div></div>';
                                                  
            html+='<div class="col-md-4"><div class="form-group"><label class="small mb-1" for="inputFirstName">Price</label><input class="form-control" name="price" id="inputEmailAddress" value="" type="text" aria-describedby="emailHelp" placeholder="Enter email address" /></div></div>';
        
            html+='</div></div></div>';

            jQuery('#cab_price_attr_box').append(html)  //to append form
    }
</script>
@endsection