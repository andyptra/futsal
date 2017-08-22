<?php
include"../../db/config.php";


	$kode=$_GET['kode'];
    $dt=mysql_query("select * from pelanggan where username='$kode'");
    $d=mysql_fetch_array($dt);
    echo $d['id_pelanggan']."|".$d['nama']."|".$d['email']."|".$d['nama_klub']."|".$d['alamat']."|".$d['no_telpon'];



?>