<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

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
	 	$this->load->model('Supplier_Model');
	 	$this->load->model('SupplierBarang_Model');
	 	$this->load->model('Merk_Model');
	 	$this->load->model('Type_Model');
    }

	public function index()
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "barang"
		);

		$dataSupplier = $this->Supplier_Model->get_allSupplier();
		$dataBarang = $this->Barang_Model->get_allBarang();
		$data = array(
	        'dataSupplier' => $dataSupplier,
	        'dataBarang' => $dataBarang,
		);

		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Barang/v_barang',$data);
		//$this->load->view('footer');
	}

	public function load_tableBarang(){
		$dataSupplier = $this->Supplier_Model->get_allSupplier();
		$dataBarang = $this->Barang_Model->get_allBarang();
		$data = array(
	        'dataSupplier' => $dataSupplier,
	        'dataBarang' => $dataBarang,
		);
		$this->load->view('MasterData/Barang/v_tableBarang', $data);
	}

	public function get_allBarang()
	{
		$dataSupplier = $this->Supplier_Model->get_allSupplier();
		$dataBarang = $this->Barang_Model->get_allBarang();
		$data = array(
	        'dataSupplier' => $dataSupplier,
	        'dataBarang' => $dataBarang,
		);
		echo json_encode($data);
	}

	public function tambahBarang()
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "barang"
		);

		$dataBarang = $this->Barang_Model->get_allBarang();
		$dataMerk = $this->Merk_Model->get_allMerk();
		$dataType = $this->Type_Model->get_allType();

		$data = array(
	        'dataBarang' => $dataBarang,
	        'dataMerk' => $dataMerk,
	        'dataType' => $dataType
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Barang/v_tambahBarang',$data);
		//$this->load->view('footer');
	}

	public function prosesTambahBarang()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		//isi data diisi array post
		$isiData = $this->input->post();
		//print_r($isiData);
		$isLow=FALSE;

		if($this->input->post('btnTambah'))
		{
			$this->form_validation->set_rules('kodeBarang', 'Kode barang', 'required');
			$this->form_validation->set_rules('namaBarang', 'Nama barang', 'required');
			$this->form_validation->set_rules('minStok', 'Minimal stok', 'required');
			$this->form_validation->set_rules('pilihMerkBarang', 'Pilih merek barang', 'required');
			$this->form_validation->set_rules('hargaNormal', 'Harga normal', 'required');

			if($this->input->post('checkLow')!==null && $this->input->post('checkLow')=="low")
			{
				$this->form_validation->set_rules('pilihMerkBarangLow', 'Pilih merek barang low', 'required');
				$this->form_validation->set_rules('hargaLow', 'Harga low', 'required');
			}
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error', 'Data tidak lengkap');
				redirect('barang/tambahBarang');
           	}
           	else
           	{
           		$kodeBarang	= $this->input->post('kodeBarang');
				$namaBarang	= $this->input->post('namaBarang');
				$minStok	= $this->input->post('minStok');
				$similarBarang	= $this->input->post('similarBarang');
				$pilihMerkBarang	= $this->input->post('pilihMerkBarang');
				$hargaNormal	= $this->input->post('hargaNormal');
				$deskripsiNormal	= $this->input->post('deskripsiNormal');


				if($this->input->post('checkLow')!==null && $this->input->post('checkLow')=="low")
					$isLow=TRUE;

				$kodeBarangLow	= "L".$kodeBarang;
				$pilihMerkBarangLow	= $this->input->post('pilihMerkBarangLow');
				$hargaLow	= $this->input->post('hargaLow');
				$deskripsiLow	= $this->input->post('deskripsiLow');
				$result = $this->Barang_Model->insert_barang($namaBarang, $minStok, $pilihMerkBarang, $similarBarang, $kodeBarang, $hargaNormal, $deskripsiNormal, $isLow, $pilihMerkBarangLow, $kodeBarangLow, $hargaLow, $deskripsiLow);


				if(count($result) > 0)
				{

					$this->session->set_flashdata('sukses', 'Berhasil simpan barang');
					redirect('barang');
				} 
				else 
				{
					$this->session->set_flashdata('error', 'Gagal simpan barang');
					redirect('barang');
				}
         	}
		}
		else if($this->input->post('btnBatal')){
			redirect('barang');
		}
		else
		{
			echo "jangan lakukan refresh saat pengiriman data";
		}
	}

	public function editBarang($id)
	{
		$dataMenu = array(
	        'menuAktif' => "masterdata",
	        'subMenu' => "barang"
		);
		$barangSelected =$this->Barang_Model->get_barangById($id);
		$dataBarang = $this->Barang_Model->get_allBarang();
		$dataMerk = $this->Merk_Model->get_allMerk();
		$data = array(
			'idBarang' => $id,
	        'dataBarang' => $dataBarang,
	        'dataMerk' => $dataMerk,
	        'barangSelected'=>$barangSelected
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		$this->load->view('MasterData/Barang/v_editBarang',$data);
		//$this->load->view('footer');
	}

	public function prosesUpdateBarang($id)
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		//isi data diisi array post
		$isiData = $this->input->post();
		/*print_r($isiData);
		exit();*/
		$isLow=FALSE;

		if($this->input->post('btnTambah'))
		{
			$this->form_validation->set_rules('kodeBarang', 'Kode barang', 'required');
			$this->form_validation->set_rules('namaBarang', 'Nama barang', 'required');
			$this->form_validation->set_rules('minStok', 'Minimal stok', 'required');
			$this->form_validation->set_rules('pilihMerkBarang', 'Pilih merek barang', 'required');
			$this->form_validation->set_rules('hargaNormal', 'Harga normal', 'required');

			if($this->input->post('checkLow')!==null && $this->input->post('checkLow')=="low")
			{
				$this->form_validation->set_rules('pilihMerkBarangLow', 'Pilih merek barang low', 'required');
				$this->form_validation->set_rules('hargaLow', 'Harga low', 'required');
			}
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('error', 'Data tidak lengkap');
				redirect('barang/editBarang/'.$id);
           	}
           	else
           	{
           		$kodeBarang	= $this->input->post('kodeBarang');
				$namaBarang	= $this->input->post('namaBarang');
				$minStok	= $this->input->post('minStok');
				$similarBarang	= $this->input->post('similarBarang');
				$pilihMerkBarang	= $this->input->post('pilihMerkBarang');
				$hargaNormal	= $this->input->post('hargaNormal');
				$deskripsiNormal	= $this->input->post('deskripsiNormal');


				if($this->input->post('checkLow')!==null && $this->input->post('checkLow')=="low")
					$isLow=TRUE;

				$kodeBarangLow	= "L".$kodeBarang;
				$pilihMerkBarangLow	= $this->input->post('pilihMerkBarangLow');
				$hargaLow	= $this->input->post('hargaLow');
				$deskripsiLow	= $this->input->post('deskripsiLow');
				$result = $this->Barang_Model->update_barang($id, $namaBarang, $minStok, $pilihMerkBarang, $similarBarang, $kodeBarang, $hargaNormal, $deskripsiNormal, $isLow, $pilihMerkBarangLow, $kodeBarangLow, $hargaLow, $deskripsiLow);


				if(count($result) > 0)
				{

					$this->session->set_flashdata('sukses', 'Berhasil edit barang');
					redirect('barang');
				} 
				else 
				{
					$this->session->set_flashdata('error', 'Gagal edit barang');
					redirect('barang');
				}
         	}
		}
		else
		{
			echo "jangan lakukan refresh saat pengiriman data";
		}
	}

	public function hapusBarang($id)
	{
		$result = $this->Barang_Model->delete_barang($id);
		if(count($result) > 0)
		{
			$this->session->set_flashdata('sukses', 'Berhasil hapus barang');
			redirect('barang');
		} 
		else 
		{
			$this->session->set_flashdata('error', 'Gagal hapus barang');
			redirect('barang');
		}
	}

	public function prosesTambahDetailBarang()
	{
		//$this->load->helper(array('form', 'url'));
		//$this->load->library('form_validation');

		//isi data diisi array post
		$isiData = $this->input->post();
		//$isLow=FALSE;

		if($this->input->post('btnTambah'))
		{
       		$id_supplier	= $this->input->post('id_supplier');
       		$id_barang	= $this->input->post('id_barang');
			$stok	= $this->input->post('stok');
			$harga	= $this->input->post('harga');

			$foundData = $this->SupplierBarang_Model->check_supplierBarangByIdSupplierAndIdBarang($id_supplier, $id_barang);
			if($foundData == true){
				$result = $this->SupplierBarang_Model->update_supplierBarang($id_supplier, $id_barang, $stok, $harga);
			}else{
				$result = $this->SupplierBarang_Model->insert_supplierBarang($id_supplier, $id_barang, $stok, $harga);
			}

			if(count($result) > 0)
			{
				$data = array('status' => 1, 'deskripsi' => "Berhasil tambah data");
				echo json_encode($data);
			} 
			else 
			{
				$data = array('status' => 0, 'deskripsi' => "Gagal tambah data");
				echo json_encode($data);
			}
		}
		else
		{
			$data = array('status' => 0, 'deskripsi' => "Gunakan hanya website ini");
			echo json_encode($data);
		}
	}

	public function hapus_supplierBarang()
	{
		if($this->input->post('btnDelete'))
		{
			$id_supplier	= $this->input->post('id_supplier');
	       	$id_barang	= $this->input->post('id_barang');

			$result = $this->SupplierBarang_Model->delete_supplierBarang($id_supplier,$id_barang);

			if(count($result) > 0)
			{
				$data = array('status' => 1, 'deskripsi' => "Berhasil delete data");
				echo json_encode($data);
			} 
			else 
			{
				$data = array('status' => 0, 'deskripsi' => "Gagal delete data");
				echo json_encode($data);
			}
		}
		else
		{
			$data = array('status' => 0, 'deskripsi' => "Gunakan hanya website ini");
			echo json_encode($data);
		}	
	}

	public function update_supplierBarang(){
		if($this->input->post('btnUpdate'))
		{
			$id_supplier	= $this->input->post('id_supplier');
	       	$id_barang	= $this->input->post('id_barang');
	       	$stok	= $this->input->post('stok');
			$harga	= $this->input->post('harga');
			$result = $this->SupplierBarang_Model->update_supplierBarang($id_supplier, $id_barang, $stok, $harga);

			if(count($result) > 0)
			{
				$data = array('status' => 1, 'deskripsi' => "Berhasil tambah data");
				echo json_encode($data);
			} 
			else 
			{
				$data = array('status' => 0, 'deskripsi' => "Gagal tambah data");
				echo json_encode($data);
			}
		}
		else
		{
			$data = array('status' => 0, 'deskripsi' => "Gunakan hanya website ini");
			echo json_encode($data);
		}
	}
}
