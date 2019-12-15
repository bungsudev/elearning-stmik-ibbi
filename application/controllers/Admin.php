<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masuk'){
				redirect('login');
			} 
			$this->load->model("admin_model");
			$this->load->helper("security");
		}

	public function index()
	{
		$this->load->view('admin_view');
	}

	public function gantipass(){
        $this->load->view("gantipassword_view");
    }

	public function ganti(){
        $rules = array(
            array(
                "field" => "passwordlama",
                "label" => "Password Lama",
                "rules" => "required"
            ),
            array(
                "field" => "passwordbaru",
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
        $this->form_validation->set_error_delimiters("<span class='help-block'>","</span>");

        if($this->form_validation->run()){
            $userid = $this->session->userdata("ses_id");
            $password_lama = do_hash($this->input->post("passwordlama"),"md5");
            $password_baru = do_hash($this->input->post("passwordbaru"),"md5"); 
						
            if($this->profil_model->cekLogin($userid,$password_lama)->num_rows()>0){
                $data = array(
                    "idadmin" => $userid,
                    "password" => $password_baru
                );

				$this->profil_model->updateUser($userid,$data);				
                redirect("login/logout");
            }else{
                redirect("admin/gantipass");
            }
        }else{
            $this->load->view("profil_view");
        }
    }

	public function data(){
		echo json_encode($this->admin_model
							->ambiladmin()->result());
	}

	public function baca($id=null){
		echo json_encode($this->admin_model
			->getadmin($id));
	}

	public function hapus($id){
		echo json_encode(array(
			"status" => $this->admin_model->deleteadmin($id)
		));
	}
	
	public function reset($userid){
        $data = array(
            "idadmin" => $userid,
            "password" => do_hash($userid,"md5")
        );

    	echo json_encode(array(
			"status" => ($this->admin_model->updateadmin($userid,$data) > 0)));
	}

	public function simpan($mode){
		if($this->_validate($mode)){
			$data = array(
				"idadmin" => $this->input->post("idadmin"),
				"namaadmin" => $this->input->post("namaadmin"),				
				"alamat" => $this->input->post("alamat"),
				"email" => $this->input->post("email"),
				"tanggallahir" => $this->input->post("tanggallahir"),
				"agama" => $this->input->post("agama"), 
				"jekel" => $this->input->post("jekel"),
				"telepon" => $this->input->post("telepon"),				
				"status" => $this->input->post("status"),
				"password" => do_hash("123456","md5")
			);
	
			if($mode=="add"){
				$status = $this->admin_model->createadmin($data);
			}elseif($mode=="edit"){
				$status = $this->admin_model
					->updateadmin($this->input->post("idadmin"),$data);
			}			
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array(
				"status" => FALSE,
				"message" => array(
					"idadmin" => form_error("idadmin"),
					"namaadmin" => form_error("namaadmin"),				
					"alamat" => form_error("alamat"),
					"email" => form_error("email"),
					"tanggallahir" => form_error("tanggallahir"),
					"agama" => form_error("agama"),
					"jekel" => form_error("jekel"),
					"telepon" => form_error("telepon"),
					"status" => form_error("status")
				)
			));
		}
	}
	
	private function _validate($mode){
		$rules = array(
			array(
				"field" => "idadmin",
				"label" => "idadmin",
				"rules" => "required"
			),
			array(
				"field" => "namaadmin",
				"label" => "Nama",
				"rules" => "required"
			),
			array(
				"field" => "alamat",
				"label" => "Alamat",
				"rules" => "required"
			),
			array(
				"field" => "email",
				"label" => "Email",
				"rules" => "required"
			),
			array(
				"field" => "tanggallahir",
				"label" => "Tanggal Lahir",
				"rules" => "required"
			),
			array(
				"field" => "agama",
				"label" => "Agama",
				"rules" => "required"
			),
			array(
				"field" => "jekel",
				"label" => "Jenis Kelamin",
				"rules" => "required"
			),
			array(
				"field" => "telepon",
				"label" => "Telepon",
				"rules" => "required|max_length[25]"
			),
			array(
				"field" => "status",
				"label" => "status",
				"rules" => "required"
			)
		);

		$this->form_validation->set_rules($rules);
		$this->form_validation
			->set_error_delimiters("<span class='help-block alert alert-error nopadding'>","</span>");

		return $this->form_validation->run();
	}

	public function simpanval($mode){
		if($this->_validate($mode)){
			$data = array(
				"idadmin" => $this->input->post("idadmin"),
				"namaadmin" => $this->input->post("namaadmin"),				
				"alamat" => $this->input->post("alamat"),
				"email" => $this->input->post("email"),
				"tanggallahir" => $this->input->post("tanggallahir"),
				"agama" => $this->input->post("agama"),
				"jekel" => $this->input->post("jekel"),
				"telepon" => $this->input->post("telepon"),				
				"status" => $this->input->post("status"),
				"password" => do_hash("123456","md5")
			);
	
			// if($mode=="add"){
			// 	$status = $this->admin_model->createadmin($data);
			// }elseif($mode=="edit"){
			// 	$status = $this->admin_model
			// 		->updateadmin($this->input->post("idadmin"),$data);
			// }			
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array(
				"status" => FALSE,
				"message" => array(
					"idadmin" => form_error("idadmin"),
					"namaadmin" => form_error("namaadmin"),				
					"alamat" => form_error("alamat"),
					"email" => form_error("email"),
					"tanggallahir" => form_error("tanggallahir"),
					"agama" => form_error("agama"),
					"jekel" => form_error("jekel"),
					"telepon" => form_error("telepon"),
					"status" => form_error("status")
				)
			));
		}
	}

	function uploadedit(){
		$filename = $this->input->post("idadmin1");
		unlink("./assets/img/fotomahasiswa/".$filename.".jpg");
		$config = array(
			'upload_path' => './assets/img/fotomahasiswa',
			'allowed_types' => "gif|jpg|png|jpeg",
			'file_name' => $filename
		);
		
		$this->load->library('upload', $config);	
		if($this->upload->do_upload())
			{
				$file_data = $this->upload->data();
				$data['nim'] = $filename;
				$data['file'] = $file_data['file_name'];
				// $this->mahasiswa_model->save_image($data);
			}
	}

	function upload(){
		$filename = $this->input->post("idadmin1");
		$config = array(
			'upload_path' => './assets/img/fotomahasiswa',
			'allowed_types' => "gif|jpg|png|jpeg",
			'file_name' => $filename
		);
		
		$this->load->library('upload', $config);	
		if($this->upload->do_upload())
			{
				$file_data = $this->upload->data();
				$data['nim'] = $filename;
				$data['file'] = $file_data['file_name'];
				$this->mahasiswa_model->save_image($data);
			}
	}
}
