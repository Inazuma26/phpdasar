<?php
//cek apakah tidak ada data di dalam $_GET
if( ! isset($_GET["nama"]) || !isset($_GET["nrp"]) || !isset($_GET["email"]) || !isset($_GET["jurusan"]) || !isset($_GET["gambar"])){
    //ridereck
    header("location: latihan1.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <ul>
        <li><img src="img/<?php echo $_GET["gambar"]; ?>"></li>
        <li><?php echo $_GET["nama"]; ?></li>
        <li><?php echo $_GET["nrp"]; ?></li>
        <li><?php echo $_GET["email"]; ?></li>
        <li><?php echo $_GET["jurusan"]; ?></li>
    </ul>
<a href="latihan1.php">Kembali Ke Daftar Mahasiswa</a>
</body>
</html>