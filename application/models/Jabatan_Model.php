<?php
class Jabatan_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model("HakAkses_Model");
    }

    public function insert_jabatan($nama, $deskripsi, $hak_akses){
        $this->db->trans_start();

        $sql="INSERT INTO jabatan (nama, deskripsi, created_at) VALUES (?,?,NOW())";
        $this->db->query($sql, array($nama, $deskripsi));

        $sql2 = "SELECT LAST_INSERT_ID() as id";
        $hasil = $this->db->query($sql2);
        $id = $hasil->row()->id;

        if(count($hak_akses) > 0){
            //$hakAkses = [0,1,2,3,]
            foreach($hak_akses as $id_hakAkses){
                $this->HakAkses_Model->insert_hakAkses($id, $id_hakAkses);
            }
        }

        $this->db->trans_complete();

        return $id;
    }

    public function update_jabatan($id, $nama, $deskripsi, $hak_akses){
        $this->db->trans_start();

        $sql="UPDATE jabatan SET nama=?, deskripsi=? WHERE id = ?";
        $this->db->query($sql, array($nama, $deskripsi, $id));

        if(count($hak_akses) > 0){
            //delete first and then insert again
            $this->HakAkses_Model->delete_hakAksesJabatan($id);

            //$hakAkses = [0,1,2,3,]
            foreach($hak_akses as $id_hakAkses){
                $this->HakAkses_Model->insert_hakAkses($id, $id_hakAkses);
            }
        }

        $this->db->trans_complete();

        return $id;
    }

    public function get_allJabatan(){
        $sql = "SELECT j.*
                FROM jabatan j
                ORDER BY j.id ASC";
        $result = $this->db->query($sql);

        $jabatans = $result->result_array();
        $jabatans2 = [];
        foreach($jabatans as $jabatan){
            $hak_akses = $this->HakAkses_Model->get_hakAksesByIdJabatan($jabatan['id']);
            if(count($hak_akses) > 0){
                $jabatan["hak_akses"] = $hak_akses;
            }else{
                $jabatan["hak_akses"] = [];
            }

            array_push($jabatans2, $jabatan);
        }
        return $jabatans2;
    }

    public function get_jabatanByIdUser($id_user){
        $sql = "SELECT j.*
                FROM jabatan j, user_jabatan uj
                WHERE uj.id_user = ? AND uj.id_jabatan = j.id
                ORDER BY j.id ASC";
        $result = $this->db->query($sql, array($id_user));
        $jabatans = $result->result_array();

        $jabatans2 = [];
        foreach($jabatans as $jabatan){
            $hak_akses = $this->HakAkses_Model->get_hakAksesByIdJabatan($jabatan['id']);
            if(count($hak_akses) > 0){
                $jabatan["hak_akses"] = $hak_akses;
            }else{
                $jabatan["hak_akses"] = [];
            }

            array_push($jabatans2, $jabatan);
        }

        return $jabatans2;
    }

    public function get_jabatanById($id){
        $sql = "SELECT j.*
                FROM jabatan j 
                WHERE j.id = ?
                ORDER BY j.id ASC";
        $result = $this->db->query($sql, array($id));

        $jabatans = $result->result_array();
        $jabatans2 = [];
        foreach($jabatans as $jabatan){
            $hak_akses = $this->HakAkses_Model->get_hakAksesByIdJabatan($jabatan['id']);
            if(count($hak_akses) > 0){
                $jabatan["hak_akses"] = $hak_akses;
            }else{
                $jabatan["hak_akses"] = [];
            }

            array_push($jabatans2, $jabatan);
        }

        return $jabatans2;
    }
}