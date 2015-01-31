<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_login');
    $this->load->model('model_user');
     $this->load->model('model_skpd');
     $this->load->model('model_admin');
    $this->load->library(array('form_validation','session'));
    $this->load->database();
    $this->load->helper('url');
    if($session == FALSE)
        {
          redirect('admin/login');
        }
  }

  public function index()
  {
    $data = array('del_confirm_user'=>$this->load->view('backoffice/modal_confirm_del_user',array(),true) ,
          'tambah_user'=>$this->load->view('backoffice/tambah-user',array(),true),
          'edit_user'=>$this->load->view('backoffice/edit-user',array(),true),
          'title_content'=>'List User',
        );
        $data =array('content' => $this->load->view('backoffice/user',$data,true) , );  
        $this->load->view('backoffice/index',$data);
  }

  public function get_user_all($value='')
  {
    $data = $this->model_user->get_user_all();
        //print_r($data);
    $dataa='';
    if($data!=null){
      foreach ($data as $key) {
        $dataa[]=array(
        'no_user'=>$key['no'],
        'kode_skpd'=>$key['kode_skpd'],
        'username'=>$key['username'],
        'password'=>$key['password'],
        'skpd'=>$key['nama_skpd'],
        );
      }
      echo json_encode($dataa);
    }else{
      echo '[]';
    }
  }

  public function delete($value='')
  {
    $no_user = $_POST['par_no_user'];
    //print_r($_POST);
    $respon=$this->model_user->delete(array('no' => $no_user));
    echo $respon;
  }

  public function baru($value='')
  {
    $data=array(
          
      'username' => $_POST['par_username'],
      'password' => $_POST['par_password'],
      'kode_skpd' => $_POST['par_kodeskpd'],          
    );
    //print_r($data);
    $respon=$this->model_user->insert($data);
    echo $respon;

  }

  public function update($value='')
  {
    $data=array(          
          'username' => $_POST['par_username'],
          'password' => $_POST['par_password'],
          'kode_skpd' => $_POST['par_kodeskpd'],
        );
        //print_r($data);

        $respon=$this->model_user->update($data,$_POST['par_nouser']);
        echo $respon;
  }

  public function get_by_no($value='')
  {
    $no=$_POST['par_nouser'];
    //echo $kode;
    $data = $this->model_user->get_by_no($no);
    echo json_encode($data);
  }

}
?>