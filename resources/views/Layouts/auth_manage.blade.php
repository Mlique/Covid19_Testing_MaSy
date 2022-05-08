<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title> ZikClinic</title>

    <link rel="shortcut icon" href="auth/images/fav.jpg">
    <link rel="stylesheet" href="{{ URL::to('auth/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('auth/css/fontawsom-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('auth/css/style.css') }}" />
</head>

<body class="h-100">
    <div class="container-fluid">
        @yield('content')
    </div>
    <div class="container">
        <div class="row title">
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark"> <span class="logo-sm">
                        <img src="{{ asset('assets/images/logopng') }}" alt="" height="22">
                    </span> <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="" height="40">
                    </span></a>

            </div>
        </div>
        @include('alerts.alert')

        <div class="row no-margin roji">
            <div class="col-sm-6">
                <h3 class="small-title">User login</h3>
                <p>Welcome to our site! If you already have an account, click the below button to log in. You will use your unique email and password to log in, please do not share your login credentials even with friends and family members.</p>


                <div class="btndiv">
                    <button onclick="userlogin()" class="btn btn-success">
                        <i class="fas fa-lock-open"></i> Click to Login</button>
                </div>

            </div>
            <div class="col-sm-6">
                <h3 class="small-title">User Registeration</h3>
                <p>If you do not have an account, click the button below to register. You will later use the email and password filled on the register form to login as a member of ZikClinic. Please do not share your login credentials even with friends and family members</p>
                <div class="btndiv">
                    <button onclick="signup()" class="btn btn-success">
                        <i class="fas fa-user-plus"></i> Register Now</button>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ URL::to('auth/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::to('auth/js/popper.min.js') }}"></script>
    <script src="{{ URL::to('auth/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('auth/js/script.js') }}"></script>

    <script src="{{ asset('js/function.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function userlogin() {
            $("#signup").modal('hide');
            $("#login").modal('show');
            $("#resetpassw").modal('hide');
            $("#resetform").modal('hide');
        }

        function signup() {
            $("#login").modal('hide');
            $("#signup").modal('show');
            $("#resetpassw").modal('hide');
            $("#resetform").modal('hide');
        }

        function resetpassw() {
            $("#login").modal('hide');
            $("#signup").modal('hide');
            $("#resetpassw").modal('show');
            $("#resetform").modal('hide');
        }

        function resetform() {
            $("#login").modal('hide');
            $("#signup").modal('hide');
            $("#resetpassw").modal('hide');
            $("#resetform").modal('show');
        }
    </script>

    @if (count($errors) > 0 && ('#register_form'))

        <script>
            $(document).ready(function() {
                $('#signup').modal('show');
            });
            }
        </script>
    @endif

    @if (count($errors) > 0 && ('#login_form'))
        <script>
            $(document).ready(function() {
                $('#login').modal('show');
            });
        </script>
    @endif

    @yield('script')
</body>

</html>
