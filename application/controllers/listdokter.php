<?php 
	/**
	* 
	*/
	class Listdokter extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
		}

		public function index(){
			$this->load->view('header_sidebar');
	        $this->load->view('listdokter_view');
			$this->load->view('footer');
		}

		public function listpasien()
		{
			$this->load->model('listdokter_model');

			$jtStartIndex = $this->input->get('jtStartIndex'); 
			$jtPageSize = $this->input->get('jtPageSize'); 
			$jtSorting = $this->input->get('jtSorting');

			$rm = /*"1111";*/$this->input->post('rm');
			$nama = /*"1111";*/$this->input->post('nama');

			$all_antrian = $this->listdokter_model->get_all_pasien($rm,$nama);
			$result = $this->listdokter_model->get_all_paging_sorting_pasien($rm,$nama,$jtStartIndex,$jtPageSize,$jtSorting);
			

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