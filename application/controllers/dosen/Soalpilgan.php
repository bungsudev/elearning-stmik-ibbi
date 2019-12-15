<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soalpilgan extends CI_Controller {

	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masukdsn'){
				redirect('login');
			}
			$this->load->model("pertanyaanpil_model");
			$this->load->helper("security");
		}

	public function index()
	{
		$this->load->view('dosen/pertanyaan/soalpilgan_view');
	}
 
	public function kirimsoal(){
		if($this->_validate2()){
			$mhs = json_encode($this->pertanyaanpil_model->getmahasiswa($this->input->post("semesterses"),$this->input->post("prodises"))->result());
			$temp = count($this->pertanyaanpil_model->getmahasiswa($this->input->post("semesterses"),$this->input->post("prodises"))->result());
			$data1 = json_decode($mhs, TRUE);
			for ($i=0; $i < $temp ; $i++) { 
				echo "<br>",$data1[$i]['nim'];
				echo "<br>",$data1[$i]['namamhs'];
				$data = array(
					"idsoalriw" => $this->input->post("idsoalpil"),
					"tipesoal" => ("p"),
					"kodemk" => $this->input->post("kodemkses"),
					"nim" => $data1[$i]['nim'],
					"namamhs" => $data1[$i]['namamhs'],
					"tipetugas" => $this->input->post("tipetugas"),
					"prodi" => $this->input->post("prodises"),
					"semester" => $this->input->post("semesterses"),
					"status" => ("belum"),
					"tanggal" => $this->input->post("tanggal"),
					"absensike" => $this->input->post("noabsen")
				);
				// print_r($data);
				
				$status = $this->pertanyaanpil_model->kirimsoal($data);			
				echo json_encode(array("status" => TRUE));
			}
		}else{
			echo json_encode(array(
				"status" => FALSE,
				"message" => array(
					"prodises" => form_error("prodises"),
					"semesterses" => form_error("semesterses"),
					"tipetugas" => form_error("tipetugas")
				)
			));
		} 
	}

	private function _validate2(){
		$rules = array(
			array(
				"field" => "prodises",
				"label" => "program studi",
				"rules" => "required"
			),
			array(
				"field" => "semesterses",
				"label" => "semester",
				"rules" => "required"
			),
			array(
				"field" => "tipetugas",
				"label" => "tipe",
				"rules" => "required"
			)
		);

		$this->form_validation->set_rules($rules);
		$this->form_validation
			->set_error_delimiters("<span class='alert alert-error nopadding'>","</span>");

		return $this->form_validation->run();
	}

	public function kirimsoalbackup(){
		$data = array(
			"idsoalriw" => $this->input->post("idsoalpil"),
			"tipesoal" => ("p"),
			"tipetugas" => $this->input->post("tipetugas"),
			"prodi" => $this->input->post("prodises"),
			"semester" => $this->input->post("semesterses"),
			"status" => ("belum"),
			"tanggal" => $this->input->post("tanggal"),
			"absensike" => $this->input->post("noabsen")
		);
		$status = $this->pertanyaanpil_model->kirimsoal($data);			
		echo json_encode(array("status" => TRUE));
	}

	public function simpan(){
		if($this->_validate()){
			$data = array(
				"idsoalpil" => $this->input->post("idsoalpil"),
				"nopilgan" => $this->input->post("nopilgan"),
				"matakuliah" => $this->input->post("kodemkses"),
				"isipilgan" => $this->input->post("isipilgan"),
				"jawabanpilgan" => $this->input->post("jawabanpilgan"),
				"a" => $this->input->post("pila"),
				"b" => $this->input->post("pilb"),
				"c" => $this->input->post("pilc"),
				"d" => $this->input->post("pild"),
				"tanggal" => $this->input->post("tanggal")
			);
	
			$status = $this->pertanyaanpil_model->createsoalpil($data);			
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array(
				"status" => FALSE,
				"message" => array(
					"isipilgan" => form_error("isipilgan"),
					"pila" => form_error("pila"),
					"pilb" => form_error("pilb"),
					"pilc" => form_error("pilc"),
					"pild" => form_error("pild"),
					"jawabanpilgan" => form_error("jawabanpilgan")
					
				)
			));
		}
	}

	private function _validate(){
		$rules = array(
			array(
				"field" => "isipilgan",
				"label" => "isi pilihan berganda",
				"rules" => "required",
			),		
			array(
				"field" => "pila",
				"label" => "pilihan A",
				"rules" => "required"
			),
			array(
				"field" => "pilb",
				"label" => "pilihan B",
				"rules" => "required"
			),
			array(
				"field" => "pilc",
				"label" => "pilihan C",
				"rules" => "required"
			),
			array(
				"field" => "jawabanpilgan",
				"label" => "jawaban",
				"rules" => "required"
			),
			array(
				"field" => "pild",
				"label" => "pilihan D",
				"rules" => "required"
			)
		);

		$this->form_validation->set_rules($rules);
		$this->form_validation
			->set_error_delimiters("<span class='alert alert-error nopadding'>","</span>");

		return $this->form_validation->run();
	}

	public function cekid(){
		$this->form_validation->set_rules('idsoalpil','ID Telah Digunakan!','required|trim|is_unique[tblsoalpilgan.idsoalpil]');
		if ($this->form_validation->run() == FALSE)
		{
			echo json_encode(array("status" => FALSE));
		}
		else
		{
			echo json_encode(array("status" => TRUE));		
		}
	}

	public function ambilpil($idsoalpil,$kdmk){
		echo json_encode(
				$this->pertanyaanpil_model
					->ambilsoalpil($idsoalpil,$kdmk)->result());
	}

	public function delete($idsoal,$noesai){
		echo json_encode(array(
			"status" => $this->pertanyaanpil_model->deletesoal($idsoal,$noesai)
		));
	}

	public function deleteall($idsoal){
		echo json_encode(array(
			"status" => $this->pertanyaanpil_model->delete($idsoal)
		));
	}

	public function cekpertemuanlama($kdmk){
		echo json_encode(
				$this->pertanyaanpil_model->cekpertemuan($kdmk)->result_array());
	}

	public function cekpertemuan($kdmk){
		echo json_encode(
				$this->pertanyaanpil_model->cekp($kdmk));
	}
}
