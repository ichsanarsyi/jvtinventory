@extends('layout.v_template')
@section('title','Lokasi Hardware')
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
          <table id="tbl_lokasi" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>ID Lokasi</th>
              <th>Asal Departemen</th>
              <th>Nama Lokasi</th>
              @if (auth()->user()->level == 'Admin') 
              <th>Aksi</th>
              @endif
              
            </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach ($lokasi as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->id_lokasi}}</td>
                    <td>{{$data->nama_departemen}}</td>
                    <td>{{$data->nama_lokasi}}</td>
                    @if (auth()->user()->level == 'Admin') 
                    <td>
                      <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{ $data->id_lokasi }}"><i class="fa fa-edit fa-fw"></i>
                        Edit
                      </button>
                      <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{ $data->id_lokasi }}"><i class="fa fa-trash fa-fw"></i>
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
          <h4 class="modal-title">Tambah Lokasi Hardware</h4>
        </div>
        <form action="/masterdata/lokasi/insertlokasi" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
          <div class="form-group">
            <div class="form-group">
                  <label>Nama Lokasi Hardware</label>                                
                  <input autofocus="autofocus" name="nama_lokasi" class="form-control" value="{{ old('nama_lokasi') }}">
                  <div class="text-danger">
                      @error('nama_lokasi')
                          {{ $message }}
                      @enderror
                  </div>
              </div>
          </div>
            <label>Departemen</label>
            <select name="id_departemen" class="form-control select2" style="width: 100%;">
              <option value="">{{ old('id_departemen') }}</option>
              @foreach ($departemen as $data)
                <option value="{{ $data->id_departemen }}">{{ $data->nama_departemen }}</option>
              @endforeach
            </select>
            <div class="text-danger">
              @error('departemen')
                {{ $message }}
              @enderror
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
@foreach ($lokasi as $data)
<div class="modal fade" id="modal-edit{{ $data->id_lokasi }}">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Lokasi Hardware</h4>
        </div>
        <form action="/masterdata/lokasi/updatelokasi/{{ $data->id_lokasi }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
            <div class="form-group">
                <label>Nama Lokasi Hardware</label>                                
                <input autofocus="autofocus" name="nama_lokasi" class="form-control" value="{{ $data->nama_lokasi }}">
                <div class="text-danger">
                    @error('nama_lokasi')
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
@foreach($lokasi as $data)
    <div class="modal modal-danger fade" id="modal-delete{{ $data->id_lokasi }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Lokasi Hardware {{ $data->nama_lokasi }}</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus Lokasi Hardware {{ $data->nama_lokasi }}?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                    <a href="/masterdata/lokasi/deletelokasi/{{ $data->id_lokasi }}" class="btn btn-danger">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endforeach
@endsection