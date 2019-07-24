@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add a Brand</h1>
    </div>

    <a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>


    <div class="row">
        <div class="offset-lg-2 col-lg-8 offset-lg-2">
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Brand Details</h6>
                        </div>
                    </div>
                </div>
                <!-- Table Body -->
                <div class="card-body">

                    <!-- Start Form -->
                    <form method="POST" action="{{action('BrandsController@store')}}" enctype="multipart/form-data">
                    @csrf 
                        <div class="row">
                            <!-- Brand Name -->
                            <div class="col-sm-6 form-group">
                                <label>Brand Name</label>
                                <input class="form-control" type="text" placeholder="Enter name" name="name">
                            </div>
                            <!-- Equipment Type -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Equipment Type</label>
                                    <select class="form-control" name="equipment_types_id">
                                        <option value="0" selected="true" disabled="True">Select Type</option>
                                        @foreach ($equipment_types as $item)
                                            <option value="{{ $item['id']}}">{{ $item['type']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Logo file -->
                            <div class="col-sm-6">
                                <label>Logo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="logo" name="logo">
                                    <label class="custom-file-label" for="logo">Choose file</label>
                                </div>
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