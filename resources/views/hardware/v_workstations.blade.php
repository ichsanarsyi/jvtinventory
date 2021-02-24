@extends('layout.v_template')
@section('title','Workstations')
@section('content')
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <a href="/hardware/addhw/" class="btn btn-xs btn-primary"><i class="fa fa-plus-circle fa-fw"></i>Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tbl_hardware" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Hardware</th>
                  <th>Merk Hardware</th>
                  <th>Seri Hardware</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php $no=1; ?>
				@foreach ($workstations as $data)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$data->nama_hw}}</td>
						<td>{{$data->merk_hw}}</td>
						<td>{{$data->seri_hw}}</td>
						<td>
							<a href="/hardware/detailhw/{{ $data->id_hw }}" class="btn btn-xs btn-primary"><i class="fa fa-info-circle fa-fw"></i>Detail</a>
							<a href="#" class="btn btn-xs btn-warning"><i class="fa fa-edit fa-fw"></i>Edit</a>
							<a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash fa-fw"></i>Delete</a>
						</td>
					</tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Hardware</th>
                  <th>Merk Hardware</th>
                  <th>Seri Hardware</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection