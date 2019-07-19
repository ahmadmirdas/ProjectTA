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
        <h1>Data Suara Kandidat</h1>
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
@endsection