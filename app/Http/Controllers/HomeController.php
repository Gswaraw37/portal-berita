<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Resources\HomeResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\HomeDetailResource;

class HomeController extends Controller
{
    public function index()
    {
        $ekonomi = Berita::where('kategori_id', 1)->count();
        $teknologi = Berita::where('kategori_id', 2)->count();
        $hukum = Berita::where('kategori_id', 3)->count();
        $sosial = Berita::where('kategori_id', 4)->count();
        $kesehatan = Berita::where('kategori_id', 5)->count();
        return view('home.index', [
            'kategoris' => Kategori::all(),
            'users' => Auth::user(),
            'beritas' => Berita::latest()->paginate(6),
            'carousels' => Berita::latest()->paginate(3),
            'carousels2' => Berita::latest()->get(),
            'beritas2' => Berita::all(),
            'ekonomi' => $ekonomi,
            'teknologi' => $teknologi,
            'hukum' => $hukum,
            'sosial' => $sosial,
            'kesehatan' => $kesehatan,
        ]);
    }

    public function show($judul)
    {
        $berita = Berita::with('user')->where('slug', $judul)->first();
        return view('berita.index', [
            'beritas' => $berita,
            'users' => Auth::user(),
            'kategoris' => Kategori::all(),
            'carousels' => Berita::latest()->paginate(7),
            'beritas3' => Berita::with('user')->latest()->first(),
            'beritas2' => Berita::take(6)->get()
        ]);
    }
}
