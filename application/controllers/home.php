<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	  {
	    parent::__construct();	    
	     $this->load->library(array('session'));	     
	     $this->load->helper('url');	     
	     $this->load->model('m_login');	    
	     $this->load->database();
       date_default_timezone_set('Asia/Jakarta');     
	  }
  
  
  public function index()
  {
    if($this->session->userdata('isUserLogin') == FALSE)
    {
      redirect('user/login');
    }else
    {
    
      $this->load->model('m_login');      
      $user = $this->session->userdata('username');
      
      //$data['level'] = $this->session->userdata('level');        
      $data['user'] = $this->m_login->dataPengguna($user);
      
      //echo("=======".$data['user']->nama_admin);
      $this->session->set_userdata('kode_skpd',$data['user']->kode_skpd);
      $this->session->set_userdata('nama_skpd',$data['user']->nama_skpd);
      //echo $this->session->userdata('kode_skpd');
      
      //load home index :v 
      //$this->load->view('home_v', $data);
      $data =array('konten' => $this->load->view('home',array(),true) , );	
	    $this->load->view('index',$data);
    }
  } 
}