<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>SINARSU|Coming Soon</title>
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

    <!-- Begin page -->

    <div class="home-btn d-none d-sm-block">
        <a href="{{ url('/dashboard') }}" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>

    <div class="account-pages">
        <div class="container">
            <div class="row justify-content-center" style="margin-top: -5%">
                <div class="col-lg-6">
                    <div class="text-center mb-1">
                        <div class="mb-1">
                            {{-- <img src="{{ url('assets/images/logo-dark.png') }}" height="28" alt="logo"> --}}
                            <span style="font-size: 20px"><strong>{{ strtoupper('SINARSU | PPA') }}</strong></span>
                        </div>

                        <div class="maintenance-img  mb-1">
                            <img src="{{ url('assets/images/coming-soon-img.png') }}" alt=""
                                class="img-fluid mx-auto d-block">
                        </div>
                        <h4 class="mt-4">This page is Coming Soon.</h4>
                        <p>Please come back later after</p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center" style="margin-bottom: -20%">
                <div class="col-lg-12">
                    <div class="comming-watch text-center mb-5">
                        <div class="countdown">
                            <div>
                                <div class="card card-body p-3"><span class="countdown-num">200</span><span
                                        class="text-uppercase">days</span></div>
                                <div class="card card-body p-3"><span class="countdown-num">04</span><span
                                        class="text-uppercase">hours</span></div>
                            </div>
                            <div class="lj-countdown-ms ">
                                <div class="card card-body p-3"><span class="countdown-num">33</span><span
                                        class="text-uppercase">minutes</span></div>
                                <div class="card card-body p-3"><span class="countdown-num">09</span><span
                                        class="text-uppercase">seconds</span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
    </div>

    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ url('assets/js/waves.min.js') }}"></script>

    <script src="{{ url('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- countdown js -->
    <script src="{{ url('assets/plugins/countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ url('assets/pages/countdown.int.js') }}"></script>

    <!-- App js -->
    <script src="{{ url('assets/js/app.js') }}"></script>

</body>

</html>
