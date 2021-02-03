<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Restaurant | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/select2.min.css') }}">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/morris.js/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');

        body {
            font-family: 'Roboto', sans-serif;
        }

        h2 {
            margin: 0px;
            text-transform: uppercase;
        }

        h6 {
            margin: 0px;
            color: #777;
        }

        .tabs {
            margin-top: 50px;
            font-size: 15px;
            padding: 0px;
            list-style: none;
            background: #fff;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
            display: inline-block;
            border-radius: 50px;
            position: relative;
        }

        .tabs a {
            text-decoration: none;
            color: #777;
            text-transform: uppercase;
            padding: 10px 20px;
            display: inline-block;
            position: relative;
            z-index: 1;
            transition-duration: 0.6s;
        }

        .tabs a.active {
            color: #fff;
        }

        .tabs a i {
            margin-right: 5px;
        }

        .tabs .selector {
            height: 100%;
            display: inline-block;
            position: absolute;
            left: 0px;
            top: 0px;
            z-index: 1;
            border-radius: 50px;
            transition-duration: 0.6s;
            transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);

            background: #05abe0;
            background: -moz-linear-gradient(45deg, #9fdef3 0%, #673990 100%);
            background: -webkit-linear-gradient(45deg, #9fdef3 0%, #673990 100%);
            /* background: linear-gradient(45deg, #05abe0 0%, #8200f4 100%); */
            background: linear-gradient(45deg, #9fdef3 0%, #673990 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#05abe0', endColorstr='#8200f4', GradientType=1);
        }

        .skin-blue .main-header .navbar {
            background: linear-gradient(45deg, #367fa9 0%, #875cad 100%);
        }

        .skin-blue .main-header .logo {
            background: linear-gradient(45deg, #3F51B5 0%, #367fa9 100%)
        }

        .skin-blue .wrapper,
        .skin-blue .main-sidebar,
        .skin-blue .left-side {
            background: linear-gradient(45deg, #222d32 0%, #172c56 100%);
        }

        .bg-aqua {
            transition-delay: .15s;
            background: linear-gradient(45deg, #875cad 0%, #367fa9 100%);
        }

        .bg-aqua:hover {
            transition-delay: .5s;
            background: linear-gradient(45deg, #367fa9 0%, #875cad 100%);
        }

        .bg-green {
            background: linear-gradient(45deg, #00a65a 0%, #367fa9 100%);
        }

        .bg-green:hover {
            background: linear-gradient(45deg, #367fa9 0%, #00a65a 100%);
        }

        .bg-yellow {
            background: linear-gradient(45deg, #f39c12 0%, #367fa9c7 100%);
        }

        .bg-yellow:hover {
            background: linear-gradient(45deg, #367fa9c7 0%, #f39c12 100%);
        }

        .bg-red {
            background: linear-gradient(45deg, #dd4b39 0%, #367fa9c7 100%);
        }

        .bg-red:hover {
            background: linear-gradient(45deg, #367fa9c7 0%, #dd4b39 100%);
        }

        .label-primary {
            background: #7c61ac !important;
        }

        .bg-teal-gradient {
            background: #39cccc !important;
            background: linear-gradient(45deg, #367fa9 0%, #875cad 100%);
            background: -webkit-gradient(linear, left bottom, left top, color-stop(0, #367fa9), color-stop(1, #875cad)) !important;
        }

        .bg-teal {
            background-color: #815fad !important;
        }

        .select2-container .select2-selection--single {
            height: 34px;
            width: 100%;
        }

        .skin-blue .sidebar-menu>li:hover>a,
        .skin-blue .sidebar-menu>li.active>a,
        .skin-blue .sidebar-menu>li.menu-open>a {
            color: #fff;
            background: #191a2f;
        }

        .skin-blue .sidebar-menu>li.header {
            color: #4b646f;
            background: #1a222600;
        }

        .skin-blue .sidebar-menu>li>.treeview-menu {
            margin: 0 1px;
            background: #283a5a;
        }

        /* .btn-primary {
            background: linear-gradient(45deg, #9fdef3 0%, #673990 100%);
        } */
    </style>
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper" style="height: auto; min-height: 100%;">
        @include('layouts.topbar')
        @include('layouts.sidebar')
        @yield('content')
    </div>
    @if(Session::has('success_flash'))
    <div class="alert alert-success" id="successmsg" style="display:none">
        {{ Session::get('success_flash') }}
    </div>
    @endif
    @if(Session::has('error_flash'))
    <div class="alert alert-danger" id="errormsg" style="display:none">
        {{ Session::get('error_flash') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger" id="errormsg" style="display:none">
        {{ implode('', $errors->all('<div>:message</div>')) }}
    </div>

    @endif
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('assets/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="{{ asset('assets/bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/morris.js/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('assets/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
    <script src="{{ asset('assets/dist/js/sweetalert.js') }}"></script>
    <script src="{{ asset('assets/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
    </script>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "debug": false,
                "positionClass": "toast-bottom-right",
                // "onclick": null,
                // "fadeIn": 300,
                // "fadeOut": 1000,
                // "timeOut": 5000,
                // "extendedTimeOut": 1000
            }
            var success = $('#successmsg').text();
            var error = $('#errormsg').text();

            if (success != "") {
                toastr.success(success);
            } else if (error != "") {
                toastr.error(error);
            }
        });
    </script>
    @yield('js')
</body>

</html>