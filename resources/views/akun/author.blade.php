<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Penulis</title>
    <!--css style-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!--cdn bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    @include('sweetalert::alert')
    <!-- HEADER START -->
    <header class="akun-header">
        <!-- TOPBAR START -->
        <div class="top-bar align-items-center p-2">
            <h2 class="m-0 mx-4">BRINI</h2>
            <div class="me-2">
                <form class="search-bar" role="search" action="/search">
                    <input class="form-control" type="text" id="search-bar" name="search" placeholder="Cari di sini" value="{{ request('search') }}" />
                    <button class="btn btn-outline-success" style="display: flex; place-items: center; background-color:#383961; border-color:#383961;" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                                stroke="#EFEFEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M20.9999 20.9999L16.6499 16.6499" stroke="#EFEFEF" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="nav-btn">
                @if (Auth::user('guest'))
                    <button class="buat-tulisan mx-1 ms-4"><a style="text-decoration: none; color: #031927" href="/buat-tulisan">Buat Tulisan</a></button>
                    <button type="button" style="width:50px;" class="masuk mx-1 me-4 btn btn-danger dropdown-toggle dropdown-toggle-split fas fa-circle-user" data-bs-toggle="dropdown" aria-expanded="false"></button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/profile/{{ $users->username }}">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><button class="masuk mx-1"><a style="text-decoration: none; color: #031927" href="/logout">Keluar</a></button></li>
                    </ul>
                @else
                    <button type="button" class="buat-tulisan mx-1" data-bs-toggle="modal" data-bs-target="#notlogin-tulisan-modal"><a style="text-decoration: none; color: #031927">Buat Tulisan</a></button>
                    <button class="masuk mx-1"><a style="text-decoration: none; color: #031927" href="/login">Masuk</a></button>
                    <div class="modal" id="notlogin-tulisan-modal">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header modal-bg1"></div>
                                <div class="modal-body modal-bg1 dis-modal">
                                    <div>
                                        <h5>ingin membuat tulisan?</h5>
                                        <h5 class="mb-5">Silakan masuk ke akun terlebih dahulu</h5>
                                        <button type="button" class="button1" data-bs-dismiss="modal">Kembali</button>
                                        <button type="button" class="button2"><a href="/login" style="text-decoration: none; color: black">Masuk Akun</a></button>
                                    </div>
                                    
                                    <img src="{{ asset('images/not_login1.png') }}" alt="">
                                </div>
                                <div class="modalFooter text-center modal-bg1"></div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <!-- TOPBAR END -->

        <!-- NAVBAR START -->
        <div class="nav-bar py-1 px-2">
            <a href="/">Beranda</a>
            @foreach ($kategoris as $kategori)
                <a href="/kategori/{{ $kategori->kategori }}">{{ $kategori->kategori }}</a>
            @endforeach
        </div>
        <!-- NAVBAR END -->
    </header>
    <!-- HEADER END -->

    <!-- PROFIL SAYA START -->
    <h5 class="text-center mt-4 akun-title">Profil Penulis</h5>
    <div class="profil-saya mb-3">
        <div class="row mx-2">
            <div class="col-8">
                <div class="profil-saya-left">
                    <div class="container">
                        @if ($users->gambar)
                            <img src="{{ asset('storage/' . $users->gambar) }}" alt="" class="img-fluid">
                        @else
                            <img src="{{ asset('images/flynn.png') }}" alt="" class="img-fluid">
                        @endif
                        <div class="profil-saya-left-text">
                            <p class="nama m-0">{{ $author->username }}</p>
                            <p class="tulisan m-0">{{ $beritas->count() }} tulisan</p>
                            <p class="bergabung-sejak m-0 mb-4">Bergabung sejak {{ \Carbon\Carbon::parse($author->created_at)->isoFormat('D MMMM Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="tulisan-populer">
                    <div class="container text-center">
                        <p class="title m-0 mt-2">Tulisan Terbaru</p>
                        <p class="penulis m-0">dari {{ $author->username }}</p>

                        @if ($beritas->isEmpty())
                            <p class="keterangan">Belum ada tulisan populer dari {{ $author->username }}</p>
                        @else
                            <div class="ukb-card">
                                <a href="/berita/{{ $beritas2->slug }}" style="text-decoration: none; color:black;">
                                    @if ($beritas2->gambar)
                                        <img src="{{ $beritas2->gambar ? asset('storage/' . $beritas2->gambar) : 'https://source.unsplash.com/1417x745?' }}" style="object-fit: cover; width: 100%; height: 200px; max-width: 425px;" class="d-block w-100 rounded-4" alt="...">
                                    @else
                                        <img src="https://picsum.photos/seed/{{ $beritas2->kategori->kategori }}/1471/745" style="object-fit: cover; width: 100%; height: 200px; max-width: 425px;" class="card-img" alt="">
                                    @endif
                                    <p class="card-text p-1">{{ $beritas2->judul }}</p>
                                </a>
                            </div>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tulisan-saya text-center mt-4">
        <h5 class="title mb-4">Tulisan Penulis</h5>
        @if ($beritas->isEmpty())
            <p class="keterangan">Belum ada tulisan dari {{ $author->username }}</p>
        @else
            @foreach ($beritas as $berita)
            <div class="tulisan-saya-list mb-4 text-start mx-5 px-4 py-1">
                <p class="m-0 text-end"><small>{{ \Carbon\Carbon::parse($berita->created_at)->isoFormat('D MMMM Y') }}</small></p>
                <h6 class="m-0">{{ $berita->judul }}</h6>
                <p>{{ Str::limit($berita->isi, 200, '...') }}</p>
                <div class="tulisan-saya-btn text-end">
                    <a href="/tulisan/{{ $berita->slug }}"><button class="baca-tulisan px-4 py-1 ms-4">Baca Tulisan</button></a>
                </div>
            </div>
            @endforeach
        @endif
        <a href="/buat-tulisan"><button class="px-5 py-1 mb-5">Tambah Tulisan</button></a>
    </div>

    <!-- PROFIL SAYA END -->
    <!--cdn bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>