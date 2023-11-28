<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
}

require "functions.php";
$mahasiswa = query("SELECT * FROM mahasiswa");

//tombol cari di click maka kita akan timpa variable mahasiswanya sesuai pencarianya
if(isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <!-- Tautan CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-4">
        <div class="d-flex justify-content-between">
            <h1>Daftar Mahasiswa</h1>
            <button class="btn btn-danger"><a href="logout.php" class="btn ">Logout</a></button>
        </div>

        <a href="tambah.php" class="btn btn-primary my-3">Tambah Data Mahasiswa</a>

        <form action="" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="keyword" placeholder="Masukkan Keyword Pencarian" autofocus autocomplete="off">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="cari">Cari!</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NRP</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jurusan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($mahasiswa as $row) : ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td>
                            <a href="ubah.php?id=<?php echo $row["id"]; ?>" class="btn btn-warning">Ubah</a>
                            <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini ?');" class="btn btn-danger">Hapus</a>
                        </td>
                        <td><img src="img/<?php echo $row["gambar"]; ?>" width="50"></td>
                        <td><?php echo $row["nama"]; ?></td>
                        <td><?php echo $row["nrp"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["jurusan"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Skrip JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
