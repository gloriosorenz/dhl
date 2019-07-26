@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Accountability Forms</h1>
        <a href="{{ route('accountability_forms.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Create Form</a>
    </div>

    <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-lg-1">
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
                                        <th class="text-center" width="5%">ID</th>
                                        <th class="text-center" width="">Employee</th>
                                        <th class="text-center" width="">Equipment</th>
                                        <th class="text-center" width="">IT Asset Tag</th>
                                        <th class="text-center" width="">Date Issued</th>
                                        <th class="text-center" width="">Status</th>
                                        <th class="text-center" width="20%">Options</th>
                                        <th class="text-center" width="">Download</th>
                                        <th class="text-center" width="">Transfer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($acc_forms as $item)
                                    <tr class="text-center">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->employees->first_name }} {{ $item->employees->last_name }}</td>
                                        <td>{{ $item->equipment->name }}</td>
                                        <td>{{ $item->equipment->it_tag }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->issued_date)->format('F j, Y')}}</td>
                                        <td>
                                            @if ($item->form_statuses->id == 1)
                                            <span class="badge badge-warning">{{ $item->form_statuses->status }}</span>
                                            @else
                                            <span class="badge badge-success">{{ $item->form_statuses->status }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="/accountability_forms/{{$item->id}}" class="btn btn-md btn-warning"> <i class="fas fa-eye fa-sm text-white"></i></a>
                                            <a href="/accountability_forms/{{$item->id}}/edit" class="btn btn-md btn-success"> <i class="fas fa-edit fa-sm text-white"></i></a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-times"></i>
                                            </button>
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







            <!-- Delete Form Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete form?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this equipement?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="{{ route('accountability_forms.destroy',$item->id ?? 'Not set') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-success">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    
@endsection