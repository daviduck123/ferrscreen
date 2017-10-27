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
	        'menuAktif' => "merk"
		);

		$dataMerk = $this->Merk_Model->get_allMerk();
		$data = array(
	        'dataMerk' => $dataMerk
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('merk',$data);
		//$this->load->view('footer');
	}

	public function tambahMerk()
	{
		$dataMenu = array(
	        'menuAktif' => "merk"
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('tambahMerk');
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
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				echo "Ada yang belum anda isi";
           	}
           	else
           	{
				$namaMerk	= $this->input->post('namaMerk');
				$keterangan	= $this->input->post('keterangan');

				$result = $this->Merk_Model->insert_merk($namaMerk,$keterangan);

				/*

				if(count($result) > 0)
				{
					$dataMenu = array(
				        'menuAktif' => "merk"
					);

					$dataMerk = $this->Merk_Model->get_allMerk();

					$dataInfo = array(
						//status 1 berarti success
				        'status' => "1",
				        'keterangan' => "Merk baru berhasil ditambahkan",
					);
					$data = array(
				        'dataMerk' => $dataMerk,
				        'dataInfo' => $dataInfo
					);
                	$this->load->view('header');
					$this->load->view('sidebar',$dataMenu);
					$this->load->view('merk',$data);
				} 
				else 
				{
					 $dataMenu = array(
				        'menuAktif' => "merk"
					);

					$dataMerk = $this->Merk_Model->get_allMerk();

					$dataInfo = array(
						//status 0 berarti gagal
				        'status' => "0",
				        'keterangan' => "Tidak berhasil dalam menambahkan merk baru",
					);
					$data = array(
				        'dataMerk' => $dataMerk,
				        'dataInfo' => $dataInfo
					);
                	$this->load->view('header');
					$this->load->view('sidebar',$dataMenu);
					$this->load->view('merk',$data);
				}
				*/
         	}
		}
		else
		{
			echo "jangan lakukan refresh saat pengiriman data";
			redirect(base_url()."merk", 'refresh');
		}
	}
}
