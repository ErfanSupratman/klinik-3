<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');
	/**
	* 
	*/
	class Diagnosa extends CI_Controller
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
	        $this->load->view('diagnosa_view');
			$this->load->view('footer');
		}

		public function listdiagnosa(){
			$this->load->model('diagnosa_model');
	
			$jtStartIndex = $this->input->get('jtStartIndex'); 
			$jtPageSize = $this->input->get('jtPageSize'); 
			$jtSorting = $this->input->get('jtSorting');
	
			// $kode = $this->input->post('kode');
			$nama = $this->input->post('nama');

			$all_diagnosa = $this->diagnosa_model->get_all_diagnosa($nama);
			$result = $this->diagnosa_model->get_all_paging_sorting_diagnosa($nama,$jtStartIndex,$jtPageSize,$jtSorting);

			$rows = $result->result_array(); 
			$recordCount = $all_diagnosa->num_rows(); 

			$jTableResult = array(); 
			$jTableResult['Result'] = "OK"; 
			$jTableResult['TotalRecordCount'] = $recordCount; 
			$jTableResult['Records'] = $rows; 
			
			print json_encode($jTableResult);
		}

		public function creatediagnosa(){
			$this->load->model('diagnosa_model');
			// $kode = $this->input->post('kode_diagnosa');
			$nama = $this->input->post('nama_diagnosa');
			$jenis = $this->input->post('keterangan_diagnosa');

			$result = $this->diagnosa_model->post_create_diagnosa($nama,$jenis);
			$result = $this->diagnosa_model->get_create_diagnosa();
			$rows = $result->result_array();


			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			$jTableResult['Record'] = $rows;
			print json_encode($jTableResult);
		}

		public function updatediagnosa(){
			$this->load->model('diagnosa_model');
			$id = $this->input->post('no');
			// $kode = $this->input->post('kode_barang');
			$nama = $this->input->post('nama_diagnosa');
			$jenis = $this->input->post('keterangan_diagnosa');

			$result = $this->diagnosa_model->post_update_diagnosa($id,$nama,$jenis);

			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			print json_encode($jTableResult);
		}

		

		public function hapusdiagnosa(){
			$this->load->model('diagnosa_model');
			$id = $this->input->post('no_diagnosa');

			$result = $this->diagnosa_model->post_delete_diagnosa($id);

			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			print json_encode($jTableResult);
		}
	}
 ?>