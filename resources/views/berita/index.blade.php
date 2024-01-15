<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BERITA</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- HEADER START -->
    <header>
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
                    <button type="button" style="width:45px;" class="masuk mx-1 btn btn-danger dropdown-toggle dropdown-toggle-split fas fa-circle-user" data-bs-toggle="dropdown" aria-expanded="false"></button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/profile/{{ $users->username }}">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><button class="masuk mx-1"><a style="text-decoration: none; color: #031927" href="/logout">Keluar</a></button></li>
                    </ul>
                    <button class="buat-tulisan mx-1"><a style="text-decoration: none; color: #031927" href="/buat-tulisan">Buat Tulisan</a></button>
                @else
                    <button class="masuk mx-1"><a style="text-decoration: none; color: #031927" href="/login">Masuk</a></button>
                    <button type="button" class="buat-tulisan mx-1" data-bs-toggle="modal" data-bs-target="#notlogin-tulisan-modal"><a style="text-decoration: none; color: #031927">Buat Tulisan</a></button>
                    <div class="modal" id="notlogin-tulisan-modal">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header modal-bg1"></div>
                                <div class="modal-body modal-bg1 dis-modal">
                                    <div>
                                        <h5>ingin membuat tulisan?</h5>
                                        <h5 class="mb-5">Silakan masuk ke akun terlebih dahulu</h5>
                                        <button type="button" class="button1" data-bs-dismiss="modal">Keluar</button>
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

    <!-- CONTENT START -->
    <div class="container-fluid mt-4 single-news">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                @if ($beritas->gambar)
                    <img class="img-fluid w-100 rounded-4 mb-4" src="{{ asset('storage/' . $beritas->gambar) }}" style="border-radius: 5px; width: 1471px; height: 745px; object-fit: cover;">
                @else
                    <img class="img-fluid w-100 rounded-4 mb-4" src="https://source.unsplash.com/1417x745?{{ $beritas->kategori->kategori }}" style="object-fit: cover;">
                @endif
                <p>{{ Str::limit(strip_tags($beritas->isi)) }}</p>
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
                <div class="mb-2 pb-2">
                    <a href="/berita/{{ $berita->slug }}">
                        <div class="right-img">
                            @if ($berita->gambar)
                                <img class="img-fluid w-100 rounded-4 mb-4" src="{{ asset('storage/' . $berita->gambar) }}" style="border-radius: 5px; width: 1471px; height: 745px;">
                            @else
                                <img class="img-fluid w-100 rounded-4 mb-4" src="https://source.unsplash.com/1417x745?{{ $beritas->kategori->kategori }}">
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
                                <img src="{{ asset('storage/' . $berita->gambar) }}" style="border-radius: 5px; width: 1471px; height: 745px;" class="card-img" alt="...">
                            @else
                                <img src="https://source.unsplash.com/1417x745?{{ $berita->kategori->kategori }}" class="card-img" alt="...">
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

    <!-- FOOTER START -->
    <div class="container-fluid mt-5 footer">
        <div class="row pt-4 align-items-center text-center">
            <div class="col-lg-3 col-md-3 col-sm-3 mb-4 footer-1 text-center">
                <h1 class="m-0">BRINI</h1>
                <p class="m-0">Berita Terkini</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 mb-4 footer-2">
                <h6 class="">Kategori</h6>
                @foreach ($kategoris as $kategori)
                    <a href="/kategori/{{ $kategori->kategori }}">{{ $kategori->kategori }}</a><br>
                @endforeach
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 mb-4 footer-3">
                <a href="#">
                    <p class="m-0">Tentang Kami</p>
                </a>
                <a href="#">
                    <p class="m-0">Kontak</p>
                </a>
                <a href="#">
                    <p class="m-0">Kebijakan Pribadi</p>
                </a>
                <a href="#">
                    <p class="m-0">Syarat dan Ketentuan</p>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 mb-4 footer-4 text-center">
                <p class="m-0">Sosial Media</p>
                <div class="sosial-media-icons">
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-x-twitter"></i></a>
                    <a href=""><i class="fa-regular fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-center copyright p-1 m-0">
        Copyright &copy 2023, BRINI. All Rights Reserved.
    </div>
    <!-- FOOTER END -->
    <!--cdn bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>