<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model {
	public function get_user_all($value='')
	{
		$data =$this->db->query("select * from tbl_admin as a inner join tbl_skpd as b on a.kode_skpd = b.kode_skpd where a.kode_skpd <> '-'");
		return $data->result_array();
	}
	public function delete($no)
	{
		$query=$this->db->delete('tbl_admin',$no);
		if ($query) {
			return 1;
		}else{
			return 0;
		}
	}
	public function insert($data)
	{
		$query=$this->db->insert('tbl_admin',$data);
		if ($query) {
			return 1;
		}else{
			return 0;
		}
	}

	public function get_by_no($no)
	{
		$this->db->select('*');
		$this->db->where('no',$no);
		$this->db->from('tbl_admin');
		$data=$query = $this->db->get();
		return $data->result_array();
	}
	public function update($data,$no)
	{
		//$this->db->where('id', $id);
		$query=$this->db->update('tbl_admin', $data,"no = '$no'"); 	
		if ($query) {
			return 1;
		}else{
			return 0;
		}
	}
	public function getcountall($value='')
	{
		$data=$this->db->query("SELECT * FROM tbl_admin");
		return $data->num_rows();
	}
}
?>