<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Resources\HomeResource;
use App\Http\Resources\HomeDetailResource;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            'kategoris' => Kategori::all(),
            'beritas' => Berita::all(),
            'carousels' => Berita::latest()->paginate(3),
            'carousels2' => Berita::take(20)->get()
        ]);
    }

    public function show($judul)
    {
        // $berita = Berita::findOrFail($id);
        $berita = Berita::where('slug', $judul)->first();
        return view('berita', [
            'carousels' => $berita,
            'kategoris' => Kategori::all(),
        ]);
    }
}
