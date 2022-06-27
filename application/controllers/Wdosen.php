<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class wdosen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'administrasi?pesan=belumlogin');
		}
		$this->load->model('m_portal');
	}

	public function index()
	{
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/index');
		$this->load->view('wdosen/footer');
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
	public function ajuan()
	{
		$userprodi = $this->session->userdata('user');
		$where = array(
			'prodi' => $userprodi,			       
        );
		$data['catar']= $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
		if ($data['catar'] == null) {
			# code...
		}else{
		$data['wdosen'] = $this; 
		// $data['catar'] = $this->m_portal->get_data_all('tbl_kliring_ujianktsk')->result(); 
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

		$this->load->view('wdosen/header');
		$this->load->view('wdosen/ajuan',$data);
		$this->load->view('wdosen/footer');
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
		$userprodi = $this->session->userdata('user');

		$mportal = $this->m_portal;		
		$ta = '20211';
		$ajuan = $this->datatables->new2();
		// $ajuan->searchable(['tmst_mahasiswa.nama_mahasiswa', 'tmst_mahasiswa.kode_jenjang_pendidikan', 'tmst_program_studi.nama_program_studi', 'tbl_kliring_uas.nim']);
		$ajuan->select('tmst_mahasiswa.nama_mahasiswa,
						tmst_mahasiswa.kode_jenjang_pendidikan,
						tmst_program_studi.nama_program_studi,
						tbl_kliring_uas.id_kuas,
						tbl_kliring_uas.nim,
						tbl_kliring_uas.jenis_uas,
						tbl_kliring_uas_prodi.id_uas_p,
						tbl_kliring_uas_prodi.hasil AS `hasil_prodi`,
						tbl_kliring_uas_bk.hasil AS  `hasil_bk`,
						tbl_kliring_uas_baak.hasil AS  `hasil_baak`,
						tbl_kliring_uas_mahatar.hasil AS  `hasil_mahatar`'

					  )
					// ->from('tbl_kliring_uas')
					// ->join('tbl_kliring_uas_prodi', 'tbl_kliring_uas_prodi.id_kuas=tbl_kliring_uas.id_kuas')
					// ->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim', 'left')
					// ->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi')

					->from('tbl_kliring_uas')
					->join('tbl_kliring_uas_prodi', 'tbl_kliring_uas_prodi.id_kuas=tbl_kliring_uas.id_kuas','left')
					->join('tbl_kliring_uas_bk', 'tbl_kliring_uas_bk.id_kuas=tbl_kliring_uas.id_kuas','left')
					->join('tbl_kliring_uas_baak', 'tbl_kliring_uas_baak.id_kuas=tbl_kliring_uas.id_kuas','left')
					->join('tbl_kliring_uas_mahatar', 'tbl_kliring_uas_mahatar.id_kuas=tbl_kliring_uas.id_kuas','left')
					->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim')
					->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi', 'left')
					->where('tbl_kliring_uas.ta', $ta)
					// ->where('tmst_mahasiswa.tanggal_lulus IS NULL', null, false)
					->where('tmst_mahasiswa.tahun_masuk >=', '2019')
					->where('tmst_mahasiswa.tahun_masuk <=', '2021')
					->where('tmst_mahasiswa.kode_program_studi', $userprodi);
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
            ->column('Jenis UAS', 'jenis_uas', function($data, $row){
				return $data;
			})
			->column('Prodi', 'hasil_prodi', function($data, $row){

				switch ($row['hasil_prodi']) {
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
			->column('BK', 'hasil_bk', function($data, $row){

				switch ($row['hasil_bk']) {
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
			// ->column('BAAK', 'hasil_baak', function($data, $row){

			// 	switch ($row['hasil_baak']) {
			// 		case '1':
			// 			$icon = 'check';
			// 			$label = 'success';
			// 			break;
			// 		case '2':
			// 			$icon = 'close';
			// 			$label = 'danger';
			// 			break;
			// 		default:
			// 			$icon = 'gear';
			// 			$label = 'warning';
			// 			break;
			// 	}

			// 	$tombol = '<a class="btn btn-'.$label.' btn-sm" href="#"><i class="fa fa-'.$icon.'"></i></a>';
			// 	return $tombol;
			// })
			->column('Mahatar', 'hasil_mahatar', function($data, $row){

				switch ($row['hasil_mahatar']) {
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

				$tombol2 .= '<a class="btn btn-warning btn-sm" href="'.base_url().'wdosen/kliring_uas/'.$data.'"><span class="glyphicon glyphicon-pencil"></span> Kliring</a>';

					// Bay bay, variabel ngisor iki podo njipuk seko hasil?
					// Dibalas yaaa...
					// wkwkkw jadi tombol edit muncul nek tbl tbl_kliring_uas_prodi wes ono isi ne nang
					// baiq

                $m = $mportal->get_data(['id_kuas' => $data],'tbl_kliring_uas_prodi')->row();

                if ($m > "0"){
                $tombol2 .= '<a class="btn btn-warning btn-sm" href="'.base_url().'wdosen/ekliring_uas/'.$data.'"><span class="glyphicon glyphicon-pencil"></span> Edit</a>';
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
			{ 'orderable': false, 'targets': 3, 'className' : 'text-center', 'width' : 150 },
			{ 'orderable': false, 'targets': 4, 'className' : 'text-center', 'width' : 150 },

		]");
		$ajuan->set_options('drawCallback', 'function(settings){
		}');

		$this->datatables->init('tabel_ajuan', $ajuan);

		$data = null;

		$data_foot['nama_datatabel'] = 'tabel_ajuan';
		$data_foot['jquerynya_datatabel'] = $this->datatables;

		$this->load->view('wdosen/header');
		$this->load->view('wdosen/ajuan_kuas',$data);
		$this->load->view('wdosen/footer', $data_foot);
	}
	public function ajuan_kuas_old()
	{
		// $data['catar'] = $this->m_portal->get_data_all('tbl_kliring_uas')->result();
		ini_set('max_execution_time', 0); 
		ini_set('memory_limit','2048M');
		$userprodi = $this->session->userdata('user');
		///get TA(tahun ajaran)
		$where = array(
			'id_ta' => '1'		
		);
		$ta = $this->m_portal->get_data($where,'tbl_ta')->result();
		foreach ($ta as $row) {
			$getTa = $row->ta;
		}
		$where2 = array(
			'Kode_program_studi' => $userprodi,
			'ta' => $getTa		
		);
		///////// akhir get TA(tahun ajaran)
		$data['catar'] = $this->m_portal->get_data_join_uas_where($where2)->result();
		if ($data['catar'] == null) {
			# code...
		}else{ 
		$data['wdosen'] = $this; 
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

		$this->load->view('wdosen/header');
		$this->load->view('wdosen/ajuan_kuas',$data);
		$this->load->view('wdosen/footer');
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
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/kliring',$data);
		$this->load->view('wdosen/footer');
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
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/kliring_uas',$data);
		$this->load->view('wdosen/footer');
	}
	public function ekliring($id)
	{
		# code...
		$where = array(
			'id_uks' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_walidosen')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/ekliring',$data);
		$this->load->view('wdosen/footer');
	}
	public function ekliring_uas($id)
	{
		# code...
		$where = array(
			'id_kuas' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_uas_prodi')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/ekliring_uas',$data);
		$this->load->view('wdosen/footer');
	}
	public function kliringp()
	{
		# code...
		$this->form_validation->set_rules('pktsk', 'kelengkapan judul', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$id = $this->input->post('id_uks');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_uks'  	=> $this->input->post('id_uks'),
			'nim'  	=> $this->input->post('nim'),
			'pktsk'  => $this->input->post('pktsk'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_ujianktsk_walidosen');
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
			$this->load->view('wdosen/header');
			$this->load->view('wdosen/kliring',$datax);
			$this->load->view('wdosen/footer');
		}else{
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/kliring');
		$this->load->view('wdosen/footer');
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
			$res = $this->m_portal->input_data($data,'tbl_kliring_uas_prodi');
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
			$this->load->view('wdosen/header');
			$this->load->view('wdosen/kliring_uas',$datax);
			$this->load->view('wdosen/footer');
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
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/kliring_uas', $datax);
		$this->load->view('wdosen/footer');
		}
	}
	public function ekliringp()
	{
		# code...
		$this->form_validation->set_rules('pktsk', 'kelengkapan judul', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$id = $this->input->post('id_uks');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_uks_wd'  	=> $this->input->post('id_uks_wd'),
			);
			$data = array(
			'id_uks'  	=> $this->input->post('id_uks'),
			'nim'  	=> $this->input->post('nim'),
			'pktsk'  => $this->input->post('pktsk'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_ujianktsk_walidosen');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Edit Proses kliring anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Edit Kliring berhasil diproses</b>");  
			 }

			 //after input
			$where = array(
			'id_uks' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_walidosen')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('wdosen/header');
			$this->load->view('wdosen/ekliring',$datax);
			$this->load->view('wdosen/footer');
		}else{
			$where = array(
			'id_uks' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_walidosen')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim);
			$this->load->view('wdosen/header');
			$this->load->view('wdosen/ekliring');
			$this->load->view('wdosen/footer');
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
				'id_uas_p'  	=> $this->input->post('id_uas_p'),
			);
			$data = array(
			'id_kuas'  	=> $this->input->post('id_kuas'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_uas_p');
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
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_uas_prodi')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('wdosen/header');
			$this->load->view('wdosen/ekliring_uas',$datax);
			$this->load->view('wdosen/footer');
		}else{
			$where = array(
			'id_kuas' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_uas_prodi')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/ekliring_uas');
		$this->load->view('wdosen/footer');
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
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/search_uas_nim');
		$this->load->view('wdosen/footer');
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
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/search_uas_nim');
		$this->load->view('wdosen/search_uas_nimp',$data);
		$this->load->view('wdosen/footer');
	}
	///////////////////////// prada ///////////////////////////////////////////////////////////////////////////////////////////////////////

	public function ajuan_prada()
	{
	    $userprodi = $this->session->userdata('user');
	    $where = array(
			'prodi' => $userprodi,			       
	        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_prada')->result(); 
		if ($data['catar'] == null) {
			# code...
		}else{
		$data['ppk'] = $this; 
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
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/ajuan_prada',$data);
		$this->load->view('wdosen/footer');
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
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/kliring_prada',$data);
		$this->load->view('wdosen/footer');
	}
	public function kliringp_prada()
	{
		# code...
		$this->form_validation->set_rules('dosbing1', 'Dosen pembimbing 1', 'required');
		$this->form_validation->set_rules('dosbing2', 'Dosen pembimbing 2', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$id = $this->input->post('id_kp');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_kp'  	=> $this->input->post('id_kp'),
			'dosbing1' 	=> $this->input->post('dosbing1'),
			'dosbing2' 	=> $this->input->post('dosbing2'),
			'hasil'     => $this->input->post('hasil'),
			'keterangan'=> $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_prada_prodi');
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
			$this->load->view('wdosen/header');
			$this->load->view('wdosen/kliring_prada',$datax);
			$this->load->view('wdosen/footer');
		}else{
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/kliring_prada');
		$this->load->view('wdosen/footer');
		}
	}
	public function ekliring_prada($id)
	{
		# code...
		$where = array(
			'id_kp' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_prada_prodi')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_prada')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/ekliring_prada',$data);
		$this->load->view('wdosen/footer');
	}
	public function ekliringp_prada()
	{
		# code...
		$this->form_validation->set_rules('dosbing1', 'Dosen pembimbing 1', 'required');
		$this->form_validation->set_rules('dosbing2', 'Dosen pembimbing 2', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$id = $this->input->post('id_kp');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_kp_prodi'  => $this->input->post('id_kp_prodi'),
			);
			$data = array(
			'id_kp'  	=> $this->input->post('id_kp'),
			'dosbing1' 	=> $this->input->post('dosbing1'),
			'dosbing2' 	=> $this->input->post('dosbing2'),
			'hasil'     => $this->input->post('hasil'),
			'keterangan'=> $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_prada_prodi');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Edit Proses kliring prada anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Edit Kliring prada berhasil diproses</b>");  
			 }

			 //after input
			$wheres = array(
			'id_kp' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_prada_prodi')->result();
			$datax['catarz'] = $this->m_portal->get_data($wheres,'tbl_kliring_prada')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('wdosen/header');
			$this->load->view('wdosen/ekliring_prada',$datax);
			$this->load->view('wdosen/footer');
		}else{
			$where = array(
			'id_kp' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_prada_prodi')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_prada')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim);
			$this->load->view('wdosen/header');
			$this->load->view('wdosen/ekliring_prada');
			$this->load->view('wdosen/footer');
		}
	}
	/////////////////////////////////////////semester ajuan////////////////////////////////////////////////////
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

        if ($get_b > "0" && $get_m > "0" && $get_m > "0") {
        	# code...
        	return $wew = "1";
        }else{
        	return $wew = "0";
        }

	}
	public function search_smta_nim()
	{
		# code...
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/search_smta_nim');
		$this->load->view('wdosen/footer');
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
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/search_smta_nim');
		$this->load->view('wdosen/search_smta_nimp',$data);
		$this->load->view('wdosen/footer');
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
		$data['wdosen'] = $this; 
		$where = array(
			'id_smta' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_smta')->result();
		foreach ($data['catar'] as $row)
		{
        $nim = $row->nim;
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
		$data['list_makul_temp']=$this->m_portal->get_data_join_makul_temp($where)->result();
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/kliring_smta',$data);
		$this->load->view('wdosen/footer');
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
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_smta_prodi');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses kliring anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Kliring berhasil diproses</b>");  
			 }
			$where_insert = array(
				'id_smta' => $id,
				'ta'	=> $ta		       
        	);
			 $res1 = $this->m_portal->insert_into_smta_makul_fix($where_insert);
		 	if($res1==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses kliring makul anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Kliring makul berhasil diproses</b>");  
			 }

			 //after input
			$datax['wdosen'] = $this; 
			$where = array(
				'id_smta' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_smta')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim);
			$wherenim = array(
				'NIM' => $nim,			       
	        );
			$getMhs = $this->m_portal->get_data($wherenim,'tmst_mahasiswa')->result();
			foreach ($getMhs as $row) {
				$prodi = $row->Kode_program_studi;
			}
			$datax['prodi'] = $this->getProdi($prodi);
			$datax['list_makul_temp']=$this->m_portal->get_data_join_makul_temp($where)->result();
			$this->load->view('wdosen/header');
			$this->load->view('wdosen/kliring_smta',$datax);
			$this->load->view('wdosen/footer');
		}else{
			$datax['wdosen'] = $this; 
			$where = array(
				'id_smta' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_smta')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim);
			$wherenim = array(
				'NIM' => $nim,			       
	        );
			$getMhs = $this->m_portal->get_data($wherenim,'tmst_mahasiswa')->result();
			foreach ($getMhs as $row) {
				$prodi = $row->Kode_program_studi;
			}
			$datax['prodi'] = $this->getProdi($prodi);
			$datax['list_makul_temp']=$this->m_portal->get_data_join_makul_temp($where)->result();
			$this->load->view('wdosen/header');
			$this->load->view('wdosen/kliring_smta', $datax);
			$this->load->view('wdosen/footer');
		}
	}
	public function search_smta_pengampu()
	{
		# code...
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/search_smta_pengampu');
		$this->load->view('wdosen/footer');
	}
	public function search_smta_pengampup()
	{
		# code...
		$data['wdosen'] = $this;
		$prodi = $this->input->post('prodi');
		$smt = $this->input->post('semester');
		$where = array(
				'tmst_mata_kuliah.Kode_program_studi' => $prodi,			       
				'tmst_mata_kuliah.Semester' => $smt
	        );
		$data['list_makul']=$this->m_portal->get_data_join_makul_smta_with_master_makul($where)->result();

		$this->load->view('wdosen/header');
		$this->load->view('wdosen/search_smta_pengampu');
		$this->load->view('wdosen/search_smta_pengampup',$data);
		$this->load->view('wdosen/footer');
	}
	public function cekdosenpengampu($kdmakul)
	{
		# code...
		/// cek dosen
		$ta = $this->getTa();
		$where = array(
				'Kode_mata_kuliah' => $kdmakul,			       
	        );
		$data= $this->m_portal->get_data($where,'tbl_kliring_smta_pengampu')->result();

		if ($data == null) {
			# code...
			$pesan = "Dosen Belum Di Set";
			return $pesan;
		}else{

		foreach ($data as $key) {
			# code...
			$kddosen= $key->Kode_dosen;
		}
		$where1 = array(
				'Kode_dosen' => $kddosen,
	        );
		$data1= $this->m_portal->get_data($where1,'tmst_dosen')->result();

		foreach ($data1 as $key) {
			# code...
			$nmdosen= $key->Nama_dosen;
		}
		 return $nmdosen;
		}
	}
	public function totalpesertasmtabayardone($kdmakul)
	{
		# code...
		$ta = $this->getTa();
		$where = array(
				'tbl_kliring_smta_makul.Kode_mata_kuliah' => $kdmakul,			       
				'tbl_kliring_smta.ta' => $ta
	        );
		$data=$this->m_portal->get_data_join_count_makul_absen($where)->result();
		foreach ($data as $key) {
			# code...
			$total = $key->jml_peserta;
		}
		return $total;

	}
	public function cek_smta_peserta($kdmakul)
	{
		# code...
		$ta = $this->getTa();
		$data['tanggal'] = date("d-m-Y");
		$where = array(
				'tbl_kliring_smta_makul.Kode_mata_kuliah' => $kdmakul,			       
				'tbl_kliring_smta.ta' => $ta
	        );
		$data['catar']=$this->m_portal->get_data_join_cetak_absensi_pdf($where)->result();

		foreach ($data['catar'] as $key) {
			# code...
			$prodi = $key->prodi;
		}
		$data['prodi'] = $this->getProdi($prodi);
		/// get data makul
		$where1 = array(
				'Kode_mata_kuliah' => $kdmakul
	        );
		$get_tbl_makul=$this->m_portal->get_data($where1,'tmst_mata_kuliah')->result();
		foreach ($get_tbl_makul as $key) {
			# code...
			$data['nm_makul'] = $key->Nama_mata_kuliah;
			$data['smt'] = $key->Semester;
		}

		$this->load->view('wdosen/header');
		$this->load->view('wdosen/search_smta_pengampu');
		$this->load->view('wdosen/cek_smta_peserta',$data);
		$this->load->view('wdosen/footer');

	}
	public function set_dosen_pengampu_smta($kdmakul)
	{
		# code...
		$data['kdmakul'] = $kdmakul;
		/// get data makul
		$where1 = array(
				'Kode_mata_kuliah' => $kdmakul
	        );
		$get_tbl_makul=$this->m_portal->get_data($where1,'tmst_mata_kuliah')->result();
		foreach ($get_tbl_makul as $key) {
			# code...
			$data['nm_makul'] = $key->Nama_mata_kuliah;
			$data['smt'] = $key->Semester;
		}
		//get nama dosen
		$data['dosen']=$this->m_portal->get_data_all('tmst_dosen')->result();
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/set_smta_pengampu',$data);
		$this->load->view('wdosen/footer');
	}
	public function set_dosen_pengampu_smtap()
	{
		# code...
		// $this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$ta = $this->getTa();
		$kdmakul = $this->input->post('kdmakul');
		$this->form_validation->set_rules('dosen', 'dosen harus dipilih', 'required');
		
		if ($this->form_validation->run() != false) {
			$data = array(
			'Kode_mata_kuliah'  => $kdmakul,
			'ta'     			=> $ta,
			'Kode_dosen'   		=> $this->input->post('dosen'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_smta_pengampu');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, proses set dosen gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, proses set dosen berhasil diproses</b>");  
			 }
			

			 //after input
			$this->search_smta_pengampu();
		}else{
			$this->search_smta_pengampu();
		}
	}
	
			///////////////////////// PKL //////////////////////////////

	public function ajuan_pkl()
	{
		$data['catar'] = $this->m_portal->get_data_all('tbl_kliring_pkl')->result(); 
		if ($data['catar'] == null) {
			# code...
		}else{
		$data['ppk'] = $this; 
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
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/ajuan_pkl',$data);
		$this->load->view('wdosen/footer');
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
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/kliring_pkl',$data);
		$this->load->view('wdosen/footer');
	}
	public function kliringp_pkl()
	{
		# code...
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$id = $this->input->post('id_pkl');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_pkl'  	=> $this->input->post('id_pkl'),
			'hasil'     => $this->input->post('hasil'),
			'keterangan'=> $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_pkl_prodi');
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
			$this->load->view('wdosen/header');
			$this->load->view('wdosen/kliring_pkl',$datax);
			$this->load->view('wdosen/footer');
		}else{
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/kliring_pkl');
		$this->load->view('wdosen/footer');
		}
	}
	public function ekliring_pkl($id)
	{
		# code...
		$where = array(
			'id_pkl' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_pkl_prodi')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_pkl')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/ekliring_pkl',$data);
		$this->load->view('wdosen/footer');
	}
	public function ekliringp_pkl()
	{
		# code...
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$id = $this->input->post('id_kp');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_pkl_prodi'  => $this->input->post('id_pkl_prodi'),
			);
			$data = array(
			'id_pkl'  	=> $this->input->post('id_pkl'),
			'hasil'     => $this->input->post('hasil'),
			'keterangan'=> $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_pkl_prodi');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Edit Proses kliring PKL anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Edit Kliring PKL berhasil diproses</b>");  
			 }

			 //after input
			$wheres = array(
			'id_pkl' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_pkl_prodi')->result();
			$datax['catarz'] = $this->m_portal->get_data($wheres,'tbl_kliring_pkl')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('wdosen/header');
			$this->load->view('wdosen/ekliring_pkl',$datax);
			$this->load->view('wdosen/footer');
		}else{
			$where = array(
			'id_pkl' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_pkl_prodi')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_pkl')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim);
			$this->load->view('wdosen/header');
			$this->load->view('wdosen/ekliring_pkl');
			$this->load->view('wdosen/footer');
		}
	}
	////////////////////////////////////////// Turun PKL ////////////////////////////////////////////////////

	public function ajuan_tpkl()
	{
		$data['catar'] = $this->m_portal->get_data_all('tbl_kliring_tpkl')->result(); 
		if ($data['catar'] == null) {
			# code...
		}else{
		$data['wdosen'] = $this; 
		foreach ($data['catar'] as $row)
		{
        $nim = $row->nim;
		}
		$where = array(
			'NIM' => $nim,			       
        );
		$get_mhs = $this->m_portal->get_data($where,'tmst_mahasiswa')->result();
		foreach ($get_mhs as $row)
		{
        $prodi = $row->Kode_program_studi;
		}
		//get nama
		$data['nama'] = $this->getNama($nim);
		//get prodi
		$data['prodi'] = $this->getProdi($prodi);
		//get jenjang
		// $data['jenjang'] = $this->jenjang($jenjang);
		
		}
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/ajuan_tpkl',$data);
		$this->load->view('wdosen/footer');
	}
	public function kliring_tpkl($id)
	{
		# code...
		$where = array(
			'id_tpkl' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_tpkl')->result();
		foreach ($data['catar'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/kliring_tpkl',$data);
		$this->load->view('wdosen/footer');
	}
	public function kliringp_tpkl()
	{
		# code...
		$this->form_validation->set_rules('dosbing', 'dosbing', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$id = $this->input->post('id_tpkl');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_tpkl'  	=> $this->input->post('id_tpkl'),
			'hasil'     => $this->input->post('hasil'),
			'keterangan'=> $this->input->post('keterangan'),
			'dosbing'=> $this->input->post('dosbing'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_tpkl_prodi');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses kliring Turun PKL anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Kliring Turun PKL berhasil diproses</b>");  
			 }

			 //after input
			$where = array(
			'id_tpkl' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_tpkl')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('wdosen/header');
			$this->load->view('wdosen/kliring_tpkl',$datax);
			$this->load->view('wdosen/footer');
		}else{
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/kliring_tpkl');
		$this->load->view('wdosen/footer');
		}
	}
	public function ekliring_tpkl($id)
	{
		# code...
		$where = array(
			'id_tpkl' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_tpkl_prodi')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_tpkl')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('wdosen/header');
		$this->load->view('wdosen/ekliring_tpkl',$data);
		$this->load->view('wdosen/footer');
	}
	public function ekliringp_tpkl()
	{
		# code...
		$this->form_validation->set_rules('dosbing', 'dosbing', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$id = $this->input->post('id_tpkl');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_tpkl_prodi'  => $this->input->post('id_tpkl_prodi'),
			);
			$data = array(
			'id_tpkl'  	=> $this->input->post('id_tpkl'),
			'hasil'     => $this->input->post('hasil'),
			'keterangan'=> $this->input->post('keterangan'),
			'dosbing'	=> $this->input->post('dosbing'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_tpkl_prodi');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Edit Proses kliring Turun PKL anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Edit Kliring Turun PKL berhasil diproses</b>");  
			 }

			 //after input
			$wheres = array(
			'id_tpkl' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_tpkl_prodi')->result();
			$datax['catarz'] = $this->m_portal->get_data($wheres,'tbl_kliring_tpkl')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('wdosen/header');
			$this->load->view('wdosen/ekliring_tpkl',$datax);
			$this->load->view('wdosen/footer');
		}else{
			$where = array(
			'id_tpkl' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_tpkl_prodi')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_tpkl')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim);
			$this->load->view('wdosen/header');
			$this->load->view('wdosen/ekliring_tpkl');
			$this->load->view('wdosen/footer');
		}
	}

}

/* End of file wdosen.php */
/* Location: ./application/controllers/wdosen.php */