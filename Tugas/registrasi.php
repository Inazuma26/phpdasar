<?php
require 'functions.php';
$error = false;

if(isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if ($password !== $password2) {
        $error = true;
    } else {
        if(registrasi($_POST) > 0){
            echo "<script>
                    alert('User Baru Berhasil Ditambahkan');
                </script>";
        } else {
            echo mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>
    <h1>Halaman Registrasi</h1>

    <?php if($error) : ?>
        <p style="color:red; font-style:italic;">Konfirmasi password tidak sesuai.</p>
    <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" required autocomplete="off">
            </li>
            <li>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" required autocomplete="off">
            </li>
            <li>
                <label for="password2">Konfirmasi Password: </label>
                <input type="password" name="password2" id="password2" required autocomplete="off">
            </li>
            <br>
            <li>
                <button type="submit" name="register">Register!</button>
            </li>
        </ul>
    </form>
    
</body>
</html>
