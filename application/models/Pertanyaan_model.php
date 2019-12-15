<?php

class Pertanyaan_model extends CI_Model{

    public function createsoales($data){
        $query = $this->db
                    ->insert("tblsoalesai",$data);
        return $this->db->affected_rows();
    }
    
    public function idvalid($idsoal){
        $query = $this->db
                    ->where('idsoal', $idsoal)
                    ->get("tblsoalesai");
        return $query->row();
    }

    public function ambilsoal($idsoal,$kdmk){
        $query = $this->db
                    ->where("idsoal",$idsoal)
                    ->where("matakuliah",$kdmk)
                    ->get("tblsoalesai");
        
        return $query;
    }

    public function deletesoal($idsoal,$noesai){
        $query = $this->db
                ->where("idsoal",$idsoal)
                ->where("noesai",$noesai)
                ->delete("tblsoalesai");        
        return $query;
    }

    public function delete($idsoal){
        $query = $this->db
                ->where("idsoal",$idsoal)
                ->delete("tblsoalesai");        
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
                    ->select("MAX(idsoal) AS akhir")
                    ->where("matakuliah",$kdmk)
                    ->get("tblsoalesai");        
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