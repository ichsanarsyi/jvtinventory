@extends('layout.v_template')
@section('headertitle')
@section('title','Detail Hardware')
<h3 style="margin:-0px;">
    @yield('title')
</h3>
@endsection
@section('content')
<div class="row">
	<div class="col col-sm-6">
		<div class="form-group">
			<a href="{{ url('hardware') }}" class="btn btn-primary"><i class="fa fa-chevron-circle-left fa-fw"></i>Kembali</a>
		</div>
	</div>
	@if (auth()->user()->level == 'Admin') 
	<div class="col col-sm-6">
		<div class="form-group">
			<a onclick="window.location='/hardware/edithw/{{$hardware->id_hw}}';" class="btn btn-warning pull-right"><i class="fa fa-edit fa-fw"></i>Edit</a>
		</div>
	</div>
	@endif
</div>

<div class="row">		
	<div class=" {{ ((($hardware->id_kategori_hw == '5')||($hardware->id_kategori_hw == '6')) ? 'col-md-6' : 'col-md-12') }}">
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
					<th>{{$hardware->nama_hw}} {{$hardware->nama_merk_hw}} {{$hardware->seri_hw}}</th>
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
					<td><span class="{{$hardware->text_kondisi}}">{{ $hardware->nama_kondisi }} <i class="fa {{$hardware->icon_kondisi}} fa-fw"></i></span></td>
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
	@if (($hardware->id_kategori_hw == '5')||($hardware->id_kategori_hw == '6'))
	<div class="col-md-6">
		<div class="box box-primary box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Daftar Software Terinstal</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="tbl_software" class="display table table-striped table-hover">
					<thead>
					  <tr>
						<th class="text-center">No</th>
						<th class="text-center">Nama Software</th>
						<th class="text-center">Versi</th>
					  </tr>
					</thead>
					<tbody>
					<?php $no=1; ?>
					@foreach ($software as $data)
						<tr style="cursor: pointer;">
							<td onclick="window.location='/software/detailsw/{{$data->id_sw}}/{{ $data->id_merk_hw }}';" data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
							  {{$no++}}
							</td>
							<td onclick="window.location='/software/detailsw/{{$data->id_sw}}/{{ $data->id_merk_hw }}';" data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
							  {{$data->nama_sw}}
							</td>
							<td onclick="window.location='/software/detailsw/{{$data->id_sw}}/{{ $data->id_merk_hw }}';" data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
							  {{ ($data->versi_sw == '' ? '-' :$data->versi_sw)}}
							</td>
						</tr>
					@endforeach
					</tbody>
				  </table>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>	
	@endif
</div>

<div class="row">
	<div class="col-md-3">
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
  <div class="col-md-3">
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
			<span class="h4 font-weight-bold mb-0">{{ date('d F Y', strtotime($hardware->tgl_batas_garansi)) }} <small style="color: red">
				 <br>{{ ($hardware->day_left == 0 ? 'Telah melebihi masa Batas Garansi' : $hardware->day_left.' Hari Tersisa')}}
			</small>
		</div>
	  </div>
	  <!-- /.box-body -->
	</div>
	<!-- /.box -->
	</div>
</div>
@endsection