<?php
require "functions.php";

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan!');
                document.location.href='index.php';
            </script>";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan!');
                document.location.href='index.php';
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <!-- Tautan CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Tambah Data Mahasiswa</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama : </label>
                <input type="text" class="form-control" name="nama" id="nama" required autocomplete="off" autofocus>
            </div>
            <div class="form-group">
                <label for="nrp">NRP : </label>
                <input type="text" class="form-control" name="nrp" id="nrp" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="email">Email : </label>
                <input type="text" class="form-control" name="email" id="email" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan : </label>
                <input type="text" class="form-control" name="jurusan" id="jurusan" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="gambar">Gambar : </label>
                <input type="file" class="form-control-file" name="gambar" id="gambar">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Tambah Data!</button>
        </form>
    </div>

    <!-- Skrip JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
