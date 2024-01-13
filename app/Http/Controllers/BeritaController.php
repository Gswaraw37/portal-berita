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

    public function store(Request $request)
    {
        return $request->file('gambar')->store('gambar-berita');

        $validateData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required|unique:beritas',
            'kategori_id' => 'required',
            'gambar' => 'required|file|max:1024',
            'isi' => 'required'
        ]);

        $validateData['penulis_id'] = auth()->user()->id;
        $validateData['rangkuman'] = Str::limit(strip_tags($request->isi), 100);
        
        Berita::create($validateData);

        return redirect('/')->with('success', 'Berhasil Membuat Berita!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
