<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>ZikClinic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- DataTables -->
    <link href="{{ URL::to('admin_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('admin_assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('admin_assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }} rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ URL::to('admin_assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::to('admin_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::to('admin_assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-layout="horizontal" data-topbar="colored">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">


                        {{-- <a href="index.html" class="logo logo-light">
                            <span class="logo-lg">
                                <img src="assets/images/logo.png" alt="" width="40" height="40">
                            </span>
                        </a> --}}
                    </div>

                    <button type="button"
                        class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                        data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="uil-search"></span>
                        </div>
                    </form>
                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="uil-search"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="uil-apps"></i>
                        </button>
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            data-bs-toggle="fullscreen">
                            <i class="uil-minus-path"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="uil-bell"></i>
                        </button>

                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="../assets/images/users/usericon.png"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">Nurse
                                ({{ Auth::user()->last_name }})</span>
                            <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i
                                    class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span
                                    class="align-middle">View Profile</span></a>
                            <a class="dropdown-item" href="#"><i
                                    class="uil uil-wallet font-size-18 align-middle me-1 text-muted"></i> <span
                                    class="align-middle">Update profile</span></a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit()" ;>
                                <i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i><span
                                    class="align-middle">Sign out</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                @csrf
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="uil-cog"></i>
                        </button>
                    </div>

                </div>
            </div>
            <div class="container-fluid">
                <div class="topnav">

                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('nurse.index') }}">
                                        <i class="uil-home-alt me-2"></i> Dashboard
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none"
                                        href="{{ route('favourite_suburb.create') }}" id="topnav-uielement"
                                        role="button">
                                        <i class="uil-flask me-2"></i>Suburbs
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="{{ route('schedular.index') }}" id="topnav-pages" role="button">
                                        <i class="uil-apps me-2"></i>Request Scheduled
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components"
                                        role="button">
                                        <i class="uil-layers me-2"></i>Manage Tests <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-components">
                                        <div class="dropdown">
                                            <a href="captures.create" class="dropdown-item">Today's Test</a>
                                        </div>
                                        <div class="dropdown">
                                            <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-form" role="button">Performed Test<div class="arrow-down"></div>
                                            <div class="dropdown-menu" aria-labelledby="topnav-form">
                                                <a href="/captures" class="dropdown-item">All Test</a>
                                                <a href="form-elements.html" class="dropdown-item">Performed Today</a>
                                            </div>
                                        </a>
                                        </div>
                                        <div class="dropdown">
                                            <a href="form-validation.html" class="dropdown-item">Cancelled Request</a>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-more"
                                        role="button">
                                        <i class="uil-copy me-2"></i>Upcoming Visits
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">Favourite Suburb</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a
                                                href="javascript: void(0);">@include('nurses.favourite_Suburb')</a></li>

                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © ZiKClinc. </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>



    <!-- JAVASCRIPT -->
    <script src="{{ URL::to('admin_assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ URL::to('admin_assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ URL::to('admin_assets/js/pages/dashboard.init.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ URL::to('admin_assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/js/pages/datatables.init.js') }}"></script>

     <!-- Table Editable plugin -->
     <script src="{{ URL::to('admin_assets/libs/table-edits/build/table-edits.min.js') }}"></script>
     <script src="{{ URL::to('admin_assets/js/pages/table-editable.int.js') }}"></script>

     <script src="{{ URL::to('admin_assets/libs/parsleyjs/parsley.min.js') }}"></script>
     <script src="{{ URL::to('admin_assets/js/pages/form-validation.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::to('admin_assets/js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>
