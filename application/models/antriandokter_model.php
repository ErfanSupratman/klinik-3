<?php 
	/**
	* 
	*/
	class Antriandokter_model extends CI_Model
	{
		function get_all_antrian($date)
		{
			return $this->db->query("SELECT DISTINCT t1.tanggal, t1.no, t1.no_RM, t2.nama, t2.tgl_lahir, t2.alamat, t2.telp FROM pasien t2 INNER JOIN antrian t1 on t1.no_RM = t2.no_RM WHERE t1.status_antrian = 1 AND cast(t1.Tanggal as date) = '".$date."';");
		}

		function get_all_paging_sorting_antrian($date,$jtStartIndex,$jtPageSize,$jtSorting)
		{
			return $this->db->query("SELECT DISTINCT t1.tanggal, t1.no, t1.no_RM, t2.nama, t2.tgl_lahir, t2.alamat, t2.telp FROM pasien t2 INNER JOIN antrian t1 on t1.no_RM = t2.no_RM WHERE t1.status_antrian = 1 AND cast(t1.Tanggal as date) = '".$date."' ORDER BY ".$jtSorting." LIMIT ".$jtStartIndex.",".$jtPageSize.";");
		}

		

		
	}
?>