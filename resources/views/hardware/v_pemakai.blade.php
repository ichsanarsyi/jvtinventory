@extends('layout.v_template')
@section('title','Pemakai Hardware')
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
          <table id="tbl_pemakai" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>ID Pemakai</th>
              <th>Nama Pemakai</th>
              <th>Nomor Telepon Pemakai</th>
              @if (auth()->user()->level == 'Admin') 
              <th>Aksi</th>
              @endif
              
            </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach ($pemakai as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->id_pemakai}}</td>
                    <td>{{$data->nama_pemakai}}</td>
                    <td>{{$data->no_telp_pemakai}}</td>
                    <td>
                        <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{ $data->id_pemakai }}"><i class="fa fa-edit fa-fw"></i>
                        Edit
                        </button>
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{ $data->id_pemakai }}"><i class="fa fa-trash fa-fw"></i>
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
          <h4 class="modal-title">Tambah Pemakai Hardware</h4>
        </div>
        <form action="/masterdata/pemakai/insertpemakai" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
            <div class="form-group">
                <label>Nama Pemakai</label>                                
                <input autofocus="autofocus" name="nama_pemakai" class="form-control" value="{{ old('nama_pemakai') }}">
                <div class="text-danger">
                    @error('nama_pemakai')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Nomor Telepon Pemakai</label>                                
                <input name="no_telp_pemakai" class="form-control" value="{{ old('no_telp_pemakai') }}">
                <div class="text-danger">
                    @error('no_telp_pemakai')
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
@foreach ($pemakai as $data)
<div class="modal fade" id="modal-edit{{ $data->id_pemakai }}">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Pemakai Hardware</h4>
        </div>
        <form action="/masterdata/pemakai/updatepemakai/{{ $data->id_pemakai }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
            <div class="form-group">
                <label>Nama Pemakai</label>                                
                <input autofocus="autofocus" name="nama_pemakai" class="form-control" value="{{ $data->nama_pemakai }}">
                <div class="text-danger">
                    @error('nama_pemakai')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Nomor Telepon Pemakai</label>                                
                <input name="no_telp_pemakai" class="form-control" value="{{ $data->no_telp_pemakai }}">
                <div class="text-danger">
                    @error('no_telp_pemakai')
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
@foreach($pemakai as $data)
    <div class="modal modal-danger fade" id="modal-delete{{ $data->id_pemakai }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus pemakai Hardware {{ $data->nama_pemakai }}</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus pemakai Hardware {{ $data->nama_pemakai }}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                    <a href="/masterdata/pemakai/deletepemakai/{{ $data->id_pemakai }}" class="btn btn-danger">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endforeach
@endsection