<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller {

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
	 	$this->load->model('General_Model');
    }

	public function index()
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "general"
		);
		$data["general"] = $this->General_Model->get_allGeneral();

		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		//$this->load->view('barang');
		$this->load->view('v_general', $data);
		$this->load->view('footer');
	}

	public function updateGeneral(){
		if($this->input->post('btnTambah'))
		{
			$this->form_validation->set_rules('komisiLow', 'Komisi Low', 'required');
			$this->form_validation->set_rules('komisiNormal', 'Komisi Normal', 'required');
			$this->form_validation->set_rules('komisiDiskon', 'Komisi Diskon', 'required');
			$this->form_validation->set_rules('plusNormal', 'Harga Plus Normal', 'required');
			$this->form_validation->set_rules('plusLow', 'Harga Plus Low', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error', 'Data tidak lengkap');
				redirect("general");
           	}
           	else
           	{
				$komisi_low = $this->input->post('komisiLow');
				$komisi_normal = $this->input->post('komisiNormal');
				$komisi_diskon = $this->input->post('komisiDiskon');
				$plus_normal = $this->input->post('plusNormal');
				$plus_low = $this->input->post('plusLow');

				$result = $this->General_Model->update_general($komisi_low, $komisi_diskon, $komisi_normal, $plus_low, $plus_normal);

				if(count($result) > 0)
				{
					$this->session->set_flashdata('sukses', 'Berhasil simpan data');
					redirect('general');
				} 
				else 
				{
					$this->session->set_flashdata('error', 'Gagal simpan data');
					redirect('general');
				}
         	}
		}
		else
		{
			echo "jangan lakukan refresh saat pengiriman data";
			redirect("general", 'refresh');
		}
	}
}
