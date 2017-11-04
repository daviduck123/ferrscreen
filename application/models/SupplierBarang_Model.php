<?php
class SupplierBarang_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_supplierBarang($id_supplier, $id_barang, $stok, $harga){
        $this->db->trans_start();

    	$sql = "INSERT INTO `supplier_barang`(`id_supplier`, `id_barang`, `stok`, `harga`, `is_aktif`, `created_at`) VALUES (?,?,?,?,?,NOW())";
    	$result=$this->db->query($sql, array($id_supplier, $id_barang, $stok, $harga, "1"));

        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
                // generate an error... or use the log_message() function to log your error
        }
        else
        {
            return $result;
        }
    }

    public function update_supplierBarang($id_supplier, $id_barang, $stok, $harga){
        $this->db->trans_start();

    	$sql = "UPDATE `supplier_barang` 
    			SET `stok`=?,`harga`=?, `is_aktif` = ?
    			WHERE id_supplier = ? AND id_barang = ?";
    	$result=$this->db->query($sql, array($stok, $harga, "1", $id_supplier, $id_barang));

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
                // generate an error... or use the log_message() function to log your error
        }
        else
        {
            return $result;
        }
    }

    public function delete_supplierBarang($id_supplier, $id_barang){
        $this->db->trans_start();

        $sql = "UPDATE supplier_barang 
                SET is_aktif = ?
                WHERE id_supplier = ? AND id_barang = ?";
        $result=$this->db->query($sql, array("0", $id_supplier, $id_barang));

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
                // generate an error... or use the log_message() function to log your error
        }
        else
        {
            return $result;
        }
    }

    public function delete_supplierBarangByIdSupplier($id_supplier){
        $this->db->trans_start();

        $sql = "UPDATE supplier_barang  SET is_aktif = ? WHERE id_supplier = ?";
        $this->db->query($sql, array("0", $id_supplier));

        $this->db->trans_complete();
    }

    public function delete_supplierBarangByIdBarang($id_barang){
        $this->db->trans_start();

        $sql = "UPDATE supplier_barang  SET is_aktif = ? WHERE id_barang = ?";
        $temp=$this->db->query($sql, array("0", $id_barang));

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
                // generate an error... or use the log_message() function to log your error
        }
        else
        {
            return $temp;
        }
    }

    public function get_allSupplierBarangByIdBarang($id_barang){
        $sql = "SELECT sb.*, s.nama as nama_supplier 
        FROM supplier_barang sb, supplier s
        WHERE sb.id_barang = ? AND sb.id_supplier = s.id AND sb.is_aktif = ?";
        $hasil = $this->db->query($sql, array($id_barang, "1"));
        return $hasil->result_array();
    }

    public function check_supplierBarangByIdSupplierAndIdBarang($id_supplier, $id_barang){
        $sql = "SELECT sb.*
        FROM supplier_barang sb
        WHERE sb.id_barang = ? AND sb.id_supplier = ?";
        $hasil = $this->db->query($sql, array($id_supplier, $id_barang));
        if(count($hasil) > 0)
            return true;
        else
            return false;
    }
}