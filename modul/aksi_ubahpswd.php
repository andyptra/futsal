 
<?php
include"../db/config.php";
 $id_pengunjung=$_POST['id_pelanggan'];
  $password=md5($_POST['password']);

  mysql_query("UPDATE pelanggan set password='$password' WHERE id_pelanggan='$id_pengunjung'");
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Password User ".$id_pengunjung." Telah Diubah')
    window.location.href='index.php?modul=usr';
    </SCRIPT>");
    ?>