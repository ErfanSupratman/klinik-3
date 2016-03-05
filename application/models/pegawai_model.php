<?php
class Pegawai_model extends CI_Model
{
	function get_all_pegawai()
	{ 
		return $this->db->query("SELECT pegawai.NIK, pegawai.nama_pegawai, pegawai.jabatan, pegawai.alamat_pegawai FROM pegawai WHERE pegawai.aktif = 1"); 
	}

	function get_all_paging_sorting_pegawai($jtStartIndex,$jtPageSize,$jtSorting)
	{	
		return $this->db->query("SELECT pegawai.NIK, pegawai.nama_pegawai, pegawai.jabatan, pegawai.alamat_pegawai FROM pegawai WHERE pegawai.aktif = 1 ORDER BY " . $jtSorting . " LIMIT " . $jtStartIndex . "," . $jtPageSize . ";"); 
	} 

	function post_update_pegawai($NIK,$nama_pegawai,$jabatan,$alamat_pegawai)
	{
		return $this->db->query("UPDATE pegawai SET pegawai.nama_pegawai = '".$nama_pegawai."', pegawai.jabatan = '". $jabatan."', pegawai.alamat_pegawai = '".$alamat_pegawai."' WHERE pegawai.NIK = '".$NIK."';");
	}

	function post_nonaktif_pegawai($NIK)
	{
		return $this->db->query("UPDATE pegawai SET pegawai.aktif = 0 WHERE pegawai.NIK = '".$NIK."';");
	}

	function get_all_pegawai_nonaktif()
	{ 
		return $this->db->query("SELECT pegawai.NIK, pegawai.nama_pegawai, pegawai.jabatan, pegawai.alamat_pegawai FROM pegawai WHERE pegawai.aktif = 0"); 
	}

	function get_all_paging_sorting_pegawai_nonaktif($jtStartIndex,$jtPageSize,$jtSorting)
	{	
		return $this->db->query("SELECT pegawai.NIK, pegawai.nama_pegawai, pegawai.jabatan, pegawai.alamat_pegawai FROM pegawai WHERE pegawai.aktif = 0 ORDER BY " . $jtSorting . " LIMIT " . $jtStartIndex . "," . $jtPageSize . ";"); 
	} 

	function post_aktif_pegawai($NIK)
	{
		return $this->db->query("UPDATE pegawai SET pegawai.aktif = 1 WHERE pegawai.NIK = '".$NIK."';");
	}

	function post_reset_imei($NIK)
	{
		return $this->db->query("UPDATE pegawai SET pegawai.imei = '1111' WHERE pegawai.NIK = '".$NIK."';");
	}
}
?>