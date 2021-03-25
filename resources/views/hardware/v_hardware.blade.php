@extends('layout.v_template')
@section('headertitle')
@section('title','All Hardware')
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
        <div class="box-header with-border">
            <div class="row">
                <div class="col-md-1" style="margin-right: 20px">
                    <a href="/hardware/addhw/" class="btn btn-md btn-primary"><i class="fa fa-plus-circle fa-fw"></i>Tambah</a>
                </div> 
            </div>
        </div>     
        <!-- /.box-header -->
        <div class="box-body">
          <table id="tbl_hardware" class="display table table-bordered table-striped table-hover">
            <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
            </tfoot>
            <thead>
            <tr>
              <th>No</th>
              <th>Kode Asset</th>
              <th>Nama Hardware</th>
              <th>Merk</th>
              <th>Seri</th>
              <th>Kategori</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach ($hardware as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->kode_asset}}</td>
                    <td>{{$data->nama_hw}} {{$data->nama_merk_hw}} {{$data->seri_hw}}</td>
                    <td>{{$data->nama_merk_hw}}</td>
                    <td>{{$data->seri_hw}}</td>
                    <td>{{$data->nama_kategori_hw}}</td>
                    <td>
                        <a href="/hardware/detailhw/{{ $data->id_hw }}" class="btn btn-xs btn-primary"><i class="fa fa-info-circle fa-fw"></i>Detail</a>
                        @if (auth()->user()->level == 'Admin') 
                        <a href="/hardware/edithw/{{ $data->id_hw }}" class="btn btn-xs btn-warning"><i class="fa fa-edit fa-fw"></i>Edit</a>
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{ $data->id_hw }}"><i class="fa fa-trash fa-fw"></i>
                            Delete
                        </button>
                        @endif
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
@foreach($hardware as $data)
    <div class="modal modal-danger fade" id="modal-delete{{ $data->id_hw }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Data {{ $data->nama_hw }}</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data {{ $data->nama_hw }}?</p>
                </div>
                <div class="modal-footer">
                    <a autofocus href="" data-dismiss="modal" class="btn btn-danger pull-left">Tidak</a>
                    <a href="/hardware/deletehw/{{ $data->id_hw }}" class="btn btn-danger">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endforeach
@endsection