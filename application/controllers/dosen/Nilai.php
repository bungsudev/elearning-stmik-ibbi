<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masukdsn'){
				redirect('login');
			}
			$this->load->model("dosen/subnilai_model");
			$this->load->helper("security");
		}


	public function index()
	{
		$this->load->view('dosen/nilai_view');
	}

	public function ambilkoreksi($tipetugas){  
		echo json_encode($this->subnilai_model
							->getkoreksi($tipetugas,$this->session->userdata('ses_kodemk'))->result());
	}

	public function ambilkoreksikel(){  
		echo json_encode($this->subnilai_model
							->getkoreksikel($this->session->userdata('ses_kodemk'))->result());
	}
 
	public function getkoreksi($tipetugas){
		echo json_encode($this->subnilai_model
							->ambilkoreksi($tipetugas)->result());
	}

	public function getterupdate($tipetugas){
		echo json_encode($this->subnilai_model
							->getterupdate($tipetugas,$this->session->userdata('ses_kodemk'))->result());
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
		$this->subnilai_model->updatenilai($nim,$tipesoal,$idsoal,$upd);
		$this->subnilai_model->updatenilai2($nim,$tipesoal,$idsoal,$upd);
		echo json_encode(array("berhasil" => TRUE));
	}

	public function kirimnilaikel($nim,$tipesoal,$idsoal,$nilai){
		$qry = $this->db->query("select kelompok from tblabsensi where nim = '$nim'");
		foreach ($qry->result() as $item) {
			$kel = $item->kelompok;
		}
		
		$upd = array(
			"nilai" => $nilai,
			"status" => "selesai"
		);
		$this->subnilai_model->updatenilaikel($kel,$tipesoal,$idsoal,$upd);
		$this->subnilai_model->updatenilaikel2($kel,$tipesoal,$idsoal,$upd);
		echo json_encode(array("berhasil" => TRUE));
	}
}
