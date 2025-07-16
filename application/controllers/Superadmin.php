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
	public function cekstatus_tkbi_periode($status)
	{
		# code...
		$where = array(
				'status' => $status,
			);
		$data = $this->m_portal->get_data($where, 'diklat_tkbi_kelas')->num_rows();

		return $data;
	}
	public function set_kelas()
	{
		$status = "belum";
		//cek periode kelas
		$data['cek_periode'] = $this->cekstatus_tkbi_periode($status);
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
                'waktu_pelaksanaan' => date('Y-m-d', strtotime($waktu_pelaksanaan)),
            );
			$proses = $this->m_portal->update_data2($where,$data,'diklat_tkbi_kelas');
			if ($proses) {
	            echo 'sukses';
	        } else {
	            echo 'gagal edit data';
	        }
      
    }
    public function export_kelas()
    {
    	# code...
    	$data['kelas'] = $this->m_portal->get_data_all('diklat_tkbi_kelas')->result();
    	$this->load->view('superadmin/header');
		$this->load->view('superadmin/export_kelas',$data);
		$this->load->view('superadmin/footer');
		$this->load->view('superadmin/export_kelas_js');
    }
    public function preview_export()
    {
        // Ambil data dari request POST
        $kelas = $this->input->post('kelas');
        // $gelombang = $this->input->post('gelombang');

        // $data['koperasi'] = $this; // Jika diperlukan di dalam view


         $where = array(
                'id_tkbi_kelas' => $kelas,
            );

            // Siapkan data untuk view
            $data['frm_kelas'] = $kelas;

        // Ambil data dari model
        $data['results'] = $this->m_portal->get_data_join_tkbi($where);

        // Load the view with the data, returning the HTML string (no headers or footers)
        $this->load->view('superadmin/preview_export', $data);
    }
	///////////////////////////////////////////////////// ./SET KELAS ////////////////////////////////////////////

}

/* End of file Superadmin.php */
/* Location: ./application/controllers/Superadmin.php */