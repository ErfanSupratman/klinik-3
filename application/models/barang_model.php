<?php 

	/**
	* 
	*/
	class Barang_model extends CI_Model
	{
		function get_all_barang($nama){
			if($nama == NULL){
				return $this->db->query("SELECT * FROM barang;");
			}
			else{
				return $this->db->query("SELECT * FROM barang WHERE barang.nama_barang LIKE '%".$nama."%';");
			}
		}

		function get_all_paging_sorting_barang($nama,$jtStartIndex,$jtPageSize,$jtSorting){
			if($nama == NULL){
				return $this->db->query("SELECT * FROM barang ORDER BY " . $jtSorting . " LIMIT " . $jtStartIndex . "," . $jtPageSize . ";");
			}
			else{
				return $this->db->query("SELECT * FROM barang WHERE barang.nama_barang LIKE '%".$nama."%' ORDER BY " . $jtSorting . " LIMIT " . $jtStartIndex . "," . $jtPageSize . ";");
			}
		}

		function post_update_barang($id,$nama,$jenis,$jumlah,$harga){
			return $this->db->query("UPDATE barang SET barang.nama_barang = '".$nama."', barang.jenis = '".$jenis."', barang.jumlah = '".$jumlah."', barang.harga = '".$harga."' WHERE barang.no = '".$id."';");
		}

		function post_delete_barang($id){
			return $this->db->query("DELETE FROM barang WHERE barang.no = '".$id."'; ");	
		}

		function post_create_barang($nama,$jenis,$jumlah,$harga){
			return $this->db->query("INSERT INTO barang(nama_barang, jenis, jumlah, harga) VALUES ('".$nama."','".$jenis."','".$jumlah."','".$harga."');");	
		}
		
		function get_create_barang(){
			return $this->db->query("SELECT * FROM barang WHERE barang.no = LAST_INSERT_ID();");
		}
	}

 ?>