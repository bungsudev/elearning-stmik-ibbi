<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subuploadmateri extends CI_Controller {

	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masuk'){
				redirect('login');
			}
			$this->load->model("uploadmateri_model");
			$this->load->helper("security");
		}

	public function index()
	{
		$this->load->view('subuploadmateri_view');
	}

	public function do_upload() {
		// $this->form_validation->set_rules('prodi', 'prodi', 'required');
		// $this->form_validation->set_rules('semester', 'semester', 'required');
		$this->form_validation->set_rules('matakuliah', 'matakuliah', 'required');
		$this->form_validation->set_rules('judulmateri', 'judul', 'required');
		// $this->form_validation->set_rules('upload', 'data', 'required');
		if (empty($_FILES['upload']['name']))
		{
			$this->form_validation->set_rules('upload', 'Document', 'required');
		}
		$this->form_validation 
			->set_error_delimiters("<span class='alert alert-error nopadding'>","</span>");
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('subuploadmateri_view');
		}
		else
		{
			$file = $_FILES['upload'];
			$file_name = $file['name'];
			$config['upload_path']   = './assets/materi'; 
			$config['allowed_types'] = 'pdf|doc|docx'; 
			$config['max_size']      = 100000;
			$config['file_name']       = $file['name'];
			$this->load->library('upload', $config);
			//CEK APAKAH UPLOAD BERHASIL ATAU TIDAK, JIKA TIDAK BERHASIL MUNCULKAN ERROR 
			//JIKA BERHASIL LANJUT KE PROSES SELANJUTNYA
			if ( ! $this->upload->do_upload('upload')) {
				redirect("subuploadmateri");
			} 
			//PROSES MENYIMPAN DATA KE DATABASE 
			else { 
				$data['matakuliah']=$this->input->post('matakuliah');
				$data['idpengirim']=$this->session->userdata("ses_id");
				$data['namapengirim']=$this->session->userdata("ses_nama");
				$data['judulmateri']=$this->input->post('judulmateri');
				$data['tanggal']= date('Y-m-d H:i:s');
				$data['file']=$file_name;
				$data['tipe']= "m";
				$data['prodi']= $this->input->post('prodi');
				$data['semester']= $this->input->post('semester');
				$this->uploadmateri_model->upmateri($data);
				$this->session->set_flashdata('berhasil','Materi ter-upload.');
				redirect("subuploadmateri");
			}
		}
		
	}
}


