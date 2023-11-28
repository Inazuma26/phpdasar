<?php
//Date funsi bawaank PHP
//untuk menampilkan data sesuai format
// l = hari
// d = tanggal
// M = bulan
// Y = tahun
// echo date("l, d-M-Y");


//Time
//unix Timetamps / EPOCH Time
//detik yang sudah berlalu sejak 1 januari 1970
// echo time();
// echo date("d M Y", time() + 60*60*24*18);


// mktime
// untuk membuat sendiri detik
//mkime(0,0,0,0,0,0)
//jam,menit,detik,bulan,tanggal,tahun
// echo date("l", mktime(0,0,0,10,26,2005));
// echo "Hanif Birthday : ".date("l,d,M,Y", mktime(0,0,0,10,26,2005));
 
//strtotime
echo date( "l",strtotime("26 oct 2005"));
?>