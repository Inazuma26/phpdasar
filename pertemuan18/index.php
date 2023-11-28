<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
}

require "functions.php";

//pagination
//konfigurasi
$jumlahDataPerhalaman = 5;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData,$jumlahDataPerhalaman");

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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        h1 {
            color: #333;
        }
        .btn {
            color: #fff;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-outline-secondary {
            color: #6c757d;
        }
        table {
            margin-top: 20px;
        }
        table th {
            background-color: #007bff;
            color: #fff;
        }
        table td, table th {
            text-align: center;
        }
        a {
            text-decoration: none;
            color: #007bff;
            margin: 0 5px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Daftar Mahasiswa</h1>
            <a href="logout.php" class="btn btn-danger">Logout</a>
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

        <!-- Navigasi -->
        <!-- Navigasi -->
<div class="mt-4">
    <ul class="pagination justify-content-center">
        <?php if($halamanAktif > 1) : ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $halamanAktif - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
        <?php endif;?>

        <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
            <li class="page-item <?php if( $i == $halamanAktif) echo 'active'; ?>">
                <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
            </li>
        <?php endfor; ?>

        <?php if($halamanAktif < $jumlahHalaman) : ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $halamanAktif + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        <?php endif;?>
    </ul>
</div>


        <table class="table table-bordered mt-3">
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
                        <td><img src="img/<?php echo $row["gambar"]; ?>" width="50" class="img-thumbnail"></td>
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
