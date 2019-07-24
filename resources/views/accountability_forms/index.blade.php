@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Accountability Forms</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="row">
        <div class="offset-lg-2 col-lg-8 offset-lg-2">
            <!-- Accountability Forms Table -->
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Accountability Forms</h6>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('accountability_forms.create') }}" class="btn btn-sm btn-success shadow-sm float-right"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Create Form</a>
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
                                        <th width="">IT Asset Tag</th>
                                        <th width="">Date Issued</th>
                                        <th class="text-center">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($acc_forms as $item)
                                    <tr class='clickable-row' data-href='/accountability_forms/{{$item->id}}'>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->employees->first_name }} {{ $item->employees->last_name }}</td>
                                        <td>{{ $item->equipment->name }}</td>
                                        <td>{{ $item->equipment->it_tag }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->issued_date)->format('F j, Y')}}</td>
                                        <td class="text-center">
                                            <a href="/accountability_forms/{{$item->id}}" class="btn btn-md btn-warning"> <i class="fas fa-eye fa-sm text-white"></i></a>
                                            <a href="/accountability_forms/{{$item->id}}/edit" class="btn btn-md btn-success"> <i class="fas fa-edit fa-sm text-white"></i></a>
                                            <a href="pdf/accountability_form/{{$item->id}}" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a>
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
    
@endsection