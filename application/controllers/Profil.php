<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct(){
		parent::__construct(); 
			//validasi jika user belum login
			if($this->session->userdata('islogin') == 'masukmhs' || $this->session->userdata('islogin') == ''){
				redirect('login');
			}
			$this->load->model("profil_model");
			$this->load->helper("security");
		}

	public function index()
	{
        $data["profil"] = $this->profil_model
			->ambil($this->session->userdata("ses_id"));
		$this->load->view('profil_view',$data);
    }
    
    public function simpan(){
		
		$data = array(
			"idadmin" => $this->input->post("idadmin"),
			"namaadmin" => $this->input->post("namaadmin"),				
			"alamat" => $this->input->post("alamat"),
			"email" => $this->input->post("email"),
			"tanggallahir" => $this->input->post("tanggallahir"),
			"agama" => $this->input->post("agama"),
			"jekel" => $this->input->post("jekel"),
			"telepon" => $this->input->post("telepon")
		);
		
		$this->profil_model->updateUser(
			$this->input->post("idadmin"),$data);
		echo json_encode(array("status" => TRUE));
		$this->session->set_userdata('ses_nama', $this->input->post("namaadmin"));
			// $this->session->set_userdata
			// $config = array(
			// 	"upload_path" => "assets/img",
			// 	"allowed_types" => "png",
			// 	"overwrite" => TRUE,
			// 	"file_name" => $this->input->post("userid")
			// );

			// $this->load->library("upload",$config);
			// if($this->upload->do_upload("gambar")){
			// 	$this->session->set_flashdata("error-message",
			// 	"Berhasil UPDATE data user");
			// }else{
			// 	$this->session->set_flashdata("error-message",
			// 	$this->upload->display_errors());
			// }	
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
						
            if($this->profil_model->cekLogin($userid,$password_lama)->num_rows()>0){
                $data = array(
                    "idadmin" => $userid,
                    "password" => $password_baru
                );

				$this->profil_model->updateUser($userid,$data);				
                redirect("login/logout");
            }else{
                redirect("profil/gantipass");
            }
        }else{
            $this->load->view("gantipassword_view");
        }
    }
}
