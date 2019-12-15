<?php
class Admin_model extends CI_Model{

    public function ambiladmin(){
        $query = $this->db
                    ->get("tbladmin");
        
        return $query;
    }

    public function createadmin($data){
        $query = $this->db
                    ->insert("tbladmin",$data);

        return $this->db->affected_rows();
    } 

    public function updateadmin($idadmin,$data){
        $query = $this->db
                    ->where("idadmin",$idadmin)
                    ->update("tbladmin",$data);
        
        return $this->db->affected_rows();
    }

    public function deleteadmin($idadmin){
        $query = $this->db
                    ->where("idadmin",$idadmin)
                    ->delete("tbladmin");
        
        return $query;
    }

    public function getadmin($idadmin){
        $query = $this->db
                    ->where("idadmin",$idadmin)
                    ->get("tbladmin");
        
        return $query->row();
    }

    function save_image($data){		
		$this->db->insert('tblgambar',$data);
	}
}