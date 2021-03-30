<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print Hardware | JVT Inventory</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
  <table style="border:1px solid black; border-collapse:collapse;">
    <thead>
      <tr>
        <th style="border:1px solid black;" align="center" width="5">No</th>
        <th style="border:1px solid black;" align="center" width="20">Kode Asset</th>
        <th style="border:1px solid black;" align="center" width="30">Nama Hardware</th>
        <th style="border:1px solid black;" align="center" width="20">Merk</th>
        <th style="border:1px solid black;" align="center" width="15">Seri</th>
        <th style="border:1px solid black;" align="center" width="15">Kategori</th>
        <th style="border:1px solid black;" align="center" width="15">Harga</th>
        <th style="border:1px solid black;" align="center" width="20">Departemen</th>
        <th style="border:1px solid black;" align="center" width="20">Lokasi</th>
        <th style="border:1px solid black;" align="center" width="10">Kondisi</th>
        <th style="border:1px solid black;" align="center" width="15">Staff</th>
        <th style="border:1px solid black;" align="center" width="25">Tanggal Pembelian</th>
        <th style="border:1px solid black;" align="center" width="25">Tanggal Batas Garansi</th>            
        <th style="border:1px solid black;" align="center" width="25">Durasi Sisa Garansi</th>
      </tr>
    </thead>
    <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($hardware as $data)
          <tr>
            <td style="border:1px solid black;">{{$no++}}</td>
            <td style="border:1px solid black;">{{$data->kode_asset}}</td>
            <td style="border:1px solid black;">{{$data->nama_hw}}</td>
            <td style="border:1px solid black;">{{$data->nama_merk_hw}}</td>
            <td style="border:1px solid black;">{{$data->seri_hw}}</td>
            <td style="border:1px solid black;">{{$data->nama_kategori_hw}}</td>
            <td style="border:1px solid black;">@currency($data->harga_hw)</td>
            <td style="border:1px solid black;">{{$data->nama_departemen}}</td>
            <td style="border:1px solid black;">{{$data->nama_lokasi}}</td>
            <td style="border:1px solid black;">{{$data->nama_kondisi}}</td>
            <td style="border:1px solid black;">{{$data->nama_staff}}</td>
            <td style="border:1px solid black;">{{$data->tgl_beli_hw}}</td>
            <td style="border:1px solid black;">{{$data->tgl_batas_garansi}}</td>
            <td style="border:1px solid black;">{{$data->day_left}} Hari Tersisa</td>
          </tr>
        @endforeach                    
    </tbody>
  </table>
</body>
</html>