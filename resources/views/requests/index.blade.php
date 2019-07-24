@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Requests</h1>
    </div>

    <div class="row">
        <div class="offset-lg-2 col-lg-8 offset-lg-2">
            <!-- Request Table -->
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Request Table</h6>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('requests.create') }}" class="btn btn-sm btn-success shadow-sm float-right"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Create Request</a>
                        </div>
                    </div>
                </div>
                <!-- Table Body -->
                <div class="card-body">
                    <div class="table-responsive">
                            <table id="users_table" class="table table-hover">
                                @if(count($requests) > 0)
                                <thead>
                                    <tr>
                                        <th width="">ID</th>
                                        <th width="">Name</th>
                                        <th width="">Employee</th>
                                        <th class="text-right">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($requests as $item)
                                    <tr class="tr">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->equipment->name }}</td>
                                        <td>{{ $item->users->first_name }} {{ $item->users->last_name }}</td>
                                        <td class="text-right">
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-times"></i>
                                            </button>
                                            <a href="/accountability_forms/{{$item->id}}" class="btn btn-success"><i class="fas fa-check"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <p>No request found</p>
                                @endif
                            </table>
                    </div>
                </div>
            </div>


             <!-- Modal -->
             <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Remove request?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this request?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="{{ route('requests.destroy',$item->id ?? 'Name not set') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
@endsection