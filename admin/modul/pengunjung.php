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
                
                      <legend><b>Tambah Data Pelanggan</b></legend>
                      
                      <form method=POST action="index.php?modul=aksi_pengunjung&act=input_pengunjung" enctype='multipart/form-data'>

                      <label class="control-label" ><b>Username</b></label>
                      <input name="username" class="input-large" type="text"  required>

                      <label class="control-label" ><b>Password</b></label>
                      <input name="password" class="input-large" type="password" maxlength="80"  required>

                       <label class="control-label" ><b>Nama lengkap</b></label>
                      <input name="nama" class="input-large" type="text" maxlength="100" onKeyUp="return checkInput2(this);" required>
                      <label class="control-label" ><b>Nama klub</b></label>
                      <input name="nama_klub" class="input-large" type="text" maxlength="80"  required>
                       <label class="control-label" ><b>Email</b></label>
                      <input name="email" class="input-large" type="text" maxlength="80"  required>
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
                     <textarea name="alamat" class="input-large" type="text" required></textarea> 

                      <label class="control-label" ><b>Nomer Telpon</b></label>
                      <input name="no_telpon" class="input-large" type="tel" maxlength="15" onKeyUp="return checkInput(this);" required>

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


                      <input type="submit" class="btn btn-primary">
                      <input type="reset" class="btn btn-primary">
                      </form>    

                    <?php 
                    break;
                    case "edit":
                    $data=mysql_fetch_array(mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'"));
                     ?>                     
                    
                    <legend><b>Edit Data Pelanggan</b> </legend> 

                    <form method=POST action="index.php?modul=aksi_pengunjung&act=update_pengunjung" enctype='multipart/form-data'>

                       <a href="<?php echo $data['id_pelanggan']; ?>" class="btn btn-warning btn-sm" data-remote="false" data-toggle="modal" data-target="#notifpassword"> Ubah Password</a>
                       <br /><br />

                      <label class="control-label" ><b>Id Pelanggan</b></label>
                      <input name="kode" class="input-large" value="<?php echo $data['id_pelanggan']; ?>" type="text"  readonly>

                      <label class="control-label" ><b>Username</b></label>
                      <input name="username" class="input-large" value="<?php echo $data['username']; ?>" type="text"  readonly>

                    
                      <label class="control-label" ><b>Nama lengkap</b></label>
                      <input name="nama" value="<?php echo $data['nama']; ?>" class="input-large" type="text" maxlength="100" onKeyUp="return checkInput2(this);" required>
                      <label class="control-label" ><b>Nama klub</b></label>
                      <input value="<?php echo $data['nama_klub']; ?>" name="nama_klub" class="input-large" type="text" maxlength="80"  required>

                       <label class="control-label" ><b>Email</b></label>
                      <input name="email" value="<?php echo $data['email']; ?>" class="input-large" type="text" maxlength="80"  required>

                      <label class="control-label" ><b>Alamat</b></label>
                      <textarea name="alamat" class="input-large" type="text" required><?php echo $data['alamat']; ?></textarea> 

                      <label class="control-label" ><b>Nomer Telpon</b></label>
                      <input name="no_telpon" class="input-large" value="<?php echo $data['no_telpon']; ?>" type="tel" maxlength="15" onKeyUp="return checkInput(this);" required>

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

                      <input type="submit" class="btn btn-primary">
                      <input type="reset" class="btn btn-primary"> 

                    </form>
                     <?php 
                    }
                     ?> 

            </div>  <!-- span3 -->

                     <div class="span9">
                
                            <legend><b>Data Pelanggan</b></legend>
                              <table id="datatables" class="display">
                              <thead>
                              <tr>
                              <th>No.</th> 
                              <th>Username</th>
                              <th>Nama</th>
                              <th>Alamat</th>
                              <th>No Telpon</th>
                              
                              <th width="110px">AKSI</th></tr>
                              </thead>
                              <tbody>
                              <?php 
                              $sql=mysql_query("select * from pelanggan order by id_pelanggan");
                              $no=0;
                              while($baris=mysql_fetch_array($sql)){
                                $no++;
                               ?>
                            <tr>
                              <td align="center"><?php echo $no;  ?></td>
                              <td align="center"><?php echo $baris['username']; ?></td>
                              <td align="center"><?php echo $baris['nama']; ?></td>
                              <td align="center"><?php echo $baris['alamat']; ?></td>
                              <td align="center"><?php echo $baris['no_telpon']; ?></td>

                              <td>
                              
                              <a href="index.php?modul=pengunjung&act=edit&id=<?php echo $baris['id_pelanggan']; ?>" class="btn btn-info btn-sm" >Edit</a>
                              <a href="index.php?modul=aksi_pengunjung&act=hapus_pengunjung&id=<?php echo $baris['id_pelanggan']; ?>" onclick="return konfirmasi()" class="btn btn-info btn-sm" >Hapus</a>
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
        <h4 class="modal-title" id="myModalLabel">Edit Password Pelanggan</h4>
      </div>
      <div class="modal-body">
        <form class="form" method="post" action="index.php?modul=aksi_pengunjung&act=update_pengunjung_password">
          <div class="form-group">
            <label class="control-label" ><b>Id Pelanggan</b></label>
            <input id="idUser" name="id_user" class="input-xxlarge" value="" type="text" readonly>
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