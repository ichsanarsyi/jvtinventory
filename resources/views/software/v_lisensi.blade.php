@extends('layout.v_template')
@section('title','Lisensi Software')
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
          <table id="tbl_jenis_lisensi" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>ID Jenis Lisensi</th>
              <th>Jenis Lisensi</th>
              @if (auth()->user()->level == 'Admin') 
              <th>Aksi</th>
              @endif
              
            </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach ($lisensi as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->id_jenis_lisensi}}</td>
                    <td>{{$data->jenis_lisensi}}</td>
                    @if (auth()->user()->level == 'Admin') 
                    <td>
                      <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{ $data->id_jenis_lisensi }}"><i class="fa fa-edit fa-fw"></i>
                        Edit
                      </button>
                      <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{ $data->id_jenis_lisensi }}"><i class="fa fa-trash fa-fw"></i>
                        Delete
                      </button>
                    </td>
                    @endif
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
          <h4 class="modal-title">Tambah Jenis Lisensi</h4>
        </div>
        <form action="/masterdata/lisensisw/insertlisensi" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
            <div class="form-group">
                <label>Jenis Lisensi</label>                                
                <input name="jenis_lisensi" class="form-control" value="{{ old('jenis_lisensi') }}">
                <div class="text-danger">
                    @error('jenis_lisensi')
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
@foreach ($lisensi as $data)
<div class="modal fade" id="modal-edit{{ $data->id_jenis_lisensi }}">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Jenis Lisensi</h4>
        </div>
        <form action="/masterdata/lisensisw/updatelisensi/{{ $data->id_jenis_lisensi }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
            <div class="form-group">
                <label>Jenis Lisensi</label>                                
                <input name="jenis_lisensi" class="form-control" value="{{ $data->jenis_lisensi }}">
                <div class="text-danger">
                    @error('jenis_lisensi')
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
@foreach($lisensi as $data)
    <div class="modal modal-danger fade" id="modal-delete{{ $data->id_jenis_lisensi }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Jenis Lisensi {{ $data->jenis_lisensi }}</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus jenis lisensi {{ $data->jenis_lisensi }}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                    <a href="/masterdata/lisensisw/deletelisensi/{{ $data->id_jenis_lisensi }}" class="btn btn-danger">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endforeach
@endsection