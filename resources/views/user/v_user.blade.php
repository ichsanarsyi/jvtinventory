@extends('layout.v_template')
@section('headertitle')
@section('title','User')
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
                        <a href="{{ route('register') }}" class="btn btn-md btn-primary"><i class="fa fa-plus-circle fa-fw"></i>Tambah User</a>
                    </div> 
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="tbl_user" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID User</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Level</th>
                            @if (auth()->user()->level == 'Admin') 
                            <th>Aksi</th>
                            @endif
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach ($user as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->level}}</td>
                            @if ((auth()->user()->level == 'Admin'))
                            <td id="cellaksi{{$data->id}}">
                                <button id="btnedituser{{$data->id}}" style="visibility:hidden" type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit{{ $data->id }}"><i class="fa fa-edit fa-fw"></i>
                                    Edit
                                </button>
                                <button id="btndeleteuser{{$data->id}}" style="visibility:hidden" type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-delete{{ $data->id }}"><i class="fa fa-trash fa-fw"></i>
                                    Delete
                                </button>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<!-- /.box -->

<!-- Modal Edit -->
@foreach ($user as $data)
<div class="modal fade" id="modal-edit{{ $data->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit User</h4>
            </div>
            <form action="/user/updateuser/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">            
                <div class="form-group">
                    <label>Nama User</label>                                
                    <input autofocus="autofocus" name="name" class="form-control" value="{{ $data->name }}">
                    <div class="text-danger">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>        
                <div class="form-group">
                    <label>Email</label>                                
                    <input name="email" class="form-control" value="{{ $data->email }}">
                    <div class="text-danger">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>           
                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control select2" style="width: 100%;">
                        <option {{ ($data->level == 'Admin' ? 'selected="selected"' :'')}} value="Admin">Admin</option>
                        <option {{ ($data->level == 'User' ? 'selected="selected"' :'')}} value="User">User</option>
                    </select>
                    <div class="text-danger">
                        @error('level')
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

@foreach ($user as $data)
<div class="modal modal-danger fade" id="modal-delete{{ $data->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus {{ $data->level }} {{ $data->name }}</h4>
            </div>
            <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus {{ $data->level }} {{ $data->name }}?</p>
            </div>
            <div class="modal-footer">
                <a autofocus href="" data-dismiss="modal" class="btn btn-danger pull-left">Tidak</a>
                <a href="/user/deleteuser/{{ $data->id }}" class="btn btn-danger">Ya</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach
    
@endsection