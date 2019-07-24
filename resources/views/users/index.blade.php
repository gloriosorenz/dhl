@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>


<div class="row">
    <div class="offset-lg-2 col-lg-8 offset-lg-2">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <!-- Table Header -->
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Users Table</h6>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-success shadow-sm float-right"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add User</a>
                    </div>
                </div>                
            </div>
            <!-- Table Body -->
            <div class="card-body">
                <div class="table-responsive">
                        <table id="example-table" class="table table-bordered table-hover">
                            @if(count($users) > 0)
                            <thead>
                                <tr>
                                    <th width="">ID</th>
                                    <th width="">Name</th>
                                    <th width="">Email</th>
                                    <th width="">Phone</th>
                                    <th width="">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class='clickable-row' data-href='/users/{{$user->id}}'>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <a href="/users/{{$user->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                        <a href="/users/{{$user->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <p>No users found</p>
                            @endif
                        </table>
                </div>
            </div>
        </div>
    </div>

</div>
    
@endsection