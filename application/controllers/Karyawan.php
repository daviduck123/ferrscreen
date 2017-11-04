<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	//Karyawan = User Model

	public function __construct(){
        header('Access-Control-Allow-Origin: *');
        parent::__construct();
	 	$this->load->model('Kota_Model');
	 	$this->load->model('User_Model');
	 	$this->load->model('Jabatan_Model');
    }

	public function index()
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "karyawan"
		);
		$dataKaryawan = $this->User_Model->get_allUser();
		$data = array(
			"dataKaryawan" => $dataKaryawan
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Karyawan/v_karyawan', $data);
		//$this->load->view('footer');
	}

	public function tambahKaryawan()
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "karyawan"
		);

		$dataKota = $this->Kota_Model->get_allKota();
		$dataJabatan = $this->Jabatan_Model->get_allJabatan();
		$data = array(
	        'dataKota' => $dataKota,
	        'dataJabatan' => $dataJabatan 
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Karyawan/v_tambahKaryawan',$data);
		//$this->load->view('footer');
	}

	public function prosesTambahKaryawan()
	{
		//isi data diisi array post
		$isiData = $this->input->post();
		//print_r($isiData);
		$isLow=FALSE;

		if($this->input->post('btnTambah'))
		{
			$this->form_validation->set_rules('namaKaryawan', 'Nama Karyawan', 'required');
			$this->form_validation->set_rules('alamatKaryawan', 'Alamat Karyawan', 'required');
			$this->form_validation->set_rules('pilihKotaKaryawan', 'Kota Karyawan', 'required');
			$this->form_validation->set_rules('tglMasuk', 'Tanggal Masuk', 'required');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error', 'Data tidak lengkap');
				$this->tambahKaryawan();
				/*redirect('karyawan/tambahKaryawan');*/
           	}
           	else
           	{
				$namaKaryawan	= $this->input->post('namaKaryawan');
				$alamatKaryawan	= $this->input->post('alamatKaryawan');
				$alamatEmailKaryawan	= $this->input->post('alamatEmailKaryawan');
				$pilihKotaKaryawan	= $this->input->post('pilihKotaKaryawan');
				$deskripsiKaryawan	= $this->input->post('deskripsiKaryawan');
				$teleponKaryawan	= $this->input->post('teleponKaryawan');
				$hpKaryawan	= $this->input->post('hpKaryawan');
				$arrDate=$this->input->post('tglMasuk');
				$arrDate = str_replace('/', '-', $arrDate);
				$arrDate	= new DateTime($arrDate);
				$tglMasuk=$arrDate->format('Y-m-d H:i:s');
				//$arrDate = date('Y-m-d H:i:s', strtotime($arrDate));
				$jabatan	= $this->input->post('jabatan');

				$result = $this->User_Model->insert_user($alamatEmailKaryawan, $namaKaryawan, $alamatKaryawan, $teleponKaryawan, $hpKaryawan, $deskripsiKaryawan, $tglMasuk, null, $pilihKotaKaryawan, $jabatan);
				if(count($result) > 0)
				{
					$this->session->set_flashdata('sukses', 'Berhasil simpan karyawan');
					redirect('karyawan');
				} 
				else 
				{
					$this->session->set_flashdata('error', 'Gagal simpan karyawan');
					redirect('karyawan');
				}
         	}
		}
		else
		{
			/*echo "jangan lakukan refresh saat pengiriman data";*/
			redirect("karyawan", 'refresh');
		}
	}

	public function editKaryawan($id)
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "karyawan"
		);

		$dataKaryawan = $this->User_Model->get_userById($id);
		$dataKota = $this->Kota_Model->get_allKota();
		$dataJabatan = $this->Jabatan_Model->get_allJabatan();
		$data = array(
	        'dataKota' => $dataKota,
	        'dataJabatan' => $dataJabatan,
	        'dataKaryawan' => $dataKaryawan
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Karyawan/v_editKaryawan',$data);
		//$this->load->view('footer');
	}

	public function prosesEditKaryawan()
	{
		//isi data diisi array post
		$isiData = $this->input->post();
/*		print_r($isiData);
		exit();*/
		$isLow=FALSE;

		if($this->input->post('btnUpdate'))
		{
			$this->form_validation->set_rules('namaKaryawan', 'Nama Karyawan', 'required');
			//$this->form_validation->set_rules('alamatKaryawan', 'Alamat Karyawan', 'required');
			//$this->form_validation->set_rules('pilihKotaKaryawan', 'Kota Karyawan', 'required');
			/*$this->form_validation->set_rules('tglMasuk', 'Tanggal Masuk', 'required');*/
			//$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$id	= $this->input->post('id');
				$this->session->set_flashdata('error', 'Data tidak lengkap');
				$dataMenu = array(
			        'menuAktif' => "masterdata",
			        'subMenu' => "karyawan"
				);

				$dataKaryawan = $this->User_Model->get_userById($id);
				$dataKota = $this->Kota_Model->get_allKota();
				$dataJabatan = $this->Jabatan_Model->get_allJabatan();
				$data = array(
			        'dataKota' => $dataKota,
			        'dataJabatan' => $dataJabatan,
			        'dataKaryawan' => $dataKaryawan
				);
				$this->load->view('header');
				$this->load->view('sidebar',$dataMenu);
				$this->load->view('MasterData/Karyawan/v_editKaryawan',$data);
				/*redirect('karyawan/tambahKaryawan');*/
           	}
           	else
           	{
				$id	= $this->input->post('id');
				$namaKaryawan	= $this->input->post('namaKaryawan');
				$alamatKaryawan	= $this->input->post('alamatKaryawan');
				$alamatEmailKaryawan	= $this->input->post('alamatEmailKaryawan');
				$pilihKotaKaryawan	= $this->input->post('pilihKotaKaryawan');
				$deskripsiKaryawan	= $this->input->post('deskripsiKaryawan');
				$teleponKaryawan	= $this->input->post('teleponKaryawan');
				$hpKaryawan	= $this->input->post('hpKaryawan');
				$arrDate=$this->input->post('tglMasuk');
				$arrDate = str_replace('/', '-', $arrDate);
				$arrDate	= new DateTime($arrDate);
				$tglMasuk=$arrDate->format('Y-m-d H:i:s');

				$arrDate=$this->input->post('tglKeluar');
				$arrDate = str_replace('/', '-', $arrDate);
				$arrDate	= new DateTime($arrDate);
				$tglKeluar=$arrDate->format('Y-m-d H:i:s');
				
				$jabatan	= $this->input->post('jabatan');
				$is_aktif = "0";
				if($this->input->post('is_aktif')!==null && $this->input->post('is_aktif')=="is_aktif"){
					$is_aktif="1";
				}
				if($is_aktif == "1"){
					$tglKeluar = null;
				}

				$result = $this->User_Model->update_user($alamatEmailKaryawan, $namaKaryawan, $alamatKaryawan, $teleponKaryawan, $hpKaryawan, $deskripsiKaryawan, $tglMasuk, $tglKeluar, $is_aktif, $pilihKotaKaryawan, $id, $jabatan);
				if(count($result) > 0)
				{
					$this->session->set_flashdata('sukses', 'Berhasil simpan karyawan');
					redirect('karyawan');
				} 
				else 
				{
					$this->session->set_flashdata('error', 'Gagal simpan karyawan');
					redirect('karyawan');
				}
         	}
		}
		else
		{
			/*echo "jangan lakukan refresh saat pengiriman data";*/
			redirect(base_url()."karyawan", 'refresh');
		}
	}
}
