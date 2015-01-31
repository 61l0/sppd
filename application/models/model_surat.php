<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_surat extends CI_Model {
	public function get_surat($tipe,$where=""){
		if ($tipe=="sppd") {
			$data = $this->db->query('SELECT c.nama, c.nip,d.nama_jabatan, e.nama_pangkat,e.golongan,e.ruang,g.nip as nip_pejabat,g.nama as nama_pejabat,h.nama_jabatan as jabatan_pejabat, i.nama_pangkat as pangkat_pejabat, i.golongan as golongan_pejabat, i.ruang as ruang_pejabat,
j.nip as nip_pptk,j.nama as nama_pptk,k.nama_jabatan as jabatan_pptk,l.nama_pangkat as pangkat_pptk,l.golongan as golongan_pptk,l.ruang as ruang_pptk,
m.nip as nip_bp,m.nama as nama_bp,n.nama_jabatan as jabatan_bp,o.nama_pangkat as pangkat_bp,o.golongan as golongan_bp,o.ruang as ruang_bp,
				a.kode_skpd,a.no_surat,a.untuk,a.dari,a.ke,a.tgl_berangkat,a.tgl_kembali,a.lama,a.transportasi,a.atas_beban,a.pasal_anggaran,a.keterangan,a.tanggal_surat,a.uang_saku, 
				a.pengikut1,a.pengikut2,a.pengikut3
				from tbl_sppd as a inner join 
				(tbl_sdm as c inner join tbl_jabatan as d on c.kd_jabatan = d.kd_jabatan inner join tbl_pangkat_gol as e on c.kd_pg = e.kd_pg) 
				on a.kd_sdm = c.kd_sdm 
				inner join(tbl_sdm as g inner join tbl_jabatan as h on g.kd_jabatan = h.kd_jabatan inner join tbl_pangkat_gol as i on g.kd_pg = i.kd_pg)on a.pejabat = g.kd_sdm
                inner join(tbl_sdm as j inner join tbl_jabatan as k on j.kd_jabatan = k.kd_jabatan inner join tbl_pangkat_gol as l on j.kd_pg = l.kd_pg)on a.pptk = j.kd_sdm
                 inner join(tbl_sdm as m inner join tbl_jabatan as n on m.kd_jabatan = n.kd_jabatan inner join tbl_pangkat_gol as o on m.kd_pg = o.kd_pg)on a.bendahara_pengeluaran = m.kd_sdm '.$where.' order by tanggal_surat desc');
			$data = $data->result_array();
			return $data;
		}else if($tipe="surat_tugas"){
			$data = $this->db->query('SELECT c.nama, c.nip,d.nama_jabatan, e.nama_pangkat,e.golongan,e.ruang,g.nip as nip_pejabat,g.nama as nama_pejabat,h.nama_jabatan as jabatan_pejabat, i.nama_pangkat as pangkat_pejabat, i.golongan as golongan_pejabat, i.ruang as ruang_pejabat,
  				a.no_surat,a.pengikut1,a.pengikut2,a.pengikut3,a.pembuka_surat,a.dasar,a.tujuan,a.tanggal_surat from tbl_surat_tugas as a inner join (tbl_sdm as c inner join tbl_jabatan as d on c.kd_jabatan = d.kd_jabatan inner join tbl_pangkat_gol as e on c.kd_pg = e.kd_pg) 
  				on a.kd_sdm = c.kd_sdm inner join(tbl_sdm as g inner join tbl_jabatan as h on g.kd_jabatan = h.kd_jabatan inner join tbl_pangkat_gol as i on g.kd_pg = i.kd_pg)on a.pejabat = g.kd_sdm '.$where.' order by tanggal_surat desc
			');
			$data = $data->result_array();
			return $data;
		}
		
	}

	//gak kepake dibawah ini
	public function get_sppd()
	{
		$data = $this->db->query('SELECT c.nama, c.nip,d.nama_jabatan, e.nama_pangkat,e.golongan,e.ruang,g.nip as nip_pejabat,g.nama as nama_pejabat,h.nama_jabatan as jabatan_pejabat, i.nama_pangkat as pangkat_pejabat, i.golongan as golongan_pejabat, i.ruang as ruang_pejabat,
				a.no_surat,a.untuk,a.dari,a.ke,a.tgl_berangkat,a.tgl_kembali,a.lama,a.transportasi,a.atas_beban,a.pasal_anggaran,a.keterangan,a.tanggal_surat,a.uang_saku 
				from tbl_sppd as a inner join 
				(tbl_sdm as c inner join tbl_jabatan as d on c.kd_jabatan = d.kd_jabatan inner join tbl_pangkat_gol as e on c.kd_pg = e.kd_pg) 
				on a.kd_sdm = c.kd_sdm 
				inner join(tbl_sdm as g inner join tbl_jabatan as h on g.kd_jabatan = h.kd_jabatan inner join tbl_pangkat_gol as i on g.kd_pg = i.kd_pg)on a.pejabat = g.kd_sdm '.$where.' order by tanggal_surat desc
		');
		$data = $data->result_array();
		//echo mysql_error();
		//print_r($data);
		return $data;
	}
	public function get_surat_tugas($where='')
	{
		$data = $this->db->query('SELECT c.nama, c.nip,d.nama_jabatan, e.nama_pangkat,e.golongan,e.ruang,g.nip as nip_pejabat,g.nama as nama_pejabat,h.nama_jabatan as jabatan_pejabat, i.nama_pangkat as pangkat_pejabat, i.golongan as golongan_pejabat, i.ruang as ruang_pejabat,
	  			a.no_surat,a.pembuka_surat,a.dasar,a.tujuan
	 	 		from tbl_surat_tugas as a inner join 
	  			(tbl_sdm as c inner join tbl_jabatan as d on c.kd_jabatan = d.kd_jabatan inner join tbl_pangkat_gol as e on c.kd_pg = e.kd_pg) 
	  			on a.kd_sdm = c.kd_sdm 
	  			inner join(tbl_sdm as g inner join tbl_jabatan as h on g.kd_jabatan = h.kd_jabatan inner join tbl_pangkat_gol as i on g.kd_pg = i.kd_pg)on a.pejabat = g.kd_sdm order by tanggal_surat desc
		');
		$data = $data->result_array();
		return $data;
	}
	public function deleteByNoSurat($no_surat){
		$data = $this->db->query("delete from tbl_sppd where no_surat ='$no_surat'").$this->db->query("delete from tbl_surat_tugas where no_surat ='$no_surat'");
		//$this->db->delete('mytable', array('id' => $id)); 
		return $data;
	}

	public function insert($data_st,$data_sppd){
		$this->db->trans_off();
		$this->db->trans_start(TRUE);
			$this->db->insert('tbl_surat_tugas', $data_st);
			$this->db->insert('tbl_sppd', $data_sppd); 
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
		{
			return $data=FALSE;
		}else{
			return $data=TRUE;
		} 
	}

	public function getcountweek($value='')
	{
		$data=$this->db->query('SELECT YEARWEEK(tanggal_surat) AS tahun_minggu,COUNT(*) AS jumlah_mingguan FROM tbl_sppd GROUP BY YEARWEEK(tanggal_surat)');
		return $data->result_array();
	}

	public function getcountmonth($value='')
	{
		$data=$this->db->query("SELECT CONCAT(YEAR(tanggal_surat),'-',MONTH(tanggal_surat)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan
								FROM tbl_sppd GROUP BY YEAR(tanggal_surat),MONTH(tanggal_surat);");
		return $data->result_array();
	}

	public function getcountall($value='')
	{
		$data=$this->db->query("SELECT * FROM tbl_sppd");
		return $data->num_rows();
	}
}