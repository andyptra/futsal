<?php

include "pdf/class.ezpdf.php"; //class ezpdf yg di panggil
include"../../db/config.php";//koneksi database
date_default_timezone_set('Asia/Jakarta');

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


$pdf = new Cezpdf();

//Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('pdf/fonts/Courier.afm');


//Teks di tengah atas untuk judul header

$pdf->ezText("<b>Laporan Pemesanan dan Keuangan $namaprofil </b>", 16, array("justification" => "center","spacing" =>"0"));
$pdf->ezText("<b>$alamatprofil </b>", 14, array("justification" => "center","spacing" =>"1.5"));
$pdf->ezText("<b> No Telpon : $no_telponprofil </b>", 13, array("justification" => "center","spacing" =>"1.5"));
$pdf->ezText("", 14, array("justification" => "center","spacing" =>"1.5"));

//Garis atas untuk header
$pdf->line(31, 770, 565, 770);

//Garis bawah untuk footer
$pdf->line(31, 50, 800, 50);

//Teks kiri bawah
$pdf->addText(640,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

// Baca input tanggal yang dikirimkan user

$tgl_awal=$_POST['tgl1'];
$tgl_akhir=$_POST['tgl2'];

$mulai=DateToIndo($tgl_awal);
$akhir=DateToIndo($tgl_akhir);
//echo "$mulai $selesai";exit;




$tampil = "SELECT * FROM pemesanan
WHERE status='Lunas' AND tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' order by tanggal ASC";
//echo $tampil;exit;
$sql = mysql_query($tampil);




$i = 1;
while($r = mysql_fetch_array($sql)) {
$dd=mysql_query("SELECT * from pelanggan where username='$r[username]'")or die(mysql_error());
          $z=mysql_fetch_array($dd);
          $tglz=DateToIndo($r[tanggal]);
//Format Menampilkan data di ezPdf
  $data[$i]=array('No'=>$i,
             'Username'=>"$r[username]",
           'Nama Lengkap'=>"$z[nama]",
           'Nama Klub'=>"$r[nama_klub]",
           'Tanggal Main'=>"$tglz",
           'Jam Main'=>"$r[jam]",
           'No Telepon'=>"$r[no_telpon]",
           'Alamat'=>"$r[alamat]",
           'Harga'=>'Rp. '.number_format(($r[harga]),0,',','.')
           );
  $i++;
$jumlah+=$r['harga']; 
}
$x='Rp. '.number_format(($jumlah),0,',','.');
$rata2=$jumlah / mysql_num_rows($sql);
$ratas= 'Rp. '.number_format(($rata2),0,',','.');        
//Tampilkan Dalam Bentuk Table
$pdf->ezTable($data);
$pdf->ezText("jumlah $x ", 14, array("justification" => "right","spacing" =>"2"));
$pdf->ezText("", 14, array("justification" => "right","spacing" =>"2"));

$pdf->ezText("\nPeriode: $mulai s/d $akhir",12);

// Penomoran halaman
$pdf->ezStartPageNumbers(57, 20, 8);
$pdf->ezStream();



?>