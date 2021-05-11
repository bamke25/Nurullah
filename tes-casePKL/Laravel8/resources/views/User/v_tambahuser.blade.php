<?php 
$judul="UserAdd Page";
$p="Halaman yang berisi form tambah user";
$title="Tambah User";
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

              <form action="/user/insert" method="post" enctype="multipart/form-data" >
              @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="nama_user">Nama</label>
                    <input  name="nama_user" class="form-control @error('nama_user') is-invalid @enderror" id="nama_user" value="{{ old('nama_user') }}" >
                    <div class="invalid-feedback">
                      @error('nama_user')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{ old('alamat') }}" >
                    <div class="invalid-feedback">
                      @error('alamat')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" value="{{ old('no_telp') }}" >
                    <div class="invalid-feedback">
                      @error('no_telp')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" >
                    <div class="invalid-feedback">
                      @error('foto')
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