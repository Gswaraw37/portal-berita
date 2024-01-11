<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class TulisanController extends Controller
{
    public function create()
    {
        $berita = Berita::all();
        return view('berita.tulisan.buat');
    }
}
