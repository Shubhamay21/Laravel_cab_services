@extends('admin/layout')

@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    {{session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">x</span>
    </button>
</div>
@endif
<h1 class="mt-4">Drivers</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Drivers</li>
    </ol>
    <div class=" mb-4">
    <a href="driver_list/manage_driver_list"><button type="button" class="btn btn-primary" >Add Drivers</button></a>
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
                            <th>Cab Name</th>
                            <th>Driver Name</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Lic No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->cabs_id}}</td>
                            <td>{{$list->name}}</td>
                            <td>{{$list->mobile}}</td>
                            <td>{{$list->address}}</td>
                            <td>{{$list->lic_no}}</td>
                            <td>
                            <a href="{{url('admin/driver_list/manage_driver_list/')}}/{{$list->id}}"><label class="badge badge-success hand_cursor">Edit</label></a>
                            &nbsp;
                            @if($list->status==1)
                                <a href="{{url('admin/driver_list/status/0')}}/{{$list->id}}"><label class="badge badge-warning hand_cursor">Active</label></a>
                                @elseif($list->status==0)
                                <a href="{{url('admin/driver_list/status/1')}}/{{$list->id}}"><label class="badge badge-danger hand_cursor">DeActive</label></a>
                            @endif
                            
                            &nbsp;
                            <a href="{{url('admin/cab_driver/delete/')}}/{{$list->id}}"><label class="badge badge-primary hand_cursor">Delete</label></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection