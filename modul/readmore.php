<div class="col-md-9">
  <div class="widget">
    <div class="widget-content">
      
    
      <div class="post">
      	<div class="entry">
      		<p><?php
            
      			$sql=mysql_query("select * from berita where id_berita='$_GET[id]'");
      			while($s=mysql_fetch_array($sql)){
      			?>
                     <h2><?php echo $s['judul']?></h2>
                     <p>Diposting pada tanggal&nbsp;<?php echo $s['tgl_berita']?> &nbsp;&nbsp;</a></p>
                    <div class="col-md-3">
                      <p align="justify"></p><?php 
                                  if ($s['foto']=="no picture") {
                                    echo '<img class="alignleft size-full wp-image-41 img-responsive" src="Gambar/Gambar_noimage/no_img.jpg" alt="" border="0"/>';
                                  }else{
                                    echo '<img class="alignleft size-full wp-image-41 img-responsive" src="Gambar/Gambar_berita/small_'.$s['foto'].'" alt="" border="0"/>';
                                          }
                                ?>
                                </div>
      			   <p align="justify"></a><?php echo $s['isi']?></p>
            	</p>
      						<?php	
      						}
      				?></p>
      	</div>
      </div>
    </div>
  </div>
</div>
  <?php include 'modul/menu_kanan.php'; ?>

<hr />
<!-- <div class="span9">
  <div class="widget">
    <div class="widget-content">
      <div class="post">
      	<div class="entry">
          <h1>Info Lowongan Kerja</h1>
          <hr>
      		<p><?php
                    
      $sql=mysql_query("SELECT perusahaan.nama_perusahaan, lowongan_kerja.foto, lowongan_kerja.syarat, 
      lowongan_kerja.tgl_dibuka, lowongan_kerja.tgl_ditutup, lowongan_kerja.id_lowongan FROM perusahaan, lowongan_kerja 
      WHERE perusahaan.id_perusahaan=lowongan_kerja.id_perusahaan order by id_lowongan desc limit 4");
                    while($s=mysql_fetch_array($sql)){
                    ?>
                      <div class="row row-content">
                        <h2><?php echo $s['nama_perusahaan']?></h2>
                        <p>Tanggal dibuka Lowongan&nbsp;<?php echo $s['tgl_dibuka']?> Tanggal ditutup &nbsp;<?php echo $s['tgl_ditutup']?> &nbsp;&nbsp;</a></p>

                        <div class="col-md-2">
                            <p align="justify"><img class="alignleft size-full wp-image-41" style="float: left; margin:0px 30px 0px 0px;" src="Gambar/Gambar_lowongan/<?php echo $s['foto'];?>" alt="" width="200" height="80" border="0"/>
                        </div>
                        <div class="col-md-10">
                           
                            <?php echo $syarat= substr($s['syarat'],0,300);$syarat = substr($s['syarat'],0,strrpos($syarat,""));?>
                            <span><a style="color: red;" href="?modul=readmore_loker&id=<?php echo $s['id_lowongan'] ?>"></br>readmore...</a></span>
                        </p>
                        </div>
                      </div>
                      <br><br>
                        
                        
                    <?php 
                       }
                    ?></p>
      	</div>
      </div>
    </div>
  </div>
</div> -->
