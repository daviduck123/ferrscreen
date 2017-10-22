<?php
class DetailBarang_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_detailBarang($id_barang, $id_merk, $type, $kode, $harga, $deskripsi){
    	$sql = "INSERT INTO `detail_barang`(`id_barang`, `id_merk`, `type`, `kode`, `harga`, `deskripsi`, `created_at`) VALUES (?,?,?,?,?,?,NOW())";
    	$this->db->query($sql, array($id_barang, $id_merk, $kode, $harga, $deskripsi));
    }

    public function update_detailBarang($id_barang, $id_merk, $type, $kode, $harga, $deskripsi){
    	$sql = "UPDATE `detail_barang` 
    			SET `id_merk`=?,`kode`=?,`harga`=?,`deskripsi`=?
    			WHERE id_barang = ? AND type = ?";
    	$this->db->query($sql, array($id_merk, $kode, $harga, $deskripsi, $id_barang, $type));
    }

    public function delete_detailBarang($id_barang){
    	$sql = "DELETE FROM detail_barang WHERE id_barang = ?";
    	$this->db->query($sql, array($id_barang));
    }

    public function get_allDetailBarangByIdBarang($id_barang){
        $sql = "SELECT * FROM detail_barang WHERE id_barang = ?";
        $hasil = $this->db->query($sql, array($id_barang));
        return $hasil->result_array();
    }
}