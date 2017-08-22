<?php
$modul=$_GET['modul'];
$act=$_GET['act'];


if($act=='about'){
	$id12=$_POST[id12];
$about12=$_POST[about];
mysql_query("update about set 
									isi='$about12'
									where id_about='$id12'") or die("gagal".mysql_error());

echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('isi page about sudah di update')
    window.location.href='index.php?modul=profil';
    </SCRIPT>");
}
elseif($act=='ketentuan'){
	$id21=$_POST[id21];
$ketentuan=$_POST[ketentuan];
mysql_query("update about set 
									isi='$ketentuan'
									where id_about='$id21'") or die("gagal".mysql_error());

echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' isi page ketentuan sudah di update')
    window.location.href='index.php?modul=profil';
    </SCRIPT>");
}