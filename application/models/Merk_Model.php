<?php
class Merk_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_merk($nama, $keterangan){
        $sql="INSERT INTO merk (nama, keterangan, created_at) VALUES (?,?,NOW())";
        $hasil=$this->db->query($sql, array($nama, $keterangan));
        return $hasil->row()->id;
    }

    public function get_allMerk(){
        $sql = "SELECT m.*
                FROM merk m
                ORDER BY m.nama ASC";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
}