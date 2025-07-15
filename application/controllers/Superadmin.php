<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'administrasi?pesan=belumlogin');
		}elseif ($this->session->userdata('level') != "69") {
			# code...
			redirect(base_url().'administrasi?pesan=salahkamar');
		}
		$this->load->model('m_portal');
	}

	public function index()
	{
		$this->load->view('superadmin/header');
		$this->load->view('superadmin/index');
		$this->load->view('superadmin/footer');
	}

}

/* End of file Superadmin.php */
/* Location: ./application/controllers/Superadmin.php */