<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKUN</title>
    <!--css style-->
    <link rel="stylesheet" href="style.css" />

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
            <div class="search-bar me-2">
                <input type="text" id="search-bar" placeholder="Cari di sini" />
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                        stroke="#EFEFEF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M20.9999 20.9999L16.6499 16.6499" stroke="#EFEFEF" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
            <div class="nav-btn">
                <i class="fas fa-circle-user"></i>
                <button class="buat-tulisan mx-1" href="signin.html">Buat Tulisan</button>
            </div>
        </div>
        <!-- TOPBAR END -->

        <!-- NAVBAR START -->
        <div class="nav-bar py-1 px-2">
            <a href="#">Beranda</a>
            <a href="#">Ekonomi</a>
            <a href="#">Teknologi</a>
            <a href="#">Hukum</a>
            <a href="#">Sosial</a>
            <a href="#">Kesehatan</a>
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
                        <img src="images/flynn.png" alt="" class="img-fluid">
                        <div class="profil-saya-left-text">
                            <p class="nama m-0">Wianda Rafa</p>
                            <p class="tulisan m-0">0 tulisan</p>
                            <p class="kali-dibaca m-0 mb-3">0 kali dibaca</p>
                            <p class="bergabung-sejak m-0 mb-4">Bergabung sejak 19 Januari 2023</p>
                            <a href="edit-profil.html"><button class="px-3">Edit Profil</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="tulisan-populer">
                    <div class="container text-center">
                        <p class="title m-0 mt-2">Tulisan Populer</p>
                        <p class="penulis m-0">dari Wianda Rafa</p>
                        <p class="keterangan">Belum ada tulisan populer dari Wianda Rafa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tulisan-saya text-center mb-5">
        <h5 class="title text-center mb-4">Tulisan Saya</h5>
        <div class="tulisan-saya-img mb-4">
            <img src="images/Nothing here (1).png" alt="" style="max-width: 350px;">
        </div>
        <p>Anda belum memiliki tulisan</p>
        <a href="buat-tulisan.html"><button class="px-5 py-1">Buat Tulisan</button></a>
    </div>

    <!-- PROFIL SAYA END -->
    <!--cdn bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>