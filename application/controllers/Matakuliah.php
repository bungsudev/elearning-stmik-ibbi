<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masuk'){
				redirect('login');
			}
		$this->load->model("matakuliah_model");
		$this->load->helper("security");
		}


	public function index()
	{
		$this->load->view('matakuliah_view');
	}

	public function data($prodi,$semester){
		echo json_encode($this->matakuliah_model
							->ambilmatakuliah($prodi,$semester)->result());
	}

	public function datasemua(){
		echo json_encode($this->matakuliah_model
							->ambilmatakuliahall()->result());
	}

	public function baca($id=null){
		echo json_encode($this->matakuliah_model
			->getmatakuliah($id));
	}

	public function hapus($id){
		echo json_encode(array(
			"status" => $this->matakuliah_model->deletematakuliah($id)
		));
	}
 
	public function simpan($mode){					
		if($this->_validate($mode)){
			if($mode=="add"){
				$sql = "INSERT INTO tblmatakuliah_sec VALUES ()";
				$query = $this->db->query($sql);
				$cek = $this->db->query("select MAX(kodemk) AS akhir from tblmatakuliah_sec");
				$cek = $cek->result_array();
				$nokdmk = "MK".$cek[0]['akhir'];
				$data = array(
					"kodemk" => $nokdmk,				
					"namamk" => $this->input->post("namamk"),				
					"iddosen" => $this->input->post("iddosen"),				
					"namadosen" => $this->input->post("namadosen"),				
					"prodi" => $this->input->post("prodi"),
					"semester" => $this->input->post("semester")
				);
				$status = $this->matakuliah_model->creatematakuliah($data);
			}elseif($mode=="edit"){
				$data = array(
					"namamk" => $this->input->post("namamk"),		
					"iddosen" => $this->input->post("iddosen"),		
					"namadosen" => $this->input->post("namadosen"),
					"prodi" => $this->input->post("prodi"),
					"semester" => $this->input->post("semester")
				);
				$status = $this->matakuliah_model
					->updatematakuliah($this->input->post("kodemk"),$data);
			}			
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array(
				"status" => FALSE,
				"message" => array(
					"namamk" => form_error("namamk"),				
					"prodi" => form_error("prodi"),
					"semester" => form_error("semester")
				)
			));
		}
	}
	
	private function _validate($mode){
		$rules = array(
			array(
				"field" => "namamk",
				"label" => "nama matakuliah",
				"rules" => "required"
			),
			array(
				"field" => "prodi",
				"label" => "prodi",
				"rules" => "required"
			),
			array(
				"field" => "semester",
				"label" => "semester",
				"rules" => "required"
			)
		);

		$this->form_validation->set_rules($rules);
		$this->form_validation
			->set_error_delimiters("<span class='help-block alert alert-error nopadding'>","</span>");

		return $this->form_validation->run();
	}
	
}
