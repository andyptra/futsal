<?php 

defined("VALIDASI") or die("Tidak Diperkenankan Mengakses Data Secara Langsung !");



	?>
 <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
 <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css">

<script type="text/javascript" language="JavaScript">
$(document).ready(function() {
    $('#example').DataTable( {
        "search":false,
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
     
} );
function konfirmasi()
{
    tanya = confirm("Anda yakin akan menghapus data ?");
    if (tanya== true) return true;
    else return false; 
} </script>

<style type="text/css">
  .cdz{
    cursor: not-allowed;
  }
</style>


<?php
function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
    $BulanIndo = array("Januari", "Februari", "Maret",
               "April", "Mei", "Juni",
               "Juli", "Agustus", "September",
               "Oktober", "November", "Desember");
  
    $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
    $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
    $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
    
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
    return($result);
}

  ?>
<div class="main">
    
    <div class="main-inner">

        <div class="container">
    
          <div class="row">         
 
             <div class="span9">
                
                            <legend><b>Pemesanan</b></legend>

                            <form class="form-inline" action="" method="POST">

      <div class="form-group">
          
          <p>Tanggal:
    <input type="text" id="datepicker" placeholder="Klik Disini  !!!" name="tgl" />
</p>
      <input type="submit" class="btn btn-sm btn-primary" name="golek" value="cari">
  </div>
    </form>
  
  

   

    Pemesanan pada tanggal <?php if(empty($_POST[tgl])){

       echo(DateToIndo( date("Y-m-d")));
      }else{
       echo(DateToIndo("$_POST[tgl]"));
        }?>
    <div class="table-responsive">

  <table class="table table-striped">
                              
                              <thead>
                              <tr>
                              <th>Jam</th>
                              <th>Harga</th>
                              <th>Status</th>
                              </thead>
                              <tbody>
                              <?php

      $tanggal= mysql_real_escape_string($_POST["tgl"]);
        $a=mysql_query("select jadwal.id_jadwal,jadwal.jam,jadwal.jams, harga.harga,harga.id_harga from jadwal,harga WHERE jadwal.id_harga=harga.id_harga order by jadwal.id_jadwal asc");
     
      
      while($b=mysql_fetch_array($a)){
       $querys="select pemesanan.id_jadwal,pemesanan.status,pemesanan.tanggal,pemesanan.jam,jadwal.id_jadwal,jadwal.jams from pemesanan,jadwal WHERE tanggal='$tanggal' AND pemesanan.id_jadwal=jadwal.id_jadwal AND pemesanan.id_jadwal='$b[id_jadwal]'";

      $result=mysql_query($querys);
      $z=mysql_fetch_array($result);
      
        ?>
                         <tr>
          
          <td><?php echo $b['jams'] ?></td>
          <td ><?php echo $b['harga'] ?></td>
          <td><?php
           if($z[status]==Tertunda){?>

           <form action="index.php?modul=proses" method="POST" style="    margin: 0 0 -10px;">
       <input type="hidden" name="username" value="<?php echo $_SESSION['namakamu'];?>">
     <input type="hidden" name="idku" value="<?php echo   $_SESSION['id_admin'];?>">
   <input type="hidden" name="idharga" value="<?php echo $b[id_harga];?>">
      <input type="hidden" name="id" value="<?php echo $b[id_jadwal];?>">
      <input type="hidden" name="tanggalz" value="<?php echo $tanggal;?>">
      <input type="hidden" name="harga" value="<?php echo $b[harga];?>">
      <input type="hidden" name="jamz" value="<?php echo $b[jams];?>">
      <input type="submit" value="pesan" class="btn btn-warning">
      </form>

           <?php

      }elseif($z[tanggal]==$tanggal AND $b[id_jadwal]==$z[id_jadwal]){
echo "<button type='button' class='btn btn-danger cdz'>Bookeed</button>";
      }
      else{
      ?>
      <form action="index.php?modul=proses" method="POST" style="    margin: 0 0 -10px;">
       <input type="hidden" name="username" value="<?php echo $_SESSION['namakamu'];?>">
	   <input type="hidden" name="idku" value="<?php echo   $_SESSION['id_admin'];?>">
	 <input type="hidden" name="idharga" value="<?php echo $b[id_harga];?>">
      <input type="hidden" name="id" value="<?php echo $b[id_jadwal];?>">
      <input type="hidden" name="tanggalz" value="<?php echo $tanggal;?>">
      <input type="hidden" name="harga" value="<?php echo $b[harga];?>">
      <input type="hidden" name="jamz" value="<?php echo $b[jams];?>">
      <input type="submit" value="pesan" class="btn btn-primary" rel="popover" id='el3' data-content="jika tombol berwarna kuning berarti sudah ada yang memesan tetapi belum di konfirmasi admin, anda masih bisa memesan jam ini " title="info">
      </form>
      <?php
      }?></td>
        </tr>
                              <?php } ?>

                              </tbody>
                              </table>
                              </div>
            </div><!--/span9-->

                     
        </div><!--/row-->

    </div> <!--/container-->
                
</div> <!-- /main-inner -->

</div> <!--/ main-->



<script>
$(document).ready(function () {
    var date = new Date();
    var currentMonth = date.getMonth();
    var currentDate = date.getDate();
    var currentYear = date.getFullYear();

    $('#datepicker').datepicker({
        minDate: new Date(currentYear, currentMonth, currentDate),
        dateFormat: 'yy-mm-dd'
    });
});
</script>
<script language="javascript">
        $(function ()
        { $("#example").popover();
            $("#el3").popover();
        });
        function showPopup() {
            $('#el3').popover('show')
        }
        function hidePopup() {
            $('#el3').popover('hide')
        }
</script>