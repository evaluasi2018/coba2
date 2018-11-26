<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI EValuasi | @yield('main-title')</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/images/unib.png') }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @include('layouts/partials/css')
  @yield('amchart')

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
{{-- <div class="loader">
  <img src="{{ asset('assets/loading/animasi2.svg') }}" style="height: 150px; width: 150px; position: absolute; top: 50%; left: 50%; margin-left: -75px; margin-top: -75px;">
</div> --}}
<div class="loader">
  <img src="{{ asset('assets/loading/animasi2.svg') }}" style="height: 150px; width: 150px; position: absolute; top: 50%; left: 50%; margin-left: -75px; margin-top: -75px;">
</div>
<div class="wrapper" style="display: none;">
  <!-- Main Header -->
  @include('layouts/partials/header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts/partials/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SI Evaluasi Pembelajaran
        <small>Universitas Bengkulu</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class='row'>
            <div class='col-md-12'>
                <!-- Box -->
                <div class="box box-primary">
                    @yield('manajemen-title')
                    @yield('second-box-header')
                    <div class="box-body">
                        @yield('content')
                    </div><!-- /.box-body -->
                    @yield('box-footer')
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('layouts/partials/footer')

</div>
  @include('layouts/partials/javascript')    
</body>
</html>