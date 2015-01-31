<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {

	public function __construct() { 
  		parent::__construct(); 
  		$this->load->helper('url'); 
 	}
 
	public function index() {
		//$html = '<h2>Halaman tidak ditemukan</h2>'
		$data =array('konten' => '<h4>Halaman tidak ditemukan</h4>' );
		$this->load->view('index',$data);
		//$this->load->view('error404');
	}
}
?>