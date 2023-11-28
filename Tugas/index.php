<?php
require "functions.php";
$mahasiswa = query("SELECT * FROM mahasiswa");

// Jika tombol cari diklik, kita akan menimpa variabel mahasiswa sesuai pencarian
if (isset($_POST["cari"])) {
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
    <div class="container">
        <h1 class="my-4">Daftar Mahasiswa</h1>
        <a class="btn btn-primary mb-3" href="tambah.php">Tambah Data Mahasiswa</a>

        <form action="" method="post" class="mb-3">
            <input type="text" name="keyword" class="form-control" size="30" autofocus placeholder="Masukkan Keyword Pencarian" autocomplete="off">
            <button type="submit" name="cari" class="btn btn-primary mt-2">Cari!</button>
        </form>

        <table class="table table-bordered">
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
                            <a class="btn btn-sm btn-warning" href="ubah.php?id=<?php echo $row["id"]; ?>">Ubah</a>
                            <a class="btn btn-sm btn-danger" href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini ?');">Hapus</a>
                        </td>
                        <td><img src="img/<?php echo $row["gambar"]; ?>" width="50" class="img-fluid rounded-circle"></td>
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
