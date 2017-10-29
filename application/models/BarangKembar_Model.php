<?php
class BarangKembar_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model("DetailBarang_Model");
    }

    public function insert_barangKembar($id_barang, $id_kembar){
        $this->db->trans_start();

    	$sql = "INSERT INTO `barang_kembarbarang`(`id_barang`, `id_barangKembar`, `created_at`) VALUES (?,?,NOW())";
    	$this->db->query($sql, array($id_barang, $id_kembar));

        $this->db->trans_complete();
    }

    public function delete_barangKembar($id_barang){
        $this->db->trans_start();

    	$sql = "DELETE FROM barang_kembarbarang WHERE id_barang = ?";
    	$this->db->query($sql, array($id_barang));

        $this->db->trans_complete();
    }
}