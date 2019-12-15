<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('ismasuk') != 'masuk'){ 
        		redirect('login');
			}
			// $this->load->model("Homemhs_model");
			$this->load->helper("security");
		}
		  
	public function index()
	{
		$this->load->view('dosen/masuk_view');
    }
    
    public function set_session($kodemk,$prodi,$semester,$namamk)
    {
        $this->session->set_userdata('ses_kodemk', $kodemk);
        $this->session->set_userdata('ses_prodi', $prodi);
		$this->session->set_userdata('ses_semester', $semester); 
		$this->session->set_userdata('ses_namamk', $namamk); 
		$this->session->set_userdata('islogin','masukdsn');    
        echo $this->session->userdata('ses_semester');
        echo $this->session->userdata('ses_prodi');
        echo $this->session->userdata('ses_kodemk');
        return;
	}
	
	public function keluar(){
		$this->session->unset_userdata("ismasuk","ses_id","ses_nama","islogin");
		$this->session->sess_destroy();
		redirect("login");
	}
}
