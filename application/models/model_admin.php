<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {

	public function update_username($newuser,$oldpass)
	{
		$query=$this->db->query("UPDATE tbl_admin SET username='$newuser' where password='$oldpass' && level='1'");
		if ($query) {
			if($this->db->affected_rows() > 0){
				return 1;
			}else{
				return 0;
			}
			
		}else{
			return 0;
		}	
	}

	public function update_password($newpass,$oldpass)
	{
		$query=$this->db->query("UPDATE tbl_admin SET password='$newpass' where password='$oldpass' && level='1'");
		if ($query) {
			if($this->db->affected_rows() > 0){
				return 1;
			}else{
				return 0;
			}
			
		}else{
			return 0;
		}	
	}

	public function get_password($pass)
	{
		$query=$this->db->query("select password from tbl_admin where password='$pass' && level='1'");
		return $query->result_array();
	}
}	
?>