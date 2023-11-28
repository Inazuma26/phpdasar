<?php
require 'functions.php';
if(isset($_POST["register"])) {
    if(registrasi($_POST) > 0){
        echo "<script>
                alert('User Baru Berhasil Di Tambah Kan');
            </script>";
    }else{
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>
    <h1>Halaman Registrasi</h1>

    <form action="" method="post">
    <ul>
        <li>
            <label for="username">username : </label>
            <input type="text" name="username" id="username" required autocomplete="off">
        </li>
        <li>
            <label for="password">password : </label>
            <input type="password" name="password" id="password" required autocomplete="off">
        </li>
        <li>
            <label for="password2">konfrimasi password : </label>
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