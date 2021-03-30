<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print Hardware | JVT Inventory</title>
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
    <h2>JVT Inventory | Daftar Hardware</h2>
    <h4>Tanggal, Waktu: 
      @php
          date_default_timezone_set("Asia/Jakarta");
          echo date('d F Y, h:i:s A');
      @endphp
    </h4>    
    <table>
      <tr>
        <th>No</th>
        <th>Kode Asset</th>
        <th>Nama Hardware</th>
        <th>Merk</th>
        <th>Seri</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Departemen</th>
        <th>Lokasi</th>
        <th>Kondisi</th>
        <th>Staff</th>
        <th>Tanggal Pembelian</th>
        <th>Tanggal Batas Garansi</th>            
        <th>Durasi Sisa Garansi</th>
      </tr>
      @php
          $no=1;
      @endphp
      @foreach ($hardware as $data)
      <tr>
          <td>{{$no++}}</td>
          <td>{{$data->kode_asset}}</td>
          <td>{{$data->nama_hw}}</td>
          <td>{{$data->nama_merk_hw}}</td>
          <td>{{$data->seri_hw}}</td>
          <td>{{$data->nama_kategori_hw}}</td>
          <td>@currency($data->harga_hw)</td>
          <td>{{$data->nama_departemen}}</td>
          <td>{{$data->nama_lokasi}}</td>
          <td>{{$data->nama_kondisi}}</td>
          <td>{{$data->nama_staff}}</td>
          <td>{{$data->tgl_beli_hw}}</td>
          <td>{{$data->tgl_batas_garansi}}</td>
          <td>
            @if (($data->day_left) == "0")
              -
            @else                  
              {{$data->day_left}} Hari Tersisa
            @endif
          </td>
      </tr>
      @endforeach   
    </table>
</body>
</html>