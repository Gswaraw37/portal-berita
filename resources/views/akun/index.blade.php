<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKUN</title>
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

    <!-- PROFIL SAYA START -->
    <h5 class="text-center mt-4 akun-title">Profil Saya</h5>
    <div class="profil-saya mb-3">
        <div class="row mx-2">
            <div class="col-8">
                <div class="profil-saya-left">
                    <div class="container">
                        <img src="{{ asset('images/flynn.png') }}" alt="" class="img-fluid">
                        <div class="profil-saya-left-text">
                            <p class="nama m-0">{{ $users->username }}</p>
                            <p class="tulisan m-0">{{ $tulisans }} tulisan</p>
                            <p class="bergabung-sejak m-0 mb-4">Bergabung sejak {{ \Carbon\Carbon::parse($users->created_at)->isoFormat('D MMMM Y') }}</p>
                            <a href="/profile/edit/{{ $users->id }}"><button class="px-3">Edit Profil</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="tulisan-populer">
                    <div class="container text-center">
                        <p class="title m-0 mt-2">Tulisan Populer</p>
                        <p class="penulis m-0">dari {{ auth()->user()->username }}</p>

                        @if ($tulisans == 0)
                            <p class="keterangan">Belum ada tulisan populer dari {{ $users->username }}</p>
                        @else
                            {{-- <img src="https://source.unsplash.com/1417x745?" class="d-block w-100 rounded-4" alt="...">
                            <div class="carousel-caption d-none d-md-block mb-4 py-0">
                                <h5 class="m-0">{{ $beritas2->judul }}</h5>
                                <p class="m-0">{{ $beritas2->rangkuman }}</p>
                            </div> --}}
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tulisan-saya text-center">
        <h5 class="title mb-4">Tulisan Saya</h5>
        @if ($tulisans == 0)
            <p class="keterangan">Belum ada tulisan dari {{ auth()->user()->username }}</p>
        @else
            @foreach ($beritas as $berita)
            <div class="tulisan-saya-list mb-4 text-start mx-5 px-4 py-1">
                <p class="m-0 text-end"><small>{{ \Carbon\Carbon::parse($berita->created_at)->isoFormat('D MMMM Y') }}</small></p>
                <h6 class="m-0">Tulisan Saya</h6>
                <p>{{ Str::limit($berita->isi, 200, '...') }}</p>
                <div class="tulisan-saya-btn text-end"">
                    <form action="/berita/{{ $berita->id }}" class="d-inline" method="post">
                    @csrf
					@method('DELETE')
                        <button class="hapus-tulisan px-4 py-1" type="button" data-bs-toggle="modal" data-bs-target="#confirm-hapustulis-modal">
                            <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 25 25" fill="none">
                                <path
                                    d="M7.29151 21.875C6.71859 21.875 6.22797 21.6708 5.81963 21.2625C5.4113 20.8542 5.20748 20.3639 5.20817 19.7917V6.25C4.91304 6.25 4.66547 6.15 4.46547 5.95C4.26547 5.75 4.16581 5.50278 4.16651 5.20834C4.16651 4.9132 4.26651 4.66563 4.46651 4.46563C4.66651 4.26563 4.91373 4.16598 5.20817 4.16667H9.37484C9.37484 3.87153 9.47484 3.62396 9.67484 3.42396C9.87484 3.22396 10.1221 3.12431 10.4165 3.125H14.5832C14.8783 3.125 15.1259 3.225 15.3259 3.425C15.5259 3.625 15.6255 3.87223 15.6248 4.16667H19.7915C20.0866 4.16667 20.3342 4.26667 20.5342 4.46667C20.7342 4.66667 20.8339 4.91389 20.8332 5.20834C20.8332 5.50348 20.7332 5.75105 20.5332 5.95105C20.3332 6.15105 20.086 6.2507 19.7915 6.25V19.7917C19.7915 20.3646 19.5873 20.8552 19.179 21.2635C18.7707 21.6719 18.2804 21.8757 17.7082 21.875H7.29151ZM7.29151 6.25V19.7917H17.7082V6.25H7.29151ZM9.37484 16.6667C9.37484 16.9618 9.47484 17.2094 9.67484 17.4094C9.87484 17.6094 10.1221 17.709 10.4165 17.7083C10.7116 17.7083 10.9592 17.6083 11.1592 17.4083C11.3592 17.2083 11.4589 16.9611 11.4582 16.6667V9.375C11.4582 9.07986 11.3582 8.83229 11.1582 8.63229C10.9582 8.43229 10.711 8.33264 10.4165 8.33334C10.1214 8.33334 9.8738 8.43334 9.6738 8.63334C9.4738 8.83334 9.37415 9.08056 9.37484 9.375V16.6667ZM13.5415 16.6667C13.5415 16.9618 13.6415 17.2094 13.8415 17.4094C14.0415 17.6094 14.2887 17.709 14.5832 17.7083C14.8783 17.7083 15.1259 17.6083 15.3259 17.4083C15.5259 17.2083 15.6255 16.9611 15.6248 16.6667V9.375C15.6248 9.07986 15.5248 8.83229 15.3248 8.63229C15.1248 8.43229 14.8776 8.33264 14.5832 8.33334C14.288 8.33334 14.0405 8.43334 13.8405 8.63334C13.6405 8.83334 13.5408 9.08056 13.5415 9.375V16.6667Z"
                                    fill="#383961" />
                            </svg>
                            Hapus Tulisan
                        </button>
                        <div class="modal" id="confirm-hapustulis-modal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header modal-bg1">
                                        {{-- <h5>ingin menghapus tulisan?</h5> --}}
                                        {{-- <button type="button" data-bs-dismiss="modal" aria-label="Close">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 50 50"
                                                fill="none">
                                                <path
                                                    d="M25.0001 45.8333C36.506 45.8333 45.8334 36.5059 45.8334 25C45.8334 13.494 36.506 4.16663 25.0001 4.16663C13.4941 4.16663 4.16675 13.494 4.16675 25C4.16675 36.5059 13.4941 45.8333 25.0001 45.8333Z"
                                                    stroke="black" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M31.25 18.75L18.75 31.25" stroke="black" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M18.75 18.75L31.25 31.25" stroke="black" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg></button> --}}
                                    </div>
                                    <div class="modal-body modal-bg1">
                                        <h5>Anda Yakin Ingin Menghapus Tulisan  ini?</h5>
                                    </div>
                                    <div class="modalFooter text-center modal-bg1">
                                        <div class="mb-3">
                                            <button type="button" class="button1" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" name="submit" class="button2"><a>Hapus</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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