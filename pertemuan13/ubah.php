<?php
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
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
<h1>Ubah Data Mahasiswa</h1>

<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
    <input type="hidden" name="gambarlama" value="<?= $mhs["gambar"]; ?>">
    <ul>
        <li>
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama" required value="<?php echo $mhs['nama']; ?>">
        </li>
        <li>
            <label for="nrp">NRP : </label>
            <input type="text" name="nrp" id="nrp" required value="<?php echo $mhs['nrp']; ?>">
        </li>
        <li>
            <label for="email">Email : </label>
            <input type="text" name="email" id="email" required value="<?php echo $mhs['email']; ?>">
        </li>
        <li>
            <label for="jurusan">Jurusan : </label>
            <input type="text" name="jurusan" id="jurusan" required value="<?php echo $mhs['jurusan']; ?>">
        </li>
        <li>
            <label for="gambar">Gambar : </label><br>
            <img src="img/<?= $mhs['gambar']; ?>" width="40"><br>
            <input type="file" name="gambar" id="gambar">
        </li>
        <li><button type="submit" name="submit">Ubah Data!</button></li>
    </ul>
</form>
</body>
</html>