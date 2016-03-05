<?php 
	/**
	* 
	*/
	class Listobat extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');

		}

		public function index($data){
			$this->load->view('header_sidebar');
	        $this->load->view('listobat_view',$data);
			$this->load->view('footer');
		}

		public function lihatobat($id=NULL){
			$this->load->model('listobat_model');
			$data=$this->listobat_model->get_data_periksa($id);
			$data=$data->row_array();
			$sent = array(
				'tanggal_periksa' => $data['tanggal_periksa'],
				'no_RM' => $data['no_RM'],
				'nama' => $data['nama'],
				'nomor' => $id
				);
			$this->index($sent);
		}

		public function list_barang($no = NULL){
			$this->load->model('listobat_model');
			$jtStartIndex = $this->input->get('jtStartIndex'); 
			$jtPageSize = $this->input->get('jtPageSize'); 
			$jtSorting = $this->input->get('jtSorting');
			// $kode = $this->input->post('kode');
			
			$all_barang = $this->listobat_model->get_all_barang($no);
			$result = $this->listobat_model->get_all_paging_sorting_barang($no,$jtStartIndex,$jtPageSize,$jtSorting);

			$rows = $result->result_array(); 
			$recordCount = $all_barang->num_rows(); 

			$jTableResult = array(); 
			$jTableResult['Result'] = "OK"; 
			$jTableResult['TotalRecordCount'] = $recordCount; 
			$jTableResult['Records'] = $rows; 
			
			print json_encode($jTableResult);
		}

		public function get_barang()
		{
			$this->load->model('listobat_model');
			$result = $this->listobat_model->get_barang();
			$rows = $result->result_array();

			$jTableResult = array(); 
			$jTableResult['Result'] = "OK"; 
			$jTableResult['Options'] = $rows; 
			print json_encode($jTableResult);
		}

		public function create_barang($id = NULL){
			$this->load->model('listobat_model');
			$barang = $this->input->post('id_barang');
			$jum1 = $this->input->post('jumlah_barang1');

			$result = $this->listobat_model->post_create_listobat($id,$barang,$jum1);
			
			$result = $this->listobat_model->get_create_listobat();
			$rows = $result->result_array();

			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			$jTableResult['Record'] = $rows;

			print json_encode($jTableResult);
		}

	}
 ?>