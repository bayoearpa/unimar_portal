<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Halaman PPK untuk hasil input menu Mahasiswa2026.
 * Definisi menu/field dipakai bersama dari application/config/mahasiswa2026.php
 *
 *   ppk2026/data/<kunci>              daftar data (prada, turun_prada, turun_pkl, ujian_skripsi)
 *   ppk2026/lapgiat/<kunci>           daftar + verifikasi laporan (lapgiat_prada, lapgiat_pkl)
 *   ppk2026/detail/<kunci>/<nim>      isi modal detail (AJAX)
 *   ppk2026/lapgiat_cek/<kunci>       isi modal verifikasi (AJAX, POST nim)
 *   ppk2026/lapgiat_update/<kunci>    simpan verifikasi (AJAX, POST)
 */
class Ppk2026 extends CI_Controller
{
    private $key;
    private $cfg;

    // Kolom ringkas yang ditampilkan di tabel daftar (nama field dari config)
    private $kolom = [
        'prada'         => ['nama_perusahaan', 'telp_perusahaan', 'hp_aktif'],
        'turun_prada'   => ['nama_perusahaan', 'judul_kti'],
        'turun_pkl'     => ['nama_perusahaan', 'judul', 'nilai_konduite', 'nilai_bimbingan_pkl'],
        'ujian_skripsi' => ['judul', 'nilai_proposal', 'nilai_skripsi'],
    ];

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url() . 'administrasi?pesan=belumlogin');
        } elseif ($this->session->userdata('level') != "3") {
            redirect(base_url() . 'administrasi?pesan=salahkamar');
        }
        $this->load->helper('url');
        $this->load->model('Ppk2026_model', 'p26');
        $this->load->model('Mahasiswa2026_model', 'm26');
        $this->config->load('mahasiswa2026', TRUE);
    }

    // ------------------------------------------------------------------
    // Halaman
    // ------------------------------------------------------------------
    public function data($key = '')
    {
        $this->_boot($key, 'form');

        $labels = [];
        foreach ($this->cfg['fields'] as $f) {
            $labels[$f['name']] = $f['label'];
        }
        $kolom = [];
        foreach ($this->kolom[$key] as $n) {
            $kolom[$n] = isset($labels[$n]) ? $labels[$n] : $n;
        }

        $data = [
            'key'   => $key,
            'cfg'   => $this->cfg,
            'kolom' => $kolom,
            'rows'  => $this->p26->list_data($this->cfg['table']),
        ];
        $this->_render('ppk/data2026', $data, $key);
    }

    public function lapgiat($key = '')
    {
        $this->_boot($key, 'lapgiat');

        $rows = $this->p26->list_data($this->cfg['table']);
        foreach ($rows as $r) {
            $r->bulan = $this->m26->bulan_untuk($this->cfg, $r->kode_prodi);
        }

        $data = [
            'key'  => $key,
            'cfg'  => $this->cfg,
            'rows' => $rows,
        ];
        $this->_render('ppk/lapgiat2026', $data, $key);
    }

    // ------------------------------------------------------------------
    // AJAX
    // ------------------------------------------------------------------
    public function detail($key = '', $nim = '')
    {
        $this->_boot($key, 'form');
        $row = $this->p26->get_one($this->cfg['table'], $nim);
        if (!$row) {
            echo 'Data tidak ditemukan.';
            return;
        }
        $this->load->view('ppk/detail2026', [
            'cfg'        => $this->cfg,
            'row'        => $row,
            'dosen'      => $this->m26->dosen_list(),
            'upload_url' => $this->config->item('upload_url', 'mahasiswa2026'),
        ]);
    }

    public function lapgiat_cek($key = '')
    {
        $this->_boot($key, 'lapgiat');
        $row = $this->p26->get_one($this->cfg['table'], $this->input->post('nim'));
        if (!$row) {
            echo 'Data tidak ditemukan.';
            return;
        }
        $cfg = $this->cfg;
        $cfg['bulan'] = $this->m26->bulan_untuk($cfg, $row->kode_prodi);
        $this->load->view('ppk/lapgiatcek2026', [
            'cfg'        => $cfg,
            'row'        => $row,
            'upload_url' => $this->config->item('upload_url', 'mahasiswa2026'),
        ]);
    }

    public function lapgiat_update($key = '')
    {
        $this->_boot($key, 'lapgiat');
        $nim = $this->input->post('nim');
        $row = $this->p26->get_one($this->cfg['table'], $nim);
        if (!$row) {
            echo json_encode(['status' => 'error', 'pesan' => 'Data tidak ditemukan.']);
            return;
        }

        $valid = ['proses', 'sudah', 'belum'];
        $data  = [];
        $bulan = $this->m26->bulan_untuk($this->cfg, $row->kode_prodi);
        for ($i = 1; $i <= $bulan; $i++) {
            $st = $this->input->post('status_lapgiat' . $i);
            if (!in_array($st, $valid, TRUE)) {
                $st = $row->{'status_lapgiat' . $i};
            }
            $data['status_lapgiat' . $i] = $st;
            $data['ket_lapgiat' . $i]    = trim((string) $this->input->post('ket_lapgiat' . $i, TRUE));
        }
        $this->p26->update_lapgiat($this->cfg['table'], $nim, $data);

        echo json_encode(['status' => 'success']);
    }

    // ------------------------------------------------------------------
    // Internal
    // ------------------------------------------------------------------
    private function _boot($key, $type)
    {
        $menus = $this->config->item('menus', 'mahasiswa2026');
        if (!isset($menus[$key]) || $menus[$key]['type'] !== $type) {
            show_404();
        }
        $this->key = $key;
        $this->cfg = $menus[$key];
    }

    /** Template PPK: header + sidebar, isi, footer, lalu script halaman. */
    private function _render($view, $data, $key)
    {
        $this->load->view('ppk/header');
        $this->load->view($view, $data);
        $this->load->view('ppk/footer');
        $this->load->view('ppk/js2026', ['key' => $key, 'type' => $data['cfg']['type']]);
    }
}
