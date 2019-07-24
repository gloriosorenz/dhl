@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Department</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="row">
    <div class="offset-lg-2 col-lg-8 offset-lg-2">
        <!-- Brand Table -->
        <div class="card shadow mb-4">
            <!-- Table Header -->
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Departments Table</h6>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('departments.create') }}" class="btn btn-sm btn-success shadow-sm float-right"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add Department</a>
                    </div>
                </div>
            </div>
            <!-- Table Body -->
            <div class="card-body">
                <div class="table-responsive">
                        <table id="departments_table" class="table table-striped table-bordered table-hover">
                            @if(count($departments) > 0)
                            <thead class="text-center">
                                <tr>
                                    <th width="15%">ID</th>
                                    <th width="">Department Name</th>
                                    <th width="20%" class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($departments as $item)
                                <tr class='clickable-row' data-href='/departments/{{$item->id}}'>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-center">
                                        <a href="/departments/{{$item->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fas fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <p>No brands found</p>
                            @endif
                        </table>
                </div>
            </div>
        </div> <!-- End Card -->


        
        
        <!-- Remove Brand Modal -->
        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remove brand?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                Are you sure you want to delete this equipement?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="{{ route('brands.destroy',$item->id ?? 'Not set') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-success">Delete</button>
                </form>
                </div>
            </div>
            </div>
        </div> --}}

    </div>
</div>


    
@endsection