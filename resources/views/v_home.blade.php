@extends('layout.v_template')
@section('headertitle')
@section('title','Home')
<h3 style="margin:0px; margin-left:0px;">
  @yield('title')
</h3>
@endsection
@section('content')
<div class="row">
  <div class="col-sm-12">
    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Sukses!</h4>
      {{ session('pesan') }}
    </div>
    @endif
        @if (session('message'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4><i class="icon fa fa-check"></i> Login Berhasil</h4>
          {{ session('message') }}
        </div>
        @endif
  </div>
  

  <div class="col-md-8 pull-left">
        <div class="box box-info">
          <div class="box-header with-border">
            <i class="fa fa-bar-chart"></i>
                <h3 class="box-title">Info</h3>
          </div>
          <div class="box-body">
            <div class="col-sm-4">
                <div class="info-box bg-purple">
                    <span class="info-box-icon bg-purple-active"><i class="fa fa-briefcase"></i></span>
                    <div class="info-box-content">
                        <span style="margin-top: 7px;" class="info-box-text">Total<br>Hardware</span>
                        <span class="info-box-number"><?php $totalHW = DB::table('tbl_hardware')->count(); echo $totalHW;?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-sm-4">
                <div class="info-box bg-blue">
                    <span class="info-box-icon bg-blue-active"><i class="fa fa-cloud"></i></span>
                    <div class="info-box-content">
                        <span style="margin-top: 7px;" class="info-box-text">Total<br>Software</span>
                        <span class="info-box-number"><?php $totalHW = DB::table('tbl_software')->count(); echo $totalHW;?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-sm-4">
                <div class="info-box bg-navy">
                    <span class="info-box-icon bg-navy-active"><i class="glyphicon glyphicon-user"></i></span>
                    <div class="info-box-content">
                        <span style="margin-top: 7px;" class="info-box-text">Total<br>User</span>
                        <span class="info-box-number"><?php $totalHW = DB::table('users')->count(); echo $totalHW;?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div>
          {{-- box body --}}
          </div>
        </div>



    <div class="col-md-4 pull-right">
        <div class="box box-info">
            <div class="box-header with-border">
                <i class="fa fa-bullhorn"></i>
                <h3 class="box-title">Catatan</h3>
                @if (auth()->user()->level == 'Admin') 
                <i style="cursor: pointer;" data-toggle="modal" data-target="#modal-add" class="fa fa-plus pull-right"></i>
                @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    @foreach ($catatan as $data)
                    <div class="callout callout-default bg-aqua-active">
                    @if (auth()->user()->level == 'Admin') 
                    <i style="cursor: pointer;" data-toggle="modal" data-target="#modal-delete{{$data->id_catatan}}" class="fa fa-trash pull-right"> </i>
                    <i style="cursor: pointer; padding-right:10px;" data-toggle="modal" data-target="#modal-edit{{$data->id_catatan}}" class="fa fa-pencil pull-right"> </i>
                    @endif
                    <h4 style="white-space: pre-line">{{$data->judul_catatan}}</h4>
                    <p style="white-space: pre-line">{{$data->isi_catatan}}</p>
                    </div>
                @endforeach
            </div>
                <!-- /.box-body -->
        </div>
    </div>
            <!-- /.row -->
</div>

<!-- Modal Add -->
<div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Catatan Database</h4>
        </div>
        <form action="/home/insertcatatan" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
            <div class="form-group">
                <label>Judul Catatan</label>                                
                <input autofocus="autofocus" name="judul_catatan" class="form-control" value="{{ old('judul_catatan') }}">
            </div>
            <div class="form-group">
                <label>Isi Catatan</label>                                
                <textarea style="height:100px;" name="isi_catatan" class="form-control" value="{{ old('isi_catatan') }}"></textarea>
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
@foreach ($catatan as $data)
<div class="modal fade" id="modal-edit{{ $data->id_catatan }}">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Catatan</h4>
        </div>
        <form action="/home/updatecatatan/{{ $data->id_catatan }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">            
            <div class="form-group">
                <label>Judul Catatan</label>                                
                <input autofocus="autofocus" name="judul_catatan" class="form-control" value="{{ $data->judul_catatan }}">
            </div>           
            <div class="form-group">
                <label>Isi Catatan</label>                                
                <textarea style="height:100px;" name="isi_catatan" class="form-control">{{ $data->isi_catatan }}</textarea>
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
@foreach($catatan as $data)
    <div class="modal modal-danger fade" id="modal-delete{{ $data->id_catatan }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Catatan {{ $data->judul_catatan }}</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus Catatan {{ $data->judul_catatan }}?</p>
                </div>
                <div class="modal-footer">
                  <a autofocus href="" data-dismiss="modal" class="btn btn-danger pull-left">Tidak</a>
                  <a href="/home/deletecatatan/{{ $data->id_catatan }}" class="btn btn-danger">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endforeach
@endsection