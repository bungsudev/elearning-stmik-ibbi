<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masuk'){
				redirect('login');
			}
		$this->load->model("mahasiswa_model");
		$this->load->helper("security");
		}


	public function index()
	{
		$this->load->view('mahasiswa_view');
	}

	public function data(){
		echo json_encode($this->mahasiswa_model
							->ambilMahasiswa()->result());
	}

	public function ambil($prodi,$kelas){
		echo json_encode(
				$this->mahasiswa_model
					->ambilfilter($prodi,$kelas)->result());
	}

	public function baca($id=null){
		echo json_encode($this->mahasiswa_model
			->getMahasiswa($id));
	}

	public function hapus($id){
		echo json_encode(array(
			"status" => $this->mahasiswa_model->deleteMahasiswa($id)
		));
		unlink("./assets/img/fotomahasiswa/".$id.".jpg");
		$this->hapusgambar($id);
	}
	
	public function hapusabsen($id){
		echo json_encode(array(
			"status" => $this->mahasiswa_model->deleteabsensi($id)
		));		
	}
	public function hapusgambar($id){
		echo json_encode(array(
			"statusgambar" => $this->mahasiswa_model->deletegambar($id)	
		));
	}
	

	public function reset($userid){
        $data = array(
            "nim" => $userid,
            "password" => do_hash($userid,"md5")
        );

    	echo json_encode(array(
			"status" => ($this->mahasiswa_model->updateMahasiswa($userid,$data) > 0)));
	}

	public function simpan($mode){
		if($this->_validate($mode)){
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
				"semester" => $this->input->post("semester"),
				"password" => do_hash("123456","md5")
			);
	
			if($mode=="add"){
				$status = $this->mahasiswa_model->createMahasiswa($data);
			}elseif($mode=="edit"){ 				
				$status = $this->mahasiswa_model
					->updateMahasiswa($this->input->post("nim"),$data);				
			}			
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array(
				"status" => FALSE,
				"message" => array(
					"nim" => form_error("nim"),
					"namamhs" => form_error("namamhs"),				
					"alamat" => form_error("alamat"),
					"email" => form_error("email"),
					"tanggallahir" => form_error("tanggallahir"),
					"agama" => form_error("agama"),
					"jekel" => form_error("jekel"),
					"telepon" => form_error("telepon"),
					"prodi" => form_error("prodi"),
					"semester" => form_error("semester"),
					"kelas" => form_error("kelas")
				)
			));
		}
	}

	function uploadedit(){
		$filename = $this->input->post("nim1");
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
		$filename = $this->input->post("nim1");
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

	private function _validate($mode){
		$rules = array(
			array(
				"field" => "nim",
				"label" => "NIM",
				"rules" => "required|exact_length[10]"
			),
			array(
				"field" => "namamhs",
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
				"rules" => "required" // valid_email
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
				"field" => "semester",
				"label" => "Semester",
				"rules" => "required"
			),
			array(
				"field" => "prodi",
				"label" => "Prodi",
				"rules" => "required"
			),
			
			array(
				"field" => "kelas",
				"label" => "Kelas",
				"rules" => "required"
			)
		);

		$this->form_validation->set_rules($rules);
		$this->form_validation
			->set_error_delimiters("<span class='help-block alert alert-error nopadding'>","</span>");

		return $this->form_validation->run();
	}
 
	public function createabsen(){
		$sem = $this->input->post("semester");
		$pro = $this->input->post("prodi");
		$kls = $this->input->post("kelas");
		// $sem = '1';
		// $pro = 'TI';
		$sqlmk = $this->db->query("SELECT kodemk FROM tblmatakuliah where semester = $sem AND prodi = '$pro'");
		foreach($sqlmk->result() as $rowmk)
		{
			$mk = $rowmk->kodemk;
		}
		// $sql = $this->db->query("SELECT kelompok, COUNT(*) kel FROM tblabsensi  WHERE kodemk ='$mk' GROUP BY kelompok HAVING kel = 5;");
		$sql = $this->db->query("SELECT kelompok, COUNT(*) kel FROM tblabsensi  WHERE kodemk ='$mk' AND kelas = '$kls' GROUP BY kelompok HAVING kel = 5;");
		//ambil nilai max per kelompok
		foreach($sql->result() as $row)
		{
			$last = $row->kelompok;
		}
		$last++;
		$keltemp = $last; 
		$sql1 = $this->db->query("SELECT kelompok, COUNT(*) ttl FROM tblabsensi WHERE kelompok = $last AND kodemk = '$mk'");
		//cari tau kelompok terakhir
		foreach($sql1->result() as $row1)
		{
			$last = $row1->ttl;
		}
		// echo 'keltemp'.$keltemp;
		// echo 'last'.$last;
		if ($last <= 5) {
			// echo "buat absen ke $keltemp";
		}else{
			$keltemp++;
			// echo "buat absen ke $keltemp";
		}
		
		$data = array(
			"kodemk" => $mk,
			"kelas" => $this->input->post("kelas"),
			"nim" => $this->input->post("nim"),
			"namamhs" => $this->input->post("namamhs"),
			"kelompok" => $keltemp
		);
		$status = $this->mahasiswa_model->createabsen($data);
		echo json_encode(array("status" => TRUE));
	}

	
	public function simpanval($mode){
		if($this->_validate($mode)){
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
				"semester" => $this->input->post("semester"),
				"password" => do_hash("123456","md5")
			);
	
			// if($mode=="add"){
			// 	$status = $this->mahasiswa_model->createMahasiswa($data);
			// }elseif($mode=="edit"){ 
			// 	$status = $this->mahasiswa_model
			// 		->updateMahasiswa($this->input->post("nim"),$data);
			// }			
			echo json_encode(array("status" => TRUE));
		}else{
			echo json_encode(array(
				"status" => FALSE,
				"message" => array(
					"nim" => form_error("nim"),
					"namamhs" => form_error("namamhs"),				
					"alamat" => form_error("alamat"),
					"email" => form_error("email"),
					"tanggallahir" => form_error("tanggallahir"),
					"agama" => form_error("agama"),
					"jekel" => form_error("jekel"),
					"telepon" => form_error("telepon"),
					"prodi" => form_error("prodi"),
					"semester" => form_error("semester"),
					"kelas" => form_error("kelas")
				)
			));
		}
	}

	
}
