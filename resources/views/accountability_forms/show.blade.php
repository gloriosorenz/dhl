@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Accountability Form</h1>
    </div>

    <a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a>


    <div class="row">
        <div class="offset-lg-2 col-lg-8 offset-lg-2">
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">View Accountability Form</h6>
                        </div>
                    </div>
                </div>
                <!-- Table Body -->
                <div class="card-body">      

                    <table id="users_table" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th width="50%">Employee Name</th>
                                <th width="50%">Equipment Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr">
                                <td class="text-center" style="barcode font">
                                    <input class="form-control" type="text" value="{{$af->employees->first_name}} {{$af->employees->last_name}}" readonly/>
                                </td>
                                <td class="text-center">
                                    <input class="form-control" type="text" value="{{$af->equipment->name}}" readonly/>
                                </td>
                            </tr>
                    </table>

                                   
                    <div class="row">
                        <!-- Designation -->
                        <div class="col-sm-6 form-group">
                            <label>Designation</label>
                            <input class="form-control" type="text" value="{{$af->employees->position}}" readonly/>
                        </div>
                        <!-- Department -->
                        <div class="col-sm-6 form-group" text->
                            <label>Department</label>
                            <input class="form-control" type="text" value="{{$af->employees->departments->name}}" readonly/>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Issued date -->
                        <div class="col-sm-6">
                            <div class="form-group" id="">
                                <label>Issued Date</label>
                                <input class="form-control" type="text" value="{{\Carbon\Carbon::parse($af->issued_date)->format('F j, Y')}}" readonly/>
                            </div>
                        </div>
                        <!-- Issued by -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Issued By</label>
                                <input class="form-control" type="text" value="{{$af->admins->first_name}} {{$af->admins->last_name}}" disabled/>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
@endsection