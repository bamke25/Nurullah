<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    public function allData()
    {
        return DB::table('users')->get();
    }

    public function detailData($id_user)
    {
        return DB::table('users')->where('id', $id_user)->first();
    }

    public function tambahData()
    {
        return view('User.v_tambahuser');
    }

    public function insertData($data)
    {
        return DB::table('users')->insert($data);
    }

    public function editData($id_user, $data)
    {
        return DB::table('users')->where('id', $id_user)->update($data);
    }

    public function deleteData($id_user)
    {
        return DB::table('users')->where('id', $id_user)->delete();
    }



}
