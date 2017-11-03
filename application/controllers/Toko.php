<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

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
	 	$this->load->model('Toko_Model');
	 	$this->load->model('Kota_Model');
    }

	public function index()
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "toko"
		);

		$dataToko = $this->Toko_Model->get_allToko();
		$data = array(
	        'dataToko' => $dataToko
		);

		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Toko/v_toko',$data);
		//$this->load->view('footer');
	}

	public function tambahToko()
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "toko"
		);

		$dataKota = $this->Kota_Model->get_allKota();
		$data = array(
	        'dataKota' => $dataKota
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Toko/v_tambahToko',$data);
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

	public function editToko($id)
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "toko"
		);

		$dataSelected = $this->Toko_Model->get_tokoById($id);
		$dataKota = $this->Kota_Model->get_allKota();
		$data = array(
			'idToko' => $id,
	        'dataKota' => $dataKota,
	        'dataSelected' => $dataSelected
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Toko/v_editToko',$data);
		//$this->load->view('footer');
	}

	public function prosesEditToko($id)
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
				redirect('toko/editToko/'.$id);
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
				$checkAktif=FALSE;
				if($this->input->post('checkAktif')!==null && $this->input->post('checkAktif')=="aktif")
					$checkAktif=TRUE;

				$result = $this->Toko_Model->update_toko($id, $kodeToko, $alamatEmailToko, $namaToko, $contactPersonToko, $alamatToko, $kodePosToko, $teleponToko, $hpToko, $faximileToko, $limitPiutangToko, $jatuhTempoToko, $checkAktif, $pilihKotaToko);


				if(count($result) > 0)
				{

					$this->session->set_flashdata('sukses', 'Berhasil edit toko');
					redirect('toko');
				} 
				else 
				{
					$this->session->set_flashdata('error', 'Gagal edit toko');
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

	public function hapusToko($id)
	{
		$result = $this->Toko_Model->delete_toko($id);
		if(count($result) > 0)
		{
			$this->session->set_flashdata('sukses', 'Berhasil hapus supplier');
			redirect('supplier');
		} 
		else 
		{
			$this->session->set_flashdata('error', 'Gagal hapus supplier');
			redirect('supplier');
		}
	}
}
