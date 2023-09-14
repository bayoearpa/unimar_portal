<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class baak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'administrasi?pesan=belumlogin');
		}
		$this->load->model('m_portal');
		$this->load->library('m_pdf');
	}

	public function index()
	{
		$this->load->view('baak/header');
		$this->load->view('baak/index');
		$this->load->view('baak/footer');
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
		$data['catar'] = $this->m_portal->get_data_all('tbl_kliring_ujianktsk')->result();
		if ($data['catar'] == null) {
			# code...
		}else{ 
		$data['baak'] = $this; 
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

		$this->load->view('baak/header');
		$this->load->view('baak/ajuan',$data);
		$this->load->view('baak/footer');
	}
	public function ajuan_kuas()
	{
		ini_set('max_execution_time', -1); 
		$this->load->library('datatables');

		$mportal = $this->m_portal;

		$ta = '20201';
		$ajuan = $this->datatables->new2();
		// $ajuan->searchable(['tmst_mahasiswa.nama_mahasiswa', 'tmst_mahasiswa.kode_jenjang_pendidikan', 'tmst_program_studi.nama_program_studi', 'tbl_kliring_uas.nim']);
	$ajuan->select('tmst_mahasiswa.nama_mahasiswa,
						tmst_mahasiswa.kode_jenjang_pendidikan,
						tmst_program_studi.nama_program_studi,
						tbl_kliring_uas.id_kuas,
						tbl_kliring_uas.nim,
						tbl_kliring_uas.ta,
						tbl_kliring_uas_bk.id_uas_bk,
						tbl_kliring_uas_bk.hasil'
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
					->where('tmst_mahasiswa.tahun_masuk >=', '2015')
					->where('tmst_mahasiswa.tahun_masuk <=', date('Y'));
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
			// ->column('Hasil', 'id_kuas', function($data, $row) use ($mportal){

			// 	$tombol2 = '';

			// 	$tombol2 .= '<a class="btn btn-warning btn-sm" href="'.base_url().'baak/kliring_uas/'.$data.'"><span class="glyphicon glyphicon-pencil"></span> Kliring</a>';

			// 		// Bay bay, variabel ngisor iki podo njipuk seko hasil?
			// 		// Dibalas yaaa...
			// 		// wkwkkw jadi tombol edit muncul nek tbl tbl_kliring_uas_baak wes ono isi ne nang
			// 		// baiq

   //              $m = $mportal->get_data(['id_kuas' => $data],'tbl_kliring_uas_baak')->row();

   //              if ($m > "0"){
   //              $tombol2 .= '<a class="btn btn-warning btn-sm" href="'.base_url().'baak/ekliring_uas/'.$data.'"><span class="glyphicon glyphicon-pencil"></span> Edit</a>';
   //              }

   //              return $tombol2;
			// })
			;
			
		$ajuan->set_options('searchDelay', '2000');
		$ajuan->set_options('order', '[0, "asc"]');
		$ajuan->set_options('oLanguage', '{"sProcessing" : spinner}');
		$ajuan->set_options('lengthMenu', '[[10, 50, 100], [10, 50, 100]]');
		$ajuan->set_options('columnDefs', "[
			{ 'orderable': true, 'targets': 0},
			{ 'orderable': true, 'targets': 1},
			{ 'orderable': true, 'targets': 2},
			{ 'orderable': false, 'targets': 3, 'className' : 'text-center', 'width' : 150 },
			

		]");
		$ajuan->set_options('drawCallback', 'function(settings){
		}');

		$this->datatables->init('tabel_ajuan', $ajuan);

		$data = null;

		$data_foot['nama_datatabel'] = 'tabel_ajuan';
		$data_foot['jquerynya_datatabel'] = $this->datatables;

		$this->load->view('baak/header');
		$this->load->view('baak/ajuan_kuas',$data);
		$this->load->view('baak/footer', $data_foot);
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
		$data['baak'] = $this; 
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

		$this->load->view('baak/header');
		$this->load->view('baak/ajuan_kuas',$data);
		$this->load->view('baak/footer');
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
		$this->load->view('baak/header');
		$this->load->view('baak/kliring',$data);
		$this->load->view('baak/footer');
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
		$this->load->view('baak/header');
		$this->load->view('baak/kliring_uas',$data);
		$this->load->view('baak/footer');
	}
	public function ekliring($id)
	{
		# code...
		$where = array(
			'id_uks' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_baak')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('baak/header');
		$this->load->view('baak/ekliring',$data);
		$this->load->view('baak/footer');
	}
	public function ekliring_uas($id)
	{
		# code...
		$where = array(
			'id_kuas' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_uas_baak')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('baak/header');
		$this->load->view('baak/ekliring_uas',$data);
		$this->load->view('baak/footer');
	}
	public function kliringp()
	{
		# code...
		// $this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_uks');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_uks'  	=> $this->input->post('id_uks'),
			'smt1'  	=> $this->input->post('smt1'),
			'smt2'  	=> $this->input->post('smt2'),
			'smt3'  	=> $this->input->post('smt3'),
			'smt4'  	=> $this->input->post('smt4'),
			'smt5'  	=> $this->input->post('smt5'),
			'smt6'  	=> $this->input->post('smt6'),
			'smt7'  	=> $this->input->post('smt7'),
			'smt8'  	=> $this->input->post('smt8'),
			'smt_mat'  	=> $this->input->post('smt_mat'),
			'fcijasah_trans'  => $this->input->post('fcijasah_trans'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_ujianktsk_baak');
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
			$this->load->view('baak/header');
			$this->load->view('baak/kliring',$datax);
			$this->load->view('baak/footer');
		}else{
			$where = array(
			'id_uks' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
		$this->load->view('baak/header');
		$this->load->view('baak/kliring');
		$this->load->view('baak/footer');
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
			$res = $this->m_portal->input_data($data,'tbl_kliring_uas_baak');
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
			$this->load->view('baak/header');
			$this->load->view('baak/kliring_uas',$datax);
			$this->load->view('baak/footer');
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
		$this->load->view('baak/header');
		$this->load->view('baak/kliring_uas', $datax);
		$this->load->view('baak/footer');
		}
	}
	public function ekliringp()
	{
		# code...
		// $this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_uks');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_uks_baak'  	=> $this->input->post('id_uks_baak'),
			);
			$data = array(
			'id_uks'  	=> $this->input->post('id_uks'),
			'smt1'  	=> $this->input->post('smt1'),
			'smt2'  	=> $this->input->post('smt2'),
			'smt3'  	=> $this->input->post('smt3'),
			'smt4'  	=> $this->input->post('smt4'),
			'smt5'  	=> $this->input->post('smt5'),
			'smt6'  	=> $this->input->post('smt6'),
			'smt7'  	=> $this->input->post('smt7'),
			'smt8'  	=> $this->input->post('smt8'),
			'smt_mat'  	=> $this->input->post('smt_mat'),
			'fcijasah_trans'  => $this->input->post('fcijasah_trans'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_ujianktsk_baak');
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
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_baak')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('baak/header');
			$this->load->view('baak/ekliring',$datax);
			$this->load->view('baak/footer');
		}else{
			$where = array(
			'id_uks' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_baak')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
		$this->load->view('baak/header');
		$this->load->view('baak/ekliring');
		$this->load->view('baak/footer');
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
				'id_uas_baak'  	=> $this->input->post('id_uas_baak'),
			);
			$data = array(
			'id_kuas'  	=> $this->input->post('id_kuas'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_uas_baak');
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
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_uas_baak')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('baak/header');
			$this->load->view('baak/ekliring_uas',$datax);
			$this->load->view('baak/footer');
		}else{
			$where = array(
			'id_kuas' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_uas_baak')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
		$this->load->view('baak/header');
		$this->load->view('baak/ekliring_uas');
		$this->load->view('baak/footer');
		}
	}

	//////////////////////////////////// prada ////////////////////////////////////////////////////////
	public function ajuan_prada()
	{
		$data['catar'] = $this->m_portal->get_data_all('tbl_kliring_prada')->result(); 
		if ($data['catar'] == null) {
			# code...
		}else{
		$data['baak'] = $this; 
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
		$this->load->view('baak/header');
		$this->load->view('baak/ajuan_prada',$data);
		$this->load->view('baak/footer');
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
		$this->load->view('baak/header');
		$this->load->view('baak/kliring_prada',$data);
		$this->load->view('baak/footer');
	}
	public function kliringp_prada()
	{
		# code...
		// $this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_kp');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_kp'  	=> $this->input->post('id_kp'),
			'smt1'  	=> $this->input->post('smt1'),
			'smt2'  	=> $this->input->post('smt2'),
			'smt3'  	=> $this->input->post('smt3'),
			'smt4'  	=> $this->input->post('smt4'),
			'smt5'  	=> $this->input->post('smt5'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_prada_baak');
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
			$this->load->view('baak/header');
			$this->load->view('baak/kliring_prada',$datax);
			$this->load->view('baak/footer');
		}else{
			$where = array(
			'id_kp' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_prada')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
		$this->load->view('baak/header');
		$this->load->view('baak/kliring_prada');
		$this->load->view('baak/footer');
		}
	}
	public function ekliring_prada($id)
	{
		# code...
		$where = array(
			'id_kp' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_prada_baak')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_prada')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('baak/header');
		$this->load->view('baak/ekliring_prada',$data);
		$this->load->view('baak/footer');
	}
	public function ekliringp_prada()
	{
		# code...
		// $this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_kp');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_kp_baak'  	=> $this->input->post('id_kp_baak'),
			);
			$data = array(
			'id_kp'  	=> $this->input->post('id_kp'),
			'smt1'  	=> $this->input->post('smt1'),
			'smt2'  	=> $this->input->post('smt2'),
			'smt3'  	=> $this->input->post('smt3'),
			'smt4'  	=> $this->input->post('smt4'),
			'smt5'  	=> $this->input->post('smt5'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_prada_baak');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Edit Proses kliring prada anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Edit Kliring prada berhasil diproses</b>");  
			 }

			 //after input
			$where = array(
			'id_kp' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_prada_baak')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_prada')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('baak/header');
			$this->load->view('baak/ekliring_prada',$datax);
			$this->load->view('baak/footer');
		}else{
			$where = array(
			'id_kp' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_prada_baak')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_prada')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
		$this->load->view('baak/header');
		$this->load->view('baak/ekliring_prada');
		$this->load->view('baak/footer');
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
		$this->load->view('baak/header');
		$this->load->view('baak/search_smta_nim');
		$this->load->view('baak/footer');
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
		$this->load->view('baak/header');
		$this->load->view('baak/search_smta_nim');
		$this->load->view('baak/search_smta_nimp',$data);
		$this->load->view('baak/footer');
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
		$data['baak'] = $this; 
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
		$this->load->view('baak/header');
		$this->load->view('baak/kliring_smta',$data);
		$this->load->view('baak/footer');
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
			$res = $this->m_portal->input_data($data,'tbl_kliring_smta_baak');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses kliring anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Kliring berhasil diproses</b>");  
			 }
			

			 //after input
			$datax['baak'] = $this; 
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
			$this->load->view('baak/header');
			$this->load->view('baak/kliring_smta',$datax);
			$this->load->view('baak/footer');
		}else{
			$datax['baak'] = $this; 
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
			$this->load->view('baak/header');
			$this->load->view('baak/kliring_smta', $datax);
			$this->load->view('baak/footer');
		}
	}
	public function search_smta_cetak()
	{
		# code...
		$this->load->view('baak/header');
		$this->load->view('baak/search_smta_cetak');
		$this->load->view('baak/footer');
	}
	public function search_smta_cetakp()
	{
		# code...
		$data['baak'] = $this;
		$prodi = $this->input->post('prodi');
		$smt = $this->input->post('semester');
		$where = array(
				'tmst_mata_kuliah.Kode_program_studi' => $prodi,			       
				'tmst_mata_kuliah.Semester' => $smt
	        );
		$data['list_makul']=$this->m_portal->get_data_join_makul_smta_with_master_makul($where)->result();
		$this->load->view('baak/header');
		$this->load->view('baak/search_smta_cetak');
		$this->load->view('baak/search_smta_cetakp',$data);
		$this->load->view('baak/footer');
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
	public function cetakabsensisemesterantara($kdmakul)
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
		// get dosen pengampu
		$where2 = array(
				'Kode_mata_kuliah' => $kdmakul,			       
				'ta' => $ta
	        );
		$get_tbl_pengampu=$this->m_portal->get_data($where2,'tbl_kliring_smta_pengampu')->result();
		// $get_namaprodi = $this->getProdi($kdmakul);
		// $data['prodi'] = $get_namaprodi;
		if ($get_tbl_pengampu == null) {
			# code...
			$data['pengampu'] = "Dosen Belum ditentukan";
		}else{
			$data['pengampu'] = "belum jadi";
		}


		$this->load->view('baak/cetak_absensi_smta',$data);

		//pdf
		$pdfFilePath="cetak_absensi_".$data['nm_makul'].".pdf";
		$html=$this->load->view('baak/cetak_absensi_smta',$data, TRUE);
		$pdf = $this->m_pdf->load();
 
        $pdf->AddPage('P');
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "D");
        exit();

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

		$this->load->view('baak/header');
		$this->load->view('baak/search_smta_cetak');
		$this->load->view('baak/cek_smta_peserta',$data);
		$this->load->view('baak/footer');

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
	public function cetakpermohonansemesterantara($kdmakul)
	{
		# code...
		$ta = $this->getTa();

		// get data dosen
		$where = array(
				'Kode_mata_kuliah' => $kdmakul,			       
	        );
		$data= $this->m_portal->get_data($where,'tbl_kliring_smta_pengampu')->result();
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

		$data['nmdosen'] = $nmdosen;

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

		$get_tanggal = date("Y-m-d");
		$set_tanggal = mediumdate_indo($get_tanggal);

		$data['tanggal'] = $set_tanggal;

		$this->load->view('baak/cetak_permohonan_smta',$data);

		//pdf
		$pdfFilePath="cetak_permohonan_".$data['nm_makul'].".pdf";
		$html=$this->load->view('baak/cetak_permohonan_smta',$data, TRUE);
		$pdf = $this->m_pdf->load();
 
        $pdf->AddPage('P');
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "D");
        exit();

	}
	public function export_excel_smta($kdmakul){
	///set cetak
		$ta = $this->getTa();
		$tanggal = date("d-m-Y");
		$where = array(
				'tbl_kliring_smta_makul.Kode_mata_kuliah' => $kdmakul,			       
				'tbl_kliring_smta.ta' => $ta
	        );
		$get_absensi=$this->m_portal->get_data_join_cetak_absensi_pdf($where)->result();

		foreach ($get_absensi as $key) {
			# code...
			$prodi = $key->prodi;
		}
		$prodi_set = $this->getProdi($prodi);
		/// get data makul
		$where1 = array(
				'Kode_mata_kuliah' => $kdmakul
	        );
		$get_tbl_makul=$this->m_portal->get_data($where1,'tmst_mata_kuliah')->result();
		foreach ($get_tbl_makul as $key) {
			# code...
			$nmmakul_set = $key->Nama_mata_kuliah;
			$smt_set = $key->Semester;
		}
		// get dosen pengampu
		$where2 = array(
				'Kode_mata_kuliah' => $kdmakul,			       
				'ta' => $ta
	        );
		$get_tbl_pengampu=$this->m_portal->get_data($where2,'tbl_kliring_smta_pengampu')->result();
		// $get_namaprodi = $this->getProdi($kdmakul);
		// $data['prodi'] = $get_namaprodi;
		if ($get_tbl_pengampu == null) {
			# code...
			$pengampu_set = "Dosen Belum ditentukan";
		}else{
			foreach ($get_tbl_pengampu as $key) {
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
			$pengampu_set = $nmdosen;
		}


    // Load plugin PHPExcel nya
    ob_start();
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
				    // $excel->getProperties()->setCreator('My Notes Code')
				    //              ->setLastModifiedBy('My Notes Code')
				    //              ->setTitle("Data Siswa")
				    //              ->setSubject("Siswa")
				    //              ->setDescription("Laporan Semua Data Siswa")
				    //              ->setKeywords("Data Siswa");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
				    // $style_col = array(
				    //   'font' => array('bold' => true), // Set font nya jadi bold
				    //   'alignment' => array(
				    //     'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				    //     'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				    //   ),
				    //   'borders' => array(
				    //     'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				    //     'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				    //     'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				    //     'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				    //   )
				    // );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
				    // $style_row = array(
				    //   'alignment' => array(
				    //     'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				    //   ),
				    //   'borders' => array(
				    //     'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				    //     'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				    //     'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				    //     'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				    //   )
				    // );
				    // $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
				    // $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
				    // $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
				    // $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
				    // $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 1
				    $excel->setActiveSheetIndex(0)->setCellValue('A1', "MATA KULIAH"); // Set kolom A3 dengan tulisan "NO"
				    $excel->setActiveSheetIndex(0)->setCellValue('B1', ":"); // Set kolom B3 dengan tulisan "NIS"
				    $excel->setActiveSheetIndex(0)->setCellValue('C1', $nmmakul_set); // Set kolom C3 dengan tulisan "NAMA"

				    $excel->setActiveSheetIndex(0)->setCellValue('A2', "SMT / PRODI"); // Set kolom A3 dengan tulisan "NO"
				    $excel->setActiveSheetIndex(0)->setCellValue('B2', ":"); // Set kolom B3 dengan tulisan "NIS"
				    $excel->setActiveSheetIndex(0)->setCellValue('C2', $smt_set." / ".$prodi_set); // Set kolom C3 dengan tulisan "NAMA"

				    $excel->setActiveSheetIndex(0)->setCellValue('A3', "DOSEN PENGAMPU"); // Set kolom A3 dengan tulisan "NO"
				    $excel->setActiveSheetIndex(0)->setCellValue('B3', ":"); // Set kolom B3 dengan tulisan "NIS"
				    $excel->setActiveSheetIndex(0)->setCellValue('C3', $pengampu_set); // Set kolom C3 dengan tulisan "NAMA"

				    $excel->setActiveSheetIndex(0)->setCellValue('A4', "NO"); // Set kolom A3 dengan tulisan "NO"
				    $excel->setActiveSheetIndex(0)->setCellValue('B4', "NAMA"); // Set kolom B3 dengan tulisan "NIS"
				    $excel->setActiveSheetIndex(0)->setCellValue('C4', "NRP"); // Set kolom C3 dengan tulisan "NAMA"
				   
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
				    // $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
				    // $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
				    // $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
				    // $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
				    // $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
   
    // $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 1
    $no = 1;

    // $excel->setActiveSheetIndex(0)->setCellValue('A1', 'bayu');
    foreach($get_absensi as $data){ // Lakukan looping pada variabel siswa 
    	//DATA DIRI
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no++);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nim);
      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			      // $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			      // $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			      // $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			      // $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			      // $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      
      // $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
			    // $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
			    // $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
			    // $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
			    // $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
			    // $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Export Tracer");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    
    // Redirect output to a client’s web browser (Excel5)
        // header('Content-Type: application/vnd.ms-excel');
        // header('Content-Disposition: attachment;filename="Data Tracer "'.$tanggal_lulus.'".xlsx"');
        // header('Cache-Control: max-age=0');
        // $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        // $writer->save('php://output');
    //old
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        ob_end_clean();
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment; filename="Data Tracer "'.$tanggal_lulus.'".xlsx"'); // Set nama file excel nya
        // header('Cache-Control: max-age=0');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Excel Absensi Semester Antara "'.$nmmakul_set.'".xlsx"');
        $write->save('php://output');
  }
  //////////////////////////////////// PKL ////////////////////////////////////////////////////////
	public function ajuan_pkl()
	{
		$data['catar'] = $this->m_portal->get_data_all('tbl_kliring_pkl')->result(); 
		if ($data['catar'] == null) {
			# code...
		}else{
		$data['baak'] = $this; 
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
		$this->load->view('baak/header');
		$this->load->view('baak/ajuan_pkl',$data);
		$this->load->view('baak/footer');
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
		$this->load->view('baak/header');
		$this->load->view('baak/kliring_pkl',$data);
		$this->load->view('baak/footer');
	}
	public function kliringp_pkl()
	{
		# code...
		// $this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$id = $this->input->post('id_pkl');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_pkl'  	=> $this->input->post('id_pkl'),
			'smt1'  	=> $this->input->post('smt1'),
			'smt2'  	=> $this->input->post('smt2'),
			'smt3'  	=> $this->input->post('smt3'),
			'smt4'  	=> $this->input->post('smt4'),
			'smt5'  	=> $this->input->post('smt5'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_pkl_baak');
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
			$this->load->view('baak/header');
			$this->load->view('baak/kliring_pkl',$datax);
			$this->load->view('baak/footer');
		}else{
			$where = array(
			'id_pkl' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_pkl')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
		$this->load->view('baak/header');
		$this->load->view('baak/kliring_pkl');
		$this->load->view('baak/footer');
		}
	}
	public function ekliring_pkl($id)
	{
		# code...
		$where = array(
			'id_pkl' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_pkl_baak')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_pkl')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('baak/header');
		$this->load->view('baak/ekliring_pkl',$data);
		$this->load->view('baak/footer');
	}
	public function ekliringp_pkl()
	{
		# code...
		// $this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_pkl');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_pkl_baak'  	=> $this->input->post('id_pkl_baak'),
			);
			$data = array(
			'id_pkl'  	=> $this->input->post('id_pkl'),
			'smt1'  	=> $this->input->post('smt1'),
			'smt2'  	=> $this->input->post('smt2'),
			'smt3'  	=> $this->input->post('smt3'),
			'smt4'  	=> $this->input->post('smt4'),
			'smt5'  	=> $this->input->post('smt5'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_pkl_baak');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Edit Proses kliring PKL anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Edit Kliring PKL berhasil diproses</b>");  
			 }

			 //after input
			$where = array(
			'id_pkl' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_pkl_baak')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_pkl')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('baak/header');
			$this->load->view('baak/ekliring_pkl',$datax);
			$this->load->view('baak/footer');
		}else{
			$where = array(
			'id_pkl' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_pkl_baak')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_pkl')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
		$this->load->view('baak/header');
		$this->load->view('baak/ekliring_pkl');
		$this->load->view('baak/footer');
		}
	}

	//////////////////////////////////////////Monitoring///////////////////////////////////////////////////////

	// monitoring lulus D3
	public function mon_llsd3()
	{
		# code...
    // Call your model method to get the data with pagination
    $data['items'] = $this->m_portal->get_data_formon_mhsall($per_page, $offset);

    $data['program_studi_options'] = array('92403', '92402'); // Add other program options if needed

    $this->load->view('baak/header');
    $this->load->view('baak/mon_llsd3', $data);
    $this->load->view('baak/footer');
    $this->load->view('baak/mon_llsd3_js');
	}

	public function mon_llsd3data()
	{
		# code...
	$year = $this->input->get('year'); // Ambil tahun dari input form
    $program_studi = $this->input->get('program_studi'); // Ambil program studi dari input form

    // Buat array untuk filter program studi
    $program_studi_options = array('92403', '92402'); // Tambahkan program studi lain jika ada

    if (!$year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsall();
    } elseif ($year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyear($year);
    } elseif (!$year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsprodi($program_studi);
    } elseif ($year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyearnprodi($year, $program_studi);
    }

    $data['program_studi_options'] = $program_studi_options; // Pass program studi options to view
    $this->load->view('baak/mon_llsd3data', $data);
	}

	public function mon_add($id)
	{
		# code...
		// Ambil data berdasarkan ID dari model Anda
        $data = $this->m_portal->get_data_formon_mhs($id); // Gantilah 'get_data_by_id' dengan metode yang sesuai dalam model Anda

        // Konversi data ke format JSON dan kirimkan ke view
        echo json_encode($data);
	}
	public function mon_addp()
	{
    // Tangani data yang dikirimkan dari formulir
    $data = array(
        'nim' => $this->input->post('nim'),
        'd3_no_ijasah' => $this->input->post('nj')
    );

    // Simpan data ke database
    $res = $this->m_portal->input_data($data,'tbl_mon');
    // Sesuaikan dengan model dan metode penyimpanan data Anda

    // Setelah berhasil disimpan, beri respons "sukses" ke JavaScript
    if ($res) {
       // Jika terjadi kesalahan, beri respons "gagal" ke JavaScript
        echo 'gagal';
    } else {
         // Jika penyimpanan sukses, beri respons "sukses" ke JavaScript
        echo 'sukses';
    }
	}

	public function mon_edit($id)
	{
		# code...
		// Ambil data berdasarkan ID dari model Anda
        $data = $this->m_portal->get_data_formon_mhs($id); // Gantilah 'get_data_by_id' dengan metode yang sesuai dalam model Anda

        // Konversi data ke format JSON dan kirimkan ke view
        echo json_encode($data);
	}

	public function mon_editp()
	{
    // Tangani data yang dikirimkan dari formulir
	$where = array(
        'id_mon' => $this->input->post('id_mon'),
    ); 
    $data = array(
        'nim' => $this->input->post('nim'),
        'd3_no_ijasah' => $this->input->post('enj')
    );

    // Simpan data ke database
    $res = $this->m_portal->update_data($where, $data,'tbl_mon');
    // Sesuaikan dengan model dan metode penyimpanan data Anda

    // Setelah berhasil disimpan, beri respons "sukses" ke JavaScript
    if ($res) {
       // Jika terjadi kesalahan, beri respons "gagal" ke JavaScript
        echo 'gagal';
    } else {
         // Jika penyimpanan sukses, beri respons "sukses" ke JavaScript
        echo 'sukses';
    }
	}

	// monitoring lulus Pra

	public function mon_llspra()
	{
		# code...
    // Call your model method to get the data with pagination
    $data['items'] = $this->m_portal->get_data_formon_mhsall($per_page, $offset);

    $data['program_studi_options'] = array('92403', '92402'); // Add other program options if needed

    $this->load->view('baak/header');
    $this->load->view('baak/mon_llspra', $data);
    $this->load->view('baak/footer');
    $this->load->view('baak/mon_llspra_js');
	}

	public function mon_llspradata()
	{
		# code...
	$year = $this->input->get('year'); // Ambil tahun dari input form
    $program_studi = $this->input->get('program_studi'); // Ambil program studi dari input form

    // Buat array untuk filter program studi
    $program_studi_options = array('92403', '92402'); // Tambahkan program studi lain jika ada

    if (!$year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsall();
    } elseif ($year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyear($year);
    } elseif (!$year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsprodi($program_studi);
    } elseif ($year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyearnprodi($year, $program_studi);
    }

    $data['program_studi_options'] = $program_studi_options; // Pass program studi options to view
    $this->load->view('baak/mon_llspradata', $data);
	}
	public function mon_praedit($id)
	{
		# code...
		// Ambil data berdasarkan ID dari model Anda
        $data = $this->m_portal->get_data_formon_mhs($id); // Gantilah 'get_data_by_id' dengan metode yang sesuai dalam model Anda

        // Konversi data ke format JSON dan kirimkan ke view
        echo json_encode($data);
	}
	public function mon_praeditp()
	{
    // Tangani data yang dikirimkan dari formulir
	$where = array(
        'id_mon' => $this->input->post('id_mon'),
    ); 
	$pra_tanggal_lulus = $this->input->post('etglllspra');
	$pra_mb_skl = $this->input->post('embskl');

    $pra_tanggal_lulusf = date('Y-m-d', strtotime($pra_tanggal_lulus)); // Ubah format tanggal
    $pra_mb_sklf = date('Y-m-d', strtotime($pra_mb_skl)); // Ubah format tanggal

    $data = array(
        'seafarercode' => $this->input->post('eseafarercode'),
        'pra_lulus_ukp' => $pra_tanggal_lulusf,
        'pra_mb_skl' => $pra_mb_sklf,
        'pra_status' => $this->input->post('estatpra')
    );

    // Simpan data ke database
    $res = $this->m_portal->update_data($where, $data,'tbl_mon');
    // Sesuaikan dengan model dan metode penyimpanan data Anda

    // Setelah berhasil disimpan, beri respons "sukses" ke JavaScript
    if ($res) {
       // Jika terjadi kesalahan, beri respons "gagal" ke JavaScript
        echo 'gagal';
    } else {
         // Jika penyimpanan sukses, beri respons "sukses" ke JavaScript
        echo 'sukses';
    }
	}

	// monitoring lulus Pasca

	public function mon_llspasca()
	{
		# code...
    // Call your model method to get the data with pagination
    $data['items'] = $this->m_portal->get_data_formon_mhsall($per_page, $offset);

    $data['program_studi_options'] = array('92403', '92402'); // Add other program options if needed

    $this->load->view('baak/header');
    $this->load->view('baak/mon_llspasca', $data);
    $this->load->view('baak/footer');
    $this->load->view('baak/mon_llspasca_js');
	}

	public function mon_llspascadata()
	{
		# code...
	$year = $this->input->get('year'); // Ambil tahun dari input form
    $program_studi = $this->input->get('program_studi'); // Ambil program studi dari input form

    // Buat array untuk filter program studi
    $program_studi_options = array('92403', '92402'); // Tambahkan program studi lain jika ada

    if (!$year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsall();
    } elseif ($year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyear($year);
    } elseif (!$year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsprodi($program_studi);
    } elseif ($year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyearnprodi($year, $program_studi);
    }

    $data['program_studi_options'] = $program_studi_options; // Pass program studi options to view
    $this->load->view('baak/mon_llspascadata', $data);
	}
	public function mon_pascaedit($id)
	{
		# code...
		// Ambil data berdasarkan ID dari model Anda
        $data = $this->m_portal->get_data_formon_mhs($id); // Gantilah 'get_data_by_id' dengan metode yang sesuai dalam model Anda

        // Konversi data ke format JSON dan kirimkan ke view
        echo json_encode($data);
	}
	public function mon_pascaeditp()
	{
    // Tangani data yang dikirimkan dari formulir
	$where = array(
        'id_mon' => $this->input->post('id_mon'),
    ); 
	$pra_tanggal_lulus = $this->input->post('etglllspasca');

    $pra_tanggal_lulusf = date('Y-m-d', strtotime($pra_tanggal_lulus)); // Ubah format tanggal

    $data = array(
        'seafarercode' => $this->input->post('eseafararcode'),
        'pasca_lulus_ukp' => $pra_tanggal_lulusf,
        'pasca_no_ijasah' => $this->input->post('enoijasah'),
        'pasca_status' => $this->input->post('estatpasca')
    );

    // Simpan data ke database
    $res = $this->m_portal->update_data($where, $data,'tbl_mon');
    // Sesuaikan dengan model dan metode penyimpanan data Anda

    // Setelah berhasil disimpan, beri respons "sukses" ke JavaScript
    if ($res) {
       // Jika terjadi kesalahan, beri respons "gagal" ke JavaScript
        echo 'gagal';
    } else {
         // Jika penyimpanan sukses, beri respons "sukses" ke JavaScript
        echo 'sukses';
    }
	}

	////// monitoring stanby prala
	public function mon_sbprala()
	{
		# code...
    // Call your model method to get the data with pagination
    $data['items'] = $this->m_portal->get_data_formon_mhsall_sb($per_page, $offset);

    $data['program_studi_options'] = array('92403', '92402'); // Add other program options if needed

    $this->load->view('baak/header');
    $this->load->view('baak/mon_sbprala', $data);
    $this->load->view('baak/footer');
    $this->load->view('baak/mon_sbprala_js');
	}

	public function mon_sbpraladata()
	{
		# code...
	$year = $this->input->get('year'); // Ambil tahun dari input form
    $program_studi = $this->input->get('program_studi'); // Ambil program studi dari input form

    // Buat array untuk filter program studi
    $program_studi_options = array('92403', '92402'); // Tambahkan program studi lain jika ada

    if (!$year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsall_sb();
    } elseif ($year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyear_sb($year);
    } elseif (!$year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsprodi_sb($program_studi);
    } elseif ($year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyearnprodi_sb($year, $program_studi);
    }

    $data['program_studi_options'] = $program_studi_options; // Pass program studi options to view
    $this->load->view('baak/mon_sbpraladata', $data);
	}

}

/* End of file baak.php */
/* Location: ./application/controllers/baak.php */