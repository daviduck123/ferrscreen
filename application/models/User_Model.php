<?php
class User_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model("Jabatan_Model");
        $this->load->model("UserJabatan_Model");
    }

    public function insert_user($email, $nama, $alamat, $telp, $hp, $deskripsi, $tgl_masuk, $tgl_keluar, $id_kota){
        $sql="INSERT INTO `user`(`email`, `nama`, `alamat`, `telp`, `hp`, `deskripsi`, `tgl_masuk`, `tgl_keluar`, `is_aktif`, `id_kota`, `created_at`) VALUES (?,?,?,?,?,?,?,?,1,?,NOW())";
        $this->db->query($sql, array($email, $nama, $alamat, $telp, $hp, $deskripsi, $tgl_masuk, $tgl_keluar, $id_kota));
    }

    public function update_user($email, $nama, $alamat, $telp, $hp, $deskripsi, $tgl_masuk, $tgl_keluar, $is_aktif, $id_kota, $id, $jabatans){
        $sql = "UPDATE `user`
                SET `email`=?,`nama`=?,`alamat`=?,`telp`=?,`hp`=?,`deskripsi`=?,`tgl_masuk`=?,`tgl_keluar`=?,`is_aktif`=?,`id_kota`=?
                WHERE id = ?";
        $this->db->query($sql, array($email, $nama, $alamat, $telp, $hp, $deskripsi, $tgl_masuk, $tgl_keluar, $is_aktif, $id_kota, $id));

        if(count($jabatans) > 0){
            //Delete yang lama
            $this->UserJabatan_Model->delete_userJabatanByIdUser($id);

            foreach($jabatan as $id_jabatan){
                //$jabatan = [0,1,2,3,4,5,6,7,8,9,10]
                $this->UserJabatan_Model->insert_userJabatan($id, $id_jabatan);
            }
        }
    }

    public function get_allUser(){
        $sql = "SELECT u.*
                FROM user u
                ORDER BY u.nama ASC";
        $result = $this->db->query($sql);

        $users = $result->result_array();

        foreach($users as $user){
            $jabatans = $this->Jabatan_Model->get_jabatanByIdUser($user['id']);
            if(count($jabatans) > 0){
                $user["jabatan"] = $jabatans;
            }else{
                $user["jabatan"] = [];
            }
        }
        return $users;
    }

    public function get_userById($id){
        $sql = "SELECT u.*
                FROM user u
                WHERE u.id = ?
                ORDER BY u.nama ASC";
        $result = $this->db->query($sql, array($id)));
        $users = $result->result_array();

        foreach($users as $user){
            $jabatans = $this->Jabatan_Model->get_jabatanByIdUser($user['id']);
            if(count($jabatans) > 0){
                $user["jabatan"] = $jabatans;
            }else{
                $user["jabatan"] = [];
            }
        }
        return $users;
    }
}