<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_portal');
		$this->load->library('form_validation');
		$this->load->library('m_pdf');
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
	public function fpuktsk_home()
	{
		# code...
		$this->load->view('fpuktsk_home');
		$this->load->view('fpuktsk_footer');
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
	//kliring---------------------------------------------------------------------------------------------------------------
	public function cekstatus_fpuktsks($id_uks,$table)
	{
		# code...
	  $where = array(
	  'id_uks' => $id_uks      
	  );
	  $where2 = array(
	  'id_uks' => $id_uks, 
	  'hasil' => "1"     
	  );
	   $where3 = array(
	  'id_uks' => $id_uks, 
	  'hasil' => "2"     
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
	public function get_keterangan($id_uks, $table)
	{
		# code...
		$where = array(
			'id_uks' => $id_uks,			       
        );
		$getP = $this->m_portal->get_data($where,$table)->result();
		foreach ($getP as $p) {
			# code...
			//$data['nama'] = $n->Nama_mahasiswa ;
			return $p->keterangan;
		}
	}
	public function get_statusakhir($id_uks)
	{
		# code...
		$where = array(
			'id_uks' => $id_uks,
			'hasil' => '1'			       
        );
        $get_m = $this->m_portal->get_data($where, 'tbl_kliring_ujianktsk_mahatar')->row();
        $get_p = $this->m_portal->get_data($where, 'tbl_kliring_ujianktsk_ppk')->row();
        $get_b = $this->m_portal->get_data($where, 'tbl_kliring_ujianktsk_baak')->row();
        $get_k = $this->m_portal->get_data($where, 'tbl_kliring_ujianktsk_bk')->row();
        $get_w = $this->m_portal->get_data($where, 'tbl_kliring_ujianktsk_walidosen')->row();

        if ($get_m > "0" && $get_p > "0" && $get_b > "0" && $get_m > "0" && $get_m > "0") {
        	# code...
        	return $wew = "1";
        }else{
        	return $wew = "0";
        }

	}
	public function cek_nost($id_uks)
	{
		# code...
		$where = array(
			'id_uks' => $id_uks,			       
        );
		$get_m = $this->m_portal->get_data($where, 'tbl_kliring_ujianktsk_nost')->row();
		if ($get_m > "0") {
			# code...
			return $wew = "1";
		}else{
			return $wew = "0";
		}
	}
	public function fpuktsks()
	{
		# code...
		$nama = $this->input->post('nama');
		//get nama
		$data['nama'] = $this->getNama($nama);
		$where = array(
			'tbl_kliring_ujianktsk.nim' => $nama,			       
        );
        // $data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
        $data['catar'] = $this->m_portal->get_data_join_where($where)->result();

        if ($data['catar'] == null) {
        	# code...
        }else{
        foreach ($data['catar'] as $p) {
			# code...
			//$data['nama'] = $n->Nama_mahasiswa ;
			$id_uks=$p->id_uks;
			$jenjang=$p->jenjang;
			$kode_jenjang = $p->Kode_jenjang_pendidikan;
			$kode_prodi = $p->Kode_program_studi;
		}
        // $data['welcome'] = $this;
		// if ($jenjang == 1) {
		// 	# code...
		// }

        $data['mahatar_label'] = $this->cekstatus_fpuktsks($id_uks,'tbl_kliring_ujianktsk_mahatar'); 
        $data['wdosen_label'] = $this->cekstatus_fpuktsks($id_uks,'tbl_kliring_ujianktsk_walidosen'); 
        $data['ppk_label'] = $this->cekstatus_fpuktsks($id_uks,'tbl_kliring_ujianktsk_ppk'); 
        $data['baak_label'] = $this->cekstatus_fpuktsks($id_uks,'tbl_kliring_ujianktsk_baak'); 
        $data['bk_label'] = $this->cekstatus_fpuktsks($id_uks,'tbl_kliring_ujianktsk_bk'); 

        $data['mahatar_ket'] = $this->get_keterangan($id_uks,'tbl_kliring_ujianktsk_mahatar');
        $data['wdosen_ket'] = $this->get_keterangan($id_uks,'tbl_kliring_ujianktsk_walidosen');
        $data['ppk_ket'] = $this->get_keterangan($id_uks,'tbl_kliring_ujianktsk_ppk');
        $data['baak_ket'] = $this->get_keterangan($id_uks,'tbl_kliring_ujianktsk_baak');
        $data['bk_ket'] = $this->get_keterangan($id_uks,'tbl_kliring_ujianktsk_bk');

        $data['cek'] = $this->get_statusakhir($id_uks);
        $data['cek_nost'] = $this->cek_nost($id_uks);
        $data['kd_jenjang'] = $kode_jenjang;
        $data['kd_prodi'] = $kode_prodi;
    	}

		$this->load->view('fpuktsk_home');
		$this->load->view('fpuktsk_konten',$data);
		$this->load->view('fpuktsk_footer');
	}
	public function klaim($id_uks)
	{
		# code...
		// $id_uks = $this->input->post('semester');
		$cek = $this->get_statusakhir($id_uks);
		if ($cek == "1") {
			# code...
			$data = array(
				'id_uks' => $id_uks
			);
			$res = $this->m_portal->input_data($data,'tbl_kliring_ujianktsk_nost');
		  	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Maaf, Proses kliring sedang berlangsung atau belum selesai pastikan semua proses telah selesai / acc</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Proses klaim telah berhasil</b>");  
			 }
	  	$this->load->view('fpuktsk_home');
		$this->load->view('fpuktsk_footer');
		}else{
			$this->session->set_flashdata('error', "<b>Maaf, Proses kliring sedang berlangsung atau belum selesai pastikan semua proses telah selesai / acc</b>");
		$this->load->view('fpuktsk_home');
		$this->load->view('fpuktsk_footer');
		}
	}
	public function fpuktsk()
	{
		# code...
		$this->load->view('fpuktsk');
	}
	function ctk_beritaacaras1($id_uks)
	{
		# code...
		$where = array(
			'id_uks' => $id_uks		
		);
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
		foreach ($data['catar'] as $row) {
			# code...
			$nim = $row->nim;
			$jenjang = $row->jenjang;
	        $prodi = $row->prodi;
		}
		$data['nama'] = $this->getNama($nim);
		//get prodi
		$data['prodi'] = $this->getProdi($prodi);
		//get jenjang
		$data['jenjang'] = $this->jenjang($jenjang);

		$this->load->view('fpuktsk_s1beritaacara',$data);

		//pdf
		$pdfFilePath="cetak.pdf";
		$html=$this->load->view('fpuktsk_s1beritaacara',$data, TRUE);
		$pdf = $this->m_pdf->load();
 
        $pdf->AddPage('P');
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "D");
        exit();
	}
	function ctk_beritaacarad3($id_uks)
	{
		# code...
		$where = array(
			'id_uks' => $id_uks		
		);
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
		foreach ($data['catar'] as $row) {
			# code...
			$nim = $row->nim;
			$jenjang = $row->jenjang;
	        $prodi = $row->prodi;
		}
		$data['nama'] = $this->getNama($nim);
		//get prodi
		$data['prodi'] = $this->getProdi($prodi);
		//get jenjang
		$data['jenjang'] = $this->jenjang($jenjang);

		$this->load->view('fpuktsk_d3beritaacara',$data);

		//pdf
		$pdfFilePath="cetak.pdf";
		$html=$this->load->view('fpuktsk_d3beritaacara',$data, TRUE);
		$pdf = $this->m_pdf->load();
 
        $pdf->AddPage('P');
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "D");
        exit();
	}
	function ctk_beritaacaras1sk($id_uks)
	{
		# code...
		$where = array(
			'id_uks' => $id_uks		
		);
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
		foreach ($data['catar'] as $row) {
			# code...
			$nim = $row->nim;
			$jenjang = $row->jenjang;
	        $prodi = $row->prodi;
		}
		$data['nama'] = $this->getNama($nim);
		//get prodi
		$data['prodi'] = $this->getProdi($prodi);
		//get jenjang
		$data['jenjang'] = $this->jenjang($jenjang);

		$this->load->view('fpuktsk_s1beritaacara_skripsi',$data);

		//pdf
		$pdfFilePath="cetak.pdf";
		$html=$this->load->view('fpuktsk_s1beritaacara_skripsi',$data, TRUE);
		$pdf = $this->m_pdf->load();
 
        $pdf->AddPage('P');
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "D");
        exit();
	}
	function ctk_surattugass1($id_uks)
	{
		# code...
		$where = array(
			'id_uks' => $id_uks		
		);
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
		$data['nosur'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_nost')->result();
		foreach ($data['catar'] as $row) {
			# code...
			$nim = $row->nim;
			$jenjang = $row->jenjang;
	        $prodi = $row->prodi;
		}
		foreach ($data['nosur'] as $lek) {
			# code...
			$data['nosurat'] = $lek->nost;
		}
		$data['nama'] = $this->getNama($nim);
		//get prodi
		$data['prodi'] = $this->getProdi($prodi);
		//get jenjang
		$data['jenjang'] = $this->jenjang($jenjang);

		$data ['tanggal'] = $this->tanggal(date('Y-m-d'));

		$this->load->view('fpuktsk_s1surattugas',$data);

		//pdf
		$pdfFilePath="cetak.pdf";
		$html=$this->load->view('fpuktsk_s1surattugas',$data, TRUE);
		$pdf = $this->m_pdf->load();
 
        $pdf->AddPage('P');
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "D");
        exit();
	}
	function ctk_surattugasd3($id_uks)
	{
		# code...
		$where = array(
			'id_uks' => $id_uks		
		);
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
		$data['nosur'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_nost')->result();
		foreach ($data['catar'] as $row) {
			# code...
			$nim = $row->nim;
			$jenjang = $row->jenjang;
	        $prodi = $row->prodi;
		}
		foreach ($data['nosur'] as $lek) {
			# code...
			$data['nosurat'] = $lek->nost;
		}
		$data['nama'] = $this->getNama($nim);
		//get prodi
		$data['prodi'] = $this->getProdi($prodi);
		//get jenjang
		$data['jenjang'] = $this->jenjang($jenjang);

		$data ['tanggal'] = $this->tanggal(date('Y-m-d'));

		$this->load->view('fpuktsk_d3surattugas',$data);

		//pdf
		$pdfFilePath="cetak.pdf";
		$html=$this->load->view('fpuktsk_d3surattugas',$data, TRUE);
		$pdf = $this->m_pdf->load();
 
        $pdf->AddPage('P');
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "D");
        exit();
	}
	function ctk_surattugass1sk($id_uks)
	{
		# code...
		$where = array(
			'id_uks' => $id_uks		
		);
		$data['catar'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk')->result();
		$data['nosur'] = $this->m_portal->get_data($where,'tbl_kliring_ujianktsk_nost')->result();
		foreach ($data['catar'] as $row) {
			# code...
			$nim = $row->nim;
			$jenjang = $row->jenjang;
	        $prodi = $row->prodi;
		}
		foreach ($data['nosur'] as $lek) {
			# code...
			$data['nosurat'] = $lek->nost;
		}
		$data['nama'] = $this->getNama($nim);
		//get prodi
		$data['prodi'] = $this->getProdi($prodi);
		//get jenjang
		$data['jenjang'] = $this->jenjang($jenjang);

		$data ['tanggal'] = $this->tanggal(date('Y-m-d'));

		$this->load->view('fpuktsk_s1surattugas_skripsi',$data);

		//pdf
		$pdfFilePath="cetak.pdf";
		$html=$this->load->view('fpuktsk_s1surattugas_skripsi',$data, TRUE);
		$pdf = $this->m_pdf->load();
 
        $pdf->AddPage('P');
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "D");
        exit();
	}
	public function fpuktskp()
	{
		
		$this->form_validation->set_rules('nama', 'isi dengan Nama Lengkap*', 'required');
		$this->form_validation->set_rules('semester', 'Isi dengan semester *', 'required');
		$this->form_validation->set_rules('nim', 'isi dengan NIM anda *', 'required');
		$this->form_validation->set_rules('jenjang', 'Pilih jenjang studi anda *', 'required');
		//$this->form_validation->set_rules('prodi', 'Pilih Prodi anda*', 'required');
		$this->form_validation->set_rules('karya', 'isi dengan judul karya tulis, proposal atau skripsi anda*', 'required');
		$this->form_validation->set_rules('pembimbing1', 'isi dengan pembimbing 1 anda*', 'required');
		$this->form_validation->set_rules('pembimbing2', 'isi dengan pembimbing 2 anda*', 'required');
		// $this->form_validation->set_rules('pembibing3', 'isi dengan pembimbing 3 anda*', 'required');
		if ($this->input->post('prodi1') > 0) {
				# code...
				$prodi_form = $this->input->post('prodi1');
			}else{
				$prodi_form = $this->input->post('prodi2');
			}

		if ($this->form_validation->run() != false) {
			$data = array(
			// 'nama'  	=> $this->input->post('nama'),
			'smt'  => $this->input->post('semester'),
			'nim'     	=> $this->input->post('nim'),
			'jenjang'   => $this->input->post('jenjang'),			
			'prodi'   	=> $prodi_form,
			'karya' 	=> $this->input->post('karya'),
			'pembimbing1'=> $this->input->post('pembimbing1'),
			'pembimbing2'=> $this->input->post('pembimbing2'),
			'pembimbing3'=> $this->input->post('pembimbing3'),
		   );

		  $res = $this->m_portal->input_data($data,'tbl_kliring_ujianktsk');
		  if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses pengajuan anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, Pengajuan Anda telah terdaftar silakan cek status anda di menu cek status pengajuan</b>");  
			 }
	  	$this->load->view('fpuktsk');
		}else{
			$this->load->view('fpuktsk');
		}

	}

	////////////////////////////////prada//////////////////////////////

	// ////////////////////////////////////////MAHATAR 2022////////////////////////////////////////////////////////////////////
	// public function mhtr_prestasi()
	// {
	// 	# code...
	// 	$this->load->view('header');
	// 	$this->load->view('kues/mhtr_prestasi');
	// 	$this->load->view('footer');
	// }
	// public function mhtr_kegiatan()
	// {
	// 	# code...
	// 	$this->load->view('header');
	// 	$this->load->view('kues/mhtr_kegiatan');
	// 	$this->load->view('footer');
	// }

	
}
