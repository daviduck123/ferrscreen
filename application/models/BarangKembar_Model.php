<?php
class BarangKembar_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model("DetailBarang_Model");
    }

    public function insert_barangKembar($id_barang, $id_kembar){
    	$sql = "INSERT INTO `barang_kembarbarang`(`id_barang`, `id_barangKembar`, `created_at`) VALUES (?,?,NOW())";
    	$this->db->query($sql, array($id_barang, $id_kembar));
    }

    public function delete_barangKembar($id_barang){
    	$sql = "DELETE FROM barang_kembarbarang WHERE id_barang = ?";
    	$this->db->query($sql, array($id_barang));
    }
}