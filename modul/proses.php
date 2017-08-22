<?php
	$id_harga=$_POST[idharga];
	$id_lapangan=$_POST[id];
	$tanggalz=$_POST[tanggalz];
	$harga=$_POST[harga];
	$jam=$_POST[jamz];
	$nama=$_SESSION['usernamepengunjung'];
	$query=mysql_query("select * from pelanggan where username='$nama'");
	$rr=mysql_fetch_array($query);
	?>

	<div class="main">
    
    <div class="main-inner">

        <div class="container">
    
          <div class="row">         
 
            <div class="span5">
                   
                    
                    <legend><b>Form Pemesanan</b> </legend> 

                    <form method=POST action="index.php?modul=aksi_proses" enctype='multipart/form-data'>

                     
                       
 <input type="hidden" name="idharga" value="<?php echo"$id_harga"; ?>"> 
 <input type="hidden" name="iduser" value="<?php echo"$rr[id_pelanggan]"; ?>"> 
                      <label class="control-label" ><b>Id Jadwal</b></label>
                      <input name="id_laps" class="form-control" value="<?php echo $id_lapangan ?>" type="text"  readonly>

                      <label class="control-label" ><b>Username</b></label>
                      <input name="username" class="form-control" value="<?php echo $nama ?>" type="text"  readonly>

                      <label class="control-label" ><b>Nama Klub</b></label>
                      <input name="nama_klub" class="form-control" value="<?php echo $rr['nama_klub']; ?>" placeholder="Isi nama club" type="text"  required>

                      <label class="control-label" ><b>Tanggal</b></label>
                      <input name="tanggals" class="form-control" value="<?php echo $tanggalz?>"  type="text"  readonly>

                      <label class="control-label" ><b>Jam Main</b></label>
                      <input name="jams" class="form-control" value="<?php echo $jam?>"  type="text"  readonly>

                      <label class="control-label" ><b>Harga</b></label>
                      <input name="harga" class="form-control" value="<?php echo $harga?>"  type="text"  readonly>

                      <label class="control-label" ><b>Alamat</b></label>
                      <textarea name="alamat" class="form-control" type="text" required><?php echo $rr['alamat']; ?></textarea> 

                      <label class="control-label" ><b>Nomer Telpon</b></label>
                      <input name="no_telpon" class="form-control" value="<?php echo $rr['no_telpon']; ?>" type="tel" maxlength="15" onKeyUp="return checkInput(this);" required>

                      <script>
                      function checkInput(obj) 
                        {
                            var pola = "^";
                            pola += "[0-9]*";
                            pola += "$";
                            rx = new RegExp(pola);
                         
                            if (!obj.value.match(rx))
                            {
                                if (obj.lastMatched)
                                {
                                    obj.value = obj.lastMatched;
                                }
                                else
                                {
                                    obj.value = "";
                                }
                            }
                            else
                            {
                                obj.lastMatched = obj.value;
                            }
                        }
                      </script>

                      <input type="submit" class="btn btn-primary" value="pesan">
                      <a href="index.php?modul=boking"><button type="button" class="btn btn-warning">Batal</button> </a>

                    </form>

            </div> <!-- /span3 -->
<div class="span6">
<br /><br />
<div class="alert alert-danger">
  <strong>Info!</strong> 

                    Anda hanya dapat melakukan pemesanan sekali, anda tidak dapat mengedit, tetapi jika anda ingin memesan ulang anda dapat menghapus pesanan, dan jika anda ragu dengan pesanan anda bisa klik tombol batal di bawah, dan ulangi pemesanan
                    </div>
</div>
                   
    
        </div><!--/row-->

    </div> <!--/container-->
                
</div> <!-- /main-inner -->

</div> <!--/ main-->
