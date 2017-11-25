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
	public function index()
	{
		$dataMenu = array(
	        'menuAktif' => "penjualan",
	        'subMenu' =>  ''
		);

		
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
	        'dataPenjualan' => $kumpulanData
		);

		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		//$this->load->view('penjualan');
		$this->load->view('Penjualan/v_penjualan',$data);
		//$this->load->view('footer');
	}
}
