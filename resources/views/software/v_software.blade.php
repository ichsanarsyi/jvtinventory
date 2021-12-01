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
        <div class="box-header with-border">
          <a href="{{ Route('addsw') }}" class="btn btn-primary">
            <i class="fa fa-plus-circle fa-fw"></i>
            Tambah
          </a>
          <a href="{{ Route('excelsw') }}/" target="_blank" class="btn btn-default pull-right">
            <i class="fa fa-file-excel-o fa-fw"></i>
            Simpan sebagai Excel
          </a>
          <a href="{{ Route('pdfsw') }}" target="_blank" class="btn btn-default pull-right">
            <i class="fa fa-file-pdf-o fa-fw"></i>
            Simpan sebagai PDF
          </a>    
        {{-- <div class="advanced-search-body">
        <form id = "joiningDateSearch">
          @csrf
          <div class="container">
              <div class="container-fluid">
                <div class="form-group row-12">
                  <label for="fromdate" class="col-form-label col-sm-2">Dari Tanggal</label>
                  <div class="col-sm-3">
                    <input type="date" class="form-control input-sm" id="fromdate" name="fromdate" required>
                  </div>
                  <label for="todate" class="col-form-label col-sm-2">Sampai Tanggal</label>
                  <div class="col-sm-3">
                    <input type="date" class="form-control input-sm" id="todate" name="todate" required>
                  </div>
                  <div class="col-sm-2">
                    <button id="filterdate" type="button" class="btn fa fa-search"></button>
                  </div>
                </div>
              </div>            
          </div>
        </form>
        </div> --}}
        <!-- /.box-header -->
        <div class="box-body">
          {{-- <table border="0" cellspacing="5" cellpadding="5">
            <tbody>
              <tr>
                <td><input type="text" id="min" name="min" placeholder="Dari Tanggal"></td>
              </tr>
              <tr>
                <td><input type="text" id="max" name="max" placeholder="Sampai Tanggal"></td>
              </tr>
            </tbody>
          </table> --}}
          {{-- <div class="divider"></div>             --}}
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
                <th class="text-center">No</th>
                <th class="text-center">Nama Software</th>
                <th class="text-center">Merk</th>
                <th class="text-center">Jenis Lisensi</th>
                <th class="text-center">Versi</th>
                <th class="text-center">Masa Aktif Lisensi</th>
                @if (auth()->user()->level == 'Admin') 
                <th class="text-center">Aksi</th>
                @endif
              </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach ($software as $data)
                <tr style="cursor: pointer;">
                    <td onclick="window.location='/software/detailsw/{{$data->id_sw}}/{{ $data->id_merk_hw }}';" data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                      {{$no++}}
                    </td>
                    <td onclick="window.location='/software/detailsw/{{$data->id_sw}}/{{ $data->id_merk_hw }}';" data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                      {{$data->nama_sw}}
                    </td>
                    <td onclick="window.location='/software/detailsw/{{$data->id_sw}}/{{ $data->id_merk_hw }}';" data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                      {{$data->nama_merk_sw}}
                    </td>
                    <td onclick="window.location='/software/detailsw/{{$data->id_sw}}/{{ $data->id_merk_hw }}';" data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                      {{$data->jenis_lisensi}}
                    </td>
                    <td onclick="window.location='/software/detailsw/{{$data->id_sw}}/{{ $data->id_merk_hw }}';" data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                      {{ ($data->versi_sw == '' ? '-' :$data->versi_sw)}}
                    </td>
                    <td onclick="window.location='/software/detailsw/{{$data->id_sw}}/{{ $data->id_merk_hw }}';" data-toggle="tooltip" data-placement="top" title="Klik untuk detail">
                      <span style="padding-right:20%;" class="pull-right">
                        {{ ($data->id_jenis_lisensi == 2 ? '-' :$data->day_left.' Hari Tersisa')}}
                      </span>
                    </td>
                    @if (auth()->user()->level == 'Admin') 
                    <td style="cursor: default;">
                      <a href="/software/editsw/{{ $data->id_sw }}" class="btn btn-xs btn-warning"><i class="fa fa-edit fa-fw"></i>
                        Edit
                      </a>
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

{{-- <div class="modal modal-default fade" id="modal-delete{{ $data->id_hw }}">
  <div class="modal-dialog bg-danger modal-sm">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-danger"><i class="fa fa-exclamation-triangle fa-fw"></i> Hapus Data {{ $data->nama_hw }}</h4>
          </div>
          <div class="modal-body">
              <p>Apakah Anda yakin ingin menghapus data {{ $data->nama_hw }}?</p>
          </div>
          <div class="modal-footer bg-light">
              <a autofocus href="" data-dismiss="modal" class="btn btn-default pull-left">Cancel</a>
              <a href="/hardware/deletehw/{{ $data->id_hw }}" class="btn btn-danger">Delete</a>
          </div>
      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div> --}}

    <div class="modal modal-default fade" id="modal-delete{{ $data->id_sw }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-danger"> <i class="fa fa-exclamation-triangle fa-fw"></i> Hapus Data {{ $data->nama_sw }}</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data {{ $data->nama_sw }}?</p>
                </div>
                <div class="modal-footer">
                    <a autofocus href="" data-dismiss="modal" class="btn btn-default pull-left">Cancel</a>
                    <a href="/software/deletesw/{{ $data->id_sw }}" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endforeach
@endsection