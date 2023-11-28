<?php
$datasantri=[
    ["Nur Hanifa Siddiq","082182018305","programmer","nurhanifahsiddiq@gmil.com"],
    ["Nur Hanifa Siddiq","082182018305","programmer","nurhanifahsiddiq@gmil.com"]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Santri</title>
</head>
<body>
    <h1>Data Santri</h1>

<?php foreach($datasantri as $ds) : ?>
<ul>
    <li> Nama : <?php echo $ds[0];?></li>
    <li> No Telepon : <?php echo $ds[1];?></li>
    <li> Jurusan : <?php echo $ds[2];?></li>
    <li> Email : <?php echo $ds[3];?></li>

</ul>
<?php endforeach; ?>


</body>
</html>