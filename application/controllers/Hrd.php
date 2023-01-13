<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hrd extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'administrasi?pesan=belumlogin');
		}elseif ($this->session->userdata('level') != "7") {
			# code...
			redirect(base_url().'administrasi?pesan=salahkamar');
		}
		$this->load->model('m_portal');
	}
	
	public function index()
	{
		$this->load->view('hrd/header');
		$this->load->view('hrd/index');
		$this->load->view('hrd/footer');
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'administrasi?pesan=logout');
	}
	public function kardos()
	{
		$data['kardos'] = $this->m_portal->get_data_all('tbl_master_kardos')->result();
		$this->load->view('hrd/header');
		$this->load->view('hrd/kardos',$data);
		$this->load->view('hrd/footer');
	}
	public function input_kardos()
	{
		$data['jabatan'] = $this->m_portal->get_data_all('tbl_master_jabatan')->result();
		$this->load->view('hrd/header');
		$this->load->view('hrd/input_kardos',$data);
		$this->load->view('hrd/footer');
	}
	public function edit_kardos($id)
	{
		$where = array(
			'id' => $id,			       
        );
		$data['kardos'] = $this->m_portal->get_data($where,'tbl_master_kardos')->result();
		$data['jabatan'] = $this->m_portal->get_data_all('tbl_master_jabatan')->result();
		$this->load->view('hrd/header');
		$this->load->view('hrd/input_kardos',$data);
		$this->load->view('hrd/footer');
	}

}

/* End of file Hrd.php */
/* Location: ./application/controllers/Hrd.php */