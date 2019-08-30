@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Equipment</h1>
    </div>

    <div class="row">
        <div class="offset-lg-2 col-lg-8 offset-lg-2">
            <!-- Equipment Table -->
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Equipment Form</h6>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
                <!-- Table Body -->
                <div class="card-body">

                        <!-- -------------------------------------------------------------------------------------------------------------------------------------------- -->
                            <!-- If phone -->
                            @if ($equipment->equipment_types->id == 2)
                                <!-- Start Form -->
                                <form method="POST" action="{{action('EquipmentController@update', $equipment->id)}}" enctype="multipart/form-data">
                                @method('PATCH')                                
                                @csrf  
                                    <!-- Equipment Type -->
                                    <input name="equipment_types_id" type="hidden" value="2">

                                    <div class="row">
                                        <!-- IT Tag -->
                                        <div class="col-sm-6 form-group">
                                            <label>IT Tag</label>
                                            <input class="form-control" type="text" name="it_tag" value="{{$equipment->it_tag}}"/>
                                        </div>
                                        <!-- Asset Tag -->
                                        <div class="col-sm-6 form-group">
                                            <label>Asset Tag</label>
                                            <input class="form-control" type="text" name="asset_tag" value="{{$equipment->asset_tag}}"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Name -->
                                        <div class="col-sm-6 form-group">
                                            <label>Name / Model</label>
                                            <input class="form-control" type="text" name="name" value="{{$equipment->name}}"/>
                                        </div>
                                        <!-- Brand -->
                                        <div class="col-sm-6 form-group">
                                            <label for="exampleFormControlSelect1">Brand</label>
                                            <select class="form-control select2_demo_1"  name="brands_id" id="brands_id" data-width="100%">
                                                <option value="{{$equipment->brands->id}}" selected="true">{{$equipment->brands->name}}</option>
                                                @foreach ($phone_brands as $item)
                                                    <option value="{{ $item['id']}}">{{ $item['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Specifications -->
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label for="exampleFormControlTextarea1">Specifications:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="specifications">{{$equipment->specifications}}</textarea>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                        <!-- Serial number -->
                                        <div class="col-sm-6 form-group">
                                            <label>Serial Number</label>
                                            <input class="form-control" type="text" name="serial_number" value="{{$equipment->serial_number}}"/>
                                        </div>
                                        <!-- Unit cost -->
                                        <div class="col-sm-6 form-group">
                                            <label>Unit Cost (₱)</label>
                                            <input class="form-control" type="number" step="0.01" min="1" name="unit_cost" value="{{$equipment->unit_cost}}"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Date purchased -->
                                        <div class="col-sm-6">
                                            <div class="form-group" id="">
                                                <label class="font-normal">Date Purchased</label>
                                                <div class="input-group date" data-provide="datepicker">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-calendar"></i>
                                                            </span>
                                                        </div>
                                                    <input type="text" class="form-control" aria-describedby="inputGroupPrepend" name="date_purchased" value="{{$equipment->date_purchased}}">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-th"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Date issued -->
                                        <div class="col-sm-6">
                                            <div class="form-group"
                                                <label class="font-normal">Date Issued</label>
                                                <div class="input-group date" data-provide="datepicker">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-calendar"></i>
                                                            </span>
                                                        </div>
                                                    <input type="text" class="form-control" aria-describedby="inputGroupPrepend" name="date_issued" value="{{$equipment->date_issued}}">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-th"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        <!-- Plan -->
                                        <div class="col-sm-4 form-group">
                                            <label>Plan</label>
                                            <input class="form-control" type="text" placeholder="Plan" name="plan" value="{{$equipment->plan}}"/>
                                        </div>
                                        <!-- Calls -->
                                        <div class="col-sm-4 form-group">
                                            <label>Calls</label>
                                            <input class="form-control" type="text" placeholder="Calls" name="calls" value="{{$equipment->calls}}"/>
                                        </div>
                                        <!-- Text -->
                                        <div class="col-sm-4 form-group">
                                            <label>Text</label>
                                            <input class="form-control" type="text" placeholder="Text" name="text" value="{{$equipment->text}}"/>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <!-- Local Calls -->
                                        <div class="col-sm-6 form-group">
                                            <label>Local Calls</label>
                                            <input class="form-control" type="text" placeholder="Local Calls" name="loca_calls" value="{{$equipment->local_calls}}"/>
                                        </div>
                                        <!-- Local Text -->
                                        <div class="col-sm-6 form-group">
                                            <label>Local Text</label>
                                            <input class="form-control" type="text" placeholder="Local Text" name="local_text" value="{{$equipment->local_text}}"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Consumable -->
                                        <div class="col-sm-6 form-group">
                                            <label>Consumable</label>
                                            <input class="form-control" type="text" placeholder="Consumable" name="consumable" value="{{$equipment->consumable}}"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- NDD -->
                                        <div class="col-sm-6 form-group">
                                            <label>NDD</label>
                                            <input class="form-control" type="text" placeholder="NDD" name="ndd" value="{{$equipment->ndd}}"/>
                                        </div>
                                        <!-- IDD -->
                                        <div class="col-sm-6 form-group">
                                            <label>IDD</label>
                                            <input class="form-control" type="text" placeholder="IDD" name="idd" value="{{$equipment->idd}}"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Data -->
                                        <div class="col-sm-6 form-group">
                                            <label>Data</label>
                                            <input class="form-control" type="text" placeholder="Data" name="data" value="{{$equipment->data}}"/>
                                        </div>
                                        <!-- Romaing -->
                                        <div class="col-sm-6 form-group">
                                            <label>Roaming</label>
                                            <input class="form-control" type="text" placeholder="Roaming" name="roaming" value="{{$equipment->roaming}}"/>
                                        </div>
                                    </div>

                                    <!-- Notes -->
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label for="exampleFormControlTextarea1">Notes:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="notes">{{$equipment->notes}}</textarea>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="form-group">
                                        <a href="{{URL::previous()}}" class="btn btn-danger" type="submit">Cancel</a>
                                        <button class="btn btn-success" type="submit">Update</button>
                                    </div>
                                </form>
                                <!-- End Form -->

                            <!-- If laptop, rf gun, desktop and exter drive -->
                            @else
                                <!-- Start Form -->
                                <form method="POST" action="{{action('EquipmentController@update', $equipment->id)}}" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf     
                                    <!-- Equipment types -->
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label for="exampleFormControlSelect1">Type</label>
                                            <select class="form-control select2_demo_1"  name="equipment_types_id" id="equipment_types_id" data-width="100%">
                                                <option value="{{$equipment->equipment_types->id}}" selected="true">{{$equipment->equipment_types->type}}</option>
                                                @foreach ($equipment_types as $type)
                                                    <option value="{{ $type['id']}}">{{ $type['type']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- IT Tag -->
                                        <div class="col-sm-6 form-group">
                                            <label>IT Tag</label>
                                            <input class="form-control" type="text" name="it_tag" value="{{$equipment->it_tag}}"/>
                                        </div>
                                        <!-- Asset Tag -->
                                        <div class="col-sm-6 form-group">
                                            <label for="exampleFormControlSelect1">Asset Tag</label>
                                            <input class="form-control" type="text" name="asset_tag" value="{{$equipment->asset_tag}}">

                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <!-- Name -->
                                        <div class="col-sm-6 form-group">
                                            <label>Name / Model</label>
                                            <input class="form-control" type="text" name="name" value="{{$equipment->name}}">
                                        </div>
                                        <!-- Brand -->
                                        <div class="col-sm-6 form-group">
                                            <label for="exampleFormControlSelect1">Brand</label>
                                            <select class="form-control select2_demo_1" name="brands_id" id="brands_id" data-width="100%">
                                                <option value="{{$equipment->brands->id}}" selected="true">{{$equipment->brands->name}}</option>
                                                <optgroup label="Laptop">
                                                    @foreach ($laptop_brands as $item)
                                                        <option value="{{ $item['id']}}">{{ $item['name']}}</option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="RF Gun">
                                                    @foreach ($rf_gun_brands as $item)
                                                        <option value="{{ $item['id']}}">{{ $item['name']}}</option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="Desktop">
                                                    @foreach ($desktop_brands as $item)
                                                        <option value="{{ $item['id']}}">{{ $item['name']}}</option>
                                                    @endforeach
                                                </optgroup>
                                                <optgroup label="External Drive">
                                                    @foreach ($external_drive_brands as $item)
                                                        <option value="{{ $item['id']}}">{{ $item['name']}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Specifications -->
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label for="exampleFormControlTextarea1">Specifications:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="specifications">{{$equipment->specifications}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <!-- Serial number -->
                                        <div class="col-sm-6 form-group">
                                            <label>Serial Number</label>
                                            <input class="form-control" type="text" placeholder="Serial Number" name="serial_number" value="{{$equipment->serial_number}}">
                                        </div>
                                        <!-- Unit cost -->
                                        <div class="col-sm-6 form-group">
                                            <label>Unit Cost (₱)</label>
                                            <input class="form-control" type="number" placeholder="₱0.00" step="0.01" min="1" name="unit_cost" value="{{$equipment->unit_cost}}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Date purchased -->
                                        <div class="col-sm-6">
                                            <div class="form-group" id="">
                                                <label class="font-normal">Date Purchased</label>
                                                <div class="input-group date" data-provide="datepicker">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-calendar"></i>
                                                            </span>
                                                        </div>
                                                    <input type="text" class="form-control" placeholder="Enter Date" aria-describedby="inputGroupPrepend" name="date_purchased" value="{{$equipment->date_purchased}}">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-th"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Date issued -->
                                        <div class="col-sm-6">
                                            <div class="form-group"
                                                <label class="font-normal">Date Issued</label>
                                                <div class="input-group date" data-provide="datepicker">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-calendar"></i>
                                                            </span>
                                                        </div>
                                                    <input type="text" class="form-control" placeholder="Enter Date" aria-describedby="inputGroupPrepend" name="date_issued" value="{{$equipment->date_issued}}">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-th"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Notes -->
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label for="exampleFormControlTextarea1">Notes:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="notes">{{$equipment->notes}}</textarea>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="form-group">
                                        <a href="{{URL::previous()}}" class="btn btn-danger" type="submit">Cancel</a>
                                        <button class="btn btn-success" type="submit">Update</button>
                                    </div>
                                </form>
                                <!-- End Form -->
                            @endif
                               

                        
                        <!-- -------------------------------------------------------------------------------------------------------------------------------------------- -->
                                
                </div>
            </div>
        </div>
    </div>

@endsection