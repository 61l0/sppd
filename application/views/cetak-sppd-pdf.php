   
  <?php
function terbilang($angka) {
    $angka = (float)$angka;
    $bilangan = array(
            '',
            'Satu',
            'Dua',
            'Tiga',
            'Empat',
            'Lima',
            'Enam',
            'Tujuh',
            'Delapan',
            'Sembilan',
            'Sepuluh',
            'Sebelas'
    );
 
    if ($angka < 12) {
        return $bilangan[$angka];
    } else if ($angka < 20) {
        return $bilangan[$angka - 10] . ' Belas';
    } else if ($angka < 100) {
        $hasil_bagi = (int)($angka / 10);
        $hasil_mod = $angka % 10;
        return trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
    } else if ($angka < 200) {
        return sprintf('Seratus %s', terbilang($angka - 100));
    } else if ($angka < 1000) {
        $hasil_bagi = (int)($angka / 100);
        $hasil_mod = $angka % 100;
        return trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], terbilang($hasil_mod)));
    } else if ($angka < 2000) {
        return trim(sprintf('Seribu %s', terbilang($angka - 1000)));
    } else if ($angka < 1000000) {
        $hasil_bagi = (int)($angka / 1000); // karena hasilnya bisa ratusan jadi langsung digunakan rekursif
        $hasil_mod = $angka % 1000;
        return sprintf('%s Ribu %s', terbilang($hasil_bagi), terbilang($hasil_mod));
    } else if ($angka < 1000000000) {
 
        // hasil bagi bisa satuan, belasan, ratusan jadi langsung kita gunakan rekursif
        $hasil_bagi = (int)($angka / 1000000);
        $hasil_mod = $angka % 1000000;
        return trim(sprintf('%s Juta %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
    } else if ($angka < 1000000000000) {
        // bilangan 'milyaran'
        $hasil_bagi = (int)($angka / 1000000000);
        $hasil_mod = fmod($angka, 1000000000);
        return trim(sprintf('%s Milyar %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
    } else if ($angka < 1000000000000000) {                          
    // bilangan 'triliun'                           
         $hasil_bagi = $angka / 1000000000000;                           
         $hasil_mod = fmod($angka, 1000000000000);                           
         return trim(sprintf('%s Triliun %s', terbilang($hasil_bagi), terbilang($hasil_mod)));                       
    } else {         
    	return 'Wow...';                        
    }                   
    }
    ?>
  <style type="text/css">
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
		background:none;
    }

    /*content dalam layout*/
    .subpage {
        font-family:"Times New Roman", Times, serif;
       
    }
  table{
    border-spacing:0px;
  }
	table td {
		padding-top :2px;
		padding-bottom :2px;
	}
	.row-line td {
		  border-top: 1px solid black;
	}
	.row-line td {
		  border-top: 1px solid black;
	}
	.row-line-double td {
		  border-top: 4px solid black;
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
        margin: 20px;
    }
    
    @media print {
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
      }
    }

  	#kop img{
  		
  	}
	.style2 {font-weight: bold}
  </style>
<?php
 
 // $temp_no_surat = $no_surat;
 
 $kode_skpd = $this->session->userdata('kode_skpd');
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
   <div class="page" style="font-size:14px;padding:0px;margin-right: -12px;">
        <div class="subpage">

      
      <table width="100%" border="0" rules="none" style="border-collapse:collapse;margin-right:20px;">
  <tr>
    <td width="11">
    <img id="" align="center" style="padding-top:0px" src="<?php echo base_url(); ?>assets/img/Logo-Pemkab-Malang-header.png" width="77" height="90" />    </td>
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
              
			  <?php //} ?>
              
                       
	<?php } ?>    </td>
    </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td width="40">Nomor</td>
    <td width="">:&nbsp;<?php echo $no_surat; ?></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td >Lembar</td>
    <td>:&nbsp;</td>
  </tr>

      
 <tr>
  <td colspan="5">&nbsp;</td>
 </tr>     
 <tr>
        <td height="3" colspan="5"><div align="center" style="font-size:18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u><strong>SURAT PERINTAH PERJALANAN DINAS</strong></u><br/>
          <strong>&nbsp;&nbsp;&nbsp;<u>( S P P D )</u></strong><br/></div></td>
      </tr>
      <tr class="row-line-double">
             <td colspan="5" >&nbsp;</td>
             

