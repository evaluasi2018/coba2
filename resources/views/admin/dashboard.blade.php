@extends('layouts/template')
@section('main-title','Dashboard Admin')
@section('sidebar')
    @include('admin/sidebar')
@endsection
@section('manajemen-title')
  <div class="box-header with-border">
        <h3 class="box-title" style="text-transform: uppercase;"><i class="fa fa-dashboard"></i>&nbsp;DASHBOARD ADMIN</h3>
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
            <span class="info-box-text">JENIS INDIKATOR</span>
            <span class="info-box-number"><small>&nbsp; JENIS</small></span>
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
            <span class="info-box-text">INDIKATOR PENILAIAN</span>
            <span class="info-box-number"> <small>&nbsp; INDIKATOR</small></span>
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
            <span class="info-box-text">MAHASISWA</span>
            <span class="info-box-number"><small>&nbsp; MAHASISWA</small></span>
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
            <span class="info-box-text">DOSEN</span>
            <span class="info-box-number"> <small>&nbsp; DOSEN</small></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
      <!-- /.row -->
      

    <div class="row">
      <div class="col-lg-6 col-md-12 col-xs-12">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bar-chart" style="font-size: 15px;"></i>&nbsp;Statistik Total Nilai Per Jenis</h3>

            <div class="box-tools pull-right">
              <span class="label label-primary">Jenis Indikator</span>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            
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
                  
                  @foreach ($chart2 as $chart2)
                    {
                      "country": "{{$chart2->nm_jenis_indikator}}",
                      "visits": {{ $chart2->totalnilai }},
                      "color": "#FF0F00"
                    },
                  @endforeach

                ],
                "valueAxes": [{
                  "axisAlpha": 0,
                  "position": "left",
                  "title": "Total Nilai Per Jenis Indikator"
                }],
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
            <a href="{{ route('laporan.per_jenis') }}" style="color: white;" class="uppercase">Lihat Detail</a>
          </div>
          <!-- /.box-footer -->
        </div>
        <!--/.box -->
      </div>

      <div class="col-lg-6 col-md-12 col-xs-12">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bar-chart" style="font-size: 15px;"></i>&nbsp;Statistik Total Nilai Per Indikator</h3>

            <div class="box-tools pull-right">
              <span class="label label-primary">{{ $indikator }} Indikator</span>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            
            <!-- Chart code -->
            <script>

              var chart = AmCharts.makeChart("chartdiv", {
                "type": "serial",
                "theme": "light",
                // "marginRight": 70,
                "dataProvider": [

                  // $total = Count($chart);
                  @for ($i = 1; $i < count($chart);)
                    @foreach ($chart as $chart)
                    {
                      "country": "Indikator {{$i++}}",
                      "visits": {{ $chart->totalnilai }},
                      
                    },
                  @endforeach
                  @endfor



                ],
                "valueAxes": [{
                  "axisAlpha": 0,
                  "position": "left",
                  "title": "Total Nilai Per Indikator"
                }],
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
            <a href="{{ route('laporan.per_jenis') }}" style="color: white;" class="uppercase">Lihat Laporan Per Jenis Keseluruhan</a>
          </div>
          <!-- /.box-footer -->
        </div>
        <!--/.box -->
      </div>



      <!-- /.col -->
    </div>


@endsection