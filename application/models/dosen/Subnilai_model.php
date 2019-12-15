<?php
 
class Subnilai_model extends CI_Model{
    public function getkoreksi($tipetugas,$kdmk){
        $query = $this->db
                    ->where('kodemk',$kdmk)
                    ->where('tipetugas',$tipetugas)
                    ->where('status','proses')
                    ->get("tblriwayatsoal");
        return $query;
    }

    public function getkoreksikel($kdmk){
        $query = $this->db
                    ->where('kodemk',$kdmk)
                    ->where('tipetugas','kelompok')
                    ->where('status','proses')
                    ->group_by('kelompok')
                    ->get("tblriwayatsoal");
        return $query;
    }
 
    public function getterupdate($tipetugas,$kodemk){
        $query = $this->db
                    ->where('tipetugas',$tipetugas)
                    ->where('kodemk',$kodemk)
                    ->where('status','selesai')
                    ->get("tblriwayatsoal");
        return $query;
    }

    public function ambilkoreksi($tipetugas){
        $query = $this->db
                ->select("b.nim,b.namamhs,b.prodi,b.kelas,a.*")
                ->from("tblriwayatnilai a")
                ->join("tblmahasiswa b","a.nim=b.nim","LEFT")
                ->where("a.tipetugas",$tipetugas)
                ->where("a.status","proses")
                ->group_by("idsoal,tipesoal")
                ->get();        
        return $query;
    }

    public function ambilterupdate($tipetugas){
        $query = $this->db
                ->select("b.nim,b.namamhs,b.prodi,b.kelas,a.*")
                ->from("tblriwayatnilai a")
                ->join("tblmahasiswa b","a.nim=b.nim","LEFT")
                ->where("a.tipetugas",$tipetugas)
                ->where("a.status","selesai")
                ->order_by("tanggal","asc")
                ->get();        
        return $query;
    }

    public function ambilriwayat($nim,$tipetugas){
        $query = $this->db
                ->select("b.nim,b.namamhs,b.prodi,b.kelas,a.*")
                ->from("tblriwayatnilai a")
                ->join("tblmahasiswa b","a.nim=b.nim","LEFT")
                ->where("a.nim",$nim)
                ->where("a.tipetugas",$tipetugas)
                ->where("a.status","selesai")
                ->order_by("tanggal","asc")
                ->group_by("idsoal")
                ->get();        
        return $query;
    } 

    // public function ambilriwayatnilai($nim,$tipesoal,$idsoal){
    //     $query = $this->db
    //                 ->where("nim",$nim)
    //                 ->where("tipesoal",$tipesoal)
    //                 ->where("idsoal",$idsoal)
    //                 ->get("tblriwayatnilai");
    //     return $query;
    // }

    public function tampilsoalselesai($nim,$tipesoal,$idsoal){
        $query = $this->db
                    ->where("nim",$nim)
                    ->where("tipesoal",$tipesoal)
                    ->where("idsoal",$idsoal)
                    ->get("tblriwayatnilai");
        return $query;
    }

    public function updatenilai($nim,$tipesoal,$idsoal,$data){
        $query = $this->db
                    ->where("nim",$nim)
                    ->where("tipesoal",$tipesoal)
                    ->where("idsoalriw",$idsoal)
                    ->where("status","proses")
                    ->update("tblriwayatsoal",$data);   
        return $this->db->affected_rows();
    }

    public function updatenilai2($nim,$tipesoal,$idsoal,$data){
        $query = $this->db
                    ->where("nim",$nim)
                    ->where("tipesoal",$tipesoal)
                    ->where("idsoal",$idsoal)
                    ->where("status","proses")
                    ->update("tblriwayatnilai",$data);   
        return $this->db->affected_rows();
    }

    public function updatenilaikel($kelompok,$tipesoal,$idsoal,$data){
        $query = $this->db
                    ->where("kelompok",$kelompok)
                    ->where("tipesoal",$tipesoal)
                    ->where("idsoalriw",$idsoal)
                    ->where("status","proses")
                    ->update("tblriwayatsoal",$data);   
        return $this->db->affected_rows();
    }

    public function updatenilaikel2($kelompok,$tipesoal,$idsoal,$data){
        $query = $this->db
                    ->where("kelompok",$kelompok)
                    ->where("tipesoal",$tipesoal)
                    ->where("idsoal",$idsoal)
                    ->where("status","proses")
                    ->update("tblriwayatnilai",$data);   
        return $this->db->affected_rows();
    }
}