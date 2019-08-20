@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add a Department</h1>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Department Details</h6>
                        </div>
                    </div>
                </div>
                <!-- Table Body -->
                <div class="card-body">

                    <!-- Start Form -->
                    <form method="POST" action="{{action('DepartmentsController@store')}}" enctype="multipart/form-data">
                    @csrf 
                        <div class="row">
                            <!-- Department Name -->
                            <div class="col-sm-12 form-group">
                                <label>Department Name</label>
                                <input class="form-control" type="text" placeholder="Enter name" name="name">
                            </div>
                        </div>

                        <hr>
                        <!-- Buttons -->
                        <div class="form-group">
                            <a href="{{URL::previous()}}" class="btn btn-danger" type="submit">Cancel</a>
                            <button class="btn btn-success" type="submit">Create</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>

    
@endsection