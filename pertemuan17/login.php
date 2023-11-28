<?php
session_start();
require 'functions.php';


//cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil username berdasarkan ad
    $result = mysqli_query($conn,"SELECT username FROM user WHERE id=$id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if($key === hash('sha256',$row['username'])){
        $_SESSION['login'] = true;
    }
}



if(isset($_SESSION["login"])){
    header("location: index.php");
    exit;
}


if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'" );

    //cek username
    if(mysqli_num_rows($result) === 1){

        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            //set session
            $_SESSION["login"] = true;
            //cek remember me
            if(isset($_POST["remember"])){
                //set cookie
                setcookie('id',$row['id'],time()+60);
                setcookie('key',hash('sha256',$row['username']),time()+60);
            }

            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <!-- Tautan CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="d-flex align-items-center" style="min-height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1 class="mb-4 text-center">Login</h1>

                <?php if(isset($error)) : ?>
                    <p style="color:red; font-style:italic; text-align: center;">Username / Password Salah</p>
                <?php endif ?>

                <form action="" method="post" class="p-4 bg-light rounded">
                    <div class="form-group">
                        <label for="usrname">Username:</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Skrip JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
