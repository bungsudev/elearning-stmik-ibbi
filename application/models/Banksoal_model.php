<?php

class Banksoal_model extends CI_Model{

    public function ambilpilgan(){
        $query = $this->db
                    ->select('*, count(idsoalpil) AS jumlah')
                    ->group_by("idsoalpil")
                    ->get("tblsoalpilgan");
                    
        
        return $query;
    }

    public function ambilabsensifilter($nim){
        $query = $this->db
                ->select("a.*,b.*")
                ->from("tblsoalesai a")
                ->join("tblsoalpilgan b","a.matakuliah=b.matakuliah","LEFT")
                ->where("a.nim",$nim)
                ->get();

        return $query;
    }


    public function ambilesai(){
        $query = $this->db
                    ->select('*, count(idsoal) AS jumlah')
                    ->group_by("idsoal")
                    ->get("tblsoalesai");
        
        return $query;
    }
    
    public function deletepilgan($idsoalpil){
        $query = $this->db
                    ->where("idsoalpil",$idsoalpil)
                    ->delete("tblsoalpilgan");
        
        return $query;
    }

    public function deleteesai($idsoal){
        $query = $this->db
                    ->where("idsoal",$idsoal)
                    ->delete("tblsoalesai");
        
        return $query;
    }

    public function createbanksoal($data){
        $query = $this->db
                    ->insert("tblsoalpilgan",$data);

        return $this->db->affected_rows();
    }

    public function updatebanksoal($idpilgan,$data){
        $query = $this->db
                    ->where("idpilgan",$idpilgan)
                    ->update("tblsoalpilgan",$data);
        
        return $this->db->affected_rows();
    }
    
    public function getbanksoal($idpilgan){
        $query = $this->db
                    ->where("idpilgan",$idpilgan)
                    ->get("tblsoalpilgan");
        
        return $query->row();
    }

    public function kirimsoal($data){
        $query = $this->db
                    ->insert("tblriwayatsoal",$data);
        return $this->db->affected_rows();
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

    public function getmahasiswa($kirsem,$kirprodi){
        $query = $this->db
                    ->select("nim,namamhs,prodi,semester")
                    ->where("semester",$kirsem)
                    ->where("prodi",$kirprodi)
                    ->get("tblmahasiswa");        
        return $query;
    }
}