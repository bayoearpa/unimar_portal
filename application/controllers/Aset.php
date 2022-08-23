<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_aset');
		$this->load->library('m_pdf');
	}

	public function index()
	{
		$this->load->view('ma/login');
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'aset?pesan=logout');
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
				'username' => $username,
				'password' => md5($password)			
			);
			$data = $this->m_aset->get_data($where,'tbl_aset_user');
			$d = $this->m_aset->get_data($where,'tbl_aset_user')->row();
			$cek = $data->num_rows();
			if($cek > 0){
				$session = array(
					'id_user'=> $d->id_user,
					'username'=> $d->username,
					'nama'=> $d->nama,
					'status' => 'login'
				);
				$this->session->set_userdata($session);
				if ($d->level=='1') {
						# code...
						redirect(base_url().'aset/home');
					}
						// elseif ($d->level=='2') {
					// 	# code...
					// 	redirect(base_url().'wdosen/');
					// }elseif ($d->level=='3'){
					// 	redirect(base_url().'ppk/');
					// }elseif ($d->level=='4'){
					// 	redirect(base_url().'baak/');
					// }
					// elseif ($d->level=='5'){
					// 	redirect(base_url().'bk/');
					// }
			}else{
				redirect(base_url().'aset?pesan=gagal');			
			}
		}else{
			$this->load->view('login');
		}
	}

	////home
	public function home()
	{
		$this->load->view('ma/header');
		$this->load->view('ma/home');
		$this->load->view('ma/footer');
	}
	//gedung
	public function gedung()
	{
		ini_set('max_execution_time', -1); 
		$this->load->library('datatables');

		$mportal = $this->m_aset;

		// $ta = '20192';
		$gedung = $this->datatables->new2();
		// $ajuan->searchable(['tmst_mahasiswa.nama_mahasiswa', 'tmst_mahasiswa.kode_jenjang_pendidikan', 'tmst_program_studi.nama_program_studi', 'tbl_kliring_uas.nim']);
		$gedung->select('id_gedung, nama_gedung, luas, tahun_p, biaya_p, id_user, Keterangan'
					  )
					// ->from('tbl_kliring_uas')
					// ->join('tbl_kliring_uas_bk', 'tbl_kliring_uas_bk.id_kuas=tbl_kliring_uas.id_kuas')
					// ->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim', 'left')
					// ->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi')

					->from('tbl_aset_gedung');
					// ->join('tbl_kliring_uas_bk', 'tbl_kliring_uas_bk.id_kuas=tbl_kliring_uas.id_kuas')
					// ->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim')
					// ->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi', 'left')
					// ->where('tbl_kliring_uas.ta', $ta)
					// ->where('tmst_mahasiswa.tanggal_lulus IS NULL', null, false)
					// ->where('tmst_mahasiswa.tahun_masuk >=', '2015')
					// ->where('tmst_mahasiswa.tahun_masuk <=', date('Y'));
		$gedung
			->style(['class' => 'table table-bordered table-striped display'])

			->column('Nama Gedung', 'nama_gedung', function($data, $row){
				return $data;
			})
			->column('Luas', 'luas', function($data, $row){
				return $data;
			})
			->column('Tahun Pembelian', 'tahun_p', function($data, $row){
				return $data;
			})
			->column('Biaya Pembelian', 'biaya_p', function($data, $row){
				return $data;
			})

			

			->column('Action', 'id_gedung', function($data, $row) use ($mportal){

				$tombol2 = '';

			
				$tombol2 .= '<a class="btn btn-warning btn-sm" href="'.base_url().'aset/e_gedung/'.$data.'"><span class="glyphicon glyphicon-pencil"></span> Edit</a><a class="btn btn-danger btn-sm" href="'.base_url().'aset/d_gedung/'.$data.'"><span class="glyphicon glyphicon-trash"></span> Delete</a>';
                return $tombol2;
			});
			
		$gedung->set_options('searchDelay', '2000');
		$gedung->set_options('order', '[0, "asc"]');
		$gedung->set_options('oLanguage', '{"sProcessing" : spinner}');
		$gedung->set_options('lengthMenu', '[[10, 50, 100], [10, 50, 100]]');
		$gedung->set_options('columnDefs', "[
			{ 'orderable': true, 'targets': 0},
			{ 'orderable': true, 'targets': 1},
			{ 'orderable': true, 'targets': 2},
			{ 'orderable': true, 'targets': 3},
			{ 'orderable': false, 'targets': 4, 'className' : 'text-center', 'width' : 150 },
			

		]");
		$gedung->set_options('drawCallback', 'function(settings){
		}');

		$this->datatables->init('tabel_ajuan', $gedung);

		$data = null;

		$data_foot['nama_datatabel'] = 'tabel_ajuan';
		$data_foot['jquerynya_datatabel'] = $this->datatables;

		$this->load->view('ma/header');
		$this->load->view('ma/gedung',$data);
		$this->load->view('ma/footer', $data_foot);
	}
	public function i_gedung()
	{
		$this->load->view('ma/header');
		$this->load->view('ma/i_gedung');
		$this->load->view('ma/footer');
	}
	public function pi_gedung()
	{
		# code...
		$this->form_validation->set_rules('nama_gedung', 'Nama Gedung Harus diisi', 'required');
		$this->form_validation->set_rules('luas', 'Luas Harus diisi', 'required');
		$this->form_validation->set_rules('tahun_p', 'Tahun Pembelian Harus Diisi', 'required');
		$this->form_validation->set_rules('biaya_p', 'Biaya Pembelian Harus Diisi', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		// $id = $this->input->post('id_uks');
		if ($this->form_validation->run() != false) {
			$data = array(
			'nama_gedung'  	=> $this->input->post('nama_gedung'),
			'luas'  => $this->input->post('luas'),
			'tahun_p'  => $this->input->post('tahun_p'),
			'biaya_p'  => $this->input->post('biaya_p'),
			'id_user'     	=> $this->input->post('id_user'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_aset->input_data($data,'tbl_aset_gedung');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses input gedung gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, input gedung berhasil</b>");  
			 }

			 
			$this->load->view('ma/header');
			$this->load->view('ma/i_gedung');
			$this->load->view('ma/footer');
		}else{
		$this->load->view('ma/header');
		$this->load->view('ma/i_gedung');
		$this->load->view('ma/footer');
		}
	}
	public function e_gedung($id)
	{
		# code...
		$where = array(
			'id_gedung' => $id,			       
        );
		$data['catar'] = $this->m_aset->get_data($where,'tbl_aset_gedung')->result();
		// $data['catarz'] = $this->m_aset->get_data($where,'tbl_kliring_ujianktsk')->result();
		$this->load->view('ma/header');
		$this->load->view('ma/e_gedung',$data);
		$this->load->view('ma/footer');
	}
	public function pe_gedung()
	{
		# code...
		$this->form_validation->set_rules('nama_gedung', 'Nama Gedung Harus diisi', 'required');
		$this->form_validation->set_rules('luas', 'Luas Harus diisi', 'required');
		$this->form_validation->set_rules('tahun_p', 'Tahun Pembelian Harus Diisi', 'required');
		$this->form_validation->set_rules('biaya_p', 'Biaya Pembelian Harus Diisi', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		// $id = $this->input->post('id_uks');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_gedung'  	=> $this->input->post('id_gedung'),
			);
			$data = array(
			'nama_gedung'  	=> $this->input->post('nama_gedung'),
			'luas'  => $this->input->post('luas'),
			'tahun_p'  => $this->input->post('tahun_p'),
			'biaya_p'  => $this->input->post('biaya_p'),
			'id_user'     	=> $this->input->post('id_user'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_aset->update_data($where,$data,'tbl_aset_gedung');
			// $res = $this->m_aset->input_data($data,'tbl_aset_gedung');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses edit gedung gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, edit gedung berhasil</b>");  
			 }

			 
			$this->load->view('ma/header');
			$this->load->view('ma/gedung');
			$this->load->view('ma/footer');
		}else{
		$this->load->view('ma/header');
		$this->load->view('ma/gedung');
		$this->load->view('ma/footer');
		}
	}
	//ruang
	public function ruang()
	{
		ini_set('max_execution_time', -1); 
		$this->load->library('datatables');

		$mportal = $this->m_aset;

		// $ta = '20192';
		$ruang = $this->datatables->new2();
		// $ajuan->searchable(['tmst_mahasiswa.nama_mahasiswa', 'tmst_mahasiswa.kode_jenjang_pendidikan', 'tmst_program_studi.nama_program_studi', 'tbl_kliring_uas.nim']);
		$ruang->select('kd_ruang, nama_ruang, id_gedung'
					  )
					// ->from('tbl_kliring_uas')
					// ->join('tbl_kliring_uas_bk', 'tbl_kliring_uas_bk.id_kuas=tbl_kliring_uas.id_kuas')
					// ->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim', 'left')
					// ->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi')

					->from('tbl_aset_ruang');
					// ->join('tbl_kliring_uas_bk', 'tbl_kliring_uas_bk.id_kuas=tbl_kliring_uas.id_kuas')
					// ->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim')
					// ->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi', 'left')
					// ->where('tbl_kliring_uas.ta', $ta)
					// ->where('tmst_mahasiswa.tanggal_lulus IS NULL', null, false)
					// ->where('tmst_mahasiswa.tahun_masuk >=', '2015')
					// ->where('tmst_mahasiswa.tahun_masuk <=', date('Y'));
		$ruang
			->style(['class' => 'table table-bordered table-striped display'])

			->column('Kode Ruang', 'kd_ruang', function($data, $row){
				return $data;
			})
			->column('Nama Ruangan', 'nama_ruang', function($data, $row){
				return $data;
			})
		
			->column('Action', 'kd_ruang', function($data, $row) use ($mportal){

				//$tombol2 = '';
				$id_user = $this->session->userdata('id_user');
				if ($id_user == 2) {
					# code...
					$tombol2 .= '<a class="btn btn-primary btn-sm" href="'.base_url().'aset/pdf_rekap_ruang_amni/'.$data.'"><span class="fa fa-pdf"></span> PDF</a><a class="btn btn-primary btn-sm" href="'.base_url().'aset/inventaris_ruang/'.$data.'"><span class="glyphicon glyphicon-book"></span> List</a><a class="btn btn-warning btn-sm" href="'.base_url().'aset/e_ruang/'.$data.'"><span class="glyphicon glyphicon-pencil"></span> Edit</a><a class="btn btn-danger btn-sm" href="'.base_url().'aset/d_ruang/'.$data.'"><span class="glyphicon glyphicon-trash"></span> Delete</a>';
				}else{
				$tombol2 .= '<a class="btn btn-primary btn-sm" href="'.base_url().'aset/pdf_rekap_ruang/'.$data.'"><span class="fa fa-pdf"></span> PDF</a><a class="btn btn-primary btn-sm" href="'.base_url().'aset/inventaris_ruang/'.$data.'"><span class="glyphicon glyphicon-book"></span> List</a><a class="btn btn-warning btn-sm" href="'.base_url().'aset/e_ruang/'.$data.'"><span class="glyphicon glyphicon-pencil"></span> Edit</a><a class="btn btn-danger btn-sm" href="'.base_url().'aset/d_ruang/'.$data.'"><span class="glyphicon glyphicon-trash"></span> Delete</a>';
				}
                return $tombol2;
			});
			
		$ruang->set_options('searchDelay', '2000');
		$ruang->set_options('order', '[0, "asc"]');
		$ruang->set_options('oLanguage', '{"sProcessing" : spinner}');
		$ruang->set_options('lengthMenu', '[[10, 50, 100], [10, 50, 100]]');
		$ruang->set_options('columnDefs', "[
			{ 'orderable': true, 'targets': 0},
			{ 'orderable': true, 'targets': 1},
			{ 'orderable': false, 'targets': 2, 'className' : 'text-center', 'width' : 150 },

		]");
		$ruang->set_options('drawCallback', 'function(settings){
		}');

		$this->datatables->init('tabel_ajuan', $ruang);

		$data = null;

		$data_foot['nama_datatabel'] = 'tabel_ajuan';
		$data_foot['jquerynya_datatabel'] = $this->datatables;

		$this->load->view('ma/header');
		$this->load->view('ma/ruang',$data);
		$this->load->view('ma/footer', $data_foot);
	}
	public function i_ruang()
	{
		$data['gedung'] = $this->m_aset->get_data_all('tbl_aset_gedung')->result();
		$this->load->view('ma/header');
		$this->load->view('ma/i_ruang',$data);
		$this->load->view('ma/footer');
	}
	 // Get users
   public function get_gedung(){

      // Search term
      $searchTerm = $this->input->post('getGedung');

      // Get users
      $response = $this->m_aset->getGedung($searchTerm);

      echo json_encode($response);
   }
   public function pi_ruang()
	{
		# code...
		$this->form_validation->set_rules('nama_ruang', 'Nama Ruang Harus diisi', 'required');
		$this->form_validation->set_rules('gedung', 'Gedung Harus dipilih', 'required');
		
		// $id = $this->input->post('id_uks');
		if ($this->form_validation->run() != false) {
			$data = array(
			'nama_ruang'  	=> $this->input->post('nama_ruang'),
			'id_gedung'  => $this->input->post('gedung'),
			
		   );
			$res = $this->m_aset->input_data($data,'tbl_aset_ruang');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses input ruang gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, input ruang berhasil</b>");  
			 }

			 
			$this->load->view('ma/header');
			$this->load->view('ma/i_ruang');
			$this->load->view('ma/footer');
		}else{
		$this->load->view('ma/header');
		$this->load->view('ma/i_ruang');
		$this->load->view('ma/footer');
		}
	}
	public function e_ruang($id)
	{
		# code...
		$where = array(
			'kd_ruang' => $id,			       
        );
		$data['catar'] = $this->m_aset->get_data($where,'tbl_aset_ruang')->result();
		$data['gedung'] = $this->m_aset->get_data_all('tbl_aset_gedung')->result();
		// $data['catarz'] = $this->m_aset->get_data($where,'tbl_kliring_ujianktsk')->result();
		$this->load->view('ma/header');
		$this->load->view('ma/e_ruang',$data);
		$this->load->view('ma/footer');
	}
	public function pe_ruang()
	{
		# code...
		$this->form_validation->set_rules('nama_ruang', 'Nama Ruang Harus diisi', 'required');
		$this->form_validation->set_rules('gedung', 'Gedung Harus dipilih', 'required');
		// $id = $this->input->post('id_uks');
		if ($this->form_validation->run() != false) {
			$where = array(
				'kd_ruang'  	=> $this->input->post('kd_ruang'),
			);
			$data = array(
			'nama_ruang'  	=> $this->input->post('nama_ruang'),
			'id_gedung'  => $this->input->post('gedung'),
		   );
			$res = $this->m_aset->update_data($where,$data,'tbl_aset_ruang');
			// $res = $this->m_aset->input_data($data,'tbl_aset_gedung');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses edit ruang gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, edit ruang berhasil</b>");  
			 }

			 
			$this->load->view('ma/header');
			$this->load->view('ma/ruang');
			$this->load->view('ma/footer');
		}else{
		$this->load->view('ma/header');
		$this->load->view('ma/ruang');
		$this->load->view('ma/footer');
		}
	}
	//barang
	public function barang()
	{
		ini_set('max_execution_time', -1); 
		$this->load->library('datatables');

		$mportal = $this->m_aset;

		// $ta = '20192';
		$barang = $this->datatables->new2();
		// $ajuan->searchable(['tmst_mahasiswa.nama_mahasiswa', 'tmst_mahasiswa.kode_jenjang_pendidikan', 'tmst_program_studi.nama_program_studi', 'tbl_kliring_uas.nim']);
		$barang->select('kd_barang, nama_barang, tipe'
					  )
					// ->from('tbl_kliring_uas')
					// ->join('tbl_kliring_uas_bk', 'tbl_kliring_uas_bk.id_kuas=tbl_kliring_uas.id_kuas')
					// ->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim', 'left')
					// ->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi')

					->from('tbl_aset_barang');
					// ->join('tbl_kliring_uas_bk', 'tbl_kliring_uas_bk.id_kuas=tbl_kliring_uas.id_kuas')
					// ->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim')
					// ->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi', 'left')
					// ->where('tbl_kliring_uas.ta', $ta)
					// ->where('tmst_mahasiswa.tanggal_lulus IS NULL', null, false)
					// ->where('tmst_mahasiswa.tahun_masuk >=', '2015')
					// ->where('tmst_mahasiswa.tahun_masuk <=', date('Y'));
		$barang
			->style(['class' => 'table table-bordered table-striped display'])

			->column('Nama Barang', 'nama_barang', function($data, $row){
				return $data;
			})
			->column('Tipe', 'tipe', function($data, $row){
				return $data;
			})
	
			->column('Action', 'kd_barang', function($data, $row) use ($mportal){

				$tombol2 = '';

			
				$tombol2 .= '<a class="btn btn-warning btn-sm" href="'.base_url().'aset/e_barang/'.$data.'"><span class="glyphicon glyphicon-pencil"></span> Edit</a><a class="btn btn-danger btn-sm" href="'.base_url().'aset/d_barang/'.$data.'"><span class="glyphicon glyphicon-trash"></span> Delete</a>';
                return $tombol2;
			});
			
		$barang->set_options('searchDelay', '2000');
		$barang->set_options('order', '[0, "asc"]');
		$barang->set_options('oLanguage', '{"sProcessing" : spinner}');
		$barang->set_options('lengthMenu', '[[10, 50, 100], [10, 50, 100]]');
		$barang->set_options('columnDefs', "[
			{ 'orderable': true, 'targets': 0},
			{ 'orderable': true, 'targets': 1},
			{ 'orderable': false, 'targets': 2, 'className' : 'text-center', 'width' : 150 },

		]");
		$barang->set_options('drawCallback', 'function(settings){
		}');

		$this->datatables->init('tabel_ajuan', $barang);

		$data = null;

		$data_foot['nama_datatabel'] = 'tabel_ajuan';
		$data_foot['jquerynya_datatabel'] = $this->datatables;

		$this->load->view('ma/header');
		$this->load->view('ma/barang',$data);
		$this->load->view('ma/footer', $data_foot);
	}
	public function i_barang()
	{
		$this->load->view('ma/header');
		$this->load->view('ma/i_barang');
		$this->load->view('ma/footer');
	}
   public function pi_barang()
	{
		# code...
		$this->form_validation->set_rules('nama_barang', 'Nama Barang Harus diisi', 'required');
		$this->form_validation->set_rules('tipe', 'Tipe Barang Harus dipilih', 'required');
		
		// $id = $this->input->post('id_uks');
		if ($this->form_validation->run() != false) {
			$data = array(
			'nama_barang'  	=> $this->input->post('nama_barang'),
			'tipe'  => $this->input->post('tipe'),
			
		   );
			$res = $this->m_aset->input_data($data,'tbl_aset_barang');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses input barang gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, input barang berhasil</b>");  
			 }

			 
			$this->load->view('ma/header');
			$this->load->view('ma/i_barang');
			$this->load->view('ma/footer');
		}else{
		$this->load->view('ma/header');
		$this->load->view('ma/i_barang');
		$this->load->view('ma/footer');
		}
	}
	public function e_barang($id)
	{
		# code...
		$where = array(
			'kd_ruang' => $id,			       
        );
		$data['catar'] = $this->m_aset->get_data($where,'tbl_aset_ruang')->result();
		$data['gedung'] = $this->m_aset->get_data_all('tbl_aset_gedung')->result();
		// $data['catarz'] = $this->m_aset->get_data($where,'tbl_kliring_ujianktsk')->result();
		$this->load->view('ma/header');
		$this->load->view('ma/e_ruang',$data);
		$this->load->view('ma/footer');
	}
	public function pe_barang()
	{
		# code...
		$this->form_validation->set_rules('nama_ruang', 'Nama Ruang Harus diisi', 'required');
		$this->form_validation->set_rules('gedung', 'Gedung Harus dipilih', 'required');
		// $id = $this->input->post('id_uks');
		if ($this->form_validation->run() != false) {
			$where = array(
				'kd_ruang'  	=> $this->input->post('kd_ruang'),
			);
			$data = array(
			'nama_ruang'  	=> $this->input->post('nama_ruang'),
			'id_gedung'  => $this->input->post('gedung'),
		   );
			$res = $this->m_aset->update_data($where,$data,'tbl_aset_ruang');
			// $res = $this->m_aset->input_data($data,'tbl_aset_gedung');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses edit ruang gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, edit ruang berhasil</b>");  
			 }

			 
			$this->load->view('ma/header');
			$this->load->view('ma/ruang');
			$this->load->view('ma/footer');
		}else{
		$this->load->view('ma/header');
		$this->load->view('ma/ruang');
		$this->load->view('ma/footer');
		}
	}
	//inventaris
	public function inventaris()
	{
		ini_set('max_execution_time', -1); 
		$this->load->library('datatables');

		$mportal = $this->m_aset;

		// $ta = '20192';
		$inven = $this->datatables->new2();
		// $ajuan->searchable(['tmst_mahasiswa.nama_mahasiswa', 'tmst_mahasiswa.kode_jenjang_pendidikan', 'tmst_program_studi.nama_program_studi', 'tbl_kliring_uas.nim']);
		$inven->select('tbl_aset_barang.nama_barang,
						tbl_aset_gedung.nama_gedung,
						tbl_aset_inventaris.kd_inventaris,
						tbl_aset_inventaris.merk,
						tbl_aset_inventaris.tahun_beli,
						tbl_aset_inventaris.harga_beli,
						tbl_aset_inventaris.status,
						tbl_aset_ruang.nama_ruang,
						tbl_aset_inventaris.keterangan'
					  )
					// ->from('tbl_kliring_uas')
					// ->join('tbl_kliring_uas_bk', 'tbl_kliring_uas_bk.id_kuas=tbl_kliring_uas.id_kuas')
					// ->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim', 'left')
					// ->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi')

					->from('tbl_aset_inventaris')
					->join('tbl_aset_gedung', 'tbl_aset_inventaris.id_gedung = tbl_aset_gedung.id_gedung', 'inner')
					->join('tbl_aset_ruang', 'tbl_aset_inventaris.kd_ruang = tbl_aset_ruang.kd_ruang', 'inner')
					->join('tbl_aset_barang', 'tbl_aset_inventaris.kd_barang = tbl_aset_barang.kd_barang', 'inner');
					// ->where('tbl_kliring_uas.ta', $ta)
					// ->where('tmst_mahasiswa.tanggal_lulus IS NULL', null, false)
					// ->where('tmst_mahasiswa.tahun_masuk >=', '2015')
					// ->where('tmst_mahasiswa.tahun_masuk <=', date('Y'));
		$inven
			->style(['class' => 'table table-bordered table-striped display'])

			->column('Gedung', 'nama_gedung', function($data, $row){
				return $data;
			})
			->column('Ruang', 'nama_ruang', function($data, $row){
				return $data;
			})
			->column('Barang', 'nama_barang', function($data, $row){
				return $data;
			})
			->column('Merk', 'merk', function($data, $row){
				return $data;
			})
			->column('Tahun Beli', 'tahun_beli', function($data, $row){
				return $data;
			})
			->column('Harga Beli', 'harga_beli', function($data, $row){
				return $data;
			})
			->column('Keterangan', 'keterangan', function($data, $row){
				return $data;
			})
			->column('Status', 'status', function($data, $row){
				return $data;
			})


			->column('Action', 'kd_inventaris', function($data, $row) use ($mportal){

				$tombol2 = '';

				$tombol2 .= '<a class="btn btn-warning btn-sm" href="'.base_url().'aset/e_inventaris/'.$data.'"><span class="glyphicon glyphicon-pencil"></span> Edit</a><a class="btn btn-danger btn-sm" href="'.base_url().'aset/d_inventaris/'.$data.'"><span class="glyphicon glyphicon-trash"></span> Delete</a>';
                return $tombol2;
			});
			
		$inven->set_options('searchDelay', '2000');
		$inven->set_options('order', '[0, "asc"]');
		$inven->set_options('oLanguage', '{"sProcessing" : spinner}');
		$inven->set_options('lengthMenu', '[[10, 50, 100], [10, 50, 100]]');
		$inven->set_options('columnDefs', "[
			{ 'orderable': true, 'targets': 0},
			{ 'orderable': true, 'targets': 1},
			{ 'orderable': true, 'targets': 2},
			{ 'orderable': true, 'targets': 3},
			{ 'orderable': true, 'targets': 4},
			{ 'orderable': true, 'targets': 5},
			{ 'orderable': true, 'targets': 6},
			{ 'orderable': true, 'targets': 7},
			{ 'orderable': false, 'targets': 8, 'className' : 'text-center', 'width' : 150 },

		]");
		$inven->set_options('drawCallback', 'function(settings){
		}');

		$this->datatables->init('tabel_ajuan', $inven);

		$data = null;

		$data_foot['nama_datatabel'] = 'tabel_ajuan';
		$data_foot['jquerynya_datatabel'] = $this->datatables;

		$this->load->view('ma/header');
		$this->load->view('ma/inven',$data);
		$this->load->view('ma/footer', $data_foot);
	}
	public function inventaris_ruang($id)
	{
		ini_set('max_execution_time', -1); 
		$this->load->library('datatables');

		$mportal = $this->m_aset;

		// $ta = '20192';
		$inven = $this->datatables->new2();
		// $ajuan->searchable(['tmst_mahasiswa.nama_mahasiswa', 'tmst_mahasiswa.kode_jenjang_pendidikan', 'tmst_program_studi.nama_program_studi', 'tbl_kliring_uas.nim']);
		$inven->select('tbl_aset_barang.nama_barang,
						tbl_aset_gedung.nama_gedung,
						tbl_aset_inventaris.kd_inventaris,
						tbl_aset_inventaris.merk,
						tbl_aset_inventaris.tahun_beli,
						tbl_aset_inventaris.harga_beli,
						tbl_aset_inventaris.status,
						tbl_aset_ruang.nama_ruang,
						tbl_aset_inventaris.keterangan'
					  )
					// ->from('tbl_kliring_uas')
					// ->join('tbl_kliring_uas_bk', 'tbl_kliring_uas_bk.id_kuas=tbl_kliring_uas.id_kuas')
					// ->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim', 'left')
					// ->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi')

					->from('tbl_aset_inventaris')
					->join('tbl_aset_gedung', 'tbl_aset_inventaris.id_gedung = tbl_aset_gedung.id_gedung', 'inner')
					->join('tbl_aset_ruang', 'tbl_aset_inventaris.kd_ruang = tbl_aset_ruang.kd_ruang', 'inner')
					->join('tbl_aset_barang', 'tbl_aset_inventaris.kd_barang = tbl_aset_barang.kd_barang', 'inner')
					->where('tbl_aset_inventaris.kd_ruang', $id);
					// ->where('tmst_mahasiswa.tanggal_lulus IS NULL', null, false)
					// ->where('tmst_mahasiswa.tahun_masuk >=', '2015')
					// ->where('tmst_mahasiswa.tahun_masuk <=', date('Y'));
		$inven
			->style(['class' => 'table table-bordered table-striped display'])

			->column('Gedung', 'nama_gedung', function($data, $row){
				return $data;
			})
			->column('Ruang', 'nama_ruang', function($data, $row){
				return $data;
			})
			->column('Barang', 'nama_barang', function($data, $row){
				return $data;
			})
			->column('Merk', 'merk', function($data, $row){
				return $data;
			})
			->column('Tahun Beli', 'tahun_beli', function($data, $row){
				return $data;
			})
			->column('Harga Beli', 'harga_beli', function($data, $row){
				return $data;
			})
			->column('Keterangan', 'keterangan', function($data, $row){
				return $data;
			})
			->column('Status', 'status', function($data, $row){
				return $data;
			})


			->column('Action', 'kd_inventaris', function($data, $row) use ($mportal){

				$tombol2 = '';

				$tombol2 .= '<a class="btn btn-warning btn-sm" href="'.base_url().'aset/e_inventaris/'.$data.'"><span class="glyphicon glyphicon-pencil"></span> Edit</a><a class="btn btn-danger btn-sm" href="'.base_url().'aset/delete_inventaris/'.$data.'"><span class="glyphicon glyphicon-trash"></span> Delete</a>';
                return $tombol2;
			});
			
		$inven->set_options('searchDelay', '2000');
		$inven->set_options('order', '[0, "asc"]');
		$inven->set_options('oLanguage', '{"sProcessing" : spinner}');
		$inven->set_options('lengthMenu', '[[10, 50, 100], [10, 50, 100]]');
		$inven->set_options('columnDefs', "[
			{ 'orderable': true, 'targets': 0},
			{ 'orderable': true, 'targets': 1},
			{ 'orderable': true, 'targets': 2},
			{ 'orderable': true, 'targets': 3},
			{ 'orderable': true, 'targets': 4},
			{ 'orderable': true, 'targets': 5},
			{ 'orderable': true, 'targets': 6},
			{ 'orderable': true, 'targets': 7},
			{ 'orderable': false, 'targets': 8, 'className' : 'text-center', 'width' : 150 },

		]");
		$inven->set_options('drawCallback', 'function(settings){
		}');

		$this->datatables->init('tabel_ajuan', $inven);

		$data = null;

		$data_foot['nama_datatabel'] = 'tabel_ajuan';
		$data_foot['jquerynya_datatabel'] = $this->datatables;

		$where = array(
			'tbl_aset_inventaris.kd_ruang' => $id,
		);
		$data['summary'] = $this->m_aset->get_data_join_where_rekap_summary($where)->result();

		$this->load->view('ma/header');
		$this->load->view('ma/inven_ruang',$data);
		$this->load->view('ma/footer', $data_foot);
	}
	public function i_inventaris()
	{
		$data['gedung'] = $this->m_aset->get_data_all('tbl_aset_gedung')->result();
		$data['ruang'] = $this->m_aset->get_data_all('tbl_aset_ruang')->result();
		$data['barang'] = $this->m_aset->get_data_all('tbl_aset_barang')->result();
		$this->load->view('ma/header');
		$this->load->view('ma/i_inven',$data);
		$this->load->view('ma/footer');
	}
   public function pi_inventaris()
	{
		# code...

		$this->form_validation->set_rules('gedung', 'Gedung Harus dipilih', 'required');
		$this->form_validation->set_rules('ruang', 'Ruang Harus dipilih', 'required');
		$this->form_validation->set_rules('barang', 'Barang Harus dipilih', 'required');
		$this->form_validation->set_rules('merk', 'Merk Harus diisi', 'required');
		$this->form_validation->set_rules('tahun_beli', 'Tahun Beli Harus diisi', 'required');
		$this->form_validation->set_rules('harga_beli', 'Harga Beli Harus diisi', 'required');
		$this->form_validation->set_rules('qty', 'QTY Harus diisi', 'required');
		$this->form_validation->set_rules('status', 'Status Barang Harus dipilih', 'required');

				//cek barang ke-
		$where = array(
			'kd_ruang' => $this->input->post('ruang'),
			'kd_barang' => $this->input->post('barang'),			       
        );
		$cekbrgke = $this->m_aset->brg_ke($where)->result();
		foreach ($cekbrgke as $ck) {
			$getbrgke = $ck->brg_ke;
			$fixbrgke = $getbrgke+1;
		}
		//pengkodean qr code
		$id_user = $this->input->post('id_user');
		$id_gedung = $this->input->post('gedung');
		$kd_ruang = $this->input->post('ruang');
		$kd_barang = $this->input->post('barang');
		$qrcodeny = $id_user.$id_gedung.$kd_ruang.$kd_barang.$fixbrgke;

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/aset/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/aset/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/aset/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $image_name=$qrcodeny.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = $qrcodeny; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		
		// $id = $this->input->post('id_uks');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_user'  	=> $this->input->post('id_user'),
			'kd_ruang'  => $this->input->post('ruang'),
			'kd_barang'  => $this->input->post('barang'),
			'id_gedung'  => $this->input->post('gedung'),
			'merk'  => $this->input->post('merk'),
			'tahun_beli'  => $this->input->post('tahun_beli'),
			'harga_beli'  => $this->input->post('harga_beli'),
			'qty'  => $this->input->post('qty'),
			'status'  => $this->input->post('status'),
			'brg_ke'  => $fixbrgke,
			'keterangan'  => $this->input->post('keterangan'),
			'qrcode'  => $image_name,
			'scan'  => $qrcodeny,
			
		   );
			$res = $this->m_aset->input_data($data,'tbl_aset_inventaris');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses input inventaris gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, input inventaris berhasil</b>");  
			 }

		$data['gedung'] = $this->m_aset->get_data_all('tbl_aset_gedung')->result();
		$data['ruang'] = $this->m_aset->get_data_all('tbl_aset_ruang')->result();
		$data['barang'] = $this->m_aset->get_data_all('tbl_aset_barang')->result();
			$this->load->view('ma/header');
			$this->load->view('ma/i_inven',$data);
			$this->load->view('ma/footer');
		}else{
		$data['gedung'] = $this->m_aset->get_data_all('tbl_aset_gedung')->result();
		$data['ruang'] = $this->m_aset->get_data_all('tbl_aset_ruang')->result();
		$data['barang'] = $this->m_aset->get_data_all('tbl_aset_barang')->result();
		$this->load->view('ma/header');
		$this->load->view('ma/i_inven',$data);
		$this->load->view('ma/footer');
		}
	}
	public function e_inventaris($id)
	{
		# code...
		$where = array(
			'tbl_aset_inventaris.kd_inventaris' => $id,			       
        );
        $data['rekap'] = $this->m_aset->get_data_join_where_rekap($where)->result();
		// $data['catar'] = $this->m_aset->get_data($where,'tbl_aset_inventaris')->result();
		// $data['gedung'] = $this->m_aset->get_data_all('tbl_aset_gedung')->result();
		// $data['catarz'] = $this->m_aset->get_data($where,'tbl_kliring_ujianktsk')->result();
		$this->load->view('ma/header');
		$this->load->view('ma/e_inven',$data);
		$this->load->view('ma/footer');
	}
	public function pe_inventaris()
	{
		# code...
		$this->form_validation->set_rules('merk', 'merk Harus diisi', 'required');
		$this->form_validation->set_rules('tahun_beli', 'Tahun Beli Harus dipilih', 'required');
		$this->form_validation->set_rules('harga_beli', 'Harga Beli Harus dipilih', 'required');
		$this->form_validation->set_rules('qty', 'QTY Harus dipilih', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan Harus dipilih', 'required');
		
		// $id = $this->input->post('id_uks');
		if ($this->form_validation->run() != false) {
			$where = array(
				'kd_inventaris'  	=> $this->input->post('kd_inventaris'),
			);
			$id = $this->input->post('kd_inventaris');
			$data = array(
			'merk'  	=> $this->input->post('merk'),
			'tahun_beli'  => $this->input->post('tahun_beli'),
			'harga_beli'  => $this->input->post('harga_beli'),
			'status'  => $this->input->post('status'),
			'qty'  => $this->input->post('qty'),
			'keterangan'  => $this->input->post('keterangan'),
		   );
			$res = $this->m_aset->update_data($where,$data,'tbl_aset_inventaris');
			// $res = $this->m_aset->input_data($data,'tbl_aset_gedung');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses edit ruang gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, edit ruang berhasil</b>");  
			 }

			 /// aftr

			 $where = array(
			'tbl_aset_inventaris.kd_inventaris' => $id,			       
        );
        $data['rekap'] = $this->m_aset->get_data_join_where_rekap($where)->result();

			$this->load->view('ma/header');
			$this->load->view('ma/e_inven',$data);
			$this->load->view('ma/footer');
		}else{
		$this->load->view('ma/header');
		$this->load->view('ma/e_inven',$data);
		$this->load->view('ma/footer');
		}
	}
