<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TULISAN SAYA</title>
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
    <a href="/profile/{{ $users->username }}">
        <svg class="mb-3 m-2" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 40 40" fill="none">
            <path d="M31.6668 20H8.3335" stroke="#383961" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M20.0002 31.6667L8.3335 20L20.0002 8.33337" stroke="#383961" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </a>
    <div class="daftar-tulisan-saya mx-4">
        <div class="container-fluid">
            <h3 class="m-0">{{ $beritas->judul }}</h3>
            <h6 class="m-0">Kategori : {{ $beritas->kategori->kategori }}</h6>
            <div class="edit text-end"><a href="/edit-tulisan/update/{{ $beritas->id }}" class="px-3">edit</a></div>
            <p>{{ Str::limit(str_replace('&nbsp;', ' ', strip_tags($beritas->isi))) }}</p>
            <p class="text-end"><small>Terakhir diedit {{ \Carbon\Carbon::parse($beritas->updated_at)->isoFormat('D MMMM') }} | {{ \Carbon\Carbon::parse($beritas->updated_at)->format('H:i') }}</small></p>
            <hr>
        </div>
    </div>
    <!--cdn bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>