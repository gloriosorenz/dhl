<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('home') }}">
        <div class="sidebar-brand-icon">
            <img class="img-fluid px-3 " style="width: 25rem;" src="/img/dhl.png" alt="">
        </div>
    </a>

    <!-- Head Admininistrator Functionalities (IT Head)-->
    @if(Auth::user()->roles_id == 1)

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Forms
    </div>

    <!-- Accountability Forms -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('accountability_forms.index') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Accoutability Forms</span></a>
    </li>

    <!-- IT Movement Forms -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('movement_forms.index') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>IT Movement Forms</span></a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Functions
    </div>

    <!-- Users/Employees -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>Employees</span></a>
    </li>

    <!-- Equipment -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('equipment.index') }}">
        <i class="fas fa-fw fa-laptop"></i>
        <span>Equipment</span></a>
    </li>

    <!-- Brands -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('brands.index') }}">
        <i class="fas fa-fw fa-tag"></i>
        <span>Brands</span></a>
    </li>

    <!-- Departments -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('departments.index') }}">
        <i class="fas fa-fw fa-building"></i>
        <span>Departments</span></a>
    </li>

    

    




    <!-- ------------------------------------------------------------------------------------------------------------------------ -->



    <!-- Administrator Functionalities (IT Staff)-->
    @elseif(Auth::user()->roles_id == 2)
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Forms
    </div>

    <!-- Accountability Forms -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('accountability_forms.index') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Accoutability Forms</span></a>
    </li>

    <!-- IT Movement Forms -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('movement_forms.index') }}">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>IT Movement Forms</span></a>
    </li>

    <!-- Heading -->
    <div class="sidebar-heading">
        Functions
    </div>

    <!-- Users/Employees -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>Employees</span></a>
    </li>

    <!-- Equipment -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('equipment.index') }}">
        <i class="fas fa-fw fa-laptop"></i>
        <span>Equipment</span></a>
    </li>

    <!-- Brands -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('brands.index') }}">
        <i class="fas fa-fw fa-tag"></i>
        <span>Brands</span></a>
    </li>

    <!-- Departments -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('departments.index') }}">
        <i class="fas fa-fw fa-building"></i>
        <span>Departments</span></a>
    </li>


    <!-- ------------------------------------------------------------------------------------------------------------------------ -->

    <!-- HR Functionalities (HR administrator)-->
    @elseif(Auth::user()->roles_id == 3)
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Functions
    </div>

    <!-- Departments -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('inquiries.index') }}">
        <i class="fas fa-fw fa-question-circle"></i>
        <span>Inquiries</span></a>
    </li>

    <!-- Questions -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('questions.index') }}">
        <i class="fas fa-fw fa-question-circle"></i>
        <span>FAQs</span></a>
    </li>



    <!-- ------------------------------------------------------------------------------------------------------------------------ -->

    <!-- Employees Functionalities (HR administrator)-->
    @elseif(Auth::user()->roles_id == 4)
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Functions
    </div>

    <!-- Inquiries -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('inquiries.index') }}">
        <i class="fas fa-fw fa-info-circle"></i>
        <span>Inquiries</span></a>
    </li>

    <!-- Questions -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('questions.index') }}">
        <i class="fas fa-fw fa-question-circle"></i>
        <span>FAQs</span></a>
    </li>


    @endif



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    
    </ul>
    <!-- End of Sidebar -->