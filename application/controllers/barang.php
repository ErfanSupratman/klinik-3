<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');
	/**
	* 
	*/
	class Barang extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
		}

		public function index()
		{
			$this->load->view('header_sidebar');
	        $this->load->view('barang_view');
			$this->load->view('footer');
		}

		public function listbarang(){
			$this->load->model('barang_model');
	
			$jtStartIndex = $this->input->get('jtStartIndex'); 
			$jtPageSize = $this->input->get('jtPageSize'); 
			$jtSorting = $this->input->get('jtSorting');
	
			// $kode = $this->input->post('kode');
			$nama = $this->input->post('nama');

			$all_barang = $this->barang_model->get_all_barang($nama);
			$result = $this->barang_model->get_all_paging_sorting_barang($nama,$jtStartIndex,$jtPageSize,$jtSorting);

			$rows = $result->result_array(); 
			$recordCount = $all_barang->num_rows(); 

			$jTableResult = array(); 
			$jTableResult['Result'] = "OK"; 
			$jTableResult['TotalRecordCount'] = $recordCount; 
			$jTableResult['Records'] = $rows; 
			
			print json_encode($jTableResult);
		}

		public function createbarang(){
			$this->load->model('barang_model');
			$id = $this->input->post('no');
			// $kode = $this->input->post('kode_barang');
			$nama = $this->input->post('nama_barang');
			$jenis = $this->input->post('jenis');
			$jumlah = $this->input->post('jumlah');
			$harga = $this->input->post('harga');

			$result = $this->barang_model->post_create_barang($nama,$jenis,$jumlah,$harga);
			$result = $this->barang_model->get_create_barang();
			$rows = $result->result_array();


			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			$jTableResult['Record'] = $rows;
			print json_encode($jTableResult);
		}

		public function updatebarang(){
			$this->load->model('barang_model');
			$id = $this->input->post('no');
			$nama = $this->input->post('nama_barang');
			$jenis = $this->input->post('jenis');
			$jumlah = $this->input->post('jumlah');
			$harga = $this->input->post('harga');

			$result = $this->barang_model->post_update_barang($id,$nama,$jenis,$jumlah,$harga);

			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			print json_encode($jTableResult);
		}

		

		public function hapusbarang(){
			$this->load->model('barang_model');
			$id = $this->input->post('no');

			$result = $this->barang_model->post_delete_barang($id);

			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			print json_encode($jTableResult);
		}
	}
 ?>