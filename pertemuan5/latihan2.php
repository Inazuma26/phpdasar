<?php
// Belajar Perulangan Array
// Bisa menggunakan : for
// Bisa menggunakan perulangan khusus array : foreach
$angka = [1,8,5,9,34,87,3];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
    <style>
        .kotak{
            width : 50px;
            height : 50px;
            background-color : skyblue;
            text-align : center;
            line-height : 50px;
            margin : 3px;
            float : left;
        }

        .clear{
            clear : both;
        }
    </style>
</head>
<body>
<?php for($i = 0; $i < count($angka); $i++) : ?>
    <div class="kotak"><?php echo $angka[$i]; ?></div>
<?php endfor; ?>

<div class="clear" ></div>

<?php foreach($angka as $value): ?>
    <div class="kotak"><?php echo $value; ?></div>
<?php endforeach; ?>

</body>
</html>