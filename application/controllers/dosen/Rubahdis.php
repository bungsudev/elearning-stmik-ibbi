<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rubahdis extends CI_Controller {
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
		$this->load->view('dosen/materi/rubahdis_view');
    }

    public function simpandis(){				
        $data = array(
		"pertemuan" => $this->input->post("pertemuan"),
		"prodi" => $this->input->post("prodi"),
		"semester" => $this->input->post("semester"),	
        "matakuliah" => $this->input->post("matakuliah"),
        "judulmateri" => $this->input->post("judulmateri"),
        "tanggal" => $this->input->post("tanggal"),
        "file" => $this->input->post("file2"),
        "tipe" => 'd'
        );
        $status = $this->materi_model->updatemateri($this->input->post("idmateri"),$data);
        echo json_encode(array("status" => TRUE));        
        $this->session->set_flashdata('berhasil','Materi diskusi ter-update.');
        redirect('dosen/lihatdis');
    }

    public function hapus($id){
		echo json_encode(array(
			"status" => $this->materi_model->deletemateri($id)
		));
	}
    
}
