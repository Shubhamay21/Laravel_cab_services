@extends('admin/layout')

@section('container')
<h1 class="mt-4">Tables</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class=" mb-4">
    <a href="cab_price/manage_cab_price"><button type="button" class="btn btn-primary" >Add Prices</button></a>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Operate City</th>
                            <th>Cab Category</th>
                            <th>Price</th>
                            <th>Price Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->operate_city_id}}</td>
                            <td>{{$list->cab_category_id}}</td>
                            <td>{{$list->price}}</td>
                            <td>{{$list->price_type}}</td>
                            <td></td>
                            <td>
                            <a href="{{url('admin/cab_price/manage_cab_price/')}}/{{$list->id}}"><label class="badge badge-success hand_cursor" style="padding:10px;">Edit</label></a>
                            &nbsp;
                            <a href="{{url('admin/cab_price/delete/')}}/{{$list->id}}"><label class="badge badge-primary hand_cursor" style="padding:10px;">Delete</label></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection