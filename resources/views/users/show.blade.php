@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employee</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <div class="row">
        <div class="offset-lg-2 col-lg-8 offset-lg-2">

            <!-- Show equipment details -->
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Employee Information</h6>
                        </div>
                    </div>
                </div>
                <!-- Table Body -->
                <div class="card-body">

                        <!-- Employee Description -->
                        <dl class="row">
                            <dt class="col-sm-2">Frist Name</dt>
                            <dd class="col-sm-9">{{$user->first_name}}</dd>
                            
                            <dt class="col-sm-2">Last Name</dt>
                            <dd class="col-sm-9">{{$user->last_name}}</dd>
                            
                            <dt class="col-sm-2">Position</dt>
                            <dd class="col-sm-9">{{$user->position}}</dd>
                            
                            <dt class="col-sm-2">Department</dt>
                            <dd class="col-sm-9">{{$user->departments->name}}</dd>

                            <dt class="col-sm-2">Role</dt>
                            <dd class="col-sm-9">{{$user->roles->title}}</dd>

                            <dt class="col-sm-2">Email</dt>
                            <dd class="col-sm-9">{{$user->email}}</dd>

                            <dt class="col-sm-2">Phone</dt>
                            <dd class="col-sm-9">{{$user->phone}}</dd>
                        </dl>
                            
                </div>
            </div>
        </div>
    </div>



    <!-- Equipment on hand -->
    <div class="row">
        <div class="offset-lg-2 col-lg-8 offset-lg-2">
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Equipment on hand</h6>
                        </div>
                    </div>
                </div>
                <!-- Table Body -->
                <div class="card-body">
                    <div class="table-responsive">
                            <table id="accountability_forms_table" class="table table-bordered table-hover">
                                @if(count($acc_forms) > 0)
                                <thead>
                                    <tr>
                                        <th width="">ID</th>
                                        <th width="">Employee</th>
                                        <th width="">Equipment</th>
                                        <th width="">IT tag</th>
                                        <th width="">Date Issued</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($acc_forms as $item)
                                    <tr class="tr">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->employees->first_name }} {{ $item->employees->last_name }}</td>
                                        <td>{{ $item->equipment->name }}</td>
                                        <td>{{ $item->equipment->it_tag }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->issued_date)->format('F j, Y')}}</td>
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
    </div>
    
@endsection