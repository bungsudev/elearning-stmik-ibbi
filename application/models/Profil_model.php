<?php

class Profil_model extends CI_Model{
 
    public function ambil($userid){
        $query = $this->db
                    ->where('idadmin',$userid)
                    ->get("tbladmin");        
        return $query->row();
    }
    public function updateUser($userid,$data){
        $query = $this->db
                    ->where("idadmin",$userid)
                    ->update("tbladmin",$data);
        
        return $this->db->affected_rows();
    }

    public function cekLogin($userid,$password){
        $query = $this->db
                    ->where("idadmin",$userid)
                    ->where("password",$password)
                    ->get("tbladmin");
        
        return $query;
    }
    
    public function ambilmhs($nim){
        $query = $this->db
                    ->where('nim',$nim)
                    ->get("tblmahasiswa");        
        return $query->row();
    }

    public function updatemhs($nim,$data){
        $query = $this->db
                    ->where("nim",$nim)
                    ->update("tblmahasiswa",$data);
        
        return $this->db->affected_rows();
    }

    public function cekLoginmhs($userid,$password){
        $query = $this->db
                    ->where("nim",$userid)
                    ->where("password",$password)
                    ->get("tblmahasiswa");
        
        return $query;
    }
}