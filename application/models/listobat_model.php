<?php 
	/**
	* 
	*/
	class Listobat_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');

		}

		function get_data_periksa($id){
			return $this->db->query("SELECT DISTINCT t1.tanggal_periksa, t1.no_RM, t2.nama FROM hasil_periksa t1 INNER JOIN pasien t2 on t2.no_RM=t1.no_RM WHERE t1.no = '".$id."';");
		}

		function get_all_barang($no){
			return $this->db->query("SELECT DISTINCT t1.id_list_barang, t1.id_hasil_periksa, t1.id_barang, t1.jumlah_barang1, t1.jumlah_barang2 FROM list_barang t1 INNER JOIN hasil_periksa t2 on t1.id_hasil_periksa = t2.no WHERE t1.id_hasil_periksa = '".$no."';");
		}

		function get_all_paging_sorting_barang($no,$jtStartIndex,$jtPageSize,$jtSorting){
			return $this->db->query("SELECT DISTINCT t1.id_list_barang, t1.id_hasil_periksa, t1.id_barang, t1.jumlah_barang1, t1.jumlah_barang2 FROM list_barang t1 INNER JOIN hasil_periksa t2 on t1.id_hasil_periksa = t2.no WHERE t1.id_hasil_periksa = '".$no."' ORDER BY '" . $jtSorting . "' LIMIT " . $jtStartIndex . "," . $jtPageSize . ";");
		}

		function get_barang()
		{
			return $this->db->query("SELECT DISTINCT barang.nama_barang AS DisplayText, barang.no AS Value FROM barang;");
		}

		function post_create_listobat($id,$barang,$jum1){
			return $this->db->query("INSERT INTO list_barang(id_hasil_periksa,id_barang, jumlah_barang1) VALUES('".$id."','".$barang."','".$jum1."');");	
		}

		function get_create_listobat(){
			return $this->db->query("SELECT * FROM list_barang WHERE list_barang.id_list_barang = LAST_INSERT_ID();");
		}
	}
 ?>