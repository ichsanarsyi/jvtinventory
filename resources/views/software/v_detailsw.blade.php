@extends('layout.v_template')
@section('title','Detail Software')
@section('content')
    <div class="row">
        <div class="col-xs-12">
			<div class="box box-primary">
			<div class="box-header">

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
						<th width="200px">Tanggal Pembelian</th>
						<th width="20px">:</th>
						<th>{{ date('D, d M Y', strtotime($software->tgl_pembelian)) }}</th>
					</tr>
                    <tr>
						<th width="200px">Tanggal Batas Lisensi</th>
						<th width="20px">:</th>
						<th>{{ date('D, d M Y', strtotime($software->tgl_batas_lisensi)) }}</th>
					</tr>
                    <tr>
						<th width="200px">Harga Software</th>
						<th width="20px">:</th>
						<th>@currency($software->harga_sw)</th>
					</tr>
                    <tr>
						<th width="200px">Kode Lisensi</th>
						<th width="20px">:</th>
						<th>{{ $software->kode_lisensi }}</th>
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
			<div class="col col-sm-6">
				<div class="form-group">
					<a href="{{ url('software') }}" class="btn btn-default"><i class="fa fa-chevron-circle-left fa-fw"></i>Kembali</a>
				</div>
			</div>
			</div>
			</div>
		</div>
	</div>
@endsection