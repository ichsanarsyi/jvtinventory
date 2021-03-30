<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print Hardware | JVT Inventory</title>
  <!-- favicon2 -->
  <link rel="icon" href="{{ URL::asset('favicon2.png') }}" type="image/x-icon"/>
  <style>
    table {
      font-size: 10px;
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    
    tr:nth-child(even) {
      background-color: #dddddd;
    }

    h2 {
      font-size: 20px;
      font-family: arial, sans-serif;
      text-align: left;
    }
    
    h4 {
      font-size: 10px;
      font-family: arial, sans-serif;
      text-align: left;
    }

    </style> 
</head>
<body>   
    <h2>JVT Inventory | Log Perubahan Hardware</h2>
    <h4>Tanggal, Waktu: 
      @php
          date_default_timezone_set("Asia/Jakarta");
          echo date('d F Y, h:i:s A');
      @endphp
    </h4>    
    <table>
      <tr>
        <th class="text-center">No</th>
        <th class="text-center">Waktu Ubah</th>
        <th class="text-center">Nama Hardware</th>
        <th class="text-center">Kode Asset</th>
        <th class="text-center">Lokasi Lama</th>
        <th class="text-center">Lokasi Baru</th>
        <th class="text-center">Departemen<br>Lama</th>
        <th class="text-center">Departemen<br>Baru</th>
        <th class="text-center">Tgl Batas<br>Garansi Lama</th>
        <th class="text-center">Tgl Batas<br>Garansi Baru</th>
        <th class="text-center">Staff Lama</th>
        <th class="text-center">Staff Baru</th>
      </tr>
      @php
          $no=1;
      @endphp
      @foreach ($loghardware as $results)
        <tr>
          <td>{{$no++}}</td>
          <td>{{ date('d M Y - h:i:s', strtotime($results['waktu_ubah'])) }}</td>
          <td>{{$results['nama_hw']}} {{$results['nama_merk_hw']}} {{$results['seri_hw']}}</td>
          <td>{{$results['kode_asset']}}</td>
          <td>{{$results['nama_lokasi_lama']}}</td>
          <td>{{$results['nama_lokasi_baru']}}</td>
          <td>{{$results['nama_departemen_lama']}}</td>
          <td>{{$results['nama_departemen_baru']}}</td>
          <td>{{ date('d M Y', strtotime($results['tgl_batas_garansi_lama'])) }}</td>
          <td>{{ date('d M Y', strtotime($results['tgl_batas_garansi_baru'])) }}</td>
          <td>{{$results['nama_staff_lama']}}</td>
          <td>{{$results['nama_staff_baru']}}</td>
        </tr>
      @endforeach   
    </table>
</body>
</html>