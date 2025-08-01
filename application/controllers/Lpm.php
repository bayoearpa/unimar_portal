<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lpm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'administrasi?pesan=belumlogin');
		}elseif ($this->session->userdata('level') != "6") {
			# code...
			redirect(base_url().'administrasi?pesan=salahkamar');
		}
		$this->load->model('m_kues');
		$this->load->library('m_pdf');
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$this->load->view('lpm/header');
		$this->load->view('lpm/index');
		$this->load->view('lpm/footer');
	}
	public function getProdi($prodi)
	{
		# code...
		//get nama
		$where = array(
			'Kode_program_studi' => $prodi,			       
        );
		$getP = $this->m_kues->get_data($where,'tmst_program_studi')->result();
		foreach ($getP as $p) {
			# code...
			//$data['nama'] = $n->Nama_mahasiswa ;
			return $p->Nama_program_studi;
		}
	}
	public function getNamaDosen($kddosen)
	{
		# code...
		$where = array(
			'Kode_dosen' => $kddosen		
		);
		$dosen = $this->m_kues->get_data($where,'tmst_dosen')->result();

		foreach ($dosen as $d) {
			# code...
			$get = $d->Nama_dosen;
		}

		return $get;

	}

	///////////////////////////////////////////////////////// KUES MHSDSN ///////////////////////////////////////////////////
	public function kues_mhsdsn_update()
	{
		$this->load->view('lpm/header');
		$this->load->view('lpm/kues_mhsdsn_updatedata');
		$this->load->view('lpm/footer');
	}
	public function kues_mhsdsn_rekap()
	{
		$this->load->view('lpm/header');
		$this->load->view('lpm/kues_mhsdsn_rekap');
		$this->load->view('lpm/footer');
	}
	public function cektablelapmhsdsn($prodi, $ta)
	{
		# code...
		$where = array(
			'prodi' => $prodi,
			'ta' => $ta,		
		);

		$cektabel = $this->m_kues->get_data($where,'tbl_kues_lap_mhsdsn')->num_rows();
		return $cektabel;

	}
	public function cektablelapmhsdsn_dsn($kddosen, $ta)
	{
		# code...
		$where = array(
			'kd_dosen' => $kddosen,
			'ta' => $ta,		
		);

		$cektabel = $this->m_kues->get_data($where,'tbl_kues_lap_mhsdsn')->num_rows();
		return $cektabel;

	}
	public function sumitem_mhsdsn($item, $angka, $prodi, $ta)
	{
		# code...
		$where = array(
			$item => $angka,
			'prodi'=> $prodi,
			'ta' => $ta		
		);
		$get_sum = $this->m_kues->get_data_mhsdsn_sum_item($where,$item)->result();
		foreach ($get_sum as $key ) {
			# code...
			$echo = $key->sum_item;
		}

		return $echo;
	}
	public function sumitem_mhsdsn_dosen($item, $angka, $prodi, $ta, $dosen)
	{
		# code...
		$where = array(
			$item => $angka,
			'prodi'=> $prodi,
			'ta' => $ta,
			'kd_dosen'=> $dosen		
		);
		$get_sum = $this->m_kues->get_data_mhsdsn_sum_item($where,$item)->result();
		foreach ($get_sum as $key ) {
			# code...
			$echo = $key->sum_item;
		}

		return $echo;
	}
	public function kues_mhsdsn_prosesrekap()
	{
		$data['lpm'] = $this;
		///cek tabel
		$prodi = $this->input->post('prodi');
		$ta = $this->input->post('ta');
		$cek = $this->cektablelapmhsdsn($prodi, $ta);

		//get list kues
		$data['list_pert'] = $this->m_kues->get_data_all('tbl_kues_mhsdsn_tanya')->result();
		//get nama prodi
		$data['nama_prodi'] = $this->getProdi($prodi);
		$data['prodi'] = $prodi;
		$data['ta'] = $ta;
		if ($cek > 0) {
			# code...

			// get item untk get data per prodi
			$get_md_a1_1 = $this->sumitem_mhsdsn('md_a1','1',$prodi,$ta)*1;
			$get_md_a1_2 = $this->sumitem_mhsdsn('md_a1','2',$prodi,$ta)*2;
			$get_md_a1_3 = $this->sumitem_mhsdsn('md_a1','3',$prodi,$ta)*3;
			$get_md_a1_4 = $this->sumitem_mhsdsn('md_a1','4',$prodi,$ta)*4;
			$get_md_a1_5 = $this->sumitem_mhsdsn('md_a1','5',$prodi,$ta)*5;
			$get_md_a1 = $get_md_a1_1+$get_md_a1_2+$get_md_a1_3+$get_md_a1_4+$get_md_a1_5;
			// $get_md_a1 = $get_md_a1_2+$get_md_a1_3+$get_md_a1_4+$get_md_a1_5;

			$get_md_a2_1 = $this->sumitem_mhsdsn('md_a2','1',$prodi,$ta)*1;
			$get_md_a2_2 = $this->sumitem_mhsdsn('md_a2','2',$prodi,$ta)*2;
			$get_md_a2_3 = $this->sumitem_mhsdsn('md_a2','3',$prodi,$ta)*3;
			$get_md_a2_4 = $this->sumitem_mhsdsn('md_a2','4',$prodi,$ta)*4;
			$get_md_a2_5 = $this->sumitem_mhsdsn('md_a2','5',$prodi,$ta)*5;
			$get_md_a2 = $get_md_a2_1+$get_md_a2_2+$get_md_a2_3+$get_md_a2_4+$get_md_a2_5;
			// $get_md_a2 = $get_md_a2_2+$get_md_a2_3+$get_md_a2_4+$get_md_a2_5;

			$get_md_a3_1 = $this->sumitem_mhsdsn('md_a3','1',$prodi,$ta)*1;
			$get_md_a3_2 = $this->sumitem_mhsdsn('md_a3','2',$prodi,$ta)*2;
			$get_md_a3_3 = $this->sumitem_mhsdsn('md_a3','3',$prodi,$ta)*3;
			$get_md_a3_4 = $this->sumitem_mhsdsn('md_a3','4',$prodi,$ta)*4;
			$get_md_a3_5 = $this->sumitem_mhsdsn('md_a3','5',$prodi,$ta)*5;
			$get_md_a3 = $get_md_a3_1+$get_md_a3_2+$get_md_a3_3+$get_md_a3_4+$get_md_a3_5;
			// $get_md_a3 = $get_md_a3_2+$get_md_a3_3+$get_md_a3_4+$get_md_a3_5;

			$get_md_b1_1 = $this->sumitem_mhsdsn('md_b1','1',$prodi,$ta)*1;
			$get_md_b1_2 = $this->sumitem_mhsdsn('md_b1','2',$prodi,$ta)*2;
			$get_md_b1_3 = $this->sumitem_mhsdsn('md_b1','3',$prodi,$ta)*3;
			$get_md_b1_4 = $this->sumitem_mhsdsn('md_b1','4',$prodi,$ta)*4;
			$get_md_b1_5 = $this->sumitem_mhsdsn('md_b1','5',$prodi,$ta)*5;
			$get_md_b1 = $get_md_b1_1+$get_md_b1_2+$get_md_b1_3+$get_md_b1_4+$get_md_b1_5;
			// $get_md_b1 = $get_md_b1_2+$get_md_b1_3+$get_md_b1_4+$get_md_b1_5;

			$get_md_b2_1 = $this->sumitem_mhsdsn('md_b2','1',$prodi,$ta)*1;
			$get_md_b2_2 = $this->sumitem_mhsdsn('md_b2','2',$prodi,$ta)*2;
			$get_md_b2_3 = $this->sumitem_mhsdsn('md_b2','3',$prodi,$ta)*3;
			$get_md_b2_4 = $this->sumitem_mhsdsn('md_b2','4',$prodi,$ta)*4;
			$get_md_b2_5 = $this->sumitem_mhsdsn('md_b2','5',$prodi,$ta)*5;
			$get_md_b2 = $get_md_b2_1+$get_md_b2_2+$get_md_b2_3+$get_md_b2_4+$get_md_b2_5;
			// $get_md_b2 = $get_md_b2_2+$get_md_b2_3+$get_md_b2_4+$get_md_b2_5;

			$get_md_b3_1 = $this->sumitem_mhsdsn('md_b3','1',$prodi,$ta)*1;
			$get_md_b3_2 = $this->sumitem_mhsdsn('md_b3','2',$prodi,$ta)*2;
			$get_md_b3_3 = $this->sumitem_mhsdsn('md_b3','3',$prodi,$ta)*3;
			$get_md_b3_4 = $this->sumitem_mhsdsn('md_b3','4',$prodi,$ta)*4;
			$get_md_b3_5 = $this->sumitem_mhsdsn('md_b3','5',$prodi,$ta)*5;
			$get_md_b3 = $get_md_b3_1+$get_md_b3_2+$get_md_b3_3+$get_md_b3_4+$get_md_b3_5;
			// $get_md_b3 = $get_md_b3_2+$get_md_b3_3+$get_md_b3_4+$get_md_b3_5;

			$get_md_c1_1 = $this->sumitem_mhsdsn('md_c1','1',$prodi,$ta)*1;
			$get_md_c1_2 = $this->sumitem_mhsdsn('md_c1','2',$prodi,$ta)*2;
			$get_md_c1_3 = $this->sumitem_mhsdsn('md_c1','3',$prodi,$ta)*3;
			$get_md_c1_4 = $this->sumitem_mhsdsn('md_c1','4',$prodi,$ta)*4;
			$get_md_c1_5 = $this->sumitem_mhsdsn('md_c1','5',$prodi,$ta)*5;
			$get_md_c1 = $get_md_c1_1+$get_md_c1_2+$get_md_c1_3+$get_md_c1_4+$get_md_c1_5;
			// $get_md_c1 = $get_md_c1_2+$get_md_c1_3+$get_md_c1_4+$get_md_c1_5;

			$get_md_c2_1 = $this->sumitem_mhsdsn('md_c2','1',$prodi,$ta)*1;
			$get_md_c2_2 = $this->sumitem_mhsdsn('md_c2','2',$prodi,$ta)*2;
			$get_md_c2_3 = $this->sumitem_mhsdsn('md_c2','3',$prodi,$ta)*3;
			$get_md_c2_4 = $this->sumitem_mhsdsn('md_c2','4',$prodi,$ta)*4;
			$get_md_c2_5 = $this->sumitem_mhsdsn('md_c2','5',$prodi,$ta)*5;
			$get_md_c2 = $get_md_c2_1+$get_md_c2_2+$get_md_c2_3+$get_md_c2_4+$get_md_c2_5;
			// $get_md_c2 = $get_md_c2_2+$get_md_c2_3+$get_md_c2_4+$get_md_c2_5;

			$get_md_c3_1 = $this->sumitem_mhsdsn('md_c3','1',$prodi,$ta)*1;
			$get_md_c3_2 = $this->sumitem_mhsdsn('md_c3','2',$prodi,$ta)*2;
			$get_md_c3_3 = $this->sumitem_mhsdsn('md_c3','3',$prodi,$ta)*3;
			$get_md_c3_4 = $this->sumitem_mhsdsn('md_c3','4',$prodi,$ta)*4;
			$get_md_c3_5 = $this->sumitem_mhsdsn('md_c3','5',$prodi,$ta)*5;
			$get_md_c3 = $get_md_c3_1+$get_md_c3_2+$get_md_c3_3+$get_md_c3_4+$get_md_c3_5;
			// $get_md_c3 = $get_md_c3_2+$get_md_c3_3+$get_md_c3_4+$get_md_c3_5;

			$get_md_d1_1 = $this->sumitem_mhsdsn('md_d1','1',$prodi,$ta)*1;
			$get_md_d1_2 = $this->sumitem_mhsdsn('md_d1','2',$prodi,$ta)*2;
			$get_md_d1_3 = $this->sumitem_mhsdsn('md_d1','3',$prodi,$ta)*3;
			$get_md_d1_4 = $this->sumitem_mhsdsn('md_d1','4',$prodi,$ta)*4;
			$get_md_d1_5 = $this->sumitem_mhsdsn('md_d1','5',$prodi,$ta)*5;
			$get_md_d1 = $get_md_d1_1+$get_md_d1_2+$get_md_d1_3+$get_md_d1_4+$get_md_d1_5;
			// $get_md_d1 = $get_md_d1_2+$get_md_d1_3+$get_md_d1_4+$get_md_d1_5;

			$get_md_d2_1 = $this->sumitem_mhsdsn('md_d2','1',$prodi,$ta)*1;
			$get_md_d2_2 = $this->sumitem_mhsdsn('md_d2','2',$prodi,$ta)*2;
			$get_md_d2_3 = $this->sumitem_mhsdsn('md_d2','3',$prodi,$ta)*3;
			$get_md_d2_4 = $this->sumitem_mhsdsn('md_d2','4',$prodi,$ta)*4;
			$get_md_d2_5 = $this->sumitem_mhsdsn('md_d2','5',$prodi,$ta)*5;
			$get_md_d2 = $get_md_d2_1+$get_md_d2_2+$get_md_d2_3+$get_md_d2_4+$get_md_d2_5;
			// $get_md_d2 = $get_md_d2_2+$get_md_d2_3+$get_md_d2_4+$get_md_d2_5;

			$get_md_d3_1 = $this->sumitem_mhsdsn('md_d3','1',$prodi,$ta)*1;
			$get_md_d3_2 = $this->sumitem_mhsdsn('md_d3','2',$prodi,$ta)*2;
			$get_md_d3_3 = $this->sumitem_mhsdsn('md_d3','3',$prodi,$ta)*3;
			$get_md_d3_4 = $this->sumitem_mhsdsn('md_d3','4',$prodi,$ta)*4;
			$get_md_d3_5 = $this->sumitem_mhsdsn('md_d3','5',$prodi,$ta)*5;
			$get_md_d3 = $get_md_d3_1+$get_md_d3_2+$get_md_d3_3+$get_md_d3_4+$get_md_d3_5;
			// $get_md_d3 = $get_md_d3_2+$get_md_d3_3+$get_md_d3_4+$get_md_d3_5;

			$get_md_e1_1 = $this->sumitem_mhsdsn('md_e1','1',$prodi,$ta)*1;
			$get_md_e1_2 = $this->sumitem_mhsdsn('md_e1','2',$prodi,$ta)*2;
			$get_md_e1_3 = $this->sumitem_mhsdsn('md_e1','3',$prodi,$ta)*3;
			$get_md_e1_4 = $this->sumitem_mhsdsn('md_e1','4',$prodi,$ta)*4;
			$get_md_e1_5 = $this->sumitem_mhsdsn('md_e1','5',$prodi,$ta)*5;
			$get_md_e1 = $get_md_e1_1+$get_md_e1_2+$get_md_e1_3+$get_md_e1_4+$get_md_e1_5;
			// $get_md_e1 = $get_md_e1_2+$get_md_e1_3+$get_md_e1_4+$get_md_e1_5;

			$get_md_e2_1 = $this->sumitem_mhsdsn('md_e2','1',$prodi,$ta)*1;
			$get_md_e2_2 = $this->sumitem_mhsdsn('md_e2','2',$prodi,$ta)*2;
			$get_md_e2_3 = $this->sumitem_mhsdsn('md_e2','3',$prodi,$ta)*3;
			$get_md_e2_4 = $this->sumitem_mhsdsn('md_e2','4',$prodi,$ta)*4;
			$get_md_e2_5 = $this->sumitem_mhsdsn('md_e2','5',$prodi,$ta)*5;
			$get_md_e2 = $get_md_e2_1+$get_md_e2_2+$get_md_e2_3+$get_md_e2_4+$get_md_e2_5;
			// $get_md_e2 = $get_md_e2_2+$get_md_e2_3+$get_md_e2_4+$get_md_e2_5;

			$get_md_e3_1 = $this->sumitem_mhsdsn('md_e3','1',$prodi,$ta)*1;
			$get_md_e3_2 = $this->sumitem_mhsdsn('md_e3','2',$prodi,$ta)*2;
			$get_md_e3_3 = $this->sumitem_mhsdsn('md_e3','3',$prodi,$ta)*3;
			$get_md_e3_4 = $this->sumitem_mhsdsn('md_e3','4',$prodi,$ta)*4;
			$get_md_e3_5 = $this->sumitem_mhsdsn('md_e3','5',$prodi,$ta)*5;
			$get_md_e3 = $get_md_e3_1+$get_md_e3_2+$get_md_e3_3+$get_md_e3_4+$get_md_e3_5;
			// $get_md_e3 = $get_md_e3_2+$get_md_e3_3+$get_md_e3_4+$get_md_e3_5;

			$data['send_item_per_prodi'] = $get_md_a1.",".$get_md_a2.",".$get_md_a3.",".$get_md_b1.",".$get_md_b2.",".$get_md_b3.",".$get_md_c1.",".$get_md_c2.",".$get_md_c3.",".$get_md_d1.",".$get_md_d2.",".$get_md_d3.",".$get_md_e1.",".$get_md_e2.",".$get_md_e3;

			//get data dosen
			$where = array(
			'tbl_kues_mhsdsn.prodi' => $prodi,
			'tbl_kues_mhsdsn.ta' => $ta,		
			);
			$data['select_dosen'] = $this->m_kues->get_data_distinct_dosen($where)->result();

		} else {
		$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><b>Error, Data tidak ditemukan silakan lakukan update data pada menu Kuesioner>update data atau tekan tombol ini</b><a href='kues_mhsdsn_update'<button type='button' class='btn btn-block btn-primary'>Halaman Update Data</button></a></div>");
		}
		$this->load->view('lpm/header');
		$this->load->view('lpm/kues_mhsdsn_rekap');
		$this->load->view('lpm/kues_mhsdsn_rekap_cek',$data);
		$this->load->view('lpm/footer');
		$this->load->view('lpm/kues_mhsdsn_rekap_cek_js',$data);
	}
	public function kues_mhsdsn_prosesrekap_dosen($kddosen, $prodi, $ta)
	{
		$data['lpm'] = $this;
		///cek tabel
		// $prodi = $this->input->post('prodi');
		// $ta = $this->input->post('ta');
		$cek = $this->cektablelapmhsdsn($prodi, $ta);

		//get list kues
		$data['list_pert'] = $this->m_kues->get_data_all('tbl_kues_mhsdsn_tanya')->result();
		//get nama prodi
		$data['nama_prodi'] = $this->getProdi($prodi);
		$data['prodi'] = $prodi;
		$data['ta'] = $ta;
		$data['nama_dosen'] = $this->getNamaDosen($kddosen);
		$data['kd_dosen'] = $kddosen;
		if ($cek > 0) {
			# code...

			// get item untk get data per prodi
			// $get_md_a1_1 = $this->sumitem_mhsdsn_dosen('md_a1','1',$prodi,$ta,$kddosen)*1;
			$get_md_a1_2 = $this->sumitem_mhsdsn_dosen('md_a1','2',$prodi,$ta,$kddosen)*2;
			$get_md_a1_3 = $this->sumitem_mhsdsn_dosen('md_a1','3',$prodi,$ta,$kddosen)*3;
			$get_md_a1_4 = $this->sumitem_mhsdsn_dosen('md_a1','4',$prodi,$ta,$kddosen)*4;
			$get_md_a1_5 = $this->sumitem_mhsdsn_dosen('md_a1','5',$prodi,$ta,$kddosen)*5;
			// $get_md_a1 = $get_md_a1_1+$get_md_a1_2+$get_md_a1_3+$get_md_a1_4+$get_md_a1_5;
			$get_md_a1 = $get_md_a1_2+$get_md_a1_3+$get_md_a1_4+$get_md_a1_5;

			// $get_md_a2_1 = $this->sumitem_mhsdsn_dosen('md_a2','1',$prodi,$ta,$kddosen)*1;
			$get_md_a2_2 = $this->sumitem_mhsdsn_dosen('md_a2','2',$prodi,$ta,$kddosen)*2;
			$get_md_a2_3 = $this->sumitem_mhsdsn_dosen('md_a2','3',$prodi,$ta,$kddosen)*3;
			$get_md_a2_4 = $this->sumitem_mhsdsn_dosen('md_a2','4',$prodi,$ta,$kddosen)*4;
			$get_md_a2_5 = $this->sumitem_mhsdsn_dosen('md_a2','5',$prodi,$ta,$kddosen)*5;
			// $get_md_a2 = $get_md_a2_1+$get_md_a2_2+$get_md_a2_3+$get_md_a2_4+$get_md_a2_5;
			$get_md_a2 = $get_md_a2_2+$get_md_a2_3+$get_md_a2_4+$get_md_a2_5;

			// $get_md_a3_1 = $this->sumitem_mhsdsn_dosen('md_a3','1',$prodi,$ta,$kddosen)*1;
			$get_md_a3_2 = $this->sumitem_mhsdsn_dosen('md_a3','2',$prodi,$ta,$kddosen)*2;
			$get_md_a3_3 = $this->sumitem_mhsdsn_dosen('md_a3','3',$prodi,$ta,$kddosen)*3;
			$get_md_a3_4 = $this->sumitem_mhsdsn_dosen('md_a3','4',$prodi,$ta,$kddosen)*4;
			$get_md_a3_5 = $this->sumitem_mhsdsn_dosen('md_a3','5',$prodi,$ta,$kddosen)*5;
			// $get_md_a3 = $get_md_a3_1+$get_md_a3_2+$get_md_a3_3+$get_md_a3_4+$get_md_a3_5;
			$get_md_a3 = $get_md_a3_2+$get_md_a3_3+$get_md_a3_4+$get_md_a3_5;

			// $get_md_b1_1 = $this->sumitem_mhsdsn_dosen('md_b1','1',$prodi,$ta,$kddosen)*1;
			$get_md_b1_2 = $this->sumitem_mhsdsn_dosen('md_b1','2',$prodi,$ta,$kddosen)*2;
			$get_md_b1_3 = $this->sumitem_mhsdsn_dosen('md_b1','3',$prodi,$ta,$kddosen)*3;
			$get_md_b1_4 = $this->sumitem_mhsdsn_dosen('md_b1','4',$prodi,$ta,$kddosen)*4;
			$get_md_b1_5 = $this->sumitem_mhsdsn_dosen('md_b1','5',$prodi,$ta,$kddosen)*5;
			// $get_md_b1 = $get_md_b1_1+$get_md_b1_2+$get_md_b1_3+$get_md_b1_4+$get_md_b1_5;
			$get_md_b1 = $get_md_b1_2+$get_md_b1_3+$get_md_b1_4+$get_md_b1_5;

			// $get_md_b2_1 = $this->sumitem_mhsdsn_dosen('md_b2','1',$prodi,$ta,$kddosen)*1;
			$get_md_b2_2 = $this->sumitem_mhsdsn_dosen('md_b2','2',$prodi,$ta,$kddosen)*2;
			$get_md_b2_3 = $this->sumitem_mhsdsn_dosen('md_b2','3',$prodi,$ta,$kddosen)*3;
			$get_md_b2_4 = $this->sumitem_mhsdsn_dosen('md_b2','4',$prodi,$ta,$kddosen)*4;
			$get_md_b2_5 = $this->sumitem_mhsdsn_dosen('md_b2','5',$prodi,$ta,$kddosen)*5;
			// $get_md_b2 = $get_md_b2_1+$get_md_b2_2+$get_md_b2_3+$get_md_b2_4+$get_md_b2_5;
			$get_md_b2 = $get_md_b2_2+$get_md_b2_3+$get_md_b2_4+$get_md_b2_5;

			// $get_md_b3_1 = $this->sumitem_mhsdsn_dosen('md_b3','1',$prodi,$ta,$kddosen)*1;
			$get_md_b3_2 = $this->sumitem_mhsdsn_dosen('md_b3','2',$prodi,$ta,$kddosen)*2;
			$get_md_b3_3 = $this->sumitem_mhsdsn_dosen('md_b3','3',$prodi,$ta,$kddosen)*3;
			$get_md_b3_4 = $this->sumitem_mhsdsn_dosen('md_b3','4',$prodi,$ta,$kddosen)*4;
			$get_md_b3_5 = $this->sumitem_mhsdsn_dosen('md_b3','5',$prodi,$ta,$kddosen)*5;
			// $get_md_b3 = $get_md_b3_1+$get_md_b3_2+$get_md_b3_3+$get_md_b3_4+$get_md_b3_5;
			$get_md_b3 = $get_md_b3_2+$get_md_b3_3+$get_md_b3_4+$get_md_b3_5;

			// $get_md_c1_1 = $this->sumitem_mhsdsn_dosen('md_c1','1',$prodi,$ta,$kddosen)*1;
			$get_md_c1_2 = $this->sumitem_mhsdsn_dosen('md_c1','2',$prodi,$ta,$kddosen)*2;
			$get_md_c1_3 = $this->sumitem_mhsdsn_dosen('md_c1','3',$prodi,$ta,$kddosen)*3;
			$get_md_c1_4 = $this->sumitem_mhsdsn_dosen('md_c1','4',$prodi,$ta,$kddosen)*4;
			$get_md_c1_5 = $this->sumitem_mhsdsn_dosen('md_c1','5',$prodi,$ta,$kddosen)*5;
			// $get_md_c1 = $get_md_c1_1+$get_md_c1_2+$get_md_c1_3+$get_md_c1_4+$get_md_c1_5;
			$get_md_c1 = $get_md_c1_2+$get_md_c1_3+$get_md_c1_4+$get_md_c1_5;

			// $get_md_c2_1 = $this->sumitem_mhsdsn_dosen('md_c2','1',$prodi,$ta,$kddosen)*1;
			$get_md_c2_2 = $this->sumitem_mhsdsn_dosen('md_c2','2',$prodi,$ta,$kddosen)*2;
			$get_md_c2_3 = $this->sumitem_mhsdsn_dosen('md_c2','3',$prodi,$ta,$kddosen)*3;
			$get_md_c2_4 = $this->sumitem_mhsdsn_dosen('md_c2','4',$prodi,$ta,$kddosen)*4;
			$get_md_c2_5 = $this->sumitem_mhsdsn_dosen('md_c2','5',$prodi,$ta,$kddosen)*5;
			// $get_md_c2 = $get_md_c2_1+$get_md_c2_2+$get_md_c2_3+$get_md_c2_4+$get_md_c2_5;
			$get_md_c2 = $get_md_c2_2+$get_md_c2_3+$get_md_c2_4+$get_md_c2_5;

			// $get_md_c3_1 = $this->sumitem_mhsdsn_dosen('md_c3','1',$prodi,$ta,$kddosen)*1;
			$get_md_c3_2 = $this->sumitem_mhsdsn_dosen('md_c3','2',$prodi,$ta,$kddosen)*2;
			$get_md_c3_3 = $this->sumitem_mhsdsn_dosen('md_c3','3',$prodi,$ta,$kddosen)*3;
			$get_md_c3_4 = $this->sumitem_mhsdsn_dosen('md_c3','4',$prodi,$ta,$kddosen)*4;
			$get_md_c3_5 = $this->sumitem_mhsdsn_dosen('md_c3','5',$prodi,$ta,$kddosen)*5;
			// $get_md_c3 = $get_md_c3_1+$get_md_c3_2+$get_md_c3_3+$get_md_c3_4+$get_md_c3_5;
			$get_md_c3 = $get_md_c3_2+$get_md_c3_3+$get_md_c3_4+$get_md_c3_5;

			// $get_md_d1_1 = $this->sumitem_mhsdsn_dosen('md_d1','1',$prodi,$ta,$kddosen)*1;
			$get_md_d1_2 = $this->sumitem_mhsdsn_dosen('md_d1','2',$prodi,$ta,$kddosen)*2;
			$get_md_d1_3 = $this->sumitem_mhsdsn_dosen('md_d1','3',$prodi,$ta,$kddosen)*3;
			$get_md_d1_4 = $this->sumitem_mhsdsn_dosen('md_d1','4',$prodi,$ta,$kddosen)*4;
			$get_md_d1_5 = $this->sumitem_mhsdsn_dosen('md_d1','5',$prodi,$ta,$kddosen)*5;
			// $get_md_d1 = $get_md_d1_1+$get_md_d1_2+$get_md_d1_3+$get_md_d1_4+$get_md_d1_5;
			$get_md_d1 = $get_md_d1_2+$get_md_d1_3+$get_md_d1_4+$get_md_d1_5;

			// $get_md_d2_1 = $this->sumitem_mhsdsn_dosen('md_d2','1',$prodi,$ta,$kddosen)*1;
			$get_md_d2_2 = $this->sumitem_mhsdsn_dosen('md_d2','2',$prodi,$ta,$kddosen)*2;
			$get_md_d2_3 = $this->sumitem_mhsdsn_dosen('md_d2','3',$prodi,$ta,$kddosen)*3;
			$get_md_d2_4 = $this->sumitem_mhsdsn_dosen('md_d2','4',$prodi,$ta,$kddosen)*4;
			$get_md_d2_5 = $this->sumitem_mhsdsn_dosen('md_d2','5',$prodi,$ta,$kddosen)*5;
			// $get_md_d2 = $get_md_d2_1+$get_md_d2_2+$get_md_d2_3+$get_md_d2_4+$get_md_d2_5;
			$get_md_d2 = $get_md_d2_2+$get_md_d2_3+$get_md_d2_4+$get_md_d2_5;

			// $get_md_d3_1 = $this->sumitem_mhsdsn_dosen('md_d3','1',$prodi,$ta,$kddosen)*1;
			$get_md_d3_2 = $this->sumitem_mhsdsn_dosen('md_d3','2',$prodi,$ta,$kddosen)*2;
			$get_md_d3_3 = $this->sumitem_mhsdsn_dosen('md_d3','3',$prodi,$ta,$kddosen)*3;
			$get_md_d3_4 = $this->sumitem_mhsdsn_dosen('md_d3','4',$prodi,$ta,$kddosen)*4;
			$get_md_d3_5 = $this->sumitem_mhsdsn_dosen('md_d3','5',$prodi,$ta,$kddosen)*5;
			// $get_md_d3 = $get_md_d3_1+$get_md_d3_2+$get_md_d3_3+$get_md_d3_4+$get_md_d3_5;
			$get_md_d3 = $get_md_d3_2+$get_md_d3_3+$get_md_d3_4+$get_md_d3_5;

			// $get_md_e1_1 = $this->sumitem_mhsdsn_dosen('md_e1','1',$prodi,$ta,$kddosen)*1;
			$get_md_e1_2 = $this->sumitem_mhsdsn_dosen('md_e1','2',$prodi,$ta,$kddosen)*2;
			$get_md_e1_3 = $this->sumitem_mhsdsn_dosen('md_e1','3',$prodi,$ta,$kddosen)*3;
			$get_md_e1_4 = $this->sumitem_mhsdsn_dosen('md_e1','4',$prodi,$ta,$kddosen)*4;
			$get_md_e1_5 = $this->sumitem_mhsdsn_dosen('md_e1','5',$prodi,$ta,$kddosen)*5;
			// $get_md_e1 = $get_md_e1_1+$get_md_e1_2+$get_md_e1_3+$get_md_e1_4+$get_md_e1_5;
			$get_md_e1 = $get_md_e1_2+$get_md_e1_3+$get_md_e1_4+$get_md_e1_5;

			// $get_md_e2_1 = $this->sumitem_mhsdsn_dosen('md_e2','1',$prodi,$ta,$kddosen)*1;
			$get_md_e2_2 = $this->sumitem_mhsdsn_dosen('md_e2','2',$prodi,$ta,$kddosen)*2;
			$get_md_e2_3 = $this->sumitem_mhsdsn_dosen('md_e2','3',$prodi,$ta,$kddosen)*3;
			$get_md_e2_4 = $this->sumitem_mhsdsn_dosen('md_e2','4',$prodi,$ta,$kddosen)*4;
			$get_md_e2_5 = $this->sumitem_mhsdsn_dosen('md_e2','5',$prodi,$ta,$kddosen)*5;
			// $get_md_e2 = $get_md_e2_1+$get_md_e2_2+$get_md_e2_3+$get_md_e2_4+$get_md_e2_5;
			$get_md_e2 = $get_md_e2_2+$get_md_e2_3+$get_md_e2_4+$get_md_e2_5;

			// $get_md_e3_1 = $this->sumitem_mhsdsn_dosen('md_e3','1',$prodi,$ta,$kddosen)*1;
			$get_md_e3_2 = $this->sumitem_mhsdsn_dosen('md_e3','2',$prodi,$ta,$kddosen)*2;
			$get_md_e3_3 = $this->sumitem_mhsdsn_dosen('md_e3','3',$prodi,$ta,$kddosen)*3;
			$get_md_e3_4 = $this->sumitem_mhsdsn_dosen('md_e3','4',$prodi,$ta,$kddosen)*4;
			$get_md_e3_5 = $this->sumitem_mhsdsn_dosen('md_e3','5',$prodi,$ta,$kddosen)*5;
			// $get_md_e3 = $get_md_e3_1+$get_md_e3_2+$get_md_e3_3+$get_md_e3_4+$get_md_e3_5;
			$get_md_e3 = $get_md_e3_2+$get_md_e3_3+$get_md_e3_4+$get_md_e3_5;

			$data['send_item_per_prodi'] = $get_md_a1.",".$get_md_a2.",".$get_md_a3.",".$get_md_b1.",".$get_md_b2.",".$get_md_b3.",".$get_md_c1.",".$get_md_c2.",".$get_md_c3.",".$get_md_d1.",".$get_md_d2.",".$get_md_d3.",".$get_md_e1.",".$get_md_e2.",".$get_md_e3;

			//get data dosen
			$where = array(
			'tbl_kues_mhsdsn.prodi' => $prodi,
			'tbl_kues_mhsdsn.ta' => $ta,		
			);
			$data['select_dosen'] = $this->m_kues->get_data_distinct_dosen($where)->result();

		} else {
		$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><b>Error, Data tidak ditemukan silakan lakukan update data pada menu Kuesioner>update data atau tekan tombol ini</b><a href='kues_mhsdsn_update'<button type='button' class='btn btn-block btn-primary'>Halaman Update Data</button></a></div>");
		}
		$this->load->view('lpm/header');
		// $this->load->view('lpm/kues_mhsdsn_rekap');
		$this->load->view('lpm/kues_mhsdsn_rekap_cek_dosen',$data);
		$this->load->view('lpm/footer');
		$this->load->view('lpm/kues_mhsdsn_rekap_cek_dosen_js',$data);
	}
	public function kues_mhsdsn_prosesupdate()
	{
		# code...
		$data['lpm'] = $this;
		$prodi = $this->input->post('prodi');
		$ta = $this->input->post('ta');
		$where = array(
			'tbl_kues_mhsdsn.prodi' => $prodi,
			'tbl_kues_mhsdsn.ta' => $ta,		
		);
		$data['select_dosen'] = $this->m_kues->get_data_distinct_dosen($where)->result();

		$this->load->view('lpm/header');
		$this->load->view('lpm/kues_mhsdsn_updatedata');
		$this->load->view('lpm/kues_mhsdsn_updatedata_cek',$data);
		$this->load->view('lpm/footer');
	}
	public function kues_mhsdsn_get_count_makul($kddosen, $ta)
	{
		#code...
		$where = array(
			'tbl_kues_mhsdsn.kd_dosen' => $kddosen,
			'tbl_kues_mhsdsn.ta' => $ta,		
		);
		$data = $this->m_kues->get_data_mhsdsn_count_makul($where)->result();
		foreach ($data as $key) {
			# code...
			$sendx = $key->jml_makul;
		}

		return $sendx;

	}
	public function kues_mhsdsn_get_count_responden($kddosen, $ta)
	{
		# code...
		$where = array(
			'tbl_kues_mhsdsn.kd_dosen' => $kddosen,
			'tbl_kues_mhsdsn.ta' => $ta		
		);
		$data = $this->m_kues->get_data_mhsdsn_count_responden($where)->result();
		foreach ($data as $key) {
			# code...
			$send = $key->jml_mhs;
		}

		return $send;

	}
	public function kues_mhsdsn_get_count_item($kddosen, $ta, $item, $nilai_item)
	{
		# code...
		$where = array(
			'tbl_kues_mhsdsn.kd_dosen' => $kddosen,
			'tbl_kues_mhsdsn.ta' => $ta,
			'tbl_kues_mhsdsn.'.$item => $nilai_item,		
		);
		$data = $this->m_kues->get_data_mhsdsn_count_item($where, 'tbl_kues_mhsdsn.'.$item)->result();
		foreach ($data as $key) {
			# code...
			$send = $key->jml_item;
		}

		return $send;

	}
	public function countitem_persentase_mhsdsn($item,$prodi,$ta,$angka)
	{
		# code...
		//cari total seluruh item per prodi
		$where1 = array(
			'tbl_kues_mhsdsn.prodi' => $prodi,
			'tbl_kues_mhsdsn.ta' => $ta,		
		);
		$data = $this->m_kues->get_data_mhsdsn_count_item($where1, 'tbl_kues_mhsdsn.'.$item)->result();
		foreach ($data as $key) {
			# code...
			$total_seluruh = $key->jml_item;
		}

		// cari total seluruh item per prodi dengan nilai 1
		$where_1 = array(
			'tbl_kues_mhsdsn.prodi' => $prodi,
			'tbl_kues_mhsdsn.ta' => $ta,
			'tbl_kues_mhsdsn.'.$item => $angka,		
		);
		$data1 = $this->m_kues->get_data_mhsdsn_count_item($where_1, 'tbl_kues_mhsdsn.'.$item)->result();
		foreach ($data1 as $key) {
			# code...
			$total_item1 = $key->jml_item;
		}
		
		
		$send	= ($total_item1/$total_seluruh)*100;

		return $send;
	}
	public function countitem_persentase_mhsdsn_dosen($item,$prodi,$ta,$angka,$dosen)
	{
		# code...
		//cari total seluruh item per prodi
		$where1 = array(
			'tbl_kues_mhsdsn.prodi' => $prodi,
			'tbl_kues_mhsdsn.ta' => $ta,
			'tbl_kues_mhsdsn.kd_dosen' => $dosen,		
		);
		$data = $this->m_kues->get_data_mhsdsn_count_item($where1, 'tbl_kues_mhsdsn.'.$item)->result();
		foreach ($data as $key) {
			# code...
			$total_seluruh = $key->jml_item;
		}

		// cari total seluruh item per prodi dengan nilai 1
		$where_1 = array(
			'tbl_kues_mhsdsn.prodi' => $prodi,
			'tbl_kues_mhsdsn.ta' => $ta,
			'tbl_kues_mhsdsn.kd_dosen' => $dosen,
			'tbl_kues_mhsdsn.'.$item => $angka,		
		);
		$data1 = $this->m_kues->get_data_mhsdsn_count_item($where_1, 'tbl_kues_mhsdsn.'.$item)->result();
		foreach ($data1 as $key) {
			# code...
			$total_item1 = $key->jml_item;
		}
		
		
		$send	= ($total_item1/$total_seluruh)*100;

		return $send;
	}
	public function kues_mhsdsn_run_update($kddosen, $ta, $prodi)
	{
		# code...
		$cek = $this->cektablelapmhsdsn_dsn($kddosen, $ta);
		if ($cek > 0) {
			# code...
			//jika data ada di tabel delete terlebih dahulu
			$where_del = array(
			'kd_dosen' => $kddosen,
			'ta' => $ta,		
			);
			$this->m_kues->delete_data($where_del,'tbl_kues_lap_mhsdsn');

			// input data baru ke tabel


			//buat array skala skor
			$skala = array(
				'STS' => "1",
				'TS' => "2",
				'KS' => "3",
				'S' => "4",
				'SS' => "5",
			);

			//input ke tabel
			$result = array();
			foreach ($skala as $key => $value) {
				# code...
				$result[] = array(
		        "kd_dosen"  	=> $kddosen,
		        "prodi"  		=> $prodi,
		        "jml_makul"  	=> $this->kues_mhsdsn_get_count_makul($kddosen,$ta),
		        "jml_responden"	=> $this->kues_mhsdsn_get_count_responden($kddosen,$ta),
		        "skala"			=> $key,
		        "md_a1"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_a1',$value),
		        "md_a2"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_a2',$value),
		        "md_a3"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_a3',$value),
		        "md_b1"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_b1',$value),
		        "md_b2"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_b2',$value),
		        "md_b3"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_b3',$value),
		        "md_c1"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_c1',$value),
		        "md_c2"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_c2',$value),
		        "md_c3"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_c3',$value),
		        "md_d1"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_d1',$value),
		        "md_d2"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_d2',$value),
		        "md_d3"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_d3',$value),
		        "md_e1"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_e1',$value),
		        "md_e2"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_e2',$value),
		        "md_e3"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_e3',$value),
		        "ta"			=> $ta
		         );
			}
			$res = $this->m_kues->insert_data_batch('tbl_kues_lap_mhsdsn',$result);
			if($res==true)
			 {
				$this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'><b>Berhasil, Data berhasil ditambahkan</b></div>"); 
			 }else{
				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><b>Error, Data Gagal ditambahkan</b></div>"); 
			 }
			$this->kues_mhsdsn_update();
		} else {

			//buat array skala skor
			$skala = array(
				'STS' => "1",
				'TS' => "2",
				'KS' => "3",
				'S' => "4",
				'SS' => "5",
			);

			//input ke tabel
			$result = array();
			foreach ($skala as $key => $value) {
				# code...
				$result[] = array(
		        "kd_dosen"  	=> $kddosen,
		        "prodi"  		=> $prodi,
		        "jml_makul"  	=> $this->kues_mhsdsn_get_count_makul($kddosen,$ta),
		        "jml_responden"	=> $this->kues_mhsdsn_get_count_responden($kddosen,$ta),
		        "skala"			=> $key,
		        "md_a1"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_a1',$value),
		        "md_a2"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_a2',$value),
		        "md_a3"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_a3',$value),
		        "md_b1"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_b1',$value),
		        "md_b2"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_b2',$value),
		        "md_b3"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_b3',$value),
		        "md_c1"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_c1',$value),
		        "md_c2"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_c2',$value),
		        "md_c3"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_c3',$value),
		        "md_d1"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_d1',$value),
		        "md_d2"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_d2',$value),
		        "md_d3"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_d3',$value),
		        "md_e1"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_e1',$value),
		        "md_e2"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_e2',$value),
		        "md_e3"			=> $this->kues_mhsdsn_get_count_item($kddosen,$ta,'md_e3',$value),
		        "ta"			=> $ta
		         );
			}
			$res = $this->m_kues->insert_data_batch('tbl_kues_lap_mhsdsn',$result);
			if($res==true)
			 {
				$this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'><b>Berhasil, Data berhasil ditambahkan</b></div>"); 
			 }else{
				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><b>Error, Data Gagal ditambahkan</b></div>"); 
			 }
			$this->kues_mhsdsn_update();
		}
	}


