@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Request</h1>
    </div>

    <!-- If user is admin -->
    @if(auth()->user()->roles_id == 1)
    <div class="row">
        <div class="offset-lg-2 col-lg-8 offset-lg-2">
            <!-- Request Table -->
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Request Form</h6>
                        </div>
                    </div>
                </div>
                <!-- Table Body -->
                <div class="card-body">                
                    {{-- <table id="users_table" class="table table-hover">
                        @if(count($equipment) > 0)
                        <thead>
                            <tr>
                                <th width="">ID</th>
                                <th width="">Name</th>
                                <th width="">Type</th>
                                <th width="">Specifications</th>
                                <th width="">Quantity</th>
                                <th width="">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($equipment as $item)
                            <tr class="tr">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->equipment_types->type }}</td>
                                <td>{{ $item->specifications }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    <!-- Start Form -->
                                    <form method="post" action="{{action('RequestsController@store')}}" enctype="multipart/form-data">
                                        @csrf   
                                        <input type="hidden" name="equipment_id" value="{{ $item->id }}">
                                        <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
                                        <button class="btn btn-success" type="submit">Request</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <p>No equipment found</p>
                        @endif
                    </table> --}}
                </div>
            </div>
        </div>
    </div>




    <!-- If user is employee-->
    @elseif(auth()->user()->roles_id == 2)
    <div class="row">
        <div class="offset-lg-2 col-lg-8 offset-lg-2">
            <!-- Request Table -->
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Request Form</h6>
                        </div>
                    </div>
                </div>
                <!-- Table Body -->
                <div class="card-body">                
                    <table id="users_table" class="table table-hover">
                        @if(count($equipment) > 0)
                        <thead>
                            <tr>
                                <th width="">ID</th>
                                <th width="">Name</th>
                                <th width="">Type</th>
                                <th width="">Specifications</th>
                                <th width="">Quantity</th>
                                <th width="">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($equipment as $item)
                            <tr class="tr">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->equipment_types->type }}</td>
                                <td>{{ $item->specifications }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    <!-- Start Form -->
                                    <form method="post" action="{{action('RequestsController@store')}}" enctype="multipart/form-data">
                                        @csrf   
                                        <input type="hidden" name="equipment_id" value="{{ $item->id }}">
                                        <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
                                        <button class="btn btn-success" type="submit">Request</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <p>No equipment found</p>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
    
@endsection