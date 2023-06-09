@extends('admin/layout')

@section('container')
@if($id>0)
    {{$image_required=""}}
    @else
    {{$image_required="required"}}
@endif
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
            <div class="card-body">
                <form method="post" action="{{Route('cab_list.manage_cab_list_process')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">Category Name</label>
                                <select class="form-control" name="cab_category_id" id="">
                                    <option value="">Select Catgory</option>
                                    @foreach($category as $list)
                                        @if($cab_category_id==$list->id)
                                        <option selected value="{{$list->id}}">
                                        @else
                                        <option value="{{$list->id}}">
                                        @endif
                                        {{$list->category_name}}</option>
                                    @endforeach
                                </select>
                                @error('cab_category_id')
                                <div class="alert alert-danger" role="alert">
                                {{$message}}
                                </div> 
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">Cab</label>
                                <input class="form-control py-4" name="name" id="inputLastName" value="{{$name}}" type="text" placeholder="cab name" />
                                @error('name')
                                <div class="alert alert-danger" role="alert">
                                {{$message}}
                                </div> 
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Address</label>
                        <input class="form-control py-4" name="address" id="inputEmailAddress" value="{{$address}}" type="text" aria-describedby="emailHelp" placeholder="address" />
                        @error('address')
                        <div class="alert alert-danger" role="alert">
                        {{$message}}
                        </div> 
                        @enderror
                    </div>
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
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Image</label>
                        <input class="form-control" name="image" id="image"  type="file" {{$image_required}}/>
                        @error('image')
                        <div class="alert alert-danger" role="alert">
                        {{$message}}
                        </div> 
                        @enderror
                    </div>
                    <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit">Add Category</button></div>
                    <input type="hidden" name="id" value="{{$id}}">
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection