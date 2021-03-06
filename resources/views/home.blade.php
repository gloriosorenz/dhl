@extends('layouts.app')

@section('content')
 <!-- Begin Page Content -->

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>


        <!-- IT Administrator Dashboard -->
        @if (auth()->user()->roles->id == 1 || auth()->user()->roles->id == 2)
            
        
        <!-- Content Row -->
        <div class="row">

          <!-- Create an accountability form -->
          <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('accountability_forms.create') }}">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Accountability Form</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Create a Form</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

          <!-- Movement Form -->
          <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('movement_forms.index') }}">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Movement Form</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">View all forms</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-arrows-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

          

          <!-- Add equipment -->
          <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('equipment.create') }}">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Equipment</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Add a new equipment</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-laptop fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

          <!-- Add new user -->
          <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('users.create') }}">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Add a new user</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Accountability Forms Table -->
                <div class="card shadow mb-4">
                    <!-- Table Header -->
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="m-0 font-weight-bold text-primary">For Approval</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Table Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                                <table id="accountability_forms_table" class="table table-bordered table-hover">
                                    @if(count($for_approval) > 0)
                                    <thead>
                                        <tr>
                                            <th width="">ID</th>
                                            <th width="">Employee</th>
                                            <th width="">Equipment</th>
                                            <th width="">IT Asset Tag</th>
                                            <th width="">Date Issued</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($for_approval as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->employees->first_name }} {{ $item->employees->last_name }}</td>
                                            <td>{{ $item->equipment->name }}</td>
                                            <td>{{ $item->equipment->it_tag }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->issued_date)->format('F j, Y')}}</td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <p>No forms found</p>
                                    @endif
                                </table>
                                <div class="float-right">
                                    {{-- {{ $for_app->links() }} --}}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-lg-6">
                <!-- Accountability Forms Table -->
                <div class="card shadow mb-4">
                    <!-- Table Header -->
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="m-0 font-weight-bold text-primary">Movement Forms</h6>
                            </div>
                            {{-- <div class="col-md-6">
                                <a href="{{ route('accountability_forms.create') }}" class="btn btn-sm btn-success shadow-sm float-right"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Create Form</a>
                            </div> --}}
                        </div>
                    </div>
                    <!-- Table Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    @if(count($mov_forms) > 0)
                                    <thead>
                                        <tr>
                                            <th width="">ID</th>
                                            <th width="">Employee</th>
                                            <th width="">Equipment</th>
                                            <th width="">IT Asset Tag</th>
                                            <th width="">Date Issued</th>
                                            {{-- <th class="text-center">Options</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($mov_forms as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->employees->first_name }} {{ $item->employees->last_name }}</td>
                                            <td>{{ $item->equipment->name }}</td>
                                            <td>{{ $item->equipment->it_tag }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->issued_date)->format('F j, Y')}}</td>
                                            {{-- <td class="text-center">
                                                <a href="pdf/accountability_form/{{$item->id}}" class="btn btn-md btn-secondary"> <i class="fas fa-download fa-sm text-white"></i></a>
                                                <a href="pdf/accountability_form/{{$item->id}}" class="btn btn-md btn-info"> <i class="fas fa-exchange-alt fa-sm text-white"></i></a>
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                    @else
                                        <p>No forms found</p>
                                    @endif
                                </table>
                                <div class="float-right">
                                    {{ $mov_forms->links() }}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- HR Administrator Dashboard -->
        @elseif(auth()->user()->roles->id == 3)

        <div class="row">
            <div class="col-lg-8">
                <!-- Inquiries Table -->
                <div class="card shadow mb-4">
                    <!-- Table Header -->
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="m-0 font-weight-bold text-primary">Requests / Inquiries</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Table Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                                <table id="inquiries_table" class="table table-bordered table-hover">
                                    @if(count($inquiries) > 0)
                                    <thead>
                                        <tr>
                                            <th width="">ID</th>
                                            <th width="">Employee</th>
                                            <th width="">Subject</th>
                                            <th width="">Date Inquired</th>
                                            <th width="">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($inquiries as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->employees->first_name }} {{ $item->employees->last_name }}</td>
                                            <td>{{ $item->subject }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->date_inquired)->format('F j, Y')}}</td>
                                            <td>{{ $item->inquiry_statuses->status }}</td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <p>No forms found</p>
                                    @endif
                                </table>
                                <div class="float-right">
                                    {{ $inquiries->links() }}
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Messages Table -->
                <div class="card shadow mb-4">
                    <!-- Table Header -->
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Table Body -->
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Employee Dashboard -->
        @elseif(auth()->user()->roles->id == 4)
        <!-- Content Row -->
        {{-- <div class="row">

            <!-- Create a request -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{ route('accountability_forms.create') }}" data-toggle="modal" data-target=".bd-example-modal-lg">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Inquire</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Create an Inquiry</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-question-circle fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

        </div> --}}


        <!-- Create Inquiry -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Start Form -->
                <form method="POST" action="{{action('InquiriesController@store')}}" enctype="multipart/form-data">
                  @csrf 

                  <!-- Inquiry Card -->
                  <div class="card shadow mb-4">
                      <!-- Table Header -->
                      <div class="card-header py-3">
                          <div class="row">
                              <div class="col-md-6">
                                  <h6 class="m-0 font-weight-bold text-primary">Inquire</h6>
                              </div>
                          </div>
                      </div>
                    
                      <!-- Table Body -->
                      <div class="card-body">
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Subject:</label>
                            <input type="text" class="form-control" id="recipient-name" name="subject">
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text" name="inquiry"></textarea>
                          </div>
                      </div>
                      <div class="card-footer">
                          <button type="submit" class="btn btn-success float-right">Submit</button>
                      </div>
                  </div>

                </form> 
                <!-- End Form -->
            </div>


        </div>

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




        <!-- FAQs -->
        <div class="row">
            <div class="col-lg-6">
                  <!-- FAQs Card -->
                  <div class="card shadow mb-4">
                      <!-- Table Header -->
                      <div class="card-header py-3">
                          <div class="row">
                              <div class="col-md-6">
                                  <h6 class="m-0 font-weight-bold text-primary">FAQs</h6>
                              </div>
                          </div>
                      </div>
                      <!-- Table Body -->
                      <div class="card-body">
                          @foreach ($questions as $item)
                              <a href="#" id="question">{{$item->question}}</a>
                              <p id="answer">{{$item->answer}}</p>
                          @endforeach
                      </div>
                  </div>
            </div>
        </div>
            
        @endif
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
          $(document).ready(function(){
            $("#question").click(function(){
              $("#answer").toggle();
            });
          });
        </script>






        {{-- <div class="row">

          <!-- Area Chart -->
          <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                <div class="dropdown no-arrow">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="myAreaChart"></canvas>
                </div>
              </div>
            </div>
          </div>

          <!-- Pie Chart -->
          <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                <div class="dropdown no-arrow">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                  <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                  <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Direct
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Social
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-info"></i> Referral
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div> --}}

        <!-- Content Row -->
        {{-- <div class="row">

          <!-- Content Column -->
          <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
              </div>
              <div class="card-body">
                <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>

            <!-- Color System -->
            <div class="row">
              <div class="col-lg-6 mb-4">
                <div class="card bg-primary text-white shadow">
                  <div class="card-body">
                    Primary
                    <div class="text-white-50 small">#4e73df</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-success text-white shadow">
                  <div class="card-body">
                    Success
                    <div class="text-white-50 small">#1cc88a</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-info text-white shadow">
                  <div class="card-body">
                    Info
                    <div class="text-white-50 small">#36b9cc</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-warning text-white shadow">
                  <div class="card-body">
                    Warning
                    <div class="text-white-50 small">#f6c23e</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-danger text-white shadow">
                  <div class="card-body">
                    Danger
                    <div class="text-white-50 small">#e74a3b</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-secondary text-white shadow">
                  <div class="card-body">
                    Secondary
                    <div class="text-white-50 small">#858796</div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
              </div>
              <div class="card-body">
                <div class="text-center">
                  <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                </div>
                <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
                <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
              </div>
            </div>

            <!-- Approach -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
              </div>
              <div class="card-body">
                <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
              </div>
            </div>

          </div>
        </div> --}}

@endsection
