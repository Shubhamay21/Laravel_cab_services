@extends('admin/layout')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
            <div class="card-body">
                <form method="post" action="{{Route('cab_category.manage_cab_category_process')}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputFirstName">Category Name</label>
                                <input class="form-control py-4" name="category_name" id="inputFirstName" value="{{$category_name}}" type="text" placeholder="Enter first name" />
                                @error('category_name')
                                <div class="alert alert-danger" role="alert">
                                {{$message}}
                                </div> 
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputLastName">Feature</label>
                                <input class="form-control py-4" name="feature" id="inputLastName" value="{{$feature}}" type="text" placeholder="Enter last name" />
                                @error('feature')
                                <div class="alert alert-danger" role="alert">
                                {{$message}}
                                </div> 
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Similar Cars</label>
                        <input class="form-control py-4" name="similar_car" id="inputEmailAddress" value="{{$similar_car}}" type="text" aria-describedby="emailHelp" placeholder="Enter email address" />
                        @error('similar_car')
                        <div class="alert alert-danger" role="alert">
                        {{$message}}
                        </div> 
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Category slug</label>
                                <input class="form-control py-4" name="category_slug" value="{{$category_slug}}" id="inputPassword" type="text" placeholder="Enter password" />
                                @error('category_slug')
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