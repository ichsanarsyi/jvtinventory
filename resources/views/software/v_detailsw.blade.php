@extends('layout.v_template')
@section('headertitle')
@section('title','Detail Software')
<h3 style="margin:-0px;">
	@yield('title')
  </h3>
  @endsection
@section('content')

    <div class="row">
        <div class="col-xs-12">
			<div class="box box-primary text-info box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Detail : {{ $software->nama_sw }}</h3>
				<!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-hover">
						<tr>
							<th width="200px">Nama Software</th>
							<th width="20px">:</th>
							<th>{{ $software->nama_sw }}</th>
						</tr>
						<tr>
							<th width="200px">Merk Software</th>
							<th width="20px">:</th>
							<th>{{ $software->nama_merk_sw }}</th>
						</tr>
						<tr>
							<th width="200px">Jenis Lisensi</th>
							<th width="20px">:</th>
							<th>{{ $software->jenis_lisensi }}</th>
						</tr>
						<tr>
							<th width="200px">Harga Software</th>
							<th width="20px">:</th>
							<th>@currency($software->harga_sw)</th>
						</tr>
						<tr>
							<th width="200px">Deskripsi Software</th>
							<th width="20px">:</th>
							<th>{{ $software->deskripsi_sw }}</th>
						</tr>
						<tr>
							<th width="200px">Versi Software</th>
							<th width="20px">:</th>
							<th>{{ $software->versi_sw }}</th>
						</tr>
						<tr>
							<th width="200px">Nama Hardware</th>
							<th width="20px">:</th>
							<th>{{ $software->nama_hw }}</th>
						</tr>
					</table>
				</div>						
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-5">
		<div class="box box-primary box-solid">
		  <div class="box-header with-border">
			<h3 class="box-title">Kode Lisensi</h3>
		  </div>
		  <!-- /.box-header -->
		  <div class="box-body" align=center>
			<div class="col">
				<span class="h4 font-weight-bold mb-0">{{ $software->kode_lisensi }}</span>
			</div>
		  </div>
		  <!-- /.box-body -->
		</div>
		<!-- /.box -->
	  </div>
	  <div class="col-md-3">
		<div class="box box-primary box-solid">
		  <div class="box-header with-border">
			<h3 class="box-title">Tanggal Pembelian</h3>
		  </div>
		  <!-- /.box-header -->
		  <div class="box-body" align=center>
			<div class="col">
				<span class="h4 font-weight-bold mb-0">{{ date('d F Y', strtotime($software->tgl_pembelian)) }}</span>
			</div>
		  </div>
		  <!-- /.box-body -->
		</div>
		<!-- /.box -->
	  </div>
	  <div class="col-md-3">
		<div class="box box-danger box-solid">
		  <div class="box-header with-border">
			<h3 class="box-title">Tanggal Batas Lisensi</h3>
		  </div>
		  <!-- /.box-header -->
		  <div class="box-body" align=center>
			<div class="col">
				<span class="h4 font-weight-bold mb-0">{{ date('d F Y', strtotime($software->tgl_batas_lisensi)) }}</span>
			</div>
		  </div>
		  <!-- /.box-body -->
		</div>
		<!-- /.box -->
	  </div>
	</div>
	<div class="row">
		<div class="col col-sm-6">
			<div class="form-group">
				<a href="{{ url('software') }}" class="btn btn-default"><i class="fa fa-chevron-circle-left fa-fw"></i>Kembali</a>
			</div>
		</div>
	</div>	
	
@endsection