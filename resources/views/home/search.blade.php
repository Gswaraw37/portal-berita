@extends('layouts.app')

@section('content')

    <div class="untuk-kamu-baca text-center">
        <h4 class="category-title text-center py-1" style="background-color: #E9EBF8; font-weight: 400;">{{ request('search') }}</h4>
        <div class="row row-cols-3 mx-3 px-2">
            @if ($beritas->count())
                @foreach ($beritas as $berita)
                <div class="col mb-3">
                    <div class="ukb-card">
                        <a href="/berita/{{ $berita->slug }}" style="text-decoration: none; color:black;">
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" style="object-fit: cover; width: 100%; height: 300px; max-width: 500px;" class="d-block w-100 bt-img card-img" alt="...">
                            @else
                                <img src="https://picsum.photos/seed/{{ $berita->kategori->kategori }}/1417/745" style="object-fit: cover; width: 100%; height: 300px; max-width: 500px;" class="card-img" alt="...">
                            @endif
                            <p class="card-text p-1">{{ $berita->judul }}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            @else
                <p class="keterangan">Belum ada tulisan</p>
            @endif
        </div>
    </div>
    
@endsection