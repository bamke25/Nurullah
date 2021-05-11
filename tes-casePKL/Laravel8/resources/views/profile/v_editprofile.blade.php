@if((auth()->user()->level==1))
<?php 
$judul="Edit User";
$p="Halaman yang berisi form edit user";
$title="Edit User";
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

              <form action="/user/update/{{ $editprofile->id }}" method="post" enctype="multipart/form-data" >
              @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input  name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $editprofile->name }}" >
                    <div class="invalid-feedback">
                      @error('name')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" value="{{ $editprofile->alamat }}" >
                    <div class="invalid-feedback">
                      @error('alamat')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" value="{{ $editprofile->no_telp }}" >
                    <div class="invalid-feedback">
                      @error('no_telp')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>

                  <div class="row g-2">
                        <div class="col-5">
                            <img src="{{ url('foto/'.$editprofile->foto )}}" width="380px" alt="">
                        </div>

                        <div class="col-7">
                                <div class="form-group">
                                    <label for="foto">anti Foto</label>
                                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" value="$editprofile->foto" >
                                    <div class="invalid-feedback">
                                    @error('foto')
                                    {{ $message }}
                                    @enderror
                                    </div>
                                </div>
                        </div>
                  </div>

                </div>
                <!-- /.card-body --> <br>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan perubahan</button>
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
@endif





