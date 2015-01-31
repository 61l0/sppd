<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat extends CI_Controller {
	public function __construct()
	{
	    parent::__construct();
	    date_default_timezone_set('Asia/Jakarta');     
	    $session = $this->session->userdata('isLogin');
      	if($session == FALSE)
      	{
        	redirect('admin/login');
      	}
         $this->load->library('pdf');
         $this->load->model('model_skpd');
		//$this->mpdf->WriteHTML($html);
	}

	public function index()
	{
		redirect('admin/surat/sppd');

	}

	/*
	//jika ada ,seharuse gak ada
	public function baru()
	{
		$modal = array('modal_view_surat'=>$this->load->view('modal_surat',array(),true),);
		$data =array('konten' => $this->load->view('surat_baru',$modal,true) , );
		$this->load->view('index',$data);
	}*/

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
		$data =array('content' => $this->load->view('backoffice/surat',$modal,true) ,);
		$this->load->view('backoffice/index',$data);
	}

	public function transaksi($value='')
	{
		$title="Grafik transaksi surat tahun ".date('Y');
		$data =array('content' => $this->load->view('backoffice/transaksi_surat',array('title_content'=>$title),true) ,);
		$this->load->view('backoffice/index',$data);

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
	public function get_namaSKPD($value='')
	{
	    //$kode=$_POST['par_kodeskpd'];
	    //echo $kode;
	    $data = $this->model_skpd->get_by_kode($value);
	    foreach ($data as $key) {
	    	return $nama_skpd = $key['nama_skpd'];	    	
	    }
  	}
	public function get_json($tipe){
		if ($tipe=="sppd") {
			$data = $this->model_surat->get_surat("sppd");
			if($data!=null){
				foreach ($data as $key) {
					$dataa[]=array(
						'no_surat'=>$key['no_surat'],
						'kode_skpd'=>$key['kode_skpd'],
						'nama_skpd'=>$this->get_namaSKPD($key['kode_skpd']),
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
			$data = $this->model_surat->get_surat("surat_tugas");
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

	public function view($ns1,$ns2,$ns3,$ns4,$tipe=''){
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
	public function getcountall($value='')
	{
		$data=$this->model_surat->getcountall();
		echo $data;
	}
}
