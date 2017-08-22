<?php 

session_start();
    mysql_query("UPDATE pelanggan
                         SET    
                                nama          = '$_POST[nama]',
                                alamat         = '$_POST[alamat]',
                               no_telpon          = '$_POST[no_telpon]'
                                WHERE id_pelanggan = '$_POST[kode]'") or die(mysql_error()); 
    
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Data  Telah Diubah')
    window.location.href='index.php?modul=usr';
    </SCRIPT>");

 




 ?>