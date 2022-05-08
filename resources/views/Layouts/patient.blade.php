<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">


    <link href="{{ URL::to('admin_assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('admin_assets/libs/spectrum-colorpicker2/spectrum.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::to('admin_assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"
        rel="stylesheet">
    <link href="{{ URL::to('admin_assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::to('admin_assets/libs/@chenfengyuan/datepicker/datepicker.min.css') }}">


    <!-- Bootstrap Css -->
    <link href="{{ URL::to('admin_assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::to('admin_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::to('admin_assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type='text/javascript'></script>

    @yield('styles')
</head>

<body>

    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">

                    <button type="button"
                        class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn"> <i
                            class="fa fa-fw fa-bars"></i> </button>
                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search..."> <span
                                class="uil-search"></span>
                        </div>
                    </form>
                </div>
                <div class="d-flex">
                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="uil-search"></i> </button>
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
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            data-bs-toggle="fullscreen"> <i class="uil-minus-path"></i> </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img
                                class="rounded-circle header-profile-user" src="../assets/images/users/usericon.png"
                                alt="Header Avatar"> <span
                                class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">{{ Auth::user()->first_name }}</span>
                            <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i> </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('user.profile') }}"><i
                                    class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span
                                    class="align-middle">View Profile</span></a>
                            <a class="dropdown-item" href="#"><a class="dropdown-item" href="#"><i
                                        class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i>
                                    <span class="align-middle" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit()" ; aria-expanded="false"><i
                                            class="me-3 fa fa-sign-out-alt" aria-hidden="true"></i>
                                        <span class="hide-menu">Log out</span></a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none">
                                    @csrf
                                </form>
                        </div>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect"> <i
                                class="uil-cog"></i> </button>
                    </div>
                </div>
            </div>
        </header>

        <div class="vertical-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ url('/home') }}" class="logo logo-dark"> <span class="logo-sm">
                        <img src="{{ asset('assets/images/logopng') }}" alt="" height="22">
                    </span> <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" height="40">
                    </span></a>

            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn"> <i
                    class="fa fa-fw fa-bars"></i> </button>
            <div data-simplebar class="sidebar-menu-scroll">
                <div id="sidebar-menu">
                    <ul class="metismenu list-unstyled" id="side-menu">

                        <li class="menu-title">About Request</li>
                        <li>
                            <a href="{{ route('testRequests.index') }}" class="waves-effect"> <i
                                    class="uil-calender"></i>
                                <span>View Request</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('testRequests.create') }}" class="waves-effect"> <i
                                    class="uil-calender"></i>
                                <span>Make Request</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('testRequests.index') }}" class="waves-effect"> <i
                                    class="uil-calender"></i>
                                <span>View Status</span> </a>
                        </li>
                        <li class="menu-title">Manage Dependents</li>
                        <li>
                            <a href="{{ route('dependents.create') }}" class=" waves-effect">
                                <span class="badge rounded-pill bg-success float-end">Add</span> <span>Dependent</span>
                            </a>
                        </li>

                        <li class="menu-title">Payment Information</li>
                        <li>
                            <a href="#" class="waves-effect"> <i class="uil-calender"></i>
                                <span>View Payment Info</span> </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"> <i
                                    class="uil-invoice"></i> <span>Invoices</span> </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="#">Invoice List</a></li>
                                <li><a href="#">Invoice Detail</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © ZikClinic</div>
                    </div>
                </div>
            </footer>
        </div>

    </div>

    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="{{ URL::to('admin_assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>

    <script src="{{ URL::to('admin_assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/js/pages/dashboard.init.js') }}"></script>

    <script src="{{ URL::to('admin_assets/js/app.js') }}"></script>



    <!-- plugins -->
    <script src="{{ URL::to('admin_assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/libs/@chenfengyuan/datepicker/datepicker.min.js') }}"></script>

    <script src="{{ URL::to('admin_assets/js/pages/form-advanced.init.js') }}"></script>

    <script src="{{ URL::to('admin_assets/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ URL::to('admin_assets/js/pages/form-validation.init.js') }}"></script>

    <script src="assets/js/app.js"></script>


    @yield('scripts')
</body>

</html>
