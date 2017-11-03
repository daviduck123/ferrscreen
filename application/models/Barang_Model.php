<?php
class Barang_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->model("DetailBarang_Model");
        $this->load->model("BarangKembar_Model");
        $this->load->model("SupplierBarang_Model");
    }

    public function insert_barang($nama, $min_stok, $id_merk, $kembars, $kode, $harga, $deskripsi, $is_low, $id_merk2, $kode2, $harga2, $deskripsi2){
        $this->db->trans_start();

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

        $this->db->trans_complete();
        return $id;
    }

    public function update_barang($id, $nama, $min_stok, $id_merk, $kembars, $kode, $harga, $deskripsi, $is_low, $id_merk2, $kode2, $harga2, $deskripsi2){
        $this->db->trans_start();

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

        $this->db->trans_complete();
        return $id;
    }

    public function get_allBarang(){
        $sql = "SELECT b.* 
        		FROM barang b
        		ORDER BY b.nama ASC";
        $result = $this->db->query($sql);
        
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
        		WHERE b.nama LIKE ?
        		ORDER BY b.nama ASC";

       	$like = "%".$nama."%";
        $result = $this->db->query($sql, array($like));
        
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
        $sql = "DELETE FROM barang WHERE id = ?";
        return $this->db->query($sql, array($id));
    }
}