<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailBarang extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
        header('Access-Control-Allow-Origin: *');

        parent::__construct();
	 	$this->load->model('DetailBarang_Model');
	 	$this->load->model('Supplier_Model');
	 	//$this->load->model('SupplierDetailBarang_Model');
	 	$this->load->model('Merk_Model');
	 	$this->load->model('Type_Model');
    }

	public function index()
	{
	}

	public function allDetailBarangByIdBarang(){
		$id = $this->input->post("id");
		$dataDetailBarang = $this->DetailBarang_Model->get_allDetailBarangByIdBarang($id);
		$data = array(
	        'dataDetailBarang' => $dataDetailBarang
		);
		echo json_encode($data);
	}

		public function get_detailBarangById($id_detail){
		$detail = $this->DetailBarang_Model->get_detailBarangById($id_detail);
		$data = array(
	        'dataDetailBarang' => $detail
		);
		echo json_encode($data);
	}
}
