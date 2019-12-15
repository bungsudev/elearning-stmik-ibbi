<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banksoal extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masuk'){
				redirect('login');
            }
            $this->load->model("banksoal_model");
			$this->load->helper("security");
		}

	public function index()
	{
		$this->load->view('pertanyaan/banksoal_view');
    }
    
    public function datapilgan(){
		echo json_encode($this->banksoal_model
							->ambilpilgan()->result());
    }
    
    public function dataesai(){
		echo json_encode($this->banksoal_model
							->ambilesai()->result());
    }
    
    public function hapuspilgan($idsoalpil){
		echo json_encode(array(
			"status" => $this->banksoal_model->deletepilgan($idsoalpil)
		));
    }
    
    public function hapusesai($idsoal){
		echo json_encode(array(
			"status" => $this->banksoal_model->deleteesai($idsoal)
		));
	}

	public function kirimsoalbackup(){
		$data = array(
			"idsoalriw" => $this->input->post("idsoal"),
			"tipesoal" => $this->input->post("tipesoal"),
			"tipetugas" => $this->input->post("tipetugas"),
			"prodi" => $this->input->post("kirprodi"),
			"semester" => $this->input->post("kirsem"),
			"status" => ("belum"),
			"tanggal" => $this->input->post("tanggal"),
			"absensike" => $this->input->post("noabsen")
		);
		$status = $this->banksoal_model->kirimsoal($data);			
		echo json_encode(array("status" => TRUE));
	}

	public function kirimsoal(){
		$mhs = json_encode($this->banksoal_model->getmahasiswa($this->input->post("kirsem"),$this->input->post("kirprodi"))->result());
		$temp = count($this->banksoal_model->getmahasiswa($this->input->post("kirsem"),$this->input->post("kirprodi"))->result());
		$data1 = json_decode($mhs, TRUE);
		for ($i=0; $i < $temp ; $i++) { 
			echo "<br>",$data1[$i]['nim'];
			echo "<br>",$data1[$i]['namamhs'];
			$data = array(
				"idsoalriw" => $this->input->post("idsoal"),
				"tipesoal" => $this->input->post("tipesoal"),
				"nim" => $data1[$i]['nim'],
				"namamhs" => $data1[$i]['namamhs'],
				"tipetugas" => $this->input->post("tipetugas"),
				"prodi" => $this->input->post("kirprodi"),
				"semester" => $this->input->post("kirsem"),
				"status" => ("belum"),
				"tanggal" => $this->input->post("tanggal"),
				"absensike" => $this->input->post("noabsen")
			);
			// print_r($data);
			
			$status = $this->banksoal_model->kirimsoal($data);			
			echo json_encode(array("status" => TRUE));
		}
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
