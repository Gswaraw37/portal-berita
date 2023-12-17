<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRINI</title>
    <!--css style-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />

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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <!-- TOPBAR START -->
    <div class="top-bar align-items-center p-2">
        <h2 class="m-0 mx-4">BRINI</h2>
        {{-- <form action="/berita">
            <div class="searchbar justify-content-center">
                <input type="text" class="form-control" placeholder="Cari di sini" name="search" />
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </form> --}}
        <form class="d-flex" role="search" action="/berita">
            <input class="form-control me-2" type="search" placeholder="Cari di sini" name="search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        @if (Auth::user('guest'))
            <a href="/logout">logout</a>
            <button class="buat-tulisan"><a style="text-decoration: none; color: #031927" href="/buat-tulisan">Buat Tulisan</a></button>
        @else
            <button class="masuk"><a style="text-decoration: none; color: #031927" href="/login">Masuk</a></button>
            <button class="buat-tulisan"><a style="text-decoration: none; color: #031927" href="/login">Buat Tulisan</a></button>
        @endif
    </div>
    <!-- TOPBAR END -->

    <!-- NAVBAR START -->
    <div class="nav-bar py-1 px-2">
        <a href="/">Beranda</a>
        @foreach ($kategoris as $kategori)
            <a href="/{{ $kategori->id }}">{{ $kategori->kategori }}</a>
        @endforeach
    </div>
    <!-- NAVBAR END -->

    <!--cdn bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>