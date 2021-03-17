@extends('layout.v_template')
@section('title','Departemen Hardware')
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
          <table id="tbl_departemen" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>ID Departemen</th>
              <th>Nama Departemen</th>
              @if (auth()->user()->level == 'Admin') 
              <th>Aksi</th>
              @endif
              
            </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach ($departemen as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->id_departemen}}</td>
                    <td>{{$data->nama_departemen}}</td>
                    <td>
                      <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{ $data->id_departemen }}"><i class="fa fa-edit fa-fw"></i>
                        Edit
                      </button>
                      <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{ $data->id_departemen }}"><i class="fa fa-trash fa-fw"></i>
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
          <h4 class="modal-title">Tambah Merk Hardware</h4>
        </div>
        <form action="/masterdata/departemen/insertdepartemen" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
            <div class="form-group">
                <label>Nama Merk Hardware</label>                                
                <input autofocus="autofocus" name="nama_departemen" class="form-control" value="{{ old('nama_departemen') }}">
                <div class="text-danger">
                    @error('nama_departemen')
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
@foreach ($departemen as $data)
<div class="modal fade" id="modal-edit{{ $data->id_departemen }}">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Merk Hardware</h4>
        </div>
        <form action="/masterdata/departemen/updatedepartemen/{{ $data->id_departemen }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
            <div class="form-group">
                <label>Nama Merk Hardware</label>                                
                <input autofocus="autofocus" name="nama_departemen" class="form-control" value="{{ $data->nama_departemen }}">
                <div class="text-danger">
                    @error('nama_departemen')
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
@foreach($departemen as $data)
    <div class="modal modal-danger fade" id="modal-delete{{ $data->id_departemen }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Merk Hardware {{ $data->nama_departemen }}</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus merk Hardware {{ $data->nama_departemen }}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                    <a href="/masterdata/departemen/deletedepartemen/{{ $data->id_departemen }}" class="btn btn-danger">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endforeach
@endsection