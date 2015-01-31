<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_skpd extends CI_Model {
	public function get_all($value='')
	{
		$data =$this->db->query("select * from tbl_skpd where kode_skpd <> '-'");
		return $data->result_array();
	}
	public function delete($kode)
	{
		$query=$this->db->delete('tbl_skpd',$kode);
		if ($query) {
			return 1;
		}else{
			return 0;
		}
	}
	public function insert($data)
	{
		$query=$this->db->insert('tbl_skpd',$data);
		if ($query) {
			return 1;
		}else{
			return 0;
		}
	}

	public function get_by_kode($kode)
	{
		$this->db->select('*');
		$this->db->where('kode_skpd',$kode);
		$this->db->from('tbl_skpd');
		$data=$query = $this->db->get();
		return $data->result_array();
	}
	public function update($data,$kode)
	{
		//$this->db->where('id', $id);
		$query=$this->db->update('tbl_skpd', $data,"kode_skpd = '$kode'"); 	
		if ($query) {
			return 1;
		}else{
			return 0;
		}
	}
	public function getcountall($value='')
	{
		$data=$this->db->query("SELECT * FROM tbl_skpd");
		return $data->num_rows()-1;
	}
}
?>