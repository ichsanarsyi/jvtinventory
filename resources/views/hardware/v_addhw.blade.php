@extends('layout.v_template')
@section('headertitle')
@section('title','Tambah Data Hardware')
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
				<form action="/hardware/inserthw" method="POST" enctype="multipart/form-data">
					@csrf
					
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Nama Hardware<span style="color:red;">*</span></label>
								<input autofocus name="nama_hw" class="form-control" value="{{ old('nama_hw') }}">
								<div class="text-danger">
									@error('nama_hw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Merk Hardware<span style="color:red;">*</span></label>
								<div class="row">
									<div class="form-group">
										<div class="col-sm-11">
										<select name="id_merk_hw" class="form-control select2" style="width: 100%;">
											<option value="">{{ old('id_merk_hw') }}</option>
											@foreach ($merk as $data)
												<option value="{{ $data->id_merk_hw }}">{{ $data->nama_merk_hw }}</option>
											@endforeach
										</select>
										</div>
										<div class="col-sm-1">
										<button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus-circle fa-fw"></i></button>
										</div>
									</div>
								</div>
								<div class="text-danger">
									@error('id_merk_hw')
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
								<label>Kategori<span style="color:red;">*</span></label>
								<select name="id_kategori_hw" class="form-control select2" style="width: 100%;">
									<option value="">{{ old('id_kategori_hw') }}</option>
									@foreach ($kategori as $data)
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
									@foreach ($kondisi as $data)
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
									<input name="harga_hw" class="form-control uang" onkeypress="return event.charCode >= 48 && event.charCode <=57" value="{{ old('harga_hw') }}">
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
									@foreach ($lokasi as $data)
										<option value="{{ $data->id_lokasi }}">{{ $data->nama_lokasi }}</option>
									@endforeach
								</select>
								<div class="text-danger">
									@error('id_lokasi')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Departemen</label>
								<select name="id_departemen" class="form-control select2" style="width: 100%;">
									<option value="">{{ old('id_departemen') }}</option>
									@foreach ($departemen as $data)
										<option value="{{ $data->id_departemen }}">{{ $data->nama_departemen }}</option>
									@endforeach
								</select>
								<div class="text-danger">
									@error('id_departemen')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Tanggal Beli Hardware<span style="color:red;">*</span></label>
								<div class="input-group date">									
									<input autocomplete="off" name="tgl_beli_hw" type="text" class="form-control pull-right" id="datepicker1" value="{{ old('tgl_beli_hw') }}">
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
								<label>Tanggal Batas Garansi<span style="color:red;">*</span></label>
								<div class="input-group date">									
									<input autocomplete="off" name="tgl_batas_garansi" type="text" class="form-control pull-right" id="datepicker2" value="{{ old('tgl_batas_garansi') }}">
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
								<label>Staff<span style="color:red;">*</span></label>
								<select name="id_staff" class="form-control select2" style="width: 100%;">
									<option value="">{{ old('id_staff') }}</option>
									@foreach ($staff as $data)
										<option value="{{ $data->id_staff }}">{{ $data->nama_staff }}</option>
									@endforeach
								</select>
								<div class="text-danger">
									@error('id_staff')
										{{ $message }}
									@enderror
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-success pull-right"><i class="fa fa-save fa-fw"></i>Simpan</button>
							<a href="{{ url('hardware') }}" class="btn btn-default"><i class="fa fa-chevron-circle-left fa-fw"></i>Kembali</a>
						</div>
					</div>
					
				</form>
			</div>
			</div>
			</div>
		</div>
	</div>

	<!-- Modal Merk Add -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Merk Hardware</h4>
        </div>
        <form action="/hardware/addhw/insertmerkinhw" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
            <div class="form-group">
                <label>Nama Merk Hardware</label>                                
                <input autofocus="autofocus" name="nama_merk_hw" class="form-control" value="{{ old('nama_merk_hw') }}">
                <div class="text-danger">
                    @error('nama_merk_hw')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->  
@endsection