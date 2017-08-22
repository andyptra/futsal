<style type="text/css">
	.btn-success{
		background-color: #2980b9 !important;
	}
</style>
<?php
session_start();

$_SESSION['KCFINDER']=array();
$_SESSION['KCFINDER']['disabled'] = false;
$_SESSION['KCFINDER']['uploadURL'] = "/bkk/Images/";
$_SESSION['KCFINDER']['uploadDir'] = "";


include("db/config.php");
if (!empty($_SESSION['usernamepesan']) && !empty($_SESSION['namapesan'])){
	echo "<script type=text/javascript>  
alert('Anda Sudah Login :) , Silahkan Logout terlebih dahulu');  
window.location = 'index.php';  
</script>";
	//header('Location:index.php');
}

if(!empty($_POST['submit'])){

$perintah_query=mysql_query("SELECT * FROM pelanggan WHERE username= '$_POST[username]' AND password= md5('$_POST[password]')");
	if ($hasil_cek=mysql_num_rows($perintah_query))
	{
	//SUKSESS
	$datauser=mysql_fetch_array($perintah_query);
	$_SESSION['usernamepengunjung']=$_POST['username'];
	$_SESSION['passpengunjung']=$_POST['password'];
	$_SESSION['namapengunjung']=$datauser['nama'];
//	echo $_SESSION[level];
	
	header("Location: index.php"); 
	}	else
	{
	//GAGAL LOGIN
	header("Location: login.php?err=yes");
	}
	}
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Aplikasi Reservasi lapangan Futsal</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand">
				Login Area Pelanggan			
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="">						
						<a href="index.php" class="">
							<i class="icon-chevron-left"></i>
							Kembali
						</a>
						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container">
	
	<div class="content clearfix">
		
		<form action="" method="post">
		
			<h1>Login Pelanggan </h1>
			<?php if(!empty($_GET['err'])){ ?>		
			<div class="alert alert-danger" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">Error:</span>
			  Enter a valid username and password
			</div>
			<?php } ?>
			<div class="login-fields">
				
				<p>Please provide your details</p>
				
				<div class="field">
					<label for="">Username:</label>
					<input type="username" id="" name="username" value="" placeholder="Username" class="login username-field" required />
					
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field" required/>
				</div> <!-- /password -->
				
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				<input type="submit" name="submit" class="button btn btn-success btn-large" 
			</div> <!-- .actions -->
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->



<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/signin.js"></script>

</body>

</html>
