<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class BeritaModel extends Model
{
    public function allData()
    {
        return DB::table('berita')
        ->leftJoin('users', 'berita.id_user', '=', 'users.id')
        ->get();
    }

    public function detailData($id_berita)
    {
        return DB::table('berita')->where('id_berita', $id_berita)->first();
    }

    public function tambahData()
    {
        return view('Berita.v_tambahberita');
    }

    public function insertData($data)
    {
        return DB::table('berita')
        ->leftJoin('users', 'berita.id_user', '=', 'users.id')
        ->insert($data);
    }

    public function deleteData($id_berita)
    {
        return DB::table('berita')->where('id_berita', $id_berita)->delete();
    }
}
