@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create a Movement Form</h1>
    </div>

    {{-- <a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a> --}}


    <div class="row">
        <div class="offset-lg-2 col-lg-8 offset-lg-2">
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Create Movement Form</h6>
                        </div>
                    </div>
                </div>
                <!-- Table Body -->
                <div class="card-body">      
                    
                    <!-- Start Form -->
                    <form method="post" action="{{action('MovementFormsController@store')}}" enctype="multipart/form-data">
                    @csrf  

                    <!-- Employee Details -->
                    <h4>Employee Details</h4>
                    <br>
                    <dl class="row">
                        <dt class="col-sm-3">Employee Name</dt>
                        <dd class="col-sm-9">{{$af->employees->first_name}} {{$af->employees->last_name}}</dd>
                        
                        <dt class="col-sm-3">Employee Number</dt>
                        <dd class="col-sm-9">N/A</dd>
                        
                        <dt class="col-sm-3">Position</dt>
                        <dd class="col-sm-9">{{$af->employees->position}}</dd>
                        
                        <dt class="col-sm-3 text-truncate">Site</dt>
                        <dd class="col-sm-9">N/A</dd>

                        <dt class="col-sm-3">Cost Center</dt>
                        <dd class="col-sm-9">N/A</dd>
                    </dl>

                    <hr>

                    <!-- Equipmenet Details -->
                    <h4>Equipment Details</h4>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th width="auto">Equipment Type</th>
                                <th width="auto">Model</th>
                                <th width="auto">Serial Number</th>
                                <th width="auto">IT Tag Number</th>
                                <th width="auto">Asset Number</th>
                                <th width="auto">Reason Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>
                                    {{$af->equipment->equipment_types->type}}
                                </td>
                                <td>
                                    {{$af->equipment->name}}
                                </td>
                                <td>
                                    {{$af->equipment->serial_number}}
                                </td>
                                <td>
                                    {{$af->equipment->it_tag}}
                                </td>
                                <td>
                                    {{$af->equipment->asset_tag}}
                                </td>
                                <td>
                                    <select class="form-control select2_demo_1" id="exampleFormControlSelect1" name="reason_codes_id">
                                        <option value="0" selected="true" disabled="True">Select Code</option>
                                        <optgroup label="Codes">
                                            @foreach ($reason_code as $code)
                                                <option value="{{ $code['id']}}">{{ $code['code']}} - {{ $code['reason']}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </td>
                            </tr>
                    </table>

                    <div class="row">
                        <div class="col-sm-12">
                                <div class="form-group">
                                <label for="exampleFormControlTextarea1">Remarks</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                        </div>
                    </div>

                                  
                    <div class="row">
                        <!-- Issued by -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Prepared By</label>
                                <input class="form-control" type="text" value="{{auth()->user()->first_name}} {{auth()->user()->last_name}} - {{auth()->user()->position}}" disabled/>
                                <input type="hidden" name="admins_id" value="{{auth()->user()->id}}">
                            </div>
                        </div>
                    </div>


                    <!-- Buttons -->
                    <div class="form-group">
                        <a href="{{URL::previous()}}" class="btn btn-danger">Cancel</a>
                        <button class="btn btn-success" type="submit">+ Create</button>
                    </div>
                    
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
    
@endsection