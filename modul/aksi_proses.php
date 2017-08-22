<?php
$a=$_POST[id_laps];
$idharga=$_POST[idharga];
$iduser=$_POST[iduser];
$b=$_POST[username];
$c=$_POST[nama_klub];
$d=$_POST[tanggals];
$e=$_POST[jams];
$f=$_POST[harga];
$g=$_POST[alamat];
$h=$_POST[no_telpon];

mysql_query("insert into pemesanan(id_pelanggan,id_harga,id_jadwal,username,nama_klub,alamat,no_telpon,tanggal,jam,harga,status)values('$iduser','$idharga','$a','$b','$c','$g','$h','$d','$e','$f','Tertunda')")or die(mysql_error());

echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('pemesanan sudah terkirim, silahkan melakukan pembayaran setengah jam sebelum main')
    window.location.href='index.php?modul=pesandetail';
    </SCRIPT>");

?>