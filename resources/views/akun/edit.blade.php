<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
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
    <a href="/profile/{{ $users->username }}"><svg class="back-button mt-0 m-3" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
            viewBox="0 0 40 40" fill="none">
            <path
                d="M20 36.6666C29.2048 36.6666 36.6667 29.2047 36.6667 19.9999C36.6667 10.7952 29.2048 3.33325 20 3.33325C10.7953 3.33325 3.33334 10.7952 3.33334 19.9999C3.33334 29.2047 10.7953 36.6666 20 36.6666Z"
                stroke="#383961" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M20 13.3333L13.3333 19.9999L20 26.6666" stroke="#383961" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
            <path d="M26.6667 20H13.3333" stroke="#383961" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </a>

    <div class="edit-profil mt-4">
        <form action="/profile/{{$users->id}}" method="post">
            @method('put')
            @csrf
            <h6 class="mb-3">Edit Profil</h6>
            <img src="{{ asset('images/flynn.png') }}" alt="" class="mb-2 img-fluid profile-img">
            <div class="mb-2 input-nama">
                <span>Username</span>
                <input type="text" id="username" name="username" value="{{ $users->username }}">
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                        <path
                            d="M13.75 5H5C4.33696 5 3.70107 5.26339 3.23223 5.73223C2.76339 6.20107 2.5 6.83696 2.5 7.5V25C2.5 25.663 2.76339 26.2989 3.23223 26.7678C3.70107 27.2366 4.33696 27.5 5 27.5H22.5C23.163 27.5 23.7989 27.2366 24.2678 26.7678C24.7366 26.2989 25 25.663 25 25V16.25"
                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M23.125 3.12504C23.6223 2.62776 24.2967 2.34839 25 2.34839C25.7033 2.34839 26.3777 2.62776 26.875 3.12504C27.3723 3.62232 27.6517 4.29678 27.6517 5.00004C27.6517 5.7033 27.3723 6.37776 26.875 6.87504L15 18.75L10 20L11.25 15L23.125 3.12504Z"
                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <button class="mb-5 simpan-btn">Simpan</button>
            <button class="keluar-akun-btn">Keluar Akun</button>
        </form>
    </div>
    <!-- cdn bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>