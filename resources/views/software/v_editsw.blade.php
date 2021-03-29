@extends('layout.v_template')
@section('headertitle')
@section('title','Edit Data Software')
	<h3 style="margin:-0px;">
		@yield('title')
  	</h3>
@endsection
@section('content')
	<div class="row">
        <div class="col-xs-12">
			<div class="box box-primary">
			<div class="box-header">
			<!-- /.box-header -->
            <div class="box-body">
				<form action="/software/updatesw/{{ $software->id_sw }}" method="POST" enctype="multipart/form-data">
					@csrf					
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Nama Software<span style="color:red;">*</span></label>                                
								<input name="nama_sw" class="form-control" value="{{ $software->nama_sw }}">
								<div class="text-danger">
									@error('nama_sw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Merk Software</label>
                                <select name="id_merk_sw" class="form-control select2" style="width: 100%;">
									@foreach ($merk as $data)
										<option value="{{ $data->id_merk_sw }}"{{ ($software->id_merk_sw == $data->id_merk_sw ? 'selected="selected"' :'')}}>{{ $data->nama_merk_sw }}</option>
									@endforeach
								</select>								
								<div class="text-danger">
									@error('id_merk_sw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Jenis Lisensi<span style="color:red;">*</span></label>
                                <select id="lisensi" name="id_jenis_lisensi" class="form-control select2" style="width: 100%;">
									@foreach ($lisensi as $data)
										<option value="{{ $data->id_jenis_lisensi }}"{{ ($software->id_jenis_lisensi == $data->id_jenis_lisensi ? 'selected="selected"' :'')}}>{{ $data->jenis_lisensi }}</option>
									@endforeach
								</select>
								<div class="text-danger">
									@error('id_jenis_lisensi')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Tanggal Pembelian</label>
                                <div class="input-group date">									
									<input name="tgl_pembelian" type="text" class="form-control pull-right" id="datepicker1" value="{{ $software->tgl_pembelian }}">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
								</div>
								<div class="text-danger">
									@error('tgl_pembelian')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Tanggal Batas Lisensi</label>
								<div class="input-group date">									
									<input name="tgl_batas_lisensi" type="text" class="form-control pull-right" id="datepicker2" value="{{ $software->tgl_batas_lisensi }}">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
								</div>								
								<div class="text-danger">
									@error('tgl_batas_lisensi')
										{{ $message }}
									@enderror
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Harga Software</label>
								<div class="input-group">
									<div class="input-group-addon">
										<b>Rp</b>
									</div>
									<input name="harga_sw" class="form-control uang" onkeypress="return event.charCode >= 48 && event.charCode <=57" value="{{ $software->harga_sw }}">
								</div>
								<div class="text-danger">
									@error('harga_sw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Kode Lisensi</label>
								<input name="kode_lisensi" class="form-control" value="{{ $software->kode_lisensi }}">
								<div class="text-danger">
									@error('kode_lisensi')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<input name="deskripsi_sw" class="form-control" value="{{ $software->deskripsi_sw }}">
								<div class="text-danger">
									@error('deskripsi_sw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Versi Software</label>
								<input name="versi_sw" class="form-control" value="{{ $software->versi_sw }}">
								<div class="text-danger">
									@error('versi_sw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Nama Hardware</label>
                                <select name="id_hw" class="form-control select2" style="width: 100%;">
									@foreach ($hardware as $data)
										<option value="{{ $data->id_hw }}"{{ ($software->id_hw == $data->id_hw ? 'selected="selected"' :'')}}>{{ $data->nama_hw }}</option>
									@endforeach
								</select>
								<div class="text-danger">
									@error('id_hw')
										{{ $message }}
									@enderror
								</div>
							</div>
							
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-12">
								<a href="{{ redirect()->getUrlGenerator()->previous() }}" class="btn btn-primary"><i class="fa fa-chevron-circle-left fa-fw"></i>Kembali</a>
								<button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-fw"></i>Simpan</button>
						</div>
					</div>
					
				</form>
			</div>
			</div>
			</div>
		</div>
	</div>
@endsection