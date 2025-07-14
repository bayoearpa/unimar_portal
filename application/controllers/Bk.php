<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'administrasi?pesan=belumlogin');
		}elseif ($this->session->userdata('level') != "5") {
			# code...
			redirect(base_url().'administrasi?pesan=salahkamar');
		}
		$this->load->model('m_portal');
	}

	public function index()
	{
		$this->load->view('bk/header');
		$this->load->view('bk/index');
		$this->load->view('bk/footer');
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'administrasi?pesan=logout');
	}
	function jenjang($id){
        if ($id == "1") {
            # code...
            return $jurusan = "D3";
        }else{
            # code...
            return $jurusan = "S1";
        // }elseif ($id == "3") {
        //     # code...
        //     return $jurusan = "Nautika";
        // }else{
        //     return $jurusan = "Transportasi";
        }
	}
	public function getTa(){
	    $whereta = array(
			'id_ta' => '1'		
		);
		$ta = $this->m_portal->get_data($whereta,'tbl_ta')->result();
			foreach ($ta as $t) {
			# code...
			//$data['nama'] = $n->Nama_mahasiswa ;
			return $t->ta;
		}
	}
	public function getNama($nim)
	{
		# code...
		//get nama
		$where = array(
			'NIM' => $nim,			       
        );
		$getNim = $this->m_portal->get_data($where,'tmst_mahasiswa')->result();
		foreach ($getNim as $n) {
			# code...
			//$data['nama'] = $n->Nama_mahasiswa ;
			return $n->Nama_mahasiswa;
		}
	}
	public function getProdi($prodi)
	{
		# code...
		//get nama
		$where = array(
			'Kode_program_studi' => $prodi,			       
        );
		$getP = $this->m_portal->get_data($where,'tmst_program_studi')->result();
		foreach ($getP as $p) {
			# code...
			//$data['nama'] = $n->Nama_mahasiswa ;
			return $p->Nama_program_studi;
		}
	}
	/////////////////////////////////// notifikasi ////////////////////////////////////////////////////////
	public function get_keuangan_notif() {
        $result = $this->m_portal->get_keuangan_notif();
        echo json_encode($result);
    }

    public function set_notif_read($id) {
        $this->m_portal->update_status($id);
        redirect($this->input->get('redirect')); // redirect ke halaman tujuan
    }
	/////////////////////////////////// ./notifikasi ////////////////////////////////////////////////////////
	public function ajuan()
	{
		$data['catar'] = $this->m_portal->get_data_all('tbl_kliring_ujianktsk')->result();
		if ($data['catar'] == null) {
			# code...
		}else{
		$data['bk'] = $this;  
		foreach ($data['catar'] as $row)
		{
        $nim = $row->nim;
        $jenjang = $row->jenjang;
        $prodi = $row->prodi;
		}
		//get nama
		$data['nama'] = $this->getNama($nim);
		//get prodi
		$data['prodi'] = $this->getProdi($prodi);
		//get jenjang
		$data['jenjang'] = $this->jenjang($jenjang);
		}

		$this->load->view('bk/header');
		$this->load->view('bk/ajuan',$data);
		$this->load->view('bk/footer');
	}

	public function cek_mhs()
	{
		// tmst_mahasiswa.NIM as nim_mhs,
		// 				tmst_mahasiswa.Nama_mahasiswa,
		// 				tmst_mahasiswa.Kode_jenjang_pendidikan,
		// 				tmst_program_studi.Nama_program_studi,
		// 				tbl_kliring_uas.id_kuas,
		// 				tbl_kliring_uas.nim,
		// 				tbl_kliring_uas.smt_now,
		// 				tbl_kliring_uas.ta,
		// 				tbl_kliring_uas.kelas,
		// 				tbl_kliring_uas.tgl_pengajauan,
		// 				tbl_kliring_uas_bk.id_uas_bk,
		// 				tbl_kliring_uas_bk.id_kuas as id_kuas_bk,
		// 				tbl_kliring_uas_bk.keterangan,
		// 				tbl_kliring_uas_bk.hasil,
		// 				tbl_kliring_uas_bk.tgl_kliring
		$result = $this->db->select('
						tmst_mahasiswa.Nama_mahasiswa,
						tmst_mahasiswa.Kode_jenjang_pendidikan,
						tmst_program_studi.Nama_program_studi,
						tbl_kliring_uas.id_kuas,
						tbl_kliring_uas.nim,
						tbl_kliring_uas_bk.id_uas_bk,
						tbl_kliring_uas_bk.hasil,
						')
							->from('tbl_kliring_uas')
							->join('tbl_kliring_uas_bk', 'tbl_kliring_uas_bk.id_kuas=tbl_kliring_uas.id_kuas')
							->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim')
							->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi', 'left')
							->where('tbl_kliring_uas.ta', '20201')
							->limit(10)
							->get()
							->result();
		echo $this->db->last_query();
		echo '<pre>'.var_export($result, true).'</pre>';
		
	}

	public function get_mhs($nim)
	{
		$result = $this->db->select('tmst_mahasiswa.NIM as nim_mhs,
						tmst_mahasiswa.Nama_mahasiswa,
						tmst_mahasiswa.Kode_jenjang_pendidikan,
						tmst_program_studi.Nama_program_studi,')
							->from('tmst_mahasiswa')
							->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi')
							->where('tmst_mahasiswa.NIM', $nim)
							->limit(1)
							->get()
							->row();
		return $result;
	}
	public function ajuan_kuas2022()
	{
		# code...
		$this->load->view('bk/header');
		$this->load->view('bk/ajuan_kuas_2022');
		$this->load->view('bk/footer');

	}
	public function ajuan_kuas2022p()
	{
		# code...
		$ta = $this->getTa();
		$prodi = $this->input->post('prodi');
		$tahun_masuk = $this->input->post('tahun_masuk');
		$kelas = $this->input->post('kelas');

		if ($kelas==null) {
			# code...
			$where = array(
			'tbl_kliring_uas.ta' => $ta,
			'tmst_mahasiswa.Kode_program_studi' => $prodi,
			'tmst_mahasiswa.Tahun_masuk' => $tahun_masuk,	
			);
			$data['catar'] = $this->m_portal->get_data_join_uas_where2022($where)->result();
		}else{
			$where = array(
			'tbl_kliring_uas.ta' => $ta,
			'tmst_mahasiswa.Kode_program_studi' => $prodi,
			'tmst_mahasiswa.Tahun_masuk' => $tahun_masuk,
			'tbl_kliring_uas.kelas' => $kelas,		
			);
			$data['catar'] = $this->m_portal->get_data_join_uas_where2022($where)->result();
		}
		
		$this->load->view('bk/header');
		$this->load->view('bk/ajuan_kuas_2022');
		$this->load->view('bk/ajuan_kuas_2022p',$data);
		$this->load->view('bk/footer');
	}
	public function ajuan_kuas()
	{
		ini_set('max_execution_time', -1); 
		$this->load->library('datatables');

		$mportal = $this->m_portal;

		$ta = '20221';
		$ajuan = $this->datatables->new2();
		// $ajuan->searchable(['tmst_mahasiswa.nama_mahasiswa', 'tmst_mahasiswa.kode_jenjang_pendidikan', 'tmst_program_studi.nama_program_studi', 'tbl_kliring_uas.nim']);
		$ajuan->select('tmst_mahasiswa.nama_mahasiswa,
						tmst_mahasiswa.kode_jenjang_pendidikan,
						tmst_program_studi.nama_program_studi,
						tbl_kliring_uas.id_kuas,
						tbl_kliring_uas.nim,
						tbl_kliring_uas.ta,
						tbl_kliring_uas_bk.id_uas_bk,
						tbl_kliring_uas_bk.hasil,
						tbl_kliring_uas.jenis_uas'
					  )
					// ->from('tbl_kliring_uas')
					// ->join('tbl_kliring_uas_mahatar', 'tbl_kliring_uas_mahatar.id_kuas=tbl_kliring_uas.id_kuas')
					// ->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim', 'left')
					// ->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi')

					->from('tbl_kliring_uas')
					->join('tbl_kliring_uas_bk', 'tbl_kliring_uas_bk.id_kuas=tbl_kliring_uas.id_kuas','left')
					->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim')
					->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi', 'left')
					->where('tbl_kliring_uas.ta', $ta)
					// ->where('tmst_mahasiswa.tanggal_lulus IS NULL', null, false)
					->where('tmst_mahasiswa.tahun_masuk >=', '2019')
					->where('tmst_mahasiswa.tahun_masuk <=', '2021');
		$ajuan
			->style(['class' => 'table table-bordered table-striped display'])
			->column('NIM', 'nim', function($data, $row){
				return $data;
			})
			->column('Nama', 'nama_mahasiswa', function($data, $row){
				return $data;
			})
			->column('Prodi', 'nama_program_studi', function($data, $row){
				return $data;
			})
			->column('Tahun Ajaran', 'ta', function($data, $row){
				return $data;
			})
			->column('Jenis UAS', 'jenis_uas', function($data, $row){
				return $data;
			})
			->column('Jenjang', 'kode_jenjang_pendidikan', function($data, $row){
				if ($data == "E") {
                        # code...
                        $jurusan = "D3";
                    }else{
                        # code...
                        $jurusan = "S1";
                    }
                   return $jurusan;
			})
			->column('BK', 'hasil', function($data, $row){

				switch ($row['hasil']) {
					case '1':
						$icon = 'check';
						$label = 'success';
						break;
					case '2':
						$icon = 'close';
						$label = 'danger';
						break;
					default:
						$icon = 'gear';
						$label = 'warning';
						break;
				}

				$tombol = '<a class="btn btn-'.$label.' btn-sm" href="#"><i class="fa fa-'.$icon.'"></i></a>';
				return $tombol;
			})
			->column('Hasil', 'id_kuas', function($data, $row) use ($mportal){

				$tombol2 = '';

				$tombol2 .= '<a class="btn btn-warning btn-sm" href="'.base_url().'bk/kliring_uas/'.$data.'"><span class="glyphicon glyphicon-pencil"></span> Kliring</a>';

					// Bay bay, variabel ngisor iki podo njipuk seko hasil?
					// Dibalas yaaa...
					// wkwkkw jadi tombol edit muncul nek tbl tbl_kliring_uas_bk wes ono isi ne nang
					// baiq

                $m = $mportal->get_data(['id_kuas' => $data],'tbl_kliring_uas_bk')->row();

                if ($m > "0"){
                $tombol2 .= '<a class="btn btn-warning btn-sm" href="'.base_url().'bk/ekliring_uas/'.$data.'"><span class="glyphicon glyphicon-pencil"></span> Edit</a>';
                }

                return $tombol2;
			});
			
		$ajuan->set_options('searchDelay', '2000');
		$ajuan->set_options('order', '[0, "asc"]');
		$ajuan->set_options('oLanguage', '{"sProcessing" : spinner}');
		$ajuan->set_options('lengthMenu', '[[10, 50, 100], [10, 50, 100]]');
		$ajuan->set_options('columnDefs', "[
			{ 'orderable': true, 'targets': 0},
			{ 'orderable': true, 'targets': 1},
			{ 'orderable': true, 'targets': 2},
			{ 'orderable': true, 'targets': 3},
			{ 'orderable': false, 'targets': 4, 'className' : 'text-center', 'width' : 150 },
			{ 'orderable': false, 'targets': 5, 'className' : 'text-center', 'width' : 150 },

		]");
		$ajuan->set_options('drawCallback', 'function(settings){
		}');

		$this->datatables->init('tabel_ajuan', $ajuan);

		$data = null;

		$data_foot['nama_datatabel'] = 'tabel_ajuan';
		$data_foot['jquerynya_datatabel'] = $this->datatables;

		$this->load->view('bk/header');
		$this->load->view('bk/ajuan_kuas_danang',$data);
		$this->load->view('bk/footer', $data_foot);
	}

	public function ajuan_kuas_old()
	{
		// $data['catar'] = $this->m_portal->get_data_all('tbl_kliring_uas')->result();
		///get TA(tahun ajaran)
		ini_set('max_execution_time', 0); 
		ini_set('memory_limit','2048M');
		$where = array(
			'id_ta' => '1'		
		);
		$ta = $this->m_portal->get_data($where,'tbl_ta')->result();
		foreach ($ta as $row) {
			$getTa = $row->ta;
		}
		$where2 = array(
			'ta' => $getTa		
		);
		///////// akhir get TA(tahun ajaran)
		$data['catar'] = $this->m_portal->get_data_join_uas_where($where2)->result();
		if ($data['catar'] == null) {
			# code...
		}else{ 
		$data['bk'] = $this; 
		foreach ($data['catar'] as $row)
		{
        $nim = $row->nim;
        // $jenjang = $row->jenjang;
        $prodi = $row->Kode_program_studi;
		}
		//get nama
		$data['nama'] = $this->getNama($nim);
		//get prodi
		$data['prodi'] = $this->getProdi($prodi);
		//get jenjang
		// $data['jenjang'] = $this->jenjang($jenjang);
		}

		$this->load->view('bk/header');
		$this->load->view('bk/ajuan_kuas',$data);
		$this->load->view('bk/footer');
	}
	public function kliring($id)
	{
		# code...
		$where = array(
			'id_uks' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
		foreach ($data['catar'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('bk/header');
		$this->load->view('bk/kliring',$data);
		$this->load->view('bk/footer');
	}
	public function kliring_uas($id)
	{
		# code...
		$where = array(
			'id_kuas' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
		foreach ($data['catar'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('bk/header');
		$this->load->view('bk/kliring_uas',$data);
		$this->load->view('bk/footer');
	}
	public function ekliring($id)
	{
		# code...
		$where = array(
			'id_uks' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_bk')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('bk/header');
		$this->load->view('bk/ekliring',$data);
		$this->load->view('bk/footer');
	}
	public function ekliring_uas($id)
	{
		# code...
		$where = array(
			'id_kuas' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_uas_bk')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('bk/header');
		$this->load->view('bk/ekliring_uas',$data);
		$this->load->view('bk/footer');
	}
	public function kliringp()
	{
		# code...
		$this->form_validation->set_rules('spp_a', 'Harus diisi', 'required');
		$this->form_validation->set_rules('spp_b', 'Harus diisi', 'required');
		$this->form_validation->set_rules('spp', 'spp', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_uks');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_uks'  	=> $this->input->post('id_uks'),
			'spp_a'  => $this->input->post('spp_a'),
			'spp_b'  => $this->input->post('spp_b'),
			'spp'  => $this->input->post('spp'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_ujianktsk_bk');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses kliring anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Kliring berhasil diproses</b>");  
			 }

			 //after input
			$where = array(
			'id_uks' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('bk/header');
			$this->load->view('bk/kliring',$datax);
			$this->load->view('bk/footer');
		}else{
		$this->load->view('bk/header');
		$this->load->view('bk/kliring');
		$this->load->view('bk/footer');
		}
	}
	public function kliringuasp()
	{
		# code...
		// $this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_kuas');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_kuas'  	=> $this->input->post('id_kuas'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_uas_bk');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses kliring anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Kliring berhasil diproses</b>");  
			 }

			 //after input
			$where = array(
			'id_kuas' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('bk/header');
			$this->load->view('bk/kliring_uas',$datax);
			$this->load->view('bk/footer');
		}else{
			$where = array(
			'id_kuas' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
		$this->load->view('bk/header');
		$this->load->view('bk/kliring_uas', $datax);
		$this->load->view('bk/footer');
		}
	}
	public function ekliringp()
	{
		# code...
		$this->form_validation->set_rules('spp_a', 'Harus diisi', 'required');
		$this->form_validation->set_rules('spp_b', 'Harus diisi', 'required');
		$this->form_validation->set_rules('spp', 'spp', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_uks');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_uks_bk'  	=> $this->input->post('id_uks_bk'),
			);
			$data = array(
			'id_uks'  	=> $this->input->post('id_uks'),
			'spp_a'  => $this->input->post('spp_a'),
			'spp_b'  => $this->input->post('spp_b'),
			'spp'  => $this->input->post('spp'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_ujianktsk_bk');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Edit Proses kliring anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Edit Kliring berhasil diproses</b>");  
			 }
			 // $id = $this->input->post('id_uks');
			 //after input
			$where = array(
			'id_uks' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_bk')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('bk/header');
			$this->load->view('bk/ekliring',$datax);
			$this->load->view('bk/footer');
		}else{
			$where = array(
			'id_uks' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_bk')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
		$this->load->view('bk/header');
		$this->load->view('bk/ekliring');
		$this->load->view('bk/footer');
		}
	}
	public function ekliringuasp()
	{
		# code...
		// $this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_kuas');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_uas_bk'  	=> $this->input->post('id_uas_bk'),
			);
			$data = array(
			'id_kuas'  	=> $this->input->post('id_kuas'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_uas_bk');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Edit Proses kliring anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Edit Kliring berhasil diproses</b>");  
			 }

			 //after input
			$where = array(
			'id_kuas' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_uas_bk')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('bk/header');
			$this->load->view('bk/ekliring_uas',$datax);
			$this->load->view('bk/footer');
		}else{
			$where = array(
			'id_kuas' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_uas_bk')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
		$this->load->view('bk/header');
		$this->load->view('bk/ekliring_uas');
		$this->load->view('bk/footer');
		}
	}
	public function cekstatus_fpuas($id_kuas,$table)
	{
	   $ta = $this->getTa();
		# code...
	  $where = array(
	  'id_kuas' => $id_kuas,
	  );
	  $where2 = array(
	  'id_kuas' => $id_kuas, 
	  'hasil' => "1",
	  );
	   $where3 = array(
	  'id_kuas' => $id_kuas, 
	  'hasil' => "2",
	  );
		$m=$this->m_portal->get_data($where, $table)->row();
		$n=$this->m_portal->get_data($where2, $table)->row();
		$o=$this->m_portal->get_data($where3, $table)->row();

		if ($m > "0" && $n > "0"){
        return $hasil = "<a class='btn btn-success btn-sm' href='#''><i class='fa fa-check'></i></a>";
        }elseif ( $m > "0" && $o > "0" ){
        return $hasil = "<a class='btn btn-danger btn-sm' href='#''><i class='fa fa-close'></i></a>";
        }else{
        return $hasil = "<a class='btn btn-warning btn-sm' href='#''><i class='fa fa-gear'></i></a>";
        } 
	}
	public function get_keterangan($id_kuas, $table)
	{
		# code...
		$ta = $this->getTa();
		$where = array(
			'id_kuas' => $id_kuas
        );
		$getP = $this->m_portal->get_data($where,$table)->result();
		foreach ($getP as $p) {
			# code...
			//$data['nama'] = $n->Nama_mahasiswa ;
			return $p->keterangan;
		}
	}
	public function get_statusakhir($id_kuas)
	{
		# code...
		$ta = $this->getTa();
		$where = array(
			'id_kuas' => $id_kuas,
			'hasil' => '1',
        );
        $get_m = $this->m_portal->get_data($where, 'tbl_kliring_uas_mahatar')->row();
        $get_b = $this->m_portal->get_data($where, 'tbl_kliring_uas_baak')->row();
        $get_k = $this->m_portal->get_data($where, 'tbl_kliring_uas_bk')->row();
        $get_w = $this->m_portal->get_data($where, 'tbl_kliring_uas_prodi')->row();

        if ($get_m > "0" &&  $get_b > "0" && $get_m > "0" && $get_m > "0") {
        	# code...
        	return $wew = "1";
        }else{
        	return $wew = "0";
        }

	}
	public function search_uas_nim()
	{
		# code...
		$this->load->view('bk/header');
		$this->load->view('bk/search_uas_nim');
		$this->load->view('bk/footer');
	}
	public function search_uas_nim_cari()
	{
		# code..
		$whereta = array(
			'id_ta' => '1'		
		);
		$getta = $this->m_portal->get_data($whereta,'tbl_ta')->result();
		foreach ($getta as $row) {
			$ta = $row->ta;
		}
		$nim = $this->input->post('nim');
		$wherenim = array(
			'nim' => $nim,       
	        );
		$getMhs = $this->m_portal->get_data($wherenim,'tmst_mahasiswa')->result();
		foreach ($getMhs as $row) {
			$prodi = $row->Kode_program_studi;
		}
		$where = array(
			'nim' => $nim,
			'ta'  => $ta,			       
	        );
		$data['ku'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
		foreach ($data['ku'] as $row) {
			$id_kuas = $row->id_kuas;
		}
		//get nama
		$data['nama'] = $this->getNama($nim);
		//get prodi
		$data['prodi'] = $this->getProdi($prodi);



		//// cek status
		$data['mahatar_label'] = $this->cekstatus_fpuas($id_kuas,'tbl_kliring_uas_mahatar'); 
        $data['prodi_label'] = $this->cekstatus_fpuas($id_kuas,'tbl_kliring_uas_prodi'); 
        // $data['baak_label'] = $this->cekstatus_fpuas($id_kuas,'tbl_kliring_uas_baak'); 
        $data['bk_label'] = $this->cekstatus_fpuas($id_kuas,'tbl_kliring_uas_bk'); 
        $data['mahatar_ket'] = $this->get_keterangan($id_kuas,'tbl_kliring_uas_mahatar');
        $data['prodi_ket'] = $this->get_keterangan($id_kuas,'tbl_kliring_uas_prodi');
        // $data['baak_ket'] = $this->get_keterangan($id_kuas,'tbl_kliring_uas_baak');
        $data['bk_ket'] = $this->get_keterangan($id_kuas,'tbl_kliring_uas_bk');

        $data['cek'] = $this->get_statusakhir($id_kuas);

		# code...
		$this->load->view('bk/header');
		$this->load->view('bk/search_uas_nim');
		$this->load->view('bk/search_uas_nimp',$data);
		$this->load->view('bk/footer');
	}

	//////////////////////////////////////////prada///////////////////////////////////////////////////
	public function ajuan_prada()
	{
		$data['catar'] = $this->m_portal->get_data_all('tbl_kliring_prada')->result();
		if ($data['catar'] == null) {
			# code...
		}else{
		$data['bk'] = $this;  
		foreach ($data['catar'] as $row)
		{
        $nim = $row->nim;
        $jenjang = $row->jenjang;
        $prodi = $row->prodi;
		}
		//get nama
		$data['nama'] = $this->getNama($nim);
		//get prodi
		$data['prodi'] = $this->getProdi($prodi);
		//get jenjang
		$data['jenjang'] = $this->jenjang($jenjang);
		}

		$this->load->view('bk/header');
		$this->load->view('bk/ajuan_prada',$data);
		$this->load->view('bk/footer');
	}
	public function kliring_prada($id)
	{
		# code...
		$where = array(
			'id_kp' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_prada')->result();
		foreach ($data['catar'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('bk/header');
		$this->load->view('bk/kliring_prada',$data);
		$this->load->view('bk/footer');
	}
	public function kliringp_prada()
	{
		# code...
		$this->form_validation->set_rules('tgl_bayar', 'Harus diisi', 'required');
		$this->form_validation->set_rules('spp', 'spp', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_kp');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_kp'  	=> $this->input->post('id_kp'),
			'tgl_bayar'  => $this->input->post('tgl_bayar'),
			'spp'  => $this->input->post('spp'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_prada_bk');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses kliring prada anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Kliring prada berhasil diproses</b>");  
			 }

			 //after input
			$where = array(
			'id_kp' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_prada')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('bk/header');
			$this->load->view('bk/kliring_prada',$datax);
			$this->load->view('bk/footer');
		}else{
		$this->load->view('bk/header');
		$this->load->view('bk/kliring_prada');
		$this->load->view('bk/footer');
		}
	}
	public function ekliring_prada($id)
	{
		# code...
		$where = array(
			'id_kp' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_prada_bk')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_prada')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('bk/header');
		$this->load->view('bk/ekliring_prada',$data);
		$this->load->view('bk/footer');
	}
	public function ekliringp_prada()
	{
		# code...
		$this->form_validation->set_rules('tgl_bayar', 'Harus diisi', 'required');
		$this->form_validation->set_rules('spp', 'spp', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_kp');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_kp_bk'  	=> $this->input->post('id_kp_bk'),
			);
			$data = array(
			'id_kp'  	=> $this->input->post('id_kp'),
			'tgl_bayar'  => $this->input->post('tgl_bayar'),
			'spp'  => $this->input->post('spp'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_prada_bk');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Edit Proses kliring Prada anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Edit Kliring Prada berhasil diproses</b>");  
			 }
			 // $id = $this->input->post('id_uks');
			 //after input
			$where = array(
			'id_kp' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_prada_bk')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_prada')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('bk/header');
			$this->load->view('bk/ekliring_prada',$datax);
			$this->load->view('bk/footer');
		}else{
			$where = array(
			'id_kp' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_prada_bk')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_prada')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
		$this->load->view('bk/header');
		$this->load->view('bk/ekliring_prada');
		$this->load->view('bk/footer');
		}
	}
		/////////////////////////////////////////semester antara////////////////////////////////////////////////////
	public function cekstatus_fpsmta($id_kuas,$table)
	{
	   $ta = $this->getTa();
		# code...
	  $where = array(
	  'id_smta' => $id_kuas,
	  );
	  $where2 = array(
	  'id_smta' => $id_kuas, 
	  'hasil' => "1",
	  );
	   $where3 = array(
	  'id_smta' => $id_kuas, 
	  'hasil' => "2",
	  );
		$m=$this->m_portal->get_data($where, $table)->row();
		$n=$this->m_portal->get_data($where2, $table)->row();
		$o=$this->m_portal->get_data($where3, $table)->row();

		if ($m > "0" && $n > "0"){
        return $hasil = "<a class='btn btn-success btn-sm' href='#''><i class='fa fa-check'></i></a>";
        }elseif ( $m > "0" && $o > "0" ){
        return $hasil = "<a class='btn btn-danger btn-sm' href='#''><i class='fa fa-close'></i></a>";
        }else{
        return $hasil = "<a class='btn btn-warning btn-sm' href='#''><i class='fa fa-gear'></i></a>";
        } 
	}
	public function get_keterangan_smta($id_kuas, $table)
	{
		# code...
		$ta = $this->getTa();
		$where = array(
			'id_smta' => $id_kuas
        );
		$getP = $this->m_portal->get_data($where,$table)->result();
		foreach ($getP as $p) {
			# code...
			//$data['nama'] = $n->Nama_mahasiswa ;
			return $p->keterangan;
		}
	}
	public function get_statusakhir_smta($id_smta)
	{
		# code...
		$ta = $this->getTa();
		$where = array(
			'id_smta' => $id_smta,
			'hasil' => '1',
        );
        // $get_m = $this->m_portal->get_data($where, 'tbl_kliring_uas_mahatar')->row();
        $get_b = $this->m_portal->get_data($where, 'tbl_kliring_smta_baak')->row();
        $get_k = $this->m_portal->get_data($where, 'tbl_kliring_smta_bk')->row();
        $get_w = $this->m_portal->get_data($where, 'tbl_kliring_smta_prodi')->row();

        if ($get_b > "0" && $get_k > "0" && $get_w > "0") {
        	# code...
        	return $wew = "1";
        }else{
        	return $wew = "0";
        }

	}
	public function search_smta_nim()
	{
		# code...
		$this->load->view('bk/header');
		$this->load->view('bk/search_smta_nim');
		$this->load->view('bk/footer');
	}
	public function search_smta_nim_cari()
	{
		# code..
		$ta = $this->getTa();


		$nim = $this->input->post('nim');
		$wherenim = array(
			'nim' => $nim,       
	        );
		$getMhs = $this->m_portal->get_data($wherenim,'tmst_mahasiswa')->result();
		foreach ($getMhs as $row) {
			$prodi = $row->Kode_program_studi;
		}
		$where = array(
			'nim' => $nim,
			'ta'  => $ta,			       
	        );
		$data['ku'] = $this->m_portal->get_data($where,'tbl_kliring_smta')->result();
		foreach ($data['ku'] as $row) {
			$id_smta = $row->id_smta;
		}
		//get nama
		$data['nama'] = $this->getNama($nim);
		//get prodi
		$data['prodi'] = $this->getProdi($prodi);



		//// cek status
		// $data['mahatar_label'] = $this->cekstatus_fpsmta($id_smta,'tbl_kliring_uas_mahatar'); 
        $data['prodi_label'] = $this->cekstatus_fpsmta($id_smta,'tbl_kliring_smta_prodi'); 
        $data['baak_label'] = $this->cekstatus_fpsmta($id_smta,'tbl_kliring_smta_baak'); 
        $data['bk_label'] = $this->cekstatus_fpsmta($id_smta,'tbl_kliring_smta_bk'); 
        // $data['mahatar_ket'] = $this->get_keterangan_smta($id_smta,'tbl_kliring_smta_mahatar');
        $data['prodi_ket'] = $this->get_keterangan_smta($id_smta,'tbl_kliring_smta_prodi');
        $data['baak_ket'] = $this->get_keterangan_smta($id_smta,'tbl_kliring_smta_baak');
        $data['bk_ket'] = $this->get_keterangan_smta($id_smta,'tbl_kliring_smta_bk');

        $data['cek'] = $this->get_statusakhir_smta($id_smta);

		# code...
		$this->load->view('bk/header');
		$this->load->view('bk/search_smta_nim');
		$this->load->view('bk/search_smta_nimp',$data);
		$this->load->view('bk/footer');
	}
	public function countkuotakelas($kdmakul)
	{
		# code...
		$ta = $this->getTa();
		$where1 = array(
			'Kode_mata_kuliah' => $kdmakul,
			'ta' => $ta
        );
		$data=$this->m_portal->get_data_count_kelas_smta($where1)->result();
		foreach ($data as $key) {
			# code...
			$total = $key->jml_kuota;
		}
		return $total;
	}
	public function kliring_smta($id)
	{
		# code...
		$data['bk'] = $this;
		$ta = $this->getTa(); 
		$where = array(
			'id_smta' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_smta')->result();
		foreach ($data['catar'] as $row)
		{
        $nim = $row->nim;
        $jml_smt = $row->jml_smt;
		}
		$data['nama'] = $this->getNama($nim);
		$wherenim = array(
			'NIM' => $nim,			       
        );
		$getMhs = $this->m_portal->get_data($wherenim,'tmst_mahasiswa')->result();
		foreach ($getMhs as $row) {
			$prodi = $row->Kode_program_studi;
		}
		$data['prodi'] = $this->getProdi($prodi);
		$data['list_makul']=$this->m_portal->get_data_join_makul($where)->result();

		//// perhitungan
		//------------- get alll data
		$where_setting = array(
			'id_smta_setting' => '1',			       
        );
		$setting = $this->m_portal->get_data($where_setting,'tbl_kliring_smta_setting')->result();
		foreach ($setting as $key) {
			# code...
			$admin = $key->administrasi;
			$per_sks = $key->per_sks;
		}
		$where1 = array(
			'id_smta' => $id,
			'ta' => $ta
        );
		$getmakultemp = $this->m_portal->get_data_join_sum_makul_temp($where1)->result();
		foreach ($getmakultemp as $key) {
			# code...
			$sum_sks = $key->jml_sks;
		}

		//-------------- count
		$total_adm = $admin;
		$total_sks = $sum_sks * $per_sks;
		$total = $total_adm + $total_sks ;

		//----------------- send it all
		$data['jml_smt'] = $jml_smt;
		$data['b_adm'] = $admin;

		$data['sum_sks'] = $sum_sks;
		$data['per_sks'] = $per_sks;

		$data['tot_adm'] = $total_adm;
		$data['tot_sks'] = $total_sks;

		$data['total'] = $total;

		$this->load->view('bk/header');
		$this->load->view('bk/kliring_smta',$data);
		$this->load->view('bk/footer');
	}
	public function kliringsmtap()
	{
		# code...
		// $this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$ta = $this->getTa();
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_smta');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_smta'  	=> $this->input->post('id_smta'),
			'biaya_adm'  	=> $this->input->post('tot_adm'),
			'biaya_per_sks'     	=> $this->input->post('tot_sks'),
			'total'   => $this->input->post('total'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_smta_bk');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses kliring anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Kliring berhasil diproses</b>");  
			 }
			

			 //after input
			$where = array(
				'id_smta' => $id,			       
	        );
			$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_smta')->result();
			foreach ($data['catar'] as $row)
			{
	        $nim = $row->nim;
	        $jml_smt = $row->jml_smt;
			}
			$data['nama'] = $this->getNama($nim);
			$wherenim = array(
				'NIM' => $nim,			       
	        );
			$getMhs = $this->m_portal->get_data($wherenim,'tmst_mahasiswa')->result();
			foreach ($getMhs as $row) {
				$prodi = $row->Kode_program_studi;
			}
			$data['prodi'] = $this->getProdi($prodi);
			//// perhitungan
			//------------- get alll data
			$where_setting = array(
				'id_smta_setting' => '1',			       
	        );
			$setting = $this->m_portal->get_data($where_setting,'tbl_kliring_smta_setting')->result();
			foreach ($setting as $key) {
				# code...
				$admin = $key->administrasi;
				$per_sks = $key->per_sks;
			}
			$where1 = array(
				'id_smta' => $id,
				'ta' => $ta
	        );
			$getmakultemp = $this->m_portal->get_data_join_sum_makul_temp($where1)->result();
			foreach ($getmakultemp as $key) {
				# code...
				$sum_sks = $key->jml_sks;
			}

			//-------------- count
			$total_adm = $admin;
			$total_sks = $sum_sks * $per_sks;
			$total = $total_adm + $total_sks ;

			//----------------- send it all
			$data['jml_smt'] = $jml_smt;
			$data['b_adm'] = $admin;

			$data['sum_sks'] = $sum_sks;
			$data['per_sks'] = $per_sks;

			$data['tot_adm'] = $total_adm;
			$data['tot_sks'] = $total_sks;

			$data['total'] = $total;

			$data['id_smta'] = $id;
			$data['nim'] = $nim;
			
			$this->load->view('bk/cetak_nota_smta',$data);
		}else{
			$this->search_smta_nim();
		}
	}
		//////////////////////////////////////////PKL///////////////////////////////////////////////////
	public function ajuan_pkl()
	{
		$data['catar'] = $this->m_portal->get_data_all('tbl_kliring_pkl')->result();
		if ($data['catar'] == null) {
			# code...
		}else{
		$data['bk'] = $this;  
		foreach ($data['catar'] as $row)
		{
        $nim = $row->nim;
        $jenjang = $row->jenjang;
        $prodi = $row->prodi;
		}
		//get nama
		$data['nama'] = $this->getNama($nim);
		//get prodi
		$data['prodi'] = $this->getProdi($prodi);
		//get jenjang
		$data['jenjang'] = $this->jenjang($jenjang);
		}

		$this->load->view('bk/header');
		$this->load->view('bk/ajuan_pkl',$data);
		$this->load->view('bk/footer');
	}
	public function kliring_pkl($id)
	{
		# code...
		$where = array(
			'id_pkl' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_pkl')->result();
		foreach ($data['catar'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('bk/header');
		$this->load->view('bk/kliring_pkl',$data);
		$this->load->view('bk/footer');
	}
	public function kliringp_pkl()
	{
		# code...
		$this->form_validation->set_rules('tgl_bayar', 'Harus diisi', 'required');
		$this->form_validation->set_rules('spp', 'spp', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_pkl');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_pkl'  	=> $this->input->post('id_pkl'),
			'tgl_bayar'  => $this->input->post('tgl_bayar'),
			'spp'  => $this->input->post('spp'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_pkl_bk');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses kliring PKL anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Kliring PKL berhasil diproses</b>");  
			 }

			 //after input
			$where = array(
			'id_pkl' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_pkl')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('bk/header');
			$this->load->view('bk/kliring_pkl',$datax);
			$this->load->view('bk/footer');
		}else{
		$this->load->view('bk/header');
		$this->load->view('bk/kliring_pkl');
		$this->load->view('bk/footer');
		}
	}
	public function ekliring_pkl($id)
	{
		# code...
		$where = array(
			'id_pkl' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_pkl_bk')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_pkl')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('bk/header');
		$this->load->view('bk/ekliring_pkl',$data);
		$this->load->view('bk/footer');
	}
	public function ekliringp_pkl()
	{
		# code...
		$this->form_validation->set_rules('tgl_bayar', 'Harus diisi', 'required');
		$this->form_validation->set_rules('spp', 'spp', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_pkl');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_pkl_bk'  	=> $this->input->post('id_pkl_bk'),
			);
			$data = array(
			'id_pkl'  	=> $this->input->post('id_pkl'),
			'tgl_bayar'  => $this->input->post('tgl_bayar'),
			'spp'  => $this->input->post('spp'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_pkl_bk');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Edit Proses kliring PKL anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Edit Kliring PKL berhasil diproses</b>");  
			 }
			 // $id = $this->input->post('id_uks');
			 //after input
			$where = array(
			'id_pkl' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_pkl_bk')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_pkl')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('bk/header');
			$this->load->view('bk/ekliring_pkl',$datax);
			$this->load->view('bk/footer');
		}else{
			$where = array(
			'id_pkl' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_pkl_bk')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_pkl')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
		$this->load->view('bk/header');
		$this->load->view('bk/ekliring_pkl');
		$this->load->view('bk/footer');
		}
	}


	////////////////////////////////////////tkbi//////////////////////////////////////////////////////
	function tkbi($id)
    {
        # code...
        $where = array(
            'tbl_catar_2025.no' => $id       
        );
        $data['catar'] = $this->m_registrasi->get_data($where,'tbl_catar_2025')->result();

        foreach ($data['catar'] as $key) {
            # code...
            $jalur = $key->jalur;
            $prodi = $key->prodi;
        }
        $data['nominal'] = $this->getBiaya($jalur);
        $data['nmprodi'] = $this->getProdi($prodi);
        // $data['catar'] = $this->m_registrasi->get_data_join_where($where)->result();

        // $this->db->select('aktif');
        // $this->db->from('tbl_catar_2021_validasi');
        // $this->db->where($where);
        // $data['aktif'] =  $this->db->get()->result()->row('aktif');

        // $data['catar'] = $this->m_registrasi->get_data($where,'tbl_catar_2021')->result();
        $this->load->view('bau/header');
        $this->load->view('bau/daful',$data);
        $this->load->view('bau/footer');
        $this->load->view('bau/footer_js');
        $this->load->view('bau/daful_js');
    }
    public function cekstatus_tkbi_periode($status)
	{
		# code...
		$where = array(
				'status' => $status,
			);
		$data = $this->m_mahasiswa->get_data($where, 'diklat_tkbi_kelas')->num_rows();

		return $data;
	}
	public function cekstatus_tkbi_double($nim)
	{
		# code...
		$where = array(
				'nim' => $nim
			);
		$data = $this->m_mahasiswa->get_data($where, 'diklat_tkbi_peserta')->num_rows();

		return $data;
	}
	public function cekstatus_tkbi_bayar($nim)
	{
		# code...
		$where = array(
				'id_tkbi' => $nim
			);
		$data = $this->m_mahasiswa->get_data($where, 'diklat_tkbi_pembayaran')->num_rows();

		return $data;
	}
	public function tkbi2()
	{
		# code...
		$this->load->view('bk/header');
        $this->load->view('bk/tkbi2');
        $this->load->view('bk/footer');
        $this->load->view('bk/footer_js');

	}
    public function tkbi2_cari()
    {
    	# code...
		$data['bk'] = $this;
		$data['mhs_detail'] = $this->m_mahasiswa->get_data_mhs_detail($id);

		//get kelas
		$where = array(
				'status' => 'belum'
			);
		$get_id_kelas = $this->m_mahasiswa->get_data($where,'diklat_tkbi_kelas')->result();
		foreach ($get_id_kelas as $key) {
			# code...
			$data['id_kelas'] = $key->id_tkbi_kelas;
		}

		$nim = $id ;
		$waktu = date('Y-m-d');
		$status = "belum";
		//cek periode kelas
		$data['cek_periode'] = $this->cekstatus_tkbi_periode($status);
		$data['cekstatus_double'] = $this->cekstatus_tkbi_double($nim);

		//pembayaran
		$whereb = array(
				'nim' => $nim
			);
		$get_detail = $this->m_mahasiswa->get_data($whereb,'diklat_tkbi_peserta')->result();
		foreach ($get_detail as $key) {
			# code...
			$data['model_bayar'] = $key->model_bayar;
			$id_tkbi = $key->id_tkbi;
			$data['id_tkbix'] = $id_tkbi; 
		}
		$data['cekstatus_bayar'] = $this->cekstatus_tkbi_bayar($id_tkbi);

		//get pembayaran detail
		$wherec = array(
			'id_tkbi' => $id_tkbi
		);
		$get_detail2 = $this->m_mahasiswa->get_data($wherec,'diklat_tkbi_pembayaran')->result();
		foreach ($get_detail2 as $key) {
			# code...
			$data['bukti_bayar'] = $key->bukti_bayar;
			$data['status_bayar'] = $key->status_bayar;
		}

		
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/tkbi2',$data);
		$this->load->view('mahasiswa/footer');
		$this->load->view('mahasiswa/tkbi2_js');


    }
	////////////////////////////////////////.tkbi//////////////////////////////////////////////////////

	



}

/* End of file bk.php */
/* Location: ./application/controllers/bk.php */