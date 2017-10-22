<?php
class Supplier_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_supplier($email, $nama, $cp, $alamat, $kode_pos, $telp, $hp, $fax, $limit, $jatuh_tempo, $id_kota){
        $sql="INSERT INTO `supplier`(`email`, `nama`, `contact_person`, `alamat`, `kode_pos`, `telp`, `hp`, `fax`, `limit_hutang`, `jatuh_tempo`, `is_aktif`, `id_kota`, `created_at`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
        $this->db->query($sql, array($email, $nama, $cp, $alamat, $kode_pos, $telp, $hp, $fax, $limit, $jatuh_tempo, 1, $id_kota));
    }

    public function update_supplier($email, $nama, $cp, $alamat, $kode_pos, $telp, $hp, $fax, $limit, $jatuh_tempo, $is_aktif, $id_kota, $id){
        $sql="UPDATE `supplier` 
            SET `email`=?,`nama`=?,`contact_person`=?,`alamat`=?,`kode_pos`=?,`telp`=?,`hp`=?,`fax`=?,`limit_hutang`=?,`jatuh_tempo`=?,`is_aktif`=?,`id_kota`=?
            WHERE id = ?";
        $this->db->query($sql, array($email, $nama, $cp, $alamat, $kode_pos, $telp, $hp, $fax, $limit, $jatuh_tempo, $is_aktif, $id_kota, $id));
    }

    public function get_allSupplier(){
        $sql = "SELECT c.*, k.nama as nama_kota
                FROM supplier c, kota k
                WHERE c.id_kota = k.id
                ORDER BY c.nama ASC";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function get_allSupplierByStatus($aktif){
        $sql = "SELECT c.*, k.nama as nama_kota
                FROM supplier c, kota k
                WHERE c.id_kota = k.id AND c.is_aktif = ?
                ORDER BY c.nama ASC";
        $result = $this->db->query($sql, array($aktif));
        return $result->result_array();
    }

    public function get_allSupplierByIdKota($id_kota){
        $sql = "SELECT c.*, k.nama as nama_kota
                FROM supplier c, kota k
                WHERE c.id_kota = k.id AND c.id_kota = ?
                ORDER BY c.nama ASC";
        $result = $this->db->query($sql, array($id_kota));
        return $result->result_array();
    }

    public function get_allSupplierByIdProvinsi($id_provinsi){
        $sql = "SELECT c.*, k.nama as nama_kota
                FROM supplier c, kota k
                WHERE c.id_kota = k.id AND k.id_provinsi = ?
                ORDER BY c.nama ASC";
        $result = $this->db->query($sql, array($id_provinsi));
        return $result->result_array();
    }


}