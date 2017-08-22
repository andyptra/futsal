<?php
include"../../db/config.php";
$kd_k = $_POST['id'];
// query untuk menampilkan  berdasarkan kd_k
$d = mysql_fetch_array(mysql_query("SELECT * FROM pemesanan WHERE id_pemesanan=".$kd_k));
?>
<form class="form" method="post" action="index.php?modul=updatestatus">
      
          <div class="form-group">
            <label class="control-label" ><b>Id Pemesanan</b></label>
            <input id="idku" name="id" class="input-xxlarge" value="<?php echo "$d[id_pemesanan]";?>" type="text" readonly>
            <label class="control-label" ><b>Harga</b></label>
            <input  name="harga" class="input-xxlarge" value="<?php echo "$d[harga]";?>" type="text" readonly>
            <label class="control-label" ><b>DP</b></label>
            <input  name="dp" class="input-xxlarge" value="<?php echo "$d[dp]";?>" type="text" readonly>
            <label class="control-label" ><b>Sisa</b></label>
            <input  name="sisa" class="input-xxlarge" value="<?php echo "$d[sisa]";?>" type="text" >
          </div>