<?php
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $db = 'futsal';
  error_reporting(0);
  mysql_connect($host, $user, $password) or die ('Gagal Koneksi Ke MySQL Server');
  
  mysql_select_db($db) or die ('Gagal Koneksi Ke Database futsal');
  
define('VALIDASI',1);
include "fungsigambar.php";


$zz=mysql_fetch_array(mysql_query("Select * from profil where id_profil='1'"));
$namaprofil=$zz[namafutsal];
$alamatprofil=$zz[alamat];
$kodeposprofil=$zz[kodepos];
$faxprofil=$zz[fax];
$no_telponprofil=$zz[no_hp];
?>
