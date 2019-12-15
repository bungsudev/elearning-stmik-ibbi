<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskusi extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masuk'){
				redirect('login');
			}
			$this->load->model("diskusi_model");
			$this->load->helper("security");
		}

	public function index()
	{
		$this->load->view('diskusi_view');
	}

	public function ambildiskusi($prodi,$semester,$matakuliah){
		echo json_encode(
				$this->diskusi_model
					->ambildiskusi($prodi,$semester,$matakuliah)->result());
	}

	public function ambilisi($pertemuan,$kdmk){
		echo json_encode($this->diskusi_model
			->getdiskusi($pertemuan,$kdmk)->result());
	}

	public function ambilkomentar($idmateri){
		echo json_encode($this->diskusi_model
							->ambilkomen($idmateri)->result());
	}

	public function kirimkomen(){
		$data = array(
			"idmateri" => $this->input->post("idmateri"),
			"userid" => $this->input->post("userid"),
			"nama" => $this->input->post("nama"),
			"komentar" => $this->input->post("kirimdiskusi")			
		);
		$status = $this->diskusi_model->createkomen($data);			
		echo json_encode(array("status" => TRUE));
	}

	public function hapuskomen($iddiskusi){
		echo json_encode(array(
			"status" => $this->diskusi_model->deletekomen($iddiskusi)
		));
	}
}
