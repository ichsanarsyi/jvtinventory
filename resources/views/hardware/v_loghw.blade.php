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
            <a href="/hardware/saveexcel/" target="_blank" class="btn btn-xs btn-default pull-right">
                <i class="fa fa-file-excel-o fa-fw"></i>
                Simpan sebagai Excel
            </a>
            <a href="/hardware/savepdf/" target="_blank" class="btn btn-xs btn-default pull-right">
                <i class="fa fa-file-pdf-o fa-fw"></i>
                Simpan sebagai PDF
            </a>
            <a href="/hardware/print/" target="_blank" class="btn btn-xs btn-default pull-right">
                <i class="fa fa-print fa-fw"></i>
                Print
            </a>
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
						<th class="text-center">No</th>
						<th class="text-center">Waktu Ubah</th>
						<th class="text-center">Nama Hardware</th>
						<th class="text-center">Kode Asset</th>
						<th class="text-center">Lokasi Lama</th>
						<th class="text-center">Lokasi Baru</th>
						<th class="text-center">Departemen<br>Lama</th>
						<th class="text-center">Departemen<br>Baru</th>
						<th class="text-center">Tgl Batas<br>Garansi Lama</th>
						<th class="text-center">Tgl Batas<br>Garansi Baru</th>
						<th class="text-center">Staff Lama</th>
						<th class="text-center">Staff Baru</th>
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