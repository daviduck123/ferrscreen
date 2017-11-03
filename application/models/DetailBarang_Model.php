<?php
class DetailBarang_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_detailBarang($id_barang, $id_merk, $type, $kode, $harga, $deskripsi){
        $this->db->trans_start();

    	$sql = "INSERT INTO `detail_barang`(`id_barang`, `id_merk`, `type`, `kode`, `harga`, `deskripsi`, `created_at`) VALUES (?,?,?,?,?,?,NOW())";
    	$this->db->query($sql, array($id_barang, $id_merk, $type, $kode, $harga, $deskripsi));

        $this->db->trans_complete();
    }

    public function update_detailBarang($id_barang, $id_merk, $type, $kode, $harga, $deskripsi){
        $this->db->trans_start();

    	$sql = "UPDATE `detail_barang` 
    			SET `id_merk`=?,`kode`=?,`harga`=?,`deskripsi`=?
    			WHERE id_barang = ? AND type = ?";
    	$this->db->query($sql, array($id_merk, $kode, $harga, $deskripsi, $id_barang, $type));

        $this->db->trans_complete();
    }

    public function delete_detailBarang($id_barang){
        $this->db->trans_start();

        $sql = "DELETE FROM detail_barang WHERE id_barang = ?";
        $this->db->query($sql, array($id_barang));

        $this->db->trans_complete();
    }

    public function delete_detailBarangByType($id_barang, $type){
        $this->db->trans_start();

        $sql = "DELETE FROM detail_barang WHERE id_barang = ? AND type = ?";
        $this->db->query($sql, array($id_barang, $type));

        $this->db->trans_complete();
    }

    public function get_allDetailBarangByIdBarang($id_barang){
        $sql = "SELECT db.*, m.nama as nama_merk 
        FROM detail_barang db, merk m
        WHERE db.id_barang = ? AND db.id_merk = m.id";
        $hasil = $this->db->query($sql, array($id_barang));
        return $hasil->result_array();
    }
}