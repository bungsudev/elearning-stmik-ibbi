<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Subbuatdiskusi extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masukdsn'){
				redirect('login');
			}
			$this->load->model("uploadmateri_model");
			$this->load->helper("security");
		}


	public function index()
	{
		$this->load->view('dosen/subbuatdiskusi_view');
	}
	
	public function simpan(){		
		$this->form_validation->set_rules('judulmateri', 'judul', 'required');
		$this->form_validation->set_rules('file', 'materi', 'required');
		$this->form_validation
			->set_error_delimiters("<span class='alert alert-error nopadding'>","</span>");

		// return $this->form_validation->run();
		if ($this->form_validation->run() == FALSE)
		{
				$this->load->view('dosen/subbuatdiskusi_view');
		}
		else
		{
			$mk = $this->input->post("matakuliah");
			$sql = $this->uploadmateri_model->pertemuan($mk);
			foreach($sql->result() as $row)
			{
				$last = $row->akhir;
			}
			$last++;
			// echo $last;
			$data = array(
			"pertemuan" => $last,	
			"prodi" => $this->input->post("prodi"),	
			"semester" => $this->input->post("semester"),	
			"matakuliah" => $this->input->post("matakuliah"),
			"idpengirim" => $this->session->userdata("ses_id"),
			"namapengirim" => $this->session->userdata("ses_nama"),
			"judulmateri" => $this->input->post("judulmateri"),
			"file" => $this->input->post("file"),
			"tipe" => 'd'
			);
			$status = $this->uploadmateri_model->updiskusi($data);
			echo json_encode(array("status" => TRUE));
			
			$this->session->set_flashdata('berhasil','Materi diskusi terupload.');
			redirect('dosen/subbuatdiskusi');
		}
	}
}
