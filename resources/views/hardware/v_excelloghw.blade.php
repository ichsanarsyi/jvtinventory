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
        <th style="border:1px solid black;" align="center" width="5">
          <b>No</b>
        </th>
        <th style="border:1px solid black;" align="center" width="25">
          <b>Waktu Ubah</b>
        </th>
        <th style="border:1px solid black;" align="center" width="25">
          <b>Nama Hardware</b>
        </th>
        <th style="border:1px solid black;" align="center" width="15">
          <b>Kode Asset</b>
        </th>
        <th style="border:1px solid black;" align="center" width="15">
          <b>Lokasi Lama</b>
        </th>
        <th style="border:1px solid black;" align="center" width="15">
          <b>Lokasi Baru</b>
        </th>
        <th style="border:1px solid black;" align="center" width="15">
          <b>Departemen<br>Lama</b>
        </th>
        <th style="border:1px solid black;" align="center" width="15">
          <b>Departemen<br>Baru</b>
        </th>
        <th style="border:1px solid black;" align="center" width="20">
          <b>Tgl Batas<br>Garansi Lama</b>
        </th>
        <th style="border:1px solid black;" align="center" width="20">
          <b>Tgl Batas<br>Garansi Baru</b>
        </th>
        <th style="border:1px solid black;" align="center" width="15">
          <b>Staff Lama</b>
        </th>
        <th style="border:1px solid black;" align="center" width="25">
          <b>Staff Baru</b>
        </th>
      </tr>
    </thead>
    <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($loghardware as $results)
          <tr>
            <td style="border:1px solid black;">
              {{$no++}}
            </td>
            <td style="border:1px solid black;">
              {{ date('d M Y - h:i:s', strtotime($results['waktu_ubah'])) }}
            </td>
            <td style="border:1px solid black;">
              {{$results['nama_hw']}} {{$results['nama_merk_hw']}} {{$results['seri_hw']}}
            </td>
            <td style="border:1px solid black;">
              {{$results['kode_asset']}}
            </td>
            <td style="border:1px solid black;">
              {{$results['nama_lokasi_lama']}}
            </td>
            <td style="border:1px solid black;">
              {{$results['nama_lokasi_baru']}}
            </td>
            <td style="border:1px solid black;">
              {{$results['nama_departemen_lama']}}
            </td>
            <td style="border:1px solid black;">
              {{$results['nama_departemen_baru']}}
            </td>
            <td style="border:1px solid black;">
              {{ date('d M Y', strtotime($results['tgl_batas_garansi_lama'])) }}
            </td>
            <td style="border:1px solid black;">
              {{ date('d M Y', strtotime($results['tgl_batas_garansi_baru'])) }}
            </td>
            <td style="border:1px solid black;">
              {{$results['nama_staff_lama']}}
            </td>
            <td style="border:1px solid black;">
              {{$results['nama_staff_baru']}}
            </td>
          </tr>
        @endforeach                    
    </tbody>
  </table>
</body>
</html>