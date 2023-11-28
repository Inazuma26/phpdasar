<?php
require "functions.php";

// Ambil data dari URL
$id = $_GET["id"];

// Query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];

// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // Ubah data berdasarkan id
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah!');
                document.location.href='index.php';
            </script>";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah!');
                document.location.href='index.php';
            </script> ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
    <!-- Tautan CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Ubah Data Mahasiswa</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
            <input type="hidden" name="gambarlama" value="<?= $mhs["gambar"]; ?>">
            <div class="form-group">
                <label for="nama">Nama : </label>
                <input type="text" class="form-control" name="nama" id="nama" required value="<?= $mhs['nama']; ?>">
            </div>
            <div class="form-group">
                <label for="nrp">NRP : </label>
                <input type="text" class="form-control" name="nrp" id="nrp" required value="<?= $mhs['nrp']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email : </label>
                <input type="text" class="form-control" name="email" id="email" required value="<?= $mhs['email']; ?>">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan : </label>
                <input type="text" class="form-control" name="jurusan" id="jurusan" required value="<?= $mhs['jurusan']; ?>">
            </div>
            <div class="form-group">
                <label for="gambar">Gambar : </label><br>
                <img src="img/<?= $mhs['gambar']; ?>" width="40"><br>
                <input type="file" class="form-control-file" name="gambar" id="gambar">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Ubah Data!</button>
        </form>
    </div>

    <!-- Skrip JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
