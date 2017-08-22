<?php 

if (!isset($_SESSION['namapesan']) && !isset($_SESSION['usernamepesan'])) {
	echo "<script type=text/javascript>  
alert('Anda Belum Login :) , Silahkan Login dan Dilarang mengakses langsung');  
window.location = 'login.php';  
</script>";
//	header('location:login.php');
}

 ?>