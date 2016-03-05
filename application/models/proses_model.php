<?php 
	/**
	* 
	*/
	class Proses_model extends CI_Model
	{
		
		function make_status_zero($id){
			return $this->db->query("UPDATE antrian SET antrian.status_antrian = 0 WHERE antrian.no = '".$id."';");
		}

		
		function get_data_periksa($id){
			return $this->db->query("SELECT DISTINCT t1.tanggal_periksa, t1.no_RM, t2.nama FROM hasil_periksa t1 INNER JOIN pasien t2 on t2.no_RM=t1.no_RM WHERE t1.no = '".$id."';");
		}

		function get_no_rm($id){
			return $this->db->query("SELECT no_RM FROM antrian WHERE antrian.no = '".$id."';");
		}

		function get_data_pasien($id){
			return $this->db->query("SELECT * FROM pasien WHERE pasien.no_RM = '".$id."';");
		}

		function get_nosa()
		{
			return $this->db->query("SELECT DISTINCT diagnosa.nama_diagnosa AS DisplayText, diagnosa.no_diagnosa AS Value FROM diagnosa;");
		}

		function get_api()
		{
			return $this->db->query("SELECT DISTINCT terapi.nama_terapi AS DisplayText, terapi.no_terapi AS Value FROM terapi;");
		}

		function get_all_proses($id){
			return $this->db->query("SELECT * FROM hasil_periksa WHERE hasil_periksa.no_RM = '".$id."';");
		}

		function get_all_paging_sorting_proses($id,$jtStartIndex,$jtPageSize,$jtSorting){
			return $this->db->query("SELECT * FROM hasil_periksa WHERE hasil_periksa.no_RM = '".$id."' ORDER BY " . $jtSorting . " LIMIT " . $jtStartIndex . "," . $jtPageSize . ";");
		}

		function post_create_proses($rm,$date,$haid,$diag,$tera,$ket,$stat){
			return $this->db->query("INSERT INTO hasil_periksa(no_RM,tanggal_periksa, haid,no_diagnosa,no_terapi, keterangan, status_obat) VALUES('".$rm."','".$date."','".$haid."','".$diag."','".$tera."','".$ket."','".$stat."')");	
		}

		function get_create_proses(){
			return $this->db->query("SELECT * FROM hasil_periksa WHERE hasil_periksa.no = LAST_INSERT_ID();");
		}

		function post_update_proses($no,$haid,$diag,$tera,$ket){
			return $this->db->query("UPDATE hasil_periksa SET hasil_periksa.haid = '".$haid."', hasil_periksa.no_diagnosa = '".$diag."', hasil_periksa.no_terapi = '".$tera."', hasil_periksa.keterangan = '".$ket."' WHERE hasil_periksa.no = '".$no."';");
		}

		function post_delete_proses($id){
			return $this->db->query("DELETE FROM hasil_periksa WHERE hasil_periksa.no = '".$id."'; ");	
		}
	}
 ?>