<?php 
$judul="Detail Berita";
$p="Halaman yang berisi informasi mengenai berita secara detail";
$title="Detail Berita";
?>
@extends('layout.v_template')

@section('konten')

<table class="table table-bordered">
    <tr>
        <th width="100px">Judul</th>
        <th width="30px">:</th>
        <th>{{ $detailberita->judul_berita }}</th>
    </tr>
    <tr>
        <th width="100px">Konten</th>
        <th width="30px">:</th>
        <th>{{ $detailberita->konten }}</th>
    </tr>

    <tr>
        <th width="100px">Isi</th>
        <th width="30px">:</th>
        <th>{{ $detailberita->isi_berita }}</th>
    </tr>

    <tr>
        <th width="100px">Tanggal</th>
        <th width="30px">:</th>
        <th>{{ $detailberita->tanggal }}</th>
    </tr>
    <tr>
        <th width="100px">Gambar</th>
        <th width="30px">:</th>
        <th><img src="{{ url('gambar/'.$detailberita->gambar )}}" width="300px"alt=""></th>
    </tr>
</table>
<a href="/berita" class="btn btn-primary d-grid gap-2 ">Kembali</a>


@endsection