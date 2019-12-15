<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {
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
		$this->load->view('nilai_view');
	}

	public function ambilkoreksi($tipetugas){
		echo json_encode($this->subnilai_model
							->getkoreksi($tipetugas)->result());
	}

	public function getkoreksi($tipetugas){
		echo json_encode($this->subnilai_model
							->ambilkoreksi($tipetugas)->result());
	}

	public function getterupdate($tipetugas){
		echo json_encode($this->subnilai_model
							->getterupdate($tipetugas)->result());
	}

	public function getriwayat($nim,$tipetugas){
		echo json_encode($this->subnilai_model
							->ambilriwayat($nim,$tipetugas)->result());
	}

	public function tampilkoreksi($nim,$tipesoal,$idsoal){
		echo json_encode($this->subnilai_model
			->tampilsoalselesai($nim,$tipesoal,$idsoal)->result());
	}

	public function kirimnilai($nim,$tipesoal,$idsoal,$nilai){
		$upd = array(
			"nilai" => $nilai,
			"status" => "selesai"
		);
		$status = $this->subnilai_model->updatenilai($nim,$tipesoal,$idsoal,$upd);
		$status = $this->subnilai_model->updatenilai2($nim,$tipesoal,$idsoal,$upd);
		echo json_encode(array("status" => TRUE));
	}
}
