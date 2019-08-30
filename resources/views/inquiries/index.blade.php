@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Inquiries</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- If user is HR Admin -->
@if (auth()->user()->roles->id == 3) 
    <div class="row">
        <div class="offset-lg-2 col-lg-8 offset-lg-2">
            <!-- Inquiry Table -->
            <div class="card shadow mb-4">
                <!-- Table Header -->
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Inquiries Table</h6>
                        </div>
                        {{-- <div class="col-md-6">
                            <a href="{{ route('inquiries.create') }}" class="btn btn-sm btn-success shadow-sm float-right"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Create Inquiry</a>
                        </div> --}}
                    </div>
                </div>
                <!-- Table Body -->
                <div class="card-body">
                    <div class="table-responsive">
                            <table id="inquiries_table" class="table table-bordered table-hover">
                                @if(count($inquiries) > 0)
                                <thead class="text-center">
                                    <tr>
                                        <th width="10%">ID</th>
                                        <th width="">Employee Name</th>
                                        <th width="">Contact</th>
                                        <th width="">Subject</th>
                                        <th width="">Date Inquired</th>
                                        <th width="">Status</th>
                                        <th width="20%" class="text-center">Options</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach($inquiries as $item)
                                    <tr class='clickable-row' data-href='/inquiries/{{$item->id}}'>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->employees->first_name }} {{ $item->employees->last_name }}</td>
                                        <td>{{ $item->employees->phone }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->date_inquired)->format('F j, Y')}}</td>
                                        <td>{{ $item->inquiry_statuses->status }}</td>
                                        <td class="text-center">
                                            <a href="/inquiries/complete/{{$item->id}}" class="btn btn-success"><i class="fas fa-check"></i></a>
                                            <a href="/inquiries/{{$item->id}}/delete" class="btn btn-danger"><i class="fas fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <p>No inquiries found</p>
                                @endif
                            </table>
                    </div>
                </div>
            </div> <!-- End Card -->



        </div>
    </div>


<!-- If user is Employee -->
@elseif(auth()->user()->roles->id == 4)
<div class="row">
    <div class="offset-lg-2 col-lg-8 offset-lg-2">
        <!-- Inquiry Table -->
        <div class="card shadow mb-4">
            <!-- Table Header -->
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">Inquiries Table</h6>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('inquiries.create') }}" class="btn btn-sm btn-success shadow-sm float-right" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Create Inquiry</a>
                    </div>
                </div>
            </div>
            <!-- Table Body -->
            <div class="card-body">
                <div class="table-responsive">
                        <table id="inquiries_table" class="table table-bordered table-hover">
                            @if(count($user_inquiries) > 0)
                            <thead class="text-center">
                                <tr>
                                    <th width="10%">ID</th>
                                    {{-- <th width="">Employee Name</th> --}}
                                    {{-- <th width="">Contact</th> --}}
                                    <th width="">Subject</th>
                                    <th width="">Date Inquired</th>
                                    <th width="">Status</th>
                                    <th width="20%" class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($user_inquiries as $item)
                                <tr class='clickable-row' data-href='/inquiries/{{$item->id}}'>
                                    <td>{{ $item->id }}</td>
                                    {{-- <td>{{ $item->employees->first_name }} {{ $item->employees->last_name }}</td>
                                    <td>{{ $item->employees->phone }}</td> --}}
                                    <td>{{ $item->subject }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->date_inquired)->format('F j, Y')}}</td>
                                    <td>{{ $item->inquiry_statuses->status }}</td>
                                    <td class="text-center">
                                        <a href="/inquiries/{{$item->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="/inquiries/{{$item->id}}/delete" class="btn btn-danger"><i class="fas fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <p>No inquiries found</p>
                            @endif
                        </table>
                </div>
            </div>
        </div> <!-- End Card -->



    </div>
</div>
@endif



    <!-- Create inquiry modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <form method="POST" action="{{action('InquiriesController@store')}}" enctype="multipart/form-data">
            @csrf 
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New inquiry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                
                    <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Subject:</label>
                    <input type="text" class="form-control" id="recipient-name" name="subject">
                    </div>
                    <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="message-text" name="inquiry"></textarea>
                    </div>
                
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
            </form>

        </div>
    </div>

    
@endsection