@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Brand</h1>
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
                        <h6 class="m-0 font-weight-bold text-primary">Brands Table</h6>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('brands.create') }}" class="btn btn-sm btn-success shadow-sm float-right"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add Brand</a>
                    </div>
                </div>
            </div>
            <!-- Table Body -->
            <div class="card-body">
                <div class="table-responsive">
                        <table id="brands_table" class="table table-striped table-bordered table-hover">
                            @if(count($brands) > 0)
                            <thead class="text-center">
                                <tr>
                                    <th width="15%">Logo</th>
                                    <th width="">Brand Name</th>
                                    <th width="">Type</th>
                                    <th width="20%" class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($brands as $item)
                                <tr class="tr">
                                    <td>
                                        @if($item->logo)
                                            <div class="img-wrap">
                                                <img src="/storage/logos/{{$item->logo}}" class="img-thumbnail img-sm" width="100%" height="100%">
                                                {{-- <img src="/storage/logos/{{$item->logo}}" width="50" height="50"> --}}
                                            </div>
                                        @else
                                            <div class="img-wrap">
                                                <img src="/img/image.png" class="img-thumbnail img-sm"/>
                                            </div>
                                        @endif
                                       
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->equipment_types->type }}</td>
                                    <td class="text-center">
                                        <a href="/brands/{{$item->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        </div>

    </div>
</div>

<style>
    .img-sm {
        width: 100%;
        max-height: 75px;
        object-fit: contain;
    }
</style>
    
@endsection