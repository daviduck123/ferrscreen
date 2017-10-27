<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

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
	 	$this->load->model('Barang_Model');
	 	$this->load->model('Merk_Model');
    }

	public function index()
	{
		$dataMenu = array(
	        'menuAktif' => "barang"
		);

		$dataBarang = $this->Barang_Model->get_allBarang();
		$data = array(
	        'dataBarang' => $dataBarang,
		);

		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('barang',$data);
		//$this->load->view('footer');
	}

	public function tambahBarang()
	{
		$dataMenu = array(
	        'menuAktif' => "barang"
		);
		$dataBarang = $this->Barang_Model->get_allBarang();
		$dataMerk = $this->Merk_Model->get_allMerk();
		$data = array(
	        'dataBarang' => $dataBarang,
	        'dataMerk' => $dataMerk
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('tambahBarang',$data);
		//$this->load->view('footer');
	}

	public function prosesTambahBarang()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		//isi data diisi array post
		$isiData = $this->input->post();
		//print_r($isiData);
		$isLow=FALSE;

		if($this->input->post('btnTambah'))
		{
			$this->form_validation->set_rules('kodeBarang', 'Kode barang', 'required');
			$this->form_validation->set_rules('namaBarang', 'Nama barang', 'required');
			$this->form_validation->set_rules('minStok', 'Minimal stok', 'required');
			$this->form_validation->set_rules('pilihMerkBarang', 'Pilih merek barang', 'required');
			$this->form_validation->set_rules('hargaNormal', 'Harga normal', 'required');
			$this->form_validation->set_rules('deskripsiNormal', 'Deskripsi normal', 'required');

			if($this->input->post('checkLow')!==null && $this->input->post('checkLow')=="low")
			{
				$this->form_validation->set_rules('pilihMerkBarangLow', 'Pilih merek barang low', 'required');
				$this->form_validation->set_rules('hargaLow', 'Harga low', 'required');
				$this->form_validation->set_rules('deskripsiLow', 'Deskripsi low', 'required');
			}
			
			if ($this->form_validation->run() == FALSE)
			{
				echo "Ada yang belum anda isi";
           	}
           	else
           	{
           		$kodeBarang	= $this->input->post('kodeBarang');
				$namaBarang	= $this->input->post('namaBarang');
				$minStok	= $this->input->post('minStok');
				$similarMerk	= $this->input->post('similarMerk');
				$pilihMerkBarang	= $this->input->post('pilihMerkBarang');
				$hargaNormal	= $this->input->post('hargaNormal');
				$deskripsiNormal	= $this->input->post('deskripsiNormal');


				if($this->input->post('checkLow')!==null && $this->input->post('checkLow')=="low")
					$isLow=TRUE;

				$kodeBarangLow	= "L".$kodeBarang;
				$pilihMerkBarangLow	= $this->input->post('pilihMerkBarangLow');
				$hargaLow	= $this->input->post('hargaLow');
				$deskripsiLow	= $this->input->post('deskripsiLow');
				$result = $this->Barang_Model->insert_barang($namaBarang, $minStok, $pilihMerkBarang, $similarMerk, $kodeBarang, $hargaNormal, $deskripsiNormal, $isLow, $pilihMerkBarangLow, $kodeBarangLow, $hargaLow, $deskripsiLow);

				/*
				if(count($result) > 0)
				{
                	$dataMenu = array(
				        'menuAktif' => "barang"
					);

					$dataBarang = $this->Barang_Model->get_allBarang();

					$dataInfo = array(
						//status 1 berarti success
				        'status' => "1",
				        'keterangan' => "Barang baru berhasil ditambahkan",
					);
					$data = array(
				        'dataBarang' => $dataBarang,
				        'dataInfo' => $dataInfo
					);
                	$this->load->view('header');
					$this->load->view('sidebar',$dataMenu);
					$this->load->view('barang',$data);
				} else {
					$dataMenu = array(
				        'menuAktif' => "barang"
					);

					$dataBarang = $this->Barang_Model->get_allBarang();

					$dataInfo = array(
						//status 0 berarti gagal
				        'status' => "0",
				        'keterangan' => "Tidak berhasil dalam menambahkan barang baru",
					);
					$data = array(
				        'dataBarang' => $dataBarang,
				        'dataInfo' => $dataInfo
					);
                	$this->load->view('header');
					$this->load->view('sidebar',$dataMenu);
					$this->load->view('barang',$data);
				}
				*/
         	}
		}
		else
		{
			echo "jangan lakukan refresh saat pengiriman data";
		}
	}
}
