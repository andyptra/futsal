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
if ($modul=='aksi_admin' AND $act=='input_admin') {
$lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  // Apabila ada foto yang diupload
  if (!empty($lokasi_file)){
    UploadImageUser($nama_file_unik);

 // Kalau username sudah ada yang pakai
 $cek_username=mysql_num_rows(mysql_query
             ("SELECT username FROM admin
               WHERE username='$_POST[username]'"));

  if ($cek_username > 0){
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Data tidak berhasil ditambah, Username telah terpakai !! Coba Lagi')
    window.location.href='index.php?modul=admin';
    </SCRIPT>");
}else{
  mysql_query("INSERT INTO admin                      
                         VALUES('',
                                '$_POST[username]',
                                '".md5($_POST['password'])."',
                                '$_POST[nama]',
                                '$_POST[email]',
                                '$nama_file_unik')");
                                 
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Data Telah Ditambahkan')
    window.location.href='index.php?modul=admin';
    </SCRIPT>");
}
}
}
// UPDATE USER------------------------------------------------------------------------- 
elseif ($modul=='aksi_admin' AND $act=='update_admin') {
  $lokasi_file    = $_FILES['fupload']['tmp_name']; 


// APABILA FOTO TIDAK DIGANTI

  if (empty($lokasi_file)) {
    // $password=md5($_POST['password']);
    mysql_query("UPDATE admin 
                         SET    username = '$_POST[username]',
                                nama     = '$_POST[nama]',
                                email    = '$_POST[email]'
                                WHERE id_admin = '$_POST[kode]'");

echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Data Telah Diubah')
    window.location.href='index.php?modul=admin';
    </SCRIPT>");
  }elseif (!empty($lokasi_file)) {
    // $password=md5($_POST['password']);
    $lokasi_file    = $_FILES['fupload']['tmp_name'];
    $tipe_file      = $_FILES['fupload']['type'];
    $nama_file      = $_FILES['fupload']['name'];
    $acak           = rand(1,99);
    $nama_file_unik = $acak.$nama_file; 

    //EDIT FOTO
    $datafoto = mysql_query("SELECT foto FROM admin WHERE id_admin='$_POST[kode]'");//dirubah
    $r = mysql_fetch_array($datafoto);
    @unlink('../Gambar/Gambar_user/'.$r['foto']); //dirubah
    @unlink('../Gambar/Gambar_user/'.'small_'.$r['foto']); //dirubah
    UploadImageUser($nama_file_unik);
    mysql_query("UPDATE admin 
                         SET    username      = '$_POST[username]',
                                nama          = '$_POST[nama]',
                                email         = '$_POST[email]',
                                foto          = '$nama_file_unik'
                                WHERE id_admin = '$_POST[kode]'"); //dirubah
    
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Data Foto Telah Diubah')
    window.location.href='index.php?modul=admin';
    </SCRIPT>");

  }
}
// HAPUS BERITA-------------------------------------------------------------------------
elseif ($modul=='aksi_admin' AND $act=='hapus_admin') {
  $datafoto = mysql_query("SELECT foto FROM admin WHERE id_admin='$_GET[id]'"); //dirubah
    $r = mysql_fetch_array($datafoto);
    @unlink('../Gambar/Gambar_user/'.$r['foto']);//dirubah
    @unlink('../Gambar/Gambar_user/'.'small_'.$r['foto']); //dirubah
    mysql_query("DELETE FROM admin WHERE id_admin = '$_GET[id]'"); // dirubah
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Data Telah dihapus')
    window.location.href='index.php?modul=admin';
    </SCRIPT>");

}

//update password alumni
elseif ($modul=='aksi_admin' AND $act=='update_admin_password') {
  $id_admin=$_POST['id_admin'];
  $password=md5($_POST['password']);

  mysql_query("UPDATE admin set password='$password' WHERE id_admin='$id_admin'");
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Password User ".$id_admin." Telah Diubah')
    window.location.href='index.php?modul=admin';
    </SCRIPT>");
}

}
 ?>