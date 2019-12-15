<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soalterkirim extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masukdsn'){
				redirect('login');
			}
			$this->load->model("soalterkirim_model");
			$this->load->helper("security");
		}

	public function index()
	{
		$this->load->view('dosen/pertanyaan/soalterkirim_view');
	}

	public function data(){
		echo json_encode($this->soalterkirim_model
							->ambilriwayat()->result()); 
	}
	
	public function datafil($kdmk){
		echo json_encode($this->soalterkirim_model
							->ambilriwayatfil($kdmk)->result()); 
	}

	public function bacaesai($idsoal){
		echo json_encode($this->banksoal_model
			->getesai($idsoal)->result());
	}

	public function bacapilgan($idsoal){
		echo json_encode($this->banksoal_model
			->getpilgan($idsoal)->result());
	}
}
