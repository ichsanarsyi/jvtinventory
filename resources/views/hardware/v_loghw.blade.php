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
			<h3 class="box-title">Log Hardware</h3>
			<!-- /.box-tools -->
		  </div>
		  <!-- /.box-header -->
		  <div class="box-body" style="overflow: auto;">
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
						<th>Kode Asset</th>
						<th>Lokasi Lama</th>
						<th>Lokasi Baru</th>
						<th>Departemen<br>Lama</th>
						<th>Departemen<br>Baru</th>
						<th>Tgl Batas<br>Garansi Lama</th>
						<th>Tgl Batas<br>Garansi Baru</th>
						<th>Staff Lama</th>
						<th>Staff Baru</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; ?>
                    @foreach ($loghardware as $results)
					<tr style="cursor: pointer;" onclick="window.location='/hardware/detailhw/{{$results['id_hw_lama']}}';" data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                        <td>{{$no++}}</td>
                        <td>{{ date('d M Y - h:i:s', strtotime($results['waktu_ubah'])) }}</td>
						<td>{{$results['nama_hw']}} {{$results['nama_merk_hw']}} {{$results['seri_hw']}}</td>
						<td>{{$results['kode_asset']}}</td>
						<td>{{$results['nama_lokasi_lama']}}</td>
						<td>{{$results['nama_lokasi_baru']}}</td>
						<td>{{$results['nama_departemen_lama']}}</td>
						<td>{{$results['nama_departemen_baru']}}</td>
						<td>{{ date('d M Y', strtotime($results['tgl_batas_garansi_lama'])) }}</td>
						<td>{{ date('d M Y', strtotime($results['tgl_batas_garansi_baru'])) }}</td>
						<td>{{$results['nama_staff_lama']}}</td>
						<td>{{$results['nama_staff_baru']}}</td>                        
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