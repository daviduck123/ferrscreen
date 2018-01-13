<?php
class notaJualBarang_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_notaJualBarang($id_notaJual, $id_barang, $id_supplier, $id_type, $jumlah, $harga, $deskripsi){
        $this->db->trans_start();

    	$sql = "INSERT INTO `nota_jual_barang`(`id_nota_jual`, `id_barang`, `id_supplier`, `id_type`, `jumlah`, `harga`, `deskripsi`, `is_aktif`, `created_at`) VALUES (?,?,?,?,?,?,?,?,NOW())";
    	$result=$this->db->query($sql, array($id_notaJual, $id_barang, $id_supplier, $id_type, $jumlah, $harga, $deskripsi, "1"));

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

    public function update_notaJualBarang($id_notaJual, $id_barang, $id_supplier, $id_type, $jumlah, $harga, $deskripsi){
        $this->db->trans_start();

    	$sql = "UPDATE `nota_jual_barang` 
    			SET `jumlah`=?,`harga`=?, `deskripsi` = ?
    			WHERE id_notaJual = ? AND id_barang = ? AND id_type = ?, id_supplier=?";
    	$result=$this->db->query($sql, array($stok, $harga, $deskripsi, $id_notaJual, $id_barang, $id_type, $id_supplier));

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

    public function delete_notaJualBarang($id_notaJual, $id_barang, $id_type, $id_supplier){
        $this->db->trans_start();

        $sql = "DELETE nota_jual_barang 
                WHERE id_notaJual = ? AND id_barang = ? AND id_type = ?, id_supplier=?";
        $result=$this->db->query($sql, array("0", $id_notaJual, $id_barang, $id_type, $id_supplier));

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

    public function delete_notaJualBarangByIdBarang($id_barang){
        $this->db->trans_start();

        $sql = "UPDATE nota_jual_barang  SET is_aktif = ? WHERE id_barang = ?";
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

    public function get_allnotaJualBarangByIdNotaJual($id_notaJual){
            $sql = "SELECT njb.*, b.nama as nama_barang, t.nama as nama_type, s.nama as nama_supplier
                    FROM nota_jual_barang njb, nota_jual nj, type t, barang b, supplier s
                    WHERE njb.id_barang = b.id 
                        AND njb.id_notaJual = nj.id 
                        AND njb.id_type = t.id 
                        AND njb.id_supplier = s.id
                        AND njb.id_notaJual = ?";
        $hasil = $this->db->query($sql, array($id_notaJual));
        return $hasil->result_array();
    }

    public function get_allnotaJualBarangByIdBarang($id_barang){
           $sql = "SELECT njb.*, b.nama as nama_barang, t.nama as nama_type, s.nama as nama_supplier
                    FROM nota_jual_barang njb, nota_jual nj, type t, barang b, supplier s
                    WHERE njb.id_barang = b.id 
                        AND njb.id_notaJual = nj.id 
                        AND njb.id_type = t.id 
                        AND njb.id_supplier = s.id
                        AND njb.id_barang = ?";
        $hasil = $this->db->query($sql, array($id_barang));
        return $hasil->result_array();
    }
}