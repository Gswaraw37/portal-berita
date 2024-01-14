<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'beritas' => $profile->berita->take(5),
            'beritas2' => $profile->berita->take(1),
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
            'password' => 'required'
        ]);

        $user = User::findOrFail($id);
        
        $user->update($validatedData);
        return redirect('profile/'. auth()->user()->username);
    }

    public function destroy($id)
    {
        $deletedBerita = Berita::findOrFail($id);
        $deletedBerita->delete();

        return redirect('profile/'. auth()->user()->username);
    }
}
