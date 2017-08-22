<?php 
session_start();
//require_once 'cekstatus.php';
include("db/config.php");
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Aplikasi Reservasi Lapangan Futsal </title>
<!-- CK EDITOR -->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<link href="ckeditor/content.css" rel="stylesheet" type="text/css"/>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<!-- CK EDITOR -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="plug/BeatPicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="plug/BeatPicker.min.css">
<!-- data table -->

    <link rel="stylesheet" href="media/css/jquery.dataTables.css" type="text/css" />

    <script src="media/js/jquery.dataTables.js"></script>

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

</head>
<body>

<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"><span
      class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">
      <?php if (empty($_SESSION['namapengunjung'])){
        echo "$namaprofil";
        }else{ 
        echo "Pemesanan Lapangan Futsal";
    }
    ?></a>
      
      <div class="nav-collapse">
      <?php if (empty($_SESSION['namapengunjung'])){
        echo "";
        }else{ ?>
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
            class="icon-user"></i> <?php echo $_SESSION['namapengunjung']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <?php } ?>
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
      <?php include('menu.php'); ?>
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

              <div class="col-md-9" >

                <div class="widget">
              
                   <div class="widget-content">
                
                      SELAMAT DATANG ^_^ <?php echo $_SESSION['namapengunjung']?>

                                </div> <!-- /widget-content -->
                           </div> <!-- /widget -->
                    </div> <!-- /span6 -->

                    <!-- menu kanan -->
                    <?php include 'modul/menu_kanan.php'; ?>

                          
        <?php } ?>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
</div>
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
<script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.js"></script>

</body>
</html>

