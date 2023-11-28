<?php
//array assosiatif
$mahasiswa=[
    [
        "nama"=>"Naruto",
        "nrp"=>"3245543",
        "email"=>"naruto@gmil",
        "jurusan"=>"programmer",
        "gambar"=>"naruto.jpg"
    ],

    [
        "nama"=>"Sasuke",
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
    <title>Array Assosiatif</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <?php foreach($mahasiswa as $a) : ?>
        <ul>
            <li><img src="img/<?php echo $a["gambar"];?>"></li>
            <li>Nama :<?php echo $a["nama"]; ?></li>
            <li>NRP :<?php echo $a["nrp"]; ?></li>
            <li>Email :<?php echo $a["email"]; ?></li>
            <li>Jurusan :<?php echo $a["jurusan"]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>
</html>