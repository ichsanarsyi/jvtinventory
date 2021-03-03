@extends('layout.v_template')
@section('title','All Software')
@section('content')
<div class="row">
    <div class="col-xs-12">
        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            {{ session('pesan') }}
        </div>
        @endif
      <div class="box box-primary">
        <div class="box-header">
            <a href="/software/addsw/" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle fa-fw"></i>Tambah</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="tbl_software" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Software</th>
              <th>Merk</th>
              <th>Jenis Lisensi</th>
              <th>Versi</th>
              <th>Aksi</th>
              
            </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach ($software as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->nama_sw}}</td>
                    <td>{{$data->id_merk_sw}}</td>
                    <td>{{$data->id_jenis_lisensi}}</td>
                    <td>{{$data->versi_sw}}</td>
                    <td>
                        <a href="/software/detailsw/{{ $data->id_sw }}" class="btn btn-xs btn-primary"><i class="fa fa-info-circle fa-fw"></i>Detail</a>
                        <a href="/software/editsw/{{ $data->id_sw }}" class="btn btn-xs btn-warning"><i class="fa fa-edit fa-fw"></i>Edit</a>
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{ $data->id_sw }}"><i class="fa fa-trash fa-fw"></i>
                        Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
@foreach($software as $data)
    <div class="modal modal-danger fade" id="modal-delete{{ $data->id_sw }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Data {{ $data->nama_sw }}</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data {{ $data->nama_sw }}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                    <a href="/software/deletesw/{{ $data->id_sw }}" class="btn btn-danger">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endforeach
@endsection