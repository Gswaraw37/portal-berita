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
            <div class="search-bar me-2">
                <input type="text" id="search-bar" placeholder="Cari di sini" />
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                        stroke="#EFEFEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M20.9999 20.9999L16.6499 16.6499" stroke="#EFEFEF" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
            </div>
            <div class="nav-btn">
                @if (Auth::user('guest'))
                    <button type="button" style="width:45px;" class="masuk mx-1 btn btn-danger dropdown-toggle dropdown-toggle-split fas fa-circle-user" data-bs-toggle="dropdown" aria-expanded="false"></button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><button class="masuk mx-1"><a style="text-decoration: none; color: #031927" href="/logout">Keluar</a></button></li>
                    </ul>
                    <button class="buat-tulisan mx-1"><a style="text-decoration: none; color: #031927" href="/buat-tulisan">Buat Tulisan</a></button>
                @else
                    <button class="masuk mx-1"><a style="text-decoration: none; color: #031927" href="/login">Masuk</a></button>
                    <button class="buat-tulisan mx-1"><a style="text-decoration: none; color: #031927" href="/login">Buat Tulisan</a></button>
                @endif
            </div>

        </div>
        <!-- TOPBAR END -->

        <!-- NAVBAR START -->
        <div class="nav-bar py-1 px-2">
            <a href="/">Beranda</a>
            @foreach ($kategoris as $kategori)
                <a href="/{{ $kategori->kategori }}">{{ $kategori->kategori }}</a>
            @endforeach
        </div>
        <!-- NAVBAR END -->
    </header>
    <!-- HEADER END -->

    <!-- CONTENT START -->
    <div class="container-fluid mt-4 single-news">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <img class="img-fluid w-100 rounded-4 mb-4" src="images/kodok.png" style="object-fit: cover;">
                <p>{{ $beritas->isi }}</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h4>{{ $beritas->judul }}</h4>
                <span>{{ \Carbon\Carbon::parse($beritas->created_at)->format('d/m/Y') }} | {{ \Carbon\Carbon::parse($beritas->created_at)->format('H:i') }}</span>
                <div class="news-penulis align-items-center">
                    <div class=" news-penulis-img">
                        <img class="img-fluid" src="images/flynn.png" style="object-fit: cover;">
                    </div>
                    <div class="news-penulis-text">
                        {{-- <p class="m-0">{{ $beritas->user->username }}</p> --}}
                        <span>{{ $roles->role->role }}</span>
                    </div>
                </div>
                <hr>
                <div class="mb-2 pb-2">
                    <a href="">
                        <div class="right-img">
                            <img class="img-fluid rounded-4" src="images/maximus.png" alt="">
                            <div class="caption">
                                <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h6>
                                <p class="m-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse, tempora.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mb-2 pb-2">
                    <a href="">
                        <div class="right-img">
                            <img class="img-fluid rounded-4" src="images/maximus.png" alt="">
                            <div class="caption">
                                <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h6>
                                <p class="m-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse, tempora.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mb-2 pb-2">
                    <a href="">
                        <div class="right-img">
                            <img class="img-fluid rounded-4" src="images/maximus.png" alt="">
                            <div class="caption">
                                <h6>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h6>
                                <p class="m-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse, tempora.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
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
                            <img src="images/flynn.png" class="card-img" alt="...">
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
                <a href="#">
                    <p class="m-0">Ekonomi</p>
                </a>
                <a href="#">
                    <p class="m-0">Teknologi</p>
                </a>
                <a href="#">
                    <p class="m-0">Hukum</p>
                </a>
                <a href="#">
                    <p class="m-0">Sosial</p>
                </a>
                <a href="#">
                    <p class="m-0">Kesehatan</p>
                </a>
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