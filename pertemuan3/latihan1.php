 <?php
//pengulangan

//for
//while
//do while
//foreach : pengulangan khusus array

//menggunakan pengulangan for
// for($i = 0; $i < 5; $i++){
    // echo "hanif <br>";
// }

//menggunakan pengulangan while
// $i = 0;
// while($i < 5){
    // echo "hanifa <br>";
    // $i++;
// }

//menggnakan pengulangan do while
// $i = 0;
// do{
//     echo "Hanifa <br>";
//     $i++;
// }while($i < 5);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perulangan</title>
    <style>
        .warna-baris{
            background-color: silver;
        }

        .warna-kedua{
            background-color: yellow;
        }
    </style>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
    <?php for($baris = 1; $baris <= 5; $baris++) : ?>
        <?php if($baris % 2 == 1) : ?>
        <tr class="warna-baris">
            <?php else : ?>
            <tr>
            <?php endif;?>
            <?php for($kolom = 1; $kolom <= 5; $kolom++) : ?>
                <td><?php echo "$baris,$kolom"; ?></td>
                <?php endfor; ?>
        </tr>
        <?php endfor; ?>
    </table>

<br><br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <?php for($baris1 = 1; $baris1 <= 3; $baris1++) : ?>
        <?php if($baris1 % 2 == 1) : ?>
            <tr class="warna-baris">
                <?php else : ?>
                    <tr>
            <?php endif; ?>
            <?php for($kolom1 = 1; $kolom1 <= 5; $kolom1++) : ?>
                <td><?php echo "$baris1,$kolom1" ?></td>
                <?php endfor; ?>
        </tr>
        <?php endfor; ?>
</table>

<br><br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <?php for($b=1; $b<=3; $b++): ?> 
        <?php if($b % 2 == 1) : ?>
        <tr class= "warna-kedua">
            <?php else : ?>
                <tr>
            <?php endif; ?>
        <?php for($k=1; $k<=5; $k++): ?>
            <td><?php echo "$b,$k" ?></td>
            <?php endfor; ?>
        </tr>
        <?php endfor; ?>
</table>
</body>
</html>