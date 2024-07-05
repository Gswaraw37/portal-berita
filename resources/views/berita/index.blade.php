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
                <div class="news-penulis align-items-center mb-3">
                    <div class=" news-penulis-img">
                        <img class="img-fluid" src="{{ asset('images/flynn.png') }}" style="object-fit: cover;">
                    </div>
                    <div class="news-penulis-text">
                        <p class="m-0"><a href="{{ route('author.profile', ['username' => $beritas3->user->username]) }}" style="text-decoration: none; color: inherit;">
                            {{ $beritas3->user->username }}
                        </a></p>
                        <span>{{ $beritas3->user->role->role }}</span>
                    </div>
                </div>
                @auth
                    <div class="tulisan-saya-btn text-start">
                        <form action="{{ route('lapor.berita') }}" class="d-inline" method="post">
                        @csrf
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 25 25" fill="none">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2" fill="#FFFFFF"/>
                            </svg>
                            Laporkan Berita
                            </button>
                            
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Laporkan Berita</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <div class="col-8">
                                        <input type="hidden" id="berita_id" name="berita_id" cols="40" rows="5" class="form-control" value="{{ $beritas->id }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="penyebab" class="col-2.5 col-form-label">Penyebab</label> 
                                        <div class="col-12">
                                        <select id="penyebab" name="penyebab" class="custom-select" required>
                                            <option class="kategori-placeholder">-- Pilih Penyebab Laporan Anda --</option>
                                            @foreach ($penyebab as $p)
                                                <option value="{{ $p }}">{{ $p }}</option> 
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alasan" class="col-2.5 col-form-label">Alasan</label> 
                                        <div class="col-12">
                                        <textarea id="alasan" name="alasan" cols="40" rows="5" class="form-control" placeholder="Tuliskan alasan Anda..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Laporkan</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                @endauth
                <hr>
                @foreach($carousels->skip(4) as $berita)
                <div class="mb-2 pb-2 text-center">
                    <a href="/berita/{{ $berita->slug }}">
                        <div class="right-img">
                            @if ($berita->gambar)
                                <img class="img-fluid w-100 rounded-4 mb-4" src="{{ asset('storage/' . $berita->gambar) }}" style="object-fit: cover; width: 100%; height: 300px; max-width: 425px;">
                            @else
                                <img class="img-fluid w-100 rounded-4 mb-4" src="https://picsum.photos/seed/{{ $berita->kategori->kategori }}/425/200" style="object-fit: cover; width: 100%; height: 300px; max-width: 425px;">
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
                                <img src="{{ asset('storage/' . $berita->gambar) }}" style="object-fit: cover; width: 100%; height: 300px; max-width: 500px;" class="card-img" alt="...">
                            @else
                                <img src="https://picsum.photos/seed/{{ $berita->kategori->kategori }}/1417/745" style="object-fit: cover; width: 100%; height: 300px; max-width: 500px;" class="card-img" alt="...">
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