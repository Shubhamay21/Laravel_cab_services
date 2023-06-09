@extends('admin/layout')

@section('container')
<h1 class="mt-4">Operated Cities</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Cities</li>
    </ol>
    <div>
        @if(session()->has('message'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            {{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
        </div>
        @endif
    </div>
    <div class=" mb-4">
    <a href="city_list/manage_city_list"><button type="button" class="btn btn-primary" >Add Cities</button></a>
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
                            <th>City Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php($i =0)
                    @foreach($data as $list)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$list->operate_city}}</td>
                            <td>
                            <a href="{{url('admin/city_list/manage_city_list/')}}/{{$list->id}}"><label class="badge badge-success hand_cursor" style="padding:10px;">Edit</label></a>
                            &nbsp;
                            @if($list->status==1)
                                <a href="{{url('admin/city_list/status/0')}}/{{$list->id}}"><label class="badge badge-warning hand_cursor" style="padding:10px;">Active</label></a>
                                @elseif($list->status==0)
                                <a href="{{url('admin/city_list/status/1')}}/{{$list->id}}"><label class="badge badge-danger hand_cursor" style="padding:10px;">Deactive</label></a>
                            @endif
                            
                            &nbsp;
                            <a href="{{url('admin/city_list/delete/')}}/{{$list->id}}"><label class="badge badge-primary hand_cursor" style="padding:10px;">Delete</label></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection