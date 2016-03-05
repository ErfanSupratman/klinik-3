<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');
	/**
	* 
	*/
	class Antriandokter extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
		}

		public function index(){
			$this->load->view('header_sidebar');
	        $this->load->view('antriandokter_view');
			$this->load->view('footer');
		}

		public function listantrian()
		{
			$this->load->helper('date');
			$date = date('Y-m-d');
			$this->load->model('antriandokter_model');

			$jtStartIndex = $this->input->get('jtStartIndex'); 
			$jtPageSize = $this->input->get('jtPageSize'); 
			$jtSorting = $this->input->get('jtSorting');

			$all_antrian = $this->antriandokter_model->get_all_antrian($date);
			$result = $this->antriandokter_model->get_all_paging_sorting_antrian($date,$jtStartIndex,$jtPageSize,$jtSorting);
			

			$rows = $result->result_array(); 
			$recordCount = $all_antrian->num_rows(); 
			
			$jTableResult = array(); 
			$jTableResult['Result'] = "OK"; 
			$jTableResult['TotalRecordCount'] = $recordCount; 
			$jTableResult['Records'] = $rows; 
			
			print json_encode($jTableResult);
		}

		// public function prosespasien($id)
		// {
		// 	$this->load->model('antriandokter_model');
		// 	$result = $this->antriandokter_model->make_status_zero($id);

		// 	// $no = $this->antriandokter_model->get_no_rm($id);
		// 	// $rm = $no->row_array();

		// 	// // $url = site_url('prosespasien/index') . "/" . $rm['no_rm']; // append the data I want as a URI segment
  //  //  		// $this->some_helper_function->helper_method($url,'options');

  //  //  		$segments = array('proses', $rm['no_rm']);
		// 	// echo site_url($segments);

		// }
	}
 ?>