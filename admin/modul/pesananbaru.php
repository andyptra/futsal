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

function konfirmasiz()
{
    tanya = confirm("Dengan klik ini bahwa pelanggan bersangkutan benar benar memesan lapangan futsal");
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
                <div class="alert alert-danger">
  <strong><b>Info!</b></strong> <br/>

                    HARAP KONFIRMASI PEMESANAN LAPANGAN KEPADA PELANGGAN YANG BERSANGKUTAN DENGAN MELALU SMS ATAU TELEPON KEPADA PIHAK YANG MEMESAN LAPANGAN FUTSAL
                    </div>
                            <legend><b>Daftar Pemesanan Baru</b></legend>
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
                              
                          
                              <th width="197px" style="width: 223px">AKSI</th></tr>
                              </thead>
                              <tbody>
                              <?php 
                              

            session_start();
                  $sql=mysql_query("SELECT * FROM pemesanan WHERE STATUS='Tertunda' order by tanggal DESC ");
                                     
                    

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
                              	
                              <span class="btn btn-success btn-sm"><?php echo $cc['status']; ?></span>
                          

                              </td> <td>
                            <a href="index.php?modul=updatepesan&id=<?php echo $cc['id_pemesanan']; ?>" onclick="return konfirmasiz()" class="btn btn-warning btn-sm" >Konfirmasi</a>
                            <a href="index.php?modul=hapuspesan&id=<?php echo $cc['id_pemesanan']; ?>" onclick="return konfirmasi()" class="btn btn-danger btn-sm" >Hapus </a>
                              </td></tr>
                              <?php } ?>

                              </tbody>
                              </table>
            </div><!--/span9-->
    
        </div><!--/row-->

    </div> <!--/container-->
                
</div> <!-- /main-inner -->

</div> <!--/ main-->


