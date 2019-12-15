<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masuk'){
				redirect('login');
			}
			$this->load->model("absensi_model");
			$this->load->helper("security");
		}

	public function index()
	{
		// $data = array(
		// 	'data' => $this->absensi_model->ambilabsensi()->result()
		// );
		$this->load->view('absensi_view');
	}

	public function data($kdmk,$kelas){
		echo json_encode($this->absensi_model
							->dataabsensi($kdmk,$kelas)->result());
	}

	public function baca($id=null){
		echo json_encode($this->absensi_model
			->getabsensi($id));
	}

	public function hapus($id,$kdmk){
		echo json_encode(array(
			"status" => $this->absensi_model->deleteabsensi($id,$kdmk)
		));
	}

	// function edit($nim){
	// 	$data['absensi'] = $this->absensi_model->ambilabsensifilter($nim)->result();
	// 	$this->load->view('absensi_view',$data);
	// }

	// function editabsensi(){
			
    //     		$nim = $this->input->post("nim");
	// 			$a1 = $this->input->post("a1");
	// 			$a2 = $this->input->post("a2");
	// 			$a3 = $this->input->post("a3");
	// 			$a4 = $this->input->post("a4");
	// 			$a5 = $this->input->post("a5");
	// 			$a6 = $this->input->post("a6");
	// 			$a7 = $this->input->post("a7");
	// 			$a8 = $this->input->post("a8");
	// 			$a9 = $this->input->post("a9");
	// 			$a10 = $this->input->post("a10");
	// 			$a11 = $this->input->post("a11");
	// 			$a12 = $this->input->post("a12");
	// 			$a13 = $this->input->post("a13");
	// 			$a14 = $this->input->post("a14");
	// 			$a15 = $this->input->post("a15");
	// 			$a16 = $this->input->post("a16");
    //     $this->absensi_model->edit($nim,$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15,$a16);
    //     redirect('absensi');
    // }
	
	// public function updateabsensi($nim,$data){
				// $nim = $this->input->post("nim");
				// $a1 = $this->input->post("a1");
				// $a2 = $this->input->post("a2");
				// $a3 = $this->input->post("a3");
				// $a4 = $this->input->post("a4");
				// $a5 = $this->input->post("a5");
				// $a6 = $this->input->post("a6");
				// $a7 = $this->input->post("a7");
				// $a8 = $this->input->post("a8");
				// $a9 = $this->input->post("a9");
				// $a10 = $this->input->post("a10");
				// $a11 = $this->input->post("a11");
				// $a12 = $this->input->post("a12");
				// $a13 = $this->input->post("a13");
				// $a14 = $this->input->post("a14");
				// $a15 = $this->input->post("a15");
				// $a16 = $this->input->post("a16");
    //     $data = array(
    //         'nim' => $nim,  
	// 		'a1' => $a1, 
	// 		'a2' => $a2, 
	// 		'a3' => $a3, 
	// 		'a4' => $a4, 
	// 		'a5' => $a5, 
	// 		'a6' => $a6, 
	// 		'a7' => $a7, 
	// 		'a8' => $a8, 
	// 		'a9' => $a9, 
	// 		'a10' => $a10, 
	// 		'a11' => $a11, 
	// 		'a12' => $a12, 
	// 		'a13' => $a13, 
	// 		'a14' => $a14, 
	// 		'a15' => $a15, 
	// 		'a16' => $a16
    //     );

    // 	echo json_encode(array(
	// 		"status" => ($this->absensi_model->updateabsensi($nim,$data) > 0)));
	// }

	// function update(){
	// 			$nim = $this->input->post("nim");
	// 			$a1 = $this->input->post("a1");
	// 			$a2 = $this->input->post("a2");
	// 			$a3 = $this->input->post("a3");
	// 			$a4 = $this->input->post("a4");
	// 			$a5 = $this->input->post("a5");
	// 			$a6 = $this->input->post("a6");
	// 			$a7 = $this->input->post("a7");
	// 			$a8 = $this->input->post("a8");
	// 			$a9 = $this->input->post("a9");
	// 			$a10 = $this->input->post("a10");
	// 			$a11 = $this->input->post("a11");
	// 			$a12 = $this->input->post("a12");
	// 			$a13 = $this->input->post("a13");
	// 			$a14 = $this->input->post("a14");
	// 			$a15 = $this->input->post("a15");
	// 			$a16 = $this->input->post("a16");
	 
	// 	$data = array(
	// 		'nim' => $nim,  
	// 		'a1' => $a1, 
	// 		'a2' => $a2, 
	// 		'a3' => $a3, 
	// 		'a4' => $a4, 
	// 		'a5' => $a5, 
	// 		'a6' => $a6, 
	// 		'a7' => $a7, 
	// 		'a8' => $a8, 
	// 		'a9' => $a9, 
	// 		'a10' => $a10, 
	// 		'a11' => $a11, 
	// 		'a12' => $a12, 
	// 		'a13' => $a13, 
	// 		'a14' => $a14, 
	// 		'a15' => $a15, 
	// 		'a16' => $a16
	// 	);
	 
	// 	$nim = array(
	// 		'nim' => $nim
	// 	);
	 
	// 	$this->absensi_model->updateabsensi($nim,$data);
	// 	redirect('absensi');
	// }

	// public function simpan($mode){
	// 	if($this->_validate($mode)){
	// 		$data = array(
	// 			"nim" => $this->input->post("nim"),
	// 			"a1" => $this->input->post("a1"),
	// 			"a2" => $this->input->post("a2"),
	// 			"a3" => $this->input->post("a3"),
	// 			"a4" => $this->input->post("a4"),
	// 			"a5" => $this->input->post("a5"),
	// 			"a6" => $this->input->post("a6"),
	// 			"a7" => $this->input->post("a7"),
	// 			"a8" => $this->input->post("a8"),
	// 			"a9" => $this->input->post("a9"),
	// 			"a10" => $this->input->post("a10"),
	// 			"a11" => $this->input->post("a11"),
	// 			"a12" => $this->input->post("a12"),
	// 			"a13" => $this->input->post("a13"),
	// 			"a14" => $this->input->post("a14"),
	// 			"a15" => $this->input->post("a15"),
	// 			"a16" => $this->input->post("a16")
	// 		);
	
	// 		if($mode=="add"){
	// 			$status = $this->absensi_model->createabsensi($data);
	// 		}elseif($mode=="edit"){
	// 			$status = $this->absensi_model
	// 				->updateabsensi($this->input->post("nim"),$data);
	// 		}			
	// 		echo json_encode(array("status" => TRUE));
	// 	}else{
	// 		echo json_encode(array(
	// 			"status" => FALSE,
	// 			"message" => array(
	// 				"nim" => form_error("nim"),
	// 				"namamhs" => form_error("namamhs"),				
	// 				"a1" => form_error("a1"),				
	// 				"a2" => form_error("a2"),
	// 				"a3" => form_error("a3"),
	// 				"a4" => form_error("a4"),
	// 				"a5" => form_error("a5"),
	// 				"a6" => form_error("a6"),
	// 				"a7" => form_error("a7"),
	// 				"a8" => form_error("a8"),
	// 				"a9" => form_error("a9"),
	// 				"a10" => form_error("a10"),
	// 				"a11" => form_error("a11"),
	// 				"a12" => form_error("a12"),
	// 				"a13" => form_error("a13"),
	// 				"a14" => form_error("a14"),
	// 				"a15" => form_error("a15"),
	// 				"a16" => form_error("a16")
	// 			)
	// 		));
	// 	}
	// }
	
	// private function _validate($mode){
	// 	$rules = array(
	// 		array(
	// 			"field" => "nim",
	// 			"label" => "NIM",
	// 			"rules" => "required|max_length[25]".($mode=="add"?"|is_unique[tblabsensi.nim]":"")
	// 		),
	// 		array(
	// 			"field" => "namamhs",
	// 			"label" => "Nama",
	// 			"rules" => "required"
	// 		)
	// 	);

	// 	$this->form_validation->set_rules($rules);
	// 	$this->form_validation
	// 		->set_error_delimiters("<span class='help-block'>","</span>");

	// 	return $this->form_validation->run();
	// }
	
}
