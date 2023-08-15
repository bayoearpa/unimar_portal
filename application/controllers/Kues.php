<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kues extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		// if($this->session->userdata('status') != "login"){
		// 	redirect(base_url().'administrasi?pesan=belumlogin');
		// }
		$this->load->model('m_kues');
	}

	public function index()
	{
		
	}
	public function getFakultas($prodi)
	{
		# code...
            if ($prodi == "92402" OR $prodi == "21201" OR $prodi == "13241" ) {
              # code...
              $fak = "Fakultas Teknik";
            }else if ($prodi == "92403" OR $prodi == "21207" OR $prodi=="92401") {
              # code...
              $fak = "Fakultas Kemaritiman";
            }else if ($prodi == "61201" OR $prodi == "94205") {
              # code...
              $fak = "Fakultas Ekonomi dan Bisnis";
            }

            return $fak;
        
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
	public function getNamaMatkul($kdmatkul)
	{
		# code...
		$where = array(
			'Kode_mata_kuliah' => $kdmatkul		
		);
		$matkul = $this->m_kues->get_data($where,'tmst_mata_kuliah')->result();

		foreach ($matkul as $m) {
			# code...
			$get = $m->Nama_mata_kuliah;
		}

		return $get;

	}
	public function getNamaMahasiswa($nim)
	{
		# code...
		$where = array(
			'NIM' => $nim		
		);
		$mahasiswa = $this->m_kues->get_data($where,'tmst_mahasiswa')->result();

		foreach ($mahasiswa as $m) {
			# code...
			$get = $m->Nama_mahasiswa;
		}

		return $get;

	}
	public function cekKues($nim, $ta, $kddosen, $kdmakul)
	{
		# code...
		$where = array(
			'nim' => $nim,
			'ta' => $ta,
			'kd_dosen' => $kddosen,
			'kd_makul'=> $kdmakul		
		);
		$ta = $this->m_kues->get_data($where,'tbl_kues_mhsdsn')->num_rows();

		return $ta;

	}
	public function kues_mhdsn()
	{
		$where = array(
			'id_ta' => '1'		
		);
		$ta = $this->m_kues->get_data($where,'tbl_ta')->result();
		foreach ($ta as $row) {
			$getTa = $row->ta;
		}
		$data['ta'] = $getTa;
		$this->load->view('header');
		$this->load->view('kues/kues_mhdsn',$data);
		$this->load->view('footer');
	}
	public function kues_mhdsn_cek()
	{
		$data['kues'] = $this; 
		$where = array(
			'id_ta' => '1'		
		);
		$ta = $this->m_kues->get_data($where,'tbl_ta')->result();

		foreach ($ta as $row) {
			$getTa = $row->ta;
		}
		$data['ta'] = $getTa;
		
		$nim  = $this->input->post('nim');
		$prodi  = $this->input->post('prodi');

		//get datadiri
		$dimana = array(
			'tmst_mahasiswa.NIM' => $nim		
		);
		$datadiri = $this->m_kues->get_datadiri_join_where_nim($dimana)->result();

		foreach ($datadiri as $dd) {
			$getNama 	= $dd->nama;
			$getNim 	= $dd->nim;
			$getKelas 	= $dd->kelas;
			$getProdi 	= $dd->prodi;
		}

		$data['nama'] 	= $getNama;
		$data['nim'] 	= $getNim;
		$data['kelas'] 	= $getKelas;
		$data['prodi'] 	= $getProdi;

		//get makul per tahun ajaran	
		$where2 = array(
		//'tran_aktivitas_mengajar_dosen.thsmstrakd' => $getTa,
		'tmst_mahasiswa.NIM' => $nim,
		'tran_aktivitas_mengajar_dosen.Kode_program_studi' => $prodi,

		);

		$select = $this->m_kues->get_data_join_where_nim_prodi($where2)->result();
		$data['select'] = $select;

		$this->load->view('header');
		$this->load->view('kues/kues_mhdsn',$data);
		$this->load->view('kues/kues_mhdsn_cek',$data);
		$this->load->view('footer');
	}
	public function kues_mhdsn_isi()
	{
		# code...
		// get ta per tahun ajaran

		// $where = array(
		// 	'id_ta' => '1'		
		// );
		// $ta = $this->m_kues->get_data($where,'tbl_ta')->result();

		// foreach ($ta as $row) {
		// 	$getTa = $row->ta;
		// }
		// $data['ta'] = $getTa;


		//. get from url
		$nim =  $this->uri->segment(3);
  		$kode_prodi =  $this->uri->segment(4);
  		$kode_matkul =  $this->uri->segment(5);
  		$kode_dosen =  $this->uri->segment(6);

  		//get ta semua tahun ajaran
  		$wheresss = array(
			'NIM' => $nim,
			'Kode_mata_kuliah'	=> $kode_matkul	
		);
		$ta = $this->m_kues->get_data($wheresss,'tran_nilai_semester_mhs')->result();

		foreach ($ta as $row) {
			$getTa = $row->thsmstrnlm;
		}
		$data['ta'] = $getTa;

  		//get makul per tahun ajaran	
		$where2 = array(
		'tran_aktivitas_mengajar_dosen.thsmstrakd' => $getTa,
		'tmst_mahasiswa.NIM' => $nim,
		'tran_aktivitas_mengajar_dosen.Kode_program_studi' => $kode_prodi,

		);

		$select = $this->m_kues->get_data_join_where_nim_prodi($where2)->result();
		$data['select'] = $select;
		foreach ($select as $sel) {
			# code...
			$prodi = $sel->kode_prodi;
		}

		//get fak, nama dosen dan nama matkul
		$data['fak'] = $this->getFakultas($prodi);
		$data['kode_dosen'] = $kode_dosen;
		$data['nama_dosen'] = $this->getNamaDosen($kode_dosen);
		$data['kode_matkul'] = $kode_matkul;
		$data['nama_matkul'] = $this->getNamaMatkul($kode_matkul);
		$data['kode_prodi'] = $prodi;

		$this->load->view('header');
		$this->load->view('kues/kues_mhdsn',$data);
		$this->load->view('kues/kues_mhdsn_isi',$data);
		$this->load->view('footer');

	}
	public function kues_mhdsn_proses()
	{
		# code...
		// $this->form_validation->set_rules('kerapian', 'kerapian', 'required');
		$this->form_validation->set_rules('md_a1', 'md_a1', 'required');
		$this->form_validation->set_rules('md_a2', 'md_a2', 'required');
		$this->form_validation->set_rules('md_a3', 'md_a3', 'required');

		$this->form_validation->set_rules('md_b1', 'md_b1', 'required');
		$this->form_validation->set_rules('md_b2', 'md_b2', 'required');
		$this->form_validation->set_rules('md_b3', 'md_b3', 'required');

		$this->form_validation->set_rules('md_c1', 'md_c1', 'required');
		$this->form_validation->set_rules('md_c2', 'md_c2', 'required');
		$this->form_validation->set_rules('md_c3', 'md_c3', 'required');

		$this->form_validation->set_rules('md_d1', 'md_d1', 'required');
		$this->form_validation->set_rules('md_d2', 'md_d2', 'required');
		$this->form_validation->set_rules('md_d3', 'md_d3', 'required');

		$this->form_validation->set_rules('md_e1', 'md_e1', 'required');
		$this->form_validation->set_rules('md_e2', 'md_e2', 'required');
		$this->form_validation->set_rules('md_e3', 'md_e3', 'required');
		

		if ($this->form_validation->run() != false) {
			$data = array(
			'nim'  		=> $this->input->post('nim'),
			'fak'  		=> $this->input->post('fak'),
			'prodi'  	=> $this->input->post('prodi'),
			'kd_dosen'  => $this->input->post('kode_dosen'),
			'kd_makul'  => $this->input->post('kode_matkul'),

			'md_a1'  	=> $this->input->post('md_a1'),
			'md_a2'  	=> $this->input->post('md_a2'),
			'md_a3'  	=> $this->input->post('md_a3'),

			'md_b1'  	=> $this->input->post('md_b1'),
			'md_b2'  	=> $this->input->post('md_b2'),
			'md_b3'  	=> $this->input->post('md_b3'),

			'md_c1'  	=> $this->input->post('md_c1'),
			'md_c2'  	=> $this->input->post('md_c2'),
			'md_c3'  	=> $this->input->post('md_c3'),

			'md_d1'  	=> $this->input->post('md_d1'),
			'md_d2'  	=> $this->input->post('md_d2'),
			'md_d3'  	=> $this->input->post('md_d3'),

			'md_e1'  	=> $this->input->post('md_e1'),
			'md_e2'  	=> $this->input->post('md_e2'),
			'md_e3'  	=> $this->input->post('md_e3'),
			
			'ta'  		=> $this->input->post('ta')
		   );
			$res = $this->m_kues->input_data($data,'tbl_kues_mhsdsn');
		 	if($res==true)
			 {
				$this->session->set_flashdata('error', "<b>Error, Proses pengisian kuesioner anda gagal</b>");
			 }else{
				 $this->session->set_flashdata('success', "<b>Selamat, pengisian kuesioner berhasil diproses</b>");  
			 }

			 //after input
			 $lastid = $this->db->insert_id();
			 $wherez = array(
			 	'id_kues_mhdsn' => $lastid
			 );
			 $select_back = $this->m_kues->get_data($wherez,'tbl_kues_mhsdsn')->result();

			foreach ($select_back as $sb) {
				$nim 	= $sb->nim;
				$prodi 	= $sb->prodi;
				$ta 	= $sb->ta;
			}

			$datax['nama'] 		= $this->getNamaMahasiswa($nim);
			$datax['nim'] 		= $nim;
			$datax['kelas'] 	= $this->input->post('kelas');
			$datax['prodi'] 	= $prodi;
			$datax['ta'] 		= $ta;
			$datax['kues'] 		= $this;

			//get makul per tahun ajaran	
			$where2 = array(
			'tran_aktivitas_mengajar_dosen.thsmstrakd' => $ta,
			'tmst_mahasiswa.NIM' => $nim,
			'tran_aktivitas_mengajar_dosen.Kode_program_studi' => $prodi,

			);

			$select = $this->m_kues->get_data_join_where_nim_prodi($where2)->result();
			$datax['select'] = $select;
			$this->load->view('header');
			$this->load->view('kues/kues_mhdsn',$datax);
			$this->load->view('kues/kues_mhdsn_cek',$datax);
			$this->load->view('footer');
		}else{
			 //after input else
			$datax['nama'] 		= $this->getNamaMahasiswa($nim);
			$datax['nim'] 		= $nim;
			$datax['kelas'] 	= $this->input->post('kelas');
			$datax['prodi'] 	= $prodi;
			$datax['ta'] 		= $ta;
			$datax['kues'] 		= $this;

			//get makul per tahun ajaran	
			$where2 = array(
			'tran_aktivitas_mengajar_dosen.thsmstrakd' => $ta,
			'tmst_mahasiswa.NIM' => $nim,
			'tran_aktivitas_mengajar_dosen.Kode_program_studi' => $prodi,

			);

			$select = $this->m_kues->get_data_join_where_nim_prodi($where2)->result();
			$datax['select'] = $select;
			$this->load->view('header');
			$this->load->view('kues/kues_mhdsn',$datax);
			$this->load->view('kues/kues_mhdsn_cek',$datax);
			$this->load->view('footer');
		}
	}
	public function kues_mhlem()
	{
		# code...
		$this->load->view('header');
		$this->load->view('kues/kues_mhlem');
		$this->load->view('footer');
	}
	public function kues_tenlem()
	{
		# code...
		$this->load->view('header');
		$this->load->view('kues/kues_tenlem');
		$this->load->view('footer');
	}
	public function kues_dsnlem()
	{
		# code...
		$this->load->view('header');
		$this->load->view('kues/kues_dsnlem');
		$this->load->view('footer');
	}

}

/* End of file kues.php */
/* Location: ./application/controllers/kues.php */