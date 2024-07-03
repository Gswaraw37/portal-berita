<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\LaporanBerita;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
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
        $user = Auth::user();

        return view('berita.tulisan.baca', [
            'beritas' => $berita,
            'users' => $user,
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
        $validatedData['rangkuman'] = Str::limit(str_replace('&nbsp;', ' ', strip_tags($request->isi)), 100);
            
        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-berita');
        }
            
        Berita::create($validatedData);
        return redirect('/')->with('success', 'Berhasil Membuat Berita Baru');
    }

    public function indexLaporan()
    {
        $laporanBerita = LaporanBerita::with('berita')->get();
        $users = Auth::user();
        $kategoris = Kategori::all();

        return view('admin.laporan.index', compact([
            'laporanBerita',
            'users',
            'kategoris',
        ]));
    }

    public function laporkanBerita(Request $request)
    {
        $request->validate([
            'berita_id' => 'required|exists:beritas,id',
            'penyebab' => 'required',
            'alasan' => 'required|string|max:255',
        ]);

        LaporanBerita::create([
            'berita_id' => $request->berita_id,
            'penyebab' => $request->penyebab,
            'alasan' => $request->alasan,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Berita berhasil dilaporkan.');
    }

    public function hapusBerita($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return Redirect::back()->with('success', 'Berita berhasil dihapus.');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }
}
