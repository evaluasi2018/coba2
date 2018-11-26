@extends('layouts/template')
@section('main-title','Dashboard Dosen')
@section('sidebar')
	@include('dosen/sidebar')
@endsection
@section('manajemen-title')
  <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-dashboard"></i>&nbsp;DASHBOARD DOSEN</h3>
        <div class="box-tools pull-right">
            @yield('pull-right')
        </div>
    </div>
@endsection
@section('amchart')
   <!-- Resources -->
  <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
  <script src="https://www.amcharts.com/lib/3/pie.js"></script>
  <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
  <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
  <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
  <script src="https://www.amcharts.com/lib/3/serial.js"></script>
@endsection
@section('content')
	<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">SARAN MAHASISWA</span>
          <span class="info-box-number">{{ $jumlah_saran }}<small>&nbsp; SARAN</small></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Likes</span>
          <span class="info-box-number">41,410</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Sales</span>
          <span class="info-box-number">760</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">New Members</span>
          <span class="info-box-number">2,000</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>

  <div class="row">
    <div class="col-lg-6 col-md-12 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-envelope" style="font-size: 15px;"></i>&nbsp;Statistik Total Nilai Per Jenis Indikator</h3>

          <div class="box-tools pull-right">
            <span class="label label-primary">Jenis Indikator</span>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
           
            <!-- Chart code -->
            <script>
              AmCharts.addInitHandler(function(chart) {
              // check if there are graphs with autoColor: true set
              for(var i = 0; i < chart.graphs.length; i++) {
                var graph = chart.graphs[i];
                if (graph.autoColor !== true)
                  continue;
                var colorKey = "autoColor-"+i;
                graph.lineColorField = colorKey;
                graph.fillColorsField = colorKey;
                for(var x = 0; x < chart.dataProvider.length; x++) {
                  var color = chart.colors[x]
                  chart.dataProvider[x][colorKey] = color;
                }
              }

              }, ["serial"]);
              var chart = AmCharts.makeChart("chartdiv", {
                "type": "serial",
                "theme": "light",
                // "marginRight": 70,
                "dataProvider": [

                  @foreach ($chart as $chart)
                      {
                          "country": "{{ $chart->nm_jenis_indikator }}",
                          "visits": {{ $chart->totalnilai }},
                      }, 
                  @endforeach

                ],
                "startDuration": 1,
                "graphs": [{
                  "balloonText": "<b>[[category]]: [[value]]</b>",
                  "fillColorsField": "color",
                  "fillAlphas": 0.9,
                  "lineAlpha": 0.2,
                  "type": "column",
                  "valueField": "visits",
                  "autoColor": true
                }],
                "chartCursor": {
                  "categoryBalloonEnabled": false,
                  "cursorAlpha": 0,
                  "zoomable": false
                },
                "categoryField": "country",
                "categoryAxis": {
                  "gridPosition": "start",
                  "labelRotation": 45
                },
                "export": {
                  "enabled": true
                }

              });
            </script>
            <!-- HTML -->
            <div id="chartdiv"></div> 
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center bg-blue">
          <a href="{{ route('dosen.hasil_evaluasi_per_jenis') }}" style="color: white;" class="uppercase">Lihat Detail</a>
        </div>
        <!-- /.box-footer -->
      </div>
    </div>


    <div class="col-lg-6 col-md-12 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-envelope" style="font-size: 15px;"></i>&nbsp;Statistik Total Nilai Per Indikator</h3>

          <div class="box-tools pull-right">
            <span class="label label-primary">Indikator Penilaian</span>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
           
            <!-- Chart code -->
            <script>
              AmCharts.addInitHandler(function(chart) {
              // check if there are graphs with autoColor: true set
              for(var i = 0; i < chart.graphs.length; i++) {
                var graph = chart.graphs[i];
                if (graph.autoColor !== true)
                  continue;
                var colorKey = "autoColor-"+i;
                graph.lineColorField = colorKey;
                graph.fillColorsField = colorKey;
                for(var x = 0; x < chart.dataProvider.length; x++) {
                  var color = chart.colors[x]
                  chart.dataProvider[x][colorKey] = color;
                }
              }

              }, ["serial"]);
              var chart2 = AmCharts.makeChart("chartdiv2", {
                "type": "serial",
                "theme": "light",
                // "marginRight": 70,
                "dataProvider": [

                  @for ($i = 1; $i < count($chart2);)
                      @foreach ($chart2 as $chart2)
                      {
                        "country": "Indikator {{$i++}}",
                        "visits": {{ $chart2->totalnilai }},
                        
                      },
                    @endforeach
                  @endfor

                ],
                "startDuration": 1,
                "graphs": [{
                  "balloonText": "<b>[[category]]: [[value]]</b>",
                  "fillColorsField": "color",
                  "fillAlphas": 0.9,
                  "lineAlpha": 0.2,
                  "type": "column",
                  "valueField": "visits",
                  "autoColor": true
                }],
                "chartCursor": {
                  "categoryBalloonEnabled": false,
                  "cursorAlpha": 0,
                  "zoomable": false
                },
                "categoryField": "country",
                "categoryAxis": {
                  "gridPosition": "start",
                  "labelRotation": 45
                },
                "export": {
                  "enabled": true
                }

              });
            </script>
            <!-- HTML -->
            <div id="chartdiv2"></div> 
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center bg-blue">
          <a href="{{ route('dosen.hasil_evaluasi_per_jenis') }}" style="color: white;" class="uppercase">Lihat Detail</a>
        </div>
        <!-- /.box-footer -->

  </div>
@endsection