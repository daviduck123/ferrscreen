<?php
class Merk_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_merk($nama, $keterangan){
        $this->db->trans_start();
        
        $sql="INSERT INTO merk (nama, keterangan, is_aktif, created_at) VALUES (?,?,?,NOW())";
        $hasil=$this->db->query($sql, array($nama, $keterangan, "1"));
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
                WHERE m.is_aktif=?
                ORDER BY m.nama ASC";
        $result = $this->db->query($sql, array("1"));
        return $result->result_array();
    }

    public function get_merkById($id){
        $sql = "SELECT m.*
                FROM merk m
                WHERE m.id = ? AND m.is_aktif=?";
        $result = $this->db->query($sql, array($id, "1"));
        return $result->result_array();
    }

    public function delete_merk($id){
        $sql = "UPDATE merk SET is_aktif = ? WHERE id = ?";
        return $this->db->query($sql, array("0", $id));
    }
}