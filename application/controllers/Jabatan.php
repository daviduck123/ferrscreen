<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function __construct(){
        header('Access-Control-Allow-Origin: *');
        parent::__construct();
	 	$this->load->model('Jabatan_Model');
	 	$this->load->model('HakAkses_Model');
    }

	public function index()
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "jabatan"
		);

		$dataJabatan = $this->Jabatan_Model->get_allJabatan();
		$data = array(
			"dataJabatan" => $dataJabatan
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		//$this->load->view('barang');
		$this->load->view('MasterData/Jabatan/v_jabatan', $data);
		$this->load->view('footer');
	}

	public function tambahJabatan()
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "jabatan"
		);

		$dataHakAkses = $this->HakAkses_Model->get_allHakAkses();
		$data = array(
			"dataHakAkses" => $dataHakAkses
		);

		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Jabatan/v_tambahJabatan', $data);
		//$this->load->view('footer');
	}

	public function prosesTambahJabatan()
	{
		//isi data diisi array post
		$isiData = $this->input->post();
		/*print_r($isiData);
		exit();*/
		$isLow=FALSE;

		if($this->input->post('btnTambah'))
		{
			$this->form_validation->set_rules('namaJabatan', 'Nama Jabatan', 'required');
			$this->form_validation->set_rules('hak_akses[]', 'Hak Akses', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error', 'Data tidak lengkap');
				redirect("jabatan/tambahJabatan");
           	}
           	else
           	{
				$namaJabatan	= $this->input->post('namaJabatan');
				$deskripsi	= $this->input->post('deskripsi');
				$hak_akses	= $this->input->post('hak_akses');

				$result = $this->Jabatan_Model->insert_jabatan($namaJabatan,$deskripsi, $hak_akses);

				if(count($result) > 0)
				{

					$this->session->set_flashdata('sukses', 'Berhasil simpan jabatan');
					redirect('jabatan');
				} 
				else 
				{
					$this->session->set_flashdata('error', 'Gagal simpan jabatan');
					redirect('jabatan');
				}
         	}
		}
		else
		{
			echo "jangan lakukan refresh saat pengiriman data";
			redirect("jabatan", 'refresh');
		}
	}

	public function editJabatan($id)
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "jabatan"
		);

		$dataJabatanAll = $this->Jabatan_Model->get_allJabatan();
		$dataJabatan = $this->Jabatan_Model->get_jabatanById($id);

		$data = array(
			"idEditJabatan"=>$id,
			"dataJabatan"=>$dataJabatan,
			"dataJabatanAll"=>$dataJabatanAll
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Jabatan/v_editJabatan', $data);
		//$this->load->view('footer');
	}

	public function prosesEditJabatan($id)
	{
		//isi data diisi array post
		$isiData = $this->input->post();
		/*print_r($isiData);
		exit();*/
		$isLow=FALSE;

		if($this->input->post('btnTambah'))
		{
			$this->form_validation->set_rules('namaJabatan', 'Nama Jabatan', 'required');
			$this->form_validation->set_rules('hak_akses[]', 'Hak Akses', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error', 'Data tidak lengkap');
				redirect("jabatan/editJabatan/1");
           	}
           	else
           	{
				$namaJabatan	= $this->input->post('namaJabatan');
				$deskripsi	= $this->input->post('deskripsi');
				$hak_akses	= $this->input->post('hak_akses');

				$result = $this->Jabatan_Model->update_jabatan($id,$namaJabatan,$deskripsi, $hak_akses);

				if(count($result) > 0)
				{

					$this->session->set_flashdata('sukses', 'Berhasil edit jabatan');
					redirect('jabatan');
				} 
				else 
				{
					$this->session->set_flashdata('error', 'Gagal edit jabatan');
					redirect('jabatan');
				}
         	}
		}
		else
		{
			echo "jangan lakukan refresh saat pengiriman data";
			redirect("jabatan", 'refresh');
		}
	}

	public function hapusJabatan($id)
	{
		$result = $this->Jabatan_Model->delete_jabatan($id);
		if(count($result) > 0)
		{
			$this->session->set_flashdata('sukses', 'Berhasil hapus jabatan');
			redirect('jabatan');
		} 
		else 
		{
			$this->session->set_flashdata('error', 'Gagal hapus jabatan');
			redirect('jabatan');
		}
	}
}
