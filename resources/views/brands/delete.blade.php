@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Delete Brand?</h1>
    </div>

    <div class="row">
        <div class="offset-lg-3 col-lg-6 offset-lg-3">
            <!-- Show brand details -->
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Brand Info</h6>
                        </div>
                    </div>
                </div>
                <!-- Table Body -->
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-2">Name</dt>
                        <dd class="col-sm-9">{{$brand->name}}</dd>

                        <dt class="col-sm-2">Type</dt>
                        <dd class="col-sm-9">{{$brand->equipment_types->type}}</dd>
                    </dl>

                    <form action="{{ route('brands.destroy', $brand->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    
@endsection