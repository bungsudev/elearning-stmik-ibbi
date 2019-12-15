<?php

class Mahasiswa_model extends CI_Model{

    public function ambilMahasiswa(){
        $query = $this->db
                    ->order_by("kelas","asc")
                    ->get("tblmahasiswa");
        
        return $query;
    }

    // SELECT * FROM nama_tabel WHERE nama_field LIKE value;
    // $this->db->like('nama_field','value');
    // $this->db->get('nama_tabel');

    public function ambilfilter($prodi,$kelas){
        $query = $this->db
                    ->where("prodi",$prodi)
                    ->where("kelas",$kelas)
                    ->get("tblmahasiswa");
        return $query;
    }

    public function createMahasiswa($data){
        $query = $this->db
                    ->insert("tblmahasiswa",$data);
        return $this->db->affected_rows();
    }

    public function createabsen($data){
        $query = $this->db
                    ->insert("tblabsensi",$data);
        return $this->db->affected_rows();
    }

    public function updateMahasiswa($nim,$data){
        $query = $this->db
                    ->where("nim",$nim)
                    ->update("tblmahasiswa",$data);
        
        return $this->db->affected_rows();
    }

    public function deleteMahasiswa($nim){
        $query = $this->db
                    ->where("nim",$nim)
                    ->delete("tblmahasiswa");
        
        return $query;
    }

    public function getMahasiswa($nim){
        $query = $this->db
                    ->where("nim",$nim)
                    ->get("tblmahasiswa");
        return $query->row();
    }

    // function save_image($data){		
    //     $this->db->insert('file',$data);
    //     return $this->db->affected_rows();
    // }
    
    function save_image($data){		
		$this->db->insert('tblgambar',$data);
    }
    
    public function deleteabsensi($nim){
        $query = $this->db
                    ->where("nim",$nim)
                    ->delete("tblabsensi");
        
        return $query;
    }
    public function deletegambar($nim){
        $query = $this->db
                    ->where("nim",$nim)
                    ->delete("tblgambar");
        
        return $query;
    }

    public function updategambar($nim,$data){
        $query = $this->db
                    ->where("nim",$nim)
                    ->update("tblgambar",$data);
        
        return $this->db->affected_rows();
    }
}