<?php 
if (!empty($_SESSION['usernamepengunjung']) && !empty($_SESSION['namapengunjung'])) {
?>
<ul class="mainnav">
        <li class="active"><a href="index.php"><i class="icon-home"></i><span>Home</span> </a> </li>
        <li class="active"><a href="index.php?modul=profil"><i class="icon-briefcase"></i><span>About</span></a></li>
        <li class="active"><a href="index.php?modul=boking"><i class="icon-phone"></i><span>Pemesanan</span></a></li>
        
        <li class="active"><a href="index.php?modul=usr"><i class="icon-briefcase"></i><span>Edit Profil</span></a></li>
        <li class="active"><a href="index.php?modul=pesandetail"><i class="icon-briefcase"></i><span>Daftar Pemesanan</span></a></li>
        <li class="active"><a href="index.php?modul=ketentuan"><i class="icon-cog"></i><span>Ketentuan Pemakaian</span></a> </li>
      </ul>
<?php	
}else{
 ?>

<ul class="mainnav">
  <li class="active"><a href="index.php"><i class="icon-home"></i><span>Home</span> </a> </li>
  <li class="active"><a href="index.php?modul=profil"><i class="icon-briefcase"></i><span>About</span></a></li>
  <li class="active"><a href="index.php?modul=boking"><i class="icon-phone"></i><span>Pemesanan</span></a></li>
  <li class="active"><a href="index.php?modul=ketentuan"><i class="icon-cog"></i><span>Ketentuan Pemakaian</span></a> </li>
 
<li class="active"><a href="login.php"><i class="icon-info-sign"></i><span>Login</span></a> </li>

 
 
<?php } ?>