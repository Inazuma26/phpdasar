<?php
//koneksi ke database
$conn = mysqli_connect("localhost","inazuma","","phpdasar");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data){
    global $conn;
    $nama = htmlspecialchars($data["nama"]); 
    $nrp = htmlspecialchars($data["nrp"]); 
    $email = htmlspecialchars($data["email"]); 
    $jurusan = htmlspecialchars($data["jurusan"]); 
    //upload gambar dulu
    $gambar = upload();
    if(!$gambar){
        return false;
    } 

    $query = "INSERT INTO mahasiswa (nama,nrp,email,jurusan,gambar) VALUES 
        ('$nama','$nrp','$email','$jurusan','$gambar')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if($error === 4){
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    //cek apakah yang di upload adalah gambat atau bukan
    $ekstensiGambarFalid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarFalid)){
        echo "<script>
                alert('yang anda upload bukan gambar!');
            </script>";
        return false;
    }

    //cek ukurannya jika terlalu besar
    if($ukuranFile > 1000000){
        echo "<script>
                alert('ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    //lolos pengecekan, gambar siap di upload
    //generet nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru.= '.' ;
    $namaFileBaru.= '.'. $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");
    return mysqli_affected_rows($conn);
}


function ubah($data){
    global $conn;

    $id = ($data["id"]);
    $nama = htmlspecialchars($data["nama"]); 
    $nrp = htmlspecialchars($data["nrp"]); 
    $email = htmlspecialchars($data["email"]); 
    $jurusan = htmlspecialchars($data["jurusan"]); 
    $gambarlama = htmlspecialchars($data["gambarlama"]);

    //cek apakah user pilih gambar baru atau bukan
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarlama;
    }else{
        $gambar = upload();
    }

    $query = "UPDATE mahasiswa SET 
                nama = '$nama',
                nrp = '$nrp',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
                WHERE id = $id";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM mahasiswa WHERE 
    nama LIKE '%$keyword%' OR
    nrp LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%'";
    return query($query);
}

?>