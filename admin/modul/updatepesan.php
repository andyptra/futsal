<?php
$kd_k	= $_GET['id'];

	mysql_query("Update pemesanan set							  status='Pending' WHERE id_pemesanan='$kd_k'")or die(mysql_error());
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('pemesanan sudah terkonfirmasi')
    window.location.href='index.php?modul=pesananbaru';
    </SCRIPT>");


?>