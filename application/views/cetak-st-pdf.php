 <style type="text/css"> 
 	@page{margin-top: 50px;}  
    td[rowspan] {
	  vertical-align: top;
	  text-align: left;
	}

	td {
	  vertical-align: top;
	  text-align: left;
	}
    /*inti layout*/
    .page {		
        width: 100%;
        min-height: 33cm;
        padding-top:20px;
        
        
    }

    /*content dalam layout*/
    .subpage {
        font-family:"Times New Roman", Times, serif;
        /*height: 237mm;*/
        min-height: 29.56cm; /* height page di kurangi 6 , knpa kalo 4 cm kalo diprint lebih*/ 
        /*background :red;*/
    }
	table td {
		padding-top :2px;
		padding-bottom :2px;
	}
	.row-line td {
		  border-top: 1px solid black;
	}
	.row-line-bottom td {
		  border-bottom: 1px solid black;
	}
		
		.row-line caption + thead tr:first-child td,
		.row-line colgroup + thead tr:first-child td,
		.row-line thead:first-child tr:first-child td {
		  border-top: 0;
	}
    
    @page {
        margin: 0;
    
    }

  </style>
<?php
  $kode_skpd = $this->session->userdata('kode_skpd');/*$_SESSION['kode_skpd'];*/
	$sql1=mysql_query("select * from tbl_skpd where kode_skpd='$kode_skpd'");
	//$nama_skpd="";
	while ($row=mysql_fetch_array($sql1)) {
		$nama_skpd = $row['nama_skpd'];
        $alamat_skpd = $row['alamat_skpd'];
        $telepon_skpd = $row['telepon_skpd'];
        $email_skpd = $row['email_skpd'];
        $website_skpd = $row['website_skpd'];
	} 
 ?>
<div class="book" id="PrintElem">

<div class="page" style="font-size:14px;padding-bottom:0px;">
        <div class="subpage">

