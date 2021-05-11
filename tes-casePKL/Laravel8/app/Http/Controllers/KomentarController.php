<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KomentarModel;

class KomentarController extends Controller
{
    public function __construct()
    {
        $this->KomentarModel = new KomentarModel();
    }
    public function index()
    {
        $data=['guru'=> $this->KomentarModel->allData(),];
        return view('v_komentar', $data);
    }
}
