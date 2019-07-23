@extends('adminlte::page')

@section('title', 'Evoting')

@section('content')
<a href="{{ route('export.berita-acara') }}" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Cetak</a>
    <style>
  .container {
    width: 730px;
  }
  .header .logo1 {
    width: 160px;
    height: 110px;
    padding-top: 13px;
    float:left;
  }
  .header .logo2 {
    width: 160px;
    height: 10px;
    padding-top: 0px;
    /*float:right;*/
  }
  .header .title p {
    text-align: center;
    font-size: 16px;
    margin: 2px;
  }
  .header .title h4 {
    text-align: center;
    margin: 10px;
  }
  .header .title-kanan {
    float: right;
    height: 65px;
    padding-right: 220px;
  }
  .line {
    border :3px solid black;
  }
  .line-2 {
    border :2px solid black;
  }
  td {
    font-size: 11px;
  }
</style>
<div class="panel panel-default">
<div class="container">
  <div class="header" style="width: 730px;
    height: 130px;">
    <div class="logo1">
      {{-- <img src="{{ asset('assets/img/untag.png') }}" width="100px" height="100px" alt=""> --}}
    </div>
    <div class="title-kanan">
      <div class="title">
        <p><b>BADAN EKSEKUTIF MAHASISWA</b></p>
        <p><b>UNIVERSITAS 17 AGUSTUS 1945 SURABAYA</b></p>
        <p>Sekretariat : Gedung Graha Widya Lt. 1</p>
        <p>Jl. Semolowaru No. 45 Surabaya</p>
        <p>Email : bemuntagsby@gmail.com</p>
      </div>
    </div>

  </div>
  <div class="line"></div>
  <div class="title-kanan" style="text-align: center;">
      <div class="title">
        <p><b>BERITA ACARA</b></p>
        <p><b>HASIL PENGHITUNGAN SUARA</b></p>
        <p><b>PEMILIHAN KETUA BADAN EKSEKUTIF MAHASISWA</b></p>
        <p><b>DI TEMPAT PEMUNGUTAN SUARA</b></p>
      </div>
    </div>
    <table class="table table-hover" cellpadding="12" border="2">
      <thead>
        <tr>
            <th>No</th>
            <th>Nama Kandidat </th>
            <th>Total Suara</th>
        </tr>
      </thead>
      <tbody>
        {{-- {{ dd($data) }} --}}
        @foreach ($data as $item)
        <tr>
        <td><p>{{ $item['kandidat_id'] }}</p></td>
        <td><p>{{ $item['namakandidat'] }}</p></td>
        <td><p>{{ $item['total_suara'] }}</p></td>
        </tr>
        @endforeach
      </tbody>
    </table>
      <div class="title" style="text-align: center;">
        <p>Hasil ini akan menjadi akhir sesuai dengan perhitungan yang dilakukan oleh sistem<br> dan di setujui oleh KPPS</p>
      </div>
      <br><br>
      <div class="title" style="float: right;">
        <p>TTD KPPS</p>
        <br><br><br><br>
        <div style="border: 2px solid black"></div>
        <br>
      </div>
</div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

{{-- <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

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
</script> --}}
@endsection