<?php
class Jabatan_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model("HakAkses_Model");
    }

    public function insert_jabatan($nama, $deskripsi, $hak_akses){
        $sql="INSERT INTO jabatan (nama, deskripsi, created_at) VALUES (?,?,NOW())";
        $this->db->query($sql, array($nama, $deskripsi));

        $sql2 = "SELECT LAST_INSERT_ID() as id";
        $hasil = $this->db->query($sql2);
        $id = $hasil->row()->id;

        foreach($hak_akses as $id_hakAkses){
            $this->HakAkses_Model->insert_hakAkses($id, $id_hakAkses);
        }
    }

    public function get_allJabatan(){
        $sql = "SELECT j.*
                FROM jabatan j
                ORDER BY j.id ASC";
        $result = $this->db->query($sql);

        $jabatans = $result->result_array();

        foreach($jabatans as $jabatan){
            $hak_akses = $this->HakAkses_Model->get_hakAksesByIdJabatan($jabatan['id']);
            if(count($hak_akses) > 0){
                $jabatan["hak_akses"] = $hak_akses;
            }else{
                $jabatan["hak_akses"] = [];
            }
        }

        return $jabatans;
    }

    public function get_jabatanByIdUser($id_user){
        $sql = "SELECT j.*
                FROM jabatan j, user_jabatan uj
                WHERE uj.id_user = ? AND uj.id_jabatan = j.id
                ORDER BY j.id ASC";
        $result = $this->db->query($sql, array($id_user));

        $jabatans = $result->result_array();

        foreach($jabatans as $jabatan){
            $hak_akses = $this->HakAkses_Model->get_hakAksesByIdJabatan($jabatan['id']);
            if(count($hak_akses) > 0){
                $jabatan["hak_akses"] = $hak_akses;
            }else{
                $jabatan["hak_akses"] = [];
            }
        }
        return $jabatans;
    }
}