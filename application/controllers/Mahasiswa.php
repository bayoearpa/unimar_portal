<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		// if($this->session->userdata('status') != "login"){
		// 	redirect(base_url().'mahasiswa?pesan=belumlogin');
		// }
		$this->load->model('m_mahasiswa');
		$this->load->library('m_pdf');
	}

	public function index()
	{
		$this->load->view('mahasiswa/login');
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'mahasiswa?pesan=logout');
	}
	public function login()
	{
		# code...
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		if($this->form_validation->run() != false){
			$where = array(
				'user' => $username,
				'pass' => md5($password)			
			);
			$data = $this->m_mahasiswa->get_data_join_for_login($where);
			$d = $this->m_mahasiswa->get_data_join_for_login($where)->row();
			$cek = $data->num_rows();
			if($cek > 0){
				$session = array(
					'user'=> $d->user,
					'nama'=> $d->Nama_mahasiswa,
					'prodi'=> $d->Kode_program_studi,
					'nprodi'=> $d->Nama_program_studi,
					'status' => 'login'
				);
				$this->session->set_userdata($session);
				redirect(base_url().'mahasiswa/home');
			}else{
				redirect(base_url().'mahasiswa?pesan=gagal');			
			}
		}else{
			$this->load->view('login');
		}
	}
	public function home()
	{
		# code...
		$data['mahasiswa'] = $this; 
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/home',$data);
		$this->load->view('mahasiswa/footer');
	}
	public function cekstatus($label, $status)
	{
		# code...
		$where = array(
				$label => $status			
			);
		$data = $this->m_mahasiswa->get_data($where);

		return $data;
	}

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */