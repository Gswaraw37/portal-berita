<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Resources\HomeResource;
use App\Http\Resources\HomeDetailResource;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'kategoris' => Kategori::all(),
            'beritas' => Berita::paginate(6),
            'carousels' => Berita::latest()->paginate(3),
            'carousels2' => Berita::latest()->take(9)->get(),
            'beritas2' => Berita::all()
        ]);
    }

    public function show($judul)
    {
        // $berita = Berita::findOrFail($id);
        $berita = Berita::with('user')->where('slug', $judul)->first();
        return view('berita.index', [
            'beritas' => $berita,
            'kategoris' => Kategori::all(),
            'roles' => User::with('role')->first(),
            'beritas2' => Berita::take(6)->get()
        ]);
    }
}
