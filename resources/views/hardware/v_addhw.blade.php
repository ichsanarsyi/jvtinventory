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
								<select name="id_merk_hw" class="form-control select2" style="width: 100%;">
									<option value="">{{ old('id_merk_hw') }}</option>
									@foreach ($hardware as $data)
										<option value="{{ $data->id_merk_hw }}">{{ $data->nama_merk_hw }}</option>
									@endforeach
								</select>
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
									@foreach ($hardware as $data)
										<option value="{{ $data->id_kategori_hw }}">{{ $data->nama_kategori_hw }}</option>
									@endforeach
								</select>
								<div class="text-danger">
									@error('id_kategori_hw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Kode Asset</label>
								<input name="kode_asset" class="form-control" value="{{ old('kode_asset') }}">
								<div class="text-danger">
									@error('kode_asset')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Kondisi</label>
								<select name="id_kondisi" class="form-control select2" style="width: 100%;">
									<option value="">{{ old('id_kondisi') }}</option>
									@foreach ($hardware as $data)
										<option value="{{ $data->id_kondisi }}">{{ $data->nama_kondisi }}</option>
									@endforeach
								</select>
								<div class="text-danger">
									@error('id_kategori_hw')
										{{ $message }}
									@enderror
								</div>
							</div>
						</div>
							<div class="col-sm-6">
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
							<div class="form-group">
								<label>Lokasi</label>
								<select name="id_lokasi" class="form-control select2" style="width: 100%;" >
									<option value="">{{ old('id_lokasi') }}</option>
									@foreach ($hardware as $data)
										<option value="{{ $data->id_lokasi }}">{{ $data->nama_lokasi }}</option>
									@endforeach
								</select>
								<div class="text-danger">
									@error('lokasi')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Departemen</label>
								<select name="id_departemen" class="form-control select2" style="width: 100%;">
									<option value="">{{ old('id_departemen') }}</option>
									@foreach ($hardware as $data)
										<option value="{{ $data->id_departemen }}">{{ $data->nama_departemen }}</option>
									@endforeach
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
									@foreach ($hardware as $data)
										<option value="{{ $data->id_pemakai }}">{{ $data->nama_pemakai }}</option>
									@endforeach
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