<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Lihatdis extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masukdsn'){
				redirect('login');
			}
			$this->load->model("materi_model");
			$this->load->helper("security");
		}


	public function index()
	{
		$this->load->view('dosen/materi/lihatdis_view');
    }
        
	public function datadis(){
		echo json_encode($this->materi_model
							->ambilmateridis()->result());
	}

	public function datadisfil($kdmk){
		echo json_encode($this->materi_model
							->ambilmateridisfil($kdmk)->result());
	}
	
    public function baca($id=null){
		echo json_encode($this->materi_model
			->getmateri($id));
	}
	
	public function hapus($id){
		echo json_encode(array(
			"status" => $this->materi_model->deletemateri($id)
		));
	}
}
