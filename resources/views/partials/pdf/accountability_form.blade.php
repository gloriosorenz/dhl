<!DOCTYPE html>
<html>
    
<head>
    <title>Accountability Form {{\Carbon\Carbon::now()->format('Y-m')}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    {{-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    <link href='https://fonts.googleapis.com/css?family=Libre Barcode 39' rel='stylesheet'>

    <style>
    .overline {
    text-decoration: overline;
    }
    </style>

</head>
<body>
<div class="wrapper">
    <div class="container">
        <!-- DHL logo -->
        {{-- <div class="row">
            <div class="col-xs-6">
                <!-- blablabla -->
            </div>
            <div class="col-xs-6 text-right">
                <img class="" style="width: 25rem;" src="/img/dhl.png">
            </div>
        </div> --}}

        <!-- Form Title -->
        <div class="row text-center">
            <div class="col-lg-12">
                <h4>
                    <small>DHL Supply Chain Inc.</small> <br>
                    <strong>ACCOUNTABILITY FORM</strong>
                </h4>
                <h3 class="float-right" style="font-family: 'Libre Barcode 39';font-size: 72px;">
                    {{$af->af_num}}
                </h3>
            </div>
        </div>


        <!-- Details -->
        <div class="row">
            <div class="col-xs-6">
                <address>
                        Employee Name: <strong>{{$af->employees->first_name}} {{$af->employees->last_name}}</strong><br>
                        Designation: <strong>{{$af->employees->position}}</strong><br>
                        Department/Station: <strong>{{$af->employees->departments->name}}</strong><br>
                        Brand/Model: <strong>{{$af->equipment->name}}</strong><br>
                        Specifications: <strong>{{$af->equipment->specifications}}</strong><br>
                        Unit Cost: <strong>{{ presentPrice($af->equipment->unit_cost) }}</strong><br>
                        Date of Purchase: <strong>{{$af->equipment->date_purchased}}</strong><br>
                        Serial Number: <strong>{{$af->equipment->serial_number}}</strong><br>
                        Issuance Date: <strong>{{\Carbon\Carbon::parse($af->issued_date)->format('F j, Y')}}</strong><br>
                        IT Asset Tag: <strong>{{$af->equipment->it_tag}}</strong><br>
                </address>
            </div>
        </div>

        <br>

        <!-- Statement -->
        <div class="row">
            <div class="col-xs-12">
                <p class="font-bold">Statment:</p>
                <p>This is to acknowledge receipt of the above asset/s including its/their accessories and accessions.</p>
                <p>
                    Having recieved the foregoing, it is understood that I shall exert extraordinary diligence in caring for and use of such asset/s. For this purpose, I hereby declare myself fully accountable for the said asset/s and any loss or damage to the same for any cause whatsoever shall be chargeable against my account. In line with this, I hereby authorize the company to deduct the replacement cost thereof against my salary sould I fail to submit the necessary documents as required/or stated in the IT Security Policy Standards with reference no. PHP0103-01.
                </p>
                <br>
                <p>
                    <strong><u>
                        Note: All issued Asset should be used by the above asignee, otherwise you must return it to IT & Communication Department.
                    </u></strong>
                </p>
            </div>
        </div>

        <br>
        <br>
        <!--Signatures-->
        <div class="row">
            <div class="col-xs-5">
                <p>CONFORME:</p>
                <br>
                <strong>
                <p class="text-center">{{$af->employees->first_name}} {{$af->employees->last_name}}</p>
                <hr>
                <p class="text-center">Signature of Employee over Printed Name</p>
                </strong>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-5">
                <p>ISSUED BY:</p>
                <br>
                <strong>
                <p class="text-center">{{$af->admins->first_name}} {{$af->admins->last_name}}</p>
                <hr>
                <p class="text-center">{{$af->admins->departments->name}}</p>
                <p class="text-center">{{$af->admins->position}}</p>
                </strong>
            </div>
        </div>

    </div>
    <!-- End container -->
</div>
<!-- End wrapper -->
</body>
</html>

