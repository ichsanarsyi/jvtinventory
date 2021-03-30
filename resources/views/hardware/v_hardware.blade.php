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
<<<<<<< HEAD
            <div class="row">
                <div class="col-md-1" style="margin-right: 20px">
                    <a href="/hardware/addhw/" class="btn btn-md btn-primary"><i class="fa fa-plus-circle fa-fw"></i>Tambah</a>
                </div> 
            </div>
=======
            <a href="/hardware/addhw/" class="btn btn-md btn-primary">
                <i class="fa fa-plus-circle fa-fw"></i>
                Tambah
            </a>
            <a href="/hardware/saveexcel/" target="_blank" class="btn btn-default pull-right">
                <i class="fa fa-file-excel-o fa-fw"></i>
                Simpan sebagai Excel
            </a>
            <a href="/hardware/savepdf/" target="_blank" class="btn btn-default pull-right">
                <i class="fa fa-file-pdf-o fa-fw"></i>
                Simpan sebagai PDF
            </a>
            <a href="/hardware/print/" target="_blank" class="btn btn-default pull-right">
                <i class="fa fa-print fa-fw"></i>
                Print
            </a>
>>>>>>> parent of dd7b5a84 (Print All Log SW-HW)
        </div>     
        <!-- /.box-header -->
        <div class="box-body">
          <table id="tbl_hardware" class="display table table-bordered table-hover">
            <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  @if (auth()->user()->level == 'Admin') 
                  <th></th>
                  @endif
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
              @if (auth()->user()->level == 'Admin') 
              <th>Aksi</th>
              @endif
            </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach ($hardware as $data)
                <tr style="cursor: pointer;">
                    <td onclick="window.location='/hardware/detailhw/{{$data->id_hw}}';" data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                        {{$no++}}
                    </td>
                    <td onclick="window.location='/hardware/detailhw/{{$data->id_hw}}';" data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                        {{$data->kode_asset}}
                    </td>
                    <td onclick="window.location='/hardware/detailhw/{{$data->id_hw}}';" data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                        {{$data->nama_hw}} {{$data->nama_merk_hw}} {{$data->seri_hw}}
                    </td>
                    <td onclick="window.location='/hardware/detailhw/{{$data->id_hw}}';" data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                        {{$data->nama_merk_hw}}
                    </td>
                    <td onclick="window.location='/hardware/detailhw/{{$data->id_hw}}';" data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                        {{$data->seri_hw}}
                    </td>
                    <td onclick="window.location='/hardware/detailhw/{{$data->id_hw}}';" data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                        {{$data->nama_kategori_hw}}
                    </td>
                    @if (auth()->user()->level == 'Admin') 
                    <td>
                        <a href="/hardware/edithw/{{ $data->id_hw }}" class="btn btn-xs btn-warning"><i class="fa fa-edit fa-fw"></i>Edit</a>
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{ $data->id_hw }}"><i class="fa fa-trash fa-fw"></i>
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