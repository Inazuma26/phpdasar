<?php
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
</head>
<body>
    
<h1>Daftar Mahasiswa</h1>

<a href="tambah.php">Tambah Data Mahasiswa</a>
<br><br>

<form action="" method="post">
    <input type="text" name="keyword" size="30" autofocus placeholder="Masukan Keyword Pencarian" autocomplete="off">
    <button type="submit" name="cari">Cari!</button>
</form>
<br>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>NRP</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>
<?php $i = 1; ?>
<?php foreach($mahasiswa as $row): ?> 

    <tr>
        <td><?php echo $i;   ?></td>
        <td>
            <a href="ubah.php?id=<?php echo $row["id"];  ?>">Ubah</a> |
            <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Yakin Ingin Menghaspus Data Ini ?');">Hapus</a>
        </td>
        <td><img src="img/<?php echo $row["gambar"]; ?>" width="50"></td>
        <td><?php echo $row["nama"]; ?></td>
        <td><?php echo $row["nrp"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["jurusan"]; ?></td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>
</table>

</body>
</html>