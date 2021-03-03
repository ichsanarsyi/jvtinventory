@extends('layout.v_template')
@section('title','Tambah Data Hardware')
@section('content')
	<div class="row">
        <div class="col-xs-12">
			<div class="box box-primary">
			<div class="box-header">
			<!-- /.box-header -->
            <div class="box-body">
				<form action="/hardware/inserthw" method="POST" enctype="multipart/form-data">
					@csrf
					
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Nama Hardware</label>
								<input name="nama_hw" class="form-control" value="{{ old('nama_hw') }}">
								<div class="text-danger">
									@error('nama_hw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Merk Hardware</label>
								<input name="merk_hw" class="form-control" value="{{ old('merk_hw') }}">
								<div class="text-danger">
									@error('merk_hw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Seri Hardware</label>
								<input name="seri_hw" class="form-control" value="{{ old('seri_hw') }}">
								<div class="text-danger">
									@error('seri_hw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Kategori</label>
								<select name="id_kategori_hw" class="form-control select2" style="width: 100%;">
									<option value="">{{ old('id_kategori_hw') }}</option>
									<option>Workstations</option>
									<option>Server</option>
									<option>Printer</option>
									<option>Sparepart</option>
									<option>Other</option>
								</select>
								<div class="text-danger">
									@error('id_kategori_hw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Harga</label>
								<div class="input-group">
									<div class="input-group-addon">
										<b>Rp</b>
									</div>
									<input name="harga_hw" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <=57" value="{{ old('harga_hw') }}">
								</div>								
								<div class="text-danger">
									@error('harga_hw')
										{{ $message }}
									@enderror
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Lokasi</label>
								<select name="lokasi" class="form-control select2" style="width: 100%;" >
									<option value="">{{ old('lokasi') }}</option>
									<option>R. Staf</option>
									<option>R. Tamu</option>
									<option>R. Security</option>
									<option>R. Server</option>
									<option>R. Dapur</option>
									<option>R. Gudang</option>
								</select>
								<div class="text-danger">
									@error('lokasi')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Departemen</label>
								<select name="departemen" class="form-control select2" style="width: 100%;">
									<option value="">{{ old('departemen') }}</option>
									<option>Infrastruktur</option>
									<option>Software</option>
									<option>Administrasi</option>
									<option>K3</option>
									<option>HRD</option>
								</select>
								<div class="text-danger">
									@error('departemen')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Tanggal Beli Hardware</label>
								<div class="input-group date">									
									<input name="tgl_beli_hw" type="text" class="form-control pull-right" id="datepicker1" value="{{ old('tgl_beli_hw') }}">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
								</div>
								<div class="text-danger">
									@error('tgl_beli_hw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Tanggal Batas Garansi</label>
								<div class="input-group date">									
									<input name="tgl_batas_garansi" type="text" class="form-control pull-right" id="datepicker2" value="{{ old('tgl_batas_garansi') }}">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
								</div>
								<div class="text-danger">
									@error('tgl_batas_garansi')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Pemakai</label>
								<select name="id_pemakai" class="form-control select2" style="width: 100%;">
									<option value="">{{ old('id_pemakai') }}</option>
									<option>1</option>
									<option>2</option>
								</select>
								<div class="text-danger">
									@error('id_pemakai')
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