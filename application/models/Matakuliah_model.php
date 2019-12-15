<?php

class Matakuliah_model extends CI_Model{

    public function ambilmatakuliahall(){
        $query = $this->db
                    ->get("tblmatakuliah");        
        return $query;
    }

    public function ambilmatakuliah($prodi,$semester){
        $query = $this->db
                    ->where("prodi",$prodi)
                    ->where("semester",$semester)
                    ->get("tblmatakuliah");
        
        return $query;
    }

    public function creatematakuliah($data){
        $query = $this->db
                    ->insert("tblmatakuliah",$data);

        return $this->db->affected_rows();
    }

    public function updatematakuliah($kodemk,$data){
        $query = $this->db
                    ->where("kodemk",$kodemk)
                    ->update("tblmatakuliah",$data);
        
        return $this->db->affected_rows();
    }

    public function deletematakuliah($kodemk){
        $query = $this->db
                    ->where("kodemk",$kodemk)
                    ->delete("tblmatakuliah");
        
        return $query;
    }

    public function getmatakuliah($kodemk){
        $query = $this->db
                    ->where("kodemk",$kodemk)
                    ->get("tblmatakuliah");
        
        return $query->row();
    }
}