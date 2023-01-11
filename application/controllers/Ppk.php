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
		$data['catar'] = $this->m_portal->get_data_join_tpkl_all()->result(); 
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

}

/* End of file ppk.php */
/* Location: ./application/controllers/ppk.php */