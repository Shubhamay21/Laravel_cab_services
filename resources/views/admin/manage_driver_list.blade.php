@extends('admin/layout')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
            <div class="card-body">
                <form method="post" action="{{Route('driver_list.manage_driver_list_process')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">Cab Name</label>
                                <select class="form-control" name="cabs_id" id="">
                                    <option value="">Select Catgory</option>
                                    @foreach($cablist as $list)
                                    @if($cabs_id==$list->id)
                                    <option selected value="{{$list->id}}">
                                    @else
                                    <option value="{{$list->id}}">
                                    @endif
                                    {{$list->name}}</option>
                                @endforeach
                                </select>
                                @error('cabs_id')
                                <div class="alert alert-danger" role="alert">
                                {{$message}}
                                </div> 
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">Driver Name</label>
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
                        <label class="small mb-1" for="inputEmailAddress">Mobile</label>
                        <input class="form-control py-4" name="mobile" id="inputEmailAddress" value="{{$mobile}}" type="text" aria-describedby="emailHelp" placeholder="address" />
                        @error('mobile')
                        <div class="alert alert-danger" role="alert">
                        {{$message}}
                        </div> 
                        @enderror
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
                        <label class="small mb-1" for="inputEmailAddress">Lic No</label>
                        <input class="form-control py-4" name="lic_no" id="inputEmailAddress" value="{{$lic_no}}" type="text" aria-describedby="emailHelp" placeholder="address" />
                        @error('lic_no')
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