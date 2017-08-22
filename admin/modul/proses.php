<?php
	
	$id_lapangan=$_POST[id];
	$tanggalz=$_POST[tanggalz];
	$harga=$_POST[harga];
	$jam=$_POST[jamz];
	$nama=$_POST[username];
	$idku=$_POST[idku];
	$id_harga=$_POST[idharga];
  $id_user=$s_post[id_user];

	
	?>
  
<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('txt1').value;
      var txtSecondNumberValue = document.getElementById('txt2').value;
      var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('txt3').value = result;
      }
}
</script>
	<div class="main">
    
    <div class="main-inner">

        <div class="container">
    
          <div class="row">         
 
            <div class="span5">
                   
                    
                    <legend><b>Form Pemesanan</b> </legend> 

                    <form method=POST action="index.php?modul=aksi_proses" enctype='multipart/form-data'>

                     <input type="hidden" name="idadmin" value="<?php echo"$idku"; ?>">
                      <input type="hidden" name="idharga" value="<?php echo"$id_harga"; ?>">  

                      <label class="control-label" ><b>Id Jadwal</b></label>
                      <input name="id_laps" class="form-control" value="<?php echo $id_lapangan ?>" type="text"  readonly>

                      <label class="control-label" ><b>Username</b></label>
                      <input name="username" id="username" class="form-control" value="" placeholder="masukkan nama pengguna" type="text"  >
					  

                      <label class="control-label" ><b>Nama lengkap</b></label>
                      <input name="nama" id="nama" class="form-control" value="" placeholder="masukkan nama pengguna" type="text"  >
                       <label class="control-label" ><b>Email</b></label>
                      <input name="email" id="email" class="form-control" value="" placeholder="masukkan email" type="text"  >
                        <div id="ndelik">
                        <label class="control-label" ><b>Password</b></label>
                      <input name="password" id="passwords" class="form-control" value="" placeholder="masukkan password" type="password"  >
                      </div>
                      <label class="control-label" ><b>Nama Klub</b></label>
                      <input name="nama_klub"id="nama_klub" class="form-control" value="" placeholder="Isi nama club" type="text"  required>

                      <label class="control-label" ><b>Tanggal</b></label>
                      <input name="tanggals" class="form-control" value="<?php echo $tanggalz?>"  type="text"  readonly>

                      <label class="control-label" ><b>Jam Main</b></label>
                      <input name="jams" class="form-control" value="<?php echo $jam?>"  type="text"  readonly>

                      <label class="control-label" ><b>Harga</b></label>
                      <input name="harga" class="form-control" value="<?php echo $harga?>"  type="text" onkeyup="sum();" id="txt1" readonly>
                      <label class="control-label" ><b>DP</b></label>
                      <input name="dp" class="form-control" value="" onkeyup="sum();" id="txt2" placeholder="isikan dp jika ada" type="text"  >

                      <label class="control-label" ><b>Sisa Pembayaran</b></label>
                      <input name="sisa" id="txt3" class="form-control" value=""  type="text"  readonly>

                      <label class="control-label" ><b>Alamat</b></label>
                      <textarea name="alamat" id="alamat" class="form-control" placeholder="alamat" type="text" required></textarea> 

                      <label class="control-label" ><b>Nomer Telpon</b></label>
                      <input name="no_telpon" id="no_telpon" class="form-control" placeholder="nomer telepon" type="tel" maxlength="15" onKeyUp="return checkInput(this);" required>

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
                      <br/>
                      <input type="submit" class="btn btn-primary" value="pesan">
                      <a href="index.php?modul=boking"><button type="button" class="btn btn-warning">Batal</button> </a>

                    </form>

            </div> <!-- /span3 -->
<div class="span6">
<br /><br />
<div class="alert alert-danger">
  <strong>Info!</strong> 

                     JIKA USER SUDAH TERDAFTAR DAN SAAT AKAN MENGISI FORM PEMESANAN, CUKUP MASUKKAN USERNAME YANG TERDAFTAR MAKA AKAN OTOMATIS BIODATA TERISI DAN PASSWORD DI KOSONGI SAJA. DAN JIKA USER BARU MAKA HARUS MENGISI SEMUA TERMASUK PASSWORD
                    </div>
                    <br/>
<div class="alert alert-warning">

  <strong>Info!</strong> 

                    PENYEWA HANYA DAPAT MELAKUKAN PEMESANAN SEKALI, TIDAK DAPAT MENGEDIT, TETAPI JIKA INGIN MEMESAN ULANG DAPAT MENGHAPUS PESANAN YANG DILAKUKAN ADMIN, ATAU JIKA SEBELUM TERLANJUR MEMESAN DAPAT KLIK TOMBOL BATAL PADA FORM DAN ULANGI PEMESANAN  
                    </div>
<br/>
       
</div>
                   
    
        </div><!--/row-->

    </div> <!--/container-->
                
</div> <!-- /main-inner -->

</div> <!--/ main-->


