<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('home') }}">
        <div class="sidebar-brand-icon">
            <img class="img-fluid px-3 " style="width: 25rem;" src="/img/dhl.png" alt="">
        </div>
    </a>

    <!-- Admin Functionalities -->
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
    
    <!-- Requests -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('requests.index') }}">
        <i class="fas fa-fw fa-question-circle"></i>
        <span>Requests</span></a>
    </li>

    <!-- Users -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>Users</span></a>
    </li>

    <!-- Departments -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('departments.index') }}">
        <i class="fas fa-fw fa-building"></i>
        <span>Departments</span></a>
    </li>

    <!-- Equipment -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#nav_equipment" aria-expanded="true" aria-controls="nav_equipment">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Equipment</span>
        </a>
        <div id="nav_equipment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>
                <a class="collapse-item" href="{{ route('equipment.index') }}">Equipment</a>
                <a class="collapse-item" href="{{ route('brands.index') }}">Brands</a>
                {{-- <a class="collapse-item" href="{{ route('equipment.index') }}">Desktops</a>
                <a class="collapse-item" href="{{ route('equipment.index') }}">RF Guns</a>
                <a class="collapse-item" href="{{ route('equipment.index') }}">External Drive</a> --}}
            </div>
        </div>
    </li>
    

    

    <!-- Forms -->  
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#nav_forms" aria-expanded="true" aria-controls="nav_forms">
            <i class="fas fa-fw fa-copy"></i>
            <span>Forms</span>
        </a>
        <div id="nav_forms" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>
                <a class="collapse-item" href="{{ route('accountability_forms.index') }}">Accountability Forms</a>
                <a class="collapse-item" href="{{ route('equipment.index') }}">IT Movement Forms</a>
            </div>
        </div>
    </li> --}}




    <!-- ------------------------------------------------------------------------------------------------------------------------ -->



    <!-- Employee Functionalities -->
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
        Functions
    </div>

    <!-- Create Request -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('requests.create') }}">
        <i class="fas fa-fw fa-plus-circle"></i>
        <span>Request for Equipment</span></a>
    </li>

    <!-- Forms -->  
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#nav_forms" aria-expanded="true" aria-controls="nav_forms">
            <i class="fas fa-fw fa-copy"></i>
            <span>Forms</span>
        </a>
        <div id="nav_forms" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Components:</h6>
                <a class="collapse-item" href="{{ route('accountability_forms.index') }}">Accountability Forms</a>
                <a class="collapse-item" href="{{ route('equipment.index') }}">IT Movement Forms</a>
            </div>
        </div>
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