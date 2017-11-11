<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {

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
	 	$this->load->model('Type_Model');
    }

	public function index()
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "type"
		);

		$dataType = $this->Type_Model->get_allType();
		$data = array(
	        'dataType' => $dataType
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Type/v_type',$data);
		//$this->load->view('footer');
	}

	public function tambahType()
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "type"
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Type/v_tambahType');
		//$this->load->view('footer');
	}

	public function prosesTambahType()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		//isi data diisi array post
		$isiData = $this->input->post();
		//print_r($isiData);
		$isLow=FALSE;

		if($this->input->post('btnTambah'))
		{
			$this->form_validation->set_rules('namaType', 'Nama type', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error', 'Data tidak lengkap');
				redirect("type/tambahType");
           	}
           	else
           	{
				$namaType	= $this->input->post('namaType');
				$deskripsi	= $this->input->post('deskripsi');

				$result = $this->Type_Model->insert_type($namaType,$deskripsi);

				if(count($result) > 0)
				{

					$this->session->set_flashdata('sukses', 'Berhasil simpan Type');
					redirect('type');
				} 
				else 
				{
					$this->session->set_flashdata('error', 'Gagal simpan Type');
					redirect('type');
				}
         	}
		}
		else
		{
			echo "jangan lakukan refresh saat pengiriman data";
			redirect("type", 'refresh');
		}
	}

	public function editType($id)
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "type"
		);

		$dataType = $this->Type_Model->get_typeById($id);
		$data = array(
			'idType' => $id,
	        'dataType' => $dataType
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Type/v_editType',$data);
	}

	public function prosesEditType($id)
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		//isi data diisi array post
		$isiData = $this->input->post();
		//print_r($isiData);
		$isLow=FALSE;

		if($this->input->post('btnTambah'))
		{
			$this->form_validation->set_rules('namaType', 'Nama type', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error', 'Data tidak lengkap');
				redirect("type/editType/".$id);
           	}
           	else
           	{
				$namaType	= $this->input->post('namaType');
				$deskripsi	= $this->input->post('deskripsi');

				$result = $this->Type_Model->update_type($id, $namaType,$deskripsi);

				if(count($result) > 0)
				{

					$this->session->set_flashdata('sukses', 'Berhasil edit type');
					redirect('type');
				} 
				else 
				{
					$this->session->set_flashdata('error', 'Gagal edit type');
					redirect('type');
				}
         	}
		}
		else
		{
			echo "jangan lakukan refresh saat pengiriman data";
			redirect("type", 'refresh');
		}
	}

	public function hapusType($id)
	{
		$result = $this->Type_Model->delete_type($id);
		if(count($result) > 0)
		{
			$this->session->set_flashdata('sukses', 'Berhasil hapus type');
			redirect('type');
		} 
		else 
		{
			$this->session->set_flashdata('error', 'Gagal hapus type');
			redirect('type');
		}
	}
}
