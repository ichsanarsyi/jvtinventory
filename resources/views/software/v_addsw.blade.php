@extends('layout.v_template')
@section('title','Tambah Data Software')
@section('content')
	<div class="row">
        <div class="col-xs-12">
			<div class="box box-primary">
			<div class="box-header">
			<!-- /.box-header -->
            <div class="box-body">
				<form action="/software/insertsw" method="POST" enctype="multipart/form-data">
					@csrf
					
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Nama Software</label>                                
								<input name="nama_sw" class="form-control" value="{{ old('nama_sw') }}">
								<div class="text-danger">
									@error('nama_sw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Merk Software</label>
                                <select name="id_merk_sw" class="form-control select2" style="width: 100%;">
									<option value="">{{ old('id_merk_sw') }}</option>
									<option>1</option>
									<option>2</option>
								</select>								
								<div class="text-danger">
									@error('id_merk_sw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Jenis Lisensi</label>
                                <select name="id_jenis_lisensi" class="form-control select2" style="width: 100%;">
									<option value="">{{ old('id_jenis_lisensi') }}</option>
									<option>1</option>
									<option>2</option>
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
									<input name="tgl_pembelian" type="text" class="form-control pull-right" id="datepicker1" value="{{ old('tgl_pembelian') }}">
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
									<input name="tgl_batas_lisensi" type="text" class="form-control pull-right" id="datepicker2" value="{{ old('tgl_batas_lisensi') }}">
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
									<input name="harga_sw" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <=57" value="{{ old('harga_sw') }}">
								</div>
								<div class="text-danger">
									@error('harga_sw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Dokumen Lisensi</label>
								<input name="doc_lisensi" class="form-control" value="{{ old('doc_lisensi') }}">
								<div class="text-danger">
									@error('doc_lisensi')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<input name="deskripsi_sw" class="form-control" value="{{ old('deskripsi_sw') }}">
								<div class="text-danger">
									@error('deskripsi_sw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Versi Software</label>
								<input name="versi_sw" class="form-control" value="{{ old('versi_sw') }}">
								<div class="text-danger">
									@error('versi_sw')
										{{ $message }}
									@enderror
								</div>
							</div>
							
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-12">
								<a href="{{ redirect()->getUrlGenerator()->previous() }}" class="btn btn-default"><i class="fa fa-chevron-circle-left fa-fw"></i>Kembali</a>
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