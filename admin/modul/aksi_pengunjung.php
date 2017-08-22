<?php 
defined("VALIDASI") or die("Tidak Diperkenankan Mengakses Data Secara Langsung !");
// session_start();
if (empty($_SESSION['username']) && empty($_SESSION['nama'])){
  echo "<script type=text/javascript>  
alert('Anda Belum Login :) , Silahkan Login terlebih dahulu');  
window.location = 'login.php';  
</script>";
  //header('Location:index.php');
}else{
$modul=$_GET['modul'];
$act=$_GET['act'];

//INPUT USER-------------------------------------------------------------------------
if ($modul=='aksi_pengunjung' AND $act=='input_pengunjung') {
$passwordz=md5($_POST['password']);
  mysql_query("INSERT INTO pelanggan                      
                         VALUES('',
                                '$_POST[username]',
                                '$passwordz',
                                '$_POST[nama]',
                                '$_POST[nama_klub]',
                                '$_POST[email]',
                                '$_POST[alamat]',
                                '$_POST[no_telpon]')");
                                 
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Data Telah Ditambahkan')
    window.location.href='index.php?modul=pengunjung';
    </SCRIPT>");
}

// UPDATE USER------------------------------------------------------------------------- 
elseif ($modul=='aksi_pengunjung' AND $act=='update_pengunjung') {
 
    mysql_query("UPDATE pelanggan 
                         SET    username      = '$_POST[username]',
                                nama          = '$_POST[nama]',
                                nama_klub     ='$_POST[nama_klub]',
                                email         ='$_POST[email]',
                                alamat         = '$_POST[alamat]',
                               no_telpon          = '$_POST[no_telpon]'
                                WHERE id_pelanggan = '$_POST[kode]'"); 
    
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Data Pelanggan Telah Diubah')
    window.location.href='index.php?modul=pengunjung';
    </SCRIPT>");

  }


elseif ($modul=='aksi_pengunjung' AND $act=='hapus_pengunjung') {
 mysql_query("DELETE FROM pelanggan WHERE id_pelanggan= '$_GET[id]'");

echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Data Telah dihapus')
    window.location.href='index.php?modul=pengunjung';
    </SCRIPT>");

}

//update password pelanggan
elseif ($modul=='aksi_pengunjung' AND $act=='update_pengunjung_password') {
  $id_pengunjung=$_POST['id_user'];
  $password=md5($_POST['password']);

  mysql_query("UPDATE pelanggan set password='$password' WHERE id_pelanggan='$id_pengunjung'");
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Password Pelanggan ".$id_user." Telah Diubah')
    window.location.href='index.php?modul=pengunjung';
    </SCRIPT>");
}

}
 ?>