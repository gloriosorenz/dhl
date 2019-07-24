@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Equipment</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <div class="row">
        <div class="offset-lg-3 col-lg-6 offset-lg-3">

            <!-- Show equipment details -->
            <div class="card shadow mb-4">
                    <!-- Table Header -->
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="m-0 font-weight-bold text-primary">Equipment Table</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Table Body -->
                    <div class="card-body">
                        <!-- If equipment is laptop -->
                        @if ($equipment->equipment_types->id == 1)
                            <p>Name: {{$equipment->name}}</p>
                            <p>Brand: {{$equipment->brand}}</p>
                            <p>Specifications: {{$equipment->specifications}}</p>
                            <p>Serial Number: {{$equipment->serial_number}}</p>
                            <p>Unit Cost: {{$equipment->unit_cost}}</p>
                            <p>Date Purchased: {{$equipment->date_purchased}}</p>
                            <p>Date issued: {{$equipment->date_issued}}</p>

                        <!-- If equipment is phone -->
                        @elseif($equipment->equipment_types->id == 2)
                            <p>Name: {{$equipment->name}}</p>
                            <p>Brand: {{$equipment->brand}}</p>
                            <p>Specifications: {{$equipment->specifications}}</p>
                            <p>Serial Number: {{$equipment->serial_number}}</p>
                            <p>Unit Cost: {{$equipment->unit_cost}}</p>
                            <p>Date Purchased: {{$equipment->date_purchased}}</p>
                            <p>Date issued: {{$equipment->date_issued}}</p>
                            <br>
                            <p>Plan: {{$equipment->plan}}</p>
                            <p>Calls: {{$equipment->calls}}</p>
                            <p>Text: {{$equipment->text}}</p>
                            <p>Local Calls: {{$equipment->local_calls}}</p>
                            <p>Local Text: {{$equipment->local_text}}</p>
                            <p>Consumable: {{$equipment->consumable}}</p>
                            <p>NDD: {{$equipment->ndd}}</p>
                            <p>IDD: {{$equipment->idd}}</p>
                            <p>Data: {{$equipment->data}}</p>
                            <p>Roaming: {{$equipment->roaming}}</p>

                        <!-- If equipment is rf gun -->
                        @elseif($equipment->equipment_types->id == 3)

                        <!-- If equipment is desktop -->
                        @elseif($equipment->equipment_types->id == 4)

                        <!-- If equipment is external drive -->
                        @elseif($equipment->equipment_types->id == 5)

                        @endif
                    </div>
                </div>


            
                
                
            
            


           

        </div>

    </div>
    
@endsection