<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_login');
    $this->load->model('model_skpd');
    $this->load->library(array('form_validation','session'));
    $this->load->database();
    $this->load->helper('url');
  }

  public function index()
  {
      $session = $this->session->userdata('isUserLogin');
      if($session == FALSE)
      {
        redirect('login');
      }else
      {
        redirect('');
      }
  }

  public function login()//dologin
  {
    $session = $this->session->userdata('isUserLogin');
      if($session == FALSE)
      {
    $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
    //$this->form_validation->set_rules('password', 'Password', 'required|md5|xss_clean');
    $this->form_validation->set_error_delimiters('<span class="error">', '</span>');

      if($this->form_validation->run()==FALSE)
      {
        $this->load->view('form_login');
      }else
      {
       $username = $this->input->post('username');
       $password = $this->input->post('password');
       $cek = $this->m_login->ambilPengguna($username, $password);

        if($cek <> 0)
        {
          $this->session->set_userdata('isUserLogin', TRUE);
          $this->session->set_userdata('username',$username);
          //$this->session->set_userdata('kode_skpd',$kode_skpd);
  //        $this->session->set_userdata('level',$level);

         $this->session->set_flasHdata('welcome','<p style="font-size:24px;color:gray;">Selamat datang <i style="color:green;" class="fa fa-smile-o fa-lg"></i> ...</p>'); 
         redirect(base_url());
        }else
        {
          $this->session->set_flasHdata('pesan','<div class="col-sm-12"><div class="alert alert-danger" role="alert">Username dan password salah.</div></div>');
          redirect('login');

        }
      }}else{
        redirect('');
      }
  }
  public function logout()
  {
   //$this->session->sess_destroy();
    $this->session->unset_userdata('isUserLogin');
    $this->session->unset_userdata('username');
    //$this->session->unset_userdata('username');
    redirect('login');
  }
  public function profil($kode_skpd)
  {
   $data_query = $this->model_skpd->get_by_kode($kode_skpd);

   foreach ($data_query as $key) {
     $data = array(
      'kode_skpd' => $key['kode_skpd'],
      'nama_skpd' => $key['nama_skpd'], 
      'alamat_skpd' => $key['alamat_skpd'], 
      'telp_skpd' => $key['telepon_skpd'], 
      'email_skpd' => $key['email_skpd'], 
      'website_skpd' => $key['website_skpd'],
      );
   }
   $data =array('konten' => $this->load->view('skpd_profile',$data,true) ,);
   $this->load->view('index',$data);
  }
  public function get()
  {
   $user = $this->session->userdata('username');
   $cek = $this->m_login->dataPengguna($user);
   print_r($cek);
  }

}

?>
