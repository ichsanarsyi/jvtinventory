<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print Software | JVT Inventory</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- favicon2 -->
  <link rel="icon" href="{{ URL::asset('favicon2.png') }}" type="image/x-icon"/>
  {{-- <style>
    table {
      font-family: 'Times New Roman', Times, serif;
      border-collapse: collapse;
    }

    td, th {
      border: 1px solid #000000;
      padding: 8px;
    }
  </style> --}}

</head>
<body>
  <table style="border:1px solid black; border-collapse:collapse;">
    <thead>
      <tr>
        {{-- <th><b>No</b></th>
        <th><b>Nama Software</b></th>
        <th><b>Merk</b></th>
        <th><b>Jenis Lisensi</b></th>
        <th><b>Harga</b></th>
        <th><b>Versi</b></th>
        <th><b>Nama Hardware</b></th>
        <th><b>Tanggal Pembelian</b></th>
        <th><b>Tanggal Batas Lisensi</b></th>
        <th><b>Masa Aktif Lisensi</b></th>
        <th><b>Kode Lisensi</b></th> --}}
        <th style="border:1px solid black;" align="center" width="5"><b>No</b></th>
        <th style="border:1px solid black;" align="center" width="25"><b>Nama Software</b></th>
        <th style="border:1px solid black;" align="center" width="15"><b>Merk</b></th>
        <th style="border:1px solid black;" align="center" width="20"><b>Jenis Lisensi</b></th>
        <th style="border:1px solid black;" align="center" width="15"><b>Harga</b></th>
        <th style="border:1px solid black;" align="center" width="15"><b>Versi</b></th>
        <th style="border:1px solid black;" align="center" width="15"><b>Nama Hardware</b></th>
        <th style="border:1px solid black;" align="center" width="20"><b>Tanggal Pembelian</b></th>
        <th style="border:1px solid black;" align="center" width="20"><b>Tanggal Batas Lisensi</b></th>
        <th style="border:1px solid black;" align="center" width="20"><b>Masa Aktif Lisensi</b></th>
        <th style="border:1px solid black;" align="center" width="40"><b>Kode Lisensi</b></th>
      </tr>
    </thead>
    <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($software as $data)
          <tr>
              <td style="border:1px solid black;">{{$no++}}</td>
              <td style="border:1px solid black;">{{$data->nama_sw}}</td>
              <td style="border:1px solid black;">{{$data->nama_merk_sw}}</td>
              <td style="border:1px solid black;">{{$data->jenis_lisensi}}</td>
              <td style="border:1px solid black;">@currency($data->harga_sw)</td>
              <td style="border:1px solid black;">{{$data->versi_sw}}</td>
              <td style="border:1px solid black;">{{$data->nama_hw}}</td>
              <td style="border:1px solid black;">{{$data->tgl_pembelian}}</td>
              <td style="border:1px solid black;">{{$data->tgl_batas_lisensi}}</td>
              <td style="border:1px solid black;">
                  <span style="padding-right:30%;" class="pull-right">
                    {{ ($data->id_jenis_lisensi == 2 ? '-' :$data->day_left.' Hari Tersisa')}}
                  </span>
              </td>
              <td style="border:1px solid black;">{{$data->kode_lisensi}}</td>
          </tr>
        @endforeach                    
    </tbody>
  </table>
</body>
</html>