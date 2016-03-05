<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');
	/**
	* 
	*/
	class Terapi extends CI_Controller
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
	        $this->load->view('terapi_view');
			$this->load->view('footer');
		}

		public function listterapi(){
			$this->load->model('terapi_model');
	
			$jtStartIndex = $this->input->get('jtStartIndex'); 
			$jtPageSize = $this->input->get('jtPageSize'); 
			$jtSorting = $this->input->get('jtSorting');
	
			// $kode = $this->input->post('kode');
			$nama = $this->input->post('nama');

			$all_terapi = $this->terapi_model->get_all_terapi($nama);
			$result = $this->terapi_model->get_all_paging_sorting_terapi($nama,$jtStartIndex,$jtPageSize,$jtSorting);

			$rows = $result->result_array(); 
			$recordCount = $all_terapi->num_rows(); 

			$jTableResult = array(); 
			$jTableResult['Result'] = "OK"; 
			$jTableResult['TotalRecordCount'] = $recordCount; 
			$jTableResult['Records'] = $rows; 
			
			print json_encode($jTableResult);
		}

		public function createterapi(){
			$this->load->model('terapi_model');
			// $kode = $this->input->post('kode_diagnosa');
			$nama = $this->input->post('nama_terapi');
			$jenis = $this->input->post('keterangan_terapi');
			$harga = $this->input->post('harga_terapi');

			$result = $this->terapi_model->post_create_terapi($nama,$jenis,$harga);
			$result = $this->terapi_model->get_create_terapi();
			$rows = $result->result_array();


			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			$jTableResult['Record'] = $rows;
			print json_encode($jTableResult);
		}

		public function updateterapi(){
			$this->load->model('terapi_model');
			$id = $this->input->post('no');
			// $kode = $this->input->post('kode_barang');
			$nama = $this->input->post('nama_terapi');
			$jenis = $this->input->post('keterangan_terapi');
			$harga = $this->input->post('harga_terapi');

			$result = $this->terapi_model->post_update_terapi($id,$nama,$jenis,$harga);

			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			print json_encode($jTableResult);
		}

		

		public function hapusterapi(){
			$this->load->model('terapi_model');
			$id = $this->input->post('no_terapi');

			$result = $this->terapi_model->post_delete_terapi($id);

			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			print json_encode($jTableResult);
		}
	}
 ?>