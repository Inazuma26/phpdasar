<?php
//cek dulu apakah tombol sun=bmit sudah di pencet atau belum
if(isset($_POST["submit"])){
    //cek username dan password
    if($_POST["username"]=="admin" && $_POST["password"]== "321"){
        //jika benar ridereck ke halaman admin
        header("location:admin.php");
        exit;
    }else{
        //jika salah tampilkan pesan kesalahan
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login Admin</h1>
<ul>

<?php if(isset($error)): ?>
<p style = "color : red; font-style : italic;">Username / Password Salah!</p>
<?php endif; ?>
    <form action="" method="post">
        <li>
            <label for="username">username : </label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password">password : </label>
            <input type="password" name="password" id="password">
        </li>
        <li>
            <button type="submit" name="submit">login</button>
        </li>
    </form>
</ul>
</body>
</html>