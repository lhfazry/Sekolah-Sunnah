<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sekolah Sunnah Admin Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/adminlte.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        form {
            width: 100%;
        }
        @font-face {
            font-family: OpenSans;
            src: url('{{ asset('fonts/OpenSans/OpenSans-Regular.ttf') }}');
        }

        @font-face {
            font-family: OpenSans;
            src: url('{{ asset('fonts/OpenSans/OpenSans-Bold.ttf') }}');
            font-weight: bold;
        }

        @font-face {
            font-family: OpenSans;
            src: url('{{ asset('fonts/OpenSans/OpenSans-Italic.ttf') }}');
            font-style: italic;
        }

        body {
            /*font-family: "CoreSansG", 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif !important; */
            font-family: OpenSans,Helvetica, Arial,sans-serif;
        }

        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
            font-family: OpenSans,Helvetica, Arial,sans-serif;
        }

        .select2 {
            width: 100%!important;
        }

        .select2-container {
            /*vertical-align: inherit!important;*/
        }

        input[type="text"], input[type="email"],input[type="number"],input[type="date"], input[type="password"], textarea
             {
            background: transparent;
            border: none;
            border-bottom: 1px solid #999;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-radius: 0;
        }

        textarea.form-control {
            background: transparent;
            border: none;
            border-bottom: 1px solid #999;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-radius: 0;
        }

        input[type="text"]:focus,input[type="email"]:focus,input[type="number"]:focus,input[type="date"]:focus, textarea:focus,
            select.form-control:focus {
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {

            opacity: 1;
        }

        .form-group label {
            font-weight: normal;
        }

        .box-title {
            font-size: 16px;
        }

        .main-sidebar {
            position: fixed;
            overflow-y: scroll;
            top: 0;
            bottom: 0;
            /* width: 300px;*/
        }

        /*.main-header .navbar, .content-wrapper, .main-footer {
            margin-left: 300px;
        } */

        .select2-container .select2-selection--single {
            border: none;
            border-bottom: 1px solid #999;
            -webkit-box-shadow: none;
            box-shadow: none;
            height: 34px !important;
            padding: 6px 12px !important;
            border-radius: 0px !important;
            border-color: #d2d6de;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 30px !important;
            right: 3px !important;
        }

        .content-header {
            padding-bottom: 25px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 1px !important;
        }

        th {
            text-align: center;
        }


        .badge:hover {
            color: #ffffff;
            text-decoration: none;
            cursor: pointer;
        }
        .badge-error {
            background-color: #b94a48;
        }
        .badge-error:hover {
            background-color: #953b39;
        }
        .badge-warning {
            background-color: #f89406;
        }
        .badge-warning:hover {
            background-color: #c67605;
        }
        .badge-success {
            background-color: #468847;
        }
        .badge-success:hover {
            background-color: #356635;
        }
        .badge-info {
            background-color: #3a87ad;
        }
        .badge-info:hover {
            background-color: #2d6987;
        }
        .badge-inverse {
            background-color: #333333;
        }
        .badge-inverse:hover {
            background-color: #1a1a1a;
        }

        .form-horizontal .col-form-label {
            text-align: right;
            font-weight: normal !important;
        }
    </style>
    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <!--
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>-->
      </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                {!! Form::open(['route' => 'logout', 'id'=>'myform']) !!}
                <a class="nav-link" href="javascript:{}" onclick="document.getElementById('myform').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                {!! Form::close() !!}
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->


    @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <footer class="main-footer">
      <strong>Copyright &copy; 2019 <a href="https://sekolahsunnah.com">Sekolah Sunnah</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0-beta.2
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('AdminLTE')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)

  </script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- daterangepicker -->
  <script src="{{asset('AdminLTE')}}/plugins/moment/moment.min.js"></script>
  <script src="{{asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{asset('AdminLTE')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

  <!-- overlayScrollbars -->
  <script src="{{asset('AdminLTE')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- FastClick -->
  <script src="{{asset('AdminLTE')}}/plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('AdminLTE')}}/dist/js/adminlte.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
  @yield('scripts')
    <script>
        $(document).ready(function(){
            $('select').select2();
        });
    </script>
</body>
</html>

