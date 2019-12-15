<?php

class Pertanyaanpil_model extends CI_Model{

    public function createsoalpil($data){
        $query = $this->db
                    ->insert("tblsoalpilgan",$data);
        return $this->db->affected_rows();
    }
    
    public function ambilsoalpil($idsoalpil,$kdmk){
        $query = $this->db
                    ->where("matakuliah",$kdmk)
                    ->where("idsoalpil",$idsoalpil)
                    ->get("tblsoalpilgan");
        
        return $query;
    }

    public function deletesoal($idsoalpil,$nopilgan){ 
        $query = $this->db
                ->where("idsoalpil",$idsoalpil)
                ->where("nopilgan",$nopilgan)
                ->delete("tblsoalpilgan");        
        return $query;
    }

    public function delete($idsoalpil){
        $query = $this->db
                ->where("idsoalpil",$idsoalpil)
                ->delete("tblsoalpilgan");        
        return $query;
    }
    
    public function kirimsoal($data){
        $query = $this->db
                    ->insert("tblriwayatsoal",$data);
        return $this->db->affected_rows();
    }

    public function getmahasiswa($kirsem,$kirprodi){
        $query = $this->db
                    ->select("nim,namamhs,prodi,semester")
                    ->where("semester",$kirsem)
                    ->where("prodi",$kirprodi)
                    ->get("tblmahasiswa");        
        return $query;
    }

    public function cekpertemuan($kdmk){
        $query = $this->db
                    ->select("MAX(idsoalpil) AS akhir")
                    ->where("matakuliah",$kdmk)
                    ->get("tblsoalpilgan");        
        return $query;
    }

    public function cekp($kdmk){
        $sql = ("SELECT MAX(idsoal) AS akhir
        FROM (
        SELECT idsoal FROM tblsoalesai  WHERE matakuliah = '$kdmk'
            UNION
            SELECT idsoalpil FROM tblsoalpilgan WHERE matakuliah = '$kdmk'
        ) as CHILD"); 

        $query = $this->db->query($sql);
        return $query->result_array();
    }
}