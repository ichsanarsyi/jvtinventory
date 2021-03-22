<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print Software | JVT Inventory</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
  <table class="table">
    <thead>
    <tr>
      <th align="center" width="5"><b>No</b></th>
      <th align="center" width="25"><b>Nama Software</b></th>
      <th align="center" width="15"><b>Merk</b></th>
      <th align="center" width="20"><b>Jenis Lisensi</b></th>
      <th align="center" width="15"><b>Harga</b></th>
      <th align="center" width="15"><b>Versi</b></th>
      <th align="center" width="15"><b>Nama Hardware</b></th>
      <th align="center" width="20"><b>Tanggal Pembelian</b></th>
      <th align="center" width="20"><b>Tanggal Batas Lisensi</b></th>
      <th align="center" width="20"><b>Masa Aktif Lisensi</b></th>
      <th align="center" width="40"><b>Kode Lisensi</b></th>
    </tr>
    </thead>
    <tbody>
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
    </tbody>
  </table>
</body>
</html>