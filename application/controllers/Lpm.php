<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lpm extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'administrasi?pesan=belumlogin');
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

			$get_md_a2_1 = $this->sumitem_mhsdsn('md_a2','1',$prodi,$ta)*1;
			$get_md_a2_2 = $this->sumitem_mhsdsn('md_a2','2',$prodi,$ta)*2;
			$get_md_a2_3 = $this->sumitem_mhsdsn('md_a2','3',$prodi,$ta)*3;
			$get_md_a2_4 = $this->sumitem_mhsdsn('md_a2','4',$prodi,$ta)*4;
			$get_md_a2_5 = $this->sumitem_mhsdsn('md_a2','5',$prodi,$ta)*5;
			$get_md_a2 = $get_md_a2_1+$get_md_a2_2+$get_md_a2_3+$get_md_a2_4+$get_md_a2_5;

			$get_md_a3_1 = $this->sumitem_mhsdsn('md_a3','1',$prodi,$ta)*1;
			$get_md_a3_2 = $this->sumitem_mhsdsn('md_a3','2',$prodi,$ta)*2;
			$get_md_a3_3 = $this->sumitem_mhsdsn('md_a3','3',$prodi,$ta)*3;
			$get_md_a3_4 = $this->sumitem_mhsdsn('md_a3','4',$prodi,$ta)*4;
			$get_md_a3_5 = $this->sumitem_mhsdsn('md_a3','5',$prodi,$ta)*5;
			$get_md_a3 = $get_md_a3_1+$get_md_a3_2+$get_md_a3_3+$get_md_a3_4+$get_md_a3_5;

			$get_md_b1_1 = $this->sumitem_mhsdsn('md_b1','1',$prodi,$ta)*1;
			$get_md_b1_2 = $this->sumitem_mhsdsn('md_b1','2',$prodi,$ta)*2;
			$get_md_b1_3 = $this->sumitem_mhsdsn('md_b1','3',$prodi,$ta)*3;
			$get_md_b1_4 = $this->sumitem_mhsdsn('md_b1','4',$prodi,$ta)*4;
			$get_md_b1_5 = $this->sumitem_mhsdsn('md_b1','5',$prodi,$ta)*5;
			$get_md_b1 = $get_md_b1_1+$get_md_b1_2+$get_md_b1_3+$get_md_b1_4+$get_md_b1_5;

			$get_md_b2_1 = $this->sumitem_mhsdsn('md_b2','1',$prodi,$ta)*1;
			$get_md_b2_2 = $this->sumitem_mhsdsn('md_b2','2',$prodi,$ta)*2;
			$get_md_b2_3 = $this->sumitem_mhsdsn('md_b2','3',$prodi,$ta)*3;
			$get_md_b2_4 = $this->sumitem_mhsdsn('md_b2','4',$prodi,$ta)*4;
			$get_md_b2_5 = $this->sumitem_mhsdsn('md_b2','5',$prodi,$ta)*5;
			$get_md_b2 = $get_md_b2_1+$get_md_b2_2+$get_md_b2_3+$get_md_b2_4+$get_md_b2_5;

			$get_md_b3_1 = $this->sumitem_mhsdsn('md_b3','1',$prodi,$ta)*1;
			$get_md_b3_2 = $this->sumitem_mhsdsn('md_b3','2',$prodi,$ta)*2;
			$get_md_b3_3 = $this->sumitem_mhsdsn('md_b3','3',$prodi,$ta)*3;
			$get_md_b3_4 = $this->sumitem_mhsdsn('md_b3','4',$prodi,$ta)*4;
			$get_md_b3_5 = $this->sumitem_mhsdsn('md_b3','5',$prodi,$ta)*5;
			$get_md_b3 = $get_md_b3_1+$get_md_b3_2+$get_md_b3_3+$get_md_b3_4+$get_md_b3_5;

			$get_md_c1_1 = $this->sumitem_mhsdsn('md_c1','1',$prodi,$ta)*1;
			$get_md_c1_2 = $this->sumitem_mhsdsn('md_c1','2',$prodi,$ta)*2;
			$get_md_c1_3 = $this->sumitem_mhsdsn('md_c1','3',$prodi,$ta)*3;
			$get_md_c1_4 = $this->sumitem_mhsdsn('md_c1','4',$prodi,$ta)*4;
			$get_md_c1_5 = $this->sumitem_mhsdsn('md_c1','5',$prodi,$ta)*5;
			$get_md_c1 = $get_md_c1_1+$get_md_c1_2+$get_md_c1_3+$get_md_c1_4+$get_md_c1_5;

			$get_md_c2_1 = $this->sumitem_mhsdsn('md_c2','1',$prodi,$ta)*1;
			$get_md_c2_2 = $this->sumitem_mhsdsn('md_c2','2',$prodi,$ta)*2;
			$get_md_c2_3 = $this->sumitem_mhsdsn('md_c2','3',$prodi,$ta)*3;
			$get_md_c2_4 = $this->sumitem_mhsdsn('md_c2','4',$prodi,$ta)*4;
			$get_md_c2_5 = $this->sumitem_mhsdsn('md_c2','5',$prodi,$ta)*5;
			$get_md_c2 = $get_md_c2_1+$get_md_c2_2+$get_md_c2_3+$get_md_c2_4+$get_md_c2_5;

			$get_md_c3_1 = $this->sumitem_mhsdsn('md_c3','1',$prodi,$ta)*1;
			$get_md_c3_2 = $this->sumitem_mhsdsn('md_c3','2',$prodi,$ta)*2;
			$get_md_c3_3 = $this->sumitem_mhsdsn('md_c3','3',$prodi,$ta)*3;
			$get_md_c3_4 = $this->sumitem_mhsdsn('md_c3','4',$prodi,$ta)*4;
			$get_md_c3_5 = $this->sumitem_mhsdsn('md_c3','5',$prodi,$ta)*5;
			$get_md_c3 = $get_md_c3_1+$get_md_c3_2+$get_md_c3_3+$get_md_c3_4+$get_md_c3_5;

			$get_md_d1_1 = $this->sumitem_mhsdsn('md_d1','1',$prodi,$ta)*1;
			$get_md_d1_2 = $this->sumitem_mhsdsn('md_d1','2',$prodi,$ta)*2;
			$get_md_d1_3 = $this->sumitem_mhsdsn('md_d1','3',$prodi,$ta)*3;
			$get_md_d1_4 = $this->sumitem_mhsdsn('md_d1','4',$prodi,$ta)*4;
			$get_md_d1_5 = $this->sumitem_mhsdsn('md_d1','5',$prodi,$ta)*5;
			$get_md_d1 = $get_md_d1_1+$get_md_d1_2+$get_md_d1_3+$get_md_d1_4+$get_md_d1_5;

			$get_md_d2_1 = $this->sumitem_mhsdsn('md_d2','1',$prodi,$ta)*1;
			$get_md_d2_2 = $this->sumitem_mhsdsn('md_d2','2',$prodi,$ta)*2;
			$get_md_d2_3 = $this->sumitem_mhsdsn('md_d2','3',$prodi,$ta)*3;
			$get_md_d2_4 = $this->sumitem_mhsdsn('md_d2','4',$prodi,$ta)*4;
			$get_md_d2_5 = $this->sumitem_mhsdsn('md_d2','5',$prodi,$ta)*5;
			$get_md_d2 = $get_md_d2_1+$get_md_d2_2+$get_md_d2_3+$get_md_d2_4+$get_md_d2_5;

			$get_md_d3_1 = $this->sumitem_mhsdsn('md_d3','1',$prodi,$ta)*1;
			$get_md_d3_2 = $this->sumitem_mhsdsn('md_d3','2',$prodi,$ta)*2;
			$get_md_d3_3 = $this->sumitem_mhsdsn('md_d3','3',$prodi,$ta)*3;
			$get_md_d3_4 = $this->sumitem_mhsdsn('md_d3','4',$prodi,$ta)*4;
			$get_md_d3_5 = $this->sumitem_mhsdsn('md_d3','5',$prodi,$ta)*5;
			$get_md_d3 = $get_md_d3_1+$get_md_d3_2+$get_md_d3_3+$get_md_d3_4+$get_md_d3_5;

			$get_md_e1_1 = $this->sumitem_mhsdsn('md_e1','1',$prodi,$ta)*1;
			$get_md_e1_2 = $this->sumitem_mhsdsn('md_e1','2',$prodi,$ta)*2;
			$get_md_e1_3 = $this->sumitem_mhsdsn('md_e1','3',$prodi,$ta)*3;
			$get_md_e1_4 = $this->sumitem_mhsdsn('md_e1','4',$prodi,$ta)*4;
			$get_md_e1_5 = $this->sumitem_mhsdsn('md_e1','5',$prodi,$ta)*5;
			$get_md_e1 = $get_md_e1_1+$get_md_e1_2+$get_md_e1_3+$get_md_e1_4+$get_md_e1_5;

			$get_md_e2_1 = $this->sumitem_mhsdsn('md_e2','1',$prodi,$ta)*1;
			$get_md_e2_2 = $this->sumitem_mhsdsn('md_e2','2',$prodi,$ta)*2;
			$get_md_e2_3 = $this->sumitem_mhsdsn('md_e2','3',$prodi,$ta)*3;
			$get_md_e2_4 = $this->sumitem_mhsdsn('md_e2','4',$prodi,$ta)*4;
			$get_md_e2_5 = $this->sumitem_mhsdsn('md_e2','5',$prodi,$ta)*5;
			$get_md_e2 = $get_md_e2_1+$get_md_e2_2+$get_md_e2_3+$get_md_e2_4+$get_md_e2_5;

			$get_md_e3_1 = $this->sumitem_mhsdsn('md_e3','1',$prodi,$ta)*1;
			$get_md_e3_2 = $this->sumitem_mhsdsn('md_e3','2',$prodi,$ta)*2;
			$get_md_e3_3 = $this->sumitem_mhsdsn('md_e3','3',$prodi,$ta)*3;
			$get_md_e3_4 = $this->sumitem_mhsdsn('md_e3','4',$prodi,$ta)*4;
			$get_md_e3_5 = $this->sumitem_mhsdsn('md_e3','5',$prodi,$ta)*5;
			$get_md_e3 = $get_md_e3_1+$get_md_e3_2+$get_md_e3_3+$get_md_e3_4+$get_md_e3_5;

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
			$get_md_a1_1 = $this->sumitem_mhsdsn_dosen('md_a1','1',$prodi,$ta,$kddosen)*1;
			$get_md_a1_2 = $this->sumitem_mhsdsn_dosen('md_a1','2',$prodi,$ta,$kddosen)*2;
			$get_md_a1_3 = $this->sumitem_mhsdsn_dosen('md_a1','3',$prodi,$ta,$kddosen)*3;
			$get_md_a1_4 = $this->sumitem_mhsdsn_dosen('md_a1','4',$prodi,$ta,$kddosen)*4;
			$get_md_a1_5 = $this->sumitem_mhsdsn_dosen('md_a1','5',$prodi,$ta,$kddosen)*5;
			$get_md_a1 = $get_md_a1_1+$get_md_a1_2+$get_md_a1_3+$get_md_a1_4+$get_md_a1_5;

			$get_md_a2_1 = $this->sumitem_mhsdsn_dosen('md_a2','1',$prodi,$ta,$kddosen)*1;
			$get_md_a2_2 = $this->sumitem_mhsdsn_dosen('md_a2','2',$prodi,$ta,$kddosen)*2;
			$get_md_a2_3 = $this->sumitem_mhsdsn_dosen('md_a2','3',$prodi,$ta,$kddosen)*3;
			$get_md_a2_4 = $this->sumitem_mhsdsn_dosen('md_a2','4',$prodi,$ta,$kddosen)*4;
			$get_md_a2_5 = $this->sumitem_mhsdsn_dosen('md_a2','5',$prodi,$ta,$kddosen)*5;
			$get_md_a2 = $get_md_a2_1+$get_md_a2_2+$get_md_a2_3+$get_md_a2_4+$get_md_a2_5;

			$get_md_a3_1 = $this->sumitem_mhsdsn_dosen('md_a3','1',$prodi,$ta,$kddosen)*1;
			$get_md_a3_2 = $this->sumitem_mhsdsn_dosen('md_a3','2',$prodi,$ta,$kddosen)*2;
			$get_md_a3_3 = $this->sumitem_mhsdsn_dosen('md_a3','3',$prodi,$ta,$kddosen)*3;
			$get_md_a3_4 = $this->sumitem_mhsdsn_dosen('md_a3','4',$prodi,$ta,$kddosen)*4;
			$get_md_a3_5 = $this->sumitem_mhsdsn_dosen('md_a3','5',$prodi,$ta,$kddosen)*5;
			$get_md_a3 = $get_md_a3_1+$get_md_a3_2+$get_md_a3_3+$get_md_a3_4+$get_md_a3_5;

			$get_md_b1_1 = $this->sumitem_mhsdsn_dosen('md_b1','1',$prodi,$ta,$kddosen)*1;
			$get_md_b1_2 = $this->sumitem_mhsdsn_dosen('md_b1','2',$prodi,$ta,$kddosen)*2;
			$get_md_b1_3 = $this->sumitem_mhsdsn_dosen('md_b1','3',$prodi,$ta,$kddosen)*3;
			$get_md_b1_4 = $this->sumitem_mhsdsn_dosen('md_b1','4',$prodi,$ta,$kddosen)*4;
			$get_md_b1_5 = $this->sumitem_mhsdsn_dosen('md_b1','5',$prodi,$ta,$kddosen)*5;
			$get_md_b1 = $get_md_b1_1+$get_md_b1_2+$get_md_b1_3+$get_md_b1_4+$get_md_b1_5;

			$get_md_b2_1 = $this->sumitem_mhsdsn_dosen('md_b2','1',$prodi,$ta,$kddosen)*1;
			$get_md_b2_2 = $this->sumitem_mhsdsn_dosen('md_b2','2',$prodi,$ta,$kddosen)*2;
			$get_md_b2_3 = $this->sumitem_mhsdsn_dosen('md_b2','3',$prodi,$ta,$kddosen)*3;
			$get_md_b2_4 = $this->sumitem_mhsdsn_dosen('md_b2','4',$prodi,$ta,$kddosen)*4;
			$get_md_b2_5 = $this->sumitem_mhsdsn_dosen('md_b2','5',$prodi,$ta,$kddosen)*5;
			$get_md_b2 = $get_md_b2_1+$get_md_b2_2+$get_md_b2_3+$get_md_b2_4+$get_md_b2_5;

			$get_md_b3_1 = $this->sumitem_mhsdsn_dosen('md_b3','1',$prodi,$ta,$kddosen)*1;
			$get_md_b3_2 = $this->sumitem_mhsdsn_dosen('md_b3','2',$prodi,$ta,$kddosen)*2;
			$get_md_b3_3 = $this->sumitem_mhsdsn_dosen('md_b3','3',$prodi,$ta,$kddosen)*3;
			$get_md_b3_4 = $this->sumitem_mhsdsn_dosen('md_b3','4',$prodi,$ta,$kddosen)*4;
			$get_md_b3_5 = $this->sumitem_mhsdsn_dosen('md_b3','5',$prodi,$ta,$kddosen)*5;
			$get_md_b3 = $get_md_b3_1+$get_md_b3_2+$get_md_b3_3+$get_md_b3_4+$get_md_b3_5;

			$get_md_c1_1 = $this->sumitem_mhsdsn_dosen('md_c1','1',$prodi,$ta,$kddosen)*1;
			$get_md_c1_2 = $this->sumitem_mhsdsn_dosen('md_c1','2',$prodi,$ta,$kddosen)*2;
			$get_md_c1_3 = $this->sumitem_mhsdsn_dosen('md_c1','3',$prodi,$ta,$kddosen)*3;
			$get_md_c1_4 = $this->sumitem_mhsdsn_dosen('md_c1','4',$prodi,$ta,$kddosen)*4;
			$get_md_c1_5 = $this->sumitem_mhsdsn_dosen('md_c1','5',$prodi,$ta,$kddosen)*5;
			$get_md_c1 = $get_md_c1_1+$get_md_c1_2+$get_md_c1_3+$get_md_c1_4+$get_md_c1_5;

			$get_md_c2_1 = $this->sumitem_mhsdsn_dosen('md_c2','1',$prodi,$ta,$kddosen)*1;
			$get_md_c2_2 = $this->sumitem_mhsdsn_dosen('md_c2','2',$prodi,$ta,$kddosen)*2;
			$get_md_c2_3 = $this->sumitem_mhsdsn_dosen('md_c2','3',$prodi,$ta,$kddosen)*3;
			$get_md_c2_4 = $this->sumitem_mhsdsn_dosen('md_c2','4',$prodi,$ta,$kddosen)*4;
			$get_md_c2_5 = $this->sumitem_mhsdsn_dosen('md_c2','5',$prodi,$ta,$kddosen)*5;
			$get_md_c2 = $get_md_c2_1+$get_md_c2_2+$get_md_c2_3+$get_md_c2_4+$get_md_c2_5;

			$get_md_c3_1 = $this->sumitem_mhsdsn_dosen('md_c3','1',$prodi,$ta,$kddosen)*1;
			$get_md_c3_2 = $this->sumitem_mhsdsn_dosen('md_c3','2',$prodi,$ta,$kddosen)*2;
			$get_md_c3_3 = $this->sumitem_mhsdsn_dosen('md_c3','3',$prodi,$ta,$kddosen)*3;
			$get_md_c3_4 = $this->sumitem_mhsdsn_dosen('md_c3','4',$prodi,$ta,$kddosen)*4;
			$get_md_c3_5 = $this->sumitem_mhsdsn_dosen('md_c3','5',$prodi,$ta,$kddosen)*5;
			$get_md_c3 = $get_md_c3_1+$get_md_c3_2+$get_md_c3_3+$get_md_c3_4+$get_md_c3_5;

			$get_md_d1_1 = $this->sumitem_mhsdsn_dosen('md_d1','1',$prodi,$ta,$kddosen)*1;
			$get_md_d1_2 = $this->sumitem_mhsdsn_dosen('md_d1','2',$prodi,$ta,$kddosen)*2;
			$get_md_d1_3 = $this->sumitem_mhsdsn_dosen('md_d1','3',$prodi,$ta,$kddosen)*3;
			$get_md_d1_4 = $this->sumitem_mhsdsn_dosen('md_d1','4',$prodi,$ta,$kddosen)*4;
			$get_md_d1_5 = $this->sumitem_mhsdsn_dosen('md_d1','5',$prodi,$ta,$kddosen)*5;
			$get_md_d1 = $get_md_d1_1+$get_md_d1_2+$get_md_d1_3+$get_md_d1_4+$get_md_d1_5;

			$get_md_d2_1 = $this->sumitem_mhsdsn_dosen('md_d2','1',$prodi,$ta,$kddosen)*1;
			$get_md_d2_2 = $this->sumitem_mhsdsn_dosen('md_d2','2',$prodi,$ta,$kddosen)*2;
			$get_md_d2_3 = $this->sumitem_mhsdsn_dosen('md_d2','3',$prodi,$ta,$kddosen)*3;
			$get_md_d2_4 = $this->sumitem_mhsdsn_dosen('md_d2','4',$prodi,$ta,$kddosen)*4;
			$get_md_d2_5 = $this->sumitem_mhsdsn_dosen('md_d2','5',$prodi,$ta,$kddosen)*5;
			$get_md_d2 = $get_md_d2_1+$get_md_d2_2+$get_md_d2_3+$get_md_d2_4+$get_md_d2_5;

			$get_md_d3_1 = $this->sumitem_mhsdsn_dosen('md_d3','1',$prodi,$ta,$kddosen)*1;
			$get_md_d3_2 = $this->sumitem_mhsdsn_dosen('md_d3','2',$prodi,$ta,$kddosen)*2;
			$get_md_d3_3 = $this->sumitem_mhsdsn_dosen('md_d3','3',$prodi,$ta,$kddosen)*3;
			$get_md_d3_4 = $this->sumitem_mhsdsn_dosen('md_d3','4',$prodi,$ta,$kddosen)*4;
			$get_md_d3_5 = $this->sumitem_mhsdsn_dosen('md_d3','5',$prodi,$ta,$kddosen)*5;
			$get_md_d3 = $get_md_d3_1+$get_md_d3_2+$get_md_d3_3+$get_md_d3_4+$get_md_d3_5;

			$get_md_e1_1 = $this->sumitem_mhsdsn_dosen('md_e1','1',$prodi,$ta,$kddosen)*1;
			$get_md_e1_2 = $this->sumitem_mhsdsn_dosen('md_e1','2',$prodi,$ta,$kddosen)*2;
			$get_md_e1_3 = $this->sumitem_mhsdsn_dosen('md_e1','3',$prodi,$ta,$kddosen)*3;
			$get_md_e1_4 = $this->sumitem_mhsdsn_dosen('md_e1','4',$prodi,$ta,$kddosen)*4;
			$get_md_e1_5 = $this->sumitem_mhsdsn_dosen('md_e1','5',$prodi,$ta,$kddosen)*5;
			$get_md_e1 = $get_md_e1_1+$get_md_e1_2+$get_md_e1_3+$get_md_e1_4+$get_md_e1_5;

			$get_md_e2_1 = $this->sumitem_mhsdsn_dosen('md_e2','1',$prodi,$ta,$kddosen)*1;
			$get_md_e2_2 = $this->sumitem_mhsdsn_dosen('md_e2','2',$prodi,$ta,$kddosen)*2;
			$get_md_e2_3 = $this->sumitem_mhsdsn_dosen('md_e2','3',$prodi,$ta,$kddosen)*3;
			$get_md_e2_4 = $this->sumitem_mhsdsn_dosen('md_e2','4',$prodi,$ta,$kddosen)*4;
			$get_md_e2_5 = $this->sumitem_mhsdsn_dosen('md_e2','5',$prodi,$ta,$kddosen)*5;
			$get_md_e2 = $get_md_e2_1+$get_md_e2_2+$get_md_e2_3+$get_md_e2_4+$get_md_e2_5;

			$get_md_e3_1 = $this->sumitem_mhsdsn_dosen('md_e3','1',$prodi,$ta,$kddosen)*1;
			$get_md_e3_2 = $this->sumitem_mhsdsn_dosen('md_e3','2',$prodi,$ta,$kddosen)*2;
			$get_md_e3_3 = $this->sumitem_mhsdsn_dosen('md_e3','3',$prodi,$ta,$kddosen)*3;
			$get_md_e3_4 = $this->sumitem_mhsdsn_dosen('md_e3','4',$prodi,$ta,$kddosen)*4;
			$get_md_e3_5 = $this->sumitem_mhsdsn_dosen('md_e3','5',$prodi,$ta,$kddosen)*5;
			$get_md_e3 = $get_md_e3_1+$get_md_e3_2+$get_md_e3_3+$get_md_e3_4+$get_md_e3_5;

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
	public function kues_mhslem_update()
	{
		$data['cektabel'] = $this->m_kues->get_data_all('tbl_kues_lap_mhslem')->num_rows();	
		$this->load->view('lpm/header');
		$this->load->view('lpm/kues_mhslem_updatedata',$data);
		$this->load->view('lpm/footer');
	}
	public function kues_mhslem_rekap()
	{
		$this->load->view('lpm/header');
		$this->load->view('lpm/kues_mhslem_rekap');
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

	public function kues_mhslen_run_update($ta, $prodi)
	{
		# code...
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

}

/* End of file lpm.php */
/* Location: ./application/controllers/lpm.php */