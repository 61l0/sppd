<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Skpd extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if($session == FALSE)
        {
          redirect('admin/login');
        }
    $this->load->model('m_login');
    $this->load->model('model_user');
    $this->load->model('model_skpd');
    $this->load->model('model_admin');
    $this->load->library(array('form_validation','session'));
    $this->load->database();
    $this->load->helper('url');

  }
  public function index()
  {
    $data = array('del_confirm_skpd'=>$this->load->view('backoffice/modal_confirm_del_skpd',array(),true) ,
          'tambah_skpd'=>$this->load->view('backoffice/tambah-skpd',array(),true),
          'edit_skpd'=>$this->load->view('backoffice/edit-skpd',array(),true),
          'title_content'=>'List Satuan Kerja Perangkat Daerah',
        );
        
    $data =array('content' => $this->load->view('backoffice/skpd',$data,true) , );  
    $this->load->view('backoffice/index',$data);
  }

  public function get_all_sel($value='')
  {
    $data = $this->model_skpd->get_all();
    //print_r($data);
    $dataa='';
    if($data!=null){
      foreach ($data as $key) {
        $dataa[]=array(
        'kode_skpd'=>$key['kode_skpd'],
        'nama_skpd'=>$key['nama_skpd'],
        'nama_kode_skpd'=>$key['nama_skpd']." | ".$key['kode_skpd'],
        'alamat_skpd'=>$key['alamat_skpd'],
        'telepon_skpd'=>$key['telepon_skpd'],
        'email_skpd'=>$key['email_skpd'],
        'website_skpd'=>$key['website_skpd'],
        );
      }
      echo json_encode($dataa);
    }else{
      echo '[]';
    }
  }

  public function get_all($value='')
  {
    $data = $this->model_skpd->get_all();
    //print_r($data);
    $dataa='';
    if($data!=null){
      foreach ($data as $key) {
        $dataa[]=array(
        'kode_skpd'=>$key['kode_skpd'],
        'nama_skpd'=>$key['nama_skpd'],
        'alamat_skpd'=>$key['alamat_skpd'],
        'telepon_skpd'=>$key['telepon_skpd'],
        'email_skpd'=>$key['email_skpd'],
        'website_skpd'=>$key['website_skpd'],
        );
      }
      echo json_encode($dataa);
    }else{
      echo '[]';
    }
  }

  public function delete($value='')
  {
    $kode_skpd = $_POST['par_kode_skpd'];
    //print_r($_POST);
    $respon=$this->model_skpd->delete(array('kode_skpd' => $kode_skpd));
    echo $respon;
  }

  public function baru($value='')
  {
    //print_r($_POST);
    $data=array(
      'kode_skpd' => $_POST['par_kodeskpd'],
      'nama_skpd' => $_POST['par_namaskpd'],
      'telepon_skpd' => $_POST['par_telpskpd'],
      'alamat_skpd' => $_POST['par_alamatskpd'],
      'email_skpd' => $_POST['par_emailskpd'],
      'website_skpd' => $_POST['par_websiteskpd'],
    );
    //print_r($data);
    $respon=$this->model_skpd->insert($data);
    echo $respon;
  }

  public function update($value='')
  {
    $data=array(          
      'nama_skpd' => $_POST['par_namaskpd'],
      'telepon_skpd' => $_POST['par_telpskpd'],
      'alamat_skpd' => $_POST['par_alamatskpd'],
      'email_skpd' => $_POST['par_emailskpd'],
      'website_skpd' => $_POST['par_websiteskpd'],
    );
    //print_r($data);

    $respon=$this->model_skpd->update($data,$_POST['par_kodeskpd']);
    echo $respon;
  }

  public function get_by_kode($value='')
  {
    $kode=$_POST['par_kodeskpd'];
    //echo $kode;
    $data = $this->model_skpd->get_by_kode($kode);
    echo json_encode($data);
  }
  
}
?>
