<?php

class Soalterkirim_model extends CI_Model{ 
    public function ambilriwayat(){
        $query = $this->db
                    ->group_by("idsoalriw,tipesoal")
                    ->get("tblriwayatsoal");
        
        return $query;
    }

    public function ambilriwayatfil($kdmk){
        $query = $this->db
                    ->where("kodemk",$kdmk)
                    ->group_by("idsoalriw,tipesoal")
                    ->get("tblriwayatsoal");
        
        return $query;
    }

    public function getesai($idsoal){
        $query = $this->db
                    ->where("idsoal",$idsoal)
                    ->get("tblsoalesai");
        return $query;
    }

    public function getpilgan($idsoal){
        $query = $this->db
                    ->where("idsoalpil",$idsoal)
                    ->get("tblsoalpilgan");
        return $query;
    }
}