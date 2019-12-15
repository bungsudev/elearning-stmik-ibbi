<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lihatup extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masuk'){
				redirect('login');
			}
			$this->load->model("materi_model");
			$this->load->helper("security");
		}

 
	public function index()
	{
		$this->load->view('materi/lihatup_view');
    }
 
    public function dataup($mk){
		echo json_encode($this->materi_model
							->ambilmateriup($mk)->result());
    }

    public function baca($id=null){
		echo json_encode($this->materi_model
			->getmateri($id));
    }

	public function hapus($id,$file){
		unlink("./assets/materi/".$file);
		echo json_encode(array(
			"status" => $this->materi_model->deletemateri($id)
		));
	}
}
