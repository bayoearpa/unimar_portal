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

	///////////////////////////////////////////////////// SET KELAS ////////////////////////////////////////////
	public function get_edit_kelas($id)
	{
		# code...
		// Ambil data berdasarkan ID dari model Anda
        $data = $this->m_portal->get_data_tkbi_kelas($id); // Gantilah 'get_data_by_id' dengan metode yang sesuai dalam model Anda

        // Konversi data ke format JSON dan kirimkan ke view
        echo json_encode($data);
	}
	public function set_kelas()
	{
		$data['kelas'] = $this->m_portal->get_data_all('diklat_tkbi_kelas')->result();
		$this->load->view('superadmin/header');
		$this->load->view('superadmin/set_kelas',$data);
		$this->load->view('superadmin/footer');
		$this->load->view('superadmin/set_kelas_js');
	}
	 public function set_kelas_edit()
	{
		# code...
		$id_tkbi_kelas = $this->input->post('id_tkbi_kelas');
		$periode_kelas = $this->input->post('periode_kelas');
		$status = $this->input->post('status');
        $waktu_pelaksanaan = $this->input->post('waktu_pelaksanaan');

        //get pembayaran detail
		
        	$where = array(
				'id_tkbi_kelas' => $id_tkbi_kelas
			);
			$data = array(
                'periode_kelas' => $periode_kelas,
                'status' => $status,
                'waktu_pelaksanaan' => $waktu_pelaksanaan,
            );
			$proses = $this->m_portal->update_data2($where,$data,'diklat_tkbi_kelas');
			if ($proses) {
	            echo 'sukses';
	        } else {
	            echo 'gagal edit data';
	        }
      
    }
	///////////////////////////////////////////////////// ./SET KELAS ////////////////////////////////////////////

}

/* End of file Superadmin.php */
/* Location: ./application/controllers/Superadmin.php */