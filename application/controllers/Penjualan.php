<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

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
	 	$this->load->model('Type_Model');
	 	$this->load->model('Supplier_Model');
	 	$this->load->model('Toko_Model');
	 	$this->load->model('User_Model');
	 	$this->load->model('DetailBarang_Model');
    }

	public function index()
	{
		$dataMenu = array(
	        'menuAktif' => "penjualan",
	        'subMenu' =>  ''
		);


		$dataBarang = $this->Barang_Model->get_allBarang();
		$dataMerk = $this->Merk_Model->get_allMerk();
		$dataType = $this->Type_Model->get_allType();
		$dataSupplier = $this->Supplier_Model->get_allSupplier();
		$dataToko = $this->Toko_Model->get_allToko();
		$dataUser = $this->User_Model->get_allUser();
		//print_r($dataUser);
		//exit();

		$kumpulanData=array();
		 
		for($i=0;$i<20;$i++)
		{
			$cobaData = array(
		        'kode' => "KODENYA",
		        'nama' => "nama pembeli kah?",
		        'harga' => 5000,
		        'jumlah' => 5,
		        'subTotal' => 25000,
		        'keterangan' => "keterangannya diisi"
			);
			array_push($kumpulanData,$cobaData);
		}

		$data = array(
	        'dataPenjualan' => $kumpulanData,
	        'dataSupplier' => $dataSupplier,
	        'dataBarang' => $dataBarang,
	        'dataType' => $dataType,
	        'dataMerk' => $dataMerk,
	        'dataToko' => $dataToko,
	        'dataUser' => $dataUser
		);

		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		//$this->load->view('penjualan');
		$this->load->view('Penjualan/v_penjualan',$data);
		//$this->load->view('footer');
	}

	public function prosesTambahPenjualan()
	{
		//isi data diisi array post
		$isiData = $this->input->post();
		//print_r($isiData);
		$isLow=FALSE;
		print_r($isiData);
		exit();
		if($this->input->post('btnTambah'))
		{
			$this->form_validation->set_rules('pilihCustomerPenjualan', 'Nama Costumer', 'required');
			$this->form_validation->set_rules('nomorNotaPenjualan', 'Nomor Nota', 'required');
			$this->form_validation->set_rules('jatuhTempoPenjualan', 'Jatuh Tempo', 'required');
			$this->form_validation->set_rules('pilihSalesPenjualan', 'Nama Sales', 'required');
			$this->form_validation->set_rules('tanggalPenjualan', 'Tanggal Penjualan', 'required');
			
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error', 'Data tidak lengkap');
				redirect('penjualan');
           	}
           	else
           	{
           		//Data Nota
				$kode = $this->input->post("noNotaJual");
				$id_user = $this->input->post("id_sales");
				$id_customer = $this->input->post("id_customer");
				$waktu_kirim = $this->input->post("waktu_kirim");
				$ppn = $this->input->post("ppn");
				$diskon = $this->input->post("diskon");
				$biaya_kirim = $this->input->post("biaya_kirim");
				$grand_total = $this->input->post("grand_total");
				$deskripsi = $this->input->post("deskripsi");

				//List Barang berupa array tiap data
				$id_barangs = $this->input->post("id_barangs");
				$id_suppliers = $this->input->post("id_suppliers");
				$id_types = $this->input->post("id_types");
				$hargas = $this->input->post("hargas");
				$jumlahs = $this->input->post("jumlahs");
				$deskripsis = $this->input->post("deskripsis");

				$result = $this->NotaJual_Model->insert_notaJual($kode, $id_user, $id_customer, null, $total, $ppn, $diskon, $biaya_kirim, $grand_total, $deskripsi, $id_barangs, $id_suppliers, $id_types, $hargas, $jumlahs, $deskripsis);


				if(count($result) > 0)
				{

					$this->session->set_flashdata('sukses', 'Berhasil simpan Nota Jual');
					redirect('penjualan');
				} 
				else 
				{
					$this->session->set_flashdata('error', 'Gagal simpan Nota Jual');
					redirect('penjualan');
				}
         	}
		}
		else
		{
			echo "jangan lakukan refresh saat pengiriman data";
			redirect(base_url()."penjualan", 'refresh');
		}
	}


	function showAllNotaJual(){
		$nota = $this->NotaJual_Model->get_allnotaJual();
		$data = array(
			"nota" => $nota
		);

		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		//$this->load->view('penjualan');
		$this->load->view('Penjualan/v_listPenjualan',$data);
	}
}
