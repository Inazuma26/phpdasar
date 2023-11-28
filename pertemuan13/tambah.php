<?php
require "functions.php";
//koneksikan ke DBMS
// $conn = mysqli_connect("localhost","inazuma","","phpdasar");


// cek apakah tombol submit sudah di pencet atau belom
if(isset($_POST["submit"])){
    //ambil data dari setiap elemen dalam form
    // $nama = $_POST["nama"]; 
    // $nrp = $_POST["nrp"]; 
    // $email = $_POST["email"]; 
    // $jurusan = $_POST["jurusan"]; 
    // $gambar = $_POST["gambar"]; 

    // query insert data
    // $query = "INSERT INTO mahasiswa (nama,nrp,email,jurusan,gambar) VALUES 
    //         ('$nama','$nrp','$email','$jurusan','$gambar')";
    // mysqli_query($conn,$query);


    if(tambah($_POST) > 0 ){
        echo "
        <script>
        alert('Data Berhasil Di Tambahkan!');
        document.location.href='index.php';
        </script>";
    }else{
        echo "
        <script>
        alert('Data Gagal Di Tambahkan!');
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
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
<h1>Tambah Data Mahasiswa</h1>

<form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama" required autocomplete="off" autofocus>
        </li>
        <li>
            <label for="nrp">NRP : </label>
            <input type="text" name="nrp" id="nrp" required autocomplete="off">
        </li>
        <li>
            <label for="email">Email : </label>
            <input type="text" name="email" id="email" required autocomplete="off">
        </li>
        <li>
            <label for="jurusan">Jurusan : </label>
            <input type="text" name="jurusan" id="jurusan" required autocomplete="off">
        </li>
        <li>
            <label for="gambar">Gambar : </label>
            <input type="file" name="gambar" id="gambar">
        </li>
        <li><button type="submit" name="submit">Tambah Data!</button></li>
    </ul>
</form>
</body>
</html>