<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
	        'menuAktif' => "laporan",
	        'subMenu' => 'labarugi'
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		//$this->load->view('laporanKaryawan');
		$this->load->view('error404');
		$this->load->view('footer');
	}

	public function labarugi()
	{
		$dataMenu = array(
	        'menuAktif' => "laporan",
	        'subMenu' => 'labarugi'
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		//$this->load->view('laporanKaryawan');
		$this->load->view('error404');
		$this->load->view('footer');
	}

	public function karyawan()
	{
		$dataMenu = array(
	        'menuAktif' => "laporan",
	        'subMenu' => 'karyawan'
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		//$this->load->view('laporanKaryawan');
		$this->load->view('error404');
		$this->load->view('footer');
	}

	public function toko()
	{
		$dataMenu = array(
	        'menuAktif' => "laporan",
	        'subMenu' => 'toko'
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		//$this->load->view('laporanKaryawan');
		$this->load->view('error404');
		$this->load->view('footer');
	}

	public function pengeluaran()
	{
		$dataMenu = array(
	        'menuAktif' => "laporan",
	        'subMenu' => 'pengeluaran'
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		//$this->load->view('laporanKaryawan');
		$this->load->view('error404');
		$this->load->view('footer');
	}

	public function pemasukan()
	{
		$dataMenu = array(
	        'menuAktif' => "laporan",
	        'subMenu' => 'pemasukan'
		);
		$this->load->view('header');
		$this->load->view('sidebar',$dataMenu);
		//$this->load->view('laporanKaryawan');
		$this->load->view('error404');
		$this->load->view('footer');
	}
}
