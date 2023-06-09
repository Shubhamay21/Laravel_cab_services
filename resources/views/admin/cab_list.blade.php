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
<h1 class="mt-4">Cabs</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class=" mb-4">
    <a href="cab_list/manage_cab_list"><button type="button" class="btn btn-primary" >Add Cars</button></a>
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
                            <th>Category Name</th>
                            <th>Cab</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->cab_category_id}}</td>
                            <td>{{$list->name}}</td>
                            <td>{{$list->address}}</td>
                            <td>{{$list->operate_city_id}}</td>
                            <td>
                                @if($list->image!='')
                                <img src=".../img.{{$list->image}})" width="100px" alt="cab"></td>
                               
                                @endif
                                
                            <td>
                            <a href="{{url('admin/cab_list/manage_cab_list/')}}/{{$list->id}}"><label class="badge badge-success hand_cursor" style="padding:10px;">Edit</label></a>
                            &nbsp;
                            @if($list->status==1)
                                <a href="{{url('admin/cab_list/status/0')}}/{{$list->id}}"><label class="badge badge-warning hand_cursor" style="padding:10px;">Active</label></a>
                                @elseif($list->status==0)
                                <a href="{{url('admin/cab_list/status/1')}}/{{$list->id}}"><label class="badge badge-danger hand_cursor" style="padding:10px;">Deactive</label></a>
                            @endif
                            
                            &nbsp;
                            <a href="{{url('admin/cab_list/delete/')}}/{{$list->id}}"><label class="badge badge-primary hand_cursor" style="padding:10px;">Delete</label></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection