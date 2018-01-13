<?php
class notaBeli_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model("NotaBeliBarang_Model");
    }

    public function insert_notaBeli($kode, $id_user, $id_supplier, $waktu_kirim, $total, $ppn, $diskon, $grand_total, $deskripsi, $id_barangs, $id_suppliers, $hargas, $jumlahs, $deskripsis){
        $this->db->trans_start();

        $sql="INSERT INTO `nota_beli`(`kode`, `id_user`, `id_supplier`, `waktu_kirim`, `total`, `ppn`, `diskon`, `grand_total`, `deskripsi`, `is_terkirim`, `created_at`) VALUES (?,?,?,?,?,?,?,?,?,?,0,NOW())";
        $this->db->query($sql, array($kode, $id_user, $id_supplier, $waktu_kirim, $total, $ppn, $diskon, $grand_total, $deskripsi));
        $id = $this->db->insert_id();

        //Insert Nota Barang
        if(count($id_barangs) > 0){
            for($i = 0; $i < count($id_barangs); $i++){
                $this->NotaBeliBarang_Model->insert_notaBeliBarang($id, $id_barangs[$i], $jumlahs[$i], $hargas[$i], $deskripsis[$i]);
            }
        }

        $this->db->trans_complete();
        return $id;
    }

    public function update_notaBeli($id, $kota, $id_user, $id_customer, $waktu_kirim, $total, $ppn, $diskon, $biaya_kirim, $grand_total, $deskripsi, $id_barangs, $harga_barangs){
        $this->db->trans_start();

        $sql="UPDATE `nota_beli` 
            SET `kode`=?,`id_user`=?,`id_customer`=?,`waktu_kirim`=?,`total`=?,`ppn`=?,`diskon`=?,`biaya_kirim`=?,`grand_total`=?,`deskripsi`=? 
            WHERE id=?";
        $this->db->query($sql, array($kota, $id_user, $id_customer, $waktu_kirim, $total, $ppn, $diskon, $biaya_kirim, $grand_total, $deskripsi, $id));

        //Delete Barang

        //Tambah Stok Barang

        //Insert Barang Baru

        $this->db->trans_complete();

        return $id;
    }

    public function get_allnotaBeli(){
        $sql = "SELECT *
                FROM nota_beli";
        $result = $this->db->query($sql;
       $notaBeli = $result->result_array();
        $notaBeli2 = [];
        foreach($notaBeli as $barang){
            $notaBeli_barangs = $this->NotaBeliBarang_Model->get_allnotaBeliBarangByIdNotaBeli($barang['id']);

            if(count($notaBeli_barang) > 0){
                $barang['notaBeli_barang'] = $notaBeli_barang;
            }else{
                $barang['notaBeli_barang'] = [];
            }
            
            array_push($notaBeli2, $notaBeli);
        }
        return $notaBeli2;
    }

    public function get_notaBeliById($id){
        $sql = "SELECT nb.*
                FROM nota_beli nb
                WHERE nb.id = ?";
        $result = $this->db->query($sql,array($id));
        $notaBeli = $result->result_array();
        $notaBeli2 = [];
        foreach($notaBeli as $barang){
            $notaBeli_barangs = $this->NotaBeliBarang_Model->get_allnotaBeliBarangByIdNotaBeli($barang['id']);

            if(count($notaBeli_barang) > 0){
                $barang['notaBeli_barang'] = $notaBeli_barang;
            }else{
                $barang['notaBeli_barang'] = [];
            }
            
            array_push($notaBeli2, $notaBeli);
        }
        return $notaBeli2;
    }

    public function delete_notaBeli($id){
        $sql = "UPDATE notaBeli SET is_aktif=? WHERE id = ?";
        return $this->db->query($sql, array("0", $id));
    }

}