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
          JVT Inventory | Log Perubahan Software
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
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Waktu Ubah</th>
              <th class="text-center">Nama Software</th>
              <th class="text-center">Tanggal<br>Pembelian Lama</th>
              <th class="text-center">Tanggal<br>Pembelian Baru</th>
              <th class="text-center">Tanggal Batas<br>Lisensi Lama</th>
              <th class="text-center">Tanggal Batas<br>Lisensi Baru</th>
            </tr>
          </thead>
          <tbody>
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