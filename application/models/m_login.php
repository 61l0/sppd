<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class M_login extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  
  
  public function ambilPengguna($username, $password,$level=0)
  {
    //$sql = mysql_query("SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'");
    $this->db->select('*');
    $this->db->from('tbl_admin');
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $this->db->where('level', $level);
    $query = $this->db->get();    
    return $query->num_rows();
  }
  
  
  public function dataPengguna($username)
  {
   // select * from tbl_sdm as a inner join tbl_jabatan as b on a.kd_jabatan = b.kd_jabatan inner join tbl_pangkat_gol as c on a.kd_pg = c.kd_pg
   $query =$this->db->query("select * from tbl_admin as a inner join tbl_skpd as b on a.kode_skpd = b.kode_skpd where username = '$username'"); 
   /*$this->db->select('username');
   $this->db->select('nama_admin');
   $this->db->select('kode_skpd');//kode skpd nama skpd dll
   $this->db->where('username', $username);//where pake kode skpd
   $query = $this->db->get('tbl_admin');*/
   
   return $query->row();
  }
  
}  

?>