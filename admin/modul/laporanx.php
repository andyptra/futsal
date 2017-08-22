<script type="text/javascript" language="JavaScript">
$(document).ready(function() {
    $('#pesan').DataTable( {
        "searching":false,
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
} 
</script>
    

<div class="main">
    
    <div class="main-inner">

        <div class="container">
    
          <div class="row">         
 
            

                     <div class="span10">
                
                            <legend><b>Daftar Pemesanan</b></legend>
                     <form class="form-inline" action="modul/cetaklap.php" method="POST">

      <div class="form-group">
         <label class="control-label" ><b>Tanggal Awal</b></label>
          <input type="text" class="input-large"  data-beatpicker="true" name="tgl1">
          <label class="control-label" ><b>Tanggal Akhir</b></label>
          <input type="text" class="input-large"  data-beatpicker="true" name="tgl2">
          <br/>
      <input type="submit" class="btn btn-sm btn-primary" value="cetak">
  </div>
    </form>
            </div><!--/span9-->
    
        </div><!--/row-->

    </div> <!--/container-->
                
</div> <!-- /main-inner -->

</div> <!--/ main-->

           