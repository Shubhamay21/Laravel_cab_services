@extends('admin/layout')
@section('container')
<main>
    <div class="container">
        <div class="row justify-content-right">
            <div class="col-lg-6">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h5>Change Admin Password</h5></div>
                    <div class="card-body">
                        <form action ="{{route('admin.updatepassword')}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label class="small mb-1" for="password">Enter Old Password</label>
                                <input class="form-control py-4" name="current_password" value="{{old('current_password')}}" id="currect_password" type="password" placeholder="Enter Your Current Password" />
                                @error('current_password')
                                <div class="alert alert-danger" role="alert">
                                {{$message}}
                                </div> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="checkpassword">Enter New Your Password </label>
                                <input class="form-control py-4" name="new_password" id="new_password" type="password" placeholder="Enter New Password" />
                                @error('new_password')
                                <div class="alert alert-danger" role="alert">
                                {{$message}}
                                </div> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="checkpassword">Enter Password Again </label>
                                <input class="form-control py-4" name="confirm_password" id="confirm_password" type="password" placeholder="Enter Password Again" />
                             @error('confirm_password')
                                <div class="alert alert-danger" role="alert">
                                {{$message}}
                                </div> 
                                @enderror
                            </div>
                            
                            <div class="form-group d-flex align-items-center justify-content-between mt-6 mb-0">
                                
                                <button type="submit" class="btn btn-primary">Update Password</button>
                                {{session('error')}}
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection