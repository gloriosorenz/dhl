@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Accountability Form</h1>
    </div>

    {{-- <a class="btn btn-md btn-secondary" href="{{URL::previous()}}">Back</a> --}}


    <div class="row">
        <div class="offset-lg-2 col-lg-8 offset-lg-2">
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Update Accountability Form</h6>
                        </div>
                    </div>
                </div>
                <!-- Table Body -->
                <div class="card-body">      
                    
                    <!-- Start Form -->
                    <form method="POST" action="{{action('AccountabilityFormsController@update', $af->id)}}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf  

                    <table id="users_table" class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th width="50%">Employee Name</th>
                                <th width="50%">Equipment Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr">
                                <td class="text-center">
                                    <select class="form-control select2_demo_1" name="employees_id">
                                        <option value="{{$af->employees->id}}" selected="true">{{$af->employees->first_name}} {{$af->employees->last_name}}</option>
                                        @foreach ($employees as $item)
                                            <option value="{{ $item['id']}}">{{ $item['first_name']}} {{ $item['last_name']}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="text-center">
                                    <select class="form-control select2_demo_1" name="equipment_id">
                                        <option value="{{$af->equipment->id}}" selected="true">{{$af->equipment->name}}</option>
                                        @foreach ($equipment as $type)
                                            <option value="{{ $type['id']}}">{{ $type['name']}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                    </table>

                                   
                    <div class="row">
                        <!-- Designation -->
                        <div class="col-sm-6 form-group">
                            <label>Designation</label>
                            <input class="form-control" type="text" name="designation" value="{{$af->designation}}" required/>
                        </div>
                        <!-- Department -->
                        <div class="col-sm-6 form-group" text->
                            <label for="exampleFormControlSelect1">Department</label>
                            <select class="form-control select2_demo_1" id="exampleFormControlSelect1" name="departments_id">
                                <option value="{{$af->departments->id}}" selected="true">{{$af->departments->name}}</option>
                                <optgroup label="Departments">
                                    @foreach ($departments as $name)
                                        <option value="{{ $name['id']}}">{{ $name['name']}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Issued date -->
                        <div class="col-sm-6">
                            <div class="form-group" id="">
                                <label class="font-normal">Issued Date</label>
                                <!-- Auto set date (now) -->
                                <input class="form-control" type="text" value="{{ \Carbon\Carbon::now()->format('F j, Y')}}" disabled/>

                                <!-- To change date -->
                                {{-- <div class="input-group date" data-provide="datepicker">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" aria-describedby="inputGroupPrepend" name="issued_date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <!-- Issued by -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Issued By</label>
                                <input class="form-control" type="text" value="{{auth()->user()->first_name}} {{auth()->user()->last_name}}" disabled/>
                                <input type="hidden" name="admins_id" value="{{auth()->user()->id}}">
                            </div>
                        </div>
                    </div>


                    <!-- Buttons -->
                    <div class="form-group">
                        <a href="{{URL::previous()}}" class="btn btn-danger">Cancel</a>
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                    
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
    
@endsection