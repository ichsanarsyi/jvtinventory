@extends('layout.v_template')
@section('headertitle')
@section('title','Edit Data Hardware')
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
				<form id="formedit" action="/hardware/updatehw/{{ $hardware->id_hw }}" method="POST" enctype="multipart/form-data">
					@csrf
					
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Nama Hardware<span style="color:red;">*</span></label>
								<input name="nama_hw" class="form-control" value="{{ $hardware->nama_hw }}">
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
													<option selected value="">- Tidak Dipilih -</option>
													@foreach ($merk as $data)
														<option value="{{ $data->id_merk_hw }}"{{ ($hardware->id_merk_hw == $data->id_merk_hw ? 'selected="selected"' :'')}}>{{ $data->nama_merk_hw }}</option>
													@endforeach
												</select>
											</div>
											<div class="col-sm-1">
											<button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus-circle fa-fw"></i></button>
											</div>
										</div>
									</div>
							</div>
							<div class="form-group">
								<label>Seri Hardware</label>
								<input name="seri_hw" class="form-control" value="{{ $hardware->seri_hw }}">
								<div class="text-danger">
									@error('seri_hw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Kategori<span style="color:red;">*</span></label>
								<select name="id_kategori_hw" class="form-control select2" style="width: 100%;">
									<option selected disabled value="">Pilih Kategori</option>
									@foreach ($kategori as $data)
										<option value="{{ $data->id_kategori_hw }}"{{ ($hardware->id_kategori_hw == $data->id_kategori_hw ? 'selected="selected"' :'')}}>{{ $data->nama_kategori_hw }}</option>
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
								<input name="kode_asset" class="form-control" value="{{ $hardware->kode_asset }}">
								<div class="text-danger">
									@error('kode_asset')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Kondisi</label>
								<select name="id_kondisi" class="form-control select2" style="width: 100%;">
									@foreach ($kondisi as $data)
										<option value="{{ $data->id_kondisi }}"{{ ($hardware->id_kondisi == $data->id_kondisi ? 'selected="selected"' :'')}}>{{ $data->nama_kondisi }}</option>
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
									<input name="harga_hw" class="form-control uang" onkeypress="return event.charCode >= 48 && event.charCode <=57" value="{{ $hardware->harga_hw }}">
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
									@foreach ($lokasi as $data)
										<option value="{{ $data->id_lokasi }}"{{ ($hardware->id_lokasi == $data->id_lokasi ? 'selected="selected"' :'')}}>{{ $data->nama_lokasi }}</option>
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
									@foreach ($departemen as $data)
										<option value="{{ $data->id_departemen }}"{{ ($hardware->id_departemen == $data->id_departemen ? 'selected="selected"' :'')}}>{{ $data->nama_departemen }}</option>
									@endforeach
								</select>
								<div class="text-danger">
									@error('departemen')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Tanggal Beli Hardware<span style="color:red;">*</span></label>
								<div class="input-group date">									
									<input name="tgl_beli_hw" type="text" class="form-control pull-right" id="datepicker1" value="{{ $hardware->tgl_beli_hw }}">
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
									<input name="tgl_batas_garansi" type="text" class="form-control pull-right" id="datepicker2" value="{{ $hardware->tgl_batas_garansi }}">
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
								<label>Staff</label>
								<select name="id_staff" class="form-control select2" style="width: 100%;">
									@foreach ($staff as $data)
										<option value="{{ $data->id_staff }}"{{ ($hardware->id_staff == $data->id_staff ? 'selected="selected"' :'')}}>{{ $data->nama_staff }}</option>
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

	
	<!-- Modal Merk Add -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Merk Hardware</h4>
        </div>
        <form action="insertmerkinhw/" method="POST" enctype="multipart/form-data">
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