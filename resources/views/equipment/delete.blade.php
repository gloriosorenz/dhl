@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Delete Equipment?</h1>
    </div>

    <div class="row">
        <div class="offset-lg-3 col-lg-6 offset-lg-3">
            <!-- Show equipment details -->
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Equipment Info</h6>
                        </div>
                    </div>
                </div>
                <!-- Table Body -->
                <div class="card-body">
                    <!-- If equipment is laptop -->
                    @if ($equipment->equipment_types->id != 2)

                        <dl class="row">
                            <dt class="col-sm-2">Name</dt>
                            <dd class="col-sm-9">{{$equipment->name}}</dd>
                            
                            <dt class="col-sm-2">Brand</dt>
                            <dd class="col-sm-9">{{$equipment->brands->name}}</dd>
                            
                            <dt class="col-sm-2">Specifications</dt>
                            <dd class="col-sm-9">{{$equipment->specifications}}</dd>
                            
                            <dt class="col-sm-2">Serial Number</dt>
                            <dd class="col-sm-9">{{$equipment->serial_number}}</dd>

                            <dt class="col-sm-2">IT Tag</dt>
                            <dd class="col-sm-9">{{$equipment->it_tag}}</dd>

                            <dt class="col-sm-2">Unit Cost</dt>
                            <dd class="col-sm-9">{{$equipment->unit_cost}}</dd>

                            <dt class="col-sm-2">Date Purchased</dt>
                            <dd class="col-sm-9">{{$equipment->date_purchased}}</dd>

                            <dt class="col-sm-2">Date Issued</dt>
                            <dd class="col-sm-9">{{$equipment->date_issued}}</dd>
                        </dl>

                    <!-- If equipment is phone -->
                    @elseif($equipment->equipment_types->id == 2)

                        <dl class="row">
                            <dt class="col-sm-2">Name</dt>
                            <dd class="col-sm-9">{{$equipment->name}}</dd>
                            
                            <dt class="col-sm-2">Brand</dt>
                            <dd class="col-sm-9">{{$equipment->brands->name}}</dd>
                            
                            <dt class="col-sm-2">Specifications</dt>
                            <dd class="col-sm-9">{{$equipment->specifications}}</dd>
                            
                            <dt class="col-sm-2">Serial Number</dt>
                            <dd class="col-sm-9">{{$equipment->serial_number}}</dd>

                            <dt class="col-sm-2">Unit Cost</dt>
                            <dd class="col-sm-9">{{$equipment->unit_cost}}</dd>

                            <dt class="col-sm-2">Date Purchased</dt>
                            <dd class="col-sm-9">{{$equipment->date_purchased}}</dd>

                            <dt class="col-sm-2">Date Issued</dt>
                            <dd class="col-sm-9">{{$equipment->date_issued}}</dd>
                        </dl>

                        <dl class="row">
                            <dt class="col-sm-2">Plan</dt>
                            <dd class="col-sm-9">{{$equipment->plan}}</dd>
                            
                            <dt class="col-sm-2">Calls</dt>
                            <dd class="col-sm-9">{{$equipment->brands->calls}}</dd>
                            
                            <dt class="col-sm-2">Text</dt>
                            <dd class="col-sm-9">{{$equipment->text}}</dd>
                            
                            <dt class="col-sm-2">Local Calls</dt>
                            <dd class="col-sm-9">{{$equipment->local_calls}}</dd>

                            <dt class="col-sm-2">Local Text</dt>
                            <dd class="col-sm-9">{{$equipment->local_text}}</dd>

                            <dt class="col-sm-2">Consumable</dt>
                            <dd class="col-sm-9">{{$equipment->consumable}}</dd>

                            <dt class="col-sm-2">NDD</dt>
                            <dd class="col-sm-9">{{$equipment->ndd}}</dd>

                            <dt class="col-sm-2">IDD</dt>
                            <dd class="col-sm-9">{{$equipment->idd}}</dd>

                            <dt class="col-sm-2">Data</dt>
                            <dd class="col-sm-9">{{$equipment->data}}</dd>

                            <dt class="col-sm-2">Roaming</dt>
                            <dd class="col-sm-9">{{$equipment->roaming}}</dd>
                        </dl>

                    @endif

                    <form action="{{ route('equipment.destroy',$equipment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    
@endsection