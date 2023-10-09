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
	public function cekstatus($label, $status, $nim)
	{
		# code...
		$where = array(
				$label => $status,
				'nim' => $nim
			);
		$data = $this->m_mahasiswa->get_data($where, 'tbl_mon');

		return $data;
	}
	public function pra()
	{
		# code...
		$data['mahasiswa'] = $this;

		$mhs = $this->session->userdata('user');

		$where = array(
				'NIM' => $mhs			
			);

		$data['mhs'] = $this->m_mahasiswa->get_data($where, 'tmst_mahasiswa');

		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/pra',$data);
		$this->load->view('mahasiswa/footer');
	}
	public function onboard()
	{
		# code...
		$data['mahasiswa'] = $this;
		$mhs = $this->session->userdata('user');
		$mhsnya = $mhs['user'];
		$where = array(
				'tmst_mahasiswa.NIM' => $mhsnya		
			);
		$data['mhs_detail'] = $this->m_mahasiswa->get_data_mhs_detail($where);
		

		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/onboard',$data);
		$this->load->view('mahasiswa/footer');

	}

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */