<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function show($kategori)
    {
        $kategori = Kategori::with('berita')->where('kategori', $kategori)->first();
        $randomBeritas = Berita::inRandomOrder()->take(5)->get();

        return view('kategori.index', [
            'kategoris' => Kategori::all(),
            'users' => Auth::user(),
            'beritas' => $kategori->berita->take(6),
            'beritas3' => $kategori->berita->take(10),
            'carousels' => $kategori->berita->take(3),
            'carousels2' => $randomBeritas,
            'beritas2' => $kategori
        ]);
    }
}
