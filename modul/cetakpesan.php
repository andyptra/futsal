

<html><head>
 <?php
 include"../db/config.php";



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
</head>
<style>
.outer{
	border-width: 3px;
  border-style: solid;
  border-color: #666666;
	padding:10px;
  width: 500px;
}
tr{
	border:none !important;
}
td{
  border: none !important;
}
</style>
<body>
<?php
session_start();
$d=$_GET[id];
 $zz=mysql_fetch_array(mysql_query("SELECT * FROM pemesanan WHERE username='$_SESSION[usernamepengunjung]' AND id_pemesanan='$d'"))?>

<table width="500" border="3" align="center">
<table width="100%">
  <tbody>
    <tr>
      <td  colspan="4" align="center">
       <?php echo "$namaprofil";?></td>
    </tr>
    <tr>
      <td colspan="4" align="center"><?php echo "$alamatprofil";?></td>
    </tr>
    <tr>
      <td colspan="4" align="center">No telp :<?php echo "$no_telponprofil";?>, Fax : <?php echo "$faxprofil";?><hr></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="12">&nbsp;</td>
      <td width="185">&nbsp;</td>
      <td width="165">&nbsp;</td>
    </tr>
    <tr>
      <td>Username </td>
      <td>:</td>
      <td colspan="2"><?php echo $zz[username]?></td>
    </tr>
    <tr>
      <td>Nama Klub</td>
      <td>:</td>
      <td colspan="2"><?php echo $zz[nama_klub]?></td>
    </tr>
    <tr>
      <td>Tanggal Main</td>
      <td>:</td>
      <td colspan="2"><?php echo DateToIndo($zz[tanggal]);?></td>
    </tr>
    <tr>
      <td>Jam Main</td>
      <td>:</td>
      <td colspan="2"><?php echo $zz[jam]?></td>
    </tr>
    <tr>
      <td width="136">Harga</td>
      <td>:</td>
      <td colspan="2"><?php echo $zz[harga]?></td>
    </tr>
    <tr>
      <td>No Telepon</td>
      <td>:</td>
      <td colspan="2"><?php echo $zz[no_telpon]?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p>Harap melakukan pembayaran setengah jam sebelum main, jika tidak di anggap batal, dan apabila telat pembayaran atau batal memesan harap hubungi kami</p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><?php echo "$namaprofil";?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="136">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Admin</td>
    </tr>
  </tbody>
</table>
</table>
</body>
</html>
<?php  
$filename="kwitansi.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya  
//==========================================================================================================  
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF  
//==========================================================================================================  
$content = ob_get_clean();  
  
 require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');  
 try  
 {  
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(30, 20, 20, 0));  
  $html2pdf->setDefaultFont('Arial');  
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));  
  $html2pdf->Output($filename);  
 }  
 catch(HTML2PDF_exception $e) { echo $e; }  
?> 

<?php
ob_start();
    include( "test.php" );
    $content = ob_get_clean();
   require_once( __DIR__ . "/html2pdf/html2pdf.class.php");
    try
    {
        $html2pdf = new HTML2PDF("P", "A4", "fr");
        //$html2pdf->setModeDebug();
        $html2pdf->setDefaultFont("Arial");
        $html2pdf->writeHTML($content);
        $html2pdf->Output("votre_pdf.pdf");
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }