<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarModel extends Model
{
    public function allData()
    {
        return
        [
            [
                'nama'=>'Mochamad Nurullah',
                'nim'=>'E41180169',
                'prodi'=>'Teknik Informatika'
            ],
            [
                'nama'=>'Putri Nur Rahmatillah',
                'nim'=>'E41180179',
                'prodi'=>'Gizi Klinik'
            ],
            [
                'nama'=>'Novita',
                'nim'=>'E41180189',
                'prodi'=>'Reka Medik'
            ]

        ];
    }
}
