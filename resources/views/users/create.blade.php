@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create a User</h1>
    </div>

    <a class="btn btn-md btn-secondary" href="{{route('users.index')}}">Back</a>


    <div class="row">
        <div class="offset-lg-2 col-lg-8 offset-lg-2">
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">User Details</h6>
                        </div>
                    </div>
                </div>
                <!-- Table Body -->
                <div class="card-body">

                    <!-- Start Form -->
                    <form method="post" action="{{action('UsersController@store')}}" enctype="multipart/form-data">
                    @csrf   
                        <!-- Request form id (hidden) -->
                        <div class="row">
                            <!-- First Name -->
                            <div class="col-sm-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="Enter first name" name="first_name">
                            </div>
                            <!-- Last Name -->
                            <div class="col-sm-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="Enter last name" name="last_name">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Position -->
                            <div class="col-sm-6">
                                <label>Position</label>
                                <input class="form-control" type="text" placeholder="Enter position" name="postion">
                                {{-- <div class="form-group">
                                    <label for="exampleFormControlSelect1">Position</label>
                                    <select class="form-control" name="users_id">
                                        <option value="0" selected="true" disabled="True">Select Postition</option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item['id']}}">{{ $item['name']}}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                            </div>
                             <!-- Department -->
                             <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Department</label>
                                    <select class="form-control" name="users_id">
                                        <option value="0" selected="true" disabled="True">Select Department</option>
                                        @foreach ($department as $item)
                                            <option value="{{ $item['id']}}">{{ $item['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Roles -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Roles</label>
                                    <select class="form-control" name="roles_id">
                                        <option value="0" selected="true" disabled="True">Select Role</option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item['id']}}">{{ $item['title']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Email -->
                            <div class="col-sm-6 form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" placeholder="Enter email" name="email" required autocomplete="email">
                            </div>
                            <!-- Phone -->
                            <div class="col-sm-6 form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" placeholder="Enter number" name="phone">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Password -->
                            <div class="col-sm-6 form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" placeholder="Enter password" name="password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Confirm Password -->
                            <div class="col-sm-6">
                                <label>Confirm Password</label>
                                <input class="form-control" type="password" placeholder="Enter password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <hr>
                        <!-- Buttons -->
                        <div class="form-group">
                            <a href="{{URL::previous()}}" class="btn btn-danger" type="submit">Cancel</a>
                            <button class="btn btn-success" type="submit">+ Create</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
    
@endsection