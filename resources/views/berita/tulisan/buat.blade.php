<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Tulisan</title>
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
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none;
        }
    </style>
</head>

<body>
    <div class="buat-tulisan">
        <div class="buat-tulisan-nav py-2 px-3 mb-4">
            <a href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 40 40" fill="none">
                    <path d="M31.6668 20H8.3335" stroke="#E9EBF8" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M20.0002 31.6666L8.3335 19.9999L20.0002 8.33325" stroke="#E9EBF8" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>
        <form method="post" action="/buat-tulisan/create" enctype="multipart/form-data">
            @csrf
            <div class="judul mb-3 mx-4">
                <label for="judul" class="m-0 form-label">Judul</label>
                <input class="col-12 form-control" type="text" name="judul" id="judul" placeholder="Masukkan judul tulisan Anda">
            </div>
            <div class="judul mb-3 mx-4">
                <label for="slug" class="m-0 form-label">Slug</label>
                <input class="col-12 form-control" type="text" name="slug" id="slug" placeholder="Slug akan digenerate.." readonly>
            </div>
            <div class="judul mb-3 mx-4">
                <label for="user_id" class="m-0 form-label">Penulis: {{ auth()->user()->username }}</label>
                <input class="col-12 form-control" type="text" name="user_id" id="user_id" value="{{ auth()->user()->id }}" readonly>
            </div>
            <div class="judul mb-3 mx-4">
                <label for="gambar" class="m-0 form-label">Gambar Berita</label>
                <input class="col-12 form-control" type="file" name="gambar" id="gambar">
            </div>
            <div class="kategori mb-3 mx-4">
                <label for="kategori_id" class="m-0 form-label">Kategori</label>
                <select class="col-12 form-select" name="kategori_id" id="kategori_id">
                    <option class="kategori-placeholder">Pilih kategori tulisan Anda</option>
                    <option value="1">Ekonomi</option>
                    <option value="2">Teknologi</option>
                    <option value="3">Hukum</option>
                    <option value="4">Sosial</option>
                    <option value="5">Kesehatan</option>
                </select>
            </div>
            <div class="tulisan mb-3 mx-4">
                <label for="isi" class="m-0 form-label">Tulisan</label>
                <input id="isi" type="hidden" name="isi">
                <trix-editor input="isi" placeholder="Ketik tulisan Anda di sini"></trix-editor>
            </div>
            <button type="submit" class="unggah-btn px-3" style="margin: 0 auto; display:flex" name="submit">Unggah</button>
        </form>

    </div>
    <!-- cdn bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

    <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('change', function(){
            fetch('/buat-tulisan/checkSlug?judul=' + judul.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
        })
    </script>
</body>

</html>