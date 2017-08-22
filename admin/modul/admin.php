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
 
            <div class="span3">
                    <?php 
                        switch (isset($_GET['act'])) {
                            default:
                        
                         ?>
                
                      <legend><b>Tambah Data Admin</b></legend>
                      
                      <form method=POST action="index.php?modul=aksi_admin&act=input_admin" enctype='multipart/form-data'>

                      <label class="control-label" ><b>Username</b></label>
                      <input name="username" class="input-large" type="text"  required>

                      <label class="control-label" ><b>Password</b></label>
                      <input name="password" class="input-large" type="password" maxlength="80"  required>

                      <label class="control-label" ><b>Nama</b></label>
                      <input name="nama" class="input-large" type="text"  required>

                      <label class="control-label" ><b>Email</b></label>
                      <input name="email" class="input-large" type="email"  required>

                      <label class="control-label" ><b>Image</b></label>
                      <input name="fupload" class="input-large" type="file"  required><br />

                      <input type="submit" class="btn btn-primary">
                      <input type="reset" class="btn btn-primary">
                      </form>    

                    <?php 
                    break;
                    case "edit":
                    $data=mysql_fetch_array(mysql_query("SELECT * FROM admin WHERE id_admin='$_GET[id]'"));
                     ?>                     
                    
                    <legend><b>Edit Data Admin</b> </legend> 

                    <form method=POST action="index.php?modul=aksi_admin&act=update_admin" enctype='multipart/form-data'>

                       <a href="<?php echo $data['id_admin']; ?>" class="btn btn-warning btn-sm" data-remote="false" data-toggle="modal" data-target="#notifpassword"> Ubah Password</a>
                       <br /><br />

                      <label class="control-label" ><b>Id Admin</b></label>
                      <input name="kode" class="input-large" value="<?php echo $data['id_admin']; ?>" type="text"  readonly>


                      <label class="control-label" ><b>Username</b></label>
                      <input name="username" class="input-large" value="<?php echo $data['username']; ?>" type="text"  required>

                      <label class="control-label" ><b>Nama</b></label>
                      <input name="nama" class="input-large" value="<?php echo $data['nama']; ?>" type="text"  required>

                      <label class="control-label" ><b>Email</b></label>
                      <input name="email" class="input-large" value="<?php echo $data['email']; ?>" type="text"  required>

                      <label class="control-label"><b>Image</b></label>
                      <img src="../Gambar/Gambar_user/small_<?php echo $data['foto']; ?>"><br /><br />
                      <label class="control-label"><b>Ganti Image</b></label>
                      <input name="fupload" class="input-xlarge" type="file"><br />

                      <input type="submit" class="btn btn-primary">
                      <input type="reset" class="btn btn-primary"> 

                    </form>
                     <?php 
                    }
                     ?> 

            </div> <!-- /span3 -->

                     <div class="span9">
                
                            <legend><b>Data Administrator</b></legend>
                              <table id="datatables" class="display">
                              <thead>
                              <tr>
                              <th>No.</th> 
                              <th>Username</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Foto</th>
                              <th width="110px">AKSI</th></tr>
                              </thead>
                              <tbody>
                              <?php 
                              $sql=mysql_query("select * from admin order by id_admin");
                              $no=0;
                              while($baris=mysql_fetch_array($sql)){
                                $no++;
                               ?>
                            <tr>
                              <td align="center"><?php echo $no;  ?></td>
                              <td align="center"><?php echo $baris['username']; ?></td>
                              <td align="center"><?php echo $baris['nama']; ?></td>
                              <td align="center"><?php echo $baris['email']; ?></td>
                              <td align="center">
                              <?php 
                                if ($baris['foto']=="no picture") {
                                  echo '<img class="alignleft size-full wp-image-41 " src="../Gambar/Gambar_noimage/no_img.jpg" width="100px" alt="" border="0"/>';
                                }else{
                                  echo '<img class="alignleft size-full wp-image-41 " src="../Gambar/Gambar_user/small_'.$baris['foto'].'" width="100px" alt="" border="0"/>';
                               }
                               ?>
                              </td> 
                            <td>
                              <a href="index.php?modul=admin&act=edit&id=<?php echo $baris['id_admin']; ?>" class="btn btn-info btn-sm" >Edit</a>
                              <a href="index.php?modul=aksi_admin&act=hapus_admin&id=<?php echo $baris['id_admin']; ?>" onclick="return konfirmasi()" class="btn btn-info btn-sm" >Hapus</a>

                            </td></tr>
                              <?php } ?>

                              </tbody>
                              </table>
            </div><!--/span9-->
    
        </div><!--/row-->

    </div> <!--/container-->
                
</div> <!-- /main-inner -->

</div> <!--/ main-->

<!-- Modal -->
<div class="modal fade" id="notifpassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Password Admin</h4>
      </div>
      <div class="modal-body">
        <form class="form" method="post" action="index.php?modul=aksi_admin&act=update_admin_password">
          <div class="form-group">
            <label class="control-label" ><b>Id Admin</b></label>
            <input id="idUser" name="id_admin" class="input-xxlarge" value="" type="text" readonly>
            <label class="control-label" ><b>Password Baru</b></label>
            <input  name="password" class="input-xxlarge" value="" type="password" >
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-warning" value="Update Password" name="update_password"></input>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $('#notifpassword').on('show.bs.modal', function (event) {
            $('#idUser', this).attr('value', $(event.relatedTarget).attr('href'))

})
</script>            