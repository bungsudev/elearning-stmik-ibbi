<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sublihatsoal extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masuk'){
				redirect('login');
			}
			$this->load->model("absensi_model");
			$this->load->helper("security");
		}


	public function index()
	{
		$this->load->view('sublihatsoal_view');
	}
}

