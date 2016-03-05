<?php 

	/**
	* 
	*/
	class Diagnosa_model extends CI_Model
	{
		function get_all_diagnosa($nama){
			if($nama != NULL){
				return $this->db->query("SELECT * FROM diagnosa WHERE diagnosa.nama_diagnosa LIKE '%".$nama."%';");
			}
			else{
				return $this->db->query("SELECT * FROM diagnosa;");
			}
		}

		function get_all_paging_sorting_diagnosa($nama,$jtStartIndex,$jtPageSize,$jtSorting){
			if($nama != NULL){
				return $this->db->query("SELECT * FROM diagnosa WHERE diagnosa.nama_diagnosa LIKE '%".$nama."%' ORDER BY '" . $jtSorting . "' LIMIT " . $jtStartIndex . "," . $jtPageSize . ";");
			}
			else{
				return $this->db->query("SELECT * FROM diagnosa ORDER BY '" . $jtSorting . "' LIMIT " . $jtStartIndex . "," . $jtPageSize . ";");
			}
		}

		function post_update_diagnosa($id,$nama,$ket){
			return $this->db->query("UPDATE diagnosa SET diagnosa.nama_diagnosa = '".$nama."', diagnosa.keterangan_diagnosa = '".$ket."' WHERE diagnosa.no_diagnosa = '".$id."';");
		}

		function post_delete_diagnosa($id){
			return $this->db->query("DELETE FROM diagnosa WHERE diagnosa.no_diagnosa = '".$id."'; ");	
		}

		function post_create_diagnosa($nama,$ket){
			return $this->db->query("INSERT INTO diagnosa(nama_diagnosa, keterangan_diagnosa) VALUES ('".$nama."','".$ket."');");
		}
		
		function get_create_diagnosa(){
			return $this->db->query("SELECT * FROM diagnosa WHERE diagnosa.no_diagnosa = LAST_INSERT_ID();");
		}
	}

 ?>