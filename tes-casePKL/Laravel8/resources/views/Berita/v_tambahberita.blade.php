<?php 
$judul="NewsAdd Page";
$p="Halaman yang berisi form tambah berita";
$title="Tambah Berita";
?>
@extends('layout.v_template')
@section('konten')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              @if(Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
              @endif

              @if(Session::get('fail'))
                  <div class="alert alert-danger">
                      {{ Session::get('fail') }}
                  </div>
              @endif


              <form action="/berita/insert" method="post" enctype="multipart/form-data" >
              @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="judul">Judul Berita</label>
                    <input  name="judul_berita" class="form-control @error('judul_berita') is-invalid @enderror" id="judul" value="{{ old('judul_berita') }}" >
                    <div class="invalid-feedback">
                      @error('judul_berita')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="konten">Konten</label>
                    <input name="konten" class="form-control @error('konten') is-invalid @enderror" id="konten" value="{{ old('konten') }}" >
                    <div class="invalid-feedback">
                      @error('judul_berita')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="isi_berita">Isi Berita</label>
                    <textarea style="height: 200px" name="isi_berita" class="form-control @error('isi_berita') is-invalid @enderror" id="isi_berita" value="{{ old('isi_berita') }}" ></textarea>
                    <div class="invalid-feedback">
                      @error('judul_berita')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" value="{{ old('tanggal') }}" >
                    <div class="invalid-feedback">
                      @error('judul_berita')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" id="gambar" >
                    <div class="invalid-feedback">
                      @error('judul_berita')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection