<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

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
	 	$this->load->model('Supplier_Model');
	 	$this->load->model('Kota_Model');
    }

	public function index()
	{
		$dataMenu = array(
	        'menuAktif' => "supplier"
		);

		$dataSupplier = $this->Supplier_Model->get_allSupplier();
		$data = array(
	        'dataSupplier' => $dataSupplier
		);

		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('supplier',$data);
		//$this->load->view('footer');
	}

	public function tambahSupplier()
	{
		$dataMenu = array(
	        'menuAktif' => "supplier"
		);

		$dataKota = $this->Kota_Model->get_allKota();
		$data = array(
	        'dataKota' => $dataKota
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('tambahSupplier',$data);
		//$this->load->view('footer');
	}

	public function prosesTambahSupplier()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		//isi data diisi array post
		$isiData = $this->input->post();
		//print_r($isiData);
		$isLow=FALSE;

		if($this->input->post('btnTambah'))
		{
			$this->form_validation->set_rules('kodeSupplier', 'Kode Supplier', 'required');
			$this->form_validation->set_rules('namaSupplier', 'Nama Supplier', 'required');
			$this->form_validation->set_rules('contactPersonSupplier', 'Contact person', 'required');
			$this->form_validation->set_rules('alamatEmailSupplier', 'Email Supplier', 'required');
			$this->form_validation->set_rules('alamatSupplier', 'Nama Supplier', 'required');
			$this->form_validation->set_rules('pilihKotaSupplier', 'Pilih kota', 'required');
			$this->form_validation->set_rules('kodePosSupplier', 'Kode Pos', 'required');
			$this->form_validation->set_rules('teleponSupplier', 'Telepon', 'required');
			$this->form_validation->set_rules('hpSupplier', 'Hp', 'required');
			$this->form_validation->set_rules('faximileSupplier', 'Faximile', 'required');
			$this->form_validation->set_rules('limitPiutangSupplier', 'Limit piutang', 'required');
			$this->form_validation->set_rules('jatuhTempoSupplier', 'Jatuh tempo', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				echo "Ada yang belum anda isi";
           	}
           	else
           	{
				$kodeSupplier	= $this->input->post('kodeSupplier');
				$namaSupplier	= $this->input->post('namaSupplier');
				$contactPersonSupplier	= $this->input->post('contactPersonSupplier');
				$alamatEmailSupplier	= $this->input->post('alamatEmailSupplier');
				$pilihKotaSupplier	= $this->input->post('pilihKotaSupplier');
				$kodePosSupplier	= $this->input->post('kodePosSupplier');
				$teleponSupplier	= $this->input->post('teleponSupplier');
				$hpSupplier	= $this->input->post('hpSupplier');
				$faximileSupplier	= $this->input->post('faximileSupplier');
				$limitPiutangSupplier	= $this->input->post('limitPiutangSupplier');
				$jatuhTempoSupplier	= $this->input->post('jatuhTempoSupplier');

				$result = $this->Supplier_Model->insert_supplier($kodeSupplier, $alamatEmailSupplier, $namaSupplier, $contactPersonSupplier, $alamatSupplier, $kodePosSupplier, $teleponSupplier, $hpSupplier, $faximileSupplier, $limitPiutangSupplier, $jatuhTempoSupplier, $pilihKotaSupplier);

				/*

				if(count($result) > 0)
				{
					$dataMenu = array(
				        'menuAktif' => "supplier"
					);

					$dataSupplier = $this->Supplier_Model->get_allSupplier();

					$dataInfo = array(
						//status 1 berarti success
				        'status' => "1",
				        'keterangan' => "Supplier baru berhasil ditambahkan",
					);
					$data = array(
				        'dataSupplier' => $dataSupplier,
				        'dataInfo' => $dataInfo
					);
                	$this->load->view('header');
					$this->load->view('sidebar',$dataMenu);
					$this->load->view('supplier',$data);
				} 
				else 
				{
					 $dataMenu = array(
				        'menuAktif' => "supplier"
					);

					$dataSupplier = $this->Supplier_Model->get_allSupplier();

					$dataInfo = array(
						//status 0 berarti gagal
				        'status' => "0",
				        'keterangan' => "Tidak berhasil dalam menambahkan Supplier baru",
					);
					$data = array(
				        'dataSupplier' => $dataSupplier,
				        'dataInfo' => $dataInfo
					);
                	$this->load->view('header');
					$this->load->view('sidebar',$dataMenu);
					$this->load->view('supplier',$data);
				}
				*/
         	}
		}
		else
		{
			echo "jangan lakukan refresh saat pengiriman data";
			redirect(base_url()."supplier", 'refresh');
		}
	}
}
