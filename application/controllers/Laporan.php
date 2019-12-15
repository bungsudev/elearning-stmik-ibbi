<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public function  __construct(){
        parent::__construct();
        $this->load->model("laporan_model");
    }
	public function index()
	{
		$this->load->view('welcome_message');
    }
    
    public function mahasiswalaporan(){
        $result = $this->laporan_model->ambilmahasiswa($this->input->get("prodi"),
                    $this->input->get("kelas"),$this->input->get("semester"))->result();
        if($result == null){
            $this->load->view("dialog/mahasiswa_dialog",
                array(
                    "action" => "laporan/mahasiswalaporan",
                    "mahasiswa" => $this->laporan_model->ambilmahasiswa($this->input->get("prodi"),
                        $this->input->get("kelas"),$this->input->get("semester"))->result(),
                ));
                
        }else{
            if($this->input->get()){
                $this->load->view("laporan/mahasiswa_laporan",array(
                    "mahasiswa" => $this->laporan_model->ambilmahasiswa($this->input->get("prodi"),
                        $this->input->get("kelas"),$this->input->get("semester"))->result(),
                    "title" => "Laporan Mahasiswa"
                ));
            }else{
                $this->load->view("dialog/mahasiswa_dialog",
                array(
                    "action" => "laporan/mahasiswalaporan",
                    "mahasiswa" => $this->laporan_model->ambilmahasiswa($this->input->get("prodi"),
                        $this->input->get("kelas"),$this->input->get("semester"))->result(),
                ));
            } 
        }                 
    }

    public function absensilaporan(){
        $result = $this->laporan_model->ambilabsensi($this->input->get("kodemk"),
                    $this->input->get("kelas"))->result();
        if($result == null){
            $this->load->view("dialog/absensi_dialog",
                array(
                    "action" => "laporan/absensilaporan",
                    "absensi" => $this->laporan_model->ambilabsensi($this->input->get("kodemk"),
                    $this->input->get("kelas"))->result(),
                ));
        }else{
            if($this->input->get()){
                $this->load->view("laporan/absensi_laporan",array(
                    "absensi" => $this->laporan_model->ambilabsensi($this->input->get("kodemk"),
                    $this->input->get("kelas"))->result(),
                    "title" => "Laporan Absensi"
                ));
            }else{
                $this->load->view("dialog/absensi_dialog",
                array(
                    "action" => "laporan/absensilaporan",
                    "absensi" => $this->laporan_model->ambilabsensi($this->input->get("kodemk"),
                    $this->input->get("kelas"))->result(),
                ));
            } 
        }                 
    }

    public function matakuliahlaporan(){
        $this->load->view("laporan/matakuliah_laporan",array(
            "matakuliah" => $this->laporan_model->ambilmatakuliah()->result(),
            "title" => "Laporan Matakuliah"
        ));
    }

    public function nilailaporan(){
        $result = $this->laporan_model->ambilnilai($this->input->get("kodemk"),$this->input->get("kelas"))->result();
        if($result == null){
            $this->load->view("dialog/nilai_dialog",
                array(
                    "action" => "laporan/nilailaporan",
                    "nilai" => $this->laporan_model->ambilnilai($this->input->get("kodemk"),$this->input->get("kelas"))->result(),
                    // "alert" => "<script>alert('Pilih terlebih dahulu');</script>",
                ));
        }else{
            if($this->input->get()){
                $this->load->view("laporan/nilai_laporan",array(
                    "nilai" => $this->laporan_model->ambilnilai($this->input->get("kodemk"),$this->input->get("kelas"))->result(),
                    "title" => "Laporan Nilai"
                ));
            }else{
                $this->load->view("dialog/nilai_dialog",
                array(
                    "action" => "laporan/nilailaporan",
                    "nilai" => $this->laporan_model->ambilnilai($this->input->get("kodemk"),$this->input->get("kelas"))->result(),
                ));
            } 
        }                 
    }

    // Dosen ==============================================================================
    public function absensilaporandosen(){
        $result = $this->laporan_model->ambilabsensi($this->input->get("kodemk"),
                    $this->input->get("kelas"))->result();
        if($result == null){
            $this->load->view("dialog/dosen/absensi_dialog",
                array(
                    "action" => "laporan/absensilaporandosen",
                    "absensi" => $this->laporan_model->ambilabsensi($this->input->get("kodemk"),
                    $this->input->get("kelas"))->result(),
                ));
        }else{
            if($this->input->get()){
                $this->load->view("laporan/absensi_laporan",array(
                    "absensi" => $this->laporan_model->ambilabsensi($this->input->get("kodemk"),
                    $this->input->get("kelas"))->result(),
                    "title" => "Laporan Absensi"
                ));
            }else{
                $this->load->view("dialog/dosen/absensi_dialog",
                array(
                    "action" => "laporan/absensilaporandosen",
                    "absensi" => $this->laporan_model->ambilabsensi($this->input->get("kodemk"),
                    $this->input->get("kelas"))->result(),
                ));
            } 
        }                 
    }

    public function nilailaporandosen(){
        $result = $this->laporan_model->ambilnilai($this->input->get("kodemk"),$this->input->get("kelas"))->result();
        if($result == null){
            $this->load->view("dialog/dosen/nilai_dialog",
                array(
                    "action" => "laporan/nilailaporandosen",
                    "nilai" => $this->laporan_model->ambilnilai($this->input->get("kodemk"),$this->input->get("kelas"))->result(),
                    // "alert" => "<script>alert('Pilih terlebih dahulu');</script>",
                ));
        }else{
            if($this->input->get()){
                $this->load->view("laporan/nilai_laporan",array(
                    "nilai" => $this->laporan_model->ambilnilai($this->input->get("kodemk"),$this->input->get("kelas"))->result(),
                    "title" => "Laporan Nilai"
                ));
            }else{
                $this->load->view("dialog/dosen/nilai_dialog",
                array(
                    "action" => "laporan/nilailaporandosen",
                    "nilai" => $this->laporan_model->ambilnilai($this->input->get("kodemk"),$this->input->get("kelas"))->result(),
                ));
            } 
        }                 
    }

    // Mahasiswa ==========================================================================
    public function nilailaporanmhs(){
        $result = $this->laporan_model->ambilnilaimhs($this->session->userdata("ses_id"),
        $this->session->userdata("ses_kodemk"),$this->input->get("tipetugas"))->result();
        if($result == null){
            $this->load->view("dialog/mahasiswa/nilaimhs_dialog",
                array(
                    "action" => "laporan/nilailaporanmhs",
                    "nilai" => $this->laporan_model->ambilnilaimhs($this->session->userdata("ses_id"),
                                $this->session->userdata("ses_kodemk"),$this->input->get("tipetugas"))->result(),
                    // "alert" => "<script>alert('Pilih terlebih dahulu');</script>",
                ));
        }else{
            if($this->input->get()){
                $this->load->view("laporan/nilaimhs_laporan",array(
                    "nilai" => $this->laporan_model->ambilnilaimhs($this->session->userdata("ses_id"),
                                $this->session->userdata("ses_kodemk"),$this->input->get("tipetugas"))->result(),
                    "title" => "Laporan Nilai"
                ));
            }else{
                $this->load->view("dialog/mahasiswa/nilaimhs_dialog",
                array(
                    "action" => "laporan/nilailaporanmhs",
                    "nilai" => $this->laporan_model->ambilnilaimhs($this->session->userdata("ses_id"),
                                $this->session->userdata("ses_kodemk"),$this->input->get("tipetugas"))->result(),
                ));
            } 
        }                 
    }

    public function tes(){
        $nim = "1513121497";
        $tipetugas = "quiz";
        $kodemk = "MK1";
        $s = $this->laporan_model->ambilnilaimhs($nim,$kodemk,$tipetugas)->result();
        print_r($s);
    }
}
