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
    <h2>JVT Inventory | Log Perubahan Software</h2>
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
        <th class="text-center">Nama Software</th>
        <th class="text-center">Tanggal<br>Pembelian Lama</th>
        <th class="text-center">Tanggal<br>Pembelian Baru</th>
        <th class="text-center">Tanggal Batas<br>Lisensi Lama</th>
        <th class="text-center">Tanggal Batas<br>Lisensi Baru</th>
      </tr>
      @php
          $no=1;
      @endphp
      @foreach ($logsoftware as $data)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$data->waktu_ubah}}</td>
        <td>{{$data->nama_sw}}</td>
        <td>{{date('d M Y', strtotime($data->tgl_pembelian_lama))}}</td>
        <td>{{date('d M Y', strtotime($data->tgl_pembelian_baru))}}</td>
        <td>{{date('d M Y', strtotime($data->tgl_batas_lisensi_lama))}}</td>
        <td>{{date('d M Y', strtotime($data->tgl_batas_lisensi_baru))}}</td>           
      </tr>
      @endforeach   
    </table>
</body>
</html>