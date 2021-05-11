<?php 
$judul="Comments Page"; 
$title="Komentar";
?>
@extends('layout.v_template')

@section('konten')

<?php foreach ($guru as $data ) : ?>
   <h4> 
       Nama: {{ $data['nama'] }} <br>
       NIM:  {{ $data['nim'] }} <br>
       Prodi: {{ $data['prodi'] }}
       <br> <br>
   </h4>
<?php endforeach; ?>

@endsection