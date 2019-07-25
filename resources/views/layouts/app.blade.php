<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/DataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet">

    <style>
        .select2-container .select2-selection--single {
            height: 36px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 36px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 36px;
        }
    </style>


</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('partials.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
             <!-- Main Content -->
            <div id="content">
                @include('partials.navbar')
                <div class="container-fluid">
                    @include('partials.messages')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('partials.logout_modal')


    <!-- Bootstrap core JavaScript-->
    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    {{-- <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script> --}}

    <!-- Core plugin JavaScript-->
    <script type="text/javascript" src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script type="text/javascript" src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script type="text/javascript" src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/select2/dist/js/select2.full.min.js') }}"></script>


    <!-- Page level custom scripts -->
    <script type="text/javascript" src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>



    <!-- DataTables JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>



    <!-- -------------------------------------------------------------------------------------------------------------------------------- -->

    <!-- PAGE LEVEL SCRIPTS-->
    <script>
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                order: [[ 0, 'desc' ]],
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
            $('#accountability_forms_table').DataTable({
                pageLength: 10,
                order: [[ 0, 'desc' ]],
                buttons: [
                    {
                        extend: 'pdf',
                        text: 'Save current page',
                        exportOptions: {
                            modifier: {
                                page: 'current'
                            }
                        }
                    }
                ]
            });
            $('#brands_table').DataTable({
                pageLength: 10,
                order: [[ 1, 'asc' ]],
            });
            $('#equipment_table').DataTable({
                pageLength: 10,
                // order: [[ 0, 'desc' ]],
            });


            // Select 2
            $(".select2_demo_1").select2({
                allowClear: true
            });



            // Bootstrap datepicker
            var optSimple = {
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            orientation: 'bottom right',
            autoclose: true,
            container: '#sandbox',
            todayBtn: true,
            };

            $('.datepicker').datepicker(optSimple);

            // $('#date_1 .input-group.date').datepicker({
            //     todayBtn: "linked",
            //     keyboardNavigation: false,
            //     forceParse: false,
            //     calendarWeeks: true,
            //     autoclose: true
            // });

            // $('#date_6').datepicker();

            $('#exampleModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
            });

            // Clickable table row
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });

            $('select2_demo_1').select2({
                width: '100%'
            });

        })

        // Notifications
        // function markNotificationAsRead(){
        //     // alert('clicked')
        //     $.get('/markAsRead')
        // }
    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <!-- -------------------------------------------------------------------------------------------------------------------------------- -->

    
</body>
</html>
