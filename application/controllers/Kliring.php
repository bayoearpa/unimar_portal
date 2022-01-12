<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kliring extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_portal');
		$this->load->library('form_validation');
		$this->load->library('m_pdf');
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->helper('judul_seo');
	}

	public function index()
	{
		$this->load->view('fpuas_home');
		$this->load->view('fpuktsk_footer');
	}
	public function tanggal($tanggal)
	{
		# code...
		$bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
        );
        
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
         
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    
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
	public function getProdi($nim)
	{
		# code...
		//get nama
		$where = array(
			'Kode_program_studi' => $nim,			       
        );
		$getNim = $this->m_portal->get_data($where,'tmst_program_studi')->result();
		foreach ($getNim as $n) {
			# code...
			//$data['nama'] = $n->Nama_mahasiswa ;
			return $n->Nama_program_studi;
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
	public function get_statsperiode($nim)
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
			$prodi = $n->Kode_program_studi;
		}
		$datenow = date("Y-m-d");
		$where2 = array(
			'tbl_kliring_uas_periode.tgl_mulai  <='		=>  $datenow,
			'tbl_kliring_uas_periode.tgl_berakhir >=' 	=>  $datenow,
			'tmst_mahasiswa.NIM' 						=> 	$nim,
			'tbl_kliring_uas_periode.Kode_program_studi'=>  $prodi
		);
		$queryget = $this->m_portal->cek_data_periode($where2);
		echo $queryget;
			
		
		// return $queryget;

	}
	public function fpuas()
	{
		# code...
		$ta = $this->getTa();
		$data['ta'] = $ta;
		$this->load->view('fpuas',$data);
	}
	public function fpuasp()
	{
		
		$this->form_validation->set_rules('nim', 'isi dengan NRP/NIM *', 'required');
		$this->form_validation->set_rules('semester', 'Isi dengan semester *', 'required');
		$this->form_validation->set_rules('kelas', 'isi Kelas anda *', 'required');

        $ta = $this->getTa();
		$data['ta'] = $ta;
		////////////////////////////// cek data ///////////////////////////////////////////
		$nim =  $this->input->post('nim');
		$ta_form  =  $this->input->post('ta');
		$where2 = array(
			'nim' => $nim,
			'ta' => $ta_form		
		);
		$d = $this->m_portal->get_data($where2,'tbl_kliring_uas')->row();
		if ($d > "0") {
			# code...
			$this->session->set_flashdata('error', "<b>Error, Proses pengajuan anda gagal karena data anda telah ada di database</b>");
			
			$this->load->view('fpuas_home');
		}else{
		//////////////////////////// cek periode daftar //////////////////////////////////////////
			$get_cek_periode = $this->get_statsperiode($nim);
			//$data['lihatstatsperiode'] = $get_cek_periode;
			if ($get_cek_periode == "0") {
				# code...
			$this->session->set_flashdata('error', "<b>Error, Proses pengajuan anda gagal karena bukan jadwal anda untuk mengajukan kliring</b>");
			$this->load->view('fpuas_home');
			}else{
		////////////////////////// proses insert /////////////////////////////////////////
		if ($this->form_validation->run() != false) {
			$data = array(
			'nim'     	=> $nim,
			'smt_now'  	=> $this->input->post('semester'),
			'ta'   		=> $ta_form,			
			'kelas' 	=> $this->input->post('kelas'),
			'jenis_uas' 	=> $this->input->post('jenis_uas'),
		   );

		  $res = $this->m_portal->input_data($data,'tbl_kliring_uas');
		  if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses pengajuan anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Pengajuan Anda telah terdaftar silakan cek status anda di menu cek status pengajuan</b>");  
			 }
		//after input
	  	$this->load->view('fpuas_home');
		}else{
			$this->load->view('fpuas_home');
		}
		///////////////////// akhir else periode daftar ////////////////////////////////////////
		}
		/////////////////////akhir else cek data////////////////////////////////////////////////
		}
		///////////////////////////////////////// akhir proses input ////////////////////////////
	}
	public function fpuaskn()
	{
		# code...
		$nama = $this->input->post('nama');
		$ta = $this->getTa();
		//get nama
		$data['nama'] = $this->getNama($nama);
		$where = array(
			'nim' => $nama,
			'ta' => $ta
        );
        $data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_uas')->result();
        // $data['catar'] = $this->m_portal->get_data_join_where($where)->result();

        if ($data['catar'] == null) {
        	# code...
        }else{
        foreach ($data['catar'] as $p) {
			# code...
			//$data['nama'] = $n->Nama_mahasiswa ;
			$id_kuas=$p->id_kuas;
			// $jenjang=$p->jenjang;
			// $kode_jenjang = $p->Kode_jenjang_pendidikan;
		}
        // $data['welcome'] = $this;
		// if ($jenjang == 1) {
		// 	# code...
		// }

        $data['mahatar_label'] = $this->cekstatus_fpuas($id_kuas,'tbl_kliring_uas_mahatar'); 
        $data['prodi_label'] = $this->cekstatus_fpuas($id_kuas,'tbl_kliring_uas_prodi'); 
        // $data['baak_label'] = $this->cekstatus_fpuas($id_kuas,'tbl_kliring_uas_baak'); 
        $data['bk_label'] = $this->cekstatus_fpuas($id_kuas,'tbl_kliring_uas_bk'); 

        $data['mahatar_ket'] = $this->get_keterangan($id_kuas,'tbl_kliring_uas_mahatar');
        $data['prodi_ket'] = $this->get_keterangan($id_kuas,'tbl_kliring_uas_prodi');
        // $data['baak_ket'] = $this->get_keterangan($id_kuas,'tbl_kliring_uas_baak');
        $data['bk_ket'] = $this->get_keterangan($id_kuas,'tbl_kliring_uas_bk');

        $data['cek'] = $this->get_statusakhir($id_kuas);
        // $data['cek_nost'] = $this->cek_nost($id_uks);
        // $data['kd_jenjang'] = $this->cek_nost($kode_jenjang);
    	}

		$this->load->view('fpuas_home');
		$this->load->view('fpuas_konten',$data);
		$this->load->view('fpuktsk_footer');
	}

	////////////////////////////////////////////////////////////////////////////////////prada////////
	public function index_prada()
	{
		$this->load->view('header');
		$this->load->view('fpprada_home');
		$this->load->view('footer');
	}
	public function ajuan_prada()
	{
		$this->load->view('header');
		$this->load->view('fpprada_ajuan');
		$this->load->view('footer');
	}
	public function cekstatus_fpprada($id_kp,$table)
	{
	   $ta = $this->getTa();
		# code...
	  $where = array(
	  'id_kp' => $id_kp,
	  );
	  $where2 = array(
	  'id_kp' => $id_kp, 
	  'hasil' => "1",
	  );
	   $where3 = array(
	  'id_kp' => $id_kp, 
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
	public function get_keterangan_prada($id_kp, $table)
	{
		# code...
		$where = array(
			'id_kp' => $id_kp
        );
		$getP = $this->m_portal->get_data($where,$table)->result();
		foreach ($getP as $p) {
			# code...
			//$data['nama'] = $n->Nama_mahasiswa ;
			return $p->keterangan;
		}
	}
	public function fppradap()
	{
		$this->form_validation->set_rules('semester', 'Isi dengan semester *', 'required');
		$this->form_validation->set_rules('nim', 'isi dengan NIM anda *', 'required');
		$this->form_validation->set_rules('jenjang', 'Pilih jenjang studi anda *', 'required');
		// $this->form_validation->set_rules('prodi', 'Pilih Prodi anda*', 'required');
		$this->form_validation->set_rules('karya', 'isi dengan judul karya tulis, proposal atau skripsi anda*', 'required');
		if ($this->input->post('prodi1') > 0) {
				# code...
				$prodi_form = $this->input->post('prodi1');
			}else{
				$prodi_form = $this->input->post('prodi2');
			}
			////////////////////////////// cek data ///////////////////////////////////////////
		$nim =  $this->input->post('nim');
		$where2 = array(
			'nim' => $nim,
		);
		$d = $this->m_portal->get_data($where2,'tbl_kliring_prada')->row();
		if ($d > "0") {
			# code...
			$this->session->set_flashdata('error', "<b>Error, Proses pengajuan anda gagal karena data anda telah ada di database</b>");
			
			$this->load->view('header');
			$this->load->view('fpprada_home');
			$this->load->view('footer');
		}else{
		/////////////////////////////// /.cek data/////////////////////////////////////

		if ($this->form_validation->run() != false) {
			$data = array(
			'smt'  => $this->input->post('semester'),
			'nim'     	=> $this->input->post('nim'),
			'jenjang'   => $this->input->post('jenjang'),			
			'prodi'   	=> $prodi_form,
			'judul_k' 	=> $this->input->post('karya'),
			
		   );

		  $res = $this->m_portal->input_data($data,'tbl_kliring_prada');
		  if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses pengajuan anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Pengajuan Anda telah terdaftar silakan cek status anda di menu cek status pengajuan prada</b>");  
			 }
	  	$this->load->view('header');
		$this->load->view('fpprada_home');
		$this->load->view('footer');
		}else{
			$this->load->view('header');
			$this->load->view('fpprada_home');
			$this->load->view('footer');
		}
	} }

	public function fpprada_cari()
	{
		# code...
		$nama = $this->input->post('nama');
		$where = array(
			'tbl_kliring_prada.nim' => $nama,
        );
        $where2 = array(
			'tmst_mahasiswa.NIM' => $nama,
        );
        $data['catar']=$this->m_portal->get_data($where,'tbl_kliring_prada')->result();
        $getdatanp=$this->m_portal->get_data_join_nama_en_prodi($where2)->result();
		
		foreach ($data['catar'] as $p) {
			$data['nim'] = $p->nim;
			$id_kp = $p->id_kp;
			// $data['smt'] = $p->smt;
			// $data['tgl_permohonan'] = $p->tgl_permohonan;
			$data['judul_k'] = $p->judul_k;
		}
		foreach ($getdatanp as $np) {
			$data['nama'] = $np->Nama_mahasiswa;
			$data['prodi'] = $np->Nama_program_studi;
		}			
			$data['baak_label'] =$this->cekstatus_fpprada($id_kp,'tbl_kliring_prada_baak');
			$data['baak_ket'] = $this->get_keterangan_prada($id_kp,'tbl_kliring_prada_baak');

			$data['bk_label'] =$this->cekstatus_fpprada($id_kp,'tbl_kliring_prada_bk');
			$data['bk_ket'] = $this->get_keterangan_prada($id_kp,'tbl_kliring_prada_bk');

			$data['mahatar_label'] =$this->cekstatus_fpprada($id_kp,'tbl_kliring_prada_mahatar');
			$data['mahatar_ket'] = $this->get_keterangan_prada($id_kp,'tbl_kliring_prada_mahatar');

			$data['prodi_label'] =$this->cekstatus_fpprada($id_kp,'tbl_kliring_prada_prodi');
			$data['prodi_ket'] = $this->get_keterangan_prada($id_kp,'tbl_kliring_prada_prodi');


	


		$this->load->view('header');
		$this->load->view('fpprada_cari',$data);
		$this->load->view('footer');

	}
		///////////////////////////////////////////////////////////////////////// semster antara////////////////////////////////////////
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

	public function index_smta()
	{
		$this->load->view('header');
		$this->load->view('fpsmta_home');
		$this->load->view('footer');
	}
	public function ajuan_smta()
	{
		# code...
		$this->load->view('header');
		$this->load->view('fpsmta_ajuan');
		$this->load->view('footer');

	}
	public function getmakulfromkurikulum($prodi, $kdkur, $smt)
	{
		# code...
		$where = array(
			'kurikulum_mk.kode_kurikulum' 			=> $kdkur,
			'tmst_mata_kuliah.Semester' 			=> $smt,
			'tmst_mata_kuliah.Kode_program_studi' 	=> $prodi,
        );
		$data= $this->m_portal->get_data_join_kurikulum_where($where)->result();

		return $data;
	}
	public function ajuan_smta_cek()
	{
		# code...
		$data['kliring'] = $this; 

		$nim = $this->input->post('name');
		$ta = $this->getTa();
		$where = array(
			'NIM' => $nim,
        );


		$data['catar']=$this->m_portal->get_data($where,'tmst_mahasiswa')->result();
		foreach ($data['catar'] as $key) {
			# code...
			$kdprodi = $key->Kode_program_studi;
			$data['prodi'] = $this->getProdi($kdprodi);
			$data['kdprodi'] = $kdprodi;
		}

		//list kurikulum
		$kur_kpn	= 'A03012020';
		$kur_tn 	= 'T2019';
		$kur_nt 	= 'A01032020';
		$kur_tra 	= 'TRA2020';
		$kur_ttl	= 'A01052020';
		$kur_tm	 	= 'TM2020';
		$kur_tk 	= 'TK2020';
		$kur_pi 	= 'A01082020';

		if ($kdprodi == "92401" ) {
			# code...
			$data['kdkur'] = $kur_kpn;
		} else if ($kdprodi == "92402") {
			# code...
			$data['kdkur'] = $kur_tn;
		} else if ($kdprodi == "92403") {
			# code...
			$data['kdkur'] = $kur_nt;
		} else if ($kdprodi == "61201") {
			# code...
			$data['kdkur'] = $kur_tra;	
		} else if ($kdprodi == "21207") {
			# code...
			$data['kdkur'] = $kur_ttl;	
		} else if ($kdprodi == "21201") {
			# code...
			$data['kdkur'] = $kur_tm;
		} else if ($kdprodi == "13241") {
			# code...
			$data['kdkur'] = $kur_tk;	
		} else if ($kdprodi == "94205") {
			# code...
			$data['kdkur'] = $kur_pi;	
		}

		$this->load->view('fpsmta_ajuan_cek',$data);


	}
	public function ajuan_smta_old()
	{

		$where_kpn = array(
			'kurikulum_mk.kode_kurikulum' => 'A03012020',
        );
        $data['kpn']=$this->m_portal->get_data_join_kurikulum_where($where_kpn)->result();

        $where_teknika = array(
			'kurikulum_mk.kode_kurikulum' => 'T2019',
        );
        $data['teknika']=$this->m_portal->get_data_join_kurikulum_where($where_teknika)->result();

        $where_nautika = array(
			'kurikulum_mk.kode_kurikulum' => 'A01032020',
        );
        $data['nautika']=$this->m_portal->get_data_join_kurikulum_where($where_nautika)->result();

        $where_transportasi = array(
			'kurikulum_mk.kode_kurikulum' => 'TRA2020',
        );
        $data['transportasi']=$this->m_portal->get_data_join_kurikulum_where($where_transportasi)->result();

        $where_ttl = array(
			'kurikulum_mk.kode_kurikulum' => 'A01052020',
        );
        $data['ttl']=$this->m_portal->get_data_join_kurikulum_where($where_ttl)->result();

        $where_tmesin = array(
			'kurikulum_mk.kode_kurikulum' => 'TM2020',
        );
        $data['tmesin']=$this->m_portal->get_data_join_kurikulum_where($where_tmesin)->result();

        $where_tkes = array(
			'kurikulum_mk.kode_kurikulum' => 'TM2020',
        );
        $data['tkes']=$this->m_portal->get_data_join_kurikulum_where($where_tkes)->result();

        $where_pi = array(
			'kurikulum_mk.kode_kurikulum' => 'TM2020',
        );
        $data['pi']=$this->m_portal->get_data_join_kurikulum_where($where_pi)->result();
		$this->load->view('header');
		$this->load->view('fpsmta_ajuan',$data);
		$this->load->view('footer');
	}
	public function fpsmtap()
	{
		$this->form_validation->set_rules('nim', 'Isi dengan NIM anda *', 'required');
		// $this->form_validation->set_rules('smt', 'isi dengan Semester *', 'required');
		// $this->form_validation->set_rules('jenjang', 'Pilih jenjang studi anda *', 'required');
		$this->form_validation->set_rules('prodi', 'Pilih Prodi anda*', 'required');
		// $this->form_validation->set_rules('makul', 'Pilih Makul yang akan diambil untuk semester antara*', 'required');
		// $this->form_validation->set_rules('nilai_lalu', 'Harus mengisi nilai makul yang telah diambil sebelumnya*', 'required');

		// $this->form_validation->set_rules('karya', 'isi dengan judul karya tulis, proposal atau skripsi anda*', 'required');
		
		////////////////////////////// cek data  ///////////////////////////////////////////
		$ta = $this->getTa();
		$nim =  $this->input->post('nim');
		$where2 = array(
			'nim' => $nim,
			'ta' => $ta,
		);
		$d = $this->m_portal->get_data($where2,'tbl_kliring_smta')->row();
		if ($d > "0") {
			# code...
			$this->session->set_flashdata('error', "<b>Error, Proses pengajuan anda gagal karena data anda telah ada di database</b>");
			
			$this->load->view('header');
			$this->load->view('fpsmta_home');
			$this->load->view('footer');
		}else{
		/////////////////////////////// /.cek data/////////////////////////////////////

		if ($this->form_validation->run() != false) {
			$data_smta = array(
			'nim'     	=> $this->input->post('nim'),	
			'prodi'   	=> $this->input->post('prodi'),
			'jml_smt'   => $this->input->post('jml_smt'),		
			'status' 	=> '1',
			'ta' 		=> $ta		
		   );

		$res = $this->m_portal->input_data($data_smta,'tbl_kliring_smta');
		$id_smta = $this->db->insert_id();

		/////////////////////////////input arry///////////////////////////////////////
		$result = array();
		foreach ($_POST['makul'] as $key => $val) {
			$result[] = array( 
				'id_smta'     		=> $id_smta,		
				'Kode_mata_kuliah' 	=> $_POST['makul'][$key],
				'ta' 				=> $ta,			
			);		
		}		
		$this->db->insert_batch('tbl_kliring_smta_makul_temp',$result);

		/////////////////////////////./input arry///////////////////////////////////////	

		  // $res = $this->m_portal->input_data($data,'tbl_kliring_smta');


		  if($res==true && $result==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses pengajuan anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Pengajuan Anda telah terdaftar silakan cek status anda di menu cek status pengajuan Semester antara</b>");  
			 }
	  	$this->load->view('header');
		$this->load->view('fpsmta_home');
		$this->load->view('footer');
		}else{
			$this->load->view('header');
			$this->load->view('fpsmta_home');
			$this->load->view('footer');
		}
	} } 

	public function fpsmta_cari()
	{
	
		# code...
		$data['kliring'] = $this; 
		///////// cek sudah daftar apa belum////////////
		$nim = $this->input->post('name');
		$ta = $this->getTa();
		$where = array(
			'nim' => $nim,
			'ta' => $ta
        );
		// $data['catar']=$this->m_portal->get_data($where,'tmst_mahasiswa')->result();
		$data['catar']=$this->m_portal->get_data($where,'tbl_kliring_smta')->result();
		foreach ($data['catar'] as $key) {
			# code...
			$id_smta = $key->id_smta;
			$nim = $key->nim;
			$kdprodi = $key->prodi;
			$data['prodi'] = $this->getProdi($kdprodi);
			// $data['kdprodi'] = $kdprodi;
			$data['nama'] = $this->getNama($nim);
		}

		/// cek syarat/////

		//// cek sks////
		$where1 = array(
			'id_smta' => $id_smta,
			'ta' => $ta
        );
		$getmakultemp = $this->m_portal->get_data_join_sum_makul_temp($where1)->result();
		foreach ($getmakultemp as $key) {
			# code...
			$sum_sks = $key->jml_sks;
		}
		$data['jml_sks_temp'] = $sum_sks;
		///// cek jumlah peserta ////
		$data['list_makul_temp']=$this->m_portal->get_data_join_makul_temp($where1)->result();

		//// cek sudah masuk kuota apa belum ////
		$cek_sudahmasuk = $this->m_portal->get_data($where1,'tbl_kliring_smta_makul')->row();
		if ($cek_sudahmasuk > "1") {
			# code...
			$data['sudahmasukkuota'] = "<a class='btn btn-success btn-sm' href='#'><i class='fa fa-check'></i></a>";
		}else{
			$data['sudahmasukkuota'] = "<a class='btn btn-danger btn-sm' href='#'><i class='fa fa-close'></i></a>";
		}

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

		$this->load->view('fpsmta_cari',$data);

		
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
		//download tutorial
	public function tutorial_smta_download()
	{
		# code...
		force_download('assets/download/tutorial_semester_antara.pdf',NULL);
		redirect(base_url());
	}
	
	///////////////////////////////////////////////////////////////////PKL///////////////////////////////////

	public function index_pkl()
	{
		$this->load->view('header');
		$this->load->view('fppkl_home');
		$this->load->view('footer');
	}
	public function ajuan_pkl()
	{
		$this->load->view('header');
		$this->load->view('fppkl_ajuan');
		$this->load->view('footer');
	}
	public function cekstatus_fppkl($id_pkl,$table)
	{
	   $ta = $this->getTa();
		# code...
	  $where = array(
	  'id_pkl' => $id_pkl,
	  );
	  $where2 = array(
	  'id_pkl' => $id_pkl, 
	  'hasil' => "1",
	  );
	   $where3 = array(
	  'id_pkl' => $id_pkl, 
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
	public function get_keterangan_pkl($id_pkl, $table)
	{
		# code...
		$where = array(
			'id_pkl' => $id_pkl
        );
		$getP = $this->m_portal->get_data($where,$table)->result();
		foreach ($getP as $p) {
			# code...
			//$data['nama'] = $n->Nama_mahasiswa ;
			return $p->keterangan;
		}
	}
	public function fppklp()
	{
		$this->form_validation->set_rules('semester', 'Isi dengan semester *', 'required');
		$this->form_validation->set_rules('nim', 'isi dengan NIM anda *', 'required');
		$this->form_validation->set_rules('jenjang', 'Pilih jenjang studi anda *', 'required');
		// $this->form_validation->set_rules('prodi', 'Pilih Prodi anda*', 'required');
		$this->form_validation->set_rules('nama_perusahaan', 'isi dengan nama perusahaan tempat PKL*', 'required');
		$this->form_validation->set_rules('alamat_perusahaan', 'isi dengan alamat perusahaan tempat PKL*', 'required');
		if ($this->input->post('prodi1') > 0) {
				# code...
				$prodi_form = $this->input->post('prodi1');
			}else{
				$prodi_form = $this->input->post('prodi2');
			}
			////////////////////////////// cek data ///////////////////////////////////////////
		$nim =  $this->input->post('nim');
		$where2 = array(
			'nim' => $nim,
		);
		$d = $this->m_portal->get_data($where2,'tbl_kliring_pkl')->row();
		if ($d > "0") {
			# code...
			$this->session->set_flashdata('error', "<b>Error, Proses pengajuan anda gagal karena data anda telah ada di database</b>");
			
			$this->load->view('header');
			$this->load->view('fppkl_home');
			$this->load->view('footer');
		}else{
		/////////////////////////////// /.cek data/////////////////////////////////////

		if ($this->form_validation->run() != false) {
			$data = array(
			'smt'  => $this->input->post('semester'),
			'nim'     	=> $this->input->post('nim'),
			'jenjang'   => $this->input->post('jenjang'),			
			'prodi'   	=> $prodi_form,
			'nama_perusahaan' 	=> $this->input->post('nama_perusahaan'),
			'alamat_perusahaan' 	=> $this->input->post('alamat_perusahaan'),
		   );

		  $res = $this->m_portal->input_data($data,'tbl_kliring_pkl');
		  if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses pengajuan anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Pengajuan Anda telah terdaftar silakan cek status anda di menu cek status pengajuan prada</b>");  
			 }
	  	$this->load->view('header');
		$this->load->view('fppkl_home');
		$this->load->view('footer');
		}else{
			$this->load->view('header');
			$this->load->view('fppkl_home');
			$this->load->view('footer');
		}
	} }

	public function fppkl_cari()
	{
		# code...
		$nama = $this->input->post('nama');
		$where = array(
			'tbl_kliring_pkl.nim' => $nama,
        );
        $where2 = array(
			'tmst_mahasiswa.NIM' => $nama,
        );
        $data['catar']=$this->m_portal->get_data($where,'tbl_kliring_pkl')->result();
        $getdatanp=$this->m_portal->get_data_join_nama_en_prodi($where2)->result();
		
		foreach ($data['catar'] as $p) {
			$data['nim'] = $p->nim;
			$id_pkl = $p->id_pkl;
			// $data['smt'] = $p->smt;
			// $data['tgl_permohonan'] = $p->tgl_permohonan;
			$data['judul_k'] = $p->judul_k;
		}
		foreach ($getdatanp as $np) {
			$data['nama'] = $np->Nama_mahasiswa;
			$data['prodi'] = $np->Nama_program_studi;
		}			
			$data['baak_label'] =$this->cekstatus_fppkl($id_pkl,'tbl_kliring_pkl_baak');
			$data['baak_ket'] = $this->get_keterangan_pkl($id_pkl,'tbl_kliring_pkl_baak');

			$data['bk_label'] =$this->cekstatus_fppkl($id_pkl,'tbl_kliring_pkl_bk');
			$data['bk_ket'] = $this->get_keterangan_pkl($id_pkl,'tbl_kliring_pkl_bk');

			$data['mahatar_label'] =$this->cekstatus_fppkl($id_pkl,'tbl_kliring_pkl_mahatar');
			$data['mahatar_ket'] = $this->get_keterangan_pkl($id_pkl,'tbl_kliring_pkl_mahatar');

			$data['prodi_label'] =$this->cekstatus_fppkl($id_pkl,'tbl_kliring_pkl_prodi');
			$data['prodi_ket'] = $this->get_keterangan_pkl($id_pkl,'tbl_kliring_pkl_prodi');

	


		$this->load->view('header');
		$this->load->view('fppkl_cari',$data);
		$this->load->view('footer');

	}
		/////////////////////////////////////////////////////////// Turun PKL ////////////////////////////////////////////////
	public function index_tpkl()
	{
		$this->load->view('header');
		$this->load->view('fptpkl_home');
		$this->load->view('footer');
	}
	public function ajuan_tpkl()
	{
		$this->load->view('header');
		$this->load->view('fptpkl_ajuan');
		$this->load->view('footer');
	}
	public function fptpklp()
	{
		$this->form_validation->set_rules('nim', 'NIM harus diisi *', 'required');
		$this->form_validation->set_rules('no_telp', 'No. Telp/HP harus diisi *', 'required');
		// $this->form_validation->set_rules('prodi', 'Pilih Prodi anda*', 'required');
		$this->form_validation->set_rules('judul_pkl', 'judul PKL harus diisi*', 'required');
		// $this->form_validation->set_rules('alamat_perusahaan', 'isi dengan alamat perusahaan tempat PKL*', 'required');
		
		///////////////////////////////////cek tbl_kliring_pkl/////////////////////////////////////////////////////////
		$nim =  $this->input->post('nim');
		$where3 = array(
			'nim' => $nim,
		);
		$e = $this->m_portal->get_data($where3,'tbl_kliring_pkl')->row();
		if ($e == null) {
			# code...
			$this->session->set_flashdata('error', "<b>Error, Proses pengajuan anda gagal karena anda tidak melakukan PKL</b>");

			$this->load->view('header');
			$this->load->view('fptpkl_home');
			$this->load->view('footer');
		}else{
			////////////////////////////// cek data ///////////////////////////////////////////		
		$where2 = array(
			'nim' => $nim,
		);
		$d = $this->m_portal->get_data($where2,'tbl_kliring_tpkl')->row();
		if ($d > "0") {
			# code...
			$this->session->set_flashdata('error', "<b>Error, Proses pengajuan anda gagal karena data anda telah ada di database</b>");
			
			$this->load->view('header');
			$this->load->view('fptpkl_home');
			$this->load->view('footer');
		}else{
		/////////////////////////////// /.cek data/////////////////////////////////////

		//upload file
			$nim = $this->input->post('nim');
			$nama = $this->getNama($nim);

		$namagabungan1 = judul_seo("konduite_".$nim."_".$nama);
		$namagabungan2 = judul_seo("sk_".$nim."_".$nama);
		$nmfile1 = $namagabungan1.".pdf";
		$nmfile2 = $namagabungan2.".pdf";
        #upload file1
        $config['upload_path'] = FCPATH.'assets/upload/tpkl/konduite/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = '5024';
		// $config['max_width']  = '1024';
		// $config['max_height']  = '768';

        if($_FILES["file_k"]["name"]){
        $config["file_name"] = $nmfile1;
        $this->load->library('upload', $config);
        $konduite = $this->upload->do_upload('file_k');
        if (!$konduite){
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata("error", ".");
        }else{
            $konduite = $this->upload->data("file_name");
            $data = array('upload_data' => $this->upload->data());
            $this->session->set_flashdata("success", ".");
        	}
    	}

    	$config2['upload_path'] = FCPATH.'assets/upload/tpkl/sk/';
		$config2['allowed_types'] = 'pdf';
		$config2['max_size']  = '5024';

		if($_FILES["file_sk"]["name"]){
        $config2["file_name"] = $nmfile2;
        $this->upload->initialize($config2);// untuk upload set nama file kedua
        $sk = $this->upload->do_upload('file_sk');
        if (!$sk){
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata("error", ".");
        }else{
            $sk= $this->upload->data("file_name");
            $data = array('upload_data' => $this->upload->data());
            $this->session->set_flashdata("success", ".");
        	}
    	}


		if ($this->form_validation->run() != false) {
			$data = array(
			'nim'     	=> $this->input->post('nim'),
			'no_telp'   => $this->input->post('no_telp'),			
			'judul_pkl' 	=> $this->input->post('judul_pkl'),
			'file_konduite' 	=> $nmfile1,
			'file_suratketoff' 	=> $nmfile2,
		   );

		  $res = $this->m_portal->input_data($data,'tbl_kliring_tpkl');
		  if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses pengajuan anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Pengajuan Anda telah terdaftar silakan cek status anda di menu cek status pengajuan prada</b>");  
			 }
	  	$this->load->view('header');
		$this->load->view('fptpkl_home');
		$this->load->view('footer');
		}else{
			$this->load->view('header');
			$this->load->view('fptpkl_home');
			$this->load->view('footer');
		}
	} } } 

	public function fptpkl_cari()
	{
		# code...
		$nama = $this->input->post('nama');
		$where = array(
			'tbl_kliring_tpkl.nim' => $nama,
        );
        $where2 = array(
			'tmst_mahasiswa.NIM' => $nama,
        );
        $data['catar']=$this->m_portal->get_data($where,'tbl_kliring_tpkl')->result();
        $getdatanp=$this->m_portal->get_data_join_nama_en_prodi($where2)->result();
		
		foreach ($data['catar'] as $p) {
			$data['nim'] = $p->nim;
			$id_tpkl = $p->id_tpkl;
			// $data['smt'] = $p->smt;
			// $data['tgl_permohonan'] = $p->tgl_permohonan;
			$data['judul_pkl'] = $p->judul_pkl;
		}
		foreach ($getdatanp as $np) {
			$data['nama'] = $np->Nama_mahasiswa;
			$data['prodi'] = $np->Nama_program_studi;
		}			

			$data['ppk_label'] =$this->cekstatus_fptpkl($id_tpkl,'tbl_kliring_tpkl_ppk');
			$data['ppk_ket'] = $this->get_keterangan_tpkl($id_tpkl,'tbl_kliring_tpkl_ppk');

			$data['prodi_label'] =$this->cekstatus_fptpkl($id_tpkl,'tbl_kliring_tpkl_prodi');
			$data['prodi_ket'] = $this->get_keterangan_tpkl($id_tpkl,'tbl_kliring_tpkl_prodi');

		//cek proses kliring all for download file pengajuan
			$data['tombol'] = $this->cekstatus_fptpkl_all($id_tpkl);

		$this->load->view('header');
		$this->load->view('fptpkl_cari',$data);
		$this->load->view('footer');

	}
	public function cekstatus_fptpkl_all($id_tpkl)
	{
		# code...
		$where = array(
			'id_tpkl' => $id_tpkl,
        );
		$cek_ppk = $this->m_portal->get_data($where,'tbl_kliring_tpkl_ppk')->row();
		$cek_prodi = $this->m_portal->get_data($where,'tbl_kliring_tpkl_prodi')->row();

		if ($cek_ppk > "0" && $cek_prodi > "0") {
			# code...
			return $data = 1;
		}else{
			return $data = 0;
		}

	}
	public function cekstatus_fptpkl($id_tpkl,$table)
	{
	   $ta = $this->getTa();
		# code...
	  $where = array(
	  'id_tpkl' => $id_tpkl,
	  );
	  $where2 = array(
	  'id_tpkl' => $id_tpkl, 
	  'hasil' => "1",
	  );
	   $where3 = array(
	  'id_tpkl' => $id_tpkl, 
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
	public function get_keterangan_tpkl($id_tpkl, $table)
	{
		# code...
		$where = array(
			'id_tpkl' => $id_tpkl
        );
		$getP = $this->m_portal->get_data($where,$table)->result();
		foreach ($getP as $p) {
			# code...
			//$data['nama'] = $n->Nama_mahasiswa ;
			return $p->keterangan;
		}
	}
	//download file konduite
	public function file_konduite_download()
	{
		# code...
		force_download('assets/download/form_konduite_pkl.pdf',NULL);
		redirect(base_url());
	}
	public function cetak_permohonan_tpkl($id_tpkl)
	{
		# code...
		$where = array(
		  'id_tpkl' => $id_tpkl,
		  );
		$get = $this->m_portal->get_data($where,'tbl_kliring_tpkl')->result();

		foreach ($get as $key) {
			# code...
			$nim = $key->nim;
		}

		//get prodi
		$where2 = array(
		  'NIM' => $nim,
		  );
		$get2 = $this->m_portal->get_data($where2,'tmst_mahasiswa')->result();

		foreach ($get2 as $key) {
			# code...
			$prodi = $key->Kode_program_studi;
		}

		$data['nim'] = $nim;
		$data['nama'] = $this->getNama($nim);
		$data['tanggal'] = $this->tanggal(date('Y-m-d'));
		$data['prodi'] = $this->getProdi($prodi);

		//pdf
		$pdfFilePath="Cetak_permohonan_Turun_PKL".$nim.".pdf";
		$html=$this->load->view('fptpkl_cetak_permohonan',$data, TRUE);
		$pdf = $this->m_pdf->load();
 
        $pdf->AddPage('P');
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "D");
        exit();
	}
	
}

/* End of file kliring.php */
/* Location: ./application/controllers/kliring.php */