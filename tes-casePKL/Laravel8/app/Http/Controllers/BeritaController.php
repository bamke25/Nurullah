<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaModel;
use Illuminate\Support\Facades\DB;


class BeritaController extends Controller
{
    public function __construct()
    {
        $this->BeritaModel= new BeritaModel();
    }

    public function index()
    {
        $data= [
            'berita'=> $this->BeritaModel->allData(),
        ];
        return view('Berita.v_listberita', $data);
    }

    public function detail($id_berita)
    {
        if (!$this->BeritaModel->detailData($id_berita)) {
            abort(404);
        }
        $data= [
            'detailberita'=> $this->BeritaModel->detailData($id_berita),
        ];
        return view('Berita.v_detailBerita', $data);
    }

    public function tambah()
    {
        $data= [
            'tambahberita'=> $this->BeritaModel->tambahData(),
        ];
        return view('Berita.v_tambahberita', $data);
    }

    public function insert()
    {
        
        Request()->validate([

             'judul_berita' => 'required|min:5',
             'konten' => 'required',
             'tanggal' => 'required',
             'tanggal' => 'required',
             'gambar' => 'required|mimes:jpg,jpeg,bmp,png|max:1024'
        ]);

        //Jika tidak ada validasi maka lakukan simpan/tambah data
        //upload foto
        $file= Request()->gambar;
        $fileName= Request()->judul_berita.'.'.$file->extension();
        $file->move(public_path('gambar'), $fileName);

        $data=[

            'judul_berita'=> Request()->judul_berita,
            'konten'=> Request()->konten,
            'isi_berita'=> Request()->isi_berita,
            'tanggal'=> Request()->tanggal,
            'gambar'=> $fileName,
        ];
        if($this->BeritaModel->insertData($data)){ 
            return redirect()->route('berita')->with('pesan','Berita baru berhasil ditambahkan!');
        } else{
            return redirect()->route('berita')->with('pesan','Berita baru gagal ditambahkan! silahkan cek ulang');
        }
    }


    public function delete($id_berita)
    {
        //hapus foto pada folder asset
        $berita= $this->BeritaModel->detailData($id_berita);
        if ($berita->gambar<>"") {
            unlink(public_path('gambar').'/'.$berita->gambar);
        }
        $this->BeritaModel->deleteData($id_berita);
        return redirect()->route('berita')->with('pesan','Data berhasil dihapus!');
    }
}
