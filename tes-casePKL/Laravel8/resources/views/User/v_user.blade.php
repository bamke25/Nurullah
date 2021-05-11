
<?php 
$judul="Daftar User";
$p="Halaman yang berisi daftar User";
$title="User";
?>

@extends('layout.v_template')

@section('konten')

<a class="btn btn-primary btn-sm" href="/user/tambah">Tambah</a> <br> <br>

            @if(Session('pesan'))
              <div class="alert alert-success" role="alert">
                {{ session('pesan') }}
              </div>
            @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Foto</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach($user as $s)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td>{{ $s->no_telp }}</td>
                    <td><img src="{{ url('foto/'.$s->foto) }}" width="150px" alt=""></td>
                    <td>
                        <a href="/user/detail/{{ $s->id }}" class="btn btn-sm btn-success">detail</a>
                        <a href="/user/edit/{{ $s->id }}" class="btn btn-sm btn-warning">edit</a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $s->id }}">
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @foreach($user as $s)
        
            
            <div class="modal fade" id="delete{{ $s->id }}">
                <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                    <!-- <h4 class="modal-title">{{$s->name}}</h4> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p>Apakah Anda ingin menghapus data {{$s->name}}?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <a href="/user/delete/{{ $s->id }}" type="button" class="btn btn-outline-light">Hapus</a>
                    </div>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
    @endforeach
@endsection








