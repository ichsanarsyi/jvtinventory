@extends('layout.v_template')
@section('title','staff Hardware')
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus-circle fa-fw"></i>
            Tambah
            </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="tbl_staff" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>ID Staff</th>
              <th>Nama Staff</th>
              <th>Nomor Telepon Staff</th>
              @if (auth()->user()->level == 'Admin') 
              <th>Aksi</th>
              @endif
              
            </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach ($staff as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->id_staff}}</td>
                    <td>{{$data->nama_staff}}</td>
                    <td>{{$data->no_telp_staff}}</td>
                    @if (auth()->user()->level == 'Admin') 
                    <td>
                      <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{ $data->id_staff }}"><i class="fa fa-edit fa-fw"></i>
                        Edit
                      </button>
                      <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{ $data->id_staff }}"><i class="fa fa-trash fa-fw"></i>
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
          <h4 class="modal-title">Tambah Staff Hardware</h4>
        </div>
        <form action="/masterdata/staff/insertstaff" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
            <div class="form-group">
                <label>Nama Staff</label>                                
                <input autofocus="autofocus" name="nama_staff" class="form-control" value="{{ old('nama_staff') }}">
                <div class="text-danger">
                    @error('nama_staff')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Nomor Telepon Staff</label>                                
                <input name="no_telp_staff" class="form-control" value="{{ old('no_telp_staff') }}">
                <div class="text-danger">
                    @error('no_telp_staff')
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
@foreach ($staff as $data)
<div class="modal fade" id="modal-edit{{ $data->id_staff }}">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit staff Hardware</h4>
        </div>
        <form action="/masterdata/staff/updatestaff/{{ $data->id_staff }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
            <div class="form-group">
                <label>Nama staff</label>                                
                <input autofocus="autofocus" name="nama_staff" class="form-control" value="{{ $data->nama_staff }}">
                <div class="text-danger">
                    @error('nama_staff')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Nomor Telepon staff</label>                                
                <input name="no_telp_staff" class="form-control" value="{{ $data->no_telp_staff }}">
                <div class="text-danger">
                    @error('no_telp_staff')
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
@foreach($staff as $data)
    <div class="modal modal-danger fade" id="modal-delete{{ $data->id_staff }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus staff Hardware {{ $data->nama_staff }}</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus staff Hardware {{ $data->nama_staff }}?</p>
                </div>
                <div class="modal-footer">
                  <a autofocus href="" data-dismiss="modal" class="btn btn-danger pull-left">Tidak</a>
                  <a href="/masterdata/staff/deletestaff/{{ $data->id_staff }}" class="btn btn-danger">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endforeach
@endsection