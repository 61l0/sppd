<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_sdm extends CI_Model {
	public function get_filter_sdm($kondisi=""){
		date_default_timezone_set('Asia/Jakarta');		
		$tgl = date('Y-m-d');
		//echo $tgl;
		//$data = $this->db->query("select kd_sdm,nip,nama,nama_jabatan,nama_pangkat,golongan,ruang from tbl_sdm as a inner join tbl_jabatan as b on a.kd_jabatan = b.kd_jabatan inner join tbl_pangkat_gol as c on a.kd_pg = c.kd_pg where a.kd_sdm not in(select kd_sd from tbl_sppd where ".$kondisi." tanggal_surat = '$tgl') order by kd_sdm asc");
		$data = $this->db->query("select kd_sdm,nip,nama,nama_jabatan,nama_pangkat,golongan,ruang from tbl_sdm as a inner join tbl_jabatan as b on a.kd_jabatan = b.kd_jabatan inner join tbl_pangkat_gol as c on a.kd_pg = c.kd_pg 
			where a.kd_sdm not in(select kd_sdm from tbl_sppd where tanggal_surat like '%$tgl%') 
			and a.kd_sdm not in(select pengikut1 from tbl_sppd where tanggal_surat like '%$tgl%') 
			and a.kd_sdm not in(select pengikut2 from tbl_sppd where tanggal_surat like '%$tgl%') 
			and a.kd_sdm not in(select pengikut3 from tbl_sppd where tanggal_surat like '%$tgl%') 
			".$kondisi."order by kd_sdm asc");
		
		$data = $data->result_array();
	    //.where
		return $data;
	}

	public function get_sdm($kondisi=""){
		$data = $this->db->query("select * from tbl_sdm as a inner join tbl_jabatan as b on a.kd_jabatan = b.kd_jabatan inner join tbl_pangkat_gol as c on a.kd_pg = c.kd_pg ".$kondisi."");
		return $data->result_array();
	}

	public function get_sdm_a($kondisi=""){
		$data = $this->db->query("select * from tbl_sdm as a inner join tbl_jabatan as b on a.kd_jabatan = b.kd_jabatan inner join tbl_pangkat_gol as c on a.kd_pg = c.kd_pg inner join tbl_skpd as d on a.kode_skpd = d.kode_skpd ".$kondisi."");
		return $data->result_array();
	}

	public function get_pangkat($value='')
	{
		$data=$this->db->query("select * from tbl_pangkat_gol".$value."");
		return $data->result_array();
	}
	public function get_jabatan($value='')
	{
		$data=$this->db->query("select * from tbl_jabatan".$value."");
		return $data->result_array();
	}
	public function insert($data)
	{
		$query=$this->db->insert('tbl_sdm',$data);
		if ($query) {
			return 1;
		}else{
			return 0;
		}
	}

	public function update($data,$id)
	{
		//$this->db->where('id', $id);
		$query=$this->db->update('tbl_sdm', $data,"kd_sdm = '$id'"); 	
		if ($query) {
			return 1;
		}else{
			return 0;
		}
	}
	public function delete($oid)
	{
		$query=$this->db->delete('tbl_sdm',$oid);
		if ($query) {
			return 1;
		}else{
			return 0;
		}
	}
	
	public function insert_jabatan($data)
	{
		$query=$this->db->insert('tbl_jabatan',$data);
		if ($query) {
			return 1;
		}else{
			return 0;
		}
	}
	public function getcountall($value='')
	{
		$data=$this->db->query("SELECT * FROM tbl_sdm");
		return $data->num_rows();
	}
}