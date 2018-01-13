<?php
class NotaBeliBarang_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function insert_notaBeliBarang($id_notaBeli, $id_barang, $id_supplier, $id_type, $jumlah, $harga, $deskripsi){
        $this->db->trans_start();

    	$sql = "INSERT INTO `nota_beli_barang`(`id_nota_beli`, `id_barang`,`jumlah`, `harga`, `deskripsi`, `is_aktif`, `created_at`) VALUES (?,?,?,?,?,?,NOW())";
    	$result=$this->db->query($sql, array($id_notaBeli, $id_barang, $jumlah, $harga, $deskripsi, "1"));

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

    public function update_notaBeliBarang($id_notaBeli, $id_barang, $jumlah, $harga, $deskripsi){
        $this->db->trans_start();

    	$sql = "UPDATE `nota_beli_barang` 
    			SET `jumlah`=?,`harga`=?, `deskripsi` = ?
    			WHERE id_notaBeli = ? AND id_barang = ? ";
    	$result=$this->db->query($sql, array($stok, $harga, $deskripsi, $id_notaBeli, $id_barang));

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

    public function delete_notaBeliBarang($id_notaBeli, $id_barang){
        $this->db->trans_start();

        $sql = "DELETE nota_beli_barang 
                WHERE id_notaBeli = ? AND id_barang = ?";
        $result=$this->db->query($sql, array("0", $id_notaBeli, $id_barang));

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

    public function delete_notaBeliBarangByIdBarang($id_barang){
        $this->db->trans_start();

        $sql = "UPDATE nota_beli_barang  SET is_aktif = ? WHERE id_barang = ?";
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

    public function get_allnotaBeliBarangByIdNotaBeli($id_notaBeli){
            $sql = "SELECT nbb.*, b.nama as nama_barang, t.nama as nama_type, s.nama as nama_supplier
                    FROM nota_beli_barang nbb, nota_beli nb, type t, barang b, supplier s
                    WHERE nbb.id_barang = b.id 
                        AND nbb.id_notaBeli = nb.id 
                        AND nbb.id_notaBeli = ?";
        $hasil = $this->db->query($sql, array($id_notaBeli));
        return $hasil->result_array();
    }

    public function get_allnotaBeliBarangByIdBarang($id_barang){
           $sql = "SELECT nbb.*, b.nama as nama_barang, t.nama as nama_type, s.nama as nama_supplier
                    FROM nota_beli_barang nbb, nota_beli nb, type t, barang b, supplier s
                    WHERE nbb.id_barang = b.id 
                        AND nbb.id_notaBeli = nb.id 
                        AND nbb.id_type = t.id 
                        AND nbb.id_supplier = s.id
                        AND nbb.id_barang = ?";
        $hasil = $this->db->query($sql, array($id_barang));
        return $hasil->result_array();
    }
}