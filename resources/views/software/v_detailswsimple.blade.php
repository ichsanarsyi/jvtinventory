@extends('layout.v_template')
@section('headertitle')
@section('title','Detail Software')
	<h3 style="margin:-0px;">
		@yield('title')
	</h3>
@endsection
@section('content')
    <div class="row">
		<div class="col col-md-6">
			<div class="form-group">
				<a href="{{ url('software') }}" class="btn btn-primary"><i class="fa fa-chevron-circle-left fa-fw"></i>Kembali</a>
			</div>
		</div>
		@if (auth()->user()->level == 'Admin') 
		<div class="col col-md-6">
			<div class="form-group">
				<a onclick="window.location='/software/editsw/{{$software->id_sw}}';" class="btn btn-warning pull-right"><i class="fa fa-edit fa-fw"></i>Edit</a>
			</div>
		</div>
		@endif
        <div class="col-md-12">
			<div class="box box-primary text-info box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Detail : {{ $software->nama_sw }}</h3>
				<!-- /.box-tools -->
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-striped table-hover">
						<tr>
							<th width="170px">Nama Software</th>
							<th width="20px">:</th>
							<th>{{ $software->nama_sw }}</th>
						</tr>
						<tr>
							<th width="170px">Merk Software</th>
							<th width="20px">:</th>
							<td>{{ $software->nama_merk_sw }}</td>
						</tr>
						<tr>
							<th width="170px">Jenis Lisensi</th>
							<th width="20px">:</th>
							<td>{{ $software->jenis_lisensi }}</td>
						</tr>
						<tr>
							<th width="170px">Harga Software</th>
							<th width="20px">:</th>
							<td>@currency($software->harga_sw)</td>
						</tr>
						<tr>
							<th width="170px">Deskripsi Software</th>
							<th width="20px">:</th>
							<td>{{ ($software->deskripsi_sw == '' ? '-' :$software->deskripsi_sw)}}</td>
						</tr>
						<tr>
							<th width="170px">Versi Software</th>
							<th width="20px">:</th>
							<td>{{ ($software->versi_sw == '' ? '-' :$software->versi_sw)}}</td>
						</tr>
						<tr>
							<th width="170px">Nama Hardware</th>
							<th width="20px">:</th>
							<td><a href="/hardware/detailhw/{{ $software->id_hw }}">{{ $software->nama_hw }} {{$software->seri_hw}}</a></td>
						</tr>
					</table>
				</div>						
			</div>
		</div>
	</div>
	<div class="row">
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
	 	<div class="col-md-4">
			<div class="box box-danger box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Tanggal Batas Lisensi</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body" align=center>
					<div class="col">
						<span class="h4 font-weight-bold mb-0">									
							@if (($software->tgl_batas_lisensi)=="")
								-
							@else
								{{ date('d F Y', strtotime($software->tgl_batas_lisensi)) }}
								<small style="color: red"> 
									( {{ $software->day_left }} Hari Tersisa )
								</small>
							@endif					
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
	  	</div>
	</div>
	
@endsection