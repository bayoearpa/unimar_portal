<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Menu mahasiswa 2026: Prada, LapGiat Prada, Turun Prada,
 * LapGiat PKL, Turun PKL, Pemberkasan Ujian Skripsi.
 * Definisi menu ada di application/config/mahasiswa2026.php
 *
 *   mahasiswa2026/tampil/<kunci>            tampil form / laporan
 *   mahasiswa2026/simpan/<kunci>            simpan form biasa
 *   mahasiswa2026/simpan_lapgiat/<kunci>    unggah laporan satu bulan
 */
class Mahasiswa2026 extends CI_Controller
{
    private $key;
    private $cfg;
    private $nim;
    private $mhs;

    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation', 'upload']);
        $this->load->helper(['url', 'form']);  // 'url' sudah autoload, 'form' belum
        $this->load->database();
        $this->load->model('Mahasiswa2026_model', 'm26');
        $this->config->load('mahasiswa2026', TRUE);
    }

    // ------------------------------------------------------------------
    // Halaman
    // ------------------------------------------------------------------
    public function tampil($key = '')
    {
        $this->_boot($key);
        $this->_tampil();
    }

    public function simpan($key = '')
    {
        $this->_boot($key);
        if ($this->cfg['type'] !== 'form' || $this->input->method() !== 'post') {
            show_404();
        }

        $fields = $this->cfg['fields'];
        $table  = $this->cfg['table'];
        $row    = $this->m26->get_row($table, $this->nim);

        // Validasi (angka: koma diganti titik)
        foreach ($fields as $f) {
            if ($f['type'] === 'file') {
                continue;
            }
            if ($f['type'] === 'number') {
                $_POST[$f['name']] = str_replace(',', '.', (string) $this->input->post($f['name']));
            }
            $this->form_validation->set_rules($f['name'], $f['label'], $f['rules']);
        }
        if ($this->form_validation->run() === FALSE) {
            $this->_tampil();
            return;
        }

        // Kode dosen harus ada di tmst_dosen
        $errors = [];
        $dosen  = $this->m26->dosen_list();
        foreach ($fields as $f) {
            if ($f['type'] !== 'dosen') {
                continue;
            }
            $v = trim((string) $this->input->post($f['name']));
            if ($v !== '' && !isset($dosen[$v])) {
                $errors[] = $f['label'] . ' tidak valid.';
            }
        }

        // Upload file (wajib pada pengisian pertama, opsional saat ubah data)
        $uploaded = [];
        foreach ($fields as $f) {
            if ($f['type'] !== 'file') {
                continue;
            }
            $ada = isset($_FILES[$f['name']]) && $_FILES[$f['name']]['error'] !== UPLOAD_ERR_NO_FILE;
            $lama = $row ? trim((string) $row->{$f['name']}) : '';

            if (!$ada) {
                if ($lama === '') {
                    $errors[] = $f['label'] . ' wajib diunggah.';
                }
                continue;
            }

            $res = $this->_upload($f['name'], $f['folder'], $f['name']);
            if ($res['error']) {
                $errors[] = $f['label'] . ': ' . $res['error'];
            } else {
                $uploaded[$f['name']] = ['file' => $res['file'], 'folder' => $f['folder']];
            }
        }
        if ($errors) {
            $this->_hapus_baru($uploaded);
            $this->_tampil($errors);
            return;
        }

        // Susun data
        $db = [];
        foreach ($fields as $f) {
            if ($f['type'] !== 'file') {
                $db[$f['name']] = trim((string) $this->input->post($f['name'], TRUE));
            }
        }
        foreach ($uploaded as $name => $u) {
            $db[$name] = $u['file'];
        }
        $db['kode_program_studi'] = trim($this->mhs->Kode_program_studi);

        // Simpan (+ hook tbl_mon untuk Turun Prada) dalam satu transaksi
        $this->db->trans_start();
        $this->m26->save($table, $this->nim, $db);
        if (!empty($this->cfg['hook']) && $this->cfg['hook'] === 'mon_prada') {
            $this->m26->insert_mon_prada_once($this->nim);
        }
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->_hapus_baru($uploaded);
            $this->_tampil(['Data gagal disimpan. Silakan coba lagi.']);
            return;
        }

        // Hapus file lama yang sudah tergantikan
        foreach ($uploaded as $name => $u) {
            if ($row && trim((string) $row->$name) !== '') {
                $this->_hapus_file($u['folder'], $row->$name);
            }
        }

        $this->session->set_flashdata('m26_ok', 'Data berhasil disimpan.');
        redirect(base_url() . 'mahasiswa2026/tampil/' . $this->key);
    }

    public function simpan_lapgiat($key = '')
    {
        $this->_boot($key);
        if ($this->cfg['type'] !== 'lapgiat' || $this->input->method() !== 'post') {
            show_404();
        }

        $n = (int) $this->input->post('bulan');
        if ($n < 1 || $n > $this->cfg['bulan']) {
            show_404();
        }

        $table = $this->cfg['table'];
        $row   = $this->m26->get_row($table, $this->nim);

        if ($row && $row->{'status_lapgiat' . $n} === 'sudah' && trim((string) $row->{'lapgiat' . $n}) !== '') {
            $this->_tampil(['Laporan bulan ke-' . $n . ' sudah diverifikasi dan tidak dapat diubah.']);
            return;
        }
        if (!isset($_FILES['lapgiat_file']) || $_FILES['lapgiat_file']['error'] === UPLOAD_ERR_NO_FILE) {
            $this->_tampil(['Pilih file laporan bulan ke-' . $n . ' terlebih dahulu.']);
            return;
        }

        $res = $this->_upload('lapgiat_file', $this->cfg['folder'], 'bulan' . $n);
        if ($res['error']) {
            $this->_tampil([$res['error']]);
            return;
        }

        $data = [
            'lapgiat' . $n        => $res['file'],
            'date_lapgiat' . $n   => date('Y-m-d'),
            'status_lapgiat' . $n => 'proses',
            'ket_lapgiat' . $n    => NULL,
        ];
        if (!$this->m26->save($table, $this->nim, $data)) {
            $this->_hapus_file($this->cfg['folder'], $res['file']);
            $this->_tampil(['Laporan gagal disimpan. Silakan coba lagi.']);
            return;
        }

        if ($row && trim((string) $row->{'lapgiat' . $n}) !== '') {
            $this->_hapus_file($this->cfg['folder'], $row->{'lapgiat' . $n});
        }

        $this->session->set_flashdata('m26_ok', 'Laporan bulan ke-' . $n . ' berhasil diunggah.');
        redirect(base_url() . 'mahasiswa2026/tampil/' . $this->key);
    }

    // ------------------------------------------------------------------
    // Internal
    // ------------------------------------------------------------------
    private function _c($k)
    {
        return $this->config->item($k, 'mahasiswa2026');
    }

    /** Cek login, menu valid, dan akses prodi. */
    private function _boot($key)
    {
        $this->nim = $this->session->userdata($this->_c('session_nim'));
        if (!$this->nim || $this->session->userdata('status') !== 'login') {
            redirect(base_url() . $this->_c('login_url'));
        }

        $menus = $this->_c('menus');
        if (!isset($menus[$key])) {
            show_404();
        }
        $this->key = $key;
        $this->cfg = $menus[$key];

        $this->mhs = $this->m26->get_mhs($this->nim);
        if (!$this->mhs || !in_array(trim($this->mhs->Kode_program_studi), $this->cfg['prodi'], TRUE)) {
            show_error('Menu ini tidak tersedia untuk program studi Anda.', 403, 'Akses ditolak');
        }
    }

    private function _tampil(array $errors = [])
    {
        $data = [
            'key'        => $this->key,
            'cfg'        => $this->cfg,
            'mhs'        => $this->mhs,
            'row'        => $this->m26->get_row($this->cfg['table'], $this->nim),
            'errors'     => $errors,
            'upload_url' => $this->_c('upload_url'),
        ];

        if ($this->cfg['type'] === 'form') {
            $data['dosen'] = $this->m26->dosen_list();
            $this->_render('mahasiswa/form2026', $data);
        } else {
            $this->_render('mahasiswa/lapgiat2026', $data);
        }
    }

    /** Template portal mahasiswa (AdminLTE): header + sidebar, isi, footer. */
    private function _render($view, $data)
    {
        $this->load->view('mahasiswa/header');
        $this->load->view($view, $data);
        $this->load->view('mahasiswa/footer');
    }

    /** Unggah satu file ke <upload_base>/<folder>/ . Kembalian: ['file'=>..., 'error'=>...] */
    private function _upload($input, $folder, $prefix)
    {
        $path = rtrim($this->_c('upload_base'), '/') . '/' . $folder . '/';
        if (!is_dir($path) && !@mkdir($path, 0755, TRUE)) {
            return ['file' => NULL, 'error' => 'Folder upload tidak dapat dibuat.'];
        }

        $this->upload->initialize([
            'upload_path'   => $path,
            'allowed_types' => $this->_c('upload_types'),
            'max_size'      => $this->_c('upload_max_kb'),
            'file_name'     => $this->nim . '_' . $prefix . '_' . time(),
            'file_ext_tolower' => TRUE,
            'overwrite'     => FALSE,
        ]);

        if (!$this->upload->do_upload($input)) {
            return ['file' => NULL, 'error' => strip_tags($this->upload->display_errors('', ''))];
        }
        return ['file' => $this->upload->data('file_name'), 'error' => NULL];
    }

    private function _hapus_file($folder, $file)
    {
        $file = basename(trim((string) $file));
        if ($file === '') {
            return;
        }
        @unlink(rtrim($this->_c('upload_base'), '/') . '/' . $folder . '/' . $file);
    }

    private function _hapus_baru(array $uploaded)
    {
        foreach ($uploaded as $u) {
            $this->_hapus_file($u['folder'], $u['file']);
        }
    }
}
