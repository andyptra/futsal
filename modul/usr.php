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
 
            <div class="span5">
            <?php
            session_start();
                  $data=mysql_fetch_array(mysql_query("SELECT * FROM pelanggan WHERE username='$_SESSION[usernamepengunjung]'"));
                     ?>                     
                    
                    <legend><b>Edit Data Pelanggan</b> </legend> 

                    <form method=POST action="index.php?modul=aksi_usr" enctype='multipart/form-data'>

                       <a href="<?php echo $data['id_pelanggan']; ?>" class="btn btn-warning btn-sm" data-remote="false" data-toggle="modal" data-target="#notifpassword"> Ubah Password</a>
                       <br /><br />

                      <label class="control-label" ><b>Id Pelanggan</b></label>
                      <input name="kode" class="form-control" value="<?php echo $data['id_pelanggan']; ?>" type="text"  readonly>

                      <label class="control-label" ><b>Username</b></label>
                      <input name="username" class="form-control" value="<?php echo $data['username']; ?>" type="text"  readonly>

                      <label class="control-label" ><b>Nama</b></label>
                      <input name="nama" class="form-control" value="<?php echo $data['nama']; ?>" type="text"  required>

                      <label class="control-label" ><b>Alamat</b></label>
                      <textarea name="alamat" class="form-control" type="text" required><?php echo $data['alamat']; ?></textarea> 

                      <label class="control-label" ><b>Nomer Telpon</b></label>
                      <input name="no_telpon" class="form-control" value="<?php echo $data['no_telpon']; ?>" type="tel" maxlength="15" onKeyUp="return checkInput(this);" required>

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

            </div> <!-- /span3 -->

                   
    
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
        <form class="form" method="post" action="index.php?modul=aksi_ubahpswd">
          <div class="form-group">
            <label class="control-label" ><b>Id Pelanggan</b></label>
            <input id="idUser" name="id_pelanggan" class="form-control" value="<?php echo $data['id_pelanggan']; ?>" type="text" readonly>
            <label class="control-label" ><b>Password Baru</b></label>
            <input  name="password" class="form-control" value="" type="password" >
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