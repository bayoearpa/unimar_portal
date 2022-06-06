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

}

/* End of file lpm.php */
/* Location: ./application/controllers/lpm.php */