////////////////////////////////////TEKNIK BARU BIAR PAS 100% ///////////////////////////////////////////////
	 // Fungsi untuk menghitung persentase dan menyesuaikan selisih agar total 100%
    private function adjustPercentages($percentages) {
        $rounded = array_map('round', $percentages);  // Membulatkan setiap nilai
        $difference = 100 - array_sum($rounded);      // Hitung selisih dari 100%

        // Distribusikan selisih, jika ada
        for ($i = 0; $i < abs($difference); $i++) {
            $index = $difference > 0 ? array_search(min($rounded), $rounded) : array_search(max($rounded), $rounded);
            $rounded[$index] += $difference > 0 ? 1 : -1;
        }

        return $rounded;
    }
////////////////////////////////////.TEKNIK BARU BIAR PAS 100% ///////////////////////////////////////////////

	public function jajal()
	{
		# code...
		$data['skala'] = array(
				'STS' => "1",
				'TS' => "2",
				'KS' => "3",
				'S' => "4",
				'SS' => "5",
			);

		$data['makul'] = $this->kues_mhsdsn_get_count_makul("0618097003","20202");

		$this->load->view('lpm/kues_mhsdsn_jajal',$data);
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'administrasi?pesan=logout');
	}

	///////////////////////////////////////////////////////MHS -> LEMBAGA ///////////////////////////////////////////////////////////
	public function sumitem_mhslem_lemdik($item, $angka, $prodi, $ta)
	{
		# code...
		$where = array(
			$item => $angka,
			'prodi'=> $prodi,
			'ta' => $ta,	
		);
		$get_sum = $this->m_kues->get_data_mhsdsn_sum_item($where,$item)->result();
		foreach ($get_sum as $key ) {
			# code...
			$echo = $key->sum_item;
		}

		return $echo;
	}
	public function sumitem_mhslem($item, $skala, $prodi, $ta)
	{
		# code...
		$where = array(
			'skala' => $skala,
			'prodi'=> $prodi,
			'ta' => $ta		
		);
		$get_sum = $this->m_kues->get_data_mhslem_sum_item($where,$item)->result();
		foreach ($get_sum as $key ) {
			# code...
			$echo = $key->sum_item;
		}

		return $echo;
	}
	public function kues_mhslem_update()
	{
		$data['cektabel'] = $this->m_kues->get_data_all('tbl_kues_lap_mhslem')->num_rows();
		$where = array(
			'tbl_kues_lap_mhslem.id_lap_mhslem >' => '0',		
		);
		$data['cekstat'] = $this->m_kues->get_data_distinct_mhslem_stats($where)->result();	
		$this->load->view('lpm/header');
		$this->load->view('lpm/kues_mhslem_updatedata',$data);
		$this->load->view('lpm/footer');
	}
	public function kues_mhslem_rekap()
	{
		$data['gettanya'] = $this->m_kues->get_data_all('tbl_kues_mhslem_tanya')->result();
		$this->load->view('lpm/header');
		$this->load->view('lpm/kues_mhslem_rekap',$data);
		$this->load->view('lpm/footer');
	}
	public function cektablelapmhslem($prodi, $ta)
	{
		# code...
		$where = array(
			'prodi' => $prodi,
			'ta' => $ta,		
		);

		$cektabel = $this->m_kues->get_data($where,'tbl_kues_lap_mhslem')->num_rows();
		return $cektabel;

	}
	public function kues_mhslem_get_count_responden($prodi, $ta)
	{
		# code...
		$where = array(
			'tbl_kues_mhslem.prodi' => $prodi,
			'tbl_kues_mhslem.ta' => $ta		
		);
		$data = $this->m_kues->get_data_mhslem_count_responden($where)->result();
		foreach ($data as $key) {
			# code...
			$send = $key->jml_mhs;
		}

		return $send;

	}
	public function kues_mhslem_get_count_item($prodi, $ta, $item, $nilai_item)
	{
		# code...
		$where = array(
			'tbl_kues_mhslem.prodi' => $prodi,
			'tbl_kues_mhslem.ta' => $ta,
			'tbl_kues_mhslem.'.$item => $nilai_item,		
		);
		$data = $this->m_kues->get_data_mhslem_count_item($where, 'tbl_kues_mhslem.'.$item)->result();
		foreach ($data as $key) {
			# code...
			$send = $key->jml_item;
		}

		return $send;

	}
	public function kues_mhslem_run_update()
	{
		# code...
		$fak	= $this->input->post('fak');
		$prodi  = $this->input->post('prodi');
		$ta 	= $this->input->post('ta');


		$cek = $this->cektablelapmhslem($prodi, $ta);
		if ($cek > 0) {
			# code...
			//jika data ada di tabel delete terlebih dahulu
			$where_del = array(
			'prodi' => $prodi,
			'ta' => $ta,		
			);
			$this->m_kues->delete_data($where_del,'tbl_kues_lap_mhslem');

			// input data baru ke tabel


			//buat array skala skor
			$skala = array(
				'STS' => "1",
				'TS' => "2",
				'KS' => "3",
				'S' => "4",
				'SS' => "5",
			);

			//input ke tabel
			$result = array();
			foreach ($skala as $key => $value) {
				# code...
				$result[] = array(
				"fak"  			=> $fak,
		        "prodi"  		=> $prodi,
		        "jml_responden"	=> $this->kues_mhslem_get_count_responden($prodi,$ta),
		        "skala"			=> $key,
		        "ml_1a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1a',$value),
		        "ml_1b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1b',$value),
		        "ml_1c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1c',$value),
		        "ml_1d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1d',$value),
		        "ml_1e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1e',$value),
		        "ml_1f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1f',$value),
		        "ml_1g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1g',$value),
		        "ml_1h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1h',$value),
		        "ml_1i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1i',$value),
		        "ml_1j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1j',$value),
		        "ml_1k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1k',$value),
		        "ml_1l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1l',$value),
		        "ml_1m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1m',$value),
		        "ml_1n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1n',$value),
		        "ml_1o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1o',$value),
		         "ml_2a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2a',$value),
		        "ml_2b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2b',$value),
		        "ml_2c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2c',$value),
		        "ml_2d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2d',$value),
		        "ml_2e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2e',$value),
		        "ml_2f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2f',$value),
		        "ml_2g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2g',$value),
		        "ml_2h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2h',$value),
		        "ml_2i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2i',$value),
		        "ml_2j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2j',$value),
		        "ml_2k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2k',$value),
		        "ml_2l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2l',$value),
		        "ml_2m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2m',$value),
		        "ml_2n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2n',$value),
		        "ml_2o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2o',$value),
		         "ml_3a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3a',$value),
		        "ml_3b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3b',$value),
		        "ml_3c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3c',$value),
		        "ml_3d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3d',$value),
		        "ml_3e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3e',$value),
		        "ml_3f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3f',$value),
		        "ml_3g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3g',$value),
		        "ml_3h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3h',$value),
		        "ml_3i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3i',$value),
		        "ml_3j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3j',$value),
		        "ml_3k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3k',$value),
		        "ml_3l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3l',$value),
		        "ml_3m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3m',$value),
		        "ml_3n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3n',$value),
		        "ml_3o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3o',$value),
		         "ml_4a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4a',$value),
		        "ml_4b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4b',$value),
		        "ml_4c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4c',$value),
		        "ml_4d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4d',$value),
		        "ml_4e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4e',$value),
		        "ml_4f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4f',$value),
		        "ml_4g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4g',$value),
		        "ml_4h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4h',$value),
		        "ml_4i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4i',$value),
		        "ml_4j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4j',$value),
		        "ml_4k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4k',$value),
		        "ml_4l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4l',$value),
		        "ml_4m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4m',$value),
		        "ml_4n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4n',$value),
		        "ml_4o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4o',$value),
		         "ml_5a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5a',$value),
		        "ml_5b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5b',$value),
		        "ml_5c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5c',$value),
		        "ml_5d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5d',$value),
		        "ml_5e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5e',$value),
		        "ml_5f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5f',$value),
		        "ml_5g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5g',$value),
		        "ml_5h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5h',$value),
		        "ml_5i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5i',$value),
		        "ml_5j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5j',$value),
		        "ml_5k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5k',$value),
		        "ml_5l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5l',$value),
		        "ml_5m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5m',$value),
		        "ml_5n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5n',$value),
		        "ml_5o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5o',$value),
		         "ml_6a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6a',$value),
		        "ml_6b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6b',$value),
		        "ml_6c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6c',$value),
		        "ml_6d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6d',$value),
		        "ml_6e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6e',$value),
		        "ml_6f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6f',$value),
		        "ml_6g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6g',$value),
		        "ml_6h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6h',$value),
		        "ml_6i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6i',$value),
		        "ml_6j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6j',$value),
		        "ml_6k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6k',$value),
		        "ml_6l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6l',$value),
		        "ml_6m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6m',$value),
		        "ml_6n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6n',$value),
		        "ml_6o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6o',$value),
		         "ml_7a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7a',$value),
		        "ml_7b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7b',$value),
		        "ml_7c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7c',$value),
		        "ml_7d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7d',$value),
		        "ml_7e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7e',$value),
		        "ml_7f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7f',$value),
		        "ml_7g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7g',$value),
		        "ml_7h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7h',$value),
		        "ml_7i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7i',$value),
		        "ml_7j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7j',$value),
		        "ml_7k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7k',$value),
		        "ml_7l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7l',$value),
		        "ml_7m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7m',$value),
		        "ml_7n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7n',$value),
		        "ml_7o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7o',$value),
		         "ml_8a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8a',$value),
		        "ml_8b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8b',$value),
		        "ml_8c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8c',$value),
		        "ml_8d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8d',$value),
		        "ml_8e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8e',$value),
		        "ml_8f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8f',$value),
		        "ml_8g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8g',$value),
		        "ml_8h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8h',$value),
		        "ml_8i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8i',$value),
		        "ml_8j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8j',$value),
		        "ml_8k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8k',$value),
		        "ml_8l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8l',$value),
		        "ml_8m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8m',$value),
		        "ml_8n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8n',$value),
		        "ml_8o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8o',$value),
		         "ml_9a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9a',$value),
		        "ml_9b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9b',$value),
		        "ml_9c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9c',$value),
		        "ml_9d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9d',$value),
		        "ml_9e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9e',$value),
		        "ml_9f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9f',$value),
		        "ml_9g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9g',$value),
		        "ml_9h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9h',$value),
		        "ml_9i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9i',$value),
		        "ml_9j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9j',$value),
		        "ml_9k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9k',$value),
		        "ml_9l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9l',$value),
		        "ml_9m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9m',$value),
		        "ml_9n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9n',$value),
		        "ml_9o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9o',$value),
		         "ml_10a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10a',$value),
		        "ml_10b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10b',$value),
		        "ml_10c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10c',$value),
		        "ml_10d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10d',$value),
		        "ml_10e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10e',$value),
		        "ml_10f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10f',$value),
		        "ml_10g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10g',$value),
		        "ml_10h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10h',$value),
		        "ml_10i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10i',$value),
		        "ml_10j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10j',$value),
		        "ml_10k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10k',$value),
		        "ml_10l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10l',$value),
		        "ml_10m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10m',$value),
		        "ml_10n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10n',$value),
		        "ml_10o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10o',$value),
		         "ml_11a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11a',$value),
		        "ml_11b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11b',$value),
		        "ml_11c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11c',$value),
		        "ml_11d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11d',$value),
		        "ml_11e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11e',$value),
		        "ml_11f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11f',$value),
		        "ml_11g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11g',$value),
		        "ml_11h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11h',$value),
		        "ml_11i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11i',$value),
		        "ml_11j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11j',$value),
		        "ml_11k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11k',$value),
		        "ml_11l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11l',$value),
		        "ml_11m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11m',$value),
		        "ml_11n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11n',$value),
		        "ml_11o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11o',$value),
		         "ml_12a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12a',$value),
		        "ml_12b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12b',$value),
		        "ml_12c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12c',$value),
		        "ml_12d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12d',$value),
		        "ml_12e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12e',$value),
		        "ml_12f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12f',$value),
		        "ml_12g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12g',$value),
		        "ml_12h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12h',$value),
		        "ml_12i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12i',$value),
		        "ml_12j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12j',$value),
		        "ml_12k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12k',$value),
		        "ml_12l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12l',$value),
		        "ml_12m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12m',$value),
		        "ml_12n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12n',$value),
		        "ml_12o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12o',$value),
		         "ml_13a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13a',$value),
		        "ml_13b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13b',$value),
		        "ml_13c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13c',$value),
		        "ml_13d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13d',$value),
		        "ml_13e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13e',$value),
		        "ml_13f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13f',$value),
		        "ml_13g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13g',$value),
		        "ml_13h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13h',$value),
		        "ml_13i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13i',$value),
		        "ml_13j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13j',$value),
		        "ml_13k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13k',$value),
		        "ml_13l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13l',$value),
		        "ml_13m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13m',$value),
		        "ml_13n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13n',$value),
		        "ml_13o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13o',$value),
		         "ml_14a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14a',$value),
		        "ml_14b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14b',$value),
		        "ml_14c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14c',$value),
		        "ml_14d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14d',$value),
		        "ml_14e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14e',$value),
		        "ml_14f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14f',$value),
		        "ml_14g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14g',$value),
		        "ml_14h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14h',$value),
		        "ml_14i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14i',$value),
		        "ml_14j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14j',$value),
		        "ml_14k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14k',$value),
		        "ml_14l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14l',$value),
		        "ml_14m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14m',$value),
		        "ml_14n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14n',$value),
		        "ml_14o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14o',$value),
		        "ta"			=> $ta
		         );
			}
			$res = $this->m_kues->insert_data_batch('tbl_kues_lap_mhslem',$result);
			if($res==true)
			 {
				$this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'><b>Berhasil, Data berhasil ditambahkan</b></div>"); 
			 }else{
				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><b>Error, Data Gagal ditambahkan</b></div>"); 
			 }
			$this->kues_mhslem_update();
		} else {

			//buat array skala skor
			$skala = array(
				'STS' => "1",
				'TS' => "2",
				'KS' => "3",
				'S' => "4",
				'SS' => "5",
			);

			//input ke tabel
			$result = array();
			foreach ($skala as $key => $value) {
				# code...
				$result[] = array(
		       "fak"  			=> $fak,
		        "prodi"  		=> $prodi,
		        "jml_responden"	=> $this->kues_mhslem_get_count_responden($prodi,$ta),
		        "skala"			=> $key,
		        "ml_1a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1a',$value),
		        "ml_1b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1b',$value),
		        "ml_1c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1c',$value),
		        "ml_1d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1d',$value),
		        "ml_1e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1e',$value),
		        "ml_1f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1f',$value),
		        "ml_1g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1g',$value),
		        "ml_1h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1h',$value),
		        "ml_1i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1i',$value),
		        "ml_1j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1j',$value),
		        "ml_1k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1k',$value),
		        "ml_1l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1l',$value),
		        "ml_1m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1m',$value),
		        "ml_1n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1n',$value),
		        "ml_1o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_1o',$value),
		         "ml_2a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2a',$value),
		        "ml_2b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2b',$value),
		        "ml_2c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2c',$value),
		        "ml_2d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2d',$value),
		        "ml_2e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2e',$value),
		        "ml_2f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2f',$value),
		        "ml_2g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2g',$value),
		        "ml_2h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2h',$value),
		        "ml_2i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2i',$value),
		        "ml_2j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2j',$value),
		        "ml_2k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2k',$value),
		        "ml_2l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2l',$value),
		        "ml_2m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2m',$value),
		        "ml_2n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2n',$value),
		        "ml_2o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_2o',$value),
		         "ml_3a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3a',$value),
		        "ml_3b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3b',$value),
		        "ml_3c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3c',$value),
		        "ml_3d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3d',$value),
		        "ml_3e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3e',$value),
		        "ml_3f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3f',$value),
		        "ml_3g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3g',$value),
		        "ml_3h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3h',$value),
		        "ml_3i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3i',$value),
		        "ml_3j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3j',$value),
		        "ml_3k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3k',$value),
		        "ml_3l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3l',$value),
		        "ml_3m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3m',$value),
		        "ml_3n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3n',$value),
		        "ml_3o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_3o',$value),
		         "ml_4a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4a',$value),
		        "ml_4b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4b',$value),
		        "ml_4c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4c',$value),
		        "ml_4d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4d',$value),
		        "ml_4e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4e',$value),
		        "ml_4f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4f',$value),
		        "ml_4g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4g',$value),
		        "ml_4h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4h',$value),
		        "ml_4i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4i',$value),
		        "ml_4j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4j',$value),
		        "ml_4k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4k',$value),
		        "ml_4l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4l',$value),
		        "ml_4m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4m',$value),
		        "ml_4n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4n',$value),
		        "ml_4o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_4o',$value),
		         "ml_5a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5a',$value),
		        "ml_5b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5b',$value),
		        "ml_5c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5c',$value),
		        "ml_5d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5d',$value),
		        "ml_5e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5e',$value),
		        "ml_5f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5f',$value),
		        "ml_5g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5g',$value),
		        "ml_5h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5h',$value),
		        "ml_5i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5i',$value),
		        "ml_5j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5j',$value),
		        "ml_5k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5k',$value),
		        "ml_5l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5l',$value),
		        "ml_5m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5m',$value),
		        "ml_5n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5n',$value),
		        "ml_5o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_5o',$value),
		         "ml_6a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6a',$value),
		        "ml_6b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6b',$value),
		        "ml_6c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6c',$value),
		        "ml_6d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6d',$value),
		        "ml_6e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6e',$value),
		        "ml_6f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6f',$value),
		        "ml_6g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6g',$value),
		        "ml_6h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6h',$value),
		        "ml_6i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6i',$value),
		        "ml_6j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6j',$value),
		        "ml_6k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6k',$value),
		        "ml_6l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6l',$value),
		        "ml_6m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6m',$value),
		        "ml_6n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6n',$value),
		        "ml_6o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_6o',$value),
		         "ml_7a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7a',$value),
		        "ml_7b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7b',$value),
		        "ml_7c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7c',$value),
		        "ml_7d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7d',$value),
		        "ml_7e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7e',$value),
		        "ml_7f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7f',$value),
		        "ml_7g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7g',$value),
		        "ml_7h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7h',$value),
		        "ml_7i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7i',$value),
		        "ml_7j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7j',$value),
		        "ml_7k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7k',$value),
		        "ml_7l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7l',$value),
		        "ml_7m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7m',$value),
		        "ml_7n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7n',$value),
		        "ml_7o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_7o',$value),
		         "ml_8a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8a',$value),
		        "ml_8b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8b',$value),
		        "ml_8c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8c',$value),
		        "ml_8d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8d',$value),
		        "ml_8e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8e',$value),
		        "ml_8f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8f',$value),
		        "ml_8g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8g',$value),
		        "ml_8h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8h',$value),
		        "ml_8i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8i',$value),
		        "ml_8j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8j',$value),
		        "ml_8k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8k',$value),
		        "ml_8l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8l',$value),
		        "ml_8m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8m',$value),
		        "ml_8n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8n',$value),
		        "ml_8o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_8o',$value),
		         "ml_9a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9a',$value),
		        "ml_9b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9b',$value),
		        "ml_9c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9c',$value),
		        "ml_9d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9d',$value),
		        "ml_9e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9e',$value),
		        "ml_9f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9f',$value),
		        "ml_9g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9g',$value),
		        "ml_9h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9h',$value),
		        "ml_9i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9i',$value),
		        "ml_9j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9j',$value),
		        "ml_9k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9k',$value),
		        "ml_9l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9l',$value),
		        "ml_9m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9m',$value),
		        "ml_9n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9n',$value),
		        "ml_9o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_9o',$value),
		         "ml_10a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10a',$value),
		        "ml_10b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10b',$value),
		        "ml_10c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10c',$value),
		        "ml_10d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10d',$value),
		        "ml_10e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10e',$value),
		        "ml_10f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10f',$value),
		        "ml_10g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10g',$value),
		        "ml_10h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10h',$value),
		        "ml_10i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10i',$value),
		        "ml_10j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10j',$value),
		        "ml_10k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10k',$value),
		        "ml_10l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10l',$value),
		        "ml_10m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10m',$value),
		        "ml_10n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10n',$value),
		        "ml_10o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_10o',$value),
		         "ml_11a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11a',$value),
		        "ml_11b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11b',$value),
		        "ml_11c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11c',$value),
		        "ml_11d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11d',$value),
		        "ml_11e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11e',$value),
		        "ml_11f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11f',$value),
		        "ml_11g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11g',$value),
		        "ml_11h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11h',$value),
		        "ml_11i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11i',$value),
		        "ml_11j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11j',$value),
		        "ml_11k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11k',$value),
		        "ml_11l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11l',$value),
		        "ml_11m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11m',$value),
		        "ml_11n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11n',$value),
		        "ml_11o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_11o',$value),
		         "ml_12a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12a',$value),
		        "ml_12b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12b',$value),
		        "ml_12c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12c',$value),
		        "ml_12d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12d',$value),
		        "ml_12e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12e',$value),
		        "ml_12f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12f',$value),
		        "ml_12g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12g',$value),
		        "ml_12h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12h',$value),
		        "ml_12i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12i',$value),
		        "ml_12j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12j',$value),
		        "ml_12k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12k',$value),
		        "ml_12l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12l',$value),
		        "ml_12m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12m',$value),
		        "ml_12n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12n',$value),
		        "ml_12o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_12o',$value),
		         "ml_13a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13a',$value),
		        "ml_13b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13b',$value),
		        "ml_13c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13c',$value),
		        "ml_13d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13d',$value),
		        "ml_13e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13e',$value),
		        "ml_13f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13f',$value),
		        "ml_13g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13g',$value),
		        "ml_13h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13h',$value),
		        "ml_13i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13i',$value),
		        "ml_13j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13j',$value),
		        "ml_13k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13k',$value),
		        "ml_13l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13l',$value),
		        "ml_13m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13m',$value),
		        "ml_13n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13n',$value),
		        "ml_13o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_13o',$value),
		         "ml_14a"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14a',$value),
		        "ml_14b"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14b',$value),
		        "ml_14c"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14c',$value),
		        "ml_14d"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14d',$value),
		        "ml_14e"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14e',$value),
		        "ml_14f"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14f',$value),
		        "ml_14g"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14g',$value),
		        "ml_14h"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14h',$value),
		        "ml_14i"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14i',$value),
		        "ml_14j"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14j',$value),
		        "ml_14k"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14k',$value),
		        "ml_14l"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14l',$value),
		        "ml_14m"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14m',$value),
		        "ml_14n"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14n',$value),
		        "ml_14o"			=> $this->kues_mhslem_get_count_item($prodi,$ta,'ml_14o',$value),
		        "ta"			=> $ta
		         );
			}
			$res = $this->m_kues->insert_data_batch('tbl_kues_lap_mhslem',$result);
			if($res==true)
			 {
				$this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'><b>Berhasil, Data berhasil ditambahkan</b></div>"); 
			 }else{
				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><b>Error, Data Gagal ditambahkan</b></div>"); 
			 }
			$this->kues_mhslem_update();
		}
	}

	public function kues_mhslem_prosesrekap()
	{
		$data['lpm'] = $this;
		///cek tabel
		$pernyataan = $this->input->post('pernyataan');
		$prodi = $this->input->post('prodi');
		$ta = $this->input->post('ta');
		$cek = $this->cektablelapmhslem($prodi, $ta);

		// get nama pernyataan
		$wherezx = array(
			'id_mhslem_tny' => $pernyataan,		
		);

		$ambiltanya = $this->m_kues->get_data($wherezx,'tbl_kues_mhslem_tanya')->result();
		foreach ($ambiltanya as $key) {
			# code...
			$data['pernyataan'] = $key->tanya;
		}
		//get list kues
		$data['gettanya'] = $this->m_kues->get_data_all('tbl_kues_mhslem_tanya')->result();
		$data['list_pert'] = $this->m_kues->get_data_all('tbl_kues_mhsdsn_tanya')->result();
		//get nama prodi
		$data['nama_prodi'] = $this->getProdi($prodi);
		$data['prodi'] = $prodi;
		$data['ta'] = $ta;
		if ($cek > 0) {
			# code...

			// get item untk get data per prodi
			$new_geta1 = $get_['pernyataan'][$pernyataan] . '_a_1';
			$new_geta2 = $get_['pernyataan'][$pernyataan] . '_a_2';
			$new_geta3 = $get_['pernyataan'][$pernyataan] . '_a_3';
			$new_geta4 = $get_['pernyataan'][$pernyataan] . '_a_4';
			$new_geta5 = $get_['pernyataan'][$pernyataan] . '_a_5';
			$new_geta = $get_['pernyataan'][$pernyataan] . 'a';

			$new_geta1 = $this->sumitem_mhslem($pernyataan."a",'STS',$prodi,$ta)*1;
			$new_geta2 = $this->sumitem_mhslem($pernyataan."a",'TS',$prodi,$ta)*2;
			$new_geta3 = $this->sumitem_mhslem($pernyataan."a",'KS',$prodi,$ta)*3;
			$new_geta4 = $this->sumitem_mhslem($pernyataan."a",'S',$prodi,$ta)*4;
			$new_geta5 = $this->sumitem_mhslem($pernyataan."a",'SS',$prodi,$ta)*5;

			$new_geta =$new_geta1+$new_geta2+$new_geta3+$new_geta4+$new_geta5;

			$new_getb1 = $get_['pernyataan'][$pernyataan] . '_b_1';
			$new_getb2 = $get_['pernyataan'][$pernyataan] . '_b_2';
			$new_getb3 = $get_['pernyataan'][$pernyataan] . '_b_3';
			$new_getb4 = $get_['pernyataan'][$pernyataan] . '_b_4';
			$new_getb5 = $get_['pernyataan'][$pernyataan] . '_b_5';
			$new_getb = $get_['pernyataan'][$pernyataan] . 'b';

			$new_getb1 = $this->sumitem_mhslem($pernyataan."b",'STS',$prodi,$ta)*1;
			$new_getb2 = $this->sumitem_mhslem($pernyataan."b",'TS',$prodi,$ta)*2;
			$new_getb3 = $this->sumitem_mhslem($pernyataan."b",'KS',$prodi,$ta)*3;
			$new_getb4 = $this->sumitem_mhslem($pernyataan."b",'S',$prodi,$ta)*4;
			$new_getb5 = $this->sumitem_mhslem($pernyataan."b",'SS',$prodi,$ta)*5;

			$new_getb =$new_getb1+$new_getb2+$new_getb3+$new_getb4+$new_getb5;

			$new_getc1 = $get_['pernyataan'][$pernyataan] . '_c_1';
			$new_getc2 = $get_['pernyataan'][$pernyataan] . '_c_2';
			$new_getc3 = $get_['pernyataan'][$pernyataan] . '_c_3';
			$new_getc4 = $get_['pernyataan'][$pernyataan] . '_c_4';
			$new_getc5 = $get_['pernyataan'][$pernyataan] . '_c_5';
			$new_getc = $get_['pernyataan'][$pernyataan] . 'c';

			$new_getc1 = $this->sumitem_mhslem($pernyataan."c",'STS',$prodi,$ta)*1;
			$new_getc2 = $this->sumitem_mhslem($pernyataan."c",'TS',$prodi,$ta)*2;
			$new_getc3 = $this->sumitem_mhslem($pernyataan."c",'KS',$prodi,$ta)*3;
			$new_getc4 = $this->sumitem_mhslem($pernyataan."c",'S',$prodi,$ta)*4;
			$new_getc5 = $this->sumitem_mhslem($pernyataan."c",'SS',$prodi,$ta)*5;

			$new_getc =$new_getc1+$new_getc2+$new_getc3+$new_getc4+$new_getc5;

			$new_getd1 = $get_['pernyataan'][$pernyataan] . '_d_1';
			$new_getd2 = $get_['pernyataan'][$pernyataan] . '_d_2';
			$new_getd3 = $get_['pernyataan'][$pernyataan] . '_d_3';
			$new_getd4 = $get_['pernyataan'][$pernyataan] . '_d_4';
			$new_getd5 = $get_['pernyataan'][$pernyataan] . '_d_5';
			$new_getd = $get_['pernyataan'][$pernyataan] . 'd';

			$new_getd1 = $this->sumitem_mhslem($pernyataan."d",'STS',$prodi,$ta)*1;
			$new_getd2 = $this->sumitem_mhslem($pernyataan."d",'TS',$prodi,$ta)*2;
			$new_getd3 = $this->sumitem_mhslem($pernyataan."d",'KS',$prodi,$ta)*3;
			$new_getd4 = $this->sumitem_mhslem($pernyataan."d",'S',$prodi,$ta)*4;
			$new_getd5 = $this->sumitem_mhslem($pernyataan."d",'SS',$prodi,$ta)*5;

			$new_getd =$new_getd1+$new_getd2+$new_getd3+$new_getd4+$new_getd5;

			$new_gete1 = $get_['pernyataan'][$pernyataan] . '_e_1';
			$new_gete2 = $get_['pernyataan'][$pernyataan] . '_e_2';
			$new_gete3 = $get_['pernyataan'][$pernyataan] . '_e_3';
			$new_gete4 = $get_['pernyataan'][$pernyataan] . '_e_4';
			$new_gete5 = $get_['pernyataan'][$pernyataan] . '_e_5';
			$new_gete = $get_['pernyataan'][$pernyataan] . 'e';

			$new_gete1 = $this->sumitem_mhslem($pernyataan."e",'STS',$prodi,$ta)*1;
			$new_gete2 = $this->sumitem_mhslem($pernyataan."e",'TS',$prodi,$ta)*2;
			$new_gete3 = $this->sumitem_mhslem($pernyataan."e",'KS',$prodi,$ta)*3;
			$new_gete4 = $this->sumitem_mhslem($pernyataan."e",'S',$prodi,$ta)*4;
			$new_gete5 = $this->sumitem_mhslem($pernyataan."e",'SS',$prodi,$ta)*5;

			$new_gete =$new_gete1+$new_gete2+$new_gete3+$new_gete4+$new_gete5;

			$new_getf1 = $get_['pernyataan'][$pernyataan] . '_f_1';
			$new_getf2 = $get_['pernyataan'][$pernyataan] . '_f_2';
			$new_getf3 = $get_['pernyataan'][$pernyataan] . '_f_3';
			$new_getf4 = $get_['pernyataan'][$pernyataan] . '_f_4';
			$new_getf5 = $get_['pernyataan'][$pernyataan] . '_f_5';
			$new_getf = $get_['pernyataan'][$pernyataan] . 'f';

			$new_getf1 = $this->sumitem_mhslem($pernyataan."f",'STS',$prodi,$ta)*1;
			$new_getf2 = $this->sumitem_mhslem($pernyataan."f",'TS',$prodi,$ta)*2;
			$new_getf3 = $this->sumitem_mhslem($pernyataan."f",'KS',$prodi,$ta)*3;
			$new_getf4 = $this->sumitem_mhslem($pernyataan."f",'S',$prodi,$ta)*4;
			$new_getf5 = $this->sumitem_mhslem($pernyataan."f",'SS',$prodi,$ta)*5;

			$new_getf =$new_getf1+$new_getf2+$new_getf3+$new_getf4+$new_getf5;

			$new_getg1 = $get_['pernyataan'][$pernyataan] . '_g_1';
			$new_getg2 = $get_['pernyataan'][$pernyataan] . '_g_2';
			$new_getg3 = $get_['pernyataan'][$pernyataan] . '_g_3';
			$new_getg4 = $get_['pernyataan'][$pernyataan] . '_g_4';
			$new_getg5 = $get_['pernyataan'][$pernyataan] . '_g_5';
			$new_getg = $get_['pernyataan'][$pernyataan] . 'g';

			$new_getg1 = $this->sumitem_mhslem($pernyataan."g",'STS',$prodi,$ta)*1;
			$new_getg2 = $this->sumitem_mhslem($pernyataan."g",'TS',$prodi,$ta)*2;
			$new_getg3 = $this->sumitem_mhslem($pernyataan."g",'KS',$prodi,$ta)*3;
			$new_getg4 = $this->sumitem_mhslem($pernyataan."g",'S',$prodi,$ta)*4;
			$new_getg5 = $this->sumitem_mhslem($pernyataan."g",'SS',$prodi,$ta)*5;

			$new_getg =$new_getg1+$new_getg2+$new_getg3+$new_getg4+$new_getg5;

			$new_geth1 = $get_['pernyataan'][$pernyataan] . '_h_1';
			$new_geth2 = $get_['pernyataan'][$pernyataan] . '_h_2';
			$new_geth3 = $get_['pernyataan'][$pernyataan] . '_h_3';
			$new_geth4 = $get_['pernyataan'][$pernyataan] . '_h_4';
			$new_geth5 = $get_['pernyataan'][$pernyataan] . '_h_5';
			$new_geth = $get_['pernyataan'][$pernyataan] . 'h';

			$new_geth1 = $this->sumitem_mhslem($pernyataan."h",'STS',$prodi,$ta)*1;
			$new_geth2 = $this->sumitem_mhslem($pernyataan."h",'TS',$prodi,$ta)*2;
			$new_geth3 = $this->sumitem_mhslem($pernyataan."h",'KS',$prodi,$ta)*3;
			$new_geth4 = $this->sumitem_mhslem($pernyataan."h",'S',$prodi,$ta)*4;
			$new_geth5 = $this->sumitem_mhslem($pernyataan."h",'SS',$prodi,$ta)*5;

			$new_geth =$new_geth1+$new_geth2+$new_geth3+$new_geth4+$new_geth5;

			$new_geti1 = $get_['pernyataan'][$pernyataan] . '_i_1';
			$new_geti2 = $get_['pernyataan'][$pernyataan] . '_i_2';
			$new_geti3 = $get_['pernyataan'][$pernyataan] . '_i_3';
			$new_geti4 = $get_['pernyataan'][$pernyataan] . '_i_4';
			$new_geti5 = $get_['pernyataan'][$pernyataan] . '_i_5';
			$new_geti = $get_['pernyataan'][$pernyataan] . 'i';

			$new_geti1 = $this->sumitem_mhslem($pernyataan."i",'STS',$prodi,$ta)*1;
			$new_geti2 = $this->sumitem_mhslem($pernyataan."i",'TS',$prodi,$ta)*2;
			$new_geti3 = $this->sumitem_mhslem($pernyataan."i",'KS',$prodi,$ta)*3;
			$new_geti4 = $this->sumitem_mhslem($pernyataan."i",'S',$prodi,$ta)*4;
			$new_geti5 = $this->sumitem_mhslem($pernyataan."i",'SS',$prodi,$ta)*5;

			$new_geti =$new_geti1+$new_geti2+$new_geti3+$new_geti4+$new_geti5;

			$new_getj1 = $get_['pernyataan'][$pernyataan] . '_j_1';
			$new_getj2 = $get_['pernyataan'][$pernyataan] . '_j_2';
			$new_getj3 = $get_['pernyataan'][$pernyataan] . '_j_3';
			$new_getj4 = $get_['pernyataan'][$pernyataan] . '_j_4';
			$new_getj5 = $get_['pernyataan'][$pernyataan] . '_j_5';
			$new_getj = $get_['pernyataan'][$pernyataan] . 'j';

			$new_getj1 = $this->sumitem_mhslem($pernyataan."j",'STS',$prodi,$ta)*1;
			$new_getj2 = $this->sumitem_mhslem($pernyataan."j",'TS',$prodi,$ta)*2;
			$new_getj3 = $this->sumitem_mhslem($pernyataan."j",'KS',$prodi,$ta)*3;
			$new_getj4 = $this->sumitem_mhslem($pernyataan."j",'S',$prodi,$ta)*4;
			$new_getj5 = $this->sumitem_mhslem($pernyataan."j",'SS',$prodi,$ta)*5;

			$new_getj =$new_getj1+$new_getj2+$new_getj3+$new_getj4+$new_getj5;

			$new_getk1 = $get_['pernyataan'][$pernyataan] . '_k_1';
			$new_getk2 = $get_['pernyataan'][$pernyataan] . '_k_2';
			$new_getk3 = $get_['pernyataan'][$pernyataan] . '_k_3';
			$new_getk4 = $get_['pernyataan'][$pernyataan] . '_k_4';
			$new_getk5 = $get_['pernyataan'][$pernyataan] . '_k_5';
			$new_getk = $get_['pernyataan'][$pernyataan] . 'k';

			$new_getk1 = $this->sumitem_mhslem($pernyataan."k",'STS',$prodi,$ta)*1;
			$new_getk2 = $this->sumitem_mhslem($pernyataan."k",'TS',$prodi,$ta)*2;
			$new_getk3 = $this->sumitem_mhslem($pernyataan."k",'KS',$prodi,$ta)*3;
			$new_getk4 = $this->sumitem_mhslem($pernyataan."k",'S',$prodi,$ta)*4;
			$new_getk5 = $this->sumitem_mhslem($pernyataan."k",'SS',$prodi,$ta)*5;

			$new_getk =$new_getk1+$new_getk2+$new_getk3+$new_getk4+$new_getk5;

			$new_getl1 = $get_['pernyataan'][$pernyataan] . '_l_1';
			$new_getl2 = $get_['pernyataan'][$pernyataan] . '_l_2';
			$new_getl3 = $get_['pernyataan'][$pernyataan] . '_l_3';
			$new_getl4 = $get_['pernyataan'][$pernyataan] . '_l_4';
			$new_getl5 = $get_['pernyataan'][$pernyataan] . '_l_5';
			$new_getl = $get_['pernyataan'][$pernyataan] . 'l';

			$new_getl1 = $this->sumitem_mhslem($pernyataan."l",'STS',$prodi,$ta)*1;
			$new_getl2 = $this->sumitem_mhslem($pernyataan."l",'TS',$prodi,$ta)*2;
			$new_getl3 = $this->sumitem_mhslem($pernyataan."l",'KS',$prodi,$ta)*3;
			$new_getl4 = $this->sumitem_mhslem($pernyataan."l",'S',$prodi,$ta)*4;
			$new_getl5 = $this->sumitem_mhslem($pernyataan."l",'SS',$prodi,$ta)*5;

			$new_getl =$new_getl1+$new_getl2+$new_getl3+$new_getl4+$new_getl5;

			$new_getm1 = $get_['pernyataan'][$pernyataan] . '_m_1';
			$new_getm2 = $get_['pernyataan'][$pernyataan] . '_m_2';
			$new_getm3 = $get_['pernyataan'][$pernyataan] . '_m_3';
			$new_getm4 = $get_['pernyataan'][$pernyataan] . '_m_4';
			$new_getm5 = $get_['pernyataan'][$pernyataan] . '_m_5';
			$new_getm = $get_['pernyataan'][$pernyataan] . 'm';

			$new_getm1 = $this->sumitem_mhslem($pernyataan."m",'STS',$prodi,$ta)*1;
			$new_getm2 = $this->sumitem_mhslem($pernyataan."m",'TS',$prodi,$ta)*2;
			$new_getm3 = $this->sumitem_mhslem($pernyataan."m",'KS',$prodi,$ta)*3;
			$new_getm4 = $this->sumitem_mhslem($pernyataan."m",'S',$prodi,$ta)*4;
			$new_getm5 = $this->sumitem_mhslem($pernyataan."m",'SS',$prodi,$ta)*5;

			$new_getm =$new_getm1+$new_getm2+$new_getm3+$new_getm4+$new_getm5;

			$new_getn1 = $get_['pernyataan'][$pernyataan] . '_n_1';
			$new_getn2 = $get_['pernyataan'][$pernyataan] . '_n_2';
			$new_getn3 = $get_['pernyataan'][$pernyataan] . '_n_3';
			$new_getn4 = $get_['pernyataan'][$pernyataan] . '_n_4';
			$new_getn5 = $get_['pernyataan'][$pernyataan] . '_n_5';
			$new_getn = $get_['pernyataan'][$pernyataan] . 'n';

			$new_getn1 = $this->sumitem_mhslem($pernyataan."n",'STS',$prodi,$ta)*1;
			$new_getn2 = $this->sumitem_mhslem($pernyataan."n",'TS',$prodi,$ta)*2;
			$new_getn3 = $this->sumitem_mhslem($pernyataan."n",'KS',$prodi,$ta)*3;
			$new_getn4 = $this->sumitem_mhslem($pernyataan."n",'S',$prodi,$ta)*4;
			$new_getn5 = $this->sumitem_mhslem($pernyataan."n",'SS',$prodi,$ta)*5;

			$new_getn =$new_getn1+$new_getn2+$new_getn3+$new_getn4+$new_getn5;

			$new_geto1 = $get_['pernyataan'][$pernyataan] . '_o_1';
			$new_geto2 = $get_['pernyataan'][$pernyataan] . '_o_2';
			$new_geto3 = $get_['pernyataan'][$pernyataan] . '_o_3';
			$new_geto4 = $get_['pernyataan'][$pernyataan] . '_o_4';
			$new_geto5 = $get_['pernyataan'][$pernyataan] . '_o_5';
			$new_geto = $get_['pernyataan'][$pernyataan] . 'o';

			$new_geto1 = $this->sumitem_mhslem($pernyataan."o",'STS',$prodi,$ta)*1;
			$new_geto2 = $this->sumitem_mhslem($pernyataan."o",'TS',$prodi,$ta)*2;
			$new_geto3 = $this->sumitem_mhslem($pernyataan."o",'KS',$prodi,$ta)*3;
			$new_geto4 = $this->sumitem_mhslem($pernyataan."o",'S',$prodi,$ta)*4;
			$new_geto5 = $this->sumitem_mhslem($pernyataan."o",'SS',$prodi,$ta)*5;

			$new_geto =$new_geto1+$new_geto2+$new_geto3+$new_geto4+$new_geto5;

		

			$data['send_item_per_prodi'] = $new_geta.",".$new_getb.",".$new_getc.",".$new_getd.",".$new_gete.",".$new_getf.",".$new_getg.",".$new_geth.",".$new_geti.",".$new_getj.",".$new_getk.",".$new_getl.",".$new_getm.",".$new_getn.",".$new_geto;

			//get data dosen
			// $where = array(
			// 'tbl_kues_mhsdsn.prodi' => $prodi,
			// 'tbl_kues_mhsdsn.ta' => $ta,		
			// );
			// $data['select_dosen'] = $this->m_kues->get_data_distinct_dosen($where)->result();

		} else {
		$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><b>Error, Data tidak ditemukan silakan lakukan update data pada menu Kuesioner>update data atau tekan tombol ini</b><a href='kues_mhslem_update'<button type='button' class='btn btn-block btn-primary'>Halaman Update Data</button></a></div>");
		}
		$this->load->view('lpm/header');
		$this->load->view('lpm/kues_mhslem_rekap',$data);
		$this->load->view('lpm/kues_mhslem_rekap_cek',$data);
		$this->load->view('lpm/footer');
		$this->load->view('lpm/kues_mhslem_rekap_cek_js',$data);
	}
	///////////////////////////////////////////MHS->LEM ver.2024////////////////////////////////////////////////
	public function kues_mhslem_rekap24()
	{
		$data['gettanya'] = $this->m_kues->get_data_all('tbl_kues_mhslem_tanya')->result();
		$this->load->view('lpm/header');
		$this->load->view('lpm/kues_mhslem_rekap24',$data);
		$this->load->view('lpm/footer');
	}
	public function sumitem_mhslem24($item, $skala, $prodi, $ta)
	{
		# code...
		$where = array(
			'skala' => $skala,
			'prodi'=> $prodi,
			'ta' => $ta		
		);
		$where2 = array(
			'prodi'=> $prodi,
			'ta' => $ta		
		);
		$get_pembagi = $this->m_kues->get_data_mhslem_sum_item($where2,$item)->result();
		$get_sum = $this->m_kues->get_data_mhslem_sum_item24($where,$item)->result();
		foreach ($get_pembagi as $key ) {
			# code...
			$pembagi = $key->sum_item;
		}
		foreach ($get_sum as $key ) {
			# code...
			$echo = ($key->data_item / $pembagi)*100;
		}

		return $echo;
	}
	public function kues_mhslem_prosesrekap24()
	{
		$data['lpm'] = $this;
		///cek tabel
		$pernyataan = $this->input->post('pernyataan');
		$prodi = $this->input->post('prodi');
		$ta = $this->input->post('ta');
		$cek = $this->cektablelapmhslem($prodi, $ta);

		// get nama pernyataan
		$wherezx = array(
			'id_mhslem_tny' => $pernyataan,		
		);

		$ambiltanya = $this->m_kues->get_data($wherezx,'tbl_kues_mhslem_tanya')->result();
		foreach ($ambiltanya as $key) {
			# code...
			$data['pernyataan'] = $key->tanya;
		}
		//get list kues
		$data['gettanya'] = $this->m_kues->get_data_all('tbl_kues_mhslem_tanya')->result();
		$data['list_pert'] = $this->m_kues->get_data_all('tbl_kues_mhsdsn_tanya')->result();
		//get nama prodi
		$data['nama_prodi'] = $this->getProdi($prodi);
		$data['prodi'] = $prodi;
		$data['ta'] = $ta;
		if ($cek > 0) {
			# code...

			// get item untk get data per prodi
			$new_geta1 = $get_['pernyataan'][$pernyataan] . '_a_1';
			$new_geta2 = $get_['pernyataan'][$pernyataan] . '_a_2';
			$new_geta3 = $get_['pernyataan'][$pernyataan] . '_a_3';
			$new_geta4 = $get_['pernyataan'][$pernyataan] . '_a_4';
			$new_geta5 = $get_['pernyataan'][$pernyataan] . '_a_5';
			$new_geta = $get_['pernyataan'][$pernyataan] . 'a';

			$data['sts_a'] = $this->sumitem_mhslem24($pernyataan."a",'STS',$prodi,$ta);
			$data['ts_a'] = $this->sumitem_mhslem24($pernyataan."a",'TS',$prodi,$ta);
			$data['ks_a'] = $this->sumitem_mhslem24($pernyataan."a",'KS',$prodi,$ta);
			$data['s_a'] = $this->sumitem_mhslem24($pernyataan."a",'S',$prodi,$ta);
			$data['ss_a'] = $this->sumitem_mhslem24($pernyataan."a",'SS',$prodi,$ta);


			$new_getb1 = $get_['pernyataan'][$pernyataan] . '_b_1';
			$new_getb2 = $get_['pernyataan'][$pernyataan] . '_b_2';
			$new_getb3 = $get_['pernyataan'][$pernyataan] . '_b_3';
			$new_getb4 = $get_['pernyataan'][$pernyataan] . '_b_4';
			$new_getb5 = $get_['pernyataan'][$pernyataan] . '_b_5';
			$new_getb = $get_['pernyataan'][$pernyataan] . 'b';

			$data['sts_b'] = $this->sumitem_mhslem24($pernyataan."b",'STS',$prodi,$ta);
			$data['ts_b'] = $this->sumitem_mhslem24($pernyataan."b",'TS',$prodi,$ta);
			$data['ks_b'] = $this->sumitem_mhslem24($pernyataan."b",'KS',$prodi,$ta);
			$data['s_b'] = $this->sumitem_mhslem24($pernyataan."b",'S',$prodi,$ta);
			$data['ss_b'] = $this->sumitem_mhslem24($pernyataan."b",'SS',$prodi,$ta);


			$new_getc1 = $get_['pernyataan'][$pernyataan] . '_c_1';
			$new_getc2 = $get_['pernyataan'][$pernyataan] . '_c_2';
			$new_getc3 = $get_['pernyataan'][$pernyataan] . '_c_3';
			$new_getc4 = $get_['pernyataan'][$pernyataan] . '_c_4';
			$new_getc5 = $get_['pernyataan'][$pernyataan] . '_c_5';
			$new_getc = $get_['pernyataan'][$pernyataan] . 'c';

			$data['sts_c'] = $this->sumitem_mhslem24($pernyataan."c",'STS',$prodi,$ta);
			$data['ts_c'] = $this->sumitem_mhslem24($pernyataan."c",'TS',$prodi,$ta);
			$data['ks_c'] = $this->sumitem_mhslem24($pernyataan."c",'KS',$prodi,$ta);
			$data['s_c'] = $this->sumitem_mhslem24($pernyataan."c",'S',$prodi,$ta);
			$data['ss_c'] = $this->sumitem_mhslem24($pernyataan."c",'SS',$prodi,$ta);


			$new_getd1 = $get_['pernyataan'][$pernyataan] . '_d_1';
			$new_getd2 = $get_['pernyataan'][$pernyataan] . '_d_2';
			$new_getd3 = $get_['pernyataan'][$pernyataan] . '_d_3';
			$new_getd4 = $get_['pernyataan'][$pernyataan] . '_d_4';
			$new_getd5 = $get_['pernyataan'][$pernyataan] . '_d_5';
			$new_getd = $get_['pernyataan'][$pernyataan] . 'd';

			$data['sts_d'] = $this->sumitem_mhslem24($pernyataan."d",'STS',$prodi,$ta);
			$data['ts_d'] = $this->sumitem_mhslem24($pernyataan."d",'TS',$prodi,$ta);
			$data['ks_d'] = $this->sumitem_mhslem24($pernyataan."d",'KS',$prodi,$ta);
			$data['s_d'] = $this->sumitem_mhslem24($pernyataan."d",'S',$prodi,$ta);
			$data['ss_d'] = $this->sumitem_mhslem24($pernyataan."d",'SS',$prodi,$ta);


			$new_gete1 = $get_['pernyataan'][$pernyataan] . '_e_1';
			$new_gete2 = $get_['pernyataan'][$pernyataan] . '_e_2';
			$new_gete3 = $get_['pernyataan'][$pernyataan] . '_e_3';
			$new_gete4 = $get_['pernyataan'][$pernyataan] . '_e_4';
			$new_gete5 = $get_['pernyataan'][$pernyataan] . '_e_5';
			$new_gete = $get_['pernyataan'][$pernyataan] . 'e';

			$data['sts_e'] = $this->sumitem_mhslem24($pernyataan."e",'STS',$prodi,$ta);
			$data['ts_e'] = $this->sumitem_mhslem24($pernyataan."e",'TS',$prodi,$ta);
			$data['ks_e'] = $this->sumitem_mhslem24($pernyataan."e",'KS',$prodi,$ta);
			$data['s_e'] = $this->sumitem_mhslem24($pernyataan."e",'S',$prodi,$ta);
			$data['ss_e'] = $this->sumitem_mhslem24($pernyataan."e",'SS',$prodi,$ta);


			$new_getf1 = $get_['pernyataan'][$pernyataan] . '_f_1';
			$new_getf2 = $get_['pernyataan'][$pernyataan] . '_f_2';
			$new_getf3 = $get_['pernyataan'][$pernyataan] . '_f_3';
			$new_getf4 = $get_['pernyataan'][$pernyataan] . '_f_4';
			$new_getf5 = $get_['pernyataan'][$pernyataan] . '_f_5';
			$new_getf = $get_['pernyataan'][$pernyataan] . 'f';

			$data['sts_f'] = $this->sumitem_mhslem24($pernyataan."f",'STS',$prodi,$ta);
			$data['ts_f'] = $this->sumitem_mhslem24($pernyataan."f",'TS',$prodi,$ta);
			$data['ks_f'] = $this->sumitem_mhslem24($pernyataan."f",'KS',$prodi,$ta);
			$data['s_f'] = $this->sumitem_mhslem24($pernyataan."f",'S',$prodi,$ta);
			$data['ss_f'] = $this->sumitem_mhslem24($pernyataan."f",'SS',$prodi,$ta);


			$new_getg1 = $get_['pernyataan'][$pernyataan] . '_g_1';
			$new_getg2 = $get_['pernyataan'][$pernyataan] . '_g_2';
			$new_getg3 = $get_['pernyataan'][$pernyataan] . '_g_3';
			$new_getg4 = $get_['pernyataan'][$pernyataan] . '_g_4';
			$new_getg5 = $get_['pernyataan'][$pernyataan] . '_g_5';
			$new_getg = $get_['pernyataan'][$pernyataan] . 'g';

			$data['sts_g'] = $this->sumitem_mhslem24($pernyataan."g",'STS',$prodi,$ta);
			$data['ts_g'] = $this->sumitem_mhslem24($pernyataan."g",'TS',$prodi,$ta);
			$data['ks_g'] = $this->sumitem_mhslem24($pernyataan."g",'KS',$prodi,$ta);
			$data['s_g'] = $this->sumitem_mhslem24($pernyataan."g",'S',$prodi,$ta);
			$data['ss_g'] = $this->sumitem_mhslem24($pernyataan."g",'SS',$prodi,$ta);


			$new_geth1 = $get_['pernyataan'][$pernyataan] . '_h_1';
			$new_geth2 = $get_['pernyataan'][$pernyataan] . '_h_2';
			$new_geth3 = $get_['pernyataan'][$pernyataan] . '_h_3';
			$new_geth4 = $get_['pernyataan'][$pernyataan] . '_h_4';
			$new_geth5 = $get_['pernyataan'][$pernyataan] . '_h_5';
			$new_geth = $get_['pernyataan'][$pernyataan] . 'h';

			$data['sts_h'] = $this->sumitem_mhslem24($pernyataan."h",'STS',$prodi,$ta);
			$data['ts_h'] = $this->sumitem_mhslem24($pernyataan."h",'TS',$prodi,$ta);
			$data['ks_h'] = $this->sumitem_mhslem24($pernyataan."h",'KS',$prodi,$ta);
			$data['s_h'] = $this->sumitem_mhslem24($pernyataan."h",'S',$prodi,$ta);
			$data['ss_h'] = $this->sumitem_mhslem24($pernyataan."h",'SS',$prodi,$ta);


			$new_geti1 = $get_['pernyataan'][$pernyataan] . '_i_1';
			$new_geti2 = $get_['pernyataan'][$pernyataan] . '_i_2';
			$new_geti3 = $get_['pernyataan'][$pernyataan] . '_i_3';
			$new_geti4 = $get_['pernyataan'][$pernyataan] . '_i_4';
			$new_geti5 = $get_['pernyataan'][$pernyataan] . '_i_5';
			$new_geti = $get_['pernyataan'][$pernyataan] . 'i';

			$data['sts_i'] = $this->sumitem_mhslem24($pernyataan."i",'STS',$prodi,$ta);
			$data['ts_i'] = $this->sumitem_mhslem24($pernyataan."i",'TS',$prodi,$ta);
			$data['ks_i'] = $this->sumitem_mhslem24($pernyataan."i",'KS',$prodi,$ta);
			$data['s_i'] = $this->sumitem_mhslem24($pernyataan."i",'S',$prodi,$ta);
			$data['ss_i'] = $this->sumitem_mhslem24($pernyataan."i",'SS',$prodi,$ta);

			$new_getj1 = $get_['pernyataan'][$pernyataan] . '_j_1';
			$new_getj2 = $get_['pernyataan'][$pernyataan] . '_j_2';
			$new_getj3 = $get_['pernyataan'][$pernyataan] . '_j_3';
			$new_getj4 = $get_['pernyataan'][$pernyataan] . '_j_4';
			$new_getj5 = $get_['pernyataan'][$pernyataan] . '_j_5';
			$new_getj = $get_['pernyataan'][$pernyataan] . 'j';

			$data['sts_j'] = $this->sumitem_mhslem24($pernyataan."j",'STS',$prodi,$ta);
			$data['ts_j'] = $this->sumitem_mhslem24($pernyataan."j",'TS',$prodi,$ta);
			$data['ks_j'] = $this->sumitem_mhslem24($pernyataan."j",'KS',$prodi,$ta);
			$data['s_j'] = $this->sumitem_mhslem24($pernyataan."j",'S',$prodi,$ta);
			$data['ss_j'] = $this->sumitem_mhslem24($pernyataan."j",'SS',$prodi,$ta);


			$new_getk1 = $get_['pernyataan'][$pernyataan] . '_k_1';
			$new_getk2 = $get_['pernyataan'][$pernyataan] . '_k_2';
			$new_getk3 = $get_['pernyataan'][$pernyataan] . '_k_3';
			$new_getk4 = $get_['pernyataan'][$pernyataan] . '_k_4';
			$new_getk5 = $get_['pernyataan'][$pernyataan] . '_k_5';
			$new_getk = $get_['pernyataan'][$pernyataan] . 'k';

			$data['sts_k'] = $this->sumitem_mhslem24($pernyataan."k",'STS',$prodi,$ta);
			$data['ts_k'] = $this->sumitem_mhslem24($pernyataan."k",'TS',$prodi,$ta);
			$data['ks_k'] = $this->sumitem_mhslem24($pernyataan."k",'KS',$prodi,$ta);
			$data['s_k'] = $this->sumitem_mhslem24($pernyataan."k",'S',$prodi,$ta);
			$data['ss_k'] = $this->sumitem_mhslem24($pernyataan."k",'SS',$prodi,$ta);


			$new_getl1 = $get_['pernyataan'][$pernyataan] . '_l_1';
			$new_getl2 = $get_['pernyataan'][$pernyataan] . '_l_2';
			$new_getl3 = $get_['pernyataan'][$pernyataan] . '_l_3';
			$new_getl4 = $get_['pernyataan'][$pernyataan] . '_l_4';
			$new_getl5 = $get_['pernyataan'][$pernyataan] . '_l_5';
			$new_getl = $get_['pernyataan'][$pernyataan] . 'l';

			$data['sts_l'] = $this->sumitem_mhslem24($pernyataan."l",'STS',$prodi,$ta);
			$data['ts_l'] = $this->sumitem_mhslem24($pernyataan."l",'TS',$prodi,$ta);
			$data['ks_l'] = $this->sumitem_mhslem24($pernyataan."l",'KS',$prodi,$ta);
			$data['s_l'] = $this->sumitem_mhslem24($pernyataan."l",'S',$prodi,$ta);
			$data['ss_l'] = $this->sumitem_mhslem24($pernyataan."l",'SS',$prodi,$ta);


			$new_getm1 = $get_['pernyataan'][$pernyataan] . '_m_1';
			$new_getm2 = $get_['pernyataan'][$pernyataan] . '_m_2';
			$new_getm3 = $get_['pernyataan'][$pernyataan] . '_m_3';
			$new_getm4 = $get_['pernyataan'][$pernyataan] . '_m_4';
			$new_getm5 = $get_['pernyataan'][$pernyataan] . '_m_5';
			$new_getm = $get_['pernyataan'][$pernyataan] . 'm';

			$data['sts_m'] = $this->sumitem_mhslem24($pernyataan."m",'STS',$prodi,$ta);
			$data['ts_m'] = $this->sumitem_mhslem24($pernyataan."m",'TS',$prodi,$ta);
			$data['ks_m'] = $this->sumitem_mhslem24($pernyataan."m",'KS',$prodi,$ta);
			$data['s_m'] = $this->sumitem_mhslem24($pernyataan."m",'S',$prodi,$ta);
			$data['ss_m'] = $this->sumitem_mhslem24($pernyataan."m",'SS',$prodi,$ta);

			$new_getn1 = $get_['pernyataan'][$pernyataan] . '_n_1';
			$new_getn2 = $get_['pernyataan'][$pernyataan] . '_n_2';
			$new_getn3 = $get_['pernyataan'][$pernyataan] . '_n_3';
			$new_getn4 = $get_['pernyataan'][$pernyataan] . '_n_4';
			$new_getn5 = $get_['pernyataan'][$pernyataan] . '_n_5';
			$new_getn = $get_['pernyataan'][$pernyataan] . 'n';

			$data['sts_n'] = $this->sumitem_mhslem24($pernyataan."n",'STS',$prodi,$ta);
			$data['ts_n'] = $this->sumitem_mhslem24($pernyataan."n",'TS',$prodi,$ta);
			$data['ks_n'] = $this->sumitem_mhslem24($pernyataan."n",'KS',$prodi,$ta);
			$data['s_n'] = $this->sumitem_mhslem24($pernyataan."n",'S',$prodi,$ta);
			$data['ss_n'] = $this->sumitem_mhslem24($pernyataan."n",'SS',$prodi,$ta);


			$new_geto1 = $get_['pernyataan'][$pernyataan] . '_o_1';
			$new_geto2 = $get_['pernyataan'][$pernyataan] . '_o_2';
			$new_geto3 = $get_['pernyataan'][$pernyataan] . '_o_3';
			$new_geto4 = $get_['pernyataan'][$pernyataan] . '_o_4';
			$new_geto5 = $get_['pernyataan'][$pernyataan] . '_o_5';
			$new_geto = $get_['pernyataan'][$pernyataan] . 'o';

			$data['sts_o'] = $this->sumitem_mhslem24($pernyataan."o",'STS',$prodi,$ta);
			$data['ts_o'] = $this->sumitem_mhslem24($pernyataan."o",'TS',$prodi,$ta);
			$data['ks_o'] = $this->sumitem_mhslem24($pernyataan."o",'KS',$prodi,$ta);
			$data['s_o'] = $this->sumitem_mhslem24($pernyataan."o",'S',$prodi,$ta);
			$data['ss_o'] = $this->sumitem_mhslem24($pernyataan."o",'SS',$prodi,$ta);



			//get data dosen
			// $where = array(
			// 'tbl_kues_mhsdsn.prodi' => $prodi,
			// 'tbl_kues_mhsdsn.ta' => $ta,		
			// );
			// $data['select_dosen'] = $this->m_kues->get_data_distinct_dosen($where)->result();

		} else {
		$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><b>Error, Data tidak ditemukan silakan lakukan update data pada menu Kuesioner>update data atau tekan tombol ini</b><a href='kues_mhslem_update'<button type='button' class='btn btn-block btn-primary'>Halaman Update Data</button></a></div>");
		}
		$this->load->view('lpm/header');
		$this->load->view('lpm/kues_mhslem_rekap24',$data);
		$this->load->view('lpm/kues_mhslem_rekap_cek24',$data);
		$this->load->view('lpm/footer');
		// $this->load->view('lpm/kues_mhslem_rekap_cek24_js',$data);
	}

