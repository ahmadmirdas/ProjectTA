@extends('adminlte::page')

@section('title', 'Evoting')

@section('content')
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
  {{ Session::get('success') }}
</div>
@endif
<div class="panel panel-default">
  <div class="">
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
      {{session('sukses')}}
    </div>
    @endif
    <div class="modal-body">
      <div class="col-6">
        <h1>Total Data Suara Kandidat</h1>
      </div>

      <table class="table table-hover">
        <tr>
          <th>Nama Kandidat </th>
          @foreach ($data as $item)
          <th>{{ $item['namakandidat'] }}</th>
          {{-- {{ dd($item) }} --}}
          @endforeach
          {{-- <th>Kandidat 1</th>
          <th>Kandidat 2</th>
          <th>Kandidat 3</th> --}}
        </tr>
        <tr>
          <td>Suara</td>
        @foreach($data as $item)
          <td>{{ $item['total_suara'] }}</td>
        @endforeach
        </tr>
    </table>
  </div>
</div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

<script>
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Hasil Total Suara Calon Kandidat'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: '{{ $data[0]['namakandidat'] }}',
            y: {{ $data[0]['total_suara'] }},
        }, {
            name: '{{ $data[1]['namakandidat'] }}',
            y: {{ $data[1]['total_suara'] }},
        }, {
            name: '{{ $data[2]['namakandidat'] }}',
            y: {{ $data[2]['total_suara'] }},
        }]
    }]
});
</script>
@endsection