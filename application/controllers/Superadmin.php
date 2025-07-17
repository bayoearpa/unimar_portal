<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'administrasi?pesan=belumlogin');
		}elseif ($this->session->userdata('level') != "69") {
			# code...
			redirect(base_url().'administrasi?pesan=salahkamar');
		}
		$this->load->model('m_portal');
	}

	public function index()
	{
		$this->load->view('superadmin/header');
		$this->load->view('superadmin/index');
		$this->load->view('superadmin/footer');
	}

	///////////////////////////////////////////////////// SET KELAS ////////////////////////////////////////////
	public function get_edit_kelas($id)
	{
		# code...
		// Ambil data berdasarkan ID dari model Anda
        $data = $this->m_portal->get_data_tkbi_kelas($id); // Gantilah 'get_data_by_id' dengan metode yang sesuai dalam model Anda

        // Konversi data ke format JSON dan kirimkan ke view
        echo json_encode($data);
	}
	public function cekstatus_tkbi_periode($status)
	{
		# code...
		$where = array(
				'status' => $status,
			);
		$data = $this->m_portal->get_data($where, 'diklat_tkbi_kelas')->num_rows();

		return $data;
	}
	public function set_kelas()
	{
		$status = "belum";
		//cek periode kelas
		$data['cek_periode'] = $this->cekstatus_tkbi_periode($status);
		$data['kelas'] = $this->m_portal->get_data_all('diklat_tkbi_kelas')->result();
		$this->load->view('superadmin/header');
		$this->load->view('superadmin/set_kelas',$data);
		$this->load->view('superadmin/footer');
		$this->load->view('superadmin/set_kelas_js');
	}
	 public function set_kelas_edit()
	{
		# code...
		$id_tkbi_kelas = $this->input->post('id_tkbi_kelas');
		$periode_kelas = $this->input->post('periode_kelas');
		$status = $this->input->post('status');
        $waktu_pelaksanaan = $this->input->post('waktu_pelaksanaan');

        //get pembayaran detail
		
        	$where = array(
				'id_tkbi_kelas' => $id_tkbi_kelas
			);
			$data = array(
                'periode_kelas' => $periode_kelas,
                'status' => $status,
                'waktu_pelaksanaan' => date('Y-m-d', strtotime($waktu_pelaksanaan)),
            );
			$proses = $this->m_portal->update_data2($where,$data,'diklat_tkbi_kelas');
			if ($proses) {
	            echo 'sukses';
	        } else {
	            echo 'gagal edit data';
	        }
      
    }
    public function export_kelas()
    {
    	# code...
    	$data['kelas'] = $this->m_portal->get_data_all('diklat_tkbi_kelas')->result();
    	$this->load->view('superadmin/header');
		$this->load->view('superadmin/export_kelas',$data);
		$this->load->view('superadmin/footer');
		$this->load->view('superadmin/export_kelas_js');
    }
    public function preview_export()
    {
        // Ambil data dari request POST
        $kelas = $this->input->post('kelas');
        // $gelombang = $this->input->post('gelombang');

        // $data['koperasi'] = $this; // Jika diperlukan di dalam view


         $where = array(
                'diklat_tkbi_peserta.id_tkbi_kelas' => $kelas,
                'diklat_tkbi_pembayaran.status_bayar' => 'sudah',
            );

            // Siapkan data untuk view
            $data['frm_kelas'] = $kelas;

        // Ambil data dari model
        $data['results'] = $this->m_portal->get_data_join_tkbi($where)->result();

        // Load the view with the data, returning the HTML string (no headers or footers)
        $this->load->view('superadmin/preview_export', $data);
    }
    public function export_proses()
	{
		# code...
		// Load necessary models and libraries here
        // Fetch data from the database
        $kelas = $this->input->post('kelas');

        $where = array(
                'diklat_tkbi_peserta.id_tkbi_kelas' => $kelas,
                'diklat_tkbi_pembayaran.status_bayar' => 'sudah',
            );
         // Ambil data dari model
        $data['results'] = $this->m_portal->get_data_join_tkbi($where);

        // Load PHPExcel
        // Load plugin PHPExcel nya
	    ob_start();
	    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        $this->load->library('PHPExcel');
        
        // Create a new PHPExcel object
        $objPHPExcel = new PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("UNIMAR AMNI SEMARANG")
                                     ->setLastModifiedBy("UNIMAR AMNI SEMARANG")
                                     ->setTitle("Peserta English Achievement")
                                     ->setSubject("Peserta English Achievement")
                                     ->setDescription("Peserta English Achievement");

        // Add a worksheet
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('Peserta English Achievement');

        // Set headers
        // $objPHPExcel->getActiveSheet()->setCellValue('A1', 'PESERTA TES KOMPETENSI');
        // $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

        // $objPHPExcel->getActiveSheet()->setCellValue('A2', 'UNIMAR AMNI SEMARANG');
        // $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);



        // Fetch Prodi from tbl_catar_2024

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'NOMOR PESERTA');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'NAMA LENGKAP PESERTA');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'KELOMPOK');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'EMAIL');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'KODE AKSES');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'TAGS');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'NO WA');

        // Loop through the data and populate the worksheet
        $row = 2;
        foreach ($data['results'] as $result) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $result->nim);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $result->nama_mhs);
            $objPHPExcel->getActiveSheet()->setCellValue('c' . $row, $result->nm_prodi);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $result->email);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $result->kode_akses);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . '');
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $result->no_wa);


         

            $row++;
        }

        // Save Excel file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $filename = 'Peserta TKBI.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $objWriter->save('php://output');
	}
	///////////////////////////////////////////////////// ./SET KELAS ////////////////////////////////////////////

}

/* End of file Superadmin.php */
/* Location: ./application/controllers/Superadmin.php */