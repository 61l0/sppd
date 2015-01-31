<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_login');
    $this->load->model('model_user');
    $this->load->model('model_sdm');
    $this->load->model('model_skpd');
    $this->load->model('model_admin');
    $this->load->library(array('form_validation','session'));
    $this->load->database();
    $this->load->helper('url');
  }

  public function index()
  {
      $session = $this->session->userdata('isLogin');
      if($session == FALSE)
      {
        redirect('admin/login');
      }else
      {
       // redirect('admin');
//        $content = $this->load->view('backoffice/home',true)
  //      $this->load->view('backoffice/index');
       // $data=$this->getcountall();
        $sum_surat=$this->model_surat->getcountall();
        $sum_skpd=$this->model_skpd->getcountall();
        $sum_sdm=$this->model_sdm->getcountall();
        $sum_user=$this->model_user->getcountall();
        $data =array('content' => $this->load->view('backoffice/home',array('title_content'=>'Home','sum_surat'=>$sum_surat,'sum_skpd'=>$sum_skpd,'sum_sdm'=>$sum_sdm,'sum_user'=>$sum_user),true) , );  
        $this->load->view('backoffice/index',$data);
      }
  }

  public function login()//dologin
  {
    $session = $this->session->userdata('isLogin');
      if($session == FALSE)
      {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
        //$this->form_validation->set_rules('password', 'Password', 'required|md5|xss_clean');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');

        if($this->form_validation->run()==FALSE)
        {
          $this->load->view('backoffice/form_login_admin');
        }else
        {
         $username = $this->input->post('username');
         $password = $this->input->post('password');

         $cek = $this->m_login->ambilPengguna($username, $password ,1);

          if($cek <> 0)
          {
            $this->session->set_userdata('isLogin', TRUE);
            $this->session->set_userdata('username_admin',$username);
            $this->session->set_userdata('password_admin',$password);
    //      $this->session->set_userdata('level',$level);
            $this->session->set_flasHdata('welcome','<h1 style="font-size:60px;">Selamat datang admin <i style="font-size:100px;color:#428bca;" class="fa fa-smile-o"></i></h1>');
            redirect('admin');
          }else
          {
            $this->session->set_flashdata('pesan','<div class="col-sm-12"><div class="alert alert-danger" role="alert">Username dan password salah.</div></div>');
            redirect('admin/login');

          }
        }
      }else{
        redirect('admin');
      }
  }


  public function logout()
  {
   //$this->session->sess_destroy();
    $this->session->unset_userdata('isLogin');
    $this->session->unset_userdata('username_admin');
   redirect('admin/login');
  }

  public function get()
  {
   $user = $this->session->userdata('username_admin');
   $cek = $this->m_login->dataPengguna($user);
   print_r($cek);
  }

  public function setting()
  {
    $data = $this->db->query("select * from tbl_admin where level='1'");
    $data = $data->result_array();
    

    $data =array('content' => $this->load->view('backoffice/setting',array('title_content'=>'Setting admin root','pass'=>$data[0]['password'],'user'=>$data[0]['username']),true) , );  
    $this->load->view('backoffice/index',$data);    
  }

  public function update($value='')
  {
    if ($value=='username') {
        print_r($_POST);      //$newuser=$_POST['par_newuser'];
        $pass=$_POST['par_pass'];      
        $respon=$this->model_admin->update_username($newuser,$pass);
        if ($respon==1) {
          $this->session->set_flashdata('admin-pesan','<div class="alert alert-success">Username admin berhasil dirubah.</div>');
        }else{
          $this->session->set_flashdata('admin-pesan','<div class="alert alert-danger">Username admin gagal dirubah. Password salah !.</div>');
        }      
    }else if ($value=='password') {
        //print_r($_POST);
        $newpass=$_POST['par_newpass'];
        $pass=$_POST['par_pass'];
        //echo $newpass.$pass;      
        $respon=$this->model_admin->update_password($newpass,$pass);
        if ($respon==1) {
          $this->session->set_flashdata('admin-pesan','<div class="alert alert-success">Username admin berhasil dirubah.</div>');
        }else{
          $this->session->set_flashdata('admin-pesan','<div class="alert alert-danger">Username admin gagal dirubah. Password salah !.</div>');
        }
    }
  }

  

}

?>
