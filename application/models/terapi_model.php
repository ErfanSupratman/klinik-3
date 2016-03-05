<?php 

	/**
	* 
	*/
	class Terapi_model extends CI_Model
	{
		function get_all_terapi($nama){
			if($nama != NULL){
				return $this->db->query("SELECT * FROM terapi WHERE terapi.nama_terapi LIKE '%".$nama."%';");
			}
			else{
				return $this->db->query("SELECT * FROM terapi;");
			}
		}

		function get_all_paging_sorting_terapi($nama,$jtStartIndex,$jtPageSize,$jtSorting){
			if($nama != NULL){
				return $this->db->query("SELECT * FROM terapi WHERE terapi.nama_terapi LIKE '%".$nama."%' ORDER BY '" . $jtSorting . "' LIMIT " . $jtStartIndex . "," . $jtPageSize . ";");
			}
			else{
				return $this->db->query("SELECT * FROM terapi ORDER BY '" . $jtSorting . "' LIMIT " . $jtStartIndex . "," . $jtPageSize . ";");
			}
		}

		function post_update_terapi($id,$nama,$ket,$harga){
			return $this->db->query("UPDATE terapi SET terapi.nama_terapi = '".$nama."', terapi.keterangan_terapi = '".$ket."', terapi.harga_terapi = '".$harga."' WHERE terapi.no_terapi = '".$id."';");
		}

		function post_delete_terapi($id){
			return $this->db->query("DELETE FROM terapi WHERE terapi.no_terapi = '".$id."'; ");	
		}

		function post_create_terapi($nama,$ket, $harga){
			return $this->db->query("INSERT INTO terapi(nama_terapi, keterangan_terapi, harga_terapi) VALUES ('".$nama."','".$ket."','".$harga."');");
		}
		
		function get_create_terapi(){
			return $this->db->query("SELECT * FROM terapi WHERE terapi.no_terapi = LAST_INSERT_ID();");
		}
	}

 ?>