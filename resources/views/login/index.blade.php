<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

<body>
    <a href="/"><svg class="back-button m-3" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"
        fill="none">
        <path
            d="M20 36.6666C29.2048 36.6666 36.6667 29.2047 36.6667 19.9999C36.6667 10.7952 29.2048 3.33325 20 3.33325C10.7953 3.33325 3.33334 10.7952 3.33334 19.9999C3.33334 29.2047 10.7953 36.6666 20 36.6666Z"
            stroke="#383961" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M20 13.3333L13.3333 19.9999L20 26.6666" stroke="#383961" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" />
        <path d="M26.6667 20H13.3333" stroke="#383961" stroke-width="1.5" stroke-linecap="round"
            stroke-linejoin="round" />
    </svg></a>

    <form action="/login" method="POST">
    @csrf
        <div class="login">
            <div class="login-text mt-5">
                <h1>Masuk Akun</h1>
                <h2>Silakan masuk untuk menggunakan layanan <br> dari BRINI secara lengkap</h2>
                <div class="username-input">
                    <label for="username">Email</label><br>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required value="{{ old('email') }}">
                </div>
                <div class="form-group password-input mt-2">
                    <label for="password">Kata Sandi</label><br>
                    <div class="input-group pass-input flex-nowrap" id="show_hide_password">
                        <input type="password" name='password' class="form-control @error('password') is-invalid @enderror" id="password" required value="{{ old('password') }}">
                        <div class="input-group-append">
                            <a href="" class="btn btn-outline-secondary">
                                <i class="bi bi-eye-slash" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                                        <path
                                            d="M15 11.25C14.0054 11.25 13.0516 11.6451 12.3483 12.3483C11.6451 13.0516 11.25 14.0054 11.25 15C11.25 15.9946 11.6451 16.9484 12.3483 17.6517C13.0516 18.3549 14.0054 18.75 15 18.75C15.9946 18.75 16.9484 18.3549 17.6517 17.6517C18.3549 16.9484 18.75 15.9946 18.75 15C18.75 14.0054 18.3549 13.0516 17.6517 12.3483C16.9484 11.6451 15.9946 11.25 15 11.25ZM15 21.25C13.3424 21.25 11.7527 20.5915 10.5806 19.4194C9.40848 18.2473 8.75 16.6576 8.75 15C8.75 13.3424 9.40848 11.7527 10.5806 10.5806C11.7527 9.40848 13.3424 8.75 15 8.75C16.6576 8.75 18.2473 9.40848 19.4194 10.5806C20.5915 11.7527 21.25 13.3424 21.25 15C21.25 16.6576 20.5915 18.2473 19.4194 19.4194C18.2473 20.5915 16.6576 21.25 15 21.25ZM15 5.625C8.75 5.625 3.4125 9.5125 1.25 15C3.4125 20.4875 8.75 24.375 15 24.375C21.25 24.375 26.5875 20.4875 28.75 15C26.5875 9.5125 21.25 5.625 15 5.625Z"
                                            fill="black" />
                                    </svg>
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="mt-4">Masuk</button>
                    <p class="daftar mt-5">Belum punya akun? <a href="/register">Daftar</a></p>
                </div>
            </div>
            <img class="mt-5" src="{{ asset('images/Login.png') }}" alt="">
        </div>
    </form>
    <!--cdn bootstrap-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "bi bi-eye-slash" );
                $('#show_hide_password i').removeClass( "bi bi-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "bi bi-eye-slash" );
                $('#show_hide_password i').addClass( "bi bi-eye" );
            }
        });
        });
    </script>
</body>

</html>