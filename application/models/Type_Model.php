<?php
class Type_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_type($nama, $deskripsi){
        $this->db->trans_start();
        
        $sql="INSERT INTO type (nama, deskripsi, created_at) VALUES (?,?,NOW())";
        $hasil=$this->db->query($sql, array($nama, $deskripsi));
        $id = $this->db->insert_id();

        $this->db->trans_complete();
        return $id;
    }


    public function update_type($id, $nama, $deskripsi){
        $this->db->trans_start();
        
        $sql="UPDATE type SET nama=?, deskripsi=? WHERE id = ?";
        $hasil=$this->db->query($sql, array($nama, $deskripsi, $id));

        $this->db->trans_complete();
        return $id;
    }

    public function get_allType(){
        $sql = "SELECT y.*
                FROM type y
                ORDER BY y.nama ASC";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_typeById($id){
        $sql = "SELECT y.*
                FROM type y
                WHERE y.id = ?";
        $result = $this->db->query($sql, array($id));
        return $result->result_array();
    }
}