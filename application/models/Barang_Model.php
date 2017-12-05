<?php
class Barang_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model("DetailBarang_Model");
        $this->load->model("BarangKembar_Model");
        $this->load->model("SupplierBarang_Model");
    }

    public function insert_barang($nama, $min_stok, $id_merk, $types, $kembars, $kode, $harga, $deskripsi, $is_low, $id_merk2, $kode2, $harga2, $deskripsi2, $is_premium, $id_merk3, $kode3, $harga3, $deskripsi3){
        $this->db->trans_start();

    	$sql = "INSERT INTO `barang`(`nama`, `min_stok`, `is_aktif`, `created_at`) VALUES (?,?,?,NOW())";
    	$this->db->query($sql, array($nama, $min_stok, "1"));

    	$sql2 = "SELECT LAST_INSERT_ID() as id";
        $hasil = $this->db->query($sql2);
        $id = $hasil->row()->id;

        //Untuk tambah yg kembar2
        if(count($kembars) > 0){
        	for($i = 0; $i < count($kembars); $i++){
        		//$kembar = [0,1,2,3,4,5]  id Barang
        		$this->BarangKembar_Model->insert_barangKembar($id, $types[$i], $kembars[$i]);
        	}
        }

        //Type N = Normal, L = Low, P = Premium
        $this->DetailBarang_Model->insert_detailBarang($id, $id_merk, "N", $kode, $harga, $deskripsi);
        if($is_low == TRUE){
            $this->DetailBarang_Model->insert_detailBarang($id, $id_merk2, "L", $kode2, $harga2, $deskripsi2);
        }
        if($is_premium == TRUE){
            $this->DetailBarang_Model->insert_detailBarang($id, $id_merk3, "P", $kode3, $harga3, $deskripsi3);
        }



        $this->db->trans_complete();
        return $id;
    }

    public function update_barang($id, $nama, $min_stok, $id_merk, $types, $kembars, $kode, $harga, $deskripsi, $is_low, $id_merk2, $kode2, $harga2, $deskripsi2, $is_premium, $id_merk3, $kode3, $harga3, $deskripsi3){
        $this->db->trans_start();

    	$sql = "UPDATE `barang` 
    			SET `nama`=?, `min_stok`=? 
    			WHERE id= ?";
    	$this->db->query($sql, array($nama, $min_stok, $id));

    	//Untuk Update yg kembar2
        if(count($kembars) > 0){
        	$this->BarangKembar_Model->delete_barangKembar($id);
        	for($i = 0; $i < count($kembars); $i++){
                //$kembar = [0,1,2,3,4,5]  id Barang
                $this->BarangKembar_Model->insert_barangKembar($id, $types[$i], $kembars[$i]);
            }
        }
		//Type N = Normal, L = Low, P == Premium
    	$this->DetailBarang_Model->update_detailBarang($id, $id_merk, "N", $kode, $harga, $deskripsi);
    	if($is_low == TRUE){
            //Need to check if it exist
            $details = $this->DetailBarang_Model->get_allDetailBarangByIdBarang($id);
            if(count($details) > 1){
                $this->DetailBarang_Model->update_detailBarang($id, $id_merk2, "L", $kode2, $harga2, $deskripsi2);
            }else{
                //Insert if only found 1 data Details
                $this->DetailBarang_Model->insert_detailBarang($id, $id_merk2, "L", $kode2, $harga2, $deskripsi2);
            }
        }else{
             //Need to check if it exist
            $details = $this->DetailBarang_Model->get_allDetailBarangByIdBarang($id);
            if(count($details) > 1){
                //delete if low not checked and Found more than 1 data
                $this->DetailBarang_Model->delete_detailBarangByType($id, "L");
            }
        }

        if($is_premium == TRUE){
            //Need to check if it exist
            $details = $this->DetailBarang_Model->get_allDetailBarangByIdBarang($id);
            if(count($details) > 1){
                $this->DetailBarang_Model->update_detailBarang($id, $id_merk3, "P", $kode3, $harga3, $deskripsi3);
            }else{
                //Insert if only found 1 data Details
                $this->DetailBarang_Model->insert_detailBarang($id, $id_merk3, "P", $kode3, $harga3, $deskripsi3);
            }
        }else{
             //Need to check if it exist
            $details = $this->DetailBarang_Model->get_allDetailBarangByIdBarang($id);
            if(count($details) > 1){
                //delete if premium not checked and Found more than 1 data
                $this->DetailBarang_Model->delete_detailBarangByType($id, "P");
            }
        }

        $this->db->trans_complete();
        return $id;
    }

    public function get_allBarang(){
        $sql = "SELECT b.* 
        		FROM barang b
                WHERE b.is_aktif = ?
        		ORDER BY b.nama ASC";
        $result = $this->db->query($sql, array("1"));
        
        $barangs = $result->result_array();

        return $this->get_detailDataOfBarang($barangs);
    }

    public function get_barangById($id_barang){
        $sql = "SELECT b.* 
        		FROM barang b
        		WHERE b.id = ?
        		ORDER BY b.nama ASC";
        $result = $this->db->query($sql, array($id_barang));
        
        $barangs = $result->result_array();

        return $this->get_detailDataOfBarang($barangs);
    }

    public function get_barangByNama($nama){
        $sql = "SELECT b.* 
        		FROM barang b
        		WHERE b.nama LIKE ? AND b.is_aktif = ?
        		ORDER BY b.nama ASC";

       	$like = "%".$nama."%";
        $result = $this->db->query($sql, array($like, "1"));
        
        $barangs = $result->result_array();

        return $this->get_detailDataOfBarang($barangs);
    }

    //For get Detail Barang and Supplier Barang information
    public function get_detailDataOfBarang($barangs){
        $barangs2 = [];
        foreach($barangs as $barang){
            $detailBarangs = $this->DetailBarang_Model->get_allDetailBarangByIdBarang($barang['id']);
            $supplierBarangs = $this->SupplierBarang_Model->get_allSupplierBarangByIdBarang($barang['id']);
            $barangKembars = $this->BarangKembar_Model->get_barangKembarByIdBarang($barang['id']);
            
            $totalStok = 0;
            $barang["total_stok"] = 0;

            if(count($detailBarangs) > 0){
                $barang["detail_barang"] = $detailBarangs;
            }else{
                $barang["detail_barang"] = [];
            }

            
            if(count($supplierBarangs) > 0){
                foreach($supplierBarangs as $supBar){
                    $totalStok = $totalStok + $supBar["stok"];
                }
                $barang['supplier_barang'] = $supplierBarangs;
            }else{
                $barang['supplier_barang'] = [];
            }

            if(count($barangKembars) > 0){
                $barang['barang_kembar'] = $barangKembars;
            }else{
                $barang['barang_kembar'] = [];
            }
            
            $barang["total_stok"] = $totalStok;
            array_push($barangs2, $barang);
        }
        return $barangs2;
    }

    public function delete_barang($id){
        $sql = "UPDATE barang SET is_aktif= ? WHERE id = ?";
        return $this->db->query($sql, array("0", $id));
    }

    public function get_barangBySearch($kode, $nama, $merk){
        $sql = "SELECT * FROM barang ";
        $array = array();
        if(isset($kode)){
            $sql .= " WHERE kode = ? ";
            array_push($array, $kode);
        }
        if(isset($nama)){
            if(!isset($kode)){
                $sql .= " AND nama = ?"
            }else{
                $sql .= " WHERE nama = ?";
            }
            array_push($array, $nama);
        }
        if(isset($merk)){
            if(!isset($kode) || !isset($nama)){
                $sql .= " AND merk = ?"
            }else{
                $sql .= " WHERE merk = ?";
            }
            array_push($array, $merk);
        }
        $result = $this->db->query($sql, $array);
        $hasil = $result->result_array();
        return $hasil;
    }
}