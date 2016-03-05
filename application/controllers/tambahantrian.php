<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Tambahantrian extends CI_Controller
{

	public function __construct(){
	    parent::__construct();
	    // $this->load->library('pdf');

	    $this->load->helper(array('form', 'url'));

	    $this->load->library('form_validation');
	
	}
	

	public function index(){

			// $this->load->view('Attendance_view',$data['jTableResult']);
			$this->load->view('header_sidebar');
	        $this->load->view('tambahantrian_view');
			$this->load->view('footer');
	}

	public function listpasien(){
		$this->load->model('tambahantrian_model');
		
		$jtStartIndex = $this->input->get('jtStartIndex'); 
		$jtPageSize = $this->input->get('jtPageSize'); 
		$jtSorting = $this->input->get('jtSorting'); 
		
		$rm = /*"1111";*/$this->input->post('rm');
		$nama = /*"1111";*/$this->input->post('nama');
		
		$all_pasien = $this->tambahantrian_model->get_all_pasien($rm,$nama);
		$result = $this->tambahantrian_model->get_all_paging_sorting_pasien($rm,$nama,$jtStartIndex,$jtPageSize,$jtSorting);
		// get_all_paging_sorting_pasien

		$rows = $result->result_array(); 
		$recordCount = $all_pasien->num_rows(); 
		
		$jTableResult = array(); 
		$jTableResult['Result'] = "OK"; 
		$jTableResult['TotalRecordCount'] = $recordCount; 
		$jTableResult['Records'] = $rows; 
		
		print json_encode($jTableResult);	
		
	}

	public function updatepasien()
	{
		$this->load->model('tambahantrian_model');
		$id = $this->input->post('nomer');
		$nama_pasien = $this->input->post('nama');
		$tanggal_lahir = $this->input->post('tgl_lahir');
		$alamat_pasien = $this->input->post('alamat');
		$kontak_pasien = $this->input->post('telp');

		$result = $this->tambahantrian_model->post_update_pasien($id,$nama_pasien,$tanggal_lahir,$alamat_pasien,$kontak_pasien);
		
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	public function deletepasien(){
		$this->load->model('tambahantrian_model');
		$id = $this->input->post('nomer');

		$result = $this->tambahantrian_model->post_hapus_pasien($id);
		
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);

	}

	public function createpasien(){
		$this->load->model('tambahantrian_model');
		// print_r("adadasdasdad");
		$nama_pasien = $this->input->post('nama');
		$tanggal_lahir = $this->input->post('tgl_lahir');
		$alamat_pasien = $this->input->post('alamat');
		$kontak_pasien = $this->input->post('telp');
		$this->load->helper('date');
		$date = date('y');
		$max = $this->db->query("SELECT MAX(nomer) as nomer from pasien");

		$n = $max->row_array();


		$nom = str_pad($n['nomer'], 4, "0", STR_PAD_LEFT);
		$array = array($date, $nom);
		$rm = implode(".", $array);

		$result = $this->tambahantrian_model->post_create_pasien($rm, $nama_pasien, $tanggal_lahir, $alamat_pasien, $kontak_pasien);
		
		$result = $this->tambahantrian_model->get_create_pasien();
		$rows = $result->result_array();

		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $rows;
		print json_encode($jTableResult);
	}

	public function tambah($rm)
	{
		$this->load->model('tambahantrian_model');
		// $id_kantor = $this->input->post('no_RM');
		// echo $id_kantor;
		$result = $this->tambahantrian_model->post_tambah($rm);

		$this->load->view('header_sidebar');
	    $this->load->view('tambahantrian_view');
		$this->load->view('footer');
	}



}

 ?>