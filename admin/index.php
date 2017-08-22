<?php 
session_start();

require_once 'cekstatus.php';
include("../db/config.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Administrator <?php echo "$namaprofil";?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<link href="datepicker/datepicker3.css" rel="stylesheet">
<script type="text/javascript" src="datepicker/bootstrap-datepicker.js"></script>
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>






<!-- chart laporan -->
<script type="text/javascript" src="../js/loader.js"></script>
<script type="text/javascript" src="plug/BeatPicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="plug/BeatPicker.min.css">
<!-- 
chart laporan
  <script src="../js/jquery.min.js"></script>
  <script src="../js/raphael-min.js"></script>
  <script src="../js/morris.js"></script>
  <script src="../js/prettify.min.js"></script>
  <script src="../js/example.js"></script>
  <link rel="stylesheet" href="../css/example.css">
  <link rel="stylesheet" href="../css/prettify.min.css">
  <link rel="stylesheet" href="../css/morris.css"> -->
  
<!-- data table -->
    <link rel="stylesheet" href="media/css/jquery.dataTables.css" type="text/css" />
    <script src="media/js/jquery.js"></script>
    <script src="media/js/jquery.dataTables.js"></script>
<!-- end -->

</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"><span
      class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">Administrator <?php echo "$namaprofil";?></a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
            class="icon-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="index.php"><i class="icon-home"></i><span>Home</span> </a></li>
        <li class="active"><a href="index.php?modul=pesananbaru"><i class="icon-envelope"></i><span>Pesanan Terbaru</span> </a></li>
        <li class="active"><a href="index.php?modul=pengunjung"><i class="icon-user"></i><span>Data Pelanggan</span> </a> </li>
         <li class="active"><a href="index.php?modul=boking"><i class="icon-list"></i><span>Pemesanan</span> </a> </li>
        <li class="active"><a href="index.php?modul=daftar_boking"><i class="icon-list"></i><span>Daftar Pemesanan</span> </a> </li>
        <li class="active"><a href="index.php?modul=admin"><i class="icon-book"></i><span>Data Admin</span> </a> </li>

        <li class="active"><a href="index.php?modul=profil"><i class="icon-user"></i><span>Profil</span> </a> </li>
        <li class="dropdown active">         
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
            <i class="icon-print"></i>
            <span>Laporan</span>
            <b class="caret"></b>
          </a>  
          <ul class="dropdown-menu">
              <li><a href="index.php?modul=laporanx"><b>Laporan Pemesanan Dan Keuangan</b></a></li>
          </ul>           
        </li>
              
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="widget">
      <?php
if(!empty($_GET['modul']))
{
  if(file_exists("modul/$_GET[modul].php"))
  { 
  include("modul/$_GET[modul].php");
  } else 
  {
  echo "<h2>Error !<br/>Halaman Tidak Di Temukan !</h2>";
  }
} else 
{ 
?>
      <div class="main">
        <div class="main-inner">
          <div class="container">
            <div class="row">
              <div class="span12">
                <div id ="target-1" class="widget">
                  <div class="widget-header"> <i class="icon-list-alt"></i>
                    <h3> Hi Administrator..... !!</h3>
                  </div>
            <!-- /widget-header -->
                      <div class="widget-content">
                        <div class="widget big-stats-container">
                            <p>Selamat Datang di <b>Aplikasi Reservasi Lapangan Futsal <?php echo "$namaprofil";?></b> !<br />
                          <div class="right"> <img src="img/logo.jpg" alt="centerleft" width="150px" height="100px" /></div>
                        </div>
                            Alamat : <?php echo "$alamatprofil";?>, Kode Pos : <?php echo "$kodeposprofil";?> Telepon: <?php echo "$no_telponprofil";?>, Fax : <?php echo "$faxprofil";?></p>

                  </div>

            </div>

        </div>
        <?php } ?>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<br />
<br />
<br />
<br />
<br />
<br />
<!-- /extra -->
<footer class="application-footer">
            <div class="container">
                <p><b>Aplikasi Reservasi Lapangan Futsal</b></p>
                <div class="disclaimer">
                    <p>All right reserved.</p>
                    <p>Copyright ©<?php echo "$namaprofil";?></p>
                </div>
            </div>
        </footer>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script src="ckeditor/ckeditor.js"</script>
<script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script> 
<!-- <script src="js/bootstrap.js"></script> -->
<script src="../js/bootstrap.min.js" ></script>
<script type="text/javascript">
    $(function() {
        $('#modal-delete').on('show.bs.modal', function (event) {
            $('#modal_delete_url', this).attr('href', $(event.relatedTarget).attr('href'))
        })
    })
</script>
<script type="text/javascript">
   $(document).ready(function(){
      
  
   //jika ada perubahan di kode barang
                    $("#username").change(function(){
                        kode=$("#username").val();
                        
                       
                        
                        //lakukan pengiriman data
                        $.ajax({
                            url:"modul/proc_auto.php",
                            data:"kode="+kode,
                            cache:false,
                            success:function(msg){
                                data=msg.split("|");
                                
                                //masukan isi data ke masing - masing field
								$("#iduser").val(data[0]);
                                $("#nama").val(data[1]);
                                 $("#email").val(data[2]);
                                $("#nama_klub").val(data[3]);
                                $("#alamat").val(data[4]);
                                $("#no_telpon").val(data[5]);
                                
                                
                                
                                
                            }
                        });
                    });
      
      
  });
    
      

    

  
  </script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $('#datatables').DataTable({
        "scrollX": true,
                         "oLanguage": {
                              "sLengthMenu": "Tampilkan _MENU_ data per halaman",
                              "sSearch": "Pencarian: ", 
                              "sZeroRecords": "Maaf, tidak ada data yang ditemukan",
                              "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                              "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
                              "sInfoFiltered": "(di filter dari _MAX_ total data)",

                            }

    } );
} );
</script>



</body>
</html>
