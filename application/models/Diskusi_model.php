<?php

class Diskusi_model extends CI_Model{
    public function ambildiskusi($prodi,$semester,$matakuliah){
        $query = $this->db
                    ->where("prodi",$prodi)
                    ->where("semester",$semester)
                    ->where("matakuliah",$matakuliah)
                    ->where("tipe","d")
                    ->get("tblmateri");
        
        return $query;
    }

    public function getdiskusi($pertemuan,$kdmk){
        $query = $this->db
                    ->where("pertemuan",$pertemuan)
                    ->where("matakuliah",$kdmk)
                    ->get("tblmateri");
        return $query;
    }

    public function ambilkomen($idmateri){
        $query = $this->db
                    ->where("idmateri",$idmateri)
                    ->get("tbldiskusi");        
        return $query;
    }

    public function createkomen($data){
        $query = $this->db
                    ->insert("tbldiskusi",$data);
        return $this->db->affected_rows();
    }

    public function deletekomen($iddiskusi){
        $query = $this->db
                ->where("iddiskusi",$iddiskusi)
                ->delete("tbldiskusi");        
        return $query;
    }
}