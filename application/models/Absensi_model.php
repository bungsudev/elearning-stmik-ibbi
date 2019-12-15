<?php

class Absensi_model extends CI_Model{

    public function ambilabsensi(){
        $query = $this->db
                ->select("b.namamhs,a.*")
                ->from("tblabsensi a")
                ->join("tblmahasiswa b","a.nim=b.nim","LEFT")
                ->order_by("a.kelompok","asc")
                ->get();        
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

    // SELECT b.namamhs, a.* FROM tblabsensi a LEFT JOIN tblmahasiswa b ON a.nim = b.nim WHERE b.nim='1513121497'
    public function ambilabsensifilter($nim){
        $query = $this->db
                ->select("b.namamhs,a.*")
                ->from("tblabsensi a")
                ->join("tblmahasiswa b","a.nim=b.nim","LEFT")
                ->where("a.nim",$nim)
                ->get();

        return $query;
    }
    // public function updateabsensi($nim,$data){
    //     $query = $this->db
    //                 ->where("nim",$nim)
    //                 ->update("tblabsensi",$data);
        
    //     return $this->db->affected_rows();
    // }
    
    function edit($nim,$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10,$a11,$a12,$a13,$a14,$a15,$a16){
        $query=$this->db->query("UPDATE tblabsensi SET a1='$a1',a2='$a2',a3='$a3',a4='$a4',a5='$a5',a6='$a6',a7='$a7',a8='$a8',a9='$a9',a10='$a10',a11='$a11',a12='$a12',a13='$a13',a14='$a14',a15='$a15',a16='$a16' WHERE nim='$nim'");
        return $query;
    }
    
 
    public function deleteabsensi($kdmk,$id){
        $query = $this->db
                    ->where("kodemk",$kdmk)
                    ->where("nim",$id)
                    ->delete("tblabsensi");
        
        return $query;
    }

    public function getabsensi($nim){
        $query = $this->db
                ->select("b.namamhs,a.*")
                ->from("tblabsensi a")
                ->join("tblmahasiswa b","a.nim=b.nim","LEFT")
                ->where("a.nim",$nim)
                ->get();
        
        return $query->row();
    }
}