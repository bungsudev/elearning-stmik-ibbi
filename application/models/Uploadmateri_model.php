<?php

class Uploadmateri_model extends CI_Model{
    public function data(){
        $query = $this->db
                    ->get("tblmateri");        
        return $query;
    }

    public function pertemuan($mk){
        $query = $this->db
                    ->where('matakuliah',$mk)
                    ->select("max(pertemuan) as akhir")
                    ->get("tblmateri");        
        return $query;
    }

    public function upmateri($data){
        $query = $this->db
                    ->insert("tblmateri",$data);
        return $this->db->affected_rows();
    }

    public function updiskusi($data){
        $query = $this->db
                    ->insert("tblmateri",$data);
        return $this->db->affected_rows();
    }
    
}