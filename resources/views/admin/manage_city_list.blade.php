@extends('admin/layout')

@section('container')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
            <div class="card-body">
            <form method="post" action="{{Route('city_list.manage_city_list_process')}}" enctype="multipart/form-data">
                @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">City Name</label>
                                <input class="form-control py-4" name="operate_city" id="inputLastName" value="" type="text" placeholder="cab name" />
                                @error('operate_city')
                                <div class="alert alert-danger" role="alert">
                                {{$message}}
                                </div> 
                                @enderror
                            </div>
                        </div>
                    </div>               
                    <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit">Add Category</button></div>
                    <input type="hidden" name="id" value="{{$id}}">
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection