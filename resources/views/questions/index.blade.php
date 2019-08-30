@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
    
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Frequently Asked Questions</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="row">
    <div class="offset-lg-2 col-lg-8 offset-lg-2">
        <!-- Question Table -->
        <div class="card shadow mb-4">
            <!-- Table Header -->
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">FAQs Table</h6>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('questions.create') }}" class="btn btn-sm btn-success shadow-sm float-right" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Create</a>
                    </div>
                </div>
            </div>
            <!-- Table Body -->
            <div class="card-body">
                <div class="table-responsive">
                        <table id="questions_table" class="table table-bordered table-hover">
                            @if(count($questions) > 0)
                            <thead class="text-center">
                                <tr>
                                    <th width="10%">ID</th>
                                    <th width="">Question</th>
                                    <th width="">Answer</th>
                                    <th width="20%" class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($questions as $item)
                                <tr class='clickable-row' data-href='/questions/{{$item->id}}'>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->question }}</td>
                                    <td>{{ $item->answer }}</td>
                                    <td class="text-center">
                                        <a href="/questions/{{$item->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="/questions/{{$item->id}}/delete" class="btn btn-danger"><i class="fas fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <p>No questions found</p>
                            @endif
                        </table>
                </div>
            </div>
        </div> <!-- End Card -->
    </div>
</div>




<!-- Create question modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <form method="POST" action="{{action('QuestionsController@store')}}" enctype="multipart/form-data">
        @csrf 
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New question</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                <label for="recipient-name" class="col-form-label">Question:</label>
                <input type="text" class="form-control" id="recipient-name" name="question" required/>
                </div>
                <div class="form-group">
                <label for="message-text" class="col-form-label">Answer:</label>
                <textarea class="form-control" id="message-text" name="answer" required></textarea>
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