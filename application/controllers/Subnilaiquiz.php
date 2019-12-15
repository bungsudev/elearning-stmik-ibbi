<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subnilaiquiz extends CI_Controller {

	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masuk'){
				redirect('login');
			}
			$this->load->model("subnilai_model");
			$this->load->helper("security");
		}

	public function index()
	{
		$this->load->view('subnilaiquiz_view');
	}

	public function ambilkoreksi($tipetugas){
		echo json_encode($this->subnilai_model
							->getkoreksi($tipetugas)->result());
	}
}

