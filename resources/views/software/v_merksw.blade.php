@extends('layout.v_template')
@section('title','Merk Software')
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
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus-circle fa-fw"></i>
            Tambah
            </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="tbl_merk_sw" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>ID Merk Software</th>
              <th>Nama Merk Software</th>
              <th>Aksi</th>
              
            </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach ($merksw as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->id_merk_sw}}</td>
                    <td>{{$data->nama_merk_sw}}</td>
                    <td>
                        <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{ $data->id_merk_sw }}"><i class="fa fa-edit fa-fw"></i>
                        Edit
                        </button>
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{ $data->id_merk_sw }}"><i class="fa fa-trash fa-fw"></i>
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

<!-- Modal Add -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Merk Software</h4>
        </div>
        <form autofocus="autofocus" action="/masterdata/merksw/insertmerksw" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
            <div class="form-group">
                <label>Nama Merk Software</label>                                
                <input name="nama_merk_sw" autofocus="autofocus" class="form-control" value="{{ old('nama_merk_sw') }}">
                <div class="text-danger">
                    @error('nama_merk_sw')
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

<!-- Modal Edit -->
@foreach ($merksw as $data)
<div class="modal fade" id="modal-edit{{ $data->id_merk_sw }}">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Merk Software</h4>
        </div>
        <form action="/masterdata/merksw/updatemerksw/{{ $data->id_merk_sw }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
            <div class="form-group">
                <label>Nama Merk Software</label>                                
                <input autofocus="autofocus" name="nama_merk_sw" class="form-control" value="{{ $data->nama_merk_sw }}">
                <div class="text-danger">
                    @error('nama_merk_sw')
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
@endforeach
  
<!-- Modal Delete -->
@foreach($merksw as $data)
    <div class="modal modal-danger fade" id="modal-delete{{ $data->id_merk_sw }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Merk Software {{ $data->nama_merk_sw }}</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus merk software {{ $data->nama_merk_sw }}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                    <a href="/masterdata/merksw/deletemerksw/{{ $data->id_merk_sw }}" class="btn btn-danger">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endforeach
@endsection