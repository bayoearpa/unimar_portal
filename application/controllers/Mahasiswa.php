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
		$this->load->helper('download');
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
		$data = $this->m_mahasiswa->get_data($where, 'tbl_mon')->num_rows();

		return $data;
	}
	public function pra($id)
	{
		# code...
		$data['mahasiswa'] = $this;
		$data['mhs_detail'] = $this->m_mahasiswa->get_data_mhs_detail($id);
		//get set for month and year
		$whset = array(
				'id_set' => '1',
			);
		$get_setting = $this->m_mahasiswa->get_data($whset,'tbl_profesi_setting')->result();
		foreach ($get_setting as $key) {
			# code...
			$get_tahun = $key->tahun;
			$get_bulan = $key->bulan;

			$data['set_tahun'] = $get_tahun;
			$data['set_bulan'] = $get_bulan;
		}

		// cek log registrasi 
		foreach ($data['mhs_detail'] as $k) {
			# code...
			$seafarercode = $k->seafarercode;
		}
		$whcek = array(
				'seafarercode' => $seafarercode,
				'bulan' => $get_bulan,
				'tahun' => $get_tahun,
			);
		$data['ceklog'] = $this->m_mahasiswa->get_data($whcek,'tbl_profesi_registrasi_log')->num_rows();
		$data['cekbayar'] = $this->m_mahasiswa->get_data($whcek,'tbl_profesi_pembayaran_2018')->num_rows();

		//get mata uji
		$prodi = $this->session->userdata('prodi');
		$prodinnya = ($prodi == '92403') ? "1" : "2" ;
		$whmu = array(
				'id_jenisujianprofesi' => '1',
				'id_metodeujianprofesi' => '3',
				'id_prodiprofesi' => $prodinnya,

			);
		$data['mu'] = $this->m_mahasiswa->get_data($whmu,'tbl_profesi_matauji_fungsi')->result(); 
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/pra',$data);
		$this->load->view('mahasiswa/footer');
	}
	public function pasca($id)
	{
		# code...
		$data['mahasiswa'] = $this;
		$data['mhs_detail'] = $this->m_mahasiswa->get_data_mhs_detail($id);
		//get set for month and year
		$whset = array(
				'id_set' => '1',
			);
		$get_setting = $this->m_mahasiswa->get_data($whset,'tbl_profesi_setting')->result();
		foreach ($get_setting as $key) {
			# code...
			$get_tahun = $key->tahun;
			$get_bulan = $key->bulan;

			$data['set_tahun'] = $get_tahun;
			$data['set_bulan'] = $get_bulan;
		}

		// cek log registrasi 
		foreach ($data['mhs_detail'] as $k) {
			# code...
			$seafarercode = $k->seafarercode;
		}
		$whcek = array(
				'seafarercode' => $seafarercode,
				'bulan' => $get_bulan,
				'tahun' => $get_tahun,
			);
		$data['ceklog'] = $this->m_mahasiswa->get_data($whcek,'tbl_profesi_registrasi_log')->num_rows();
		$data['cekbayar'] = $this->m_mahasiswa->get_data($whcek,'tbl_profesi_pembayaran_2018')->num_rows();

		//get mata uji
		$prodi = $this->session->userdata('prodi');
		$prodinnya = ($prodi == '92403') ? "1" : "2" ;
		$whmu = array(
				'id_jenisujianprofesi' => '2',
				'id_metodeujianprofesi' => '3',
				'id_prodiprofesi' => $prodinnya,

			);
		$data['mu'] = $this->m_mahasiswa->get_data($whmu,'tbl_profesi_matauji_fungsi')->result();

		$whmuk = array(
				'id_jenisujianprofesi' => '2',
				'id_metodeujianprofesi' => '2',
				'id_prodiprofesi' => $prodinnya,

			);
		$data['muk'] = $this->m_mahasiswa->get_data($whmuk,'tbl_profesi_matauji_fungsi')->result(); 
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/pasca',$data);
		$this->load->view('mahasiswa/footer');
	}
	public function profesip()
	{
		# code...
		$user = $this->session->userdata('user');

		/////////////////////////////// /.input to tbl log/////////////////////////////////////

			$tgl_registrasi = date('Y-m-d');
			$data_log = array(
			'seafarercode'     	=> $this->input->post('seafarercode'),	
			'bulan'   			=> $this->input->post('bulan'),
			'tahun'   			=> $this->input->post('tahun'),		
			'tgl_registrasi' 	=> $tgl_registrasi
			);

		$res = $this->m_mahasiswa->input_data($data_log,'tbl_profesi_registrasi_log');

		/////////////////////////////input to registrasi2///////////////////////////////////////
		$result = array();
		foreach ($_POST['matauji'] as $key => $val) {
			$result[] = array( 
				'seafarercode'     		=> $this->input->post('seafarercode'),
				'bulan'   				=> $this->input->post('bulan'),
				'tahun'   				=> $this->input->post('tahun'),			
				'id_matauji' 			=> $_POST['matauji'][$key],
				'id_profesi' 			=> $this->input->post('id_profesi'),
				'id_jenisujianprofesi'	=> $this->input->post('jenis'),
				'status' 				=> $this->input->post('status'),
				'sudah'					=> "0"
			);		
		}		
		$this->db->insert_batch('tbl_profesi_registrasi2',$result);

		/////////////////////////////./input arry///////////////////////////////////////	

		  // $res = $this->m_portal->input_data($data,'tbl_kliring_smta');

		  if($res==true && $result==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses pendaftaran UKP anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Pendaftaran UKP anda berhasil silakan lakukan pengecekan berkas dan pembayaran</b>");  
			 }
	  	redirect(base_url().'mahasiswa/pra/'.$user);

	}
	public function onboard($id)
	{
		# code...
		$data['mahasiswa'] = $this;
		$data['mhs_detail'] = $this->m_mahasiswa->get_data_mhs_detail($id);

		foreach ($data['mhs_detail'] as $key) {
			# code...
			$tglSignOn = $key->tgl_sign_on;
			$tglLapSignOn = $key->tgl_lap_sign_on;

			$data['selisihHari'] = floor(($tglLapSignOn - $tglSignOn) / (60 * 60 * 24));	
		}
		
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/onboard',$data);
		$this->load->view('mahasiswa/footer');
		$this->load->view('mahasiswa/onboard_js',$data);

	}
	public function onboardp()
	{
       /// cek file
    $cekfile = $this->input->post('ufsignon_existing');
    $nimc = $this->input->post('nim');
    if ($cekfile > 0) {
    	# code...
    	 // Tangani data yang dikirimkan dari formulir
			$where = array(
		        'id_mon' => $this->input->post('id_mon'),
		    );
			$nim = $this->input->post('nim');
			$namaperusahaan = $this->input->post('namaperusahaan');
			$status_onboard = $this->input->post('status_onboard');
			$nama_kapal = $this->input->post('namakapal');
			$tgl_signon = $this->input->post('tglsignon');
			$tgl_lap_signon = date('Y-m-d');

		    $tgl_signonf = date('Y-m-d', strtotime($tgl_signon)); // Ubah format tanggal
    	// Simpan data ke database (contoh)
            $data = array(
                'status_onboard' => $status_onboard,
                'nama_perusahaan' => $namaperusahaan,
                'nama_kapal' => $nama_kapal,
                'tgl_sign_on' => $tgl_signonf,
                'status_sb' => 'tidak',
                'tgl_lap_sign_on' => $tgl_lap_signon
            );
            $proses_edt = $this->m_mahasiswa->update_data($where,$data,'tbl_mon');
            $id_mon = $this->input->post('id_mon');
            $data_lapon = array(
            	'id_mon' => $id_mon,
            );
            $this->m_mahasiswa->input_data($data_lapon,'tbl_lap_onboard');

        if($proses_edt){    
             redirect(base_url().'mahasiswa/onboard/'.$nim);
        } else {
             redirect(base_url().'mahasiswa/onboard/'.$nim);
        }

    }else{
    
    	 // Tangani data yang dikirimkan dari formulir
		$where = array(
	        'id_mon' => $this->input->post('id_mon'),
	    ); 
		$nim = $this->input->post('nim');
		$namaperusahaan = $this->input->post('namaperusahaan');
		$status_onboard = $this->input->post('status_onboard');
		$nama_kapal = $this->input->post('namakapal');
		$tgl_signon = $this->input->post('tglsignon');
		$tgl_lap_signon = date('Y-m-d');


	    $tgl_signonf = date('Y-m-d', strtotime($tgl_signon)); // Ubah format tanggal
    // Tangani unggahan file
        $config['upload_path'] = './assets/monitoring/onboard';
        $config['max_size'] = 1048;
        $config['allowed_types'] = 'pdf'; // Sesuaikan dengan jenis file yang diizinkan
        $config['file_name'] = $nim.'_signon'; // Nama file yang diunggah sesuai NIM
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('ufsignon')) {
            // Jika unggahan berhasil
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            // Simpan data ke database (contoh)
            $data = array(
               'status_onboard' => $status_onboard,
                'nama_perusahaan' => $namaperusahaan,
                'nama_kapal' => $nama_kapal,
                'tgl_sign_on' => $tgl_signonf,
                'status_sb' => 'tidak',
                'tgl_lap_sign_on' => $tgl_lap_signon,
                'upload_file_signon' => $file_name
            );
            $id_mon = $this->input->post('id_mon');
            $data_lapon = array(
            	'id_mon' => $id_mon,
            );
            $this->m_mahasiswa->update_data($where,$data,'tbl_mon');
            $this->m_mahasiswa->input_data($data_lapon,'tbl_lap_onboard');

            redirect(base_url().'mahasiswa/onboard/'.$nimc);
        } else {
            redirect(base_url().'mahasiswa/onboard/'.$nimc);
        }

        ///else eufsignon_existing == 0
       }
    
	} 
	public function laponboard($id)
	{
		# code...
		$data['mahasiswa'] = $this;
		$data['mhs_detail'] = $this->m_mahasiswa->get_data_mhs_detail($id);

		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/laponboard',$data);
		$this->load->view('mahasiswa/footer');
	}
	public function laponboardfile($id)
	{
		# code...
		$nim = $this->session->userdata('user');
		$data['mahasiswa'] = $this;
		$data['mhs_detail'] = $this->m_mahasiswa->get_data_mhs_detail($nim);

		$data['lapke'] = $id;
		
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/laponboardfile',$data);
		$this->load->view('mahasiswa/footer');
		$this->load->view('mahasiswa/trb_js',$data);

	}
	public function laponboardp()
	{
		# code...
		// $cekfile = $this->input->post('ufsignon_existing');
    	$nim = $this->input->post('nim');
		 // Tangani data yang dikirimkan dari formulir

		$where = array(
	        'id_lapon' => $this->input->post('id_lapon'),
	    );
			$laporanke = $this->input->post('lapke');
			$date_lapon = date('Y-m-d');
			$namafile = $nim."-laporan_onboard_ke_".$laporanke;
			$db_laponboard = "lap_onboard".$laporanke;
			$db_datelapon = "date_lapon".$laporanke;



    // Tangani unggahan file
        $config['upload_path'] = './assets/monitoring/laponboard/'.$laporanke;
        $config['max_size'] = 1048;
        $config['allowed_types'] = 'pdf'; // Sesuaikan dengan jenis file yang diizinkan
        $config['file_name'] = $namafile; // Nama file yang diunggah sesuai NIM
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('lap_onboard'.$laporanke)) {
            // Jika unggahan berhasil
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            // Simpan data ke database (contoh)
            $data = array(
              	$db_laponboard => $namafile,
                $db_datelapon => $date_lapon
            );
            $this->m_mahasiswa->update_data($where,$data,'tbl_lap_onboard');

            redirect(base_url().'mahasiswa/laponboard/'.$nim);

			}
	}
	public function down_format_laporan_bulanan_onboard()
	{
		# code...
		force_download('assets/download/format_laporan_bulanan_onboard24.pdf',NULL);
		redirect(base_url());
	}
	public function offboard($id)
	{
		# code...
		$data['mahasiswa'] = $this;
		$data['mhs_detail'] = $this->m_mahasiswa->get_data_mhs_detail($id);

		foreach ($data['mhs_detail'] as $key) {
			# code...
			$tglSignOff = $key->tgl_sign_off;
			$tglLapSignOff = $key->tgl_lap_sign_off;

			$data['selisihHari'] = floor(($tglLapSignOff - $tglSignOff) / (60 * 60 * 24));	
		}
		
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/offboard',$data);
		$this->load->view('mahasiswa/footer');
		$this->load->view('mahasiswa/offboard_js',$data);

	}

	public function offboardp()
	{
       /// cek file
    $cekfile = $this->input->post('ufsignon_existing');
    $nimc = $this->input->post('nim');
    if ($cekfile > 0) {
    	# code...
    	 // Tangani data yang dikirimkan dari formulir
			$where = array(
		        'id_mon' => $this->input->post('id_mon'),
		    );
			$nim = $this->input->post('nim');
			$status_offboard = $this->input->post('status_offboard');
			$tgl_signoff = $this->input->post('tglsignoff');
			$tgl_lap_signoff = date('Y-m-d');

		    $tgl_signofff = date('Y-m-d', strtotime($tgl_signon)); // Ubah format tanggal
    	// Simpan data ke database (contoh)
            $data = array(
            	'status_offboard' => $status_offboard,
            	'status_onboard' => 'tidak',
                'tgl_sign_off' => $tgl_signofff,
                'tgl_lap_sign_off' => $tgl_lap_signoff
            );
            $proses_edt = $this->m_mahasiswa->update_data($where,$data,'tbl_mon');
        if($proses_edt){    
             redirect(base_url().'mahasiswa/offboard/'.$nim);
        } else {
             redirect(base_url().'mahasiswa/offboard/'.$nim);
        }

    }else{
    
    	 // Tangani data yang dikirimkan dari formulir
		$where = array(
	        'id_mon' => $this->input->post('id_mon'),
	    );
		$nim = $this->input->post('nim');
			$status_offboard = $this->input->post('status_offboard');
			$tgl_signoff = $this->input->post('tglsignoff');
			$tgl_lap_signoff = date('Y-m-d');

    // Tangani unggahan file
        $config['upload_path'] = './assets/monitoring/offboard';
        $config['max_size'] = 1048;
        $config['allowed_types'] = 'pdf'; // Sesuaikan dengan jenis file yang diizinkan
        $config['file_name'] = $nim.'_signoff'; // Nama file yang diunggah sesuai NIM
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('ufsignoff')) {
            // Jika unggahan berhasil
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            // Simpan data ke database (contoh)
            $data = array(
              	'status_offboard' => $status_offboard,
              	'status_onboard' => 'tidak',
                'tgl_sign_off' => $tgl_signofff,
                'tgl_lap_sign_off' => $tgl_lap_signoff,
                'upload_file_signon' => $file_name
            );
            $this->m_mahasiswa->update_data($where,$data,'tbl_mon');

            redirect(base_url().'mahasiswa/offboard/'.$nimc);
        } else {
            redirect(base_url().'mahasiswa/offboard/'.$nimc);
        }

        ///else eufsignon_existing == 0
       }
    
	} 


	public function trb($id)
	{
		# code...
		$data['mahasiswa'] = $this;
		$data['mhs_detail'] = $this->m_mahasiswa->get_data_mhs_detail($id);
		
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/trb',$data);
		$this->load->view('mahasiswa/footer');
		$this->load->view('mahasiswa/trb_js',$data);

	}

	public function trbp()
	{
       /// cek file
    $cekfile = $this->input->post('ufsignon_existing');
    $nimc = $this->input->post('nim');
    if ($cekfile > 0) {
    	# code...
    	 // Tangani data yang dikirimkan dari formulir
			$where = array(
		        'id_mon' => $this->input->post('id_mon'),
		    );
			$nim = $this->input->post('nim');
			$status_trb = $this->input->post('status_trb');

    	// Simpan data ke database (contoh)
            $data = array(
            	'status_trb' => $status_trb,
            );
            $proses_edt = $this->m_mahasiswa->update_data($where,$data,'tbl_mon');
        if($proses_edt){    
             redirect(base_url().'mahasiswa/trb/'.$nim);
        } else {
             redirect(base_url().'mahasiswa/trb/'.$nim);
        }

    }else{
    
    	 // Tangani data yang dikirimkan dari formulir
		$where = array(
	        'id_mon' => $this->input->post('id_mon'),
	    );
		$nim = $this->input->post('nim');
			$status_trb = $this->input->post('status_trb');

    // Tangani unggahan file
        $config['upload_path'] = './assets/monitoring/trb';
        $config['max_size'] = 1048;
        $config['allowed_types'] = 'pdf'; // Sesuaikan dengan jenis file yang diizinkan
        $config['file_name'] = $nim.'_skltrb'; // Nama file yang diunggah sesuai NIM
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('ufskltrb')) {
            // Jika unggahan berhasil
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            // Simpan data ke database (contoh)
            $data = array(
              	'status_trb' => $status_trb,
                'upload_file_trb' => $file_name
            );
            $this->m_mahasiswa->update_data($where,$data,'tbl_mon');

            redirect(base_url().'mahasiswa/trb/'.$nimc);
        } else {
            redirect(base_url().'mahasiswa/trb/'.$nimc);
        }

        ///else eufsignon_existing == 0
       }
    
	} 

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */