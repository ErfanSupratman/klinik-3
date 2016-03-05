<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	date_default_timezone_set('Asia/Jakarta');

	/**
	* 
	*/
	class Proses extends CI_Controller
	{
		public $nomer_RM;
		public $id_antri;
	
		public function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
	    	
		}

		public function get_diagnosa()
		{
			$this->load->model('proses_model');
			$result = $this->proses_model->get_nosa();
			$rows = $result->result_array();

			$jTableResult = array(); 
			$jTableResult['Result'] = "OK"; 
			$jTableResult['Options'] = $rows; 
			print json_encode($jTableResult);
		}

		public function get_terapi()
		{
			$this->load->model('proses_model');
			$result = $this->proses_model->get_api();
			$rows = $result->result_array();

			$jTableResult = array(); 
			$jTableResult['Result'] = "OK"; 
			$jTableResult['Options'] = $rows; 
			print json_encode($jTableResult);
		}

		public function index($data){
			$this->load->view('header_sidebar');
	        $this->load->view('proses_view',$data);
			$this->load->view('footer');
		}

		public function prosespasien($id = NULL){
			$this->load->model('proses_model');
			// $this->id_antri = $id;
			// $no = $this->proses_model->get_no_rm($this->id_antri);
			// $rm = $no->row_array();
			// $this->nomer_RM = $rm['no_RM'];
			
			$biodata = $this->proses_model->get_data_pasien($id );
			$bio = $biodata->row_array();
			
			$birthDate = $bio['tgl_lahir'];
			$birthDate = explode("-", $birthDate);
 		  	$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")? ((date("Y") - $birthDate[0]) - 1): (date("Y") - $birthDate[0]));
		 
			$data = array(
				'no_rm' => $bio['no_RM'],
				'nama' => $bio['nama'],
				'alamat' => $bio['alamat'],
				'umur' => $age
				);


			$this->index($data);
						
		}

		

		public function listhistory($id = NULL){
			$this->load->model('proses_model');
			$jtStartIndex = $this->input->get('jtStartIndex'); 
			$jtPageSize = $this->input->get('jtPageSize'); 
			$jtSorting = $this->input->get('jtSorting');
			// $kode = $this->input->post('kode');
			
			$all_proses = $this->proses_model->get_all_proses($id);
			$result = $this->proses_model->get_all_paging_sorting_proses($id,$jtStartIndex,$jtPageSize,$jtSorting);

			$rows = $result->result_array(); 
			$recordCount = $all_proses->num_rows(); 

			$jTableResult = array(); 
			$jTableResult['Result'] = "OK"; 
			$jTableResult['TotalRecordCount'] = $recordCount; 
			$jTableResult['Records'] = $rows; 
			
			print json_encode($jTableResult);
		}

		public function createhistory($rm = NULL){
			$this->load->helper('date');
			$date = date('Y-m-d');
			$this->load->model('proses_model');
			// $kode = $this->input->post('kode_barang');
			$haid = $this->input->post('haid');
			$diag = $this->input->post('no_diagnosa');
			$tera = $this->input->post('no_terapi');
			$status = $this->input->post('status_obat');
			$ket = $this->input->post('keterangan');

			$result = $this->proses_model->post_create_proses($rm,$date,$haid,$diag,$tera,$ket,$status);
			
			$result = $this->proses_model->get_create_proses();
			$rows = $result->result_array();

			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			$jTableResult['Record'] = $rows;

			print json_encode($jTableResult);
			

		}

	
		public function updatehistory(){
			$this->load->model('proses_model');
			$no = $this->input->post('no');
			$haid = $this->input->post('haid');
			$diag = $this->input->post('no_diagnosa');
			$tera = $this->input->post('no_terapi');
			// $status = $this->input->post('status_obat');
			$ket = $this->input->post('keterangan');

			$result = $this->proses_model->post_update_proses($no,$haid,$diag,$tera,$ket);

			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			print json_encode($jTableResult);

		}

		public function hapushistory(){
			$this->load->model('proses_model');
			$id = $this->input->post('no');

			$result = $this->proses_model->post_delete_proses($id);

			$jTableResult = array();
			$jTableResult['Result'] = "OK";
			print json_encode($jTableResult);
		}
	}
 ?>