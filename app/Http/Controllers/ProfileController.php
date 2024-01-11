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
        $berita = Berita::with('user')->count();
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
}
