<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masukmhs'){
        		redirect('login');
			}
			$this->load->model("home_model");
			$this->load->helper("security");
		}
		  
	public function index()
	{
		$this->load->view('hmahasiswa/home_view');
	}
	public function data(){
		echo json_encode($this->home_model->ambil()->result());
	}
}
