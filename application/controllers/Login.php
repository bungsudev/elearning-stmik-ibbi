<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Login_model");
		$this->load->helper("security");
	}

	private function _validate(){
		$rules = array(
			array(
				"field" => "userid",
				"label" => "User ID",
				"rules" => "required|min_length[5]|max_length[10]"
			),
			array(
				"field" => "password",
				"label" => "Password",
				"rules" => "required|min_length[5]"
			)
		);
		$this->form_validation->set_rules($rules);
		$this->form_validation
			->set_error_delimiters("<span class='help-block'>",
				"</span>");
			
		return $this->form_validation->run();
	}

	public function index(){
		if($this->session->userdata("islogin") == 'masuk'){
			redirect("home");
		}else if($this->session->userdata("islogin") == 'masukmhs'){
			redirect('hmahasiswa/home');
		}else if($this->session->userdata("islogin") == 'masukdsn'){
			redirect('dosen/masuk');
		}else{
			$this->load->view('login_view');
		}
	}
 
	function ceklogin(){
        $userid = $this->input->post("userid");
		$password = do_hash($this->input->post("password"),"md5");
		// $this->session->set_userdata('ses_passdosen',$password);
		$statusadm = 'admin';
		$statusdsn = 'dosen';
		$cek_admin=$this->Login_model->ambiladmin($userid,$password,$statusadm);
		$cek_dosen=$this->Login_model->ambiladmin($userid,$password,$statusdsn);
		$cek_mahasiswa=$this->Login_model->ambilmahasiswa($userid,$password);
        if($cek_admin->num_rows() == 1){ //jika login sebagai admin
			$data=$cek_admin->row_array();
			$this->session->set_userdata('islogin','masuk');          
			$this->session->set_userdata('ses_id',$data['idadmin']);
			$this->session->set_userdata('ses_nama',$data['namaadmin']);
			redirect('home');
        }elseif($cek_mahasiswa->num_rows() == 1){ //jika login sebagai mahasiswa
			$data=$cek_mahasiswa->row_array();
			$this->session->set_userdata('islogin','masukmhs');
			$this->session->set_userdata('ses_id',$data['nim']);
			$this->session->set_userdata('ses_nama',$data['namamhs']);
			$this->session->set_userdata('ses_prodi',$data['prodi']);
			$this->session->set_userdata('ses_semester',$data['semester']);
			$this->session->set_userdata('ses_kelas',$data['kelas']);
			redirect('hmahasiswa/home');		
		}elseif($cek_dosen->num_rows() == 1){ //jika login sebagai dosen
			$data=$cek_dosen->row_array();
			$this->session->set_userdata('ismasuk','masuk');          
			$this->session->set_userdata('ses_id',$data['idadmin']);
			$this->session->set_userdata('ses_nama',$data['namaadmin']);
			redirect('dosen/masuk');
		}else{  // jika userid dan password tidak ditemukan atau salah
			echo $this->session->set_flashdata("error-login",
			"User id atau Password Salah!");
			redirect('login');
		} 
	}
	

	public function logout(){
		$this->session->unset_userdata("ses_id","ses_nama","islogin","ismasuk");
		$this->session->sess_destroy();
		redirect("login");
	}
}