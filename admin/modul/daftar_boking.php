<script type="text/javascript" language="JavaScript">
$(document).ready(function() {
    $('#pesan').DataTable( {
        
    } );
     
} );

function konfirmasi()
{
    tanya = confirm("Anda yakin akan menghapus data ?");
    if (tanya== true) return true;
    else return false; 
} 
function konfirmasix()
{
    tanya = confirm("Dengan klik ini bahwa pelanggan bersangkutan sudah membayar lunas ?");
    if (tanya== true) return true;
    else return false; 
} 
</script>
    

<div class="main">
    
    <div class="main-inner">

        <div class="container">
    
          <div class="row">         
 
            

                     <div class="span11">
                
                            <legend><b>Daftar Pemesanan</b></legend>
                              <table id="pesan" class="display">
                              <thead>
                              <tr>
                              <th>No.</th> 
                              <th>Username</th>
                              <th>Nama Klub</th> 
                              <th>Tanggal main</th>
                              <th>Jam Main</th>
                              <th>No Telpon</th>
                              <th>Status</th>
                              <th>DP</th>
                              <th>Sisa</th>
                          
                              <th width="197px" style="width: 223px">AKSI</th></tr>
                              </thead>
                              <tbody>
                              <?php 
                              

            session_start();
                  $sql=mysql_query("SELECT * FROM pemesanan order by tanggal DESC");
                                     
                    

                              while($cc=mysql_fetch_array($sql)){
                                $no++;
                               ?>
                            <tr>
                              <td align="center"><?php echo $no;  ?></td>
                              <td align="center"><?php echo $cc['username']; ?></td>
                              <td align="center"><?php echo $cc['nama_klub']; ?></td>
                              <td align="center"><?php echo $cc['tanggal']; ?></td>
                              <td align="center"><?php echo $cc['jam']; ?></td>
                              <td align="center"><?php echo $cc['no_telpon']; ?></td>
                              <td align="center">
                              	<?php
                              if(($cc[status]==Pending)){?>
                              <span class="btn btn-warning btn-sm"><?php echo $cc['status']; ?></span>
                              <?php
                              }elseif(($cc[status]==Lunas)){
                              	?>
                              <span class="btn btn-success btn-sm"><?php echo $cc['status']; ?></span>
                              <?php
                              }
                              ?>

                              </td>
                              <td><?php if(!empty($cc[dp])){
                                echo $cc[dp];
                                }
                                else{
                                  echo "<span class='btn btn-success btn-sm'>-</span>";
                                  }?></td>
                              <td><?php if(!empty($cc[sisa])){
                                echo $cc[sisa];
                                }
                                else{
                                  echo "<span class='btn btn-success btn-sm'>-</span>";
                                  }?></td>



                            
                              
                              
                           


                              <td>
                              <?php
                              if(($cc[status]==Pending)){?>
                              <a href="#notifbayar" id="<?php echo $cc['id_pemesanan'] ?>" class="ubah btn btn-success btn-sm" data-toggle="modal">Bayar Pelunasan</a>
                               
                              <?php
                              }elseif(($cc[status]==Lunas)){
                                ?>
                              <span class="btn btn-success btn-sm">-</span>
                              <?php
                              }
                              ?>
                              <!--<a href="modul/cetakpesan.php" class="btn btn-info btn-sm" >cetak Bukti</a>-->
                              <?php
                              if(($cc[status]==Pending)){?>
                              	  <a href="index.php?modul=hapus_pemesanan&id=<?php echo $cc['id_pemesanan']; ?>" onclick="return konfirmasi()" class="btn btn-danger btn-sm" >Hapus</a>
                              	<?php
                              }elseif(($cc[status]==Lunas)){
                              	?>
                              	<span></span>
                              <?php
                              }
                              ?>
                            
                              </td></tr>
                              <?php } ?>

                              </tbody>
                              </table>
            </div><!--/span9-->
    
        </div><!--/row-->

    </div> <!--/container-->
                
</div> <!-- /main-inner -->

</div> <!--/ main-->

           <div class="modal fade" id="notifbayar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Bayar Pelunasan</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input id="simpan-k" type="button" class="btn btn-warning" value="bayar" name="update_password"></input>
      
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

(function($) {

  $(document).ready(function(e) {
    
    // deklarasikan variabel
    var kd_k = 0;

    $(document).on("click", ".ubah", function () {
      var url = "modul/formbayar.php";
      // ambil nilai id dari tombol ubah
      kd_k = this.id;
       $.post(url, {id: kd_k} ,function(data) {
        // tampilkan k.form.php ke dalam <div class="modal-body"></div>
        $(".modal-body").html(data).show();
        
      });
    });
    
    $("#simpan-k").bind("click", function(event) {
      
      var url = "index.php?modul=updatestatus";

      // mengambil nilai dari inputbox, textbox dan select
      var v_dp    = $('input:text[name=dp]').val();
      var v_sisa    = $('input:text[name=sisa]').val();
  
      // mengirimkan data ke berkas transaksi.proses.php untuk di proses
      
      $.post(url, {dp: v_dp,sisa:v_sisa, id: kd_k} ,function() {
        window.location.href = "index.php?modul=daftar_boking";

      
      
      });
    });

  

  });
}) (jQuery);

    </script>