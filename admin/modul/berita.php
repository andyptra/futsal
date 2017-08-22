<script type="text/javascript" language="JavaScript">
function konfirmasi()
{
    tanya = confirm("Anda yakin akan menghapus data ?");
    if (tanya== true) return true;
    else return false; 
} </script>
    
<div class="main">
    
    <div class="main-inner">

        <div class="container">
    
          <div class="row"> 

          <div class="">        
 
            <div class="span3">

                        <?php 
                        switch (isset($_GET['act'])) {
                            default:
                        
                         ?>

                        <legend><b>Tambah Data Berita</b> </legend>
                        <form method=POST action="index.php?modul=aksi_berita&act=input_berita" enctype='multipart/form-data'>

                        <label class="control-label" ><b>Judul Berita</b></label>
                        <input name="judul" class="input-large" type="text" maxlength="225" required>

                        <label class="control-label" ><b>Tanggal Berita</b></label>
                        <input name="tgl_berita" class="input-large" type="date"  required>

                        <label class="control-label" for="tanggal"><b>Image</b></label>
                        <input name="fupload" class="input-xlarge" type="file">

            </div> <!-- /span3 -->
                
            
            <div class="span9" >
                
                      <legend><b>Isi Berita</b></legend>

                      <textarea name="isi" class="ckeditor"></textarea><br />  
                      
                      <input type="submit" class="btn btn-primary">
                      <input type="reset" class="btn btn-primary">
                      </form>

                    <?php 
                    break;
                    case "edit":
                    $data=mysql_fetch_array(mysql_query("SELECT * FROM berita WHERE id_berita='$_GET[id]'"))
                     ?> 

                    <legend><b>Edit Berita</b> </legend>
                    
                    <form method=POST action="index.php?modul=aksi_berita&act=update_berita" enctype='multipart/form-data'>

                        <label class="control-label" ><b>id Berita</b></label>
                        <input name="kode" class="input-large" type="text" value="<?php echo $data['id_berita']; ?>"  readonly>

                        <label class="control-label" ><b>Judul Berita</b></label>
                        <input name="judul" class="input-large" type="text" value="<?php echo $data['judul']; ?>" maxlength="225" required>

                        <label class="control-label" ><b>Tanggal Berita</b></label>
                        <input name="tgl_berita" class="input-large" value="<?php echo $data['tgl_berita']; ?>" type="date"  required>

                        <label class="control-label"><b>Image</b></label>
                        <img src="../Gambar/Gambar_berita/small_<?php echo $data['foto']; ?>"><br /><br />
                        <label class="control-label"><b>Ganti Image</b></label>
                        <input name="fupload" class="input-xlarge" type="file">

            </div> <!-- /span3 -->
                
            <!-- /EDIT ISI BERITA -->
            <div class="span9" >
                
                      <legend><b>Edit Isi Berita</b></legend>
                                         
                      <textarea name="isi" class="ckeditor"><?php echo $data['isi']; ?></textarea><br /> 
                      
                      <input type="submit" class="btn btn-primary">
                      <input type="reset" class="btn btn-primary">
                      </form>

                    <?php 
                    }
                     ?>  
                     
            </div> <!-- /span9 -->


             <div class="span12">
                
                    <legend><b>Data Berita BKK</b></legend>
                        
                        <table id="datatables" class="display">
                        <thead>
                        <tr>
                        <th>No.</th> 
                        <th>Judul Berita</th>
                        <th>Tanggal Berita</th>
                        <th>Isi Berita</th>
                        <th>Foto</th>
                        <th width="110px">AKSI</th></tr>
                        </thead>
                        <tbody>

                        <?php 
                        $sql=mysql_query("select * from berita order by id_berita");
                        $no=0;
                        while($baris=mysql_fetch_array($sql)){
                          $no++;
                         ?><tr>

                        <td align="center"><?php echo $no;  ?></td>
                        <td align="center"><?php echo $baris['judul']; ?></td>
                        <td align="center"><?php echo $baris['tgl_berita']; ?></td>
                        <td align="center"><?php echo substr($baris['isi'], 0,250); ?></td>
                        <td align="center">
                        <?php 
                          if ($baris['foto']=="no picture") {
                            echo '<img class="alignleft size-full wp-image-41 " src="../Gambar/Gambar_noimage/no_img.jpg" width="100px" alt="" border="0"/>';
                          }else{
                            echo '<img class="alignleft size-full wp-image-41 " src="../Gambar/Gambar_berita/small_'.$baris['foto'].'" width="100px" alt="" border="0"/>';
                         }
                         ?>
                        </td>
                        <td>
                        <a href="index.php?modul=berita&act=edit&id=<?php echo $baris['id_berita']; ?>" class="btn btn-info btn-sm" >Edit</a>
                        <a href="index.php?modul=aksi_berita&act=hapus_berita&id=<?php echo $baris['id_berita']; ?>" onclick="return konfirmasi()" class="btn btn-info btn-sm" >Hapus</a>

                        </td></tr>
                        <?php } ?>
                        </tbody>
                        </table>
                        
            </div><!--/span12-->
    
        </div><!--/row-->

    </div> <!--/container-->
                
</div> <!-- /main-inner -->

</div> <!--/ main-->
            