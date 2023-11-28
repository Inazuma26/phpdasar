<?php
//koneksi ke database
$conn = mysqli_connect("localhost","inazuma","","phpdasar");

//ambil data dari table mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// ambil data (fatch) mahasisiwa dari objek result ada 4 cara
// 1. mysqli_fetch_row() => mengembalikan array nummerik
// 2. mysqli_fetch_assoc() => mengembalikan array assosiative
// 3. mysqli_fetch_array() => mengembalikan keduanya
// 4. mysqli_fetch_object() => mengembalikan objek

// while ($mhs = mysqli_fetch_assoc($result)){
    // var_dump($mhs);
// }
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

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Emil</th>
        <th>Jurrusan</th>
    </tr>
<?php $i = 1; ?>
<?php while($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?php echo $i;   ?></td>
        <td>
            <a href="">Ubah</a> | <a href="">Hapus</a>
        </td>
        <td><img src="img/<?php echo $row["gambar"]; ?>" width="50"></td>
        <td><?php echo $row["nrp"]; ?></td>
        <td><?php echo $row["nama"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["jurusan"]; ?></td>
    </tr>
    <?php $i++; ?>
<?php endwhile; ?>
</table>

</body>
</html>