<?php
require 'functions.php';

$error = false;

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // Cek username
    if (mysqli_num_rows($result) === 1) {
        // Cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            header("Location: index.php");
            exit;
        } else {
            $error = true;
        }
    } else {
        $error = true;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman login</title>
    <!-- Tautan CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Halaman Login</h1>

        <?php if ($error) : ?>
            <p style="color:red; font-style:italic;">Username / Password Salah</p>
        <?php endif; ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username : </label>
                <input type="text" class="form-control" name="username" id="usrname">
            </div>
            <div class="form-group">
                <label for="password">Password : </label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login!</button>
        </form>
    </div>

    <!-- Skrip JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
