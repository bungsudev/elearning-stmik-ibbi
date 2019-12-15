<?php 

class Absensimhs_model extends CI_Model{
    public function ambilabsensi($nim){
        $query = $this->db
                ->select("b.namamhs,a.*")
                ->from("tblabsensi a")
                ->join("tblmahasiswa b","a.nim=b.nim","LEFT")
                ->where("a.nim",$nim)
                ->get();        
        return $query;
    }
 
    public function getabsensi($nim){
        $query = $this->db
                    ->where("nim",$nim)                    
                    ->get("tblabsensi");
        return $query;
    }

    public function dataabsensi($kdmk,$kelas){
        $query = $this->db
                    ->where("kodemk",$kdmk)
                    ->where("kelas",$kelas)
                    ->order_by("kelompok","asc")
                    ->get("tblabsensi");                    
        return $query;
    }
    
}