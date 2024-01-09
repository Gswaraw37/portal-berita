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
                            <p class="tulisan m-0">1 tulisan</p>
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
    <div class="tulisan-saya text-center">
        <h5 class="title mb-4">Tulisan Saya</h5>
        <div class="tulisan-saya-list mb-4 text-start mx-5 px-4 py-1">
            <p class="m-0 text-end"><small>19 Januari 2023</small></p>
            <h6 class="m-0">Tulisan Pertama Saya</h6>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, distinctio quam aspernatur facilis
                voluptates placeat qui dolorum? Nam facilis velit, ullam natus asperiores laboriosam tenetur veniam
                doloribus numquam, mollitia, necessitatibus ea omnis inventore vel aperiam id. Quia, id ab, pariatur
                quidem ut dolore facere odio ea consectetur possimus impedit blanditiis?</p>
            <div class="tulisan-saya-btn text-end"">
                <a href=""><button class="hapus-tulisan px-4 py-1">
                        <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 25 25" fill="none">
                            <path
                                d="M7.29151 21.875C6.71859 21.875 6.22797 21.6708 5.81963 21.2625C5.4113 20.8542 5.20748 20.3639 5.20817 19.7917V6.25C4.91304 6.25 4.66547 6.15 4.46547 5.95C4.26547 5.75 4.16581 5.50278 4.16651 5.20834C4.16651 4.9132 4.26651 4.66563 4.46651 4.46563C4.66651 4.26563 4.91373 4.16598 5.20817 4.16667H9.37484C9.37484 3.87153 9.47484 3.62396 9.67484 3.42396C9.87484 3.22396 10.1221 3.12431 10.4165 3.125H14.5832C14.8783 3.125 15.1259 3.225 15.3259 3.425C15.5259 3.625 15.6255 3.87223 15.6248 4.16667H19.7915C20.0866 4.16667 20.3342 4.26667 20.5342 4.46667C20.7342 4.66667 20.8339 4.91389 20.8332 5.20834C20.8332 5.50348 20.7332 5.75105 20.5332 5.95105C20.3332 6.15105 20.086 6.2507 19.7915 6.25V19.7917C19.7915 20.3646 19.5873 20.8552 19.179 21.2635C18.7707 21.6719 18.2804 21.8757 17.7082 21.875H7.29151ZM7.29151 6.25V19.7917H17.7082V6.25H7.29151ZM9.37484 16.6667C9.37484 16.9618 9.47484 17.2094 9.67484 17.4094C9.87484 17.6094 10.1221 17.709 10.4165 17.7083C10.7116 17.7083 10.9592 17.6083 11.1592 17.4083C11.3592 17.2083 11.4589 16.9611 11.4582 16.6667V9.375C11.4582 9.07986 11.3582 8.83229 11.1582 8.63229C10.9582 8.43229 10.711 8.33264 10.4165 8.33334C10.1214 8.33334 9.8738 8.43334 9.6738 8.63334C9.4738 8.83334 9.37415 9.08056 9.37484 9.375V16.6667ZM13.5415 16.6667C13.5415 16.9618 13.6415 17.2094 13.8415 17.4094C14.0415 17.6094 14.2887 17.709 14.5832 17.7083C14.8783 17.7083 15.1259 17.6083 15.3259 17.4083C15.5259 17.2083 15.6255 16.9611 15.6248 16.6667V9.375C15.6248 9.07986 15.5248 8.83229 15.3248 8.63229C15.1248 8.43229 14.8776 8.33264 14.5832 8.33334C14.288 8.33334 14.0405 8.43334 13.8405 8.63334C13.6405 8.83334 13.5408 9.08056 13.5415 9.375V16.6667Z"
                                fill="#383961" />
                        </svg>Hapus Tulisan</button></a>
                <a href="baca-tulisan.html"><button class="baca-tulisan px-4 py-1 ms-4">Baca Tulisan</button></a>
            </div>
        </div>
        <a href="buat-tulisan.html"><button class="px-5 py-1 mb-5">Tambah Tulisan</button></a>
    </div>

    <!-- PROFIL SAYA END -->
    <!--cdn bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>