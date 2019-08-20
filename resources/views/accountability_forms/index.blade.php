@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Accountability Forms </h1>
        <a href="{{ route('accountability_forms.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-lg-1">
                <!-- Nav tabs -->
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-approval-tab" data-toggle="tab" href="#nav-approval" role="tab" aria-controls="nav-approval" aria-selected="true">For Approval</a>
                        <a class="nav-item nav-link" id="nav-approved-tab" data-toggle="tab" href="#nav-approved" role="tab" aria-controls="nav-approved" aria-selected="false">Approved</a>
                        <a class="nav-item nav-link" id="nav-cancelled-tab" data-toggle="tab" href="#nav-cancelled" role="tab" aria-controls="nav-cancelled" aria-selected="false">Cancelled</a>
                        <a class="nav-item nav-link" id="nav-transfered-tab" data-toggle="tab" href="#nav-transfered" role="tab" aria-controls="nav-transfered" aria-selected="false">Transfered</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="nav-approval" role="tabpanel" aria-labelledby="nav-approval-tab">
                        <br>
                        <!-- Accountability Forms Table (FOR APPROVAL) -->
                        <div class="card shadow mb-4">
                            <!-- Table Header -->
                            <div class="card-header bg-warning py-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="m-0 font-weight-bold text-white">For Approval </h6>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('accountability_forms.create') }}" class="btn btn-sm btn-success shadow-sm float-right"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Create Form</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Table Body -->
                            <div class="card-body">
                                <div class="table-responsive">
                                        <table id="for_approval_table" class="table table-bordered table-hover">
                                            @if(count($for_approval) > 0)
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="5%">ID</th>
                                                    <th class="text-center" width="auto">Employee</th>
                                                    <th class="text-center" width="auto">Equipment</th>
                                                    <th class="text-center" width="auto">IT Asset Tag</th>
                                                    <th class="text-center" width="auto">Date Issued</th>
                                                    <th class="text-center" width="15%">Options</th>
                                                    <th class="text-center" width="auto">Download</th>
                                                    @if (auth()->user()->roles->id == 1)
                                                    <th class="text-center" width="auto">Aprrove</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($for_approval as $item)
                                                <tr class="text-center">
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->employees->first_name }} {{ $item->employees->last_name }}</td>
                                                    <td>{{ $item->equipment->name }}</td>
                                                    <td>{{ $item->equipment->it_tag }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->issued_date)->format('F j, Y')}}</td>
                                                    <td class="text-center">
                                                        <a href="/accountability_forms/{{$item->id}}" class="btn btn-md btn-warning"> <i class="fas fa-eye fa-sm text-white"></i></a>
                                                        <a href="/accountability_forms/{{$item->id}}/edit" class="btn btn-md btn-success"> <i class="fas fa-edit fa-sm text-white"></i></a>
                                                        <a href="/accountability_forms/cancelForm/{{$item->id}}" class="btn btn-danger"><i class="fas fa-times"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="pdf/accountability_form/{{$item->id}}" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a>
                                                    </td>
                                                    @if (auth()->user()->roles->id == 1)
                                                    <td>
                                                        <a href="/accountability_forms/approveForm/{{$item->id}}" class="btn btn-success"><i class="fas fa-check"></i></a>
                                                    </td> 
                                                    @endif
                                                   
                                                </tr>
                                                @endforeach
                                            @else
                                                <p>No forms found</p>
                                            @endif
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-approved" role="tabpanel" aria-labelledby="nav-approved-tab">
                        <br>
                         <!-- Accountability Forms Table (APPROVED) -->
                        <div class="card shadow mb-4">
                            <!-- Table Header -->
                            <div class="card-header bg-success py-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="m-0 font-weight-bold text-white">Approved</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Table Body -->
                            <div class="card-body">
                                <div class="table-responsive">
                                        <table id="approved_table" class="table table-bordered table-hover">
                                            @if(count($approved) > 0)
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="5%">ID</th>
                                                    <th class="text-center" width="">Employee</th>
                                                    <th class="text-center" width="">Equipment</th>
                                                    <th class="text-center" width="">IT Asset Tag</th>
                                                    <th class="text-center" width="">Date Issued</th>
                                                    {{-- <th class="text-center" width="">Status</th> --}}
                                                    <th class="text-center" width="13%">Options</th>
                                                    <th class="text-center" width="">Download</th>
                                                    <th class="text-center" width="">Transfer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($approved as $item)
                                                <tr class="text-center">
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->employees->first_name }} {{ $item->employees->last_name }}</td>
                                                    <td>{{ $item->equipment->name }}</td>
                                                    <td>{{ $item->equipment->it_tag }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->issued_date)->format('F j, Y')}}</td>
                                                    {{-- <td>
                                                        <span class="badge badge-success">{{ $item->form_statuses->status }}</span>
                                                    </td> --}}
                                                    <td class="text-center">
                                                        <a href="/accountability_forms/{{$item->id}}" class="btn btn-md btn-warning"> <i class="fas fa-eye fa-sm text-white"></i></a>
                                                        <a href="/accountability_forms/{{$item->id}}/edit" class="btn btn-md btn-success"> <i class="fas fa-edit fa-sm text-white"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="pdf/accountability_form/{{$item->id}}" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="/movement_forms/{{$item->id}}/create" class="btn btn-md btn-info"> <i class="fas fa-exchange-alt fa-sm text-white"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @else
                                                <p>No forms found</p>
                                            @endif
                                        </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="nav-cancelled" role="tabpanel" aria-labelledby="nav-cancelled-tab">
                        <br>
                        <!-- Accountability Forms Table (Cancelled) -->
                        <div class="card shadow mb-4">
                            <!-- Table Header -->
                            <div class="card-header bg-danger py-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="m-0 font-weight-bold text-white">Cancelled</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Table Body -->
                            <div class="card-body">
                                <div class="table-responsive">
                                        <table id="cancelled_table" class="table table-bordered table-hover">
                                            @if(count($cancelled) > 0)
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="5%">ID</th>
                                                    <th class="text-center" width="">Employee</th>
                                                    <th class="text-center" width="">Equipment</th>
                                                    <th class="text-center" width="">IT Asset Tag</th>
                                                    <th class="text-center" width="">Date Issued</th>
                                                    <th class="text-center" width="13%">Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cancelled as $item)
                                                <tr class="text-center">
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->employees->first_name }} {{ $item->employees->last_name }}</td>
                                                    <td>{{ $item->equipment->name }}</td>
                                                    <td>{{ $item->equipment->it_tag }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->issued_date)->format('F j, Y')}}</td>
                                                    <td class="text-center">
                                                        <a href="/accountability_forms/{{$item->id}}" class="btn btn-md btn-warning"> <i class="fas fa-eye fa-sm text-white"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @else
                                                <p>No forms found</p>
                                            @endif
                                        </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="nav-transfered" role="tabpanel" aria-labelledby="nav-transfered-tab">
                        <br>
                        <!-- Accountability Forms Table (Transfered) -->
                        <div class="card shadow mb-4">
                            <!-- Table Header -->
                            <div class="card-header bg-info py-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="m-0 font-weight-bold text-white">Transfered</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Table Body -->
                            <div class="card-body">
                                <div class="table-responsive">
                                        <table id="transfered_table" class="table table-bordered table-hover">
                                            @if(count($transfered) > 0)
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="5%">ID</th>
                                                    <th class="text-center" width="">Employee</th>
                                                    <th class="text-center" width="">Equipment</th>
                                                    <th class="text-center" width="">IT Asset Tag</th>
                                                    <th class="text-center" width="">Date Issued</th>
                                                    {{-- <th class="text-center" width="">Status</th> --}}
                                                    <th class="text-center" width="13%">Options</th>
                                                    <th class="text-center" width="">Download</th>
                                                    <th class="text-center" width="">Transfer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transfered as $item)
                                                <tr class="text-center">
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->employees->first_name }} {{ $item->employees->last_name }}</td>
                                                    <td>{{ $item->equipment->name }}</td>
                                                    <td>{{ $item->equipment->it_tag }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->issued_date)->format('F j, Y')}}</td>
                                                    {{-- <td>
                                                        <span class="badge badge-info">{{ $item->form_statuses->status }}</span>
                                                    </td> --}}
                                                    <td class="text-center">
                                                        <a href="/accountability_forms/{{$item->id}}" class="btn btn-md btn-warning"> <i class="fas fa-eye fa-sm text-white"></i></a>
                                                        <a href="/accountability_forms/{{$item->id}}/edit" class="btn btn-md btn-success"> <i class="fas fa-edit fa-sm text-white"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="pdf/accountability_form/{{$item->id}}" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="/movement_forms/{{$item->id}}/create" class="btn btn-md btn-info"> <i class="fas fa-exchange-alt fa-sm text-white"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @else
                                                <p>No forms found</p>
                                            @endif
                                        </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
    </div>
    

    {{-- <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-lg-1">
            
        </div>

        <div class="offset-lg-1 col-lg-10 offset-lg-1">
           
        </div>


        <div class="offset-lg-1 col-lg-10 offset-lg-1">
            
        </div>



        <div class="offset-lg-1 col-lg-10 offset-lg-1">
            
        </div>


    </div> --}}
    
@endsection