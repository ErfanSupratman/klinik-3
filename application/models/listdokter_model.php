<?php 
	/**
	* 
	*/
	class Listdokter_model extends CI_Model
	{
		
		function get_all_pasien($rm,$nama)
		{
			if($rm == NULL && $nama == NULL){
				return $this->db->query("SELECT * FROM pasien WHERE pasien.status = 1;");
			}
			else if($rm == NULL){
				return $this->db->query("SELECT * FROM pasien WHERE pasien.status = 1 AND pasien.nama LIKE '%".$nama."%';");
			}
			else if($nama == NULL){
				return $this->db->query("SELECT * FROM pasien WHERE pasien.status = 1 AND pasien.no_RM LIKE '%".$rm."%';");
			}
			else{
				return $this->db->query("SELECT * FROM pasien WHERE pasien.status = 1 AND pasien.no_RM LIKE '%".$rm."%' AND pasien.nama LIKE '%".$nama."%';");
			}
			
		}

		function get_all_paging_sorting_pasien($rm,$nama,$jtStartIndex,$jtPageSize,$jtSorting)
		{
			if($rm == NULL && $nama == NULL){
				return $this->db->query("SELECT * FROM pasien WHERE pasien.status = 1 ORDER BY " . $jtSorting . " LIMIT " . $jtStartIndex . "," . $jtPageSize . ";");
			}
			else if($rm == NULL){
				return $this->db->query("SELECT * FROM pasien WHERE pasien.status = 1 AND pasien.nama LIKE '%".$nama."%' ORDER BY " . $jtSorting . " LIMIT " . $jtStartIndex . "," . $jtPageSize . ";");
			}
			else if($nama == NULL){
				return $this->db->query("SELECT * FROM pasien WHERE pasien.status = 1 AND pasien.no_RM LIKE '%".$rm."%' ORDER BY " . $jtSorting . " LIMIT " . $jtStartIndex . "," . $jtPageSize . ";");
			}
			
			else{
				return $this->db->query("SELECT * FROM pasien WHERE pasien.status = 1 AND pasien.no_RM LIKE '%".$rm."%' AND pasien.nama LIKE '%".$nama."%' ORDER BY " . $jtSorting . " LIMIT " . $jtStartIndex . "," . $jtPageSize . ";");
			}
		}
	}
 ?>