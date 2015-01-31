<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class date_id {
	function generate ($date){
		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl   = substr($date, 8, 2);
		if($bulan>0){
			$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
			return($result);	
		}else{
			return "";
			//parse error
		}
	}
}