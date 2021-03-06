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
	        'menuAktif' => "masterdata",
	        'subMenu' => "supplier"
		);

		$dataSupplier = $this->Supplier_Model->get_allSupplier();
		$data = array(
	        'dataSupplier' => $dataSupplier
		);

		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Supplier/v_supplier',$data);
		//$this->load->view('footer');
	}

	public function tambahSupplier()
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "supplier"
		);

		$dataKota = $this->Kota_Model->get_allKota();
		$data = array(
	        'dataKota' => $dataKota
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Supplier/v_tambahSupplier',$data);
		//$this->load->view('footer');
	}

	public function prosesTambahSupplier()
	{
		//isi data diisi array post
		$isiData = $this->input->post();
		//print_r($isiData);
		$isLow=FALSE;

		if($this->input->post('btnTambah'))
		{
			$this->form_validation->set_rules('namaSupplier', 'Nama Supplier', 'required');
			$this->form_validation->set_rules('alamatSupplier', 'Nama Supplier', 'required');
			$this->form_validation->set_rules('pilihKotaSupplier', 'Kota Supplier', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error', 'Data tidak lengkap');
				redirect('supplier/tambahSupplier');
           	}
           	else
           	{
				$namaSupplier	= $this->input->post('namaSupplier');
				$alamatSupplier	= $this->input->post('alamatSupplier');
				$contactPersonSupplier	= $this->input->post('contactPersonSupplier');
				$alamatEmailSupplier	= $this->input->post('alamatEmailSupplier');
				$pilihKotaSupplier	= $this->input->post('pilihKotaSupplier');
				$kodePosSupplier	= $this->input->post('kodePosSupplier');
				$teleponSupplier	= $this->input->post('teleponSupplier');
				$hpSupplier	= $this->input->post('hpSupplier');
				$faximileSupplier	= $this->input->post('faximileSupplier');
				$limitPiutangSupplier	= $this->input->post('limitPiutangSupplier');
				$jatuhTempoSupplier	= $this->input->post('jatuhTempoSupplier');

				$result = $this->Supplier_Model->insert_supplier($alamatEmailSupplier, $namaSupplier, $contactPersonSupplier, $alamatSupplier, $kodePosSupplier, $teleponSupplier, $hpSupplier, $faximileSupplier, $limitPiutangSupplier, $jatuhTempoSupplier, $pilihKotaSupplier);


				if(count($result) > 0)
				{

					$this->session->set_flashdata('sukses', 'Berhasil simpan Supplier');
					redirect('supplier');
				} 
				else 
				{
					$this->session->set_flashdata('error', 'Gagal simpan Supplier');
					redirect('supplier');
				}
         	}
		}
		else
		{
			echo "jangan lakukan refresh saat pengiriman data";
			redirect(base_url()."supplier", 'refresh');
		}
	}

	public function editSupplier($id)
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "supplier"
		);
		$dataSupplier=$this->Supplier_Model->get_supplierById($id);
		$dataKota = $this->Kota_Model->get_allKota();
		$data = array(
	        'idSupplier' => $id,
	        'dataSupplier' => $dataSupplier,
	        'dataKota' => $dataKota
		);

		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Supplier/v_editSupplier',$data);
		//$this->load->view('footer');
	}

	public function prosesEditSupplier($id)
	{
		//isi data diisi array post
		$isiData = $this->input->post();
		/*print_r($isiData);
		exit();*/
		$isLow=FALSE;

		if($this->input->post('btnTambah'))
		{
			$this->form_validation->set_rules('namaSupplier', 'Nama Supplier', 'required');
			$this->form_validation->set_rules('alamatSupplier', 'Nama Supplier', 'required');
			$this->form_validation->set_rules('pilihKotaSupplier', 'Kota Supplier', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error', 'Data tidak lengkap');
				redirect('supplier/editSupplier/'.$id);
           	}
           	else
           	{
				$namaSupplier	= $this->input->post('namaSupplier');
				$alamatSupplier	= $this->input->post('alamatSupplier');
				$contactPersonSupplier	= $this->input->post('contactPersonSupplier');
				$alamatEmailSupplier	= $this->input->post('alamatEmailSupplier');
				$pilihKotaSupplier	= $this->input->post('pilihKotaSupplier');
				$kodePosSupplier	= $this->input->post('kodePosSupplier');
				$teleponSupplier	= $this->input->post('teleponSupplier');
				$hpSupplier	= $this->input->post('hpSupplier');
				$faximileSupplier	= $this->input->post('faximileSupplier');
				$limitPiutangSupplier	= $this->input->post('limitPiutangSupplier');
				$jatuhTempoSupplier	= $this->input->post('jatuhTempoSupplier');
				$checkAktif=FALSE;
				if($this->input->post('checkAktif')!==null && $this->input->post('checkAktif')=="aktif")
					$checkAktif=TRUE;

				$result = $this->Supplier_Model->update_supplier($id, $alamatEmailSupplier, $namaSupplier, $contactPersonSupplier, $alamatSupplier, $kodePosSupplier, $teleponSupplier, $hpSupplier, $faximileSupplier, $limitPiutangSupplier, $jatuhTempoSupplier, $checkAktif, $pilihKotaSupplier);


				if(count($result) > 0)
				{

					$this->session->set_flashdata('sukses', 'Berhasil edit Supplier');
					redirect('supplier');
				} 
				else 
				{
					$this->session->set_flashdata('error', 'Gagal edit Supplier');
					redirect('supplier');
				}
         	}
		}
		else
		{
			echo "jangan lakukan refresh saat pengiriman data";
			redirect(base_url()."supplier", 'refresh');
		}
	}

	public function hapusSupplier($id)
	{
		$result = $this->Supplier_Model->delete_supplier($id);
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
