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
	public function input_kardosp()
	{
		# code...
		$this->form_validation->set_rules('nama', 'Harus diisi', 'required');
		$this->form_validation->set_rules('status', 'Harus diisi', 'required');


		if ($this->form_validation->run() != false) {
			$data = array(
			'niak'  	=> $this->input->post('niak'),
			'nama'  	=> $this->input->post('nama'),
			'tempat_lahir'  	=> $this->input->post('tempat_lahir'),
			'tanggal_lahir'  	=> $this->input->post('tanggal_lahir'),
			'alamat'  	=> $this->input->post('alamat'),
			'agama'  		=> $this->input->post('agama'),
			'telepon'     => $this->input->post('telepon'),
			'status_nikah'=> $this->input->post('status_nikah'),
			'jabatan'=> $this->input->post('jabatan'),
			'sk_kartep'=> $this->input->post('sk_kartep'),
			'kartep_tmt'=> $this->input->post('kartep_tmt'),
			'sk_dostep'=> $this->input->post('sk_dostep'),
			'dostep_tmt'=> $this->input->post('dostep_tmt'),
			'status'=> $this->input->post('status'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_master_kardos');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses input Karyawan dan Dosen anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, input Karyawan dan Dosen berhasil diproses</b>");  
			 }

			 //after input
			$datax['jabatan'] = $this->m_portal->get_data_all('tbl_master_jabatan')->result();
			$this->load->view('hrd/header');
			$this->load->view('hrd/input_kardos',$datax);
			$this->load->view('hrd/footer');
		}else{
		$this->load->view('hrd/header');
		$this->load->view('hrd/input_kardos');
		$this->load->view('hrd/footer');
		}
	}
	public function edit_kardos($id)
	{
		$where = array(
			'id' => $id,			       
        );
		$data['kardos'] = $this->m_portal->get_data_join_kardos($where)->result();
		$data['jabatan'] = $this->m_portal->get_data_all('tbl_master_jabatan')->result();
		$this->load->view('hrd/header');
		$this->load->view('hrd/input_kardos',$data);
		$this->load->view('hrd/footer');
	}
	public function detail_kardos($id)
	{
		$where = array(
			'id' => $id,			       
        );
		$data['kardos'] = $this->m_portal->get_data_join_kardos($where)->result();
		// $data['jabatan'] = $this->m_portal->get_data_all('tbl_master_jabatan')->result();
		$this->load->view('hrd/header');
		$this->load->view('hrd/detail_kardos',$data);
		$this->load->view('hrd/footer');
	}
	public function edit_kardosp()
	{
		# code...
		$this->form_validation->set_rules('nama', 'Harus diisi', 'required');
		$this->form_validation->set_rules('status', 'Harus diisi', 'required');


		if ($this->form_validation->run() != false) {
			$where = array(
				'id'  	=> $this->input->post('id'),
			);
			$data = array(
			'niak'  	=> $this->input->post('niak'),
			'nama'  	=> $this->input->post('nama'),
			'tempat_lahir'  	=> $this->input->post('tempat_lahir'),
			'tanggal_lahir'  	=> $this->input->post('tanggal_lahir'),
			'alamat'  	=> $this->input->post('alamat'),
			'agama'  		=> $this->input->post('agama'),
			'telepon'     => $this->input->post('telepon'),
			'status_nikah'=> $this->input->post('status_nikah'),
			'jabatan'=> $this->input->post('jabatan'),
			'sk_kartep'=> $this->input->post('sk_kartep'),
			'kartep_tmt'=> $this->input->post('kartep_tmt'),
			'sk_dostep'=> $this->input->post('sk_dostep'),
			'dostep_tmt'=> $this->input->post('dostep_tmt'),
			'status'=> $this->input->post('status'),
		   );
			$res = $this->m_portal->hrd_data($where,$data,'tbl_master_kardos');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses input Karyawan dan Dosen anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, input Karyawan dan Dosen berhasil diproses</b>");  
			 }

			 //after input
			$datax['jabatan'] = $this->m_portal->get_data_all('tbl_master_jabatan')->result();
			$this->load->view('hrd/header');
			$this->load->view('hrd/input_kardos',$datax);
			$this->load->view('hrd/footer');
		}else{
		$this->load->view('hrd/header');
		$this->load->view('hrd/input_kardos');
		$this->load->view('hrd/footer');
		}
	}

}

/* End of file Hrd.php */
/* Location: ./application/controllers/Hrd.php */