<?php 
	/**
	* 
	*/
	class Tambahhistory extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
	    	$this->load->library('form_validation');
		}

		function index($id=NULL){
			$this->load->view('header_sidebar');
	        $this->load->view('tambahhistory_view',$id);
			$this->load->view('footer');
		}
	}
 ?>