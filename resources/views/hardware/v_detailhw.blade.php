@extends('layout.v_template')
@section('title','Detail Hardware')
@section('content')
    <div class="row">
        <div class="col-xs-12">
			<div class="box box-primary">
			<div class="box-header">
				<a href="{{ redirect()->getUrlGenerator()->previous() }}" class="btn btn-xs btn-primary">
					<i class="fa fa-chevron-circle-left fa-fw"></i>
					Kembali
				</a>
			<!-- /.box-header -->
            <div class="box-body">
				<table class="table table-hover">
					<tr>
						<th width="200px">Nama Hardware</th>
						<th width="20px">:</th>
						<th>{{ $hardware->nama_hw }}</th>
					</tr>
					<tr>
						<th width="200px">Merk Hardware</th>
						<th width="20px">:</th>
						<th>{{ $hardware->merk_hw }}</th>
					</tr>
					<tr>
						<th width="200px">Seri Hardware</th>
						<th width="20px">:</th>
						<th>{{ $hardware->seri_hw }}</th>
					</tr>
					<tr>
						<th width="200px">Kategori</th>
						<th width="20px">:</th>
						<th>{{ $hardware->kategori }}</th>
					</tr>
					<tr>
						<th width="200px">Harga</th>
						<th width="20px">:</th>
						<th>@currency($hardware->harga_hw)</th>
					</tr>
					<tr>
						<th width="200px">Lokasi</th>
						<th width="20px">:</th>
						<th>{{ $hardware->lokasi }}</th>
					</tr>
					<tr>
						<th width="200px">Departemen</th>
						<th width="20px">:</th>
						<th>{{ $hardware->departemen }}</th>
					</tr>
					<tr>
						<th width="200px">Tanggal Beli</th>
						<th width="20px">:</th>
						<th>{{ $hardware->tgl_beli_hw }}</th>
					</tr>
					<tr>
						<th width="200px">Tanggal Batas Garansi</th>
						<th width="20px">:</th>
						<th>{{ $hardware->tgl_batas_garansi }}</th>
					</tr>
					<tr>
						<th width="200px">Pemakai</th>
						<th width="20px">:</th>
						<th>{{ $hardware->id_pemakai }}</th>
					</tr>
				</table>
			</div>
			</div>
			</div>
		</div>
	</div>
@endsection