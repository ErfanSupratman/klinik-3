<?php 
	/**
	* 
	*/
	Class Tambahantrian_model extends CI_Model
	{
		
		
		function get_all_pasien($rm,$nama)
		{
			// return $this->db->query("SELECT * FROM pasien;");
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

		function get_all_antrian($date)
		{
			return $this->db->query("SELECT DISTINCT t1.tanggal, t1.no, t1.no_RM, t2.nama, t2.tgl_lahir, t2.alamat, t2.telp FROM pasien t2 INNER JOIN antrian t1 on t1.no_RM = t2.no_RM WHERE t1.status_antrian = 1 AND cast(t1.Tanggal as date) = '".$date."';");
		}

		function get_all_paging_sorting_antrian($date,$jtStartIndex,$jtPageSize,$jtSorting)
		{
			return $this->db->query("SELECT DISTINCT t1.tanggal, t1.no, t1.no_RM, t2.nama, t2.tgl_lahir, t2.alamat, t2.telp FROM pasien t2 INNER JOIN antrian t1 on t1.no_RM = t2.no_RM WHERE t1.status_antrian = 1 AND cast(t1.Tanggal as date) = '".$date."' ORDER BY ".$jtSorting." LIMIT ".$jtStartIndex.",".$jtPageSize.";");
		}

		function get_all_paging_sorting_pasien($rm,$nama,$jtStartIndex,$jtPageSize,$jtSorting)
		{ 
	    	// return $this->db->query("SELECT * FROM pasien ORDER BY ".$jtSorting." LIMIT ".$jtStartIndex.",".$jtPageSize.";"); 
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

	 	function post_create_pasien($rm, $nama_pasien, $tanggal_lahir, $alamat_pasien, $kontak_pasien){
	 		return $this->db->query("INSERT INTO pasien(no_RM, nama, tgl_lahir,alamat, telp) VALUES('".$rm."','".$nama_pasien."','".$tanggal_lahir."','".$alamat_pasien."','".$kontak_pasien."');");
	 	}

	 	// function get_create_pasien(){
	 	// 	return $this->db->query("SELECT * FROM pasien WHERE pasien.nomer = LAST_INSERT_ID();");	
	 	// }

	 	function post_tambah($rm)
		{
			return $this->db->query(" INSERT INTO antrian(no_RM) VALUES('".$rm."');");
		}

		function post_update_pasien($id,$nama_pasien,$tanggal_lahir,$alamat_pasien,$kontak_pasien)
		{
			return $this->db->query("UPDATE pasien SET pasien.nama = '".$nama_pasien."', pasien.tgl_lahir = '".$tanggal_lahir."', pasien.alamat = '".$alamat_pasien."', pasien.telp = '".$kontak_pasien."' WHERE pasien.nomer = '".$id."';");
		}

		function get_last_pasien(){
			// return $this->db->query("SELECT * FROM kantor WHERE kantor.id_kantor = LAST_INSERT_ID();");
			return $this->db->query("SELECT pasien.no_RM from pasien WHERE pasien.nomer = LAST_INSERT_ID();");
		}

		function get_create_pasien()
		{
			return $this->db->query("SELECT pasien.nama, pasien.no_RM, pasien.alamat, pasien.tgl_lahir, pasien.telp FROM pasien WHERE pasien.nomer = LAST_INSERT_ID();");
		}

		function post_hapus_pasien($id)
		{
			return $this->db->query("UPDATE pasien SET pasien.status = 0 WHERE pasien.nomer = '".$id."';");
		}

		function post_hapus_antrian($id)
		{
			return $this->db->query("DELETE FROM antrian WHERE antrian.No = '".$id."';");
		}
	}
 ?>