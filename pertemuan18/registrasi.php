<?php
require 'functions.php';
if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('User Baru Berhasil Ditambahkan');
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <!-- Tautan CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body class="d-flex align-items-center" style="min-height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1 class="mb-4 text-center">Halaman Registrasi</h1>

                <form action="" method="post">
                    <div class="form-group">
                        <label for="username">Username : </label>
                        <input type="text" class="form-control" name="username" id="username" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Password : </label>
                        <input type="password" class="form-control" name="password" id="password" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password2">Konfirmasi Password : </label>
                        <input type="password" class="form-control" name="password2" id="password2" required autocomplete="off">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="register">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Skrip JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
