<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat extends CI_Controller {
	public function __construct()
	{
	    parent::__construct();
	    date_default_timezone_set('Asia/Jakarta');     
	    $session = $this->session->userdata('isUserLogin');
      	if($session == FALSE)
      	{
        	redirect('user/login');
      	}
         $this->load->library('pdf');
		//$this->mpdf->WriteHTML($html);
	}

	public function index()
	{
		redirect('surat/baru');
	}
	public function baru()
	{
		$modal = array('modal_view_surat'=>$this->load->view('modal_surat',array(),true),);
		$data =array('konten' => $this->load->view('surat_baru',$modal,true) , );
		$this->load->view('index',$data);
	}

	public function surat_tugas()
	{
		$modal = array('del_confirm_surat'=>$this->load->view('modal_confirm_del_surat',array(),true) ,
						'modal_view_surat'=>$this->load->view('modal_surat',array(),true)
		);
		$data =array('konten' => $this->load->view('surat_tugas',$modal,true) ,);
		$this->load->view('index',$data);
	}

	public function sppd()
	{
		$modal = array('del_confirm_surat'=>$this->load->view('modal_confirm_del_surat',array(),true) ,
						'modal_view_surat'=>$this->load->view('modal_surat',array(),true),
			);
		$data =array('konten' => $this->load->view('sppd',$modal,true) ,);
		$this->load->view('index',$data);
	}

	//fungsi get pengikut
	private function get_pengikut($kd_sdm){
			//$data = $this->db->query("select * from tbl_sdm where kd_sdm='$kd_sdm'");
			$this->load->model('model_sdm');
				if ($kd_sdm!="") {
					
					$data=$this->model_sdm->get_sdm("where kd_sdm='$kd_sdm'");
					foreach ($data as $row)
						{
						   $nama= $row['nama'];
						}
					return $data = $nama." , ";
				}else{
					return $data="";
				}
	}

	public function get_json($tipe,$skpd){
		if ($tipe=="sppd") {
			$data = $this->model_surat->get_surat("sppd","where a.kode_skpd='$skpd'");
			if($data!=null){
				foreach ($data as $key) {
					$dataa[]=array(
						'no_surat'=>$key['no_surat'],
						'pegawai'=>$key['nama'].'<br />'.$key['nip'].'&nbsp'.$key['nama_pangkat'].$key['golongan'].$key['ruang'],
						'pengikut'=>$this->get_pengikut($key['pengikut1']).'<br />'.$this->get_pengikut($key['pengikut2']).'<br />'.$this->get_pengikut($key['pengikut3']),
						'perjalanan'=>$key['dari'].' ke '.$key['ke'],
						'transportasi'=>$key['transportasi'],
						'waktu_perjalanan'=> $this->date_id->generate($key['tgl_berangkat']).' - '.$this->date_id->generate($key['tgl_kembali']).',<br/>lama '.$key['lama'].'&nbsp;hari.',
						'maksud_perjalanan'=>$key['untuk'],
						'atas_beban'=>$key['atas_beban'],
						'pasal_anggaran'=>$key['pasal_anggaran'],
						'keterangan'=>$key['keterangan'],
						'pejabat'=>$key['nama_pejabat'],
						'no_surat'=>$key['no_surat'],
						'untuk'=>$key['untuk'],
						'plus'=>$key['lama'].'<br />'.$key['transportasi'],
						);
				}
				echo json_encode($dataa);
			}else{
				echo '[]';
			}

		}else if($tipe=="surat_tugas"){
			$data = $this->model_surat->get_surat("surat_tugas","where a.kode_skpd='$skpd'");
			if($data!=null){
				foreach ($data as $key) {
					$dataa[]=array(
						'no_surat'=>$key['no_surat'],
						'pegawai'=>$key['nama'].'<br />'.$key['nip'].'&nbsp'.$key['nama_pangkat'].$key['golongan'].$key['ruang'],
						'pengikut'=>$this->get_pengikut($key['pengikut1']).'<br />'.$this->get_pengikut($key['pengikut2']).'<br />'.$this->get_pengikut($key['pengikut3']),
						'pembuka_surat'=>$key['pembuka_surat'],
						'dasar'=>$key['dasar'],
						'tujuan'=>$key['tujuan'],
						//'plus'=>$key['lama'].'<br />'.$key['transportasi'],
						);
				}
				echo json_encode($dataa);
			}else{
					echo '[]';
			}
		}
	}
	public function delete(){
		$no_surat = $_POST['par_no_surat'];
		//echo "<script> alert('".$no_surat."');</script>";
		$data = $this->model_surat->deleteByNoSurat($no_surat);
		if(!$data){
			echo "<script>new PNotify({
				    title: '',
				    text: '<i class=\"fa fa-frown-o\"></i> Gagal menghapuus surat.',
				    type: 'error',
				    shadow: false
					});</script>";
		}else{
			if ($data>=1) {
				echo "<script>new PNotify({
				    title: '',
				    text: '<i class=\"fa fa-check-circle-o\"></i> Berhasil menghapus surat.',
				    type: 'success',
				    shadow: false,
				    icon: false
					});</script>";
			}else{
				echo "<script>new PNotify({
				    title: '',
				    text: '<i class=\"fa fa-frown-o\"></i> Gagal menghapuus surat.',
				    type: 'error',
				    shadow: false,
				    icon: false
					});</script>";
			}
		};
	}

	
	public function cetak($ns1,$ns2,$ns3,$ns4,$tipe='')
	{
		$no_surat=$ns1."/".$ns2."/".$ns3."/".$ns4;
		//$html = "<h2>test trests</h2>";
		if($tipe=="surat_tugas"){
			$st = $this->model_surat->get_surat("surat_tugas","where no_surat = '".$no_surat."'");
			/*$pengikut1=$this->db->query("SELECT * from tbl_sdm where kd_sdm ='$st[0]['pengikut1']'");
			foreach ($pengikut1->result_array() as $key) {
				$nama_pengikut1=$key['nama'];
			}
			echo $nama_pengikut1;
			*/			
			$data = array(
				'no_surat'=>$st[0]['no_surat'],
				'nama'=>$st[0]['nama'],
				'nip'=>$st[0]['nip'],
				'pangkat'=>$st[0]['nama_pangkat'],
				'gol'=>$st[0]['golongan'],
				'ruang'=>$st[0]['ruang'],
				'jabatan'=>$st[0]['nama_jabatan'],
				'pengikut1'=>$st[0]['pengikut1'],
				'pengikut2'=>$st[0]['pengikut2'],
				'pengikut3'=>$st[0]['pengikut3'],
				'dasar'=>$st[0]['dasar'],
				'pembuka_surat'=>$st[0]['pembuka_surat'],
				'maksud'=>$st[0]['tujuan'],
				'nama_pejabat' => $st[0]['nama_pejabat'],
			    'nip_pejabat' => $st[0]['nip_pejabat'],
			    'jabatan_pejabat' => $st[0]['jabatan_pejabat'],
			    'pangkat_pejabat' => $st[0]['pangkat_pejabat'],
			    'golongan_pejabat' => $st[0]['golongan_pejabat'],
			    'ruang_pejabat' => $st[0]['ruang_pejabat'],
			    'tgl_surat' =>$this->date_id->generate($st[0]['tanggal_surat']),
//				);
			);
			if($st[0]['pengikut1']!=""){

		 		$html = $this->load->view('cetak-st-pengikut-pdf',$data,true);
				//render pdf st pengikut
				$this->pdf->pdf_create($html,$st[0]['nama']." ".$tipe.$this->date_id->generate($st[0]['tanggal_surat']),'folio','potrait');

			}else{
			 	$html = $this->load->view('cetak-st-pdf',$data,true);
				//render pdf st pengikut
				$this->pdf->pdf_create($html,$st[0]['nama']." ".$tipe.$this->date_id->generate($st[0]['tanggal_surat']),'folio','potrait');	
	
			}
		}else if($tipe=="sppd"){
			$sppd = $this->model_surat->get_surat("sppd","where no_surat = '".$no_surat."'");
			$data = array(
				'no_surat' => $sppd[0]['no_surat'],
				'nama' => $sppd[0]['nama'],
			    'NIP' => $sppd[0]['nip'],
			    'pangkat' => $sppd[0]['nama_pangkat'],
			    'jabatan' => $sppd[0]['nama_jabatan'],
			    'gol' => $sppd[0]['golongan'],
			    'pengikut1'=>$sppd[0]['pengikut1'],
				'pengikut2'=>$sppd[0]['pengikut2'],
				'pengikut3'=>$sppd[0]['pengikut3'],
			    'uang_saku'=>$sppd[0]['uang_saku'],
			    'ruang' => $sppd[0]['ruang'],
			    'maksud' => $sppd[0]['untuk'],
			    'dari' => $sppd[0]['dari'],
			    'ke' => $sppd[0]['ke'],
			    'tgl_berangkat' => $this->date_id->generate($sppd[0]['tgl_berangkat']),
			    'tgl_kembali' =>  $this->date_id->generate($sppd[0]['tgl_kembali']),
			    'lama' => $sppd[0]['lama'],
			    'transportasi' => $sppd[0]['transportasi'],
			    'atas_beban' => $sppd[0]['atas_beban'],
			    'pasal_anggaran' => $sppd[0]['pasal_anggaran'],
			    'ket' => $sppd[0]['keterangan'],
			    'tgl_surat' =>$this->date_id->generate($sppd[0]['tanggal_surat']),
			    'nama_pejabat' => $sppd[0]['nama_pejabat'],
			    'nip_pejabat' => $sppd[0]['nip_pejabat'],
			    'jabatan_pejabat' => $sppd[0]['jabatan_pejabat'],
			    'pangkat_pejabat' => $sppd[0]['pangkat_pejabat'],
			    'golongan_pejabat' => $sppd[0]['golongan_pejabat'],
			    'ruang_pejabat' => $sppd[0]['ruang_pejabat'],

			    'nama_pptk' => $sppd[0]['nama_pptk'],
			    'nip_pptk' => $sppd[0]['nip_pptk'],
			    'jabatan_pptk' => $sppd[0]['jabatan_pptk'],
			    'pangkat_pptk' => $sppd[0]['pangkat_pptk'],
			    'golongan_pptk' => $sppd[0]['golongan_pptk'],
			    'ruang_pptk' => $sppd[0]['ruang_pptk'],

			    'nama_bp' => $sppd[0]['nama_bp'],
			    'nip_bp' => $sppd[0]['nip_bp'],
			    'jabatan_bp' => $sppd[0]['jabatan_bp'],
			    'pangkat_bp' => $sppd[0]['pangkat_bp'],
			    'golongan_bp' => $sppd[0]['golongan_bp'],
			    'ruang_bp' => $sppd[0]['ruang_bp'],			    
			);
			if($sppd[0]['pengikut1']!=""){
				$html = $this->load->view('cetak-sppd-pengikut-pdf',$data,true);
				//render pdf st pengikut
				$this->pdf->pdf_create($html,$sppd[0]['nama']." ".$tipe.$this->date_id->generate($sppd[0]['tanggal_surat']),'folio','potrait');

			}else{
			 	$html = $this->load->view('cetak-sppd-pdf',$data,true);
				//render pdf st pengikut
				$this->pdf->pdf_create($html,$sppd[0]['nama']." ".$tipe.$this->date_id->generate($sppd[0]['tanggal_surat']),'folio','potrait');

			}
			//echo $this->load->view('cetak-sppd',$data,true);
		}else if($tipe==""){
			$sppd = $this->model_surat->get_surat("sppd","where no_surat = '".$no_surat."'");
			$st = $this->model_surat->get_surat("surat_tugas","where no_surat = '".$no_surat."'");
			$data = array(
				'no_surat' => $sppd[0]['no_surat'],
				'nama' => $sppd[0]['nama'],
			    'NIP' => $sppd[0]['nip'],
			    'pangkat' => $sppd[0]['nama_pangkat'],
			    'jabatan' => $sppd[0]['nama_jabatan'],
			    'gol' => $sppd[0]['golongan'],
			    'pengikut1'=>$sppd[0]['pengikut1'],
				'pengikut2'=>$sppd[0]['pengikut2'],
				'pengikut3'=>$sppd[0]['pengikut3'],
			    'uang_saku'=>$sppd[0]['uang_saku'],
			    'ruang' => $sppd[0]['ruang'],
			    'dasar'=>$st[0]['dasar'],
				'pembuka_surat'=>$st[0]['pembuka_surat'],
			    'maksud' => $sppd[0]['untuk'],
			    'dari' => $sppd[0]['dari'],
			    'ke' => $sppd[0]['ke'],
			    'tgl_berangkat' => $this->date_id->generate($sppd[0]['tgl_berangkat']),
			    'tgl_kembali' =>  $this->date_id->generate($sppd[0]['tgl_kembali']),
			    'lama' => $sppd[0]['lama'],
			    'transportasi' => $sppd[0]['transportasi'],
			    'atas_beban' => $sppd[0]['atas_beban'],
			    'pasal_anggaran' => $sppd[0]['pasal_anggaran'],
			    'ket' => $sppd[0]['keterangan'],
			    'tgl_surat' =>$this->date_id->generate($sppd[0]['tanggal_surat']),
			    'nama_pejabat' => $sppd[0]['nama_pejabat'],
			    'nip_pejabat' => $sppd[0]['nip_pejabat'],
			    'jabatan_pejabat' => $sppd[0]['jabatan_pejabat'],
			    'pangkat_pejabat' => $sppd[0]['pangkat_pejabat'],
			    'golongan_pejabat' => $sppd[0]['golongan_pejabat'],
			    'ruang_pejabat' => $sppd[0]['ruang_pejabat'],

			    'nama_pptk' => $sppd[0]['nama_pptk'],
			    'nip_pptk' => $sppd[0]['nip_pptk'],
			    'jabatan_pptk' => $sppd[0]['jabatan_pptk'],
			    'pangkat_pptk' => $sppd[0]['pangkat_pptk'],
			    'golongan_pptk' => $sppd[0]['golongan_pptk'],
			    'ruang_pptk' => $sppd[0]['ruang_pptk'],

			    'nama_bp' => $sppd[0]['nama_bp'],
			    'nip_bp' => $sppd[0]['nip_bp'],
			    'jabatan_bp' => $sppd[0]['jabatan_bp'],
			    'pangkat_bp' => $sppd[0]['pangkat_bp'],
			    'golongan_bp' => $sppd[0]['golongan_bp'],
			    'ruang_bp' => $sppd[0]['ruang_bp'],			    
			);
			if($sppd[0]['pengikut1']!=""){
				$html = $this->load->view('cetak-all-pengikut-pdf',$data,true);
				//render pdf st pengikut
				$this->pdf->pdf_create($html,$sppd[0]['nama']." ".$tipe.$this->date_id->generate($sppd[0]['tanggal_surat']),'folio','potrait');

			}else{
			 	$html = $this->load->view('cetak-all-pdf',$data,true);
				//render pdf st pengikut
				$this->pdf->pdf_create($html,$sppd[0]['nama']." ".$tipe.$this->date_id->generate($sppd[0]['tanggal_surat']),'folio','potrait');

			}
			//echo $this->load->view('cetak-sppd',$data,true);
		}

		//$this->pdf->pdf_create($html,"Main Mining report",'F4','potrait');
	}

	public function view($tipe='',$ns1,$ns2,$ns3,$ns4){
		$no_surat=$ns1."/".$ns2."/".$ns3."/".$ns4;
		echo "
				<!-- 16:9 aspect ratio -->
		<div class=\"embed-responsive embed-responsive-16by9\">
		  
		  <iframe class=\"embed-responsive-item\" src=\"".base_url()."surat/cetak/".$no_surat."/".$tipe."\"></iframe>
		</div>
		  ";
		//$modal = array('konten'=>$this->load->view('modal_surat',array(),true) ,);
		//$this->load->view('index',$data);
	}

	public function insert(){
		//print_r($_POST);

		$kd_sdm = $_POST['par_pegawai'];
		$pengikut1 = $_POST['par_pengikut1'];
		$pengikut2 = $_POST['par_pengikut2'];
		$pengikut3 = $_POST['par_pengikut3'];
		$no_surat = $_POST['par_nosurat'];
		$tanggal_surat = date("Y-m-d H:i:s"); 
		$tujuan = $_POST['par_tujuan'];
		$dasar = $_POST['par_dasarSurat'];
		$pembuka_surat = $_POST['par_pembukaSurat'];
		$tgl_berangkat = $_POST['par_tglBerangkat'];
		$tgl_kembali= $_POST['par_tglKembali'];
		$lama = $_POST['par_lama'];
		$dari_kota = $_POST['par_dariKota'];
		$ke_kota = $_POST['par_keKota'];
		$transportasi = $_POST['par_angkutan'];
		//tujuan
		$atas_beban = $_POST['par_atasBeban'];
		$pasal_anggaran = $_POST['par_pasalAnggaran'];
		$ket = $_POST['par_keterangan'];
		$pptk = $_POST['par_pptk'];
		$bp =$_POST['par_bp'];
		//tglsurat
		$status = $_POST['par_status'];
		$pejabat = $_POST['par_pejabat'];
		$kode_skpd = $_POST['par_kode_skpd'];
		$uang_saku = $_POST['par_uang_saku'];
		//echo "sukses";

		$data_st = array(
			'no_surat'=>$no_surat,
			'kd_sdm'=>$kd_sdm,
			'pengikut1'=>$pengikut1,
			'pengikut2'=>$pengikut2,
			'pengikut3'=>$pengikut3,
			'tanggal_surat'=>$tanggal_surat,
			'tujuan'=>$tujuan,
			'dasar'=>$dasar,
			'pembuka_surat'=>$pembuka_surat,
			'status'=>$status,
			'pejabat'=>$pejabat,
			'kode_skpd'=>$kode_skpd,
		);
		$data_sppd = array(
			'no_surat'=>$no_surat,
			'kd_sdm'=>$kd_sdm,
			'pengikut1'=>$pengikut1,
			'pengikut2'=>$pengikut2,
			'pengikut3'=>$pengikut3,
			'uang_saku'=>$uang_saku,
			'tgl_berangkat'=>$tgl_berangkat,
			'tgl_kembali'=>$tgl_kembali,
			'lama'=>$lama,
			'untuk'=>$tujuan,
			'dari'=>$dari_kota,
			'ke'=>$ke_kota,
			'transportasi'=>$transportasi,
			'atas_beban'=>$atas_beban,
			'pasal_anggaran'=>$pasal_anggaran,
			'keterangan'=>$ket,
			'pptk'=>$pptk,
			'bendahara_pengeluaran'=>$bp,
			'tanggal_surat'=>$tanggal_surat,
			'status'=>$status,
			'pejabat'=>$pejabat,
			'kode_skpd'=>$kode_skpd,

		);

		//echo print_r($data_st).print_r($data_sppd) ;
		$data = $this->model_surat->insert($data_st,$data_sppd);
		//echo $data;
		/*if($data==true){
				echo "<script>new PNotify({
				    title: '',
				    text: 'Berhasil membuat surat silahkan cek di daftar surat.',
				    type: 'success'
					});</script>";
		}*/
		if($data==true){
			echo "<script>new PNotify({
				    title: '',
				    text: '<i class=\"fa fa-check-circle-o\"></i> Berhasil membuat surat .',
				    type: 'success',
				    shadow: false,
				    icon: false
					});</script>";
			
			echo "
				<!-- 16:9 aspect ratio -->
				<div class=\"embed-responsive embed-responsive-16by9\">
		  
		  		<iframe class=\"embed-responsive-item\" src=\"".base_url()."surat/cetak/".$no_surat."\"></iframe>
				</div>
		  ";
		}
	}
	public function getcountweek($value='')
	{
		$data=$this->model_surat->getcountweek();
		echo json_encode($data);
	}
	public function getcountmonth($value='')
	{
		$data=$this->model_surat->getcountmonth();
		echo json_encode($data);
	}
}
