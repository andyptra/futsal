<?php
$kd_k	= $_POST['id'];
mysql_query("Update pemesanan set dp='0',
								  sisa='0',
								  status='Lunas' WHERE id_pemesanan='$kd_k'")or die(mysql_error());
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('pemesanan sudah dibayar')
    window.location.href='index.php?modul=daftar_boking';
    </SCRIPT>");


?>