////////////////////////////////////////DOSEN KE LEMDIK ///////////////////////////////////////////
	//////////////////////////// PROSES DATA /////////////////////////////////////
	public function kues_dsnlmdk_update()
	{
		// $data['cektabel'] = $this->m_kues->get_data_all('tbl_kues_lap_dsnlmdk')->num_rows();
		// $where = array(
		// 	'tbl_kues_lap_dsnlmdk.id_lap_dsnlmdk >' => '0',		
		// );
		// $data['cekstat'] = $this->m_kues->get_data_distinct_mhslem_stats($where)->result();	
		$this->load->view('lpm/header');
		$this->load->view('lpm/kues_dsnlmdk_updatedata');
		$this->load->view('lpm/footer');
	}
	public function cektablelapdsnlmdk($prodi, $ta)
	{
		# code...
		$where = array(
			'prodi' => $prodi,
			'ta' => $ta,		
		);

		$cektabel = $this->m_kues->get_data($where,'tbl_kues_lap_dsnlmdk')->num_rows();
		return $cektabel;

	}
	public function kues_dsnlmdk_get_count_item($prodi, $ta, $item, $nilai_item)
	{
		# code...
		$where = array(
			'tbl_kues_dsnlmdk.prodi' => $prodi,
			'tbl_kues_dsnlmdk.ta' => $ta,
			'tbl_kues_dsnlmdk.'.$item => $nilai_item,		
		);
		$data = $this->m_kues->get_data_dsnlmdk_count_item($where, 'tbl_kues_dsnlmdk.'.$item)->result();
		foreach ($data as $key) {
			# code...
			$send = $key->jml_item;
		}

		return $send;

	}
	public function kues_dsnlmdk_get_count_responden($prodi, $ta)
	{
		# code...
		$where = array(
			'tbl_kues_dsnlmdk.prodi' => $prodi,
			'tbl_kues_dsnlmdk.ta' => $ta		
		);
		$data = $this->m_kues->get_data_dsnlmdk_count_responden($where)->result();
		foreach ($data as $key) {
			# code...
			$send = $key->jml_res;
		}

		return $send;

	}
	public function kues_dsnlmdk_run_update()
	{
		# code...
		$fak	= $this->input->post('fak');
		$prodi  = $this->input->post('prodi');
		$ta 	= $this->input->post('ta');


		$cek = $this->cektablelapdsnlmdk($prodi, $ta);
		if ($cek > 0) {
			# code...
			//jika data ada di tabel delete terlebih dahulu
			$where_del = array(
			'prodi' => $prodi,
			'ta' => $ta,		
			);
			$this->m_kues->delete_data($where_del,'tbl_kues_lap_dsnlmdk');

			// input data baru ke tabel


			//buat array skala skor
			$skala = array(
				'STS' => "1",
				'TS' => "2",
				'KS' => "3",
				'S' => "4",
				'SS' => "5",
			);

			//input ke tabel
			$result = array();
			foreach ($skala as $key => $value) {
				# code...
				$result[] = array(
		        "prodi"  		=> $prodi,
		        "jml_responden"	=> $this->kues_dsnlmdk_get_count_responden($prodi,$ta),
		        "skala"			=> $key,
		        "dsnlmdk1"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk1',$value),
		        "dsnlmdk2"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk2',$value),
		        "dsnlmdk3"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk3',$value),
		        "dsnlmdk4"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk4',$value),
		        "dsnlmdk5"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk5',$value),
		        "dsnlmdk6"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk6',$value),
		        "dsnlmdk7"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk7',$value),
		        "dsnlmdk8"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk8',$value),
		        "dsnlmdk9"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk9',$value),
		        "dsnlmdk10"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk10',$value),
		        "dsnlmdk11"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk11',$value),
		        "dsnlmdk12"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk12',$value),
		        "dsnlmdk13"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk13',$value),
		        "dsnlmdk14"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk14',$value),
		        "dsnlmdk15"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk15',$value),
		        "ta"				=> $ta
		         );
			}
			$res = $this->m_kues->insert_data_batch('tbl_kues_lap_dsnlmdk',$result);
			if($res==true)
			 {
				$this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'><b>Berhasil, Data Dosen ke Lemdik berhasil ditambahkan</b></div>"); 
			 }else{
				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><b>Error, Data Dosen ke Lemdik Gagal ditambahkan</b></div>"); 
			 }
			$this->kues_dsnlmdk_update();
		} else {

			//buat array skala skor
			$skala = array(
				'STS' => "1",
				'TS' => "2",
				'KS' => "3",
				'S' => "4",
				'SS' => "5",
			);

			//input ke tabel
			$result = array();
			foreach ($skala as $key => $value) {
				# code...
				$result[] = array(
		        "prodi"  		=> $prodi,
		        "jml_responden"	=> $this->kues_dsnlmdk_get_count_responden($prodi,$ta),
		        "skala"			=> $key,
		        "dsnlmdk1"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk1',$value),
		        "dsnlmdk2"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk2',$value),
		        "dsnlmdk3"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk3',$value),
		        "dsnlmdk4"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk4',$value),
		        "dsnlmdk5"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk5',$value),
		        "dsnlmdk6"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk6',$value),
		        "dsnlmdk7"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk7',$value),
		        "dsnlmdk8"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk8',$value),
		        "dsnlmdk9"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk9',$value),
		        "dsnlmdk10"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk10',$value),
		        "dsnlmdk11"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk11',$value),
		        "dsnlmdk12"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk12',$value),
		        "dsnlmdk13"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk13',$value),
		        "dsnlmdk14"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk14',$value),
		        "dsnlmdk15"			=> $this->kues_dsnlmdk_get_count_item($prodi,$ta,'dsnlmdk15',$value),
		        "ta"				=> $ta
		         );
			}
			$res = $this->m_kues->insert_data_batch('tbl_kues_lap_dsnlmdk',$result);
			if($res==true)
			 {
				$this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'><b>Berhasil, Data Tendik ke Lemdik berhasil ditambahkan</b></div>"); 
			 }else{
				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><b>Error, Data Tendik ke Lemdik Gagal ditambahkan</b></div>"); 
			 }
			$this->kues_dsnlmdk_update();
		}
	}

	/////////////////////////////////// REKAP DATA ///////////////////////////////////
	function precise_round($value, $precision = 2) {
	    if (!is_numeric($value)) {
	        return 0;
	    }
	    $multiplier = pow(10, $precision);
	    return ceil($value * $multiplier) / $multiplier;
	}
	public function kues_dsnlmdk_rekap()
	{
		$data['gettanya'] = $this->m_kues->get_data_all('tbl_kues_dsnlmdk_tanya')->result();
		$this->load->view('lpm/header');
		$this->load->view('lpm/kues_dsnlmdk_rekap',$data);
		$this->load->view('lpm/footer');
	}
	public function sumitem_dsnlmdk($item, $skala, $prodi, $ta)
	{
		# code...
		$where = array(
			'skala' => $skala,
			'prodi'=> $prodi,
			'ta' => $ta		
		);
		$where2 = array(
			'prodi'=> $prodi,
			'ta' => $ta		
		);
		$get_pembagi = $this->m_kues->get_data_dsnlmdk_sum_item($where2,$item)->result();
		$get_sum = $this->m_kues->get_data_dsnlmdk_sum_item24($where,$item)->result();
		foreach ($get_pembagi as $key ) {
			# code...
			$pembagi = $key->sum_item;
		}
		foreach ($get_sum as $key ) {
			# code...
			$echo = ($key->data_item / $pembagi)*100;
		}

		return $echo;
	}
	public function kues_dsnlmdk_prosesrekap()
	{
		$data['lpm'] = $this;
		///cek tabel
		$pernyataan = $this->input->post('pernyataan');
		$prodi = $this->input->post('prodi');
		$ta = $this->input->post('ta');
		$cek = $this->cektablelapdsnlmdk($prodi, $ta);

		// get nama pernyataan
		$wherezx = array(
			'id_dsnlmdk' => $pernyataan,		
		);

		$ambiltanya = $this->m_kues->get_data($wherezx,'tbl_kues_dsnlmdk_tanya')->result();
		foreach ($ambiltanya as $key) {
			# code...
			$data['pernyataan'] = $key->tanya;
		}
		//get list kues
		$data['gettanya'] = $this->m_kues->get_data_all('tbl_kues_dsnlmdk_tanya')->result();
		$data['list_pert'] = $this->m_kues->get_data_all('tbl_kues_dsnlmdk_tanya')->result();
		//get nama prodi
		$data['nama_prodi'] = $this->getProdi($prodi);
		$data['prodi'] = $prodi;
		$data['ta'] = $ta;
		if ($cek > 0) {
			# code...

			// get item untk get data per prodi
			// $new_geta1 = $get_['pernyataan'][$pernyataan] . '_a_1';
			// $new_geta2 = $get_['pernyataan'][$pernyataan] . '_a_2';
			// $new_geta3 = $get_['pernyataan'][$pernyataan] . '_a_3';
			// $new_geta4 = $get_['pernyataan'][$pernyataan] . '_a_4';
			// $new_geta5 = $get_['pernyataan'][$pernyataan] . '_a_5';
			// $new_geta = $get_['pernyataan'][$pernyataan] . 'a';

			$data['sts_1'] = $this->sumitem_dsnlmdk('dsnlmdk1','STS',$prodi,$ta);
			$data['ts_1'] = $this->sumitem_dsnlmdk('dsnlmdk1','TS',$prodi,$ta);
			$data['ks_1'] = $this->sumitem_dsnlmdk('dsnlmdk1','KS',$prodi,$ta);
			$data['s_1'] = $this->sumitem_dsnlmdk('dsnlmdk1','S',$prodi,$ta);
			$data['ss_1'] = $this->sumitem_dsnlmdk('dsnlmdk1','SS',$prodi,$ta);

			$data['sts_2'] = $this->sumitem_dsnlmdk('dsnlmdk2','STS',$prodi,$ta);
			$data['ts_2'] = $this->sumitem_dsnlmdk('dsnlmdk2','TS',$prodi,$ta);
			$data['ks_2'] = $this->sumitem_dsnlmdk('dsnlmdk2','KS',$prodi,$ta);
			$data['s_2'] = $this->sumitem_dsnlmdk('dsnlmdk2','S',$prodi,$ta);
			$data['ss_2'] = $this->sumitem_dsnlmdk('dsnlmdk2','SS',$prodi,$ta);

			$data['sts_3'] = $this->sumitem_dsnlmdk('dsnlmdk3','STS',$prodi,$ta);
			$data['ts_3'] = $this->sumitem_dsnlmdk('dsnlmdk3','TS',$prodi,$ta);
			$data['ks_3'] = $this->sumitem_dsnlmdk('dsnlmdk3','KS',$prodi,$ta);
			$data['s_3'] = $this->sumitem_dsnlmdk('dsnlmdk3','S',$prodi,$ta);
			$data['ss_3'] = $this->sumitem_dsnlmdk('dsnlmdk3','SS',$prodi,$ta);

			$data['sts_4'] = $this->sumitem_dsnlmdk('dsnlmdk4','STS',$prodi,$ta);
			$data['ts_4'] = $this->sumitem_dsnlmdk('dsnlmdk4','TS',$prodi,$ta);
			$data['ks_4'] = $this->sumitem_dsnlmdk('dsnlmdk4','KS',$prodi,$ta);
			$data['s_4'] = $this->sumitem_dsnlmdk('dsnlmdk4','S',$prodi,$ta);
			$data['ss_4'] = $this->sumitem_dsnlmdk('dsnlmdk4','SS',$prodi,$ta);

			$data['sts_5'] = $this->sumitem_dsnlmdk('dsnlmdk5','STS',$prodi,$ta);
			$data['ts_5'] = $this->sumitem_dsnlmdk('dsnlmdk5','TS',$prodi,$ta);
			$data['ks_5'] = $this->sumitem_dsnlmdk('dsnlmdk5','KS',$prodi,$ta);
			$data['s_5'] = $this->sumitem_dsnlmdk('dsnlmdk5','S',$prodi,$ta);
			$data['ss_5'] = $this->sumitem_dsnlmdk('dsnlmdk5','SS',$prodi,$ta);

			$data['sts_6'] = $this->sumitem_dsnlmdk('dsnlmdk6','STS',$prodi,$ta);
			$data['ts_6'] = $this->sumitem_dsnlmdk('dsnlmdk6','TS',$prodi,$ta);
			$data['ks_6'] = $this->sumitem_dsnlmdk('dsnlmdk6','KS',$prodi,$ta);
			$data['s_6'] = $this->sumitem_dsnlmdk('dsnlmdk6','S',$prodi,$ta);
			$data['ss_6'] = $this->sumitem_dsnlmdk('dsnlmdk6','SS',$prodi,$ta);

			$data['sts_7'] = $this->sumitem_dsnlmdk('dsnlmdk7','STS',$prodi,$ta);
			$data['ts_7'] = $this->sumitem_dsnlmdk('dsnlmdk7','TS',$prodi,$ta);
			$data['ks_7'] = $this->sumitem_dsnlmdk('dsnlmdk7','KS',$prodi,$ta);
			$data['s_7'] = $this->sumitem_dsnlmdk('dsnlmdk7','S',$prodi,$ta);
			$data['ss_7'] = $this->sumitem_dsnlmdk('dsnlmdk7','SS',$prodi,$ta);

			$data['sts_8'] = $this->sumitem_dsnlmdk('dsnlmdk8','STS',$prodi,$ta);
			$data['ts_8'] = $this->sumitem_dsnlmdk('dsnlmdk8','TS',$prodi,$ta);
			$data['ks_8'] = $this->sumitem_dsnlmdk('dsnlmdk8','KS',$prodi,$ta);
			$data['s_8'] = $this->sumitem_dsnlmdk('dsnlmdk8','S',$prodi,$ta);
			$data['ss_8'] = $this->sumitem_dsnlmdk('dsnlmdk8','SS',$prodi,$ta);

			$data['sts_9'] = $this->sumitem_dsnlmdk('dsnlmdk9','STS',$prodi,$ta);
			$data['ts_9'] = $this->sumitem_dsnlmdk('dsnlmdk9','TS',$prodi,$ta);
			$data['ks_9'] = $this->sumitem_dsnlmdk('dsnlmdk9','KS',$prodi,$ta);
			$data['s_9'] = $this->sumitem_dsnlmdk('dsnlmdk9','S',$prodi,$ta);
			$data['ss_9'] = $this->sumitem_dsnlmdk('dsnlmdk9','SS',$prodi,$ta);

			$data['sts_10'] = $this->sumitem_dsnlmdk('dsnlmdk10','STS',$prodi,$ta);
			$data['ts_10'] = $this->sumitem_dsnlmdk('dsnlmdk10','TS',$prodi,$ta);
			$data['ks_10'] = $this->sumitem_dsnlmdk('dsnlmdk10','KS',$prodi,$ta);
			$data['s_10'] = $this->sumitem_dsnlmdk('dsnlmdk10','S',$prodi,$ta);
			$data['ss_10'] = $this->sumitem_dsnlmdk('dsnlmdk10','SS',$prodi,$ta);

			$data['sts_11'] = $this->sumitem_dsnlmdk('dsnlmdk11','STS',$prodi,$ta);
			$data['ts_11'] = $this->sumitem_dsnlmdk('dsnlmdk11','TS',$prodi,$ta);
			$data['ks_11'] = $this->sumitem_dsnlmdk('dsnlmdk11','KS',$prodi,$ta);
			$data['s_11'] = $this->sumitem_dsnlmdk('dsnlmdk11','S',$prodi,$ta);
			$data['ss_11'] = $this->sumitem_dsnlmdk('dsnlmdk11','SS',$prodi,$ta);

			$data['sts_12'] = $this->sumitem_dsnlmdk('dsnlmdk12','STS',$prodi,$ta);
			$data['ts_12'] = $this->sumitem_dsnlmdk('dsnlmdk12','TS',$prodi,$ta);
			$data['ks_12'] = $this->sumitem_dsnlmdk('dsnlmdk12','KS',$prodi,$ta);
			$data['s_12'] = $this->sumitem_dsnlmdk('dsnlmdk12','S',$prodi,$ta);
			$data['ss_12'] = $this->sumitem_dsnlmdk('dsnlmdk12','SS',$prodi,$ta);

			$data['sts_13'] = $this->sumitem_dsnlmdk('dsnlmdk13','STS',$prodi,$ta);
			$data['ts_13'] = $this->sumitem_dsnlmdk('dsnlmdk13','TS',$prodi,$ta);
			$data['ks_13'] = $this->sumitem_dsnlmdk('dsnlmdk13','KS',$prodi,$ta);
			$data['s_13'] = $this->sumitem_dsnlmdk('dsnlmdk13','S',$prodi,$ta);
			$data['ss_13'] = $this->sumitem_dsnlmdk('dsnlmdk13','SS',$prodi,$ta);

			$data['sts_14'] = $this->sumitem_dsnlmdk('dsnlmdk14','STS',$prodi,$ta);
			$data['ts_14'] = $this->sumitem_dsnlmdk('dsnlmdk14','TS',$prodi,$ta);
			$data['ks_14'] = $this->sumitem_dsnlmdk('dsnlmdk14','KS',$prodi,$ta);
			$data['s_14'] = $this->sumitem_dsnlmdk('dsnlmdk14','S',$prodi,$ta);
			$data['ss_14'] = $this->sumitem_dsnlmdk('dsnlmdk14','SS',$prodi,$ta);

			$data['sts_15'] = $this->sumitem_dsnlmdk('dsnlmdk15','STS',$prodi,$ta);
			$data['ts_15'] = $this->sumitem_dsnlmdk('dsnlmdk15','TS',$prodi,$ta);
			$data['ks_15'] = $this->sumitem_dsnlmdk('dsnlmdk15','KS',$prodi,$ta);
			$data['s_15'] = $this->sumitem_dsnlmdk('dsnlmdk15','S',$prodi,$ta);
			$data['ss_15'] = $this->sumitem_dsnlmdk('dsnlmdk15','SS',$prodi,$ta);

			
			//get data dosen
			// $where = array(
			// 'tbl_kues_mhsdsn.prodi' => $prodi,
			// 'tbl_kues_mhsdsn.ta' => $ta,		
			// );
			// $data['select_dosen'] = $this->m_kues->get_data_distinct_dosen($where)->result();

		} else {
		$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><b>Error, Data Dosen ke Lembaga tidak ditemukan silakan lakukan update data pada menu Kuesioner>update data atau tekan tombol ini</b><a href='kues_dsnlmdk_update'<button type='button' class='btn btn-block btn-primary'>Halaman Update Data</button></a></div>");
		}
		$this->load->view('lpm/header');
		// $this->load->view('lpm/kues_dsnlmdk_rekap24',$data);
		$this->load->view('lpm/kues_dsnlmdk_rekap_cek',$data);
		$this->load->view('lpm/footer');
		// $this->load->view('lpm/kues_mhslem_rekap_cek24_js',$data);
	}
