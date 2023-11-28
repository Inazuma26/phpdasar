<?php
function salam($waktu,$nama){
    return "selamat $waktu, $nama!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan function</title>
</head>
<body>
    <h1><?php echo salam("pagi","inazuma"); ?></h1>
</body>
</html>