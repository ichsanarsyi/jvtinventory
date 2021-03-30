@extends('layout.v_template')
@section('headertitle')
@section('title','Tambah Data Software')
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
				<form action="/software/insertsw" method="POST" enctype="multipart/form-data">
					@csrf					
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Merk Software<span style="color:red;">*</span></label>
								<div class="row">
									<div class="form-group">
										<div class="col-sm-11">
											<select name="id_merk_sw" class="form-control select2" style="width: 100%;">
												<option value="{{ old('id_merk_sw') }}"></option>
												@foreach ($merk as $data)
													<option value="{{ $data->id_merk_sw }}"  {{ (old('id_merk_sw') == $data->id_merk_sw ? 'selected="selected"' : '') }}>{{ $data->nama_merk_sw }}</option>
												@endforeach
											</select>
										</div>
										<div class="col-sm-1">
											<button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-add"  data-toggle="tooltip" data-placement="top" title="Tambah Merk Software"><i class="fa fa-plus-circle fa-fw"></i></button>
										</div>
									</div>
								</div>							
								<div class="text-danger">
									@error('id_merk_sw')
										{{ $message }}
									@enderror
								</div>
								<div class="text-danger">
									@error('nama_merk_sw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Nama Software<span style="color:red;">*</span></label>                                
								<input name="nama_sw" class="form-control" value="{{ old('nama_sw') }}">
								<div class="text-danger">
									@error('nama_sw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Jenis Lisensi<span style="color:red;">*</span></label>
                                <select id="lisensi" name="id_jenis_lisensi" class="form-control select2" style="width: 100%;">
									<option value="{{ old('id_jenis_lisensi') }}"></option>
									@foreach ($lisensi as $data)
										<option value="{{ $data->id_jenis_lisensi }}"  {{ (old('id_jenis_lisensi') == $data->id_jenis_lisensi ? 'selected="selected"' : '') }}>{{ $data->jenis_lisensi }}</option>
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
									<input name="tgl_batas_lisensi" type="text" class="form-control pull-right" id="datepicker2" value="{{ old('tgl_batas_lisensi') }}" >
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
									<input name="harga_sw" class="form-control uang" onkeypress="return event.charCode >= 48 && event.charCode <=57" value="{{ old('harga_sw') }}">
								</div>
								<div class="text-danger">
									@error('harga_sw')
										{{ $message }}
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Kode Lisensi</label>
								<input name="kode_lisensi" class="form-control" value="{{ old('kode_lisensi') }}">
								<div class="text-danger">
									@error('kode_lisensi')
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
							<div class="form-group">
								<label>Nama Hardware</label>
                                <select name="id_hw" class="form-control select2" style="width: 100%;">
									<option value="{{ old('id_hw') }}"></option>
									@foreach ($hardware as $data)
										<option value="{{$data->id_hw}}"  {{ (old('id_hw') == $data->id_hw ? 'selected="selected"' : '') }}>{{ $data->nama_hw }} {{$data->nama_merk_hw}} {{$data->seri_hw}}</option>
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
								<a href="{{ url('software') }}" class="btn btn-default"><i class="fa fa-chevron-circle-left fa-fw"></i>Kembali</a>
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
					<h4 class="modal-title">Tambah Merk Software</h4>
				</div>
				<form action="{{ Route('insertmerkinsw') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">            
					<div class="form-group">
						<label>Nama Merk Software</label>                                
						<input autofocus="autofocus" name="nama_merk_sw" class="form-control" value="{{ old('nama_merk_sw') }}">
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