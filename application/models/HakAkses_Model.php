<?php
class HakAkses_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_hakAkses($id_jabatan, $id_hakAkses){
        $this->db->trans_start();

        $sql="INSERT INTO jabatan_hak_akses (id_jabatan, id_hak_akses, created_at) VALUES (?,?,NOW())";
        $this->db->query($sql, array($id_jabatan, $id_hakAkses));

        $this->db->trans_complete();
    }

    public function get_allHakAkses(){
        $sql = "SELECT h.*
                FROM hak_akses h
                ORDER BY h.id ASC";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_hakAksesByIdJabatan($id_jabatan){
         $sql = "SELECT h.*
                FROM hak_akses h, jabatan_hak_akses jh
                WHERE jh.id_jabatan = ? AND uj.id_hak_akses = h.id
                ORDER BY h.id ASC";
        $result = $this->db->query($sql, array($id_jabatan));
        return $result->result_array();
    }

}