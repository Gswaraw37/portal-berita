<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POP UP</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

<body>
            <div>
                <!--PUP UP BUAT TULISAN BELUM LOGIN: -->
                <button type="button" class="" data-bs-toggle="modal" data-bs-target="#notlogin-tulisan-modal">Blm Login-Buat Tulisan</button>
                <div class="modal" id="notlogin-tulisan-modal">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header modal-bg1"></div>
                            <div class="modal-body modal-bg1 dis-modal">
                                <div>
                                    <h5>ingin membuat tulisan?</h5>
                                    <h5 class="mb-5">Silakan masuk ke akun terlebih dahulu</h5>
                                    <button type="button" class="button1" data-bs-dismiss="modal">Keluar</button>
                                    <button type="button" class="button2"><a href="/login" style="text-decoration: none; color: white">Masuk Akun</a></button>
                                </div>
                                
                                <img src="images/not_login1.png" alt="">
                            </div>
                            <div class="modalFooter text-center modal-bg1"></div>
                        </div>
                    </div>
                </div>
                
                <!--PUP UP Edit Profil : -->
                <button type="button" class="" data-bs-toggle="modal" data-bs-target="#confirm-editprofil-modal">Edit Profil</button>
                <div class="modal" id="confirm-editprofil-modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header modal-bg1">
                                <h5></h5>
                                <button type="button" data-bs-dismiss="modal" aria-label="Close">
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
                                    </svg></button>
                            </div>
                            <div class="modal-body modal-bg1">
                                <h5>Anda Yakin Ingin Menyimpan Perubahaan?</h5>
                            </div>
                            <div class="modalFooter text-center modal-bg1">
                                <div class="mb-3">
                                    <button type="button" class="button1" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="button2">Unggah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--PUP UP Unggah Tulisan : -->
                <button type="button" class="" data-bs-toggle="modal" data-bs-target="#confirm-unggahtulis-modal">Unggah Tulisan</button>
                <div class="modal" id="confirm-unggahtulis-modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header modal-bg1">
                                <h5></h5>
                                <button type="button" data-bs-dismiss="modal" aria-label="Close">
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
                                    </svg></button>
                            </div>
                            <div class="modal-body modal-bg1">
                                <h5>Anda Yakin Ingin Mengunggah Tulisan  ini?</h5>
                            </div>
                            <div class="modalFooter text-center modal-bg1">
                                <div class="mb-3">
                                    <button type="button" class="button1" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="button2" data-bs-toggle="modal" data-bs-target="#berhasil-unggah-modal">Unggah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--PUP UP Hapus Tulisan : -->
                <button type="button" class="" data-bs-toggle="modal" data-bs-target="#confirm-hapustulis-modal">Hapus Tulisan</button>
                <div class="modal" id="confirm-hapustulis-modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header modal-bg1">
                                <h5></h5>
                                <button type="button" data-bs-dismiss="modal" aria-label="Close">
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
                                    </svg></button>
                            </div>
                            <div class="modal-body modal-bg1">
                                <h5>Anda Yakin Ingin Menghapus Tulisan  ini?</h5>
                            </div>
                            <div class="modalFooter text-center modal-bg1">
                                <div class="mb-3">
                                    <button type="button" class="button1" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="button2">Unggah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    <!--cdn bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>