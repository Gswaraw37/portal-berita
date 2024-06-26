<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class TulisanController extends Controller
{
    public function create()
    {
        $kategori = Kategori::with('berita')->get();

        return view('berita.tulisan.buat', [
            'kategoris' => $kategori
        ]);
    }

    public function show($judul)
    {
        $berita = Berita::with('user')->where('slug', $judul)->first();

        return view('berita.tulisan.baca', [
            'beritas' => $berita,
            'users' => Auth::user(),
        ]);
    }

    public function edit($id)
    {
        $berita = Berita::with('kategori')->findOrFail($id);
        $kategori = Kategori::all();

        return view('berita.tulisan.edit', [
            'beritas' => $berita,
            'kategoris' => $kategori,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required',
            'gambar' => 'image|file|max:5120|mimes:jpeg,png,jpg,gif,webp',
            'kategori_id' => 'required|exists:kategoris,id',
            'isi' => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['rangkuman'] = Str::limit(strip_tags($request->isi), 100);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-berita');
        }

        $berita = Berita::findOrFail($id);
        
        $berita->update($validatedData);
        return redirect('/')->with('success', 'Berita Berhasil Diupdate');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required',
            'gambar' => 'image|file|max:5120|mimes:jpeg,png,jpg,gif,webp',
            'kategori_id' => 'required|exists:kategoris,id',
            'isi' => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['rangkuman'] = Str::limit(strip_tags($request->isi), 100);
            
        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-berita');
        }
            
        Berita::create($validatedData);
        return redirect('/')->with('success', 'Berhasil Membuat Berita Baru');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
