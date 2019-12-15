<?php

class Materi_model extends CI_Model{

    public function ambilmateriup($mk){
        $query = $this->db
                    ->where("matakuliah",$mk)
                    ->where("tipe","m")
                    ->get("tblmateri");
        return $query;
    }

    public function ambilmateridis(){
        $query = $this->db
                    ->where("tipe","d")
                    ->get("tblmateri");
        return $query;
    }

    public function ambilmateridisfil($kdmk){
        $query = $this->db
                    ->where("matakuliah",$kdmk)
                    ->where("tipe","d")
                    ->get("tblmateri");
        return $query;
    }

    public function createmateri($data){
        $query = $this->db
                    ->insert("tblmateri",$data);

        return $this->db->affected_rows();
    }

    public function updatemateri($idmateri,$data){
        $query = $this->db
                    ->where("idmateri",$idmateri)
                    ->update("tblmateri",$data);
        
        return $this->db->affected_rows();
    }

    public function deletemateri($idmateri){
        $query = $this->db
                    ->where("idmateri",$idmateri)
                    ->delete("tblmateri");
        
        return $query;
    }

    public function getmateri($idmateri){
        $query = $this->db
                    ->where("idmateri",$idmateri)
                    ->get("tblmateri");        
        return $query->result();
    }
}