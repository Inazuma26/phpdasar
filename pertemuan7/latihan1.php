<?php
//variable scope / lingkup variable
// $a = 10;
// function tampil_a(){
//     global $a;
//     echo $a;
// }
// tampil_a();

//variable superglobals
//variable yang sudah dibuatkan oleh PHP nya
//variable yang merupakan array Associative
/* 
macam macam variable superglobals yang sering digunakan
- $_GET
- $_POST
- $_SESSION
- $_COOKIE
*/

//$_GET
// $_GET["nama"] = "Nur Hanifa Siddiq";
// var_dump($_GET);
$mahasiswa=[
    [
        "nama"=>"Uzumaki Naruto",
        "nrp"=>"3245543",
        "email"=>"naruto@gmil",
        "jurusan"=>"programmer",
        "gambar"=>"naruto.jpg"
    ],
    [
        "nama"=>"Uchiha Sasuke",
        "nrp"=>"32452323",
        "email"=>"sasuke@gmil",
        "jurusan"=>"multimedia",
        "gambar"=>"sasuke.jpg"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body>
<h1>Daftar Mahasiswa</h1>
<ul>
<?php foreach ($mahasiswa as $asw): ?>
    <li>
        <a href="latihan2.php?nama=<?php echo $asw["nama"];?>&nrp=<?php echo $asw["nrp"]; ?>&email=<?php echo $asw["email"]; ?>&jurusan=<?php echo $asw["jurusan"]; ?>&gambar=<?php echo $asw["gambar"]; ?>"><?php echo $asw["nama"]; ?></a>
    </li>
<?php endforeach; ?>
</ul>
</body>
</html>