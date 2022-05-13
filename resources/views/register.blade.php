<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>SINARSU|Login</title>
    <meta content="Aplikasi Arsip Surat" name="description" />
    <meta content="AMDEV" name="author" />
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}">

    <link href="{{ url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5">
                    <div class="card card-pages shadow-none mt-4">
                        <div class="card-body">
                            <div class="text-center mt-0 mb-3">
                                <a href="{{ url('/') }}" class="logo logo-admin">
                                    <h3>SINARSU|PPA</h3>
                                    <p class="text-muted w-75 mx-auto mt-4">Don't have an account? Create your account,
                                        it takes less than a minute</p>
                                </a>
                            </div>

                            <form class="form-horizontal mt-4" action="{{ url('/register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" required name="email" id="email"
                                            placeholder="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md col-sm col-xl col-lg">
                                                <label for="fullname">Fullname</label>
                                                <input class="form-control" type="text" required name="fullname"
                                                    id="fullname" placeholder="fullname">
                                            </div>
                                            <div class="col-md col-sm col-xl col-lg">
                                                <label for="username">Username</label>
                                                <input class="form-control" type="text" required name="username"
                                                    id="username" placeholder="Username">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-12">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required name="password"
                                            id="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group text-center mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                            type="submit">Log In</button>
                                    </div>
                                </div>

                                <div class="form-group text-center mt-4">
                                    <div class="col-12">
                                        <div class="text-center">
                                            <a href="{{ url('/') }}" class="text-muted">Already have
                                                account?</a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
    </div>

    <!-- jQuery  -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ url('assets/js/waves.min.js') }}"></script>

    <script src="{{ url('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ url('assets/js/app.js') }}"></script>
    <script src="{{ url('assets/js/taostr.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            @if (Session::has('success'))
                toastr.options =
                {
                "closeButton" : true,
                "progressBar" : true
                }
                toastr.success("{{ session('success') }}");
            @endif

            @if (Session::has('error'))
                toastr.options =
                {
                "closeButton" : true,
                "progressBar" : true
                }
                toastr.error("{{ session('error') }}");
            @endif
        });
    </script>
</body>

</html>
