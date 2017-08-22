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

//INPUT BERITA-------------------------------------------------------------------------
if ($modul=='aksi_berita' AND $act=='input_berita') { //---DIRUBAH nama aksi
	
$lokasi_file      = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  $slug           = slug($_POST['judul']); // ini dirubah
  
  // Apabila ada foto yang diupload
  if (!empty($lokasi_file)){
    UploadImage($nama_file_unik);
  mysql_query("INSERT INTO berita                      
	                       VALUES('',
                                '$_POST[tgl_berita]',
                                '$_POST[judul]',
                                '$_POST[isi]',
				                        '$nama_file_unik',
                                '$slug')"); // ini dirubah

echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Data Telah Ditambahkan')
    window.location.href='index.php?modul=berita';
    </SCRIPT>");
}else{
  mysql_query("INSERT INTO berita                      
                         VALUES('',
                                '$_POST[tgl_berita]',
                                '$_POST[judul]',
                                '$_POST[isi]',
                                'no picture',
                                '$slug')"); // ini dirubah

echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Data Telah Ditambahkan')
    window.location.href='index.php?modul=berita';
    </SCRIPT>");

}
}
// UPDATE BERITA------------------------------------------------------------------------- 
elseif ($modul=='aksi_berita' AND $act=='update_berita') { // ini dirubah
	$lokasi_file    = $_FILES['fupload']['tmp_name'];	


// APABILA FOTO TIDAK DIGANTI

$slug      = slug($_POST['judul']);
	if (empty($lokasi_file)) {
		mysql_query("UPDATE berita 
	                       SET    tgl_berita      = '$_POST[tgl_berita]',
                                judul           = '$_POST[judul]',
                                isi             = '$_POST[isi]',
                                slug='$slug'
                                WHERE id_berita = '$_POST[kode]'");

echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Data Telah Diubah')
    window.location.href='index.php?modul=berita';
    </SCRIPT>");
	}elseif (!empty($lokasi_file)) {
	  $lokasi_file    = $_FILES['fupload']['tmp_name'];
	  $tipe_file      = $_FILES['fupload']['type'];
	  $nama_file      = $_FILES['fupload']['name'];
	  $acak           = rand(1,99);
	  $nama_file_unik = $acak.$nama_file; 
	  $slug      = slug($_POST['judul']);

	  //EDIT FOTO
	  $datafoto = mysql_query("SELECT foto FROM berita WHERE id_berita='$_POST[kode]'");//dirubah
	  $r = mysql_fetch_array($datafoto);
	  @unlink('../Gambar/Gambar_berita/'.$r['foto']); //dirubah
	  @unlink('../Gambar/Gambar_berita/'.'small_'.$r['foto']); //dirubah
	  UploadImage($nama_file_unik);
	  mysql_query("UPDATE berita 
	                       SET    tgl_berita      = '$_POST[tgl_berita]',
                                judul           = '$_POST[judul]',
                                isi             = '$_POST[isi]',
                                slug            ='$slug',
                                foto            ='$nama_file_unik'
                                WHERE id_berita = '$_POST[kode]'"); //dirubah
    
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Data dan Foto Telah Diubah')
    window.location.href='index.php?modul=berita';
    </SCRIPT>");

	}
}
// HAPUS BERITA-------------------------------------------------------------------------
elseif ($modul=='aksi_berita' AND $act=='hapus_berita') {
	$datafoto = mysql_query("SELECT foto FROM berita WHERE id_berita='$_GET[id]'"); //dirubah
	  $r = mysql_fetch_array($datafoto);
	  @unlink('../Gambar/Gambar_berita/'.$r['foto']);//dirubah
	  @unlink('../Gambar/Gambar_berita/'.'small_'.$r['foto']); //dirubah
	  mysql_query("DELETE FROM berita WHERE id_berita = '$_GET[id]'"); // dirubah
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Data Telah dihapus')
    window.location.href='index.php?modul=berita';
    </SCRIPT>");

}
}
 ?>