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
      <div class="title" style="padding-right: 170px;">
        <p><b>BADAN EKSEKUTIF MAHASISWA</b></p>
        <p><b>UNIVERSITAS 17 AGUSTUS 1945 SURABAYA</b></p>
        <p>Sekretariat : Gedung Graha Widya Lt. 1</p>
        <p>Jl. Semolowaru No. 45 Surabaya</p>
        <p>Email : bemuntagsby@gmail.com</p>
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
    <div style="text-align: center;">
    <table class="" style="padding-left: 217px;" cellpadding="10">
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
    </div>
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