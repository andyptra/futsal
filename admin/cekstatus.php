<?php 

if (!isset($_SESSION['email']) && !isset($_SESSION['nama'])) {
	echo "<script type=text/javascript>  
alert('Anda Belum Login :) , Silahkan Login dan Dilarang mengakses langsung');  
window.location = 'login.php';  
</script>";
//	header('location:login.php');
}

 ?>