<table style="margin-right:20px;" width="100%" border="0" rules="none" style="border-collapse:collapse">
  <tr>
    <td width="10">&nbsp;</td>
    <td width="11">
    	<img id="" align="center" style="padding-top:0px;padding-left:20px" src="<?php echo base_url(); ?>assets/img/Logo-Pemkab-Malang-header.png" width="77" height="90" />    </td>
    <td colspan="4" align="center">
    	
          	<?php 
				$kd_skpd = $this->session->userdata('kode_skpd');
				//echo $kd_skpd;
				$filter = explode(".", $kd_skpd);
				//echo $filter;
				$filter = $filter[1]; // piece1
				//echo $filter;
				//$query="";
				if ($filter > 000 && $filter < 100) {
				
			?> 
            <span  style="font-size:22px;">PEMERINTAH KABUPATEN MALANG</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
            <strong style="font-size:32px;">S E K R E T A R I A T &nbsp; D A E R A H </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/> 
            <span style="font-size:14px; padding:0px; margin-top:-10px;">Jalan Merdeka Timur No. 3 Malang Telepon ( 0341 ) 326791 - 326793 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/> 
              <em >Website:http:// www.malangkab.go.id  Email: sekda@malangkab.go.id</em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php } else{ ?>
              <?php
                    $nama_skpd1 = strtoupper($nama_skpd);
					$length = strlen($nama_skpd1);
					if($length>22){
						echo ('<span  style="font-size:22px;">PEMERINTAH KABUPATEN MALANG</span><br/><strong style="font-size:32px;">');
						echo($nama_skpd1.'');
						echo ('
							</strong><br/> 
              <span style="font-size:14px; padding:0px; margin-top:-10px;">'.$alamat_skpd.' Telepon <?php echo $telepon_skpd?></span><br/> 
              <em >Website :'.$website_skpd.'  Email: '.$email_skpd.'</em>
			  
			  <br/>
            <strong style="font-size:18px;"><u>M A L A N G   65119 </u></span></strong>
						');
					}else{
						$char = str_split($nama_skpd1);
						echo ('<span  style="font-size:22px;">PEMERINTAH KABUPATEN MALANG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br/><strong style="font-size:32px;">');	
						foreach($char as $key=>$value){
							echo ($value."&nbsp;");
						}
						echo ('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><br/>');
						echo (' 
              <span style="font-size:14px; padding:0px; margin-top:-10px;">'.$alamat_skpd.' Telepon <?php echo $telepon_skpd?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br/> 
              <em >Website :'.$website_skpd.'  Email: '.$email_skpd.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em>
			  
			  <br/>
            <strong style="font-size:18px;"><u>M A L A N G   65119</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></strong>
						');
					}	
				?>          
	<?php } ?>    </td>
    </tr>
</table>      
     <table  height="810" border="0" id="table-isi" width="100%" rules="none" style="font-size:18px;margin-right:40px;">

  		   <tr>
             <td height="39" colspan="13">&nbsp;</td>
           </tr>
           <tr>
             <td width="17">&nbsp;&nbsp;&nbsp;</td>
             <td colspan="12"><div align="center"><u><strong>SURAT TUGAS</strong></u></div></td>
             </tr>
           <tr>
             <td>&nbsp;</td>
             <td colspan="12"><div align="center">Nomor : <?php echo $no_surat?></div></td>
             </tr>
           
      
           <tr>
             <td colspan="13" >&nbsp;</td>
           </tr>

           
           
           <?php  if($dasar==""){
		   	echo('<tr>
			<td align="right" style="height:20px;">&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="11">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$pembuka_surat.' ,dengan ini:</td>
           </tr>');
		   }else{
		   	echo('<tr>
			<td align="right" style="height:20px;">&nbsp;</td>
           <td align="right" style="height:20px;">&nbsp;</td>
             <td align="right" style="height:20px;"><div align="left">Dasar</div></td>
             <td><div align="center">:</div></td>
             <td colspan="9" rowspan="2" align="right"><div align="left">'.$dasar.' ,dengan ini:</div></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td><div align="center"></div></td>
            </tr>');
		   }
		   ?>
           <tr>
             <td colspan="2" align="right" style="height:20px;">&nbsp;</td>
             <td colspan="11" rowspan="2" align="right" style="height:20px;"><div align="left"></div>
             <div align="center"></div>               <div align="center">MENUGASKAN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>
             </tr>
           <tr>
             <td width="27">&nbsp;</td>
             <td width="26">&nbsp;</td>
             </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td width="66">Kepada </td>
             <td width="24"><div align="center">:</div></td>
             <td colspan="9"><strong><?php echo $nama ?>.</strong></td>
             </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="9">NIP. 
                <?php 
                  if($nip!=""){
                    echo $nip;
                  }else{
                    echo"-";
                  }
                ?>                </td>
             </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="9">
                <?php
                  if($nip!=""){ 
                    echo $pangkat .' ('. $gol.'/'.$ruang.')<br/>'.
                      $jabatan.' '.$nama_skpd;
                } 
              ?></td>
             </tr>
           <tr>
             <td align="right" style="height:20px;">&nbsp;</td>
             <td align="right" style="height:20px;">&nbsp;</td>
             <td rowspan="2" align="right" style="height:20px;"><div align="left"><span style="vertical-align: top;">Untuk</span></div></td>
             <td><div align="center">:</div></td>
             <td colspan="9" rowspan="3" align="right"><div align="left"><?php echo($maksud); ?></div></td>
             </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td><div align="center"></div></td>
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
             <td>&nbsp;</td>
             <td width="96">&nbsp;</td>
             <td width="18">&nbsp;</td>
             <td width="100">&nbsp;</td>
             <td width="24">&nbsp;</td>
             <td width="">&nbsp;</td>
             <td width="">&nbsp;</td>
             <td width="">&nbsp;</td>
             </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="11">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sesuai prosedur, setelah  melaksanakan kegiatan dimaksud agar melaporkan hasilnya kepada Bapak Bupati  Malang.</td>
             </tr>
           <tr>
             <td height="24">&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="11"><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian untuk dilaksanakan  dengan penuh tanggung jawab.</div></td>
             </tr>
           
           <tr>
             <td >&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="2">Di keluarkan di</td>
             <td><div align="center">:</div></td>
             <td colspan="5">Malang</td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="2">Pada tanggal</td>
             <td><div align="center">:</div></td>
             <td colspan="5"><span id="tgl_surat_title2"><?php echo $tgl_surat; ?></span></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="7"><div align="center"><strong>
             <?php   	
				if($kd_skpd>="421.011" && $kd_skpd<="421.060"){
				//echo $jabatan_pejabat.$kd_skpd;
					if(stristr($jabatan_pejabat,'Sekretaris')){
						echo('a.n. Bupati');		
					}else if(stristr($jabatan_pejabat,'Asisten')){
						echo('a.n. SEKRETARIS DAERAH');
					}else if(stristr($jabatan_pejabat = $jabatan_pejabat.' '.$this->session->userdata('nama_skpd'),'Kepala Bagian Tata Pemerintahan') or stristr($jabatan_pejabat,'Kepala Bagian Hukum ')or stristr($jabatan_pejabat,'Kepala Bagian Pertanahan')){
						echo('a.n. Asisten Pemerintahan');
					}else if(stristr($jabatan_pejabat,'Kepala Bagian Perekonomian') or stristr($jabatan_pejabat,'Kepala Bagian Administrasi Pembangunan ')or stristr($jabatan_pejabat,'Kepala Bagian Kerjasama ') or stristr($jabatan_pejabat,'Kepala Bagian Pengelola Data Elektronik')){
						echo('a.n. Asisten Perekonomian dan Pembangunan');
					}else if(stristr($jabatan_pejabat,'Kepala Bagian Umum dan Protokol') or stristr($jabatan_pejabat,'Kepala Bagian Tata Usaha ')or stristr($jabatan_pejabat,'Kepala Hubungan Masyarakat') or stristr($jabatan_pejabat,'Kepala Bagian Organisasi')){
						echo('a.n. Asisten Administrasi');
					}else if(stristr($jabatan_pejabat,'Kepala Bagian Kesejahteraan Rakyat') or stristr($jabatan_pejabat,'Kepala Bagian Bina Mental dan Kerohanian')){
						echo('a.n. Kesejahteraan Rakyat');
					}
				}else{
					//echo $jabatan_pejabat;
					$jabatan_pejabat = $jabatan_pejabat.' '.$this->session->userdata('nama_skpd');
					if(stristr($jabatan_pejabat,'Kepala')){
						echo('a.n. Bupati');		
					}
				}
			
		?>
             </strong></div></td>
          </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="7"><div align="center"><strong>
			 	<?php
					echo $jabatan_pejabat;
					/*if($kd_skpd>="421.011" && $kd_skpd<="421.042"){
						//jika jabatan pejabat asisten cetak tanpa nama skpd soalnya gk ada skpd
						if (stristr($jabatan_pejabat,'Asisten')){
							echo $jabatan_pejabat;
						}else{
							echo $jabatan_pejabat.' '.$this->session->userdata('nama_skpd');
						}
					}*/
					 
				?>
             </strong></div></td>
          </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="7">&nbsp;</td>
          </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="7">&nbsp;</td>
          </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="7">&nbsp;</td>
          </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="7">&nbsp;</td>
          </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="7"><div align="center"><strong><?php echo $nama_pejabat; ?></strong></div></td>
          </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="7"><div align="center"><strong><?php echo $pangkat_pejabat; ?></strong></div></td>
          </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="7"><div align="center"><strong>NIP. <?php echo $nip_pejabat; ?></strong></div></td>
          </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td><div align="center"></div></td>
             </tr>
    </table>

    </div>    
    </div>
    
    </div>

