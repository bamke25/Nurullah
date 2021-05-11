<?php 
$judul="Profile";
$p="Halaman yang berisi informasi user secara detail";
$title="Detail User";
?>
      @if(Session('pesan'))
        <div class="alert alert-success" role="alert">
                {{ session('pesan') }}
        </div>
      @endif

@extends('layout.v_template')

@section('konten')

<table class="table table-bordered">
    <tr>
        <th width="100px">Nama</th>
        <th width="30px">:</th>
        <th>{{ Auth::user()->name }}</th>
    </tr>
    <tr>
        <th width="100px">Alamat</th>
        <th width="30px">:</th>
        <th>{{ Auth::user()->alamat }}</th>
    </tr>
    <tr>
        <th width="100px">No Telp</th>
        <th width="30px">:</th>
        <th>{{ Auth::user()->no_telp }}</th>
    </tr>
    <tr>
        <th width="100px">Foto</th>
        <th width="30px">:</th>
        <th><img src="{{ url('foto/'.Auth::user()->foto )}}" width="300px"alt=""></th>
    </tr>
</table>


@if((auth()->user()->level==2))

        <a style="margin-left:11px" href="/home" class="btn btn-primary d-grid gap-2 ">Kembali</a> 

@endif


@if((auth()->user()->level==1))
        <a style="margin-left:11px" href="/user" class="btn btn-primary d-grid gap-2 ">Kembali</a> 
@endif

@endsection