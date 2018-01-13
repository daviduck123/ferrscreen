<?php
class notaJual_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model("NotaJualBarang_Model");
    }

    public function insert_notaJual($kode, $id_user, $id_customer, $waktu_kirim, $total, $ppn, $diskon, $biaya_kirim, $grand_total, $deskripsi, $id_barangs, $id_suppliers, $id_types, $hargas, $jumlahs, $deskripsis){
        $this->db->trans_start();

        $sql="INSERT INTO `nota_jual`(`kode`, `id_user`, `id_customer`, `waktu_kirim`, `total`, `ppn`, `diskon`, `biaya_kirim`, `grand_total`, `deskripsi`, `is_terkirim`, `created_at`) VALUES (?,?,?,?,?,?,?,?,?,?,0,NOW())";
        $this->db->query($sql, array($kode, $id_user, $id_customer, $waktu_kirim, $total, $ppn, $diskon, $biaya_kirim, $grand_total, $deskripsi));
        $id = $this->db->insert_id();

        //Insert Nota Barang
        if(count($id_barangs) > 0){
            for($i = 0; $i < count($id_barangs); $i++){
                $this->NotaJualBarang_Model->insert_notaJualBarang($id, $id_barangs[$i], $id_suppliers[$i], $id_types[$i], $jumlahs[$i], $hargas[$i], $deskripsis[$i]);
            }
        }

        $this->db->trans_complete();
        return $id;
    }

    public function update_notaJual($id, $kota, $id_user, $id_customer, $waktu_kirim, $total, $ppn, $diskon, $biaya_kirim, $grand_total, $deskripsi, $id_barangs, $harga_barangs){
        $this->db->trans_start();

        $sql="UPDATE `nota_jual` 
            SET `kode`=?,`id_user`=?,`id_customer`=?,`waktu_kirim`=?,`total`=?,`ppn`=?,`diskon`=?,`biaya_kirim`=?,`grand_total`=?,`deskripsi`=? 
            WHERE id=?";
        $this->db->query($sql, array($kota, $id_user, $id_customer, $waktu_kirim, $total, $ppn, $diskon, $biaya_kirim, $grand_total, $deskripsi, $id));

        //Delete Barang

        //Tambah Stok Barang

        //Insert Barang Baru

        $this->db->trans_complete();

        return $id;
    }

    public function get_allnotaJual(){
        $sql = "SELECT *
                FROM nota_jual";
        $result = $this->db->query($sql;
       $notaJual = $result->result_array();
        $notaJual2 = [];
        foreach($notaJual as $barang){
            $notaJual_barangs = $this->NotaJualBarang_Model->get_allnotaJualBarangByIdNotaJual($barang['id']);

            if(count($notaJual_barang) > 0){
                $barang['notaJual_barang'] = $notaJual_barang;
            }else{
                $barang['notaJual_barang'] = [];
            }
            
            array_push($notaJual2, $notaJual);
        }
        return $notaJual2;
    }

    public function get_notaJualById($id){
        $sql = "SELECT nj.*
                FROM nota_jual nj
                WHERE nj.id = ?";
        $result = $this->db->query($sql,array($id));
        $notaJual = $result->result_array();
        $notaJual2 = [];
        foreach($notaJual as $barang){
            $notaJual_barangs = $this->NotaJualBarang_Model->get_allnotaJualBarangByIdNotaJual($barang['id']);

            if(count($notaJual_barang) > 0){
                $barang['notaJual_barang'] = $notaJual_barang;
            }else{
                $barang['notaJual_barang'] = [];
            }
            
            array_push($notaJual2, $notaJual);
        }
        return $notaJual2;
    }

    public function delete_notaJual($id){
        $sql = "UPDATE nota_jual SET is_aktif=? WHERE id = ?";
        return $this->db->query($sql, array("0", $id));
    }

    public function update_statusTerkirim($id_notaJual, $status){
        $this->db->trans_start();

        $sql = "UPDATE nota_jual SET is_terkirim = ? WHERE id = ?";
        $this->db->query($sql,array($status, $id_notaJual));

        $this->db->trans_complete();
    }

}