@extends('layout.v_template')
@section('title','All Software')
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
            <a href="/software/addsw/" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle fa-fw"></i>Tambah</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">  
                <div class="col-md-4 category-filter">
                    <label>Filter Merk</label>
                    <select id="filter_merk" class="form-control filter">
                        <option value="">Pilih Merk</option>
                        @foreach ($merk as $data)
                        <option value="{{$data->id_merk_sw}}">{{$data->nama_merk_sw}}</option>                           
                        @endforeach
                    </select>
                </div>              
                <div class="col-md-4">
                    <label>Filter Jenis Lisensi</label>
                    <select id="filter_jenis_lisensi" class="form-control filter">
                        <option value="">Pilih Jenis Lisensi</option>
                        @foreach ($lisensi as $data)
                        <option value="{{$data->id_jenis_lisensi}}">{{$data->jenis_lisensi}}</option>                           
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="divider"></div>
          <table id="tbl_software" class="table table-bordered table-striped table-hover">
            <tfoot>
                <tr>
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
                    <th scope="col">No</th>
                    <th scope="col">Nama Software</th>
                    <th scope="col">Merk</th>
                    <th scope="col">Jenis Lisensi</th>
                    <th scope="col">Versi</th>
                    <th scope="col">Aksi</th>                
                </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach ($software as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->nama_sw}}</td>
                    <td>{{$data->nama_merk_sw}}</td>
                    <td>{{$data->jenis_lisensi}}</td>
                    <td>{{$data->versi_sw}}</td>
                    <td>
                        <a href="/software/detailsw/{{ $data->id_sw }}" class="btn btn-xs btn-primary"><i class="fa fa-info-circle fa-fw"></i>Detail</a>
                        <a href="/software/editsw/{{ $data->id_sw }}" class="btn btn-xs btn-warning"><i class="fa fa-edit fa-fw"></i>Edit</a>
                        <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{ $data->id_sw }}"><i class="fa fa-trash fa-fw"></i>
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
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
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