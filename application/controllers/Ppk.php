<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ppk extends CI_Controller {

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
		$this->load->view('ppk/header');
		$this->load->view('ppk/index');
		$this->load->view('ppk/footer');
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
	public function getNamaDosen($kddosen)
	{
		# code...
		//get nama
		$where = array(
			'Kode_dosen' => $kddosen,			       
        );
		$getNim = $this->m_portal->get_data($where,'tmst_dosen')->result();
		foreach ($getNim as $n) {
			# code...
			//$data['nama'] = $n->Nama_mahasiswa ;
			return $n->Nama_dosen;
		}
	}
	public function ajuan()
	{
		$data['catar'] = $this->m_portal->get_data_all('tbl_kliring_ujianktsk')->result(); 
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
		$this->load->view('ppk/header');
		$this->load->view('ppk/ajuan',$data);
		$this->load->view('ppk/footer');
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
		$this->load->view('ppk/header');
		$this->load->view('ppk/kliring',$data);
		$this->load->view('ppk/footer');
	}
	public function ekliring($id)
	{
		# code...
		$where = array(
			'id_uks' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_ppk')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('ppk/header');
		$this->load->view('ppk/ekliring',$data);
		$this->load->view('ppk/footer');
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
			'khs'  	=> $this->input->post('khs'),
			'fcsma'  	=> $this->input->post('fcsma'),
			'fc_nilaikc'  	=> $this->input->post('fc_nilaikc'),
			'sumbanganp'  	=> $this->input->post('sumbanganp'),
			'proposal'  	=> $this->input->post('proposal'),	
			'skripsi'  	=> $this->input->post('skripsi'),
			'foto'  	=> $this->input->post('foto'),
		
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_ujianktsk_ppk');
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
			$this->load->view('ppk/header');
			$this->load->view('ppk/kliring',$datax);
			$this->load->view('ppk/footer');
		}else{
		$this->load->view('ppk/header');
		$this->load->view('ppk/kliring');
		$this->load->view('ppk/footer');
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
				'id_uks_ppk'  	=> $this->input->post('id_uks_ppk'),
			);
			$data = array(
			'id_uks'  	=> $this->input->post('id_uks'),
			'khs'  	=> $this->input->post('khs'),
			'fcsma'  	=> $this->input->post('fcsma'),
			'fc_nilaikc'  	=> $this->input->post('fc_nilaikc'),
			'sumbanganp'  	=> $this->input->post('sumbanganp'),
			'proposal'  	=> $this->input->post('proposal'),	
			'skripsi'  	=> $this->input->post('skripsi'),
			'foto'  	=> $this->input->post('foto'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_ujianktsk_ppk');
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
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_ppk')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('ppk/header');
			$this->load->view('ppk/ekliring',$datax);
			$this->load->view('ppk/footer');
		}else{
		$this->load->view('ppk/header');
		$this->load->view('ppk/ekliring');
		$this->load->view('ppk/footer');
		}
	}


	/////////////////////////////////////////prada//////////////////////////////////////////////////////////////
	public function ajuan_prada()
	{
		$data['catar'] = $this->m_portal->get_data_all('tbl_kliring_prada')->result(); 
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
		$this->load->view('ppk/header');
		$this->load->view('ppk/ajuan_prada',$data);
		$this->load->view('ppk/footer');
	}
	// public function ajuan_prada()
	// {
	// 	ini_set('max_execution_time', -1); 
	// 	$this->load->library('datatables');

	// 	$mportal = $this->m_portal;

	// 	$ajuan = $this->datatables->new2();
	// 	// $ajuan->searchable(['tmst_mahasiswa.nama_mahasiswa', 'tmst_mahasiswa.kode_jenjang_pendidikan', 'tmst_program_studi.nama_program_studi', 'tbl_kliring_uas.nim']);
	// 	$ajuan->select('tmst_mahasiswa.nama_mahasiswa,
	// 					tmst_mahasiswa.kode_jenjang_pendidikan,
	// 					tmst_program_studi.nama_program_studi,
	// 					tbl_kliring_prada.id_kp,
	// 					tbl_kliring_prada.nim,
	// 					tbl_kliring_prada.smt,
	// 					tbl_kliring_prada_baak.hasil AS `hasil_baak`,
	// 					tbl_kliring_prada_bk.hasil AS `hasil_bk`,
	// 					tbl_kliring_prada_mahatar.hasil AS `hasil_mahatar`,
	// 					tbl_kliring_prada_prodi.hasil AS `hasil_prodi`,
	// 					tbl_kliring_prada_prodi.hasil AS `dosbing1`,
	// 					tbl_kliring_prada_prodi.hasil AS `dosbing2`'

	// 				  )
	// 				// ->from('tbl_kliring_uas')
	// 				// ->join('tbl_kliring_uas_baak', 'tbl_kliring_uas_baak.id_kuas=tbl_kliring_uas.id_kuas')
	// 				// ->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim', 'left')
	// 				// ->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi')

	// 				->from('tbl_kliring_prada')
	// 				->join('tbl_kliring_prada_baak', 'tbl_kliring_prada_baak.id_kp=tbl_kliring_prada.id_kuas')
	// 				->join('tbl_kliring_prada_bk', 'tbl_kliring_prada_bk.id_kp=tbl_kliring_prada.id_kuas')
	// 				->join('tbl_kliring_prada_mahatar', 'tbl_kliring_prada_mahatar.id_kp=tbl_kliring_prada.id_kuas')
	// 				->join('tbl_kliring_prada_prodi', 'tbl_kliring_prada_prodi.id_kp=tbl_kliring_prada.id_kuas')
	// 				->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim')
	// 				->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi', 'left')
	// 				// ->where('tbl_kliring_uas.ta', $ta)
	// 				// ->where('tmst_mahasiswa.tanggal_lulus IS NULL', null, false)
	// 				->where('tmst_mahasiswa.tahun_masuk >=', '2017')
	// 				->where('tmst_mahasiswa.tahun_masuk <=', date('Y'));
	// 	$ajuan
	// 		->style(['class' => 'table table-bordered table-striped display'])
	// 		->column('NIM', 'nim', function($data, $row){
	// 			return $data;
	// 		})
	// 		->column('Nama', 'nama_mahasiswa', function($data, $row){
	// 			return $data;
	// 		})
	// 		->column('Prodi', 'nama_program_studi', function($data, $row){
	// 			return $data;
	// 		})
	// 		->column('Jenjang', 'kode_jenjang_pendidikan', function($data, $row){
	// 			if ($data == "E") {
 //                        # code...
 //                        $jurusan = "D3";
 //                    }else{
 //                        # code...
 //                        $jurusan = "S1";
 //                    }
 //                   return $jurusan;
	// 		})
	// 		->column('Semester', 'smt', function($data, $row){
	// 			return $data;
	// 		})
			
	// 		->column('BK', 'hasil_bk', function($data, $row){

	// 			switch ($row['hasil_bk']) {
	// 				case '1':
	// 					$icon = 'check';
	// 					$label = 'success';
	// 					break;
	// 				case '2':
	// 					$icon = 'close';
	// 					$label = 'danger';
	// 					break;
	// 				default:
	// 					$icon = 'gear';
	// 					$label = 'warning';
	// 					break;
	// 			}

	// 			$tombol = '<a class="btn btn-'.$label.' btn-sm" href="#"><i class="fa fa-'.$icon.'"></i></a>';
	// 			return $tombol;
	// 		})
	// 		->column('BAAK', 'hasil_baak', function($data, $row){

	// 			switch ($row['hasil_baak']) {
	// 				case '1':
	// 					$icon = 'check';
	// 					$label = 'success';
	// 					break;
	// 				case '2':
	// 					$icon = 'close';
	// 					$label = 'danger';
	// 					break;
	// 				default:
	// 					$icon = 'gear';
	// 					$label = 'warning';
	// 					break;
	// 			}

	// 			$tombol = '<a class="btn btn-'.$label.' btn-sm" href="#"><i class="fa fa-'.$icon.'"></i></a>';
	// 			return $tombol;
	// 		})
	// 		->column('Mahatar', 'hasil_mahatar', function($data, $row){

	// 			switch ($row['hasil_mahatar']) {
	// 				case '1':
	// 					$icon = 'check';
	// 					$label = 'success';
	// 					break;
	// 				case '2':
	// 					$icon = 'close';
	// 					$label = 'danger';
	// 					break;
	// 				default:
	// 					$icon = 'gear';
	// 					$label = 'warning';
	// 					break;
	// 			}

	// 			$tombol = '<a class="btn btn-'.$label.' btn-sm" href="#"><i class="fa fa-'.$icon.'"></i></a>';
	// 			return $tombol;
	// 		})
	// 		->column('Prodi', 'hasil_prodi', function($data, $row){

	// 			switch ($row['hasil_prodi']) {
	// 				case '1':
	// 					$icon = 'check';
	// 					$label = 'success';
	// 					break;
	// 				case '2':
	// 					$icon = 'close';
	// 					$label = 'danger';
	// 					break;
	// 				default:
	// 					$icon = 'gear';
	// 					$label = 'warning';
	// 					break;
	// 			}

	// 			$tombol = '<a class="btn btn-'.$label.' btn-sm" href="#"><i class="fa fa-'.$icon.'"></i></a>';
	// 			return $tombol;
	// 		})
	// 		->column('Dosbing 1', 'dosbing1', function($data, $row){
	// 			return $data;
	// 		})
	// 		->column('Dosbing 2', 'dosbing2', function($data, $row){
	// 			return $data;
	// 		})
	// 		// ->column('Hasil', 'id_kuas', function($data, $row) use ($mportal){

	// 		// 	$tombol2 = '';

	// 		// 	$tombol2 .= '<a class="btn btn-warning btn-sm" href="'.base_url().'baak/kliring_uas/'.$data.'"><span class="glyphicon glyphicon-pencil"></span> Kliring</a>';

	// 		// 		// Bay bay, variabel ngisor iki podo njipuk seko hasil?
	// 		// 		// Dibalas yaaa...
	// 		// 		// wkwkkw jadi tombol edit muncul nek tbl tbl_kliring_uas_baak wes ono isi ne nang
	// 		// 		// baiq

 //   //              $m = $mportal->get_data(['id_kuas' => $data],'tbl_kliring_uas_baak')->row();

 //   //              if ($m > "0"){
 //   //              $tombol2 .= '<a class="btn btn-warning btn-sm" href="'.base_url().'baak/ekliring_uas/'.$data.'"><span class="glyphicon glyphicon-pencil"></span> Edit</a>';
 //   //              }

 //   //              return $tombol2;
	// 		// })
	// 		;
			
	// 	$ajuan->set_options('searchDelay', '2000');
	// 	$ajuan->set_options('order', '[0, "asc"]');
	// 	$ajuan->set_options('oLanguage', '{"sProcessing" : spinner}');
	// 	$ajuan->set_options('lengthMenu', '[[10, 50, 100], [10, 50, 100]]');
	// 	$ajuan->set_options('columnDefs', "[
	// 		{ 'orderable': true, 'targets': 0},
	// 		{ 'orderable': true, 'targets': 1},
	// 		{ 'orderable': true, 'targets': 2},
	// 		{ 'orderable': false, 'targets': 3, 'className' : 'text-center', 'width' : 150 },
			

	// 	]");
	// 	$ajuan->set_options('drawCallback', 'function(settings){
	// 	}');

	// 	$this->datatables->init('tabel_ajuan', $ajuan);

	// 	$data = null;

	// 	$data_foot['nama_datatabel'] = 'tabel_ajuan';
	// 	$data_foot['jquerynya_datatabel'] = $this->datatables;

	// 	$this->load->view('ppk/header');
	// 	$this->load->view('ppk/ajuan_prada',$data);
	// 	$this->load->view('ppk/footer', $data_foot);
	// }
	
	/////////////////////////////////////////pkl//////////////////////////////////////////////////////////////
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
		$this->load->view('ppk/header');
		$this->load->view('ppk/ajuan_pkl',$data);
		$this->load->view('ppk/footer');
	}
		////////////////////////////////////////// Turun PKL //////////////////////////////////////////////////////
	public function ajuan_tpkl()
	{
		$wherexxx = array(
			'tbl_kliring_tpkl.status' => 'aktif',
			'tmst_mahasiswa.Tahun_masuk >' => '2018'			       
        );
		$data['catar'] = $this->m_portal->get_data_join_tpkl($wherexxx)->result(); 
		if ($data['catar'] == null) {
			# code...
		}else{
		$data['ppk'] = $this; 
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
		$this->load->view('ppk/header');
		$this->load->view('ppk/ajuan_tpkl',$data);
		$this->load->view('ppk/footer');
		$this->load->view('ppk/ajuan_tpkl_js');
	}
	public function cekdosbing_tpkl($id_tpkl)
	{
		# code...
		$where = array(
			'id_tpkl' => $id_tpkl,			       
        );
		$get_dosbing = $this->m_portal->get_data($where,'tbl_kliring_tpkl_prodi')->result();
		foreach ($get_dosbing as $row)
		{
        $dosbing = $row->dosbing;

		}

		if ($dosbing == null) {
			# code...
			return "Dosen pembimbing belum di set";
		}else{
			return $this->getNamaDosen($dosbing);
		}
		
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
		$this->load->view('ppk/header');
		$this->load->view('ppk/kliring_tpkl',$data);
		$this->load->view('ppk/footer');
	}
	public function kliringp_tpkl()
	{
		# code...
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$id = $this->input->post('id_tpkl');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_tpkl'  	=> $this->input->post('id_tpkl'),
			'hasil'     => $this->input->post('hasil'),
			'keterangan'=> $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_tpkl_ppk');
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
			$this->load->view('ppk/header');
			$this->load->view('ppk/kliring_tpkl',$datax);
			$this->load->view('ppk/footer');
		}else{
		$this->load->view('ppk/header');
		$this->load->view('ppk/kliring_tpkl');
		$this->load->view('ppk/footer');
		}
	}
	public function ekliring_tpkl($id)
	{
		# code...
		$where = array(
			'id_tpkl' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_tpkl_ppk')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_tpkl')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('ppk/header');
		$this->load->view('ppk/ekliring_tpkl',$data);
		$this->load->view('ppk/footer');
	}
	public function ekliringp_tpkl()
	{
		# code...
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$id = $this->input->post('id_tpkl');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_tpkl_ppk'  => $this->input->post('id_tpkl_ppk'),
			);
			$data = array(
			'id_tpkl'  	=> $this->input->post('id_tpkl'),
			'hasil'     => $this->input->post('hasil'),
			'keterangan'=> $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_tpkl_ppk');
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
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_tpkl_ppk')->result();
			$datax['catarz'] = $this->m_portal->get_data($wheres,'tbl_kliring_tpkl')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('ppk/header');
			$this->load->view('ppk/ekliring_tpkl',$datax);
			$this->load->view('ppk/footer');
		}else{
			$where = array(
			'id_tpkl' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_tpkl_ppk')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_tpkl')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim);
			$this->load->view('ppk/header');
			$this->load->view('ppk/ekliring_tpkl');
			$this->load->view('ppk/footer');
		}
	}
	public function endstatustpkl()	{
		# code...
		 // Pastikan metode request adalah POST
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        $id_tpkl = $this->input->post('id_tpkl');
        $status = "nonaktif"; // Sesuaikan dengan input form Anda

        // Lakukan validasi atau proses lainnya jika diperlukan

        // Update status pada tabel tbl_kliring_tpkl
        $data = array('status' => $status);
        $where = array('id_tpkl' => $id_tpkl);
        $this->m_portal->update_data($where, $data, 'tbl_kliring_tpkl');

        // Redirect atau berikan respons sesuai kebutuhan
         $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(['success' => true]));
    } else {
        // Request bukan POST, atur respons sesuai kebutuhan
        show_error('Metode request tidak valid', 400);
    }

	}
	public function ajuan_tpkl2()
	{
	    $wherexxx = array(
	        'tbl_kliring_tpkl.status' => 'aktif',
	        'tmst_mahasiswa.Tahun_masuk >' => '2018'			       
	    );

	    $data['catar'] = $this->m_portal->get_data_join_tpkl($wherexxx)->result();

	    if ($data['catar'] == null) {
	        // Handle the case when no data is available
	        $this->output->set_output(json_encode(['success' => false, 'message' => 'No data available.']));
	        return;
	    }

	    $nim = $data['catar'][0]->nim; // Assuming you want to use the first row's nim
	    $where = array(
	        'NIM' => $nim,			       
	    );

	    $get_mhs = $this->m_portal->get_data($where, 'tmst_mahasiswa')->result();

	    foreach ($get_mhs as $row) {
	        $prodi = $row->Kode_program_studi;
	    }

	    // Process and prepare data for JSON response
	    $result = [
	        'success' => true,
	        'data' => [
	            'catar' => $data['catar'],
	            'nama' => $this->getNama($nim),
	            'prodi' => $this->getProdi($prodi),
	        ],
	    ];

	    $this->output->set_output(json_encode($result));
	}


	/////////////////////////////////////////// Monitoring/////////////////////////////////////////////////
	// monitoring pencarian mahasiswa taruna
	public function mon_pencarian()
	{
		# code...
		$this->load->view('ppk/header');
        $this->load->view('ppk/mon_pencarian');        
        $this->load->view('ppk/footer');
        $this->load->view('ppk/mon_pencarian_js');
	}
	public function getdatamahatar($no)
    {
        # code...
        // Ambil data berdasarkan ID dari model Anda
        $data = $this->m_registrasi->get_data_mhs_detail($no); // Gantilah 'get_data_by_id' dengan metode yang sesuai dalam model Anda

        // Konversi data ke format JSON dan kirimkan ke view
        echo json_encode($data);
    }
     public function mon_pencarianp()
    {
        // Ambil data dari request POST
        $nama = $this->input->post('nama');

        $data['ppk'] = $this; // Jika diperlukan di dalam view

        // Tentukan kondisi 
        $where = array(
                'tmst_mahasiswa.NIM' => $nama,
            );

        // Ambil data dari model
        $data['results'] = $this->m_portal->get_data_mhs_detail($where);

        // Load the view with the data, returning the HTML string (no headers or footers)
        $this->load->view('ppk/mon_pencarianp', $data);
    }
	// monitoring prada
	public function mon_prada()
	{
		# code...
    // Call your model method to get the data with pagination
    $data['items'] = $this->m_portal->get_data_formon_mhsall($per_page, $offset);

    $data['program_studi_options'] = array('92403', '92402'); // Add other program options if needed

    $this->load->view('ppk/header');
    $this->load->view('ppk/mon_prada', $data);
    $this->load->view('ppk/footer');
    $this->load->view('ppk/mon_prada_js');
	}

	public function mon_pradadata()
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
    $this->load->view('ppk/mon_pradadata', $data);
	}

	public function mon_pradaadd($id)
	{
		# code...
		// Ambil data berdasarkan ID dari model Anda
        $data = $this->m_portal->get_data_formon_mhs($id); // Gantilah 'get_data_by_id' dengan metode yang sesuai dalam model Anda

        // Konversi data ke format JSON dan kirimkan ke view
        echo json_encode($data);
	}
	public function mon_pradaaddp()
	{
    // Tangani data yang dikirimkan dari formulir
    $data = array(
        'nim' => $this->input->post('nim'),
        'status_prada' => $this->input->post('statprada')
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

	public function mon_pradaedit($id)
	{
		# code...
		// Ambil data berdasarkan ID dari model Anda
        $data = $this->m_portal->get_data_formon_mhs($id); // Gantilah 'get_data_by_id' dengan metode yang sesuai dalam model Anda

        // Konversi data ke format JSON dan kirimkan ke view
        echo json_encode($data);
	}

	public function mon_pradaeditp()
	{
    // Tangani data yang dikirimkan dari formulir
	$where = array(
        'id_mon' => $this->input->post('id_mon'),
    ); 
    $data = array(
        'status_prada' => $this->input->post('estatprada')
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
	////////////////// end prada
	// monitoring lulus D3
	public function mon_llsd3()
	{
		# code...
    // Call your model method to get the data with pagination
    $data['items'] = $this->m_portal->get_data_formon_mhsall_d3($per_page, $offset);

    $data['program_studi_options'] = array('92403', '92402'); // Add other program options if needed

    $this->load->view('ppk/header');
    $this->load->view('ppk/mon_llsd3', $data);
    $this->load->view('ppk/footer');
    $this->load->view('ppk/mon_llsd3_js');
	}

	public function mon_llsd3data()
	{
		# code...
	$year = $this->input->get('year'); // Ambil tahun dari input form
    $program_studi = $this->input->get('program_studi'); // Ambil program studi dari input form

    // Buat array untuk filter program studi
    $program_studi_options = array('92403', '92402'); // Tambahkan program studi lain jika ada

    if (!$year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsall_d3();
    } elseif ($year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyear_d3($year);
    } elseif (!$year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsprodi_d3($program_studi);
    } elseif ($year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyearnprodi_d3($year, $program_studi);
    }

    $data['program_studi_options'] = $program_studi_options; // Pass program studi options to view
    $this->load->view('ppk/mon_llsd3data', $data);
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
        'd3_tanggal_lulus' => $this->input->post('etgllls'),
        'status_d3' => $this->input->post('estatd3'),
        'ket_d3' => $this->input->post('ket_d3')
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
	////////////////// end lulus D3
	// monitoring lulus Pra

	public function mon_llspra()
	{
		# code...
    // Call your model method to get the data with pagination
    $data['items'] = $this->m_portal->get_data_formon_mhsall_pra($per_page, $offset);

    $data['program_studi_options'] = array('92403', '92402'); // Add other program options if needed

    $this->load->view('ppk/header');
    $this->load->view('ppk/mon_llspra', $data);
    $this->load->view('ppk/footer');
    $this->load->view('ppk/mon_llspra_js');
	}

	public function mon_llspradata()
	{
		# code...
	$year = $this->input->get('year'); // Ambil tahun dari input form
    $program_studi = $this->input->get('program_studi'); // Ambil program studi dari input form

    // Buat array untuk filter program studi
    $program_studi_options = array('92403', '92402'); // Tambahkan program studi lain jika ada

    if (!$year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsall_pra();
    } elseif ($year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyear_pra($year);
    } elseif (!$year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsprodi_pra($program_studi);
    } elseif ($year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyearnprodi_pra($year, $program_studi);
    }

    $data['program_studi_options'] = $program_studi_options; // Pass program studi options to view
    $this->load->view('ppk/mon_llspradata', $data);
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
        'pra_status' => $this->input->post('estatpra'),
        'status_sb' => $this->input->post('esb'),
        'ket_pra' => $this->input->post('ket_pra')
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
	////////////// monitoring onboard

	public function mon_onboard()
	{
		# code...
    // Call your model method to get the data with pagination
    $data['items'] = $this->m_portal->get_data_formon_mhsall_ob($per_page, $offset);

    $data['program_studi_options'] = array('92403', '92402'); // Add other program options if needed

    $this->load->view('ppk/header');
    $this->load->view('ppk/mon_onboard', $data);
    $this->load->view('ppk/footer');
    $this->load->view('ppk/mon_onboard_js');
	}

	public function mon_onboarddata()
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
    $this->load->view('ppk/mon_onboarddata', $data);
	}
	public function mon_onboardedit($id)
	{
		# code...
		// Ambil data berdasarkan ID dari model Anda
        $data = $this->m_portal->get_data_formon_mhs($id); // Gantilah 'get_data_by_id' dengan metode yang sesuai dalam model Anda

        // Konversi data ke format JSON dan kirimkan ke view
        echo json_encode($data);
	}

	public function mon_onboardeditp()
	{
       /// cek file
    $cekfile = $this->input->post('eufsignon_existing');
    if ($cekfile > 0) {
    	# code...
    	 // Tangani data yang dikirimkan dari formulir
			$where = array(
		        'id_mon' => $this->input->post('nid_mon'),
		    );
			$nim = $this->input->post('nim');
			$status_onboard = $this->input->post('estatonboard');
			$nama_perusahaan = $this->input->post('editnamaperusahaan');
			$nama_kapal = $this->input->post('editnamakapal');
			$tgl_signon = $this->input->post('etglsignon');
			$ket_onboard = $this->input->post('ket_onboard');

		    $tgl_signonf = date('Y-m-d', strtotime($tgl_signon)); // Ubah format tanggal
    	// Simpan data ke database (contoh)
            $data = array(
                'status_onboard' => $status_onboard,
                'nama_kapal' => $nama_kapal,
                'tgl_sign_on' => $tgl_signonf,
                'ket_onboard' => $ket_onboard,
                'status_sb' => 'iya'
            );
            $proses_edt = $this->m_portal->update_data($where,$data,'tbl_mon');
        if($proses_edt){    
            echo 'sukses edit';
        } else {
            echo 'Gagal edit.';
        }

    }else{
    
    	 // Tangani data yang dikirimkan dari formulir
		$where = array(
	        'id_mon' => $this->input->post('nid_mon'),
	    );
		$nim = $this->input->post('nim');
		$status_onboard = $this->input->post('estatonboard');
		$nama_perusahaan = $this->input->post('editnamaperusahaan');
		$nama_kapal = $this->input->post('editnamakapal');
		$tgl_signon = $this->input->post('etglsignon');
		$ket_onboard = $this->input->post('ket_onboard');

	    $tgl_signonf = date('Y-m-d', strtotime($tgl_signon)); // Ubah format tanggal
    // Tangani unggahan file
        $config['upload_path'] = './assets/monitoring/onboard';
        $config['max_size'] = 1048;
        $config['allowed_types'] = 'pdf'; // Sesuaikan dengan jenis file yang diizinkan
        $config['file_name'] = $nim.'_signon'; // Nama file yang diunggah sesuai NIM
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('eufsignon')) {
            // Jika unggahan berhasil
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            // Simpan data ke database (contoh)
            $data = array(
                'status_oboard' => $status_onboard,
                'nama_kapal' => $nama_kapal,
                'tgl_sign_on' => $tgl_signonf,
                'ket_onboard' => $ket_onboard,
                'upload_file_signon' => $file_name,
                'status_sb' => 'iya'
            );
            $this->m_portal->update_data($where,$data,'tbl_mon');

            echo 'sukses';
        } else {
            echo 'Gagal mengunggah file.';
        }

        ///else eufsignon_existing == 0
       }
    
	}
	//////////////////// monitoring laporan onboard
		public function mon_laponboard()
	{
		# code...
    // Call your model method to get the data with pagination
    $data['items'] = $this->m_portal->get_data_formon_mhsall_ob($per_page, $offset);

    $data['program_studi_options'] = array('92403', '92402'); // Add other program options if needed

    $this->load->view('ppk/header');
    $this->load->view('ppk/mon_laponboard', $data);
    $this->load->view('ppk/footer');
    $this->load->view('ppk/mon_laponboard_js');
	}

	public function mon_laponboarddata()
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
    $this->load->view('ppk/mon_laponboarddata', $data);
	}

	public function mon_laponboardcek() {
    $id_mon = $this->input->post('id_mon');
    $data = $this->m_portal->get_data_mhs_detail($id_mon);

    if(!empty($data)) {
        $output = '<table class="table">';
        $output .= '<thead><tr><th>Bulan Laporan</th><th>Tanggal Upload</th><th>Lihat File</th></tr></thead>';
        $output .= '<tbody>';

        // Looping melalui setiap baris data
        foreach ($data as $row) {
            // Looping melalui 12 bulan laporan
            for ($i = 1; $i <= 12; $i++) {
                $date_field = 'date_lapon' . $i;
                $file_field = 'lap_onboard' . $i;

                $output .= '<tr>';
                $output .= '<td>Bulan Ke-' . $i . '</td>';
                $output .= '<td>' . $row->$date_field . '</td>';

                if ($row->$file_field) {
                    $output .= '<td><button class="btn btn-info view-file-button" data-filename' . $i . '="' . $row->$file_field . '.pdf">Lihat</button></td>';
                } else {
                    $output .= '<td>File tidak tersedia</td>';
                }

                $output .= '</tr>';
            }
        }

        $output .= '</tbody>';
        $output .= '</table>';
    } else {
        $output = 'No data found';
    }

    echo $output;
}


	////////////// monitoring offboard

	public function mon_offboard()
	{
		# code...
    // Call your model method to get the data with pagination
    $data['items'] = $this->m_portal->get_data_formon_mhsall_ob($per_page, $offset);

    $data['program_studi_options'] = array('92403', '92402'); // Add other program options if needed

    $this->load->view('ppk/header');
    $this->load->view('ppk/mon_offboard', $data);
    $this->load->view('ppk/footer');
    $this->load->view('ppk/mon_offboard_js');
	}

	public function mon_offboarddata()
	{
		# code...
	$year = $this->input->get('year'); // Ambil tahun dari input form
    $program_studi = $this->input->get('program_studi'); // Ambil program studi dari input form

    // Buat array untuk filter program studi
    $program_studi_options = array('92403', '92402'); // Tambahkan program studi lain jika ada

    if (!$year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsall_ob();
    } elseif ($year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyear_ob($year);
    } elseif (!$year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsprodi_ob($program_studi);
    } elseif ($year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyearnprodi_ob($year, $program_studi);
    }

    $data['program_studi_options'] = $program_studi_options; // Pass program studi options to view
    $this->load->view('ppk/mon_offboarddata', $data);
	}
	public function mon_offboardedit($id)
	{
		# code...
		// Ambil data berdasarkan ID dari model Anda
        $data = $this->m_portal->get_data_formon_mhs($id); // Gantilah 'get_data_by_id' dengan metode yang sesuai dalam model Anda

        // Konversi data ke format JSON dan kirimkan ke view
        echo json_encode($data);
	}

	public function mon_offboardeditp()
	{
		   /// cek file
    $cekfile = $this->input->post('eufsignoff_existing');
    if ($cekfile > 0) {

    	// Tangani data yang dikirimkan dari formulir
			$where = array(
		        'id_mon' => $this->input->post('nid_mon'),
		    );
			$nim = $this->input->post('nim');
			$status_offboard = $this->input->post('estatoffboard');
			$tgl_signoff = $this->input->post('etglsignoff');
			$ket_offboard = $this->input->post('ket_offboard');

		    $tgl_signofff = date('Y-m-d', strtotime($tgl_signoff)); // Ubah format tanggal

    	 // Simpan data ke database (contoh)
            $data = array(
                'status_offboard' => $status_offboard,
                'tgl_sign_off' => $tgl_signoff,
                'ket_offboard' => $ket_offboard
            );
          $proses_edt = $this->m_portal->update_data($where,$data,'tbl_mon');

        if($proses_edt){ 
            echo 'sukses edit';
        } else {
            echo 'Gagal edit.';
        }
    }else{
		    	 // Tangani data yang dikirimkan dari formulir
			$where = array(
		        'id_mon' => $this->input->post('nid_mon'),
		    );
			$nim = $this->input->post('nim');
			$status_offboard = $this->input->post('estatoffboard');
			$tgl_signoff = $this->input->post('etglsignoff');
			$ket_offboard = $this->input->post('ket_offboard');

		    $tgl_signofff = date('Y-m-d', strtotime($tgl_signoff)); // Ubah format tanggal
		    

		    // Tangani unggahan file
		        $config['upload_path'] = './assets/monitoring/offboard';
		        $config['max_size'] = 1048;
		        $config['allowed_types'] = 'pdf'; // Sesuaikan dengan jenis file yang diizinkan
		        $config['file_name'] = $nim.'_signoff'; // Nama file yang diunggah sesuai NIM
		        $this->load->library('upload', $config);

		        if ($this->upload->do_upload('eufsignoff')) {
		            // Jika unggahan berhasil
		            $upload_data = $this->upload->data();
		            $file_name = $upload_data['file_name'];

		            // Simpan data ke database (contoh)
		            $data = array(
		                'status_offboard' => $status_offboard,
		                'tgl_sign_off' => $tgl_signoff,
		                'ket_offboard' => $ket_offboard,
		                'upload_file_signoff' => $file_name
		            );
		            $this->m_portal->update_data($where,$data,'tbl_mon');

		            echo 'sukses';
		        } else {
		            echo 'Gagal mengunggah file.';
		        }

   		 }/// end of cek file
  
	}
	////// monitoring stanby prala
	public function mon_sbprala()
	{
		# code...
    // Call your model method to get the data with pagination
    $data['items'] = $this->m_portal->get_data_formon_mhsall_sb($per_page, $offset);

    $data['program_studi_options'] = array('92403', '92402'); // Add other program options if needed

    $this->load->view('ppk/header');
    $this->load->view('ppk/mon_sbprala', $data);
    $this->load->view('ppk/footer');
    $this->load->view('ppk/mon_sbprala_js');
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
    $this->load->view('ppk/mon_sbpraladata', $data);
	}



	/////////////// monitoring summary
	public function mon_summary()
	{
		# code...
		$this->load->view('ppk/header');
	    $this->load->view('ppk/mon_summary');
	    $this->load->view('ppk/footer');
	    $this->load->view('ppk/mon_summary_js');
	}
	public function mon_summarydata($programStudi, $tahunMasuk)
	{
		# code...
		$data['countTaruna'] = $this->m_portal->countTaruna($programStudi, $tahunMasuk);
		$data['lulusUKPPraCount'] = $this->m_portal->countLulusUKPPra($programStudi, $tahunMasuk);
		$data['standByPralaCount'] = $this->m_portal->countStandByPrala($programStudi, $tahunMasuk);
		$data['onBoardCount'] = $this->m_portal->countOnBoard($programStudi, $tahunMasuk);
		$data['offBoardCount'] = $this->m_portal->countOffBoard($programStudi, $tahunMasuk);
		$data['lulusUKPPascaCount'] = $this->m_portal->countLulusUKPPasca($programStudi, $tahunMasuk);
		$data['totalD3Count'] = $this->m_portal->countTotalD3($programStudi, $tahunMasuk);

		 echo json_encode($data);
	}

	// monitoring modeling
	public function mon_modeling()
	{
		# code...
    // Call your model method to get the data with pagination
    $data['items'] = $this->m_portal->get_data_formon_mhsall_off($per_page, $offset);

    $data['program_studi_options'] = array('92403', '92402'); // Add other program options if needed

    $this->load->view('ppk/header');
    $this->load->view('ppk/mon_modeling', $data);
    $this->load->view('ppk/footer');
    $this->load->view('ppk/mon_modeling_js');
	}

	public function mon_modelingdata()
	{
		# code...
	$year = $this->input->get('year'); // Ambil tahun dari input form
    $program_studi = $this->input->get('program_studi'); // Ambil program studi dari input form

    // Buat array untuk filter program studi
    $program_studi_options = array('92403', '92402'); // Tambahkan program studi lain jika ada

    if (!$year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsall_off();
    } elseif ($year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyear_off($year);
    } elseif (!$year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsprodi_off($program_studi);
    } elseif ($year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyearnprodi_off($year, $program_studi);
    }

    $data['program_studi_options'] = $program_studi_options; // Pass program studi options to view
    $this->load->view('ppk/mon_modelingdata', $data);
	}

	public function mon_modelingedit($id)
	{
		# code...
		// Ambil data berdasarkan ID dari model Anda
        $data = $this->m_portal->get_data_formon_mhs($id); // Gantilah 'get_data_by_id' dengan metode yang sesuai dalam model Anda

        // Konversi data ke format JSON dan kirimkan ke view
        echo json_encode($data);
	}

	public function mon_modelingeditp()
	{
    // Tangani data yang dikirimkan dari formulir
	$where = array(
        'id_mon' => $this->input->post('id_mon'),
    ); 
    $data = array(
        'status_modeling' => $this->input->post('estatmodeling'),
        'ket_modeling' => $this->input->post('ket_modeling')
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
	////////////////// end modeling

	////////////// monitoring trb

	public function mon_trb()
	{
		# code...
    // Call your model method to get the data with pagination
    $data['items'] = $this->m_portal->get_data_formon_mhsall_mod($per_page, $offset);

    $data['program_studi_options'] = array('92403', '92402'); // Add other program options if needed

    $this->load->view('ppk/header');
    $this->load->view('ppk/mon_trb', $data);
    $this->load->view('ppk/footer');
    $this->load->view('ppk/mon_trb_js');
	}

	public function mon_trbdata()
	{
		# code...
	$year = $this->input->get('year'); // Ambil tahun dari input form
    $program_studi = $this->input->get('program_studi'); // Ambil program studi dari input form

    // Buat array untuk filter program studi
    $program_studi_options = array('92403', '92402'); // Tambahkan program studi lain jika ada

    if (!$year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsall_mod();
    } elseif ($year && !$program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyear_mod($year);
    } elseif (!$year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsprodi_mod($program_studi);
    } elseif ($year && $program_studi) {
        $data['items'] = $this->m_portal->get_data_formon_mhsyearnprodi_mod($year, $program_studi);
    }

    $data['program_studi_options'] = $program_studi_options; // Pass program studi options to view
    $this->load->view('ppk/mon_trbdata', $data);
	}
	public function mon_trbedit($id)
	{
		# code...
		// Ambil data berdasarkan ID dari model Anda
        $data = $this->m_portal->get_data_formon_mhs($id); // Gantilah 'get_data_by_id' dengan metode yang sesuai dalam model Anda

        // Konversi data ke format JSON dan kirimkan ke view
        echo json_encode($data);
	}

	public function mon_trbeditp()
	{
		   /// cek file
    $cekfile = $this->input->post('euftrb_existing');
    if ($cekfile > 0) {

    	// Tangani data yang dikirimkan dari formulir
			$where = array(
		        'id_mon' => $this->input->post('nid_mon'),
		    );
			$nim = $this->input->post('nim');
			$status_trb = $this->input->post('estattrb');
			$ket_trb = $this->input->post('ket_trb');
			
    	 // Simpan data ke database (contoh)
            $data = array(
                'status_trb' => $status_trb,
                'ket_trb' => $ket_trb
            );
          $proses_edt = $this->m_portal->update_data($where,$data,'tbl_mon');

        if($proses_edt){ 
            echo 'sukses edit';
        } else {
            echo 'Gagal edit.';
        }
    }else{
		    	 // Tangani data yang dikirimkan dari formulir
			$where = array(
		        'id_mon' => $this->input->post('nid_mon'),
		    );
			$nim = $this->input->post('nim');
			$status_trb = $this->input->post('estattrb');
			$ket_trb = $this->input->post('ket_trb');		    

		    // Tangani unggahan file
		        $config['upload_path'] = './assets/monitoring/trb';
		        $config['max_size'] = 1048;
		        $config['allowed_types'] = 'pdf'; // Sesuaikan dengan jenis file yang diizinkan
		        $config['file_name'] = $nim.'_trb'; // Nama file yang diunggah sesuai NIM
		        $this->load->library('upload', $config);

		        if ($this->upload->do_upload('euftrb')) {
		            // Jika unggahan berhasil
		            $upload_data = $this->upload->data();
		            $file_name = $upload_data['file_name'];

		            // Simpan data ke database (contoh)
		            $data = array(
		                'status_trb' => $status_trb,
		                'ket_trb' => $ket_trb,
		                'upload_file_trb' => $file_name
		            );
		            $this->m_portal->update_data($where,$data,'tbl_mon');

		            echo 'sukses';
		        } else {
		            echo 'Gagal mengunggah file.';
		        }

   		 }/// end of cek file
  
	}////end of trb




}

/* End of file ppk.php */
/* Location: ./application/controllers/ppk.php */