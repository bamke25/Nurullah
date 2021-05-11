<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->UserModel= new UserModel();
        $this->middleware('auth');
    }
    public function index()
    {
        $data= [
            'user'=> $this->UserModel->allData(),
        ];
        return view('User.v_user', $data);
    }

    public function detail($id_user)
    {
        if (!$this->UserModel->detailData($id_user)) {
            abort(404);
        }
        $data= [
            'detailuser'=> $this->UserModel->detailData($id_user),
        ];
        return view('User.v_detailUser', $data);
    }

    public function tambah()
    {
        $data= [
            'tambahuser'=> $this->UserModel->tambahData(),
        ];
        return view('User.v_tambahuser', $data);
    }

    public function insert()
    {
        Request()->validate([
            'name' => 'required',
            'alamat' => '',
            'no_telp' => 'unique:users|max:13',
            'foto' => 'mimes:jpg,jpeg,bmp,png|max:1024'
        ]);

        //Jika tidak ada validasi maka lakukan simpan/tambah data
        //upload foto
        $file= Request()->foto;
        $fileName= Request()->name.'.'.$file->extension();
        $file->move(public_path('foto'), $fileName);

        $data=[
            'name'=> Request()->name,
            'alamat'=> Request()->alamat,
            'no_telp'=> Request()->no_telp,
            'foto'=> $fileName,
        ];
        if($this->UserModel->insertData($data)){ 
            return redirect()->route('user')->with('pesan','Data berhasil ditambahkan!');
        } else{
            return redirect()->route('user')->with('pesan','Data gagal ditambahkan! silahkan cek ulang');
        }
    }

    public function edit($id_user)
    {
        if (!$this->UserModel->detailData($id_user)) {
            abort(404);
        }
        $data= [
            'edituser'=> $this->UserModel->detailData($id_user),
        ];
        return view('User.v_edituser', $data);
    }

    public function update($id_user)
    {
        Request()->validate([
            'name' => 'required',
            'alamat' => '',
            'no_telp' => 'max:13',
            'foto' => 'mimes:jpg,jpeg,bmp,png|max:1024'
        ]);

        //Jika tidak ada validasi maka lakukan simpan/tambah data
        if (Request()->foto<>"") 
        {
            //ganit fot
              $file= Request()->foto;
              $fileName= Request()->name.'.'.$file->extension();
              $file->move(public_path('foto'), $fileName);
              $data=
                [
                  'name'=> Request()->name,
                  'alamat'=> Request()->alamat,
                  'no_telp'=> Request()->no_telp,
                  'foto'=> $fileName,
                ];
        } else 
            {
                //Jika tidak ganti foto
                $data=[
                    'name'=> Request()->name,
                    'alamat'=> Request()->alamat,
                    'no_telp'=> Request()->no_telp,
                ];
            }

        if($this->UserModel->editData($id_user, $data)){ 
            return redirect()->route('user')->with('pesan','Data berhasil diubah!');
        } else{
            return redirect()->route('user')->with('pesan','Data gagal diubah! silahkan cek ulang');
        }
    }

    public function delete($id_user)
    {
        //hapus foto pada folder asset
        $user= $this->UserModel->detailData($id_user);
        if ($user->foto<>"") {
            unlink(public_path('foto').'/'.$user->foto);
        }
        $this->UserModel->deleteData($id_user);
        return redirect()->route('user')->with('pesan','Data berhasil dihapus!');
    }

    public function profile()
    {
        $data= [
            'profile'=> $this->UserModel->allData(),
        ];
        return view('profile.v_detailprofile', $data);
    }



    

}
