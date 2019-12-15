<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soalesai extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login 
			if($this->session->userdata('islogin') != 'masukdsn'){
				redirect('login');
			}
			$this->load->model("pertanyaan_model");
			$this->load->helper("security");
	}

	public function index()
	{
		$this->load->view('dosen/pertanyaan/soalesai_view');
	}

	public function kirimsoalsudahganti(){
		// $this->form_validation->set_rules('kirprodi', 'prodi', 'required');
		// $this->form_validation->set_rules('kirsem', 'semester', 'required');
		// $this->form_validation->set_rules('tipetugas', 'tipetugas', 'required');
		// $this->form_validation->set_rules('noabsen', 'no absen', 'required');
		// $this->form_validation
		// 	->set_error_delimiters("<span class='alert alert-error nopadding'>","</span>");
		$data = array(
			"idsoalriw" => $this->input->post("idsoal"),
			"tipesoal" => ("e"),
			"tipetugas" => $this->input->post("tipetugas"),
			"prodi" => $this->input->post("kirprodi"),
			"semester" => $this->input->post("kirsem"),
			"status" => ("belum"),
			"tanggal" => $this->input->post("tanggal"),
			"absensike" => $this->input->post("noabsen")
		);
		$status = $this->pertanyaan_model->kirimsoal($data);			
		echo json_encode(array("status" => TRUE));
	}

	public function simpan(){
		if($this->_validate()){
			$data = array(
				"idsoal" => $this->input->post("idsoal"),
				"noesai" => $this->input->post("noesai"),
				"matakuliah" => $this->input->post("kodemkses"),
				"isiesai" => $this->input->post("isiesai"),
				"jawaban" => $this->input->post("jawaban"),
				"tanggal" => $this->input->post("tanggal")
			);
	
			$status = $this->pertanyaan_model->createsoales($data);			
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array(
				"status" => FALSE,
				"message" => array(
					"tipetugas" => form_error("tipetugas"),
					"noesai" => form_error("noesai"),
					"isiesai" => form_error("isiesai")
				)
			));
		}
	}

	private function _validate(){
		$rules = array(
			array(
				"field" => "tipetugas",
				"label" => "Tipe tugas",
				"rules" => "required"
			),
			array(
				"field" => "noesai",
				"label" => "no esai",
				"rules" => "required"
			),
			array(
				"field" => "isiesai",
				"label" => "isi esai",
				"rules" => "required",
			)
		);

		$this->form_validation->set_rules($rules);
		$this->form_validation
			->set_error_delimiters("<span class='alert alert-error nopadding'>","</span>");

		return $this->form_validation->run();
	}

	public function cekid(){
		$this->form_validation->set_rules('idsoal','ID Telah Digunakan!','required|trim|is_unique[tblsoalesai.idsoal]');
		if ($this->form_validation->run() == FALSE)
		{
			echo json_encode(array("status" => FALSE));
		}
		else
		{
			echo json_encode(array("status" => TRUE));		
		}
	}

	public function baca($idsoal){
		echo json_encode(
				$this->pertanyaan_model->ambilsoal($idsoal));
	}
	
	public function ambil($idsoal,$kdmk){
		echo json_encode(
				$this->pertanyaan_model
					->ambilsoal($idsoal,$kdmk)->result());
	}

	public function delete($idsoal,$noesai){
		echo json_encode(array(
			"status" => $this->pertanyaan_model->deletesoal($idsoal,$noesai)
		));
	}

	public function deleteall($idsoal){
		echo json_encode(array(
			"status" => $this->pertanyaan_model->delete($idsoal)
		));
	}

	public function ambilmahasiswa(){
		echo json_encode($this->pertanyaan_model
							->getmahasiswa()->result());
	}

	public function kirimsoal(){
		if($this->_validate2()){
			$mhs = json_encode($this->pertanyaan_model->getmahasiswa($this->input->post("semesterses"),$this->input->post("prodises"))->result());
			$temp = count($this->pertanyaan_model->getmahasiswa($this->input->post("semesterses"),$this->input->post("prodises"))->result());
			$data1 = json_decode($mhs, TRUE);
			for ($i=0; $i < $temp ; $i++) { 
				echo "<br>",$data1[$i]['nim'];
				echo "<br>",$data1[$i]['namamhs'];
				$data = array(
					"idsoalriw" => $this->input->post("idsoal"),
					"tipesoal" => ("e"),
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
				
				$status = $this->pertanyaan_model->kirimsoal($data);
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
	
	public function cekpertemuanlama($kdmk){
		echo json_encode(
				$this->pertanyaan_model->cekpertemuan($kdmk)->result_array());
	}

	public function cekpertemuan($kdmk){
		echo json_encode(
				$this->pertanyaan_model->cekp($kdmk));
	}

	function send($email){
		$this->load->library('email');
		$this->email->initialize(array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.sendgrid.net',
			'smtp_user' => 'stmikibbi',
			'smtp_pass' => 'asmainun1',
			'smtp_port' => 587,
			'crlf' => "\r\n",
			'newline' => "\r\n"
		  ));
		  
		  $this->email->from('stmikibbi@univ.com', 'Al azmi');
		  $this->email->to($email);
		  $this->email->cc('');
		  $this->email->bcc('');
		  $this->email->subject('STMIK IBBI E-Learning');
		  $this->email->message('Soal baru telah tersedia! Silahkan buka e-learning STMIK IBBI!');
		  $this->email->send();
		  
		  echo $this->email->print_debugger();
	}
}
