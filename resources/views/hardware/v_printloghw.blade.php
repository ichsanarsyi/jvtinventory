<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print Log Perubahan Hardware | JVT Inventory</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- favicon2 -->
  <link rel="icon" href="{{ URL::asset('favicon2.png') }}" type="image/x-icon"/>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/AdminLTE.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          JVT Inventory | Log Perubahan Hardware
          <small class="pull-right">
            <p>Tanggal, Waktu: 
                @php
                    date_default_timezone_set("Asia/Jakarta");
                    echo date('d F Y, h:i:s A');
                @endphp
            </p>
          </small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
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
          </thead>
          <tbody>
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
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

{{-- JS --}}
<script type="text/javascript">
    window.onload = function() { window.print(); }
</script>

</body>
</html>