@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Equipment</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="row">
        <div class="offset-lg-2 col-lg-8 offset-lg-2">
            <!-- Equipment Table -->
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Equipment Table</h6>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('equipment.create') }}" class="btn btn-sm btn-success shadow-sm float-right"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add Equipment</a>
                        </div>
                    </div>
                </div>
                <!-- Table Body -->
                <div class="card-body">
                    <div class="table-responsive">
                            <table id="equipment_table" class="table table-bordered table-hover">
                                @if(count($equipment) > 0)
                                <thead>
                                    <tr>
                                        <th width="">ID</th>
                                        <th width="">IT Asset Tag</th>
                                        <th width="">Name</th>
                                        <th width="">Type</th>
                                        <th width="">Brand</th>
                                        <th width="">Quantity</th>
                                        <th width="20%">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($equipment as $e)
                                    <tr class="tr">
                                        <td>{{ $e->id }}</td>
                                        <td>{{ $e->it_tag }}</td>
                                        <td>{{ $e->name }}</td>
                                        <td>{{ $e->equipment_types->type }}</td>
                                        <td>{{ $e->brands->name }}</td>
                                        <td>{{ $e->quantity }}</td>
                                        <td>
                                            <a href="/equipment/{{$e->id}}"><button class="btn btn-warning btn-md btn-fill" id="btn_view" name="btn_view"><i class="fas fa-eye"></i></button></a>
                                            <a href="/equipment/{{$e->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                            
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <p>No equipment found</p>
                                @endif
                            </table>
                    </div>
                </div>
            </div> <!-- End Card -->


            
            
            <!-- Remove Equipment Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Remove equipment?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    Are you sure you want to delete this equipement?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="{{ route('equipment.destroy',$e->id ?? 'Not set') }}" method="POST">
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