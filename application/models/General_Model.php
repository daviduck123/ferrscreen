<?php
class General_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_allGeneral(){
        $sql = "SELECT * FROM general";
        $hasil = $this->db->query($sql);
        return $hasil->result_array();
    }

    public function update_general($komisi_low, $komisi_diskon, $komisi_normal, $plus_low, $plus_normal){
    	$this->db->trans_start();

    	$sql = "UPDATE `general` SET `komisi_low`=?,`komisi_diskon`=?,`komisi_normal`=?,`plus_low`=?,`plus_normal`=? WHERE 1";
    	$this->db->query($sql, array($komisi_low, $komisi_diskon, $komisi_normal, $plus_low, $plus_normal));

    	$this->db->trans_complete();

    	if ($this->db->trans_status() === FALSE){
    		return [];
    	}else{
    		return $this->get_allGeneral();
    	}
    }
}