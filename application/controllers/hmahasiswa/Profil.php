<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct(){
		parent::__construct(); 
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masukmhs'){
				redirect('login'); 
			}
			$this->load->model("profil_model");
			$this->load->helper("security");
		}

	public function index()
	{
        $data["profil"] = $this->profil_model
			->ambilmhs($this->session->userdata("ses_id"));
		$this->load->view('hmahasiswa/profil_view',$data);
    }
    
    public function simpan(){
		
		$data = array(
			"nim" => $this->input->post("nim"),
			"namamhs" => $this->input->post("namamhs"),				
			"alamat" => $this->input->post("alamat"),
			"email" => $this->input->post("email"),
			"tanggallahir" => $this->input->post("tanggallahir"),
			"agama" => $this->input->post("agama"),
			"jekel" => $this->input->post("jekel"),
			"telepon" => $this->input->post("telepon"),
			"prodi" => $this->input->post("prodi"),
			"kelas" => $this->input->post("kelas"),
			"semester" => $this->input->post("semester")
		);
		
		$this->profil_model->updatemhs($this->input->post("nim"),$data);
		echo json_encode(array("status" => TRUE));
		$this->session->set_userdata('ses_nama', $this->input->post("namamhs"));
	}
	private function _validate(){
		$rules = array(
			array(
				"field" => "nama",
				"label" => "Nama",
				"rules" => "required|max_length[100]"
			),
			array(
				"field" => "telepon",
				"label" => "Telepon",
				"rules" => "max_length[15]"
			),
			array(
				"field" => "email",
				"label" => "Email",
				"rules" => "valid_email|max_length[50]"
			)
		);
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_error_delimiters(
			"<span class='help-block alert alert-error nopadding'>","</span>");
		return $this->form_validation->run();
	}

	public function gantipass(){
        $this->load->view("gantipassword_view");
    }

	public function ganti(){
        $rules = array(
            array(
                "field" => "password-lama",
                "label" => "Password Lama",
                "rules" => "required"
            ),
            array(
                "field" => "password-baru",
                "label" => "Password Baru",
                "rules" => "required|min_length[6]"
            ),
            array(
                "field" => "konfirm",
                "label" => "Konfirm Password Baru",
                "rules" => "required|min_length[6]|matches[password-baru]"
            )
        );
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters("<span class='help-block alert alert-error nopadding'>","</span>");

        if($this->form_validation->run()){
            $userid = $this->session->userdata("ses_id");
            $password_lama = do_hash($this->input->post("password-lama"),"md5");
            $password_baru = do_hash($this->input->post("password-baru"),"md5"); 
						
            if($this->profil_model->cekLoginmhs($userid,$password_lama)->num_rows()>0){
                $data = array(
                    "nim" => $userid,
                    "password" => $password_baru
                );
				print_r($data);
				$this->profil_model->updatemhs($userid,$data);				
                redirect("login/logout");
            }else{
                redirect("hmahasiswa/profil/gantipass");
            }
        }else{
            $this->load->view("gantipassword_view");
        }
    }
}
