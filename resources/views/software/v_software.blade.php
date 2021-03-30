@extends('layout.v_template')
@section('headertitle')
@section('title','All Software')
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
        <div class="box-header with-border text-blue">
            <a href="/software/addsw/" class="btn btn-primary">
              <i class="fa fa-plus-circle fa-fw"></i>
              Tambah
            </a>
            <a href="/software/saveexcel/" target="_blank" class="btn btn-default pull-right">
              <i class="fa fa-file-excel-o fa-fw"></i>
              Simpan sebagai Excel
            </a>
            <a href="/software/savepdf/" target="_blank" class="btn btn-default pull-right">
              <i class="fa fa-file-pdf-o fa-fw"></i>
              Simpan sebagai PDF
            </a>
            <a href="/software/print/" target="_blank" class="btn btn-default pull-right">
              <i class="fa fa-print fa-fw"></i>
              Print
            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">            
          <table id="tbl_software" class="display table table-bordered table-hover">
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
                <th>Nama Software</th>
                <th>Merk</th>
                <th>Jenis Lisensi</th>
                <th>Versi</th>
                <th>Masa Aktif Lisensi</th>
                @if (auth()->user()->level == 'Admin') 
                <th class="no-sort">Aksi</th>
                @endif

              </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach ($software as $data)
                <tr style="cursor: pointer;" onclick="window.location='/software/detailsw/{{$data->id_sw}}';">
                    <td data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                      {{$no++}}
                    </td>
                    <td data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                      {{$data->nama_sw}}
                    </td>
                    <td data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                      {{$data->nama_merk_sw}}
                    </td>
                    <td data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                      {{$data->jenis_lisensi}}
                    </td>
                    <td data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                      {{ ($data->versi_sw == '' ? '-' :$data->versi_sw)}}
                    </td>
                    <td data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                      <span style="padding-right:30%;" class="pull-right">
                        {{ ($data->id_jenis_lisensi == 2 ? '-' :$data->day_left.' Hari Tersisa')}}
                      </span>
                    </td>
                    @if (auth()->user()->level == 'Admin') 
                    <td>
                      <a href="/software/editsw/{{ $data->id_sw }}" class="btn btn-xs btn-warning"><i class="fa fa-edit fa-fw"></i>Edit</a>
                      <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{ $data->id_sw }}"><i class="fa fa-trash fa-fw"></i>
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
@foreach($software as $data)
    <div class="modal modal-danger fade" id="modal-delete{{ $data->id_sw }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Data {{ $data->nama_sw }}</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data {{ $data->nama_sw }}?</p>
                </div>
                <div class="modal-footer">
                    <a autofocus href="" data-dismiss="modal" class="btn btn-danger pull-left">Tidak</a>
                    <a href="/software/deletesw/{{ $data->id_sw }}" class="btn btn-danger">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endforeach
@endsection