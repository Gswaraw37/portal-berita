<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $topAuthors = User::select('users.id', 'users.username', DB::raw('COUNT(beritas.id) as jumlah_berita'))
                    ->leftJoin('beritas', 'users.id', '=', 'beritas.user_id')
                    ->where('users.role_id', '<>', 1)
                    ->groupBy('users.id', 'users.username')
                    ->orderByDesc('jumlah_berita')
                    ->limit(5)
                    ->get();
        $topCategories = Kategori::select('kategoris.id', 'kategoris.kategori', DB::raw('COUNT(beritas.id) as jumlah_berita'))
                    ->leftJoin('beritas', 'kategoris.id', '=', 'beritas.kategori_id')
                    ->groupBy('kategoris.id', 'kategoris.kategori')
                    ->orderByDesc('jumlah_berita')
                    ->limit(5)
                    ->get();
        $latestBeritas = Berita::inRandomOrder()->paginate(6);
        $carouselBeritas = Berita::latest()->take(3)->get();
        $randomBeritas = Berita::inRandomOrder()->take(5)->get();

        return view('home.index', [
            'kategoris' => Kategori::all(),
            'users' => Auth::user(),
            'carousels2' => Berita::latest()->get(),
            'user' => User::all(),
            'beritas2' => $randomBeritas,
            'topAuthors' => $topAuthors,
            'topCategories' => $topCategories,
            'latestBeritas' => $latestBeritas,
            'carouselBeritas' => $carouselBeritas
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
            'beritas2' => Berita::inRandomOrder()->take(6)->get()
        ]);
    }
}
