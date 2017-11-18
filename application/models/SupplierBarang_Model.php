<?php
class SupplierBarang_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_supplierBarang($id_supplier, $id_barang, $id_type, $stok, $harga){
        $this->db->trans_start();

    	$sql = "INSERT INTO `supplier_barang`(`id_supplier`, `id_barang`, `id_type`, `stok`, `harga`, `is_aktif`, `created_at`) VALUES (?,?,?,?,?,?,NOW())";
    	$result=$this->db->query($sql, array($id_supplier, $id_barang, $id_type, $stok, $harga, "1"));

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

    public function update_supplierBarang($id_supplier, $id_barang, $id_type, $stok, $harga){
        $this->db->trans_start();

    	$sql = "UPDATE `supplier_barang` 
    			SET `stok`=?,`harga`=?, `is_aktif` = ?
    			WHERE id_supplier = ? AND id_barang = ? AND id_type = ?";
    	$result=$this->db->query($sql, array($stok, $harga, "1", $id_supplier, $id_barang, $id_type));

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

    public function delete_supplierBarang($id_supplier, $id_barang, $id_type){
        $this->db->trans_start();

        $sql = "UPDATE supplier_barang 
                SET is_aktif = ?
                WHERE id_supplier = ? AND id_barang = ? AND id_type = ?";
        $result=$this->db->query($sql, array("0", $id_supplier, $id_barang, $id_type));

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
            $sql = "SELECT sb.*, s.nama as nama_supplier, t.nama as nama_type 
                    FROM supplier_barang sb, supplier s, type t
                    WHERE sb.id_barang = ? 
                        AND sb.id_supplier = s.id 
                        AND sb.id_type = t.id 
                        AND sb.is_aktif = ?";
        $hasil = $this->db->query($sql, array($id_barang, "1"));
        return $hasil->result_array();
    }

    public function check_supplierBarangByIdSupplierAndIdBarangAndIdType($id_supplier, $id_barang, $id_type){
        $sql = "SELECT sb.*
        FROM supplier_barang sb
        WHERE sb.id_barang = ? AND sb.id_supplier = ? AND sb.id_type = ?";
        $hasil = $this->db->query($sql, array($id_supplier, $id_barang, $id_type));
        $result = $hasil->result_array();
        if(count($result) > 0)
            return true;
        else
            return false;
    }
}