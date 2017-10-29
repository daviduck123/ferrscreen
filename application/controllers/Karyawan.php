<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {


	public function __construct(){
        header('Access-Control-Allow-Origin: *');
        parent::__construct();
	 	$this->load->model('Kota_Model');
    }

	public function index()
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "karyawan"
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Karyawan/v_karyawan');
		//$this->load->view('footer');
	}

	public function tambahKaryawan()
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "karyawan"
		);

		$dataKota = $this->Kota_Model->get_allKota();
		$data = array(
	        'dataKota' => $dataKota
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Karyawan/v_tambahKaryawan',$data);
		//$this->load->view('footer');
	}

	public function prosesTambahToko()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		//isi data diisi array post
		$isiData = $this->input->post();
		//print_r($isiData);
		$isLow=FALSE;

		if($this->input->post('btnTambah'))
		{
			$this->form_validation->set_rules('kodeToko', 'Kode toko', 'required');
			$this->form_validation->set_rules('namaToko', 'Nama toko', 'required');
			$this->form_validation->set_rules('alamatToko', 'Alamat Toko', 'required');
			$this->form_validation->set_rules('pilihKotaToko', 'Kota Toko', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error', 'Data tidak lengkap');
				redirect('toko/tambahToko');
           	}
           	else
           	{
				$kodeToko	= $this->input->post('kodeToko');
				$namaToko	= $this->input->post('namaToko');
				$alamatToko	= $this->input->post('alamatToko');
				$contactPersonToko	= $this->input->post('contactPersonToko');
				$alamatEmailToko	= $this->input->post('alamatEmailToko');
				$pilihKotaToko	= $this->input->post('pilihKotaToko');
				$kodePosToko	= $this->input->post('kodePosToko');
				$teleponToko	= $this->input->post('teleponToko');
				$hpToko	= $this->input->post('hpToko');
				$faximileToko	= $this->input->post('faximileToko');
				$limitPiutangToko	= $this->input->post('limitPiutangToko');
				$jatuhTempoToko	= $this->input->post('jatuhTempoToko');

				$result = $this->Toko_Model->insert_toko($kodeToko, $alamatEmailToko, $namaToko, $contactPersonToko, $alamatToko, $kodePosToko, $teleponToko, $hpToko, $faximileToko, $limitPiutangToko, $jatuhTempoToko, $pilihKotaToko);


				if(count($result) > 0)
				{

					$this->session->set_flashdata('sukses', 'Berhasil simpan toko');
					redirect('toko');
				} 
				else 
				{
					$this->session->set_flashdata('error', 'Gagal simpan toko');
					redirect('toko');
				}
         	}
		}
		else
		{
			echo "jangan lakukan refresh saat pengiriman data";
			redirect(base_url()."merk", 'refresh');
		}
	}
}
