<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahatar extends CI_Controller {

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
		$this->load->view('mahatar/header');
		$this->load->view('mahatar/index');
		$this->load->view('mahatar/footer');
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
		$data['catar'] = $this->m_portal->get_data_all('tbl_kliring_ujianktsk')->result(); 
		if ($data['catar'] == null) {
			# code...
		}else{
		$data['mahatar'] = $this; 
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

		$this->load->view('mahatar/header');
		$this->load->view('mahatar/ajuan',$data);
		$this->load->view('mahatar/footer');
	}
	public function ajuan_kuas()
	{
		ini_set('max_execution_time', -1); 
		$this->load->library('datatables');

		$mportal = $this->m_portal;

		$ta = '20211';
		$ajuan = $this->datatables->new2();
		// $ajuan->searchable(['tmst_mahasiswa.nama_mahasiswa', 'tmst_mahasiswa.kode_jenjang_pendidikan', 'tmst_program_studi.nama_program_studi', 'tbl_kliring_uas.nim']);
		$ajuan->select('tmst_mahasiswa.nama_mahasiswa,
						tmst_mahasiswa.kode_jenjang_pendidikan,
						tmst_program_studi.nama_program_studi,
						tbl_kliring_uas.id_kuas,
						tbl_kliring_uas.nim,
						tbl_kliring_uas_mahatar.id_uas_m,
						tbl_kliring_uas_mahatar.hasil'
					  )
					// ->from('tbl_kliring_uas')
					// ->join('tbl_kliring_uas_mahatar', 'tbl_kliring_uas_mahatar.id_kuas=tbl_kliring_uas.id_kuas')
					// ->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim', 'left')
					// ->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi')

					->from('tbl_kliring_uas')
					->join('tbl_kliring_uas_mahatar', 'tbl_kliring_uas_mahatar.id_kuas=tbl_kliring_uas.id_kuas','left')
					->join('tmst_mahasiswa', 'tmst_mahasiswa.nim=tbl_kliring_uas.nim')
					->join('tmst_program_studi', 'tmst_program_studi.kode_program_studi=tmst_mahasiswa.kode_program_studi', 'left')
					->where('tbl_kliring_uas.ta', $ta)
					// ->where('tmst_mahasiswa.tanggal_lulus IS NULL', null, false)
					->where('tmst_mahasiswa.tahun_masuk >=', '2019')
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
			->column('Mahatar', 'hasil', function($data, $row){

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

				$tombol2 .= '<a class="btn btn-warning btn-sm" href="'.base_url().'mahatar/kliring_uas/'.$data.'"><span class="glyphicon glyphicon-pencil"></span> Kliring</a>';

					// Bay bay, variabel ngisor iki podo njipuk seko hasil?
					// Dibalas yaaa...
					// wkwkkw jadi tombol edit muncul nek tbl tbl_kliring_uas_mahatar wes ono isi ne nang
					// baiq

                $m = $mportal->get_data(['id_kuas' => $data],'tbl_kliring_uas_mahatar')->row();

                if ($m > "0"){
                $tombol2 .= '<a class="btn btn-warning btn-sm" href="'.base_url().'mahatar/ekliring_uas/'.$data.'"><span class="glyphicon glyphicon-pencil"></span> Edit</a>';
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

		$this->load->view('mahatar/header');
		$this->load->view('mahatar/ajuan_kuas',$data);
		$this->load->view('mahatar/footer', $data_foot);
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
		$data['mahatar'] = $this; 
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

		$this->load->view('mahatar/header');
		$this->load->view('mahatar/ajuan_kuas',$data);
		$this->load->view('mahatar/footer');
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
		$this->load->view('mahatar/header');
		$this->load->view('mahatar/kliring',$data);
		$this->load->view('mahatar/footer');
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
		$this->load->view('mahatar/header');
		$this->load->view('mahatar/kliring_uas',$data);
		$this->load->view('mahatar/footer');
	}
	public function ekliring($id)
	{
		# code...
		$where = array(
			'id_uks' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_mahatar')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('mahatar/header');
		$this->load->view('mahatar/ekliring',$data);
		$this->load->view('mahatar/footer');
	}
	public function ekliring_uas($id)
	{
		# code...
		$where = array(
			'id_kuas' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_uas_mahatar')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('mahatar/header');
		$this->load->view('mahatar/ekliring_uas',$data);
		$this->load->view('mahatar/footer');
	}
	public function kliringp()
	{
		# code...
		$this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_uks');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_uks'  	=> $this->input->post('id_uks'),
			'nim'  	=> $this->input->post('nim'),
			'kerapian'  => $this->input->post('kerapian'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_ujianktsk_mahatar');
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
			$this->load->view('mahatar/header');
			$this->load->view('mahatar/kliring',$datax);
			$this->load->view('mahatar/footer');
		}else{
		$this->load->view('mahatar/header');
		$this->load->view('mahatar/kliring');
		$this->load->view('mahatar/footer');
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
			$res = $this->m_portal->input_data($data,'tbl_kliring_uas_mahatar');
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
			$this->load->view('mahatar/header');
			$this->load->view('mahatar/kliring_uas',$datax);
			$this->load->view('mahatar/footer');
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
		$this->load->view('mahatar/header');
		$this->load->view('mahatar/kliring_uas', $datax);
		$this->load->view('mahatar/footer');
		}
	}
	public function ekliringp()
	{
		# code...
		$this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_uks');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_uks_m'  	=> $this->input->post('id_uks_m'),
			);
			$data = array(
			'id_uks'  	=> $this->input->post('id_uks'),
			'nim'  	=> $this->input->post('nim'),
			'kerapian'  => $this->input->post('kerapian'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_ujianktsk_mahatar');
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
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_mahatar')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('mahatar/header');
			$this->load->view('mahatar/ekliring',$datax);
			$this->load->view('mahatar/footer');
		}else{
						$where = array(
			'id_uks' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_mahatar')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 

		$this->load->view('mahatar/header');
		$this->load->view('mahatar/ekliring');
		$this->load->view('mahatar/footer');
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
				'id_uas_m'  	=> $this->input->post('id_uas_m'),
			);
			$data = array(
			'id_kuas'  	=> $this->input->post('id_kuas'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_uas_mahatar');
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
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_uas_mahatar')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('mahatar/header');
			$this->load->view('mahatar/ekliring_uas',$datax);
			$this->load->view('mahatar/footer');
		}else{
			$where = array(
			'id_kuas' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_uas_mahatar')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
			foreach ($datax['catarz'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
		$this->load->view('mahatar/header');
		$this->load->view('mahatar/ekliring_uas');
		$this->load->view('mahatar/footer');
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
		$this->load->view('mahatar/header');
		$this->load->view('mahatar/search_uas_nim');
		$this->load->view('mahatar/footer');
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
		$this->load->view('mahatar/header');
		$this->load->view('mahatar/search_uas_nim');
		$this->load->view('mahatar/search_uas_nimp',$data);
		$this->load->view('mahatar/footer');
	}
	///////////////////////////////////////prada/////////////////////////////////////////////////////
	public function ajuan_prada()
	{
		$data['catar'] = $this->m_portal->get_data_all('tbl_kliring_prada')->result(); 
		if ($data['catar'] == null) {
			# code...
		}else{
		$data['mahatar'] = $this; 
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

		$this->load->view('mahatar/header');
		$this->load->view('mahatar/ajuan_prada',$data);
		$this->load->view('mahatar/footer');
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
		$this->load->view('mahatar/header');
		$this->load->view('mahatar/kliring_prada',$data);
		$this->load->view('mahatar/footer');
	}
	public function kliringp_prada()
	{
		# code...
		$this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_kp');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_kp'  	=> $this->input->post('id_kp'),
			'nim'  	=> $this->input->post('nim'),
			'kerapian'  => $this->input->post('kerapian'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_prada_mahatar');
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
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_Prada')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('mahatar/header');
			$this->load->view('mahatar/kliring_prada',$datax);
			$this->load->view('mahatar/footer');
		}else{
		$this->load->view('mahatar/header');
		$this->load->view('mahatar/kliring_prada');
		$this->load->view('mahatar/footer');
		}
	}
	public function ekliring_prada($id)
	{
		# code...
		$where = array(
			'id_kp' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_prada_mahatar')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_prada')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('mahatar/header');
		$this->load->view('mahatar/ekliring_prada',$data);
		$this->load->view('mahatar/footer');
	}
	public function ekliringp_prada()
	{
		# code...
		$this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_kp');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_kp_m'  	=> $this->input->post('id_kp_m'),
			);
			$data = array(
			'id_kp'  	=> $this->input->post('id_kp'),
			'nim'  	=> $this->input->post('nim'),
			'kerapian'  => $this->input->post('kerapian'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_prada_mahatar');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Edit Proses kliring Prada anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Edit Kliring Prada berhasil diproses</b>");  
			 }

			 //after input
			$where = array(
			'id_kp' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_prada_mahatar')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_prada')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('mahatar/header');
			$this->load->view('mahatar/ekliring_prada',$datax);
			$this->load->view('mahatar/footer');
		}else{
						$where = array(
			'id_kp' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_prada_mahatar')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_uprada')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 

		$this->load->view('mahatar/header');
		$this->load->view('mahatar/ekliring_prada');
		$this->load->view('mahatar/footer');
		}
	}
	
		///////////////////////////////////////pkl/////////////////////////////////////////////////////
	public function ajuan_pkl()
	{
		$data['catar'] = $this->m_portal->get_data_all('tbl_kliring_pkl')->result(); 
		if ($data['catar'] == null) {
			# code...
		}else{
		$data['mahatar'] = $this; 
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

		$this->load->view('mahatar/header');
		$this->load->view('mahatar/ajuan_pkl',$data);
		$this->load->view('mahatar/footer');
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
		$this->load->view('mahatar/header');
		$this->load->view('mahatar/kliring_pkl',$data);
		$this->load->view('mahatar/footer');
	}
	public function kliringp_pkl()
	{
		# code...
		$this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_pkl');
		if ($this->form_validation->run() != false) {
			$data = array(
			'id_pkl'  	=> $this->input->post('id_pkl'),
			'nim'  	=> $this->input->post('nim'),
			'kerapian'  => $this->input->post('kerapian'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->input_data($data,'tbl_kliring_pkl_mahatar');
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
			$this->load->view('mahatar/header');
			$this->load->view('mahatar/kliring_pkl',$datax);
			$this->load->view('mahatar/footer');
		}else{
		$this->load->view('mahatar/header');
		$this->load->view('mahatar/kliring_pkl');
		$this->load->view('mahatar/footer');
		}
	}
	public function ekliring_pkl($id)
	{
		# code...
		$where = array(
			'id_pkl' => $id,			       
        );
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_pkl_mahatar')->result();
		$data['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_pkl')->result();
		foreach ($data['catarz'] as $row)
		{
        $nim = $row->nim;
		}
		$data['nama'] = $this->getNama($nim);
		$this->load->view('mahatar/header');
		$this->load->view('mahatar/ekliring_pkl',$data);
		$this->load->view('mahatar/footer');
	}
	public function ekliringp_pkl()
	{
		# code...
		$this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$this->form_validation->set_rules('hasil', 'hasil', 'required');
		$this->form_validation->set_rules('keterangan', 'keteranan', 'required');
		$id = $this->input->post('id_pkl');
		if ($this->form_validation->run() != false) {
			$where = array(
				'id_pkl_m'  	=> $this->input->post('id_pkl_m'),
			);
			$data = array(
			'id_pkl'  	=> $this->input->post('id_pkl'),
			'nim'  	=> $this->input->post('nim'),
			'kerapian'  => $this->input->post('kerapian'),
			'hasil'     	=> $this->input->post('hasil'),
			'keterangan'   => $this->input->post('keterangan'),
		   );
			$res = $this->m_portal->update_data($where,$data,'tbl_kliring_pkl_mahatar');
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
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_pkl_mahatar')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_pkl')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 
			$this->load->view('mahatar/header');
			$this->load->view('mahatar/ekliring_pkl',$datax);
			$this->load->view('mahatar/footer');
		}else{
						$where = array(
			'id_pkl' => $id,			       
	        );
			$datax['catar'] = $this->m_portal->get_data($where,'tbl_kliring_pkl_mahatar')->result();
			$datax['catarz'] = $this->m_portal->get_data($where,'tbl_kliring_pkl')->result();
			foreach ($datax['catar'] as $row)
			{
	        $nim = $row->nim;
			}
			$datax['nama'] = $this->getNama($nim); 

		$this->load->view('mahatar/header');
		$this->load->view('mahatar/ekliring_pkl');
		$this->load->view('mahatar/footer');
		}
	}

}

/* End of file mahatar.php */
/* Location: ./application/controllers/mahatar.php */