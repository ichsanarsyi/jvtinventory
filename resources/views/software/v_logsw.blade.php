@extends('layout.v_template')
@section('headertitle')
@section('title','Riwayat Perubahan')
<h3 style="margin:-0px;">
    @yield('title')
</h3>
@endsection
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary box-solid">
		  <div class="box-header with-border">
			<h3 class="box-title">Log Software</h3>
			<!-- /.box-tools -->
		  </div>
		  <!-- /.box-header -->
		  <div class="box-body">
			<table id="tbl_log" class="display table order-column table-hover">
				<tfoot>
					<tr>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					</tr>
				  </tfoot>
				<thead>
					<tr>
						<th>No</th>
						<th>Waktu Ubah</th>
						<th>Nama Hardware</th>
						<th>Tgl Pembelian Lama</th>
						<th>Tgl Pembelian Baru</th>
						<th>Tgl Batas Lisensi Lama</th>
						<th>Tgl Batas Lisensi Baru</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; ?>
                    @foreach ($logsoftware as $data)
					<tr style="cursor: pointer;" onclick="window.location='/software/detailsw/{{$data->id_sw_lama}}';">
						<td>{{$no++}}</td>
                        <td>{{$data->waktu_ubah}}</td>
						<td>{{$data->nama_sw}}</td>
                        <td>{{$data->tgl_pembelian_lama}}</td>
                        <td>{{$data->tgl_pembelian_baru}}</td>
                        <td>{{$data->tgl_batas_lisensi_lama}}</td>
                        <td>{{$data->tgl_batas_lisensi_baru}}</td>                  
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		  <!-- /.box-body -->
		</div>
		<!-- /.box -->
	  </div>
</div>

<div class="row">
	<div class="col col-sm-6">
		<div class="form-group">
			<a href="{{ url('hardware') }}" class="btn btn-default"><i class="fa fa-chevron-circle-left fa-fw"></i>Kembali</a>
		</div>
	</div>
</div>
@endsection