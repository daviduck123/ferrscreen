<?php
class UserJabatan_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_userJabatan($id_user, $id_jabatan){
        $sql="INSERT INTO `user_jabatan`(`id_user`, `id_jabatan`, `created_at`) VALUES (?,?,NOW())";
        $this->db->query($sql, array($id_user, $id_jabatan));
    }

    public function delete_userJabatan($id_user, $id_jabatan){
        $sql = "DELETE FROM user_jabatan WHERE id_user = ? AND id_jabatan = ?";
        $this->db->query($sql, array($id_user, $id_jabatan));
    }

    public function delete_userJabatanByIdUser($id_user){
        $sql = "DELETE FROM user_jabatan WHERE id_user = ?";
        $this->db->query($sql, array($id_user));
    }
}