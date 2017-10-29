<?php
class SupplierBarang_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_supplierBarang($id_supplier, $id_barang, $stok, $harga){
        $this->db->trans_start();

    	$sql = "INSERT INTO `supplier_barang`(`id_supplier`, `id_barang`, `stok`, `harga`, `created_at`) VALUES (?,?,?,?,NOW())";
    	$this->db->query($sql, array($id_supplier, $id_barang, $stok, $harga));

        $this->db->trans_complete();
    }

    public function update_supplierBarang($id_supplier, $id_barang, $stok, $harga){
        $this->db->trans_start();

    	$sql = "UPDATE `supplier_barang` 
    			SET `stok`=?,`harga`=?
    			WHERE id_supplier = ? AND id_barang = ?";
    	$this->db->query($sql, array($stok, $kode, $harga, $id_supplier, $id_barang));

        $this->db->trans_complete();
    }

    public function delete_supplierBarang($id_supplier, $id_barang){
        $this->db->trans_start();

        $sql = "DELETE FROM supplier_barang 
                WHERE id_supplier = ? AND id_barang = ?";
        $this->db->query($sql, array($id_supplier, $id_barang));

        $this->db->trans_complete();
    }

    public function delete_supplierBarangByIdSupplier($id_supplier){
        $this->db->trans_start();

        $sql = "DELETE FROM supplier_barang WHERE id_supplier = ?";
        $this->db->query($sql, array($id_supplier));

        $this->db->trans_complete();
    }

    public function delete_supplierBarangByIdBarang($id_barang){
        $this->db->trans_start();

        $sql = "DELETE FROM supplier_barang WHERE id_barang = ?";
        $this->db->query($sql, array($id_barang));

        $this->db->trans_complete();
    }

    public function get_allSupplierBarangByIdBarang($id_barang){
        $sql = "SELECT sb.*, s.nama as nama_supplier 
        FROM supplier_barang sb, supplier s
        WHERE sb.id_barang = ? AND sb.id_supplier = s.id";
        $hasil = $this->db->query($sql, array($id_barang));
        return $hasil->result_array();
    }
}