public function delete_inventaris($id) 
    {
        $where = array(
        'kd_inventaris' => $id    
          );
      
        $this->db->select("qrcode");
        $this->db->where($where);
        $query = $this->db->get('tbl_aset_inventaris');
        $row2 = $query->row();

        $kd_ruang = $row2->kd_ruang;        

        // menyimpan lokasi gambar dalam variable E:\xampp\htdocs\portal\assets\aset\qrcode
        // $dir = "../assets/aset/qrcode/".$row2->qrcode;

        // Jika data ditemukan, maka hapus foto dan record nya
        if ($row2) 
        {
          // Hapus foto
          // unlink($dir);

          $this->m_aset->delete_data($where,'tbl_aset_inventaris');
          redirect(base_url().'aset/inventaris/'.$kd_ruang.'');
        } 
          // Jika data tidak ada
          else 
          {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('aset/inventaris'.$kd_ruang.''));
          }
  
    }
	public function cetak_qr_ruang()
	{
		$data['ruang'] = $this->m_aset->get_data_all('tbl_aset_ruang')->result();
		$this->load->view('ma/header');
		$this->load->view('ma/c_ruang',$data);
		$this->load->view('ma/footer');
	}
	function pdf_qr_ruang()
	{
		# code...
		// $id_user = $this->input->post('id_user');
		$ruang = $this->input->post('ruang');
		$where = array(
			'tbl_aset_inventaris.kd_ruang' => $ruang,

		);
		$data['qrcode'] = $this->m_aset->get_data_join_where_qrcode($where)->result();
		foreach ($data['qrcode'] as $row) {
			# code...
			$nama_user = $row->nama;
			$nama_ruang = $row->nama_ruang;
	        
		}
		$this->load->view('ma/pdf_ruang',$data);

		//pdf
		$pdfFilePath="cetak-".$nama_ruang."-".$nama_user.".pdf";
		$html=$this->load->view('ma/pdf_ruang',$data, TRUE);
		$pdf = $this->m_pdf->load();
 
        $pdf->AddPage('P');
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "D");
        exit();
	}
	function pdf_rekap_ruang($ruang)
	{
		# code...
		// $id_user = $this->input->post('id_user');
		// $ruang = $this->input->post('ruang');
		$where = array(
			'tbl_aset_inventaris.kd_ruang' => $ruang,
		);
		$data['rekap'] = $this->m_aset->get_data_join_where_rekap($where)->result();
		$data['summary'] = $this->m_aset->get_data_join_where_rekap_summary($where)->result();

		foreach ($data['rekap'] as $row) {
			# code...
			$nama_user = $row->nama;
			$nama_ruang = $row->nama_ruang;
			$nama_gedung = $row->nama_gedung;

			$data['nama_ruang'] = $nama_ruang;
			$data['nama_gedung'] = $nama_gedung;
			$data['nama_user'] = $nama_user;
	        
		}
		$this->load->view('ma/pdf_rekap_ruang',$data);

		//pdf
		$pdfFilePath="cetak-".$nama_ruang."-".$nama_user.".pdf";
		$html=$this->load->view('ma/pdf_rekap_ruang',$data, TRUE);
		$pdf = $this->m_pdf->load();
 
        $pdf->AddPage('P');
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "D");
        exit();
	}
	function pdf_rekap_ruang_amni($ruang)
	{
		# code...
		// $id_user = $this->input->post('id_user');
		// $ruang = $this->input->post('ruang');
		$where = array(
			'tbl_aset_inventaris.kd_ruang' => $ruang,
		);
		$data['rekap'] = $this->m_aset->get_data_join_where_rekap($where)->result();
		$data['summary'] = $this->m_aset->get_data_join_where_rekap_summary($where)->result();

		foreach ($data['rekap'] as $row) {
			# code...
			$nama_user = $row->nama;
			$nama_ruang = $row->nama_ruang;
			$nama_gedung = $row->nama_gedung;

			$data['nama_ruang'] = $nama_ruang;
			$data['nama_gedung'] = $nama_gedung;
			$data['nama_user'] = $nama_user;
	        
		}
		$this->load->view('ma/pdf_rekap_ruang_amni',$data);

		//pdf
		$pdfFilePath="cetak-".$nama_ruang."-".$nama_user.".pdf";
		$html=$this->load->view('ma/pdf_rekap_ruang_amni',$data, TRUE);
		$pdf = $this->m_pdf->load();
 
        $pdf->AddPage('P');
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "D");
        exit();
	}
	public function detail_inven($id)
	{
		# code...
		$like = array(
			'tbl_aset_inventaris.scan' => $id,
		);
		$data['detail'] = $this->m_aset->get_data_join_where_detail($like)->result();

	    $this->load->view('ma/header');
		$this->load->view('ma/d_inven',$data);
		$this->load->view('ma/footer');
	}
    public function scan()
	{

		$this->load->view('ma/header');
		$this->load->view('ma/danang');
		$this->load->view('ma/footer');
		
	}

}

/* End of file aset.php */
/* Location: ./application/controllers/aset.php */