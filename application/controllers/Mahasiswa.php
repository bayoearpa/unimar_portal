<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'Mahasiswa?pesan=belumlogin');
		}
		$this->load->model('m_mahasiswa');
		$this->load->library('m_pdf');
	}
	public function index()
	{
		$this->load->view('login');
	}

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */