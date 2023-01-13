<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_portal');
	}

	public function index()
	{
		$this->load->view('login');
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
				'password' => md5($password)			
			);
			$data = $this->m_portal->get_data($where,'tbl_admin');
			$d = $this->m_portal->get_data($where,'tbl_admin')->row();
			$cek = $data->num_rows();
			if($cek > 0){
				$session = array(
					'id_admin'=> $d->id_admin,
					'user'=> $d->user,
					'nama'=> $d->nama,
					'status' => 'login'
				);
				$this->session->set_userdata($session);
				if ($d->level=='1') {
						# code...
						redirect(base_url().'mahatar/');
					}elseif ($d->level=='2') {
						# code...
						redirect(base_url().'wdosen/');
					}elseif ($d->level=='3'){
						redirect(base_url().'ppk/');
					}elseif ($d->level=='4'){
						redirect(base_url().'baak/');
					}
					elseif ($d->level=='5'){
						redirect(base_url().'bk/');
					}elseif ($d->level=='6'){
						redirect(base_url().'lpm/');
					}elseif ($d->level=='7'){
						redirect(base_url().'hrd/');
					}
			}else{
				redirect(base_url().'administrasi?pesan=gagal');			
			}
		}else{
			$this->load->view('login');
		}
	}

}

/* End of file administrasi.php */
/* Location: ./application/controllers/administrasi.php */