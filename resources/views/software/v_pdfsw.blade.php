<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print Software | JVT Inventory</title>
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
    <h2>JVT Inventory | Daftar Software</h2>
    <h4>Tanggal, Waktu: 
      @php
          date_default_timezone_set("Asia/Jakarta");
          echo date('d F Y, h:i:s A');
      @endphp
    </h4>    
    <table>
      <tr>
        <th>No</th>
        <th>Nama Software</th>
        <th>Merk</th>
        <th>Jenis Lisensi</th>
        <th>Harga</th>
        <th>Versi</th>
        <th>Nama Hardware</th>
        <th>Tanggal Pembelian</th>
        <th>Tanggal Batas Lisensi</th>
        <th>Masa Aktif Lisensi</th>
        <th>Kode Lisensi</th>
      </tr>
      @php
          $no=1;
      @endphp
      @foreach ($software as $data)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$data->nama_sw}}</td>
            <td>{{$data->nama_merk_sw}}</td>
            <td>{{$data->jenis_lisensi}}</td>
            <td>@currency($data->harga_sw)</td>
            <td>{{$data->versi_sw}}</td>
            <td>{{$data->nama_hw}}</td>
            <td>{{$data->tgl_pembelian}}</td>
            <td>{{$data->tgl_batas_lisensi}}</td>
            <td>
                <span style="padding-right:30%;" class="pull-right">
                    {{$data->day_left}} Hari Tersisa
                </span>
            </td>
            <td>{{$data->kode_lisensi}}</td>
        </tr>
      @endforeach   
    </table>
</body>
</html>