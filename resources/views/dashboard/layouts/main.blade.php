<!DOCTYPE html>
<html lang="en">

<head>
    <title>LPTP Surakarta | {{ $title }}</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets-dashboard/assets/images/logo/logo-lptp.png') }}" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets-dashboard/assets/css/style.css') }}">

    <!--search dropdown-->
    <link rel="stylesheet" href="{{ asset('assets-dashboard/assets/css/fstdropdown.css') }}">

    <!--TRIX EDITOR-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/assets/css/trix.css') }}">
    <script type="text/javascript" src="{{ asset('assets-dashboard/assets/js/trix.js') }}"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        /* search_select_box {
            max-width:100%;
        }
        search_select_box select{
            max-width:100%;
        } */

    </style>

</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar menu-light ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">

                @include('dashboard.partials.navbar-dashboard')

            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->

    @include('dashboard.partials.header')

    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    @yield('container')
    <!-- [ Main Content ] end -->

    <!-- Warning Section Ends -->

    <!-- Required Js -->
    <script src="{{ asset('assets-dashboard/assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/assets/js/ripple.js') }}"></script>
    <script src="{{ asset('assets-dashboard/assets/js/pcoded.min.js') }}"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('assets-dashboard/assets/js/plugins/apexcharts.min.js') }}"></script>


    <!-- custom-chart js -->
    <script src="{{ asset('assets-dashboard/assets/js/pages/dashboard-main.js') }}"></script>
    <script src="{{ asset('assets-dashboard/assets/js/fstdropdown.js') }}"></script>

</body>

</html>
