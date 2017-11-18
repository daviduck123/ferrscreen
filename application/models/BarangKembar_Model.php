<?php
class BarangKembar_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model("DetailBarang_Model");
    }

    public function insert_barangKembar($id_barang, $id_type, $id_kembar){
        $this->db->trans_start();

    	$sql = "INSERT INTO `barang_kembarbarang`(`id_barang`, `id_type`, `id_barangKembar`, `created_at`) VALUES (?,?,?,NOW())";
    	$this->db->query($sql, array($id_barang, $id_type, $id_kembar));

        $this->db->trans_complete();
    }

    public function delete_barangKembar($id_barang){
        $this->db->trans_start();

    	$sql = "DELETE FROM barang_kembarbarang WHERE id_barang = ?";
    	$this->db->query($sql, array($id_barang));

        $this->db->trans_complete();
    }

    public function get_barangKembarByIdBarang($id_barang){
        $sql = "SELECT bbk.*, b.nama as kembar_nama 
                FROM barang_kembarbarang bbk, barang b
                WHERE bbk.id_barang = ? AND b.id = bbk.id_barangKembar";

        $result = $this->db->query($sql, array($id_barang));

        return $result->result_array();
    }

    public function get_barangKembarByIdBarangIdType($id_barang, $id_type){
        $sql = "SELECT bbk.*, b.nama as kembar_nama 
                FROM barang_kembarbarang bbk, barang b
                WHERE bbk.id_barang = ? AND b.id = bbk.id_barangKembar AND bbk.id_type = ?";

        $result = $this->db->query($sql, array($id_barang, $id_type));

        return $result->result_array();
    }
}