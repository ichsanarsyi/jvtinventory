<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log Perubahan Software</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
  <table style="border:1px solid black; border-collapse:collapse;">
    <thead>
      <tr>
        <th style="border:1px solid black;" align="center" width="5" class="text-center">
          <b>No</b>
        </th>
        <th style="border:1px solid black;" align="center" width="25" class="text-center">
          <b>Waktu Ubah</b>
        </th>
        <th style="border:1px solid black;" align="center" width="25" class="text-center">
          <b>Nama Software</b>
        </th>
        <th style="border:1px solid black;" align="center" width="20" class="text-center">
          <b>Tanggal<br>Pembelian Lama</b>
        </th>
        <th style="border:1px solid black;" align="center" width="20" class="text-center">
          <b>Tanggal<br>Pembelian Baru</b>
        </th>
        <th style="border:1px solid black;" align="center" width="20" class="text-center">
          <b>Tanggal Batas<br>Lisensi Lama</b>
        </th>
        <th style="border:1px solid black;" align="center" width="20" class="text-center">
          <b>Tanggal Batas<br>Lisensi Baru</b>
        </th>
      </tr>
    </thead>
    <tbody>
        @php
            $no=1;
        @endphp
        @foreach ($logsoftware as $data)
          <tr>
            <td style="border:1px solid black;">
              {{$no++}}
            </td>
            <td style="border:1px solid black;">
              {{$data->waktu_ubah}}
            </td>
            <td style="border:1px solid black;">
              {{$data->nama_sw}}
            </td>
            <td style="border:1px solid black;">
              {{date('d M Y', strtotime($data->tgl_pembelian_lama))}}
            </td>
            <td style="border:1px solid black;">
              {{date('d M Y', strtotime($data->tgl_pembelian_baru))}}
            </td>
            <td style="border:1px solid black;">
              {{date('d M Y', strtotime($data->tgl_batas_lisensi_lama))}}
            </td>
            <td style="border:1px solid black;">
              {{date('d M Y', strtotime($data->tgl_batas_lisensi_baru))}}
            </td>               
          </tr>
        @endforeach                    
    </tbody>
  </table>
</body>
</html>