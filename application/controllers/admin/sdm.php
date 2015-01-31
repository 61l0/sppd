<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sdm extends CI_Controller {
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('model_sdm');
	    $session = $this->session->userdata('isLogin');
      	if($session == FALSE)
      	{
        	redirect('admin/login');
      	}
      	date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$pangkat=$this->model_sdm->get_pangkat(" where kd_pg >1");
		$data = array('del_confirm_user'=>$this->load->view('backoffice/modal_confirm_del_sdm',array(),true) ,
          'tambah_user'=>$this->load->view('backoffice/tambah-sdm',array('pangkat'=>$pangkat),true),
          'edit_user'=>$this->load->view('backoffice/edit-sdm',array('pangkat'=>$pangkat),true),
          'title_content'=>'List sdm',
        );        
	    $data =array('content' => $this->load->view('backoffice/sdm',$data,true) , );  
	    $this->load->view('backoffice/index',$data);
	}	
	public function get_ttd($jabatan,$kode_skpd=""){
		$jabatan = str_replace('%20',' ',$jabatan);
		if ($kode_skpd!="") {
			$kode_skpd=" kode_skpd='".$kode_skpd."' and";
		}
		$data = $this->model_sdm->get_sdm_a("where ".$kode_skpd." nama_jabatan like '%".$jabatan."%'");
		   //print_r($data);
		    foreach ($data as $key) {
            	$kd_sdm = $key['kd_sdm'];
            	$nip = $key['nip'];
            	$nama = $key['nama'];
            	$jabatan = $key['nama_jabatan'];
            }
		echo json_encode($data);
	}
	//creat surat sdm
	public function get_json($kondisi=""){
		//split kondisi,
		$kondisii="";
		if ($kondisi!="") {
		 	$str = explode("_",$kondisi);
		 //	$jum = count($str);
			$kondisii="";
			foreach($str as $i =>$j) {
			    $kondisii=$kondisii." and a.kd_sdm <> '".$j."'";
			}
			//echo $kondisii;
		}
		
		$kondisii=$kondisii." and a.kode_skpd = '".$this->session->userdata('kode_skpd')."' ";
		$data = $this->model_sdm->get_filter_sdm($kondisii);
		if($data!=null){
			foreach ($data as $key) {
				$dataa[]=array(
				'kodepegawai'=>$key['kd_sdm'],
				'nip'=>$key['nip'],
				'nama'=>$key['nama'],
				'jabatan'=>$key['nama_jabatan'],
				'pangkat'=>$key['nama_pangkat'],
				'golongan'=>$key['golongan'],
				'ruang'=>$key['ruang'],
				);
			}
			echo json_encode($dataa);
		}else{
			echo '[]';
		}

	}
	public function get_sdm($filter="",$data=""){
		if ($filter=="skpd") {			
			//jika skpd bawahan sekretariat daerah
			$kode_skpd=$data;
			if($kode_skpd>'421.010' && $kode_skpd < '421.050' ){			
				$data = $this->model_sdm->get_sdm_a("where kode_skpd='$kode_skpd'");//or nama_jabatan like'%asisten%'		
				echo json_encode($data);	
			}else{
				$data = $this->model_sdm->get_sdm_a("where kode_skpd='$kode_skpd'");		
				echo json_encode($data);
			}	
		}else if ($filter=="kd_sdm") {
			$kd_sdm = $data;
			$data = $this->model_sdm->get_sdm_a(" where kd_sdm='$kd_sdm'");
			echo json_encode($data);
		}else if ($filter=="all") {
			$data = $this->model_sdm->get_sdm_a('order by d.nama_skpd asc');
			echo json_encode($data);
		}
	}
	
	public function get_jabatan()
	{
		//$data = $this->model_sdm->get_jabatan(" where nama_jabatan NOT LIKE '%asisten%'");
		$data = $this->model_sdm->get_jabatan(" ");
		echo json_encode($data);
	}
	
	public function baru()
	{
		//echo print_r($_POST);
		$jenis = $_POST['par_jenis'];
		//$query1 = "SELECT max(kd_sdm) as max_kdsdm FROM tbl_sdm WHERE kd_sdm LIKE '$jenis%'";
		$data=$this->db->query("SELECT max(kd_sdm) as max_kdsdm FROM tbl_sdm WHERE kd_sdm LIKE '$jenis%'");
		foreach ($data->result_array() as $key) {
			$max_kdsdm = $key['max_kdsdm'];
		}
		//echo $max_kdsdm;
		$noUrut = (int)substr($max_kdsdm, 3, 6);
		$noUrut++;
		$new_kdsdm = $jenis . sprintf("%04s", $noUrut);
		//echo $new_kdsdm;
		$data_insert = array(
				'kd_sdm' => $new_kdsdm,
				'nip' => $_POST['par_nip'],
				'nama' => $_POST['par_nama'],
				'kd_jabatan' => $_POST['par_jabatan'],
				'kd_pg' => $_POST['par_pangkat'],
				'kode_skpd'=> $_POST['par_skpd'],					
		);

		$respon=$this->model_sdm->insert($data_insert);
		echo $respon;		
	}

	public function get_by_id($value='')
	{
		$data=$this->model_sdm->get_sdm_a(" where kd_sdm='$value'");
		echo json_encode($data);
	}
	
	public function update($value='')
	{
		//POST 
		$data_update = array(				
				'nip' => $_POST['par_nip'],
				'nama' => $_POST['par_nama'],
				'kd_jabatan' => $_POST['par_jabatan'],
				'kd_pg' => $_POST['par_pangkat'],
				'kode_skpd'=>$_POST['par_skpd'],					
		);
		$respon=$this->model_sdm->update($data_update,$value);
		echo $respon;		
	}
	
	public function delete($kd_sdm='')
	{		
		$respon=$this->model_sdm->delete(array('kd_sdm' => $kd_sdm));
		echo $respon;
	}

	public function insert_jabatan($value='')
	{
		$jab = $_POST['par_jabatan'];
		$respon=$this->model_sdm->insert_jabatan(array('nama_jabatan' => $jab));
		echo $respon;

	}
}
