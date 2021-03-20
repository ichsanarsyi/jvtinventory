@extends('layout.v_template')
@section('headertitle')
@section('title','Kondisi Hardware')
<h3 style="margin:-0px;">
  @yield('title')
</h3>
@endsection
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
          <table id="tbl_kondisi" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>ID Kondisi Hardware</th>
              <th>Nama Kondisi Hardware</th>
              @if (auth()->user()->level == 'Admin') 
              <th>Aksi</th>
              @endif
              
            </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach ($kondisi as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->id_kondisi}}</td>
                    <td>{{$data->nama_kondisi}}</td>
                    @if (auth()->user()->level == 'Admin') 
                    <td>
                      <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{ $data->id_kondisi }}"><i class="fa fa-edit fa-fw"></i>
                        Edit
                      </button>
                      <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{ $data->id_kondisi }}"><i class="fa fa-trash fa-fw"></i>
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
          <h4 class="modal-title">Tambah Kondisi Hardware</h4>
        </div>
        <form action="/masterdata/kondisi/insertkondisi" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
            <div class="form-group">
                <label>Nama Kondisi Hardware</label>                                
                <input autofocus="autofocus" name="nama_kondisi" class="form-control" value="{{ old('nama_kondisi') }}">
                <div class="text-danger">
                    @error('nama_kondisi')
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
@foreach ($kondisi as $data)
<div class="modal fade" id="modal-edit{{ $data->id_kondisi }}">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Kondisi Hardware</h4>
        </div>
        <form action="/masterdata/kondisi/updatekondisi/{{ $data->id_kondisi }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
            <div class="form-group">
                <label>Nama Kondisi Hardware</label>                                
                <input autofocus="autofocus" name="nama_kondisi" class="form-control" value="{{ $data->nama_kondisi }}">
                <div class="text-danger">
                    @error('nama_kondisi')
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
@foreach($kondisi as $data)
    <div class="modal modal-danger fade" id="modal-delete{{ $data->id_kondisi }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Kondisi Hardware {{ $data->nama_kondisi }}</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus Kondisi Hardware {{ $data->nama_kondisi }}?</p>
                </div>
                <div class="modal-footer">
                  <a autofocus href="" data-dismiss="modal" class="btn btn-danger pull-left">Tidak</a>
                  <a href="/masterdata/kondisi/deletekondisi/{{ $data->id_kondisi }}" class="btn btn-danger">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endforeach
@endsection