////////////////////////////////////////.DOSEN KE LEMDIK ///////////////////////////////////////////
//////////////////////////////////////// TENDIK KE LEMDIK ///////////////////////////////////////////
	/////////////////////// PROSES DATA
		public function kues_tndklmdk_update()
	{
		// $data['cektabel'] = $this->m_kues->get_data_all('tbl_kues_lap_dsnlmdk')->num_rows();
		// $where = array(
		// 	'tbl_kues_lap_dsnlmdk.id_lap_dsnlmdk >' => '0',		
		// );
		// $data['cekstat'] = $this->m_kues->get_data_distinct_mhslem_stats($where)->result();	
		$this->load->view('lpm/header');
		$this->load->view('lpm/kues_tndklmdk_updatedata');
		$this->load->view('lpm/footer');
	}
		public function cektablelaptndklmdk($prodi, $ta)
	{
		# code...
		$where = array(
			// 'prodi' => $prodi,
			'ta' => $ta,		
		);

		$cektabel = $this->m_kues->get_data($where,'tbl_kues_lap_dsnlmdk')->num_rows();
		return $cektabel;

	}
	public function kues_tndklmdk_get_count_item($prodi, $ta, $item, $nilai_item)
	{
		# code...
		$where = array(
			// 'tbl_kues_tndklmdk.prodi' => $prodi,
			'tbl_kues_tndklmdk.ta' => $ta,
			'tbl_kues_tndklmdk.'.$item => $nilai_item,		
		);
		$data = $this->m_kues->get_data_tndklmdk_count_item($where, 'tbl_kues_tndklmdk.'.$item)->result();
		foreach ($data as $key) {
			# code...
			$send = $key->jml_item;
		}

		return $send;

	}
	public function kues_tndklmdk_get_count_responden($prodi, $ta)
	{
		# code...
		$where = array(
			// 'tbl_kues_tndklmdk.prodi' => $prodi,
			'tbl_kues_tndklmdk.ta' => $ta		
		);
		$data = $this->m_kues->get_data_tndklmdk_count_responden($where)->result();
		foreach ($data as $key) {
			# code...
			$send = $key->jml_res;
		}

		return $send;

	}
	public function kues_tndklmdk_run_update()
	{
		# code...
		$fak	= $this->input->post('fak');
		$prodi  = $this->input->post('prodi');
		$ta 	= $this->input->post('ta');


		$cek = $this->cektablelaptndklmdk($prodi, $ta);
		if ($cek > 0) {
			# code...
			//jika data ada di tabel delete terlebih dahulu
			$where_del = array(
			// 'prodi' => $prodi,
			'ta' => $ta,		
			);
			$this->m_kues->delete_data($where_del,'tbl_kues_lap_tndklmdk');

			// input data baru ke tabel


			//buat array skala skor
			$skala = array(
				'STS' => "1",
				'TS' => "2",
				'KS' => "3",
				'S' => "4",
				'SS' => "5",
			);

			//input ke tabel
			$result = array();
			foreach ($skala as $key => $value) {
				# code...
				$result[] = array(
		        "jml_responden"	=> $this->kues_tndklmdk_get_count_responden($prodi,$ta),
		        "skala"			=> $key,
		        "tndklmdk1"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk1',$value),
		        "tndklmdk2"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk2',$value),
		        "tndklmdk3"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk3',$value),
		        "tndklmdk4"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk4',$value),
		        "tndklmdk5"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk5',$value),
		        "tndklmdk6"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk6',$value),
		        "tndklmdk7"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk7',$value),
		        "tndklmdk8"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk8',$value),
		        "tndklmdk9"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk9',$value),
		        "tndklmdk10"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk10',$value),
		        "tndklmdk11"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk11',$value),
		        "tndklmdk12"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk12',$value),
		        "tndklmdk13"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk13',$value),
		        "tndklmdk14"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk14',$value),
		        "tndklmdk15"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk15',$value),
		        "ta"				=> $ta
		         );
			}
			$res = $this->m_kues->insert_data_batch('tbl_kues_lap_tndklmdk',$result);
			if($res==true)
			 {
				$this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'><b>Berhasil, Data berhasil ditambahkan</b></div>"); 
			 }else{
				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><b>Error, Data Gagal ditambahkan</b></div>"); 
			 }
			$this->kues_tndklmdk_update();
		} else {

			//buat array skala skor
			$skala = array(
				'STS' => "1",
				'TS' => "2",
				'KS' => "3",
				'S' => "4",
				'SS' => "5",
			);

			//input ke tabel
			$result = array();
			foreach ($skala as $key => $value) {
				# code...
				$result[] = array(
		        		        "jml_responden"	=> $this->kues_tndklmdk_get_count_responden($prodi,$ta),
		        "skala"			=> $key,
		        "tndklmdk1"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk1',$value),
		        "tndklmdk2"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk2',$value),
		        "tndklmdk3"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk3',$value),
		        "tndklmdk4"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk4',$value),
		        "tndklmdk5"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk5',$value),
		        "tndklmdk6"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk6',$value),
		        "tndklmdk7"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk7',$value),
		        "tndklmdk8"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk8',$value),
		        "tndklmdk9"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk9',$value),
		        "tndklmdk10"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk10',$value),
		        "tndklmdk11"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk11',$value),
		        "tndklmdk12"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk12',$value),
		        "tndklmdk13"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk13',$value),
		        "tndklmdk14"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk14',$value),
		        "tndklmdk15"			=> $this->kues_tndklmdk_get_count_item($prodi,$ta,'tndklmdk15',$value),
		        "ta"				=> $ta
		         );
			}
			$res = $this->m_kues->insert_data_batch('tbl_kues_lap_tndklmdk',$result);
			if($res==true)
			 {
				$this->session->set_flashdata('success', "<div class='alert alert-success alert-dismissible'><b>Berhasil, Data Lemdik Ke Lembaga berhasil ditambahkan</b></div>"); 
			 }else{
				$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><b>Error, Data Lemdik Ke Lembaga Gagal ditambahkan</b></div>"); 
			 }
			$this->kues_tndklmdk_update();
		}
	}
	/////////////////////////////////// REKAP DATA ///////////////////////////////////
	public function kues_tndklmdk_rekap()
	{
		$data['gettanya'] = $this->m_kues->get_data_all('tbl_kues_tndklmdk_tanya')->result();
		$this->load->view('lpm/header');
		$this->load->view('lpm/kues_tndklmdk_rekap',$data);
		$this->load->view('lpm/footer');
	}
	public function sumitem_tndklmdk($item, $skala, $prodi, $ta)
	{
		# code...
		$where = array(
			'skala' => $skala,
			// 'prodi'=> $prodi,
			'ta' => $ta		
		);
		$where2 = array(
			// 'prodi'=> $prodi,
			'ta' => $ta		
		);
		$get_pembagi = $this->m_kues->get_data_tndklmdk_sum_item($where2,$item)->result();
		$get_sum = $this->m_kues->get_data_tndklmdk_sum_item24($where,$item)->result();
		foreach ($get_pembagi as $key ) {
			# code...
			$pembagi = $key->sum_item;
		}
		foreach ($get_sum as $key ) {
			# code...
			$echo = ($key->data_item / $pembagi)*100;
		}

		return $echo;
	}
	public function kues_tndklmdk_prosesrekap()
	{
		$data['lpm'] = $this;
		///cek tabel
		$pernyataan = $this->input->post('pernyataan');
		$prodi = $this->input->post('prodi');
		$ta = $this->input->post('ta');
		$cek = $this->cektablelaptndklmdk($prodi, $ta);

		// get nama pernyataan
		$wherezx = array(
			'id_tndklmdk' => $pernyataan,		
		);

		$ambiltanya = $this->m_kues->get_data($wherezx,'tbl_kues_tndklmdk_tanya')->result();
		foreach ($ambiltanya as $key) {
			# code...
			$data['pernyataan'] = $key->tanya;
		}
		//get list kues
		$data['gettanya'] = $this->m_kues->get_data_all('tbl_kues_tndklmdk_tanya')->result();
		$data['list_pert'] = $this->m_kues->get_data_all('tbl_kues_tndklmdk_tanya')->result();
		//get nama prodi
		$data['nama_prodi'] = $this->getProdi($prodi);
		$data['prodi'] = $prodi;
		$data['ta'] = $ta;
		if ($cek > 0) {
			# code...

			// get item untk get data per prodi
			// $new_geta1 = $get_['pernyataan'][$pernyataan] . '_a_1';
			// $new_geta2 = $get_['pernyataan'][$pernyataan] . '_a_2';
			// $new_geta3 = $get_['pernyataan'][$pernyataan] . '_a_3';
			// $new_geta4 = $get_['pernyataan'][$pernyataan] . '_a_4';
			// $new_geta5 = $get_['pernyataan'][$pernyataan] . '_a_5';
			// $new_geta = $get_['pernyataan'][$pernyataan] . 'a';

			$data['sts_1'] = $this->sumitem_tndklmdk('tndklmdk1','STS',$prodi,$ta);
			$data['ts_1'] = $this->sumitem_tndklmdk('tndklmdk1','TS',$prodi,$ta);
			$data['ks_1'] = $this->sumitem_tndklmdk('tndklmdk1','KS',$prodi,$ta);
			$data['s_1'] = $this->sumitem_tndklmdk('tndklmdk1','S',$prodi,$ta);
			$data['ss_1'] = $this->sumitem_tndklmdk('tndklmdk1','SS',$prodi,$ta);

			$data['sts_2'] = $this->sumitem_tndklmdk('tndklmdk2','STS',$prodi,$ta);
			$data['ts_2'] = $this->sumitem_tndklmdk('tndklmdk2','TS',$prodi,$ta);
			$data['ks_2'] = $this->sumitem_tndklmdk('tndklmdk2','KS',$prodi,$ta);
			$data['s_2'] = $this->sumitem_tndklmdk('tndklmdk2','S',$prodi,$ta);
			$data['ss_2'] = $this->sumitem_tndklmdk('tndklmdk2','SS',$prodi,$ta);

			$data['sts_3'] = $this->sumitem_tndklmdk('tndklmdk3','STS',$prodi,$ta);
			$data['ts_3'] = $this->sumitem_tndklmdk('tndklmdk3','TS',$prodi,$ta);
			$data['ks_3'] = $this->sumitem_tndklmdk('tndklmdk3','KS',$prodi,$ta);
			$data['s_3'] = $this->sumitem_tndklmdk('tndklmdk3','S',$prodi,$ta);
			$data['ss_3'] = $this->sumitem_tndklmdk('tndklmdk3','SS',$prodi,$ta);

			$data['sts_4'] = $this->sumitem_tndklmdk('tndklmdk4','STS',$prodi,$ta);
			$data['ts_4'] = $this->sumitem_tndklmdk('tndklmdk4','TS',$prodi,$ta);
			$data['ks_4'] = $this->sumitem_tndklmdk('tndklmdk4','KS',$prodi,$ta);
			$data['s_4'] = $this->sumitem_tndklmdk('tndklmdk4','S',$prodi,$ta);
			$data['ss_4'] = $this->sumitem_tndklmdk('tndklmdk4','SS',$prodi,$ta);

			$data['sts_5'] = $this->sumitem_tndklmdk('tndklmdk5','STS',$prodi,$ta);
			$data['ts_5'] = $this->sumitem_tndklmdk('tndklmdk5','TS',$prodi,$ta);
			$data['ks_5'] = $this->sumitem_tndklmdk('tndklmdk5','KS',$prodi,$ta);
			$data['s_5'] = $this->sumitem_tndklmdk('tndklmdk5','S',$prodi,$ta);
			$data['ss_5'] = $this->sumitem_tndklmdk('tndklmdk5','SS',$prodi,$ta);

			$data['sts_6'] = $this->sumitem_tndklmdk('tndklmdk6','STS',$prodi,$ta);
			$data['ts_6'] = $this->sumitem_tndklmdk('tndklmdk6','TS',$prodi,$ta);
			$data['ks_6'] = $this->sumitem_tndklmdk('tndklmdk6','KS',$prodi,$ta);
			$data['s_6'] = $this->sumitem_tndklmdk('tndklmdk6','S',$prodi,$ta);
			$data['ss_6'] = $this->sumitem_tndklmdk('tndklmdk6','SS',$prodi,$ta);

			$data['sts_7'] = $this->sumitem_tndklmdk('tndklmdk7','STS',$prodi,$ta);
			$data['ts_7'] = $this->sumitem_tndklmdk('tndklmdk7','TS',$prodi,$ta);
			$data['ks_7'] = $this->sumitem_tndklmdk('tndklmdk7','KS',$prodi,$ta);
			$data['s_7'] = $this->sumitem_tndklmdk('tndklmdk7','S',$prodi,$ta);
			$data['ss_7'] = $this->sumitem_tndklmdk('tndklmdk7','SS',$prodi,$ta);

			$data['sts_8'] = $this->sumitem_tndklmdk('tndklmdk8','STS',$prodi,$ta);
			$data['ts_8'] = $this->sumitem_tndklmdk('tndklmdk8','TS',$prodi,$ta);
			$data['ks_8'] = $this->sumitem_tndklmdk('tndklmdk8','KS',$prodi,$ta);
			$data['s_8'] = $this->sumitem_tndklmdk('tndklmdk8','S',$prodi,$ta);
			$data['ss_8'] = $this->sumitem_tndklmdk('tndklmdk8','SS',$prodi,$ta);

			$data['sts_9'] = $this->sumitem_tndklmdk('tndklmdk9','STS',$prodi,$ta);
			$data['ts_9'] = $this->sumitem_tndklmdk('tndklmdk9','TS',$prodi,$ta);
			$data['ks_9'] = $this->sumitem_tndklmdk('tndklmdk9','KS',$prodi,$ta);
			$data['s_9'] = $this->sumitem_tndklmdk('tndklmdk9','S',$prodi,$ta);
			$data['ss_9'] = $this->sumitem_tndklmdk('tndklmdk9','SS',$prodi,$ta);

			$data['sts_10'] = $this->sumitem_tndklmdk('tndklmdk10','STS',$prodi,$ta);
			$data['ts_10'] = $this->sumitem_tndklmdk('tndklmdk10','TS',$prodi,$ta);
			$data['ks_10'] = $this->sumitem_tndklmdk('tndklmdk10','KS',$prodi,$ta);
			$data['s_10'] = $this->sumitem_tndklmdk('tndklmdk10','S',$prodi,$ta);
			$data['ss_10'] = $this->sumitem_tndklmdk('tndklmdk10','SS',$prodi,$ta);

			$data['sts_11'] = $this->sumitem_tndklmdk('tndklmdk11','STS',$prodi,$ta);
			$data['ts_11'] = $this->sumitem_tndklmdk('tndklmdk11','TS',$prodi,$ta);
			$data['ks_11'] = $this->sumitem_tndklmdk('tndklmdk11','KS',$prodi,$ta);
			$data['s_11'] = $this->sumitem_tndklmdk('tndklmdk11','S',$prodi,$ta);
			$data['ss_11'] = $this->sumitem_tndklmdk('tndklmdk11','SS',$prodi,$ta);

			$data['sts_12'] = $this->sumitem_tndklmdk('tndklmdk12','STS',$prodi,$ta);
			$data['ts_12'] = $this->sumitem_tndklmdk('tndklmdk12','TS',$prodi,$ta);
			$data['ks_12'] = $this->sumitem_tndklmdk('tndklmdk12','KS',$prodi,$ta);
			$data['s_12'] = $this->sumitem_tndklmdk('tndklmdk12','S',$prodi,$ta);
			$data['ss_12'] = $this->sumitem_tndklmdk('tndklmdk12','SS',$prodi,$ta);

			$data['sts_13'] = $this->sumitem_tndklmdk('tndklmdk13','STS',$prodi,$ta);
			$data['ts_13'] = $this->sumitem_tndklmdk('tndklmdk13','TS',$prodi,$ta);
			$data['ks_13'] = $this->sumitem_tndklmdk('tndklmdk13','KS',$prodi,$ta);
			$data['s_13'] = $this->sumitem_tndklmdk('tndklmdk13','S',$prodi,$ta);
			$data['ss_13'] = $this->sumitem_tndklmdk('tndklmdk13','SS',$prodi,$ta);

			$data['sts_14'] = $this->sumitem_tndklmdk('tndklmdk14','STS',$prodi,$ta);
			$data['ts_14'] = $this->sumitem_tndklmdk('tndklmdk14','TS',$prodi,$ta);
			$data['ks_14'] = $this->sumitem_tndklmdk('tndklmdk14','KS',$prodi,$ta);
			$data['s_14'] = $this->sumitem_tndklmdk('tndklmdk14','S',$prodi,$ta);
			$data['ss_14'] = $this->sumitem_tndklmdk('tndklmdk14','SS',$prodi,$ta);

			$data['sts_15'] = $this->sumitem_tndklmdk('tndklmdk15','STS',$prodi,$ta);
			$data['ts_15'] = $this->sumitem_tndklmdk('tndklmdk15','TS',$prodi,$ta);
			$data['ks_15'] = $this->sumitem_tndklmdk('tndklmdk15','KS',$prodi,$ta);
			$data['s_15'] = $this->sumitem_tndklmdk('tndklmdk15','S',$prodi,$ta);
			$data['ss_15'] = $this->sumitem_tndklmdk('tndklmdk15','SS',$prodi,$ta);

			
			//get data dosen
			// $where = array(
			// 'tbl_kues_mhsdsn.prodi' => $prodi,
			// 'tbl_kues_mhsdsn.ta' => $ta,		
			// );
			// $data['select_dosen'] = $this->m_kues->get_data_distinct_dosen($where)->result();

		} else {
		$this->session->set_flashdata('error', "<div class='alert alert-danger alert-dismissible'><b>Error, Data Tendik ke Lembaga tidak ditemukan silakan lakukan update data pada menu Kuesioner>update data atau tekan tombol ini</b><a href='kues_tndklmdk_update'<button type='button' class='btn btn-block btn-primary'>Halaman Update Data</button></a></div>");
		}
		$this->load->view('lpm/header');
		// $this->load->view('lpm/kues_dsnlmdk_rekap24',$data);
		$this->load->view('lpm/kues_tndklmdk_rekap_cek',$data);
		$this->load->view('lpm/footer');
		// $this->load->view('lpm/kues_mhslem_rekap_cek24_js',$data);
	}
////////////////////////////////////////.TENDIK KE LEMDIK ///////////////////////////////////////////	
/////////////////////////////////////////////////////////////////Monitoring/////////////////////////////////////
	/////////////// monitoring summary
	public function mon_summary()
	{
		# code...
		$this->load->view('lpm/header');
	    $this->load->view('lpm/mon_summary');
	    $this->load->view('lpm/footer');
	    $this->load->view('lpm/mon_summary_js');
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

}

/* End of file lpm.php */
/* Location: ./application/controllers/lpm.php */