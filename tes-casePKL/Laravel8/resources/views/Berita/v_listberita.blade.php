<?php 
$judul="News Page";
$p="Halaman yang berisi tentang berita";
$title="Berita";
?>
@extends('layout.v_template')
@section('konten')

<a class="btn btn-primary btn-sm" href="/berita/tambah">Tambah</a> <br> <br>

            @if(Session('pesan'))
              <div class="alert alert-success" role="alert">
                {{ session('pesan') }}
              </div>
            @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Konten</th>
                <!-- <th>Isi</th> -->
                <th>gambar</th>
                <th>tanggal</th>
                <th>Action</th>
            </tr>
        </thead>

        @if((auth()->user()->level==1))
        <tbody>
            <?php $no=1; ?>
            @foreach($berita as $b)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $b->judul_berita }}</td>
                    <td>{{ $b->konten }}</td>
                    <!-- <td>{{ $b->isi_berita }}</td> -->
                    <td><img src="{{ url('gambar/'.$b->gambar) }}" width="150px" alt=""></td>
                    <td>{{ $b->tanggal }}</td>
                    <td>
                        <a href="/berita/detail/{{ $b->id_berita }}" class="btn btn-sm btn-success">detail</a>
                        <a href="" class="btn btn-sm btn-warning">edit</a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $b->id_berita }}">
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        @endif

        @if((auth()->user()->level==2))
        <tbody>
            <?php $no=1; ?>
            @foreach($berita as $b)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $b->judul_berita }}</td>
                    <td>{{ $b->konten }}</td>
                    <!-- <td>{{ $b->isi_berita }}</td> -->
                    <td><img src="{{ url('gambar/'.$b->gambar) }}" width="150px" alt=""></td>
                    <td>{{ $b->tanggal }}</td>
                    <td>
                        <a href="/berita/detail/{{ $b->id_berita }}" class="btn btn-sm btn-success">detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        @endif
    </table>

    @foreach($berita as $b)
        @include('layout.modals')
    @endforeach
    
@endsection