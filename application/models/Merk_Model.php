<?php
class Merk_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_merk($nama, $keterangan){
        $this->db->trans_start();
        
        $sql="INSERT INTO merk (nama, keterangan, created_at) VALUES (?,?,NOW())";
        $hasil=$this->db->query($sql, array($nama, $keterangan));
        $id = $this->db->insert_id();

        $this->db->trans_complete();
        return $id;
    }


    public function update_merk($id, $nama, $keterangan){
        $this->db->trans_start();
        
        $sql="UPDATE merk SET nama=?, keterangan=? WHERE id = ?";
        $hasil=$this->db->query($sql, array($nama, $keterangan, $id));

        $this->db->trans_complete();
        return $id;
    }

    public function get_allMerk(){
        $sql = "SELECT m.*
                FROM merk m
                ORDER BY m.nama ASC";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_merkById($id){
        $sql = "SELECT m.*
                FROM merk m
                WHERE m.id = ?";
        $result = $this->db->query($sql, array($id));
        return $result->result_array();
    }

    public function delete_merk($id){
        $sql = "DELETE FROM merk WHERE id = ?";
        return $this->db->query($sql, array($id));
    }
}