</table>
      <table  height="383" border="0" id="table-isi" width="100%" rules="none" style="border-collapse:collapse;margin-right:20px;margin-top:-20px;">
           <tr class="hiden">
             <td width="14" rowspan="19" >&nbsp;</td>
             <td >&nbsp;</td>
             <td width="140">&nbsp;</td>
             <td width="1">&nbsp;</td>
             <td width="17">&nbsp;</td>
             <td>&nbsp;</td>
             <td colspan="8">&nbsp;</td>
           </tr>
           
           <tr class="row-line">
             <td width="11" >1.</td>
        <td colspan="3">Pejabat yang memberi perintah</td>
        <td width="11"><div align="center">:</div></td>
        <td colspan="8"><strong>
			<?php 
				if ($filter > 000 && $filter < 100) {
					if(stristr($jabatan_pejabat,'Kepala')){
						
						echo'Kepala '.$this->session->userdata('nama_skpd');
					}else{
						echo 'SEKRETARIS DAERAH';
					}
						
				}else{
					echo'Kepala '.$this->session->userdata('nama_skpd');
				} ?>
           </strong></td>
        </tr>
      <tr class="row-line">
        <td>2.</td>
        <td colspan="3">Nama / NIP pegawai  yang diperintah </td>
        <td><div align="center">:</div></td>
        <td colspan="8"><strong id="nama_title"><?php echo $nama ?></strong></td>
        </tr>
      <tr >
        <td>&nbsp;</td>
        <td colspan="3">mengadakan perjalanan Dinas</td>
        <td><div align="center"></div></td>
        <td colspan="8"><strong><?php if($NIP!=""){echo $NIP;}else{echo '-';}?></strong></td>
        </tr>
      <tr class="row-line">
        <td>3.</td>
        <td colspan="3">Jabatan, pangkat dan golongan dari </td>
        <td><div align="center">:</div></td>
        <td colspan="8"><?php echo($jabatan.' '.$nama_skpd); ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3">pegawai yang diperintah</td>
        <td>&nbsp;</td>
        <td colspan="8"><?php if($pangkat!=""){ echo($pangkat); ?> ( <?php echo($gol); ?> / <?php echo($ruang.' )');}else{echo '-';} ?></td>
      </tr>
      <tr class="row-line">
        <td>4.</td>
        <td colspan="3">Perjalanan Dinas yang diperintahkan</td>
        <td><div align="center">:</div></td>
        <td width="30">Dari </td>
        <td width="10"><div align="center">:</div></td>
        <td colspan="6"><?php echo($dari); ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3">&nbsp;</td>
        <td><div align="center"></div></td>
        <td>Ke</td>
        <td> <div align="center">:</div></td>
        <td colspan="6"><?php echo($ke); ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3">&nbsp;</td>
        <td><div align="center"></div></td>
        <td colspan="8">Transportasi menggunakan : <?php echo($transportasi); ?></td>
        </tr>
      
      <tr class="row-line">
        <td>5.</td>
        <td colspan="3">&nbsp;Perjalanan Dinas yang direncanakan</td>
        <td><div align="center">:</div></td>
        <td colspan="8">Selama (<?php echo($lama); ?>) hari</td>
      </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>
            <td><div align="center"></div></td>
            <td colspan="3" width="60">Dari tanggal</td>
            <td colspan="5">: <?php echo($tgl_berangkat); ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3">&nbsp;</td>
        <td><div align="center"></div></td>
        <td colspan="3">s/d tanggal</td>
        <td colspan="5">: <?php echo($tgl_kembali); ?></td>
      </tr>
      <tr class="row-line">
        <td align="right" style="height:20px;"><div align="left">6.</div></td>
        <td colspan="3" align="right" style="height:20px;"><div align="left">Maksud mengadakan perjalanan</div></td>
        <td><div align="center">:</div></td>
        <td colspan="8" rowspan="2" align="right"><div align="left"><?php echo($maksud); ?></div></td>
      </tr>
      
      
          <tr>
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>
            <td><div align="center"></div></td>
      </tr>
      <tr class="row-line">
        <td>7.</td>
        <td colspan="3">Perhitungan biaya perjalanan</td>
        <td><div align="center">:</div></td>
        <td colspan="4" width="40">Atas beban
          <div align="center"></div></td>
        <td colspan="4" >: <?php echo($atas_beban); ?></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3">&nbsp;</td>
        <td><div align="center"></div></td>
        <td colspan="4">Pasal anggaran
          <div align="center"></div></td>
        <td colspan="4">: <?php echo($pasal_anggaran); ?></td>
        </tr>     
      
      
      <tr class="row-line row-line-bottom">
        <td>8.</td>
        <td colspan="3">Keterangan</td>
        <td><div align="center">:</div></td>
        <td colspan="8"><?php echo($ket); ?></td>
      </tr>
      
      <tr>
        <td colspan="9">&nbsp;</td>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="9">&nbsp;</td>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="9">&nbsp;</td>
        <td colspan="5"> <div align="center"><strong>Malang, <span id="tgl_surat_title"><?php echo $tgl_surat; ?></span></strong></div></td>
      </tr>
      <tr>
        <td colspan="9">&nbsp;</td>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="9">&nbsp;</td>
        <td colspan="5"><div align="center"><strong>
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
        <td colspan="9">&nbsp;</td>
        <td colspan="5"> <div align="center"><strong><?php echo $jabatan_pejabat; ?></strong></div></td>
      </tr>
      <tr>
        <td colspan="9">&nbsp;</td>
        <td colspan="5"><div align="center"></div></td>
      </tr>
      <tr>
        <td colspan="9">&nbsp;</td>
        <td colspan="5"><div align="center"></div></td>
      </tr>
      <tr>
        <td colspan="9">&nbsp;</td>
        <td colspan="5"><div align="center"></div></td>
      </tr>
      <tr>
        <td colspan="9">&nbsp;</td>
        <td colspan="5"><div align="center"><strong><?php echo $nama_pejabat; ?></strong></div></td>
      </tr>
      <tr>
        <td colspan="9">&nbsp;</td>
        <td colspan="5"><div align="center"><strong><?php echo $pangkat_pejabat; ?></strong></div></td>
      </tr>
      <tr>
        <td colspan="9">&nbsp;
          <div align="center"></div></td>
        <td colspan="5"><div align="center"><strong>NIP. <?php echo $nip_pejabat; ?></strong></div></td>
      </tr>
    </table>

     </div>    
    </div>
    
     <div class="page" style="page-break-before:always;">
      <div class="subpage">
        <p>K E T E R A N G A N :<BR/>
        I. DARI PEJABAT PEMBERI PERINTAH :        </p>
        <p>&nbsp;</p>
        <table width="100%" border="0" rules="cols" style="font-size:14px; border:1px solid #000000;">
  <tr>
    <td width="134" rowspan="2"><div align="center"><strong>Tempat Kedudukan</strong></div>      <div align="center"><strong>Pegawai</strong></div>      <div align="center"><strong>yang diberi perintah</strong></div></td>
    <td colspan="2"><div align="center"><strong>Berangkat</strong></div></td>
    <td colspan="2"><div align="center"><strong>Kembali</strong></div></td>
  </tr>
  
  <tr class="row-line">
    <td width="50"><div align="center">Tanggal</div></td>
    <td width="180"><div align="center">Tanda Tangan</div></td>
    <td width="50"><div align="center">Tanggal</div></td>
    <td width=""><div align="center">Tanda Tangan</div></td>
  </tr>
  <tr class="row-line">
    <td><div align="center"><?php echo $dari?></div></td>
    <td><div align="center"><?php echo $tgl_berangkat ?></div></td>
    <td><p align="center" class="style2"style="font-size:10px;">
    <?php 
			if($kd_skpd>="421.011" && $kd_skpd<="421.060"){
			//echo $jabatan_pejabat.$kd_skpd;
				if(stristr($jabatan_pejabat,'Sekretaris')){
					echo('a.n. Bupati');		
				}else if(stristr($jabatan_pejabat,'Asisten')){
					echo('a.n. SEKRETARIS DAERAH');
				}else if(stristr($jabatan_pejabat,'Kepala Bagian Tata Pemerintahan') or stristr($jabatan_pejabat,'Kepala Bagian Hukum ')or stristr($jabatan_pejabat,'Kepala Bagian Pertanahan')){
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
				//$jabatan_pejabat = $jabatan_pejabat.' '.$this->session->userdata('nama_skpd');
				if(stristr($jabatan_pejabat,'Kepala')){
					echo('a.n. Bupati');		
				}
			}
			
		?>
    </p>    </td>
    <td><div align="center"><?php echo $tgl_kembali ?></div></td>
    <td><p align="center" class="style2"style="font-size:10px;">
    <?php 
			if($kd_skpd>="421.011" && $kd_skpd<="421.060"){
			//echo $jabatan_pejabat.$kd_skpd;
				if(stristr($jabatan_pejabat,'Sekretaris')){
					echo('a.n. Bupati');		
				}else if(stristr($jabatan_pejabat,'Asisten')){
					echo('a.n. SEKRETARIS DAERAH');
				}else if(stristr($jabatan_pejabat,'Kepala Bagian Tata Pemerintahan') or stristr($jabatan_pejabat,'Kepala Bagian Hukum ')or stristr($jabatan_pejabat,'Kepala Bagian Pertanahan')){
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
				//$jabatan_pejabat = $jabatan_pejabat.' '.$this->session->userdata('nama_skpd');
				if(stristr($jabatan_pejabat,'Kepala')){
					echo('a.n. Bupati');		
				}
			}
			
		?>
    </p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center" class="style2"style="font-size:10px;"><?php echo $jabatan_pejabat; ?></div></td>
    <td>&nbsp;</td>
    <td><div align="center" class="style2"style="font-size:10px;"><?php echo $jabatan_pejabat; ?> </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><span class="style2"></span></td>
    <td>&nbsp;</td>
    <td><span class="style2"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><span class="style2"></span></td>
    <td>&nbsp;</td>
    <td><span class="style2"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><span class="style2"></span></td>
    <td>&nbsp;</td>
    <td><span class="style2"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><span class="style2"></span></td>
    <td>&nbsp;</td>
    <td><span class="style2"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><p align="center" class="style2"style="font-size:10px;"><u><?php echo $nama_pejabat?>.</u><br />
      <?php echo $pangkat_pejabat ?></p>
      <div align="center" class="style2"style="font-size:10px;">NIP. <?php echo $nip_pejabat ?></div></td>
    <td>&nbsp;</td>
    <td><p align="center" class="style2"style="font-size:10px;"><u><?php echo $nama_pejabat ?>.</u><br />
      <?php echo $pangkat_pejabat?></p>
        <div align="center" class="style2"style="font-size:10px;">NIP. <?php echo $nip_pejabat ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
        <p>&nbsp;</p>
        <p>II.	DARI PEJABAT DI DAERAH PENUGASAN YANG DIKUNJUNGI :

        </p>
        <table width="100%" height="100%" border="0" rules="cols" style="font-size:14px; border:1px solid #000000;">
          <tr>
            <td width="134" rowspan="2"><div align="center">Tempat Kedudukan</div>
                <div align="center">Pegawai</div>
              <div align="center">yang diberi perintah</div></td>
            <td colspan="2"><div align="center"><strong>Berangkat</strong></div></td>
            <td colspan="2"><div align="center">Kembali</div></td>
          </tr>
          <tr class="row-line">
            <td width="50"><div align="center">Tanggal</div></td>
            <td width="150"><div align="center">Tanda Tangan</div></td>
            <td width="50"><div align="center">Tanggal</div></td>
            <td width=""><div align="center">Tanda Tangan</div></td>
          </tr>
          <tr class="row-line">
            <td><div align="center"><?php echo $ke?></div></td>
            <td><div align="center"></div></td>
            <td><p align="center" class="style2"style="font-size:10px;">&nbsp;</p></td>
            <td><div align="center"></div></td>
            <td><p align="center" class="style2"style="font-size:10px;">&nbsp;</p></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><div align="center" class="style2"style="font-size:10px;"></div></td>
            <td>&nbsp;</td>
            <td><div align="center" class="style2"style="font-size:10px;"></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><span class="style2"></span></td>
            <td>&nbsp;</td>
            <td><span class="style2"></span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><span class="style2"></span></td>
            <td>&nbsp;</td>
            <td><span class="style2"></span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><span class="style2"></span></td>
            <td>&nbsp;</td>
            <td><span class="style2"></span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><span class="style2"></span></td>
            <td>&nbsp;</td>
            <td><span class="style2"></span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><p align="center" class="style2"style="font-size:10px;">&nbsp;</p>
            <div align="center" class="style2"style="font-size:10px;"></div></td>
            <td>&nbsp;</td>
            <td><p align="center" class="style2"style="font-size:10px;">&nbsp;</p>
            <div align="center" class="style2"style="font-size:10px;"></div></td>
          </tr>
          <tr>
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
          </tr>
          <tr>
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
          </tr>
          <tr>
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
          </tr>
          <tr>
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
          </tr>
          <tr>
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
          </tr>
          <tr>
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
          </tr>
          <tr>
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
          </tr>
          <tr>
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
          </tr>
        </table>
      </div>
  </div> 
  
  <div class="page" style="padding-bottom:0px;page-break-before:always;">
    <div class="subpage">
     </br>
      <table width="100%" border="0">
        <tr>
          <td width="86">Daftar</td>
          <td width="14">:</td>
          <td width="" rowspan="2"><?php echo($maksud); ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Ke</td>
          <td>:</td>
          <td><?php echo($ke); ?></td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td>:</td>
          <td><?php echo($tgl_berangkat); ?></td>
        </tr>
      </table>
      <style>
      	#keu tr>td{
			padding:5px;
		}
      </style>
      <table id="keu" width="100%" border="0" rules="cols" style="font-size:14px; border:1px solid #000000;">
        <tr>
          <td width="10"><div align="center"><strong>NO</strong></div></td>
          <td width="176"><div align="center"><strong>NAMA</strong></div></td>
          <td width="105"><div align="center"><strong>UANG HARIAN</strong></div></td>
          <td width=""><div align="center"><strong>TANDA TANGAN</strong></div></td>
        </tr>
        <tr class="row-line">
          <td><div align="center">1.</div></td>
          <td><div align="left"><strong id="nama_title4"><?php echo $nama ?></strong></div></td>
          <td rowspan="2" style="vertical-align:initial;"><div align="center"><?php echo 'Rp. '.number_format($uang_saku,'2',',','.');?></div>            <div align="center"></div></td>
          <td rowspan="2" style="vertical-align:initial;"><div align="center">1. ...........</div>            <div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center"></div></td>
          <td><div align="left">NIP.<strong id="nama_title3"><?php if($NIP!=""){echo $NIP;}else{echo ' -';} ?></strong></div></td>
        </tr>
        <tr class="row-line">
          <td><div align="center"></div></td>
          <td rowspan="2" style="vertical-align:initial;"><div align="center" style="vertical-align:middle;">Jumlah</div>            <div align="left"></div></td>
          <td rowspan="2" style="vertical-align:initial;"><div align="center"><?php echo 'Rp. '.number_format($uang_saku,'2',',','.');?></div>            
          <div align="center"></div></td>
          <td rowspan="2" style="vertical-align:initial;display:table-cell;"><div align="center"><?php echo '( '.terbilang($uang_saku).' Rupiah )';?></div>            <div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center"></div></td>
        </tr>
        <?php if($pengikut2!=""){?>
        <?php } if($pengikut3!=""){?>
        <?php } ?>
      </table>
      <table width="100%" border="0">
        <tr>
          <td width="250">&nbsp;</td>
          <td width="53">&nbsp;</td>
          <td width="">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><div align="center">Malang ,<strong><?php echo $tgl_surat; ?></strong></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><div align="center">Yang menerima,</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><div align="center"><strong id="nama_title2"><?php echo $nama ?></strong></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><div align="center">NIP.<strong><?php echo $NIP?></strong></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center">Mengetahui,</div></td>
          <td>&nbsp;</td>
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center"><strong>Pejabat Pelaksana Teknis Kegiatan (PPTK)</strong></div></td>
          <td>&nbsp;</td>
          <td><div align="center"><strong>Bendahara Pengeluaran</strong></div></td>
        </tr>
        <tr>
          <td><div align="center"></div></td>
          <td>&nbsp;</td>
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center"></div></td>
          <td>&nbsp;</td>
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center"></div></td>
          <td>&nbsp;</td>
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center"><strong><?php echo $nama_pptk; ?></strong></div></td>
          <td>&nbsp;</td>
          <td><div align="center"><strong><?php echo $nama_bp; ?></strong></div></td>
        </tr>
        <tr>
          <td><div align="center"><strong><?php echo $pangkat_pptk; ?></strong></div></td>
          <td>&nbsp;</td>
          <td><div align="center"><strong><?php echo $pangkat_bp; ?></strong></div></td>
        </tr>
        <tr>
          <td><div align="center"><strong><?php echo $nip_pptk; ?></strong></div></td>
          <td>&nbsp;</td>
          <td><div align="center"><strong><?php echo $nip_bp; ?></strong></div></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      </div>
  </div>


</div>



<script type="text/javascript">
    //var title = $("#nama_title").val();
  var title = document.getElementById("nama_title").innerHTML+" "+document.getElementById("tgl_surat_title").innerHTML;
  title = title.trim();
  $(document).ready(function () {
  

  //jQuery(document).bind("keyup keydown", function(e){ //ctrl+p
  //if(e.ctrlKey && e.keyCode == 80){
    //PrintElem(".book");
  //}
//});

});

</script>

