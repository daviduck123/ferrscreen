<?php
class User_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model("Jabatan_Model");
        $this->load->model("UserJabatan_Model");
    }

    public function insert_user($email, $nama, $alamat, $telp, $hp, $deskripsi, $tgl_masuk, $tgl_keluar, $id_kota, $id_jabatan){
        $this->db->trans_start();

        $sql="INSERT INTO `user`(`email`, `nama`, `alamat`, `telp`, `hp`, `deskripsi`, `tgl_masuk`, `tgl_keluar`, `is_aktif`, `id_kota`, `created_at`) VALUES (?,?,?,?,?,?,?,?,?,?,NOW())";
        $this->db->query($sql, array($email, $nama, $alamat, $telp, $hp, $deskripsi, $tgl_masuk, $tgl_keluar, "1", $id_kota));

        $id = $this->db->insert_id();

        if(count($id_jabatan)){
            $this->UserJabatan_Model->insert_userJabatan($id, $id_jabatan);
        }

        $this->db->trans_complete();

        return $id;
    }

    public function update_user($email, $nama, $alamat, $telp, $hp, $deskripsi, $tgl_masuk, $tgl_keluar, $is_aktif, $id_kota, $id, $id_jabatan){
        $this->db->trans_start();

        $sql = "UPDATE `user`
                SET `email`=?,`nama`=?,`alamat`=?,`telp`=?,`hp`=?,`deskripsi`=?,`tgl_masuk`=?,`tgl_keluar`=?,`is_aktif`=?,`id_kota`=?
                WHERE id = ?";
        $this->db->query($sql, array($email, $nama, $alamat, $telp, $hp, $deskripsi, $tgl_masuk, $tgl_keluar, $is_aktif, $id_kota, $id));

        if(count($id_jabatan) > 0){
            //Delete yang lama
            $this->UserJabatan_Model->delete_userJabatanByIdUser($id);
            
            $this->UserJabatan_Model->insert_userJabatan($id, $id_jabatan);
        }

        $this->db->trans_complete();
        
        return $id;
    }

    public function get_allUser(){
        $sql = "SELECT u.*, k.nama as nama_kota
                FROM user u, kota k
                WHERE u.id_kota = k.id
                ORDER BY u.nama ASC";
        $result = $this->db->query($sql);

        $users = $result->result_array();
        $users2 = [];
        foreach($users as $user){
            $jabatans = $this->Jabatan_Model->get_jabatanByIdUser($user['id']);
            if(count($jabatans) > 0){
                $user["jabatan"] = $jabatans;
            }else{
                $user["jabatan"] = [];
            }
            array_push($users2, $user);
        }
        return $users2;
    }

    public function get_userById($id){
        $sql = "SELECT u.*, k.nama as nama_kota
                FROM user u, kota k
                WHERE u.id = ? AND u.id_kota = k.id
                ORDER BY u.nama ASC";
        $result = $this->db->query($sql, array($id));
        $users = $result->result_array();
        $users2 = [];
        foreach($users as $user){
            $jabatans = $this->Jabatan_Model->get_jabatanByIdUser($user['id']);
            if(count($jabatans) > 0){
                $user["jabatan"] = $jabatans;
            }else{
                $user["jabatan"] = [];
            }
            array_push($users2, $user);
        }
        return $users2;
    }
}