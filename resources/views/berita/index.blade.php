@extends('layouts.app')

@section('content')

    <!-- CONTENT START -->
    <div class="container-fluid mt-4 single-news">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                @if ($beritas->gambar)
                    <img class="img-fluid w-100 rounded-4 mb-4" src="{{ asset('storage/' . $beritas->gambar) }}" style="object-fit: cover; width: 100%; height: 450px; max-width: 948px;">
                @else
                    <img class="img-fluid w-100 rounded-4 mb-4" src="https://picsum.photos/seed/{{ $beritas->kategori->kategori }}/1417/745" style="object-fit: cover; width: 100%; height: 450px; max-width: 948px;">
                @endif
                <p>{!! html_entity_decode($beritas->isi) !!}</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h4>{{ $beritas->judul }}</h4>
                <span>{{ \Carbon\Carbon::parse($beritas->created_at)->isoFormat('dddd, D MMMM Y') }} | {{ \Carbon\Carbon::parse($beritas->created_at)->format('H:i') }}</span><br>
                <span>{{ \Carbon\Carbon::parse($beritas->created_at)->diffForHumans() }}</span>
                <div class="news-penulis align-items-center">
                    <div class=" news-penulis-img">
                        <img class="img-fluid" src="{{ asset('images/flynn.png') }}" style="object-fit: cover;">
                    </div>
                    <div class="news-penulis-text">
                        <p class="m-0">{{ $beritas3->user->username }}</p>
                        <span>{{ $beritas3->user->role->role }}</span>
                    </div>
                </div>
                <hr>
                @foreach($carousels->skip(4) as $berita)
                <div class="mb-2 pb-2 text-center">
                    <a href="/berita/{{ $berita->slug }}">
                        <div class="right-img">
                            @if ($berita->gambar)
                                <img class="img-fluid w-100 rounded-4 mb-4" src="{{ asset('storage/' . $berita->gambar) }}" style="object-fit: cover; width: 100%; height: 200px; max-width: 425px;">
                            @else
                                <img class="img-fluid w-100 rounded-4 mb-4" src="https://picsum.photos/seed/{{ $berita->kategori->kategori }}/1417/745" style="object-fit: cover; width: 100%; height: 200px; max-width: 425px;">
                            @endif
                            <div class="caption">
                                <h6>{{ $berita->judul }}</h6>
                                <p class="m-0">{{ $berita->rangkuman }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <hr>
        <!-- UNTUK KAMU BACA START -->
        <div class="untuk-kamu-baca text-center mt-4">
            <h3 class="mb-3">Untuk Kamu Baca</h3>
            <div class="row row-cols-3 mx-3 px-2">
                @foreach($beritas2 as $berita)
                <div class="col mb-3">
                    <div class="ukb-card">
                        <a href="/berita/{{ $berita->slug }}" style="text-decoration: none; color:black;">
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" style="object-fit: cover; width: 100%; height: 300px; max-width: 400px;" class="card-img" alt="...">
                            @else
                                <img src="https://picsum.photos/seed/{{ $berita->kategori->kategori }}/1417/745" style="object-fit: cover; width: 100%; height: 300px; max-width: 400px;" class="card-img" alt="...">
                            @endif
                            <p class="card-text p-1">{{ $berita->judul }}</p>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- UNTUK KAMU BACA END -->
    </div>
    <!-- CONTENT END -->

@endsection