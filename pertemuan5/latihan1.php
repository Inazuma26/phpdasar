<?php
//aray
//variable yang dapat menampung banyak data
//elemen pada array boleh memiliki tipe data yang berbeda
//pasangan antara key dengan value
//key-nya adalah index, yang dimulai dari 0

//mebuat array
// cara lama
$hari = array("senin","selasa","rabu");
//cara baru
$bulan = ["januari","februari","maret"];
$arr = [123,"hanif",true];

//menampilkan array
// var_dump / print_r
//menampilkan dengan var_dump
// var_dump($hari);
// echo "<br>";
//menampilkan dengan print_r
// print_r($bulan);
// echo "<br>";
//===============//
// echo $arr[1];

//menambahkan elemen ke dalam array
var_dump($hari);
$hari[] = "kamis";
$hari[] = "jum'at";
echo "<br>";
var_dump($hari);
?>