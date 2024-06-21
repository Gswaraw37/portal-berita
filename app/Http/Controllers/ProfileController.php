<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($username)
    {
        $berita = Berita::with('user')->where('user_id', Auth::user()->id)->count();
        $profile = User::with('berita')->where('username', $username)->first();

        return view('akun.index', [
            'kategoris' => Kategori::all(),
            'users' => Auth::user(),
            'tulisans' => $berita,
            'beritas' => $profile->berita()->latest()->paginate(6),
            'beritas2' => $profile->berita()->latest()->first(),
            'profiles' => $profile
        ]);
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('akun.edit', [
            'users' => $users,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'gambar' => 'image|file|max:5120|mimes:jpeg,png,jpg,gif,webp',
        ]);

        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('foto-profil');
        }

        $user = User::findOrFail($id);
        
        $user->update($validatedData);
        return redirect('profile/'. auth()->user()->username)->with('success', 'Profil Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $deletedBerita = Berita::findOrFail($id);
        $deletedBerita->delete();

        return redirect('profile/'. auth()->user()->username)->with('success', 'Berita Berhasil Dihapus');
    }

    public function author($username)
    {
        $author = User::where('username', $username)->firstOrFail();
        $beritas = $author->berita;
        $beritas2 = $author->berita()->latest()->first();
        $users = Auth::user();
        $kategoris = Kategori::all();

        return view('akun.author', compact([
            'author',
            'beritas',
            'beritas2',
            'users',
            'kategoris',
        ]));
    }
}
