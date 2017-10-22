<?php
class Kota_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_allKota(){
        $sql = "SELECT id, nama, lat, lng FROM kota";
        $hasil = $this->db->query($sql);
        return $hasil->result_array();
    }
}