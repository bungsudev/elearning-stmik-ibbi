<?php

class Home_model extends CI_Model{
    public function ambil(){
        $query = $this->db
                    ->get("tblpengumuman");        
        return $query;
    }

    public function buatpeng($data){
        $query = $this->db
                    ->insert("tblpengumuman",$data);
        return $this->db->affected_rows();
    }

    public function delete($id){
        $query = $this->db
                    ->where("idpengumuman",$id)
                    ->delete("tblpengumuman");
        
        return $query;
    }
}