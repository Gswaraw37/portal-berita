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
            <div class="edit text-end"><a href="" class="px-3">edit</a></div>
            <p>{{ Str::limit(strip_tags($beritas->isi)) }}</p>
            <p class="text-end"><small>Terakhir diedit {{ \Carbon\Carbon::parse($beritas->updated_at)->isoFormat('D MMMM') }} | {{ \Carbon\Carbon::parse($beritas->updated_at)->format('H:i') }}</small></p>
            <hr>
        </div>
    </div>
    <div class="delete-icon text-center p-2" style="background-color: #383961;">
        <form action="/berita/{{ $beritas->id }}" class="d-inline" method="post">
            @csrf
            @method('DELETE')
            <button class="px-4 py-1" type="submit" name="submit" style="background-color: #383961;">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 45 45" fill="none">
                    <path
                        d="M13.125 39.375C12.0938 39.375 11.2106 39.0075 10.4756 38.2725C9.74063 37.5375 9.37376 36.655 9.37501 35.625V11.25C8.84376 11.25 8.39813 11.07 8.03813 10.71C7.67813 10.35 7.49876 9.90501 7.50001 9.37501C7.50001 8.84376 7.68001 8.39813 8.04001 8.03813C8.40001 7.67813 8.84501 7.49876 9.37501 7.50001H16.875C16.875 6.96876 17.055 6.52313 17.415 6.16313C17.775 5.80313 18.22 5.62376 18.75 5.62501H26.25C26.7813 5.62501 27.2269 5.80501 27.5869 6.16501C27.9469 6.52501 28.1263 6.97001 28.125 7.50001H35.625C36.1563 7.50001 36.6019 7.68001 36.9619 8.04001C37.3219 8.40001 37.5013 8.84501 37.5 9.37501C37.5 9.90626 37.32 10.3519 36.96 10.7119C36.6 11.0719 36.155 11.2513 35.625 11.25V35.625C35.625 36.6563 35.2575 37.5394 34.5225 38.2744C33.7875 39.0094 32.905 39.3763 31.875 39.375H13.125ZM13.125 11.25V35.625H31.875V11.25H13.125ZM16.875 30C16.875 30.5313 17.055 30.9769 17.415 31.3369C17.775 31.6969 18.22 31.8763 18.75 31.875C19.2813 31.875 19.7269 31.695 20.0869 31.335C20.4469 30.975 20.6263 30.53 20.625 30V16.875C20.625 16.3438 20.445 15.8981 20.085 15.5381C19.725 15.1781 19.28 14.9988 18.75 15C18.2188 15 17.7731 15.18 17.4131 15.54C17.0531 15.9 16.8738 16.345 16.875 16.875V30ZM24.375 30C24.375 30.5313 24.555 30.9769 24.915 31.3369C25.275 31.6969 25.72 31.8763 26.25 31.875C26.7813 31.875 27.2269 31.695 27.5869 31.335C27.9469 30.975 28.1263 30.53 28.125 30V16.875C28.125 16.3438 27.945 15.8981 27.585 15.5381C27.225 15.1781 26.78 14.9988 26.25 15C25.7188 15 25.2731 15.18 24.9131 15.54C24.5531 15.9 24.3738 16.345 24.375 16.875V30Z"
                        fill="#E9EBF8" />
                </svg>
            </button>
        </form>
    </div>
    <!--cdn bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>