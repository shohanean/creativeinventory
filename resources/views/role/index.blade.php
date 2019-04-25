@extends('layouts.dashboardapp')

@section('title', 'Roles & Permission')
@section('active-role', 'opened')

@section('content')
<div class="row">
    {{-- BREADCRUMB --}}
    <div class="col-md-12">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('home') }}">Dashboard</a>
            <span class="breadcrumb-item active">Roles & permission </span>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <form action="" method="post">
            <div class="card">
                <div class="text-center bg-dark text-white p-2">
                    <span>Add Role</span>
                </div>
                <div class="card-body">
                    <form action="{{route('add.role')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" value="" class="form-control">
                        </div>
                            <div>{{$errors->first('name')}}</div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </form>
        <div class="card">
            <div class="card-head text-center bg-dark text-white p-2">
                <span>ASSIGN PERMISSION</span>
            </div>
            <div class="card-body">
                <form action="{{route('assign.permission')}}" method="POST">
                    @csrf
                    <div class="form-group">
                            <label for="" class="">Choose Role</label>
                        </div>
                        <div class="form-group">                            
                            <select name="role_id[]" class="form-control">
                                @foreach ($roles as $role)
                                <option value="{{$role->id}}" name="role_id">{{$role->name}}</option>
                                @endforeach
                            </select>                                     
                        </div>

                    <div class="form-group">
                        <label for="" class="">Choose Permission</label>
                    </div>
                    <div class="form-group">                            
                        <select name="permission_id[]" class="form-control multiple_permission" multiple="multiple">
                            @foreach ($permissions as $permission)
                            <option value="{{$permission->id}}">{{$permission->name}}</option>
                            @endforeach
                        </select>                                     
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Assign</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-title text-center bg-dark text-white p-2">
                <span>ASSIGN ROLE</span>
            </div>
            <div class="card-body">
                <form action="{{route('assign.role')}}" method="POST">
                    @csrf
                    <div class="">
                            <label for="" class="">Choose User</label>
                        </div>
                        <div class="form-group">                            
                            <select name="user_id" class="form-control">
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>                                     
                        </div>
                    <div class="">
                        <label for="" class="">Choose Role</label>
                    </div>
                    <div class="form-group">                            
                        <select name="assigned_role_id" class="form-control multiple_permission">
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>                                     
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Role</th>
                    <th>Assigned Permission</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($roles as $role)
                    <tr>
                        <td>
                            <strong>{{$role->name}}</strong>
                        </td>
                        <td>
                            @foreach ($role->getAllPermissions() as $permission)
                                <li class="float-left">
                                    {{$permission->name}} 
                                </li>
                                <a href="{{url('/remove/permission')}}/{{$role->id}}/{{$permission->id}}"><i class="float-right far fa-times-circle"></i></a>
                                <div class="clearfix"></div>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>               
        </table>
    </div>
</div>

@endsection