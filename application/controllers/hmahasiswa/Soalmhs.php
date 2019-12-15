<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soalmhs extends CI_Controller {

	function __construct(){
		parent::__construct();
			//validasi jika user belum login
			if($this->session->userdata('islogin') != 'masukmhs'){
        		redirect('login');
			}
			$this->load->model("hmahasiswa/soalmhs_model");
			$this->load->helper("security");
		}
		   
	public function index()
	{
		$this->load->view('hmahasiswa/soalmhs_view');
	}

	public function ambilriwayat($prodi,$semester,$nim){
		echo json_encode($this->soalmhs_model
							->ambilriwayat($prodi,$semester,$nim)->result());
	}

	public function bacaesai($idsoal){
		echo json_encode($this->soalmhs_model
			->getesai($idsoal)->result());
	}

	public function bacapilgan($idsoalpil){ 
		echo json_encode($this->soalmhs_model
			->getpilgan($idsoalpil)->result());
	}

	public function updateabsen($abs){
		$tipetugas = $this->input->post("tipetugastp1");
		$nimkel = $this->session->userdata('ses_id');
		// $tipetugas = 'kelompok';
		// $nimkel = '1513121497';
		$qry = $this->db->query("select kelompok from tblabsensi where nim = '$nimkel'");
		foreach ($qry->result() as $item) {
			$kel = $item->kelompok;
		}
		$qry1 = $this->db->query("select * from tblabsensi where kelompok = '$kel'");
		$nimkelompok = array();
		$pjgkel = 0;
		foreach ($qry1->result() as $item1) {
			 $nimkelompok[] = $item1;
			 $pjgkel++;
		}
		if ($tipetugas == 'kelompok') {
			for ($x=0; $x < $pjgkel; $x++) { 
				$a = $this->input->post("temp");
				$nim = $nimkelompok[$x]->nim;
				if ($a != 0) {
					$temp = "Hadir";
				}else{ 
					$temp = "Tidak";
				}
				$data1 = array(
					$abs => $temp
				);
				print_r($nimkelompok[$x]->nim);
				$status = $this->soalmhs_model->updateabsensi($nim,$data1);
				echo json_encode(array("status" => TRUE));
			}
		} else {
			$a = $this->input->post("temp");
			$nim = $this->input->post("nim1");
			if ($a != 0) {
				$temp = "Hadir";
			}else{ 
				$temp = "Tidak";
			}
			$data1 = array(
				$abs => $temp
			);
			$status = $this->soalmhs_model->updateabsensi($nim,$data1);
			echo json_encode(array("status" => TRUE));
		}
	}

	function ambillast(){
		// $nim = $this->session->userdata('ses_id');
		$sql = $this->db->query("SELECT MAX(idnilai) as akhir FROM tblriwayatnilai");
		foreach($sql->result() as $row)
		{
			$nilai = $row->akhir;
		}
		return $nilai;
	}

	public function upesai(){
		$tipetugas = $this->input->post("tipetugastp1");
		$nimkel =  $this->session->userdata('ses_id');
		$qry = $this->db->query("select kelompok from tblabsensi where nim = '$nimkel'");
		foreach ($qry->result() as $item) {
			$kel = $item->kelompok;
		}
		$qry1 = $this->db->query("select * from tblabsensi where kelompok = '$kel'");
		$nimkelompok = array();
		$pjgkel = 0;
		foreach ($qry1->result() as $item1) {
			 $nimkelompok[] = $item1;
			 $pjgkel++;
		}
		// echo $pjgkel."\n";
		if ($tipetugas == 'kelompok') {
			for ($x=0; $x < $pjgkel; $x++) { 
				$akhir = $this->ambillast(); //angka terakhir idsoal
				$jlh = $this->input->post("jlhup");
				$mulai = $akhir-$jlh;
				$mulai++;
				for ($i=1; $i <= $jlh ; $i++) {
					$y = $i-1;
					$data = array(
						"nim" => $nimkelompok[$x]->nim,	
						"nama" => $nimkelompok[$x]->namamhs,	
						"tipesoal" => "e",	
						"idsoal" => $this->input->post("idsoal"),	 
						"nosoal" => $y+1,
						"jawabesai" => $this->input->post("jawaban".$y),
						"status" => "proses",
						"nilai" => 0,
						"tanggal" => $this->input->post("tanggal"),
						"kelompok" => $kel
					);
					$idnilai = ($mulai-1)+$i;
					$status = $this->soalmhs_model->updatenilai($idnilai,$data);
				}
				echo json_encode(array("status" => TRUE));
			}
		} else {
			$akhir = $this->ambillast(); //angka terakhir idsoal
			$jlh = $this->input->post("jlhup");
			$mulai = $akhir-$jlh;
			$mulai++;
			for ($i=1; $i <= $jlh ; $i++) {
				$x = $i-1;
				$data = array(
					"nim" => $this->input->post("nim1"),	
					"nama" => $this->input->post("nama1"),	
					"tipesoal" => "e",	
					"idsoal" => $this->input->post("idsoal"),	 
					"nosoal" => $x+1,
					"jawabesai" => $this->input->post("jawaban".$x),
					"status" => "proses",
					"nilai" => 0,
					"tanggal" => $this->input->post("tanggal")
				);
				$idnilai = ($mulai-1)+$i;
				$status = $this->soalmhs_model->updatenilai($idnilai,$data);
			}
			echo json_encode(array("status" => TRUE));	
		}		
	}

	public function simpanesai(){
		$tipetugas = $this->input->post("tipetugastp1");
		$nimkel = $this->session->userdata('ses_id');
		$qry = $this->db->query("select kelompok from tblabsensi where nim = '$nimkel'");
		foreach ($qry->result() as $item) {
			$kel = $item->kelompok;
		}
		$qry1 = $this->db->query("select * from tblabsensi where kelompok = '$kel'");
		$nimkelompok = array();
		$pjgkel = 0;
		foreach ($qry1->result() as $item1) {
			 $nimkelompok[] = $item1;
			 $pjgkel++;
		}
		if ($tipetugas == 'kelompok') {
			for ($x=0; $x < $pjgkel; $x++) { 
				$jlh = $this->input->post("jlh");
				for ($i=0; $i <= $jlh ; $i++) { 
					$data = array(
						"kodemk" => $this->session->userdata("ses_kodemk"),
						"nim" => $nimkelompok[$x]->nim,	
						"nama" => $nimkelompok[$x]->namamhs,	
						"tipesoal" => "e",	
						"tipetugas" => $this->input->post("tipetugastp1"),
						"idsoal" => $this->input->post("idsoal"),	
						"nosoal" => $i+1,
						"isisoal" => $this->input->post("tanya".$i),
						"jawabesai" => $this->input->post("jawaban".$i),
						"status" => "proses",
						"nilai" => 0,
						"tanggal" => $this->input->post("tanggal"),
						"kelompok" => $kel
					);
					$status = $this->soalmhs_model->addnilaiesai($data);
				}
				$upd = array(
					"status" => "proses",
					"kelompok" => $kel
				);
				$ids = $this->input->post("idsoal");
				$nim = $nimkelompok[$x]->nim;
				$status = $this->soalmhs_model->update($ids,"e",$nim,$upd);
				// echo json_encode(array("status" => TRUE));
				$this->session->set_flashdata('berhasil','Jawaban berhasil terkirim.');	
			}
		} else {
			$jlh = $this->input->post("jlh");
			for ($i=0; $i <= $jlh ; $i++) { 
				$data = array(
					"kodemk" => $this->session->userdata("ses_kodemk"),
					"nim" => $this->input->post("nim1"),	
					"nama" => $this->input->post("nama1"),	
					"tipesoal" => "e",	
					"tipetugas" => $this->input->post("tipetugastp1"),
					"idsoal" => $this->input->post("idsoal"),	
					"nosoal" => $i+1,
					"isisoal" => $this->input->post("tanya".$i),
					"jawabesai" => $this->input->post("jawaban".$i),
					"status" => "proses",
					"nilai" => 0,
					"tanggal" => $this->input->post("tanggal")
				);
				$status = $this->soalmhs_model->addnilaiesai($data);
			}
			$upd = array(
				"status" => "proses",
			);
			$ids = $this->input->post("idsoal");
			$nim = $this->input->post("nim1");
			$status = $this->soalmhs_model->update($ids,"e",$nim,$upd);
			$this->session->set_flashdata('berhasil','Jawaban berhasil terkirim.');
		}
		echo json_encode(array("status" => TRUE));
		// redirect('subbuatdiskusi');
	}

	public function uppilgan(){
		$akhir = $this->ambillast(); //angka terakhir idsoal
		$jlh = $this->input->post("jlhup");
		// $jlh = 5; // jlhsoal
		$mulai = $akhir-$jlh;
		$mulai++;
		// echo $mulai;
		
		for ($i=1; $i <= $jlh ; $i++) {
			$x = $i-1;
			$data = array(
				"nim" => $this->input->post("nim1"),
				"nama" => $this->input->post("nama1"),	
				"tipesoal" => "p",	
				"idsoal" => $this->input->post("idsoal"),	
				"nosoal" => $x+1,
				// "isisoal" => $this->input->post("tanya".$x),
				"jawabpilgan" => $this->input->post("jbpil".$x),
				// "a" => $this->input->post("pila".$x),
				// "b" => $this->input->post("pilb".$x),
				// "c" => $this->input->post("pilc".$x),
				// "d" => $this->input->post("pild".$x),
				"status" => "proses",
				"nilai" => 0,
				"tanggal" => $this->input->post("tanggal")
			);
			$idnilai = ($mulai-1)+$i;
			// echo $idnilai;
			$status = $this->soalmhs_model->updatenilai($idnilai,$data);
		}		
		echo json_encode(array("status" => TRUE));
	}

	public function simpanpilgan(){		
		$jlh = $this->input->post("jlh");
		for ($i=0; $i <= $jlh ; $i++) { 
			$data = array(
				"kodemk" => $this->session->userdata("ses_kodemk"),
				"nim" => $this->input->post("nim1"),
				"nama" => $this->input->post("nama1"),	
				"tipesoal" => "p",	
				"tipetugas" => $this->input->post("tipetugastp1"),
				"idsoal" => $this->input->post("idsoal"),	
				"nosoal" => $i+1,
				"isisoal" => $this->input->post("tanya".$i),
				"jawabpilgan" => $this->input->post("jbpil".$i),
				"a" => $this->input->post("pila".$i),
				"b" => $this->input->post("pilb".$i),
				"c" => $this->input->post("pilc".$i),
				"d" => $this->input->post("pild".$i), 
				"status" => "proses",
				"nilai" => 0,
				"tanggal" => $this->input->post("tanggal")
			);
			$status = $this->soalmhs_model->addnilaipilgan($data);
		}
		$upd = array(
			"status" => "proses"
		);
		$ids = $this->input->post("idsoal");
		$nim = $this->input->post("nim1");
		$status = $this->soalmhs_model->update($ids,"p",$nim,$upd);
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('berhasil','Jawaban berhasil terkirim.');
		// redirect('subbuatdiskusi');
	}

	public function tampil($nim,$tipesoal,$idsoal){
		echo json_encode($this->soalmhs_model
			->tampilsoalselesai($nim,$tipesoal,$idsoal)->result());
	}

	public function tampilnilai($nim,$tipesoal,$idsoal){
		echo json_encode($this->soalmhs_model
			->tampilsoalselesai($nim,$tipesoal,$idsoal)->result());
	}
}
