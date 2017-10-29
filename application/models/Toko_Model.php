<?php
class Toko_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_toko($kode, $email, $nama, $cp, $alamat, $kode_pos, $telp, $hp, $fax, $limit, $jatuh_tempo, $id_kota){
        $this->db->trans_start();

        $sql="INSERT INTO `toko`(`kode`, `email`, `nama`, `contact_person`, `alamat`, `kode_pos`, `telp`, `hp`, `fax`, `limit_piutang`, `jatuh_tempo`, `is_aktif`, `id_kota`, `created_at`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
        $this->db->query($sql, array($kode, $email, $nama, $cp, $alamat, $kode_pos, $telp, $hp, $fax, $limit, $jatuh_tempo, "1", $id_kota));

        $this->db->trans_complete();

        $id = $this->db->insert_id();

        return $id;
    }

    public function update_toko($kode, $email, $nama, $cp, $alamat, $kode_pos, $telp, $hp, $fax, $limit, $jatuh_tempo, $is_aktif, $id_kota, $id){
        $this->db->trans_start();

        $sql="UPDATE `toko` 
            SET `kode`=?,`email`=?,`nama`=?,`contact_person`=?,`alamat`=?,`kode_pos`=?,`telp`=?,`hp`=?,`fax`=?,`limit_piutang`=?,`jatuh_tempo`=?,`is_aktif`=?,`id_kota`=?
            WHERE id = ?";
        $this->db->query($sql, array($kode, $email, $nama, $cp, $alamat, $kode_pos, $telp, $hp, $fax, $limit, $jatuh_tempo, $is_aktif, $id_kota, $id));

        $this->db->trans_complete();

        return $id;
    }

    public function get_allToko(){
        $sql = "SELECT c.*, k.nama as nama_kota
                FROM toko c, kota k
                WHERE c.id_kota = k.id
                ORDER BY c.nama ASC";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_allTokoByStatus($aktif){
        $sql = "SELECT c.*, k.nama as nama_kota
                FROM toko c, kota k
                WHERE c.id_kota = k.id AND c.is_aktif = ?
                ORDER BY c.nama ASC";
        $result = $this->db->query($sql, array($aktif));
        return $result->result_array();
    }

    public function get_allTokoByIdKota($id_kota){
        $sql = "SELECT c.*, k.nama as nama_kota
                FROM toko c, kota k
                WHERE c.id_kota = k.id AND c.id_kota = ?
                ORDER BY c.nama ASC";
        $result = $this->db->query($sql, array($id_kota));
        return $result->result_array();
    }

    public function get_allTokoByIdProvinsi($id_provinsi){
        $sql = "SELECT c.*, k.nama as nama_kota
                FROM toko c, kota k
                WHERE c.id_kota = k.id AND k.id_provinsi = ?
                ORDER BY c.nama ASC";
        $result = $this->db->query($sql, array($id_provinsi));
        return $result->result_array();
    }

//Teet
}