<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
}

require "functions.php";
//koneksikan ke DBMS
// $conn = mysqli_connect("localhost","inazuma","","phpdasar");

//ambil data dari URL
$id = $_GET["id"];

//query data mahasiswa berddasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id=$id")[0];


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


    if(ubah($_POST) > 0 ){
        echo "
        <script>
        alert('Data Berhasil Di Ubah!');
        document.location.href='index.php';
        </script>";
    }else{
        echo "
        <script>
        alert('Data Gagal Di Ubah!');
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
    <!-- Tambahkan tautan Bootstrap di sini -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Ubah Data Mahasiswa</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
            <input type="hidden" name="gambarlama" value="<?= $mhs["gambar"]; ?>">

            <div class="form-group">
                <label for="nama">Nama :</label>
                <input type="text" class="form-control" name="nama" id="nama" required value="<?= $mhs['nama']; ?>">
            </div>

            <div class="form-group">
                <label for="nrp">NRP :</label>
                <input type="text" class="form-control" name="nrp" id="nrp" required value="<?= $mhs['nrp']; ?>">
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="text" class="form-control" name="email" id="email" required value="<?= $mhs['email']; ?>">
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan :</label>
                <input type="text" class="form-control" name="jurusan" id="jurusan" required value="<?= $mhs['jurusan']; ?>">
            </div>

            <div class="form-group">
                <label for="gambar">Gambar :</label><br>
                <img src="img/<?= $mhs['gambar']; ?>" width="40"><br>
                <br>
                <input type="file" class="form-control-file" name="gambar" id="gambar">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Ubah Data!</button>
        </form>
    </div>

    <!-- Tambahkan skrip Bootstrap dan jQuery di sini -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
