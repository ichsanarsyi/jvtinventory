@extends('layout.v_template')
@section('headertitle')
@if (session('message'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4><i class="icon fa fa-check"></i> Login Berhasil</h4>
    {{ session('message') }}
</div>
@endif
@section('title','Home')
<h3 style="margin:-0px;">
    @yield('title')
  </h3>
@endsection
@section('content')
    <h1>Selamat Datang</h1>
@endsection