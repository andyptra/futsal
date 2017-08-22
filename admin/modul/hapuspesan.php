<?php

$d=$_GET[id];
mysql_query("delete from pemesanan where id_pemesanan='$d'");
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Data  Telah di hapus')
    window.location.href='index.php?modul=pesananbaru';
    </SCRIPT>");

?>