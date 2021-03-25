<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print Hardware | JVT Inventory</title>
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
          JVT Inventory | Daftar Hardware
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
          </thead>
          <tbody>
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
                    <td>{{$data->day_left}} Hari Tersisa</td>
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