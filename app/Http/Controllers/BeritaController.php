<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest();

        if(request('search')){
            $berita->where('judul', 'like', '%' . request('search') . '%');
        }

        return view('home.search', [
            'kategoris' => Kategori::all(),
            'beritas' => $berita->get()
        ]);
    }
}
