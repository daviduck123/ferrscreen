<?php
class Supplier_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_supplier($email, $nama, $cp, $alamat, $kode_pos, $telp, $hp, $fax, $limit, $jatuh_tempo, $id_kota){
        $this->db->trans_start();

        $sql="INSERT INTO `supplier`(`email`, `nama`, `contact_person`, `alamat`, `kode_pos`, `telp`, `hp`, `fax`, `limit_hutang`, `jatuh_tempo`, `is_aktif`, `id_kota`, `created_at`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,NOW())";
        $this->db->query($sql, array($email, $nama, $cp, $alamat, $kode_pos, $telp, $hp, $fax, $limit, $jatuh_tempo, "1", $id_kota));
        $id = $this->db->insert_id();

        $this->db->trans_complete();
        return $id;
    }

    public function update_supplier($id,$email, $nama, $cp, $alamat, $kode_pos, $telp, $hp, $fax, $limit, $jatuh_tempo, $is_aktif, $id_kota){
        $this->db->trans_start();

        $sql="UPDATE `supplier` 
            SET `email`=?,`nama`=?,`contact_person`=?,`alamat`=?,`kode_pos`=?,`telp`=?,`hp`=?,`fax`=?,`limit_hutang`=?,`jatuh_tempo`=?,`is_aktif`=?,`id_kota`=?
            WHERE id = ?";
        $this->db->query($sql, array($email, $nama, $cp, $alamat, $kode_pos, $telp, $hp, $fax, $limit, $jatuh_tempo, $is_aktif, $id_kota, $id));

        $this->db->trans_complete();

        return $id;
    }

    public function get_allSupplier(){
        $sql = "SELECT c.*, k.nama as nama_kota
                FROM supplier c, kota k
                WHERE c.id_kota = k.id AND c.is_aktif = ?
                ORDER BY c.nama ASC";
        $result = $this->db->query($sql, array("1"));
        return $result->result_array();
    }

    public function get_supplierById($id){
        $sql = "SELECT c.*, k.nama as nama_kota
                FROM supplier c, kota k
                WHERE c.id_kota = k.id and c.id=?
                ORDER BY c.nama ASC";
        $result = $this->db->query($sql,array($id));
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
                WHERE c.id_kota = k.id AND c.id_kota = ? AND c.is_aktif = ?
                ORDER BY c.nama ASC";
        $result = $this->db->query($sql, array($id_kota, "1"));
        return $result->result_array();
    }

    public function get_allSupplierByIdProvinsi($id_provinsi){
        $sql = "SELECT c.*, k.nama as nama_kota
                FROM supplier c, kota k
                WHERE c.id_kota = k.id AND k.id_provinsi = ? AND c.is_aktif=?
                ORDER BY c.nama ASC";
        $result = $this->db->query($sql, array($id_provinsi, "1"));
        return $result->result_array();
    }

    public function delete_supplier($id){
        $sql = "UPDATE supplier SET is_aktif=? WHERE id = ?";
        return $this->db->query($sql, array("0", $id));
    }

}