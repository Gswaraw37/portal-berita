<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRINI</title>
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
                        @foreach ($carousels as $beritaa)
                        <div class="carousel-item active">
                            <a href="/berita/{{ $beritaa->slug }}" style="text-decoration: none">
                                <img src="images/flynn.png" class="d-block w-100 rounded-4" alt="...">
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

                        @php
                            $arr = [];
                            $arr2 = [];
                        @endphp

                        @foreach ($beritas2 as $berita)
                            @php
                                $arr[] = $berita->judul;
                                $arr2[] = $berita->slug;
                            @endphp
                        @endforeach

                        <div class="berita-populer-list">
                            <a href="/berita/{{ $arr2[0] }}" style="text-decoration: none; display:flex; color:black">
                                <img src="images/kodok.png" alt="">
                                <p class="m-2">{{ $arr[0] }}</p>
                            </a>
                        </div>
                        <div class="berita-populer-list">
                            <a href="/berita/{{ $arr2[3] }}" style="text-decoration: none; display:flex; color:black">
                                <img src="images/flynn.png" alt="">
                                <p class="m-2">{{ $arr[3] }}</p>
                            </a>
                        </div>
                        <div class="berita-populer-list">
                            <a href="/berita/{{ $arr2[5] }}" style="text-decoration: none; display:flex; color:black">
                                <img src="images/maximus.png" alt="">
                                <p class="m-2">{{ $arr[5] }}</p>
                            </a>
                        </div>
                        <div class="berita-populer-list">
                            <a href="/berita/{{ $arr2[37] }}" style="text-decoration: none; display:flex; color:black">
                                <img src="images/kodok.png" alt="">
                                <p class="m-2">{{ $arr[37] }}</p>
                            </a>
                        </div>
                        <div class="berita-populer-list">
                            <a href="/berita/{{ $arr2[9] }}" style="text-decoration: none; display:flex; color:black">
                                <img src="images/flynn.png" alt="">
                                <p class="m-2">{{ $arr[9] }}</p>
                            </a>
                        </div>
                        <div class="berita-populer-list">
                            <a href="/berita/{{ $arr2[11] }}" style="text-decoration: none; display:flex; color:black">
                                <img src="images/maximus.png" alt="">
                                <p class="m-2">{{ $arr[11] }}</p>
                            </a>
                        </div>
                        <div class="berita-populer-list">
                            <a href="/berita/{{ $arr2[13] }}" style="text-decoration: none; display:flex; color:black">
                                <img src="images/kodok.png" alt="">
                                <p class="m-2">{{ $arr[13] }}</p>
                            </a>
                        </div>
                        <div class="berita-populer-list">
                            <a href="/berita/{{ $arr2[17] }}" style="text-decoration: none; display:flex; color:black">
                                <img src="images/flynn.png" alt="">
                                <p class="m-2">{{ $arr[17] }}</p>
                            </a>
                        </div>
                        <div class="berita-populer-list">
                            <a href="/berita/{{ $arr2[35] }}" style="text-decoration: none; display:flex; color:black">
                                <img src="images/maximus.png" alt="">
                                <p class="m-2">{{ $arr[35] }}</p>
                            </a>
                        </div>
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

            @php
                $arr = [];
                $arr2 = [];
            @endphp

            @foreach ($carousels2 as $berita)
                @php
                    $arr[] = $berita->judul;
                    $arr2[] = $berita->slug;
                @endphp
            @endforeach

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col">
                            <a href="/berita/{{ $arr2[0] }}" style="text-decoration: none">
                                <img src="images/maximus.png" class="d-block w-100 bt-img" alt="kodok">
                                <div class="berita-terkini-overlay">
                                    <p>{{ $arr[0] }}</p>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="/berita/{{ $arr2[1] }}" style="text-decoration: none">
                                <img src="images/maximus.png" class="d-block w-100 bt-img" alt="kodok">
                                <div class="berita-terkini-overlay">
                                    <p>{{ $arr[1] }}</p>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="/berita/{{ $arr2[2] }}" style="text-decoration: none">
                                <img src="images/maximus.png" class="d-block w-100 bt-img" alt="kodok">
                                <div class="berita-terkini-overlay">
                                    <p>{{ $arr[2] }}</p>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="/berita/{{ $arr2[3] }}" style="text-decoration: none">
                                <img src="images/maximus.png" class="d-block w-100 bt-img" alt="kodok">
                                <div class="berita-terkini-overlay">
                                    <p>{{ $arr[3] }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col">
                            <a href="/berita/{{ $arr2[4] }}" style="text-decoration: none">
                                <img src="images/maximus.png" class="d-block w-100 bt-img" alt="kodok">
                                <div class="berita-terkini-overlay">
                                    <p>{{ $arr[4] }}</p>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="/berita/{{ $arr2[5] }}" style="text-decoration: none">
                                <img src="images/maximus.png" class="d-block w-100 bt-img" alt="kodok">
                                <div class="berita-terkini-overlay">
                                    <p>{{ $arr[5] }}</p>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="/berita/{{ $arr2[6] }}" style="text-decoration: none">
                                <img src="images/maximus.png" class="d-block w-100 bt-img" alt="kodok">
                                <div class="berita-terkini-overlay">
                                    <p>{{ $arr[6] }}</p>
                                </div>
                            </a>
                        </div>
                        <div class="col">
                            <a href="/berita/{{ $arr2[8] }}" style="text-decoration: none">
                                <img src="images/maximus.png" class="d-block w-100 bt-img" alt="kodok">
                                <div class="berita-terkini-overlay">
                                    <p>{{ $arr[8] }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
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
                <h5 class="text-center">Kata Kunci Terpopuler</h5>
                <ol class="kata-kunci-terpopuler px-5 text-start">
                    <li>
                        <h6 class="m-0">ChatGPT</h6>
                        <p class="m-0">613 unggahan</p>
                    </li>
                    <li>
                        <h6 class="m-0 mt-2">ChatGPT</h6>
                        <p class="m-0">613 unggahan</p>
                    </li>
                    <li>
                        <h6 class="m-0 mt-2">ChatGPT</h6>
                        <p class="m-0">613 unggahan</p>
                    </li>
                    <li>
                        <h6 class="m-0 mt-2">ChatGPT</h6>
                        <p class="m-0">613 unggahan</p>
                    </li>
                    <li>
                        <h6 class="m-0 mt-2">ChatGPT</h6>
                        <p class="m-0">613 unggahan</p>
                    </li>
                </ol>
            </div>
            <!-- TULISAN -->
            <div class="col-lg-4 col-md-5 col-sm-6">
                <h5 class="text-center">Tulisan Terpopuler</h5>
                <ol class="tulisan-terpopuler px-5 text-start">
                    <li>
                        <h6 class="m-0">Skincare paling ampuh</h6>
                        <p class="m-0">2013 kali dibaca</p>
                    </li>
                    <li>
                        <h6 class="m-0 mt-2">Skincare paling ampuh</h6>
                        <p class="m-0">2013 kali dibaca</p>
                    </li>
                    <li>
                        <h6 class="m-0 mt-2">Skincare paling ampuh</h6>
                        <p class="m-0">2013 kali dibaca</p>
                    </li>
                    <li>
                        <h6 class="m-0 mt-2">Skincare paling ampuh</h6>
                        <p class="m-0">2013 kali dibaca</p>
                    </li>
                    <li>
                        <h6 class="m-0 mt-2">Skincare paling ampuh</h6>
                        <p class="m-0">2013 kali dibaca</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- TERPOPULER END -->

    <!-- UNTUK KAMU BACA START -->
    <div class="untuk-kamu-baca text-center mt-5">
        <h3 class="mb-3">Untuk Kamu Baca</h3>
        <div class="row row-cols-3 mx-3 px-2">
            @foreach ($beritas as $berita)
            <div class="col mb-3">
                <div class="ukb-card">
                    <a href="/berita/{{ $berita->slug }}" style="text-decoration: none; color:black;">
                        <img src="images/flynn.png" class="card-img" alt="...">
                        <p class="card-text p-1">{{ $berita->judul }}</p>
                    </a>
                </div>
            </div>
            @endforeach
            {{-- {{ $beritas->withQueryString()->links() }} --}}
        </div>
    </div>
    <!-- UNTUK KAMU BACA END -->
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