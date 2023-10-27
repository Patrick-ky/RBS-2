<body id="page-top">
 
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #066438;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img style="width:50px;height:50px;" src="{{URL('images/logo-lgu.png')}}">
                </div>
                <div class="sidebar-brand-text mx-3" style="font-size: 10px;"><h6>{{ config('app.name') }}</h6></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link active" href="/home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Clients -->
            <li class="nav-item active">
                <a class="nav-link active" href="/clients">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Clients</span>
                </a>
            </li>
            <!-- Nav Item - Billings -->
            <li class="nav-item active">
                <a class="nav-link active" href="/billingskie">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Billings</span>
                </a>
            </li>
            <!-- Nav Item - Violations -->
            <li class="nav-item active">
                <a class="nav-link active" href="/violations">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Violations</span>
                </a>
            </li>
            <!-- Nav Item - Stall Type -->
            <li class="nav-item active">
                <a class="nav-link active" href="/stalltypes">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Stall Type</span>
                </a>
            </li>
            <!-- Nav Item - Client Records -->
            <li class="nav-item active">
                <a class="nav-link active" href="/clientrecords">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Client Records</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                           
                    @foreach ($users as $user) 
                        
                    @endforeach<h4>Welcome, Admin {{$user->name}}!</h4>

                    @endforeach
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <!-- ... (Your alert content here) ... -->
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <!-- ... (Your message content here) ... -->
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('images/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!-- ... (User dropdown content here) ... -->
                            </div>
                        </li>
                    </ul>

                </nav>