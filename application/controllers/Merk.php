<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merk extends CI_Controller {

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
	 	$this->load->model('Merk_Model');
    }

	public function index()
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "merk"
		);

		$dataMerk = $this->Merk_Model->get_allMerk();
		$data = array(
	        'dataMerk' => $dataMerk
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Merk/v_merk',$data);
		//$this->load->view('footer');
	}

	public function tambahMerk()
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "merk"
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Merk/v_tambahMerk');
		//$this->load->view('footer');
	}

	public function prosesTambahMerk()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		//isi data diisi array post
		$isiData = $this->input->post();
		//print_r($isiData);
		$isLow=FALSE;

		if($this->input->post('btnTambah'))
		{
			$this->form_validation->set_rules('namaMerk', 'Nama merk', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error', 'Data tidak lengkap');
				redirect("merk/tambahMerk");
           	}
           	else
           	{
				$namaMerk	= $this->input->post('namaMerk');
				$keterangan	= $this->input->post('keterangan');

				$result = $this->Merk_Model->insert_merk($namaMerk,$keterangan);

				if(count($result) > 0)
				{

					$this->session->set_flashdata('sukses', 'Berhasil simpan merk');
					redirect('merk');
				} 
				else 
				{
					$this->session->set_flashdata('error', 'Gagal simpan merk');
					redirect('merk');
				}
         	}
		}
		else
		{
			echo "jangan lakukan refresh saat pengiriman data";
			redirect("merk", 'refresh');
		}
	}

}
