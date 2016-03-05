<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');
	/**
	* 
	*/
	class Tambahanggota extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
		}

		public function index(){

			// $this->load->view('Attendance_view',$data['jTableResult']);
			$this->load->view('header_sidebar');
	        $this->load->view('tambahanggota_view');
			$this->load->view('footer');
		}

		public function deleteantrian()
		{
			$this->load->model('tambahantrian_model');
			$id = $this->input->post('no');

			$result = $this->tambahantrian_model->post_hapus_antrian($id);

			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			print json_encode($jTableResult);

		}

		public function listantrian()
		{
			$this->load->helper('date');
			$date = date('Y-m-d');
			$this->load->model('tambahantrian_model');

			$jtStartIndex = $this->input->get('jtStartIndex'); 
			$jtPageSize = $this->input->get('jtPageSize'); 
			$jtSorting = $this->input->get('jtSorting');

			$all_antrian = $this->tambahantrian_model->get_all_antrian($date);
			$result = $this->tambahantrian_model->get_all_paging_sorting_antrian($date,$jtStartIndex,$jtPageSize,$jtSorting);
			

			$rows = $result->result_array(); 
			$recordCount = $all_antrian->num_rows(); 
			
			$jTableResult = array(); 
			$jTableResult['Result'] = "OK"; 
			$jTableResult['TotalRecordCount'] = $recordCount; 
			$jTableResult['Records'] = $rows; 
			
			print json_encode($jTableResult);
		}
	}
 ?>