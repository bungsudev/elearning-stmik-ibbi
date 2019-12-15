<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensimhs extends CI_Controller {

	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masukmhs'){
        		redirect('login');
			}
			$this->load->model("hmahasiswa/absensimhs_model");
			$this->load->helper("security");
		}
		  
	public function index()
	{
		$this->load->view('hmahasiswa/absensimhs_view');
	}

	// public function data($nim){
	// 	echo json_encode($this->absensimhs_model
	// 						->getabsensi($nim)->result());
	// }
	
	public function dataall(){
		$sem = $this->session->userdata("ses_semester");
		$pro = $this->session->userdata("ses_prodi");
		$kls = $this->session->userdata("ses_kelas");
		$sqlmk = $this->db->query("SELECT kodemk FROM tblmatakuliah where semester = $sem AND prodi = '$pro'");
		foreach($sqlmk->result() as $rowmk)
		{
			$mk = $rowmk->kodemk;
		}
		// echo $mk,$kls;
		echo json_encode($this->absensimhs_model
							->dataabsensi($mk,$kls)->result());
	}

	public function data($kdmk,$kelas){
		echo json_encode($this->absensimhs_model
							->dataabsensi($kdmk,$kelas)->result());
	}
}
