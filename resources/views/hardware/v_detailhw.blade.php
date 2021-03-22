@extends('layout.v_template')
@section('headertitle')
@section('title','Detail Hardware')
<h3 style="margin:-0px;">
    @yield('title')
</h3>
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary text-info box-solid">
		  <div class="box-header with-border">
			<h3 class="box-title">Detail : {{ $hardware->nama_hw }}</h3>
			<!-- /.box-tools -->
		  </div>
		  <!-- /.box-header -->
		  <div class="box-body">
			<table class="table table-striped table-hover">
				<tr>
					<th width="170px">Nama Hardware</th>
					<th width="20px">:</th>
					<td>{{ $hardware->nama_hw }}</td>
				</tr>
				<tr>
					<th width="170px">Merk Hardware</th>
					<th width="20px">:</th>
					<td>{{ $hardware->nama_merk_hw }}</td>
				</tr>
				<tr>
					<th width="170px">Seri Hardware</th>
					<th width="20px">:</th>
					<td>{{ $hardware->seri_hw }}</td>
				</tr>
				<tr>
					<th width="170px">Kategori</th>
					<th width="20px">:</th>
					<td>{{ $hardware->nama_kategori_hw }}</td>
				</tr>
				<tr>
					<th width="170px">Harga</th>
					<th width="20px">:</th>
					<td>@currency($hardware->harga_hw)</td>
				</tr>
				<tr>
					<th width="170px">Departemen</th>
					<th width="20px">:</th>
					<td>{{ $hardware->nama_departemen }}</td>
				</tr>
				<tr>
					<th width="170px">Lokasi</th>
					<th width="20px">:</th>
					<td>{{ $hardware->nama_lokasi }}</td>
				</tr>
				<tr>
					<th width="170px">Kondisi</th>
					<th width="20px">:</th>
					<td><span class="{{$hardware->text_kondisi}}"><i class="fa {{$hardware->icon_kondisi}} fa-fw"></i> {{ $hardware->nama_kondisi }}</span></td>
				</tr>
				<tr>
					<th width="170px">Deskripsi</th>
					<th width="20px">:</th>
					<td>{{ $hardware->deskripsi_hw }}</td>
				</tr>
			</table>
		</div>
		  <!-- /.box-body -->
		</div>
		<!-- /.box -->
	  </div>
</div>

<div class="row">
	<div class="col-md-2">
	</div>
	<div class="col-md-2">
	<div class="box box-primary box-solid">
	  <div class="box-header with-border">
		<h3 class="box-title">Kode Asset</h3>
	  </div>
	  <!-- /.box-header -->
	  <div class="box-body" align=center>
		<div class="col">
			<span class="h4 font-weight-bold mb-0">{{ $hardware->kode_asset }}</span>
		</div>
	  </div>
	  <!-- /.box-body -->
	</div>
	<!-- /.box -->
  </div>
  <div class="col-md-2">
	<div class="box box-primary box-solid">
	  <div class="box-header with-border">
		<h3 class="box-title">Staff</h3>
	  </div>
	  <!-- /.box-header -->
	  <div class="box-body" align=center>
		<div class="col">
			<span class="h4 font-weight-bold mb-0">{{ $hardware->nama_staff }}</span>
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
			<span class="h4 font-weight-bold mb-0">{{ date('d F Y', strtotime($hardware->tgl_beli_hw)) }}</span>
		</div>
	  </div>
	  <!-- /.box-body -->
	</div>
	<!-- /.box -->
  </div>
  <div class="col-md-3">
	<div class="box box-danger box-solid">
	  <div class="box-header with-border">
		<h3 class="box-title">Tanggal Batas Garansi</h3>
		</div>
	  <!-- /.box-header -->
	  <div class="box-body" align=center>
		<div class="col">
			<span class="h4 font-weight-bold mb-0">{{ date('d F Y', strtotime($hardware->tgl_batas_garansi)) }} <small style="color: red"> <br>{{ $hardware->day_left }} Hari Tersisa</small>
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
			<a href="{{ url('hardware') }}" class="btn btn-default"><i class="fa fa-chevron-circle-left fa-fw"></i>Kembali</a>
		</div>
	</div>
</div>
@endsection