<?php
class Barang_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model("DetailBarang_Model");
        $this->load->model("BarangKembar_Model");
    }

    public function insert_barang($nama, $min_stok, $id_merk, $kembars, $kode, $harga, $deskripsi, $is_low, $id_merk2, $kode2, $harga2, $deskripsi2){
    	$sql = "INSERT INTO `barang`(`nama`, `min_stok`, `created_at`) VALUES (?,?,NOW())";
    	$this->db->query($sql, array($nama, $min_stok));

    	$sql2 = "SELECT LAST_INSERT_ID() as id";
        $hasil = $this->db->query($sql2);
        $id = $hasil->row()->id;

        //Untuk tambah yg kembar2
        if(count($kembars) > 0){
        	foreach($kembars as $id_kembar){
        		//$kembar = [0,1,2,3,4,5]  id Barang
        		$this->BarangKembar_Model->insert_barangKembar($id, $id_kembar);
        	}
        }

        //Type N = Normal, L = Low
        $this->DetailBarang_Model->insert_detailBarang($id, $id_merk, "N", $kode, $harga, $deskripsi);
        if($is_low == TRUE){
        	$this->DetailBarang_Model->insert_detailBarang($id, $id_merk2, "L", $kode2, $harga2, $deskripsi2);
        }
    }

    public function update_barang($id, $nama, $min_stok, $id_merk, $kembars, $kode, $harga, $deskripsi, $is_low, $id_merk2, $kode2, $harga2, $deskripsi2){
    	$sql = "UPDATE `barang` 
    			SET `nama`=?, `min_stok`=? 
    			WHERE id= ?";
    	$this->db->query($sql, array($nama, $min_stok, $id));

    	//Untuk Update yg kembar2
        if(count($kembars) > 0){
        	$this->BarangKembar_Model->delete_barangKembar($id);
        	foreach($kembars as $id_kembar){
        		//$kembar = [0,1,2,3,4,5]  id Barang
        		$this->BarangKembar_Model->insert_barangKembar($id, $id_kembar);
        	}
        }
		//Type N = Normal, L = Low
    	$this->DetailBarang_Model->update_detailBarang($id, $id_merk, "N", $kode, $harga, $deskripsi);
    	if($is_low == TRUE){
    		$this->DetailBarang_Model->update_detailBarang($id, $id_merk2, "L", $kode2, $harga2, $deskripsi2);
    	}
    }

    public function get_allBarang(){
        $sql = "SELECT b.* 
        		FROM barang b
        		ORDER BY b.nama ASC";
        $result = $this->db->query($sql);
        
        $barangs = $result->result_array();

        foreach($barangs as $barang){
            $detailBarangs = $this->DetailBarang_Model->get_allDetailBarangByIdBarang($barang['id']);
            if(count($detailBarangs) > 0){
                $barang["detail_barang"] = $detailBarangs;
            }else{
                $barang["detail_barang"] = [];
            }
        }
        return $barangs;
    }

    public function get_barangById($id_barang){
        $sql = "SELECT b.* 
        		FROM barang b
        		WHERE b.id = ?
        		ORDER BY b.nama ASC";
        $result = $this->db->query($sql, array($id_barang));
        
        $barangs = $result->result_array();

        foreach($barangs as $barang){
            $detailBarangs = $this->DetailBarang_Model->get_allDetailBarangByIdBarang($barang['id']);
            if(count($detailBarangs) > 0){
                $barang["detail_barang"] = $detailBarangs;
            }else{
                $barang["detail_barang"] = [];
            }
        }
        return $barangs;
    }

    public function get_barangByNama($nama){
        $sql = "SELECT b.* 
        		FROM barang b
        		WHERE b.nama LIKE ?
        		ORDER BY b.nama ASC";

       	$like = "%".$nama."%";
        $result = $this->db->query($sql, array($like));
        
        $barangs = $result->result_array();

        foreach($barangs as $barang){
            $detailBarangs = $this->DetailBarang_Model->get_allDetailBarangByIdBarang($barang['id']);
            if(count($detailBarangs) > 0){
                $barang["detail_barang"] = $detailBarangs;
            }else{
                $barang["detail_barang"] = [];
            }
        }
        return $barangs;
    }
}