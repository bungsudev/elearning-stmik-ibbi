<?php

class Nilaimhs_model extends CI_Model{

    public function ambilriwayat($nim,$prodi,$semester){
        $query = $this->db
                    ->where("nim",$nim)
                    ->where("prodi",$prodi)
                    ->where("semester",$semester)
                    ->where("status","selesai")
                    ->order_by("tanggal","asc")
                    ->LIMIT(3)
                    ->get("tblriwayatsoal");
        
        return $query;
    }

    public function ambildata($nim,$prodi,$semester,$tipetugas){
        $query = $this->db
                    ->where("nim",$nim)
                    ->where("prodi",$prodi)
                    ->where("semester",$semester)
                    ->where("tipetugas",$tipetugas)
                    ->where("status","selesai")                    
                    ->order_by("tanggal","asc")
                    ->get("tblriwayatsoal");
        
        return $query;
    }
}