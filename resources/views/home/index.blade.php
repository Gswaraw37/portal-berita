@extends('layouts.app')

@section('content')

    <!-- CONTENT START -->
    <!-- BERITA POPULER START -->
    <div class="container-fluid text-center mt-3">
        <div class="row">
            <div class="col-7">
                <div id="carouselBP" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselBP" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselBP" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselBP" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        @foreach ($carouselBeritas as $beritaa)
                        <div class="carousel-item active">
                            <a href="/berita/{{ $beritaa->slug }}" style="text-decoration: none">
                                @if ($beritaa->gambar)
                                    <img src="{{ asset('storage/' . $beritaa->gambar) }}" style="object-fit: cover; width: 100%; height: 478px; max-width: 819px;" class="d-block w-100 rounded-4" alt="...">
                                @else
                                    <img src="https://picsum.photos/seed/{{ $berita->kategori->kategori }}/1417/745" style="object-fit: cover; width: 100%; height: 478px; max-width: 819px;" class="d-block w-100 rounded-4" alt="...">
                                @endif
                                <div class="carousel-caption d-none d-md-block mb-4 py-0">
                                    <h5 class="m-0">{{ $beritaa->judul }}</h5>
                                    <p class="m-0">{{ $beritaa->rangkuman }}</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselBP"
                        data-bs-slide="prev">
                        <span class="carousel-prev-icon" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44"
                                fill="none">
                                <path
                                    d="M22 42C33.046 42 42 33.046 42 22C42 10.954 33.046 2 22 2C10.954 2 2 10.954 2 22C2 33.046 10.954 42 22 42Z"
                                    fill="#E9EBF8" stroke="#E9EBF8" stroke-width="4" stroke-linejoin="round" />
                                <path d="M25 31L16 22L25 13" fill="#E9EBF8" />
                                <path d="M25 31L16 22L25 13" stroke="#383961" stroke-width="4" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselBP"
                        data-bs-slide="next">
                        <span class="carousel-next-icon" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44"
                                fill="none">
                                <path
                                    d="M22 2C10.954 2 2 10.954 2 22C2 33.046 10.954 42 22 42C33.046 42 42 33.046 42 22C42 10.954 33.046 2 22 2Z"
                                    fill="#E9EBF8" stroke="#E9EBF8" stroke-width="4" stroke-linejoin="round" />
                                <path d="M19 13L28 22L19 31" fill="#E9EBF8" />
                                <path d="M19 13L28 22L19 31" stroke="#383961" stroke-width="4" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
            <div class="col-5">
                <div class="berita-populer" style="background-color: #E9EBF8;">
                    <h3 class="pt-2">Berita Populer</h3>
                    <div class="berita-populer-wrapper">
                        @foreach ($beritas2 as $berita)
                            <div class="berita-populer-list">
                                <a href="/berita/{{ $berita->slug }}" style="text-decoration: none; display:flex; color:black">
                                    @if ($berita->gambar)
                                        <img src="{{ asset('storage/' . $berita->gambar) }}" style="object-fit: cover; width: 100%; height: 75px; max-width: 90px;" alt="...">
                                    @else
                                        <img src="https://picsum.photos/seed/{{ $berita->kategori->kategori }}/1417/745" style="object-fit: cover; width: 100%; height: 75px; max-width: 90px;" alt="">
                                    @endif
                                    <p class="m-2">{{ $berita->judul }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BERITA POPULER END -->

    <!-- BERITA TERKINI START -->
    <div class="berita-terkini px-3 py-2 mt-3">
        <h3>Berita Terkini</h3>
        <div id="carouselBT" class="carousel slide">
            <div class="carousel-inner">
                @foreach ($carousels2->chunk(4) as $chunkIndex => $beritaChunk)
                    <div class="carousel-item @if($chunkIndex == 0) active @endif">
                        <div class="row">
                            @foreach ($beritaChunk as $berita)
                                <div class="col">
                                    <a href="/berita/{{ $berita->slug }}" style="text-decoration: none">
                                        @if ($berita->gambar)
                                            <img src="{{ asset('storage/' . $berita->gambar) }}" style="object-fit: cover; width: 100%; height: 200px; max-width: 350px;" class="d-block w-100 bt-img" alt="...">
                                        @else
                                            <img src="https://picsum.photos/seed/{{ $berita->kategori->kategori }}/350/200" style="object-fit: cover; width: 100%; height: 200px; max-width: 350px;" class="d-block w-100 bt-img" alt="">
                                        @endif
                                        <div class="berita-terkini-overlay">
                                            <p>{{ $berita->judul }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselBT" data-bs-slide="prev">
                <span class="carousel-prev-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none">
                        <path
                            d="M22 42C33.046 42 42 33.046 42 22C42 10.954 33.046 2 22 2C10.954 2 2 10.954 2 22C2 33.046 10.954 42 22 42Z"
                            fill="#E9EBF8" stroke="#E9EBF8" stroke-width="4" stroke-linejoin="round" />
                        <path d="M25 31L16 22L25 13" fill="#E9EBF8" />
                        <path d="M25 31L16 22L25 13" stroke="#383961" stroke-width="4" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselBT" data-bs-slide="next">
                <span class="carousel-next-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none">
                        <path
                            d="M22 2C10.954 2 2 10.954 2 22C2 33.046 10.954 42 22 42C33.046 42 42 33.046 42 22C42 10.954 33.046 2 22 2Z"
                            fill="#E9EBF8" stroke="#E9EBF8" stroke-width="4" stroke-linejoin="round" />
                        <path d="M19 13L28 22L19 31" fill="#E9EBF8" />
                        <path d="M19 13L28 22L19 31" stroke="#383961" stroke-width="4" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
    <!-- BERITA TERKINI END -->

    <!-- TERPOPULER START -->
    <div class="terpopuler mt-5">
        <div class="row justify-content-center">
            <!-- KATA KUNCI-->
            <div class="col-lg-4 col-md-5 col-sm-6 terpopuler-border">
                <h5 class="text-center">Penulis Terpopuler</h5>
                <ol class="kata-kunci-terpopuler px-5 text-start">
                    @foreach ($topAuthors as $item)
                        <li>
                            <h6 class="m-0 mt-2">
                                <a href="{{ route('author.profile', ['username' => $item->username]) }}" style="text-decoration: none; color: inherit;">
                                    {{ $item->username }}
                                </a>
                            </h6>
                            <p class="m-0">{{ $item->jumlah_berita }} unggahan</p>
                        </li>
                    @endforeach
                </ol>
            </div>
            <!-- TULISAN -->
            <div class="col-lg-4 col-md-5 col-sm-6">
                <h5 class="text-center">Kategori Terpopuler</h5>
                <ol class="tulisan-terpopuler px-5 text-start">
                    @foreach ($topCategories as $item)
                        <li>
                            <h6 class="m-0 mt-2"><a href="/kategori/{{ $item->kategori }}" style="text-decoration: none; color:black">{{ $item->kategori }}</a></h6>
                            <p class="m-0">{{ $item->jumlah_berita }} Berita</p>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
    <!-- TERPOPULER END -->

    <!-- UNTUK KAMU BACA START -->
    <div class="untuk-kamu-baca text-center mt-5">
        <h3 class="mb-3">Untuk Kamu Baca</h3>
        <div class="row row-cols-3 mx-3 px-2">
            @foreach ($latestBeritas as $berita)
            <div class="col mb-3">
                <div class="ukb-card">
                    <a href="/berita/{{ $berita->slug }}" style="text-decoration: none; color:black;">
                        @if ($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img" alt="...">
                        @else
                            <img src="https://picsum.photos/seed/{{ $berita->kategori->kategori }}/1471/745" class="card-img" alt="">
                        @endif
                        <p class="card-text p-1">{{ $berita->judul }}</p>
                    </a>
                </div>
            </div>
            @endforeach
            <div style="margin: 0 auto">
                {{ $latestBeritas->links() }}
            </div>
        </div>
    </div>
    <!-- UNTUK KAMU BACA END -->
    <!-- CONTENT END -->

@endsection