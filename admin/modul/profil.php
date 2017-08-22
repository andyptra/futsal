<script type="text/javascript" language="JavaScript">
function konfirmasi()
{
    tanya = confirm("Anda yakin akan menghapus data ?");
    if (tanya== true) return true;
    else return false; 
} </script>
    
<?php
$angkas='1';
$pp=mysql_query("select * from profil where id_profil='$angkas'");
      $rr=mysql_fetch_array($pp);
?>
<div class="main">
    
    <div class="main-inner">

        <div class="container">
    
          <div class="row">         
 
            <div class="span5">
                
                
                      <legend><b>Profil</b></legend>
                      
                      <form method=POST action="index.php?modul=aksi_profil" enctype='multipart/form-data'>

                      <input type="hidden" name="id" value="<?php echo $rr[id_profil];?>">

                       <label class="control-label" ><b>Nama Futsal</b></label>
                      <input name="namafutsal" class="form-control" value="<?php echo $rr[namafutsal];?>" type="text" maxlength="100" onKeyUp="return checkInput2(this);" required>

                       <script>
                      function checkInput2(obj) 
                        {
                            var pola = "^";
                            pola += "[a-zA-Z ]*";
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

                     <label class="control-label" ><b>Alamat</b></label>
                     <textarea name="alamat" class="form-control" type="text" required><?php echo $rr[alamat];?></textarea> 

                      <label class="control-label" ><b>Kodepos</b></label>
                      <input name="kodepos" class="form-control" value="<?php echo $rr[kodepos];?>" type="tel" maxlength="15"  required>

                      <label class="control-label" ><b>Nomer Telpon</b></label>
                      <input name="no_hp" class="form-control" value="<?php echo $rr[no_hp];?>" type="tel" maxlength="15" onKeyUp="return checkInput(this);" required>


                      <label class="control-label" ><b>Fax</b></label>
                      <input name="fax" class="form-control" value="<?php echo $rr[fax];?>" type="tel" maxlength="15"  required>
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
                      <input type="submit" value="update" class="btn btn-primary">
                      
                      </form>    

                   

            </div> <!-- /span5 -->


<div class="span5">
                
                
                      <legend><b>Harga</b></legend>
                      
                      <form method=POST action="index.php?modul=aksi_jam&act=day" enctype='multipart/form-data'>
                      <?php
                      $id1='1';
                      $jmsiang=mysql_query("select id_harga,harga from harga where id_harga='$id1'");
                      $bacasiang=mysql_fetch_array($jmsiang);

                      ?>
                      <input type="hidden" name="id1" value="<?php echo $bacasiang[id_harga];?>">

                       <label class="control-label" ><b>Jam Siang</b></label>
                      <input name="harga1" class="form-control" value="<?php echo $bacasiang[harga];?>" type="text" maxlength="100" required>


                      <br/>
                      <input type="submit" value="update" class="btn btn-primary">
                      
                      </form>    
                      <form method=POST action="index.php?modul=aksi_jam&act=night" enctype='multipart/form-data'>
                      <?php
                      $id2='2';
                      $jmnight=mysql_query("select id_harga,harga from harga where id_harga='$id2'");
                      $bacanight=mysql_fetch_array($jmnight);

                      ?>
                      <input type="hidden" name="id2" value="<?php echo $bacanight[id_harga];?>">
                       <label class="control-label" ><b>Jam Malam </b></label>
                      <input name="harga2" class="form-control" value="<?php echo $bacanight[harga];?>" type="text" maxlength="100"  required>


                      <br/>
                      <input type="submit" value="update" class="btn btn-primary">
                      
                      </form> 
                   

            </div> <!-- /span3 -->

        </div><!--/row-->   
        <div class="row">
         <div class="span6" >
                <form method=POST action="index.php?modul=aksi_about&act=about" enctype='multipart/form-data'>
                      <?php
                      $id12='1';
                      $aabout=mysql_query("select id_about,isi from about where id_about='$id12'");
                      $bacaabout=mysql_fetch_array($aabout);

                      ?>
                      <legend><b>About</b></legend>
                         <input type="hidden" name="id12" value="<?php echo $bacaabout[id_about];?>">
                      <textarea name="about" class="ckeditor"><?php echo "$bacaabout[isi]";?></textarea><br />  
                      
                      <input type="submit" value="update" class="btn btn-primary">
                      
                      </form>
                      </div> <!-- /span9 -->   
                      <div class="span6" >
                        <form method=POST action="index.php?modul=aksi_about&act=ketentuan" enctype='multipart/form-data'>
                      <?php
                      $id21='2';
                      $aketentuan=mysql_query("select id_about,isi from about where id_about='$id21'");
                      $bacaketentuan=mysql_fetch_array($aketentuan);

                      ?>
                      <legend><b>Kententuan Pemakaian Lapangan</b></legend>
                        <input type="hidden" name="id21" value="<?php echo $bacaketentuan[id_about];?>">
                      <textarea name="ketentuan" class="ckeditor"><?php echo "$bacaketentuan[isi]";?></textarea><br />  
                      
                      <input type="submit" value="update" class="btn btn-primary">
                      
                      </form>
                      </div> <!-- /span9 -->
        </div><!-- endorw-->
        </div><!--/row-->

    </div> <!--/container-->
                
</div> <!-- /main-inner -->

</div> <!--/ main-->


