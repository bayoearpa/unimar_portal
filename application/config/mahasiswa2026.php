<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 | Konfigurasi menu baru mahasiswa (tabel akhiran _2026).
 | Semua menu dijalankan oleh satu controller: Mahasiswa2026.
 |   Tampil form : mahasiswa2026/tampil/<kunci_menu>
 |   Simpan form : mahasiswa2026/simpan/<kunci_menu>
 |   Simpan lapgiat: mahasiswa2026/simpan_lapgiat/<kunci_menu>
 | Kunci menu: prada, lapgiat_prada, turun_prada, lapgiat_pkl, turun_pkl, ujian_skripsi
 */

// ---------------------------------------------------------------
// PENGATURAN UMUM  (SESUAIKAN dengan portal Anda)
// ---------------------------------------------------------------
// Folder fisik upload. Hasil akhir: <upload_base>/<folder_menu>/<file>
// base_url portal = https://portal.unimar-amni.ac.id/v1 , jadi /v1/assets/monitoring/<nama>/
// di URL = <folder index.php>/assets/monitoring/<nama>/ di server (sama seperti ./assets/monitoring/laponboard/ yang sudah ada).
$config['upload_base']     = FCPATH . 'assets/monitoring/';
// Bagian URL (dipakai base_url()) untuk link unduh file
$config['upload_url']      = 'assets/monitoring/';
// Folder file format yang bisa diunduh mahasiswa (nama file dicari otomatis dengan ekstensi apa pun)
$config['download_dir']    = FCPATH . 'assets/download/';
$config['download_url']    = 'assets/download/';
$config['upload_types']    = 'pdf|jpg|jpeg|png';
$config['upload_max_kb']   = 5120;          // 5 MB per file
// Session login mahasiswa portal: 'user' = NIM, 'status' = 'login' (lihat Mahasiswa::login)
$config['session_nim']     = 'user';
$config['login_url']       = 'mahasiswa?pesan=belumlogin';

// ---------------------------------------------------------------
// AKSES PRODI (Kode_program_studi dari tmst_program_studi)
// ---------------------------------------------------------------
$prodi_prada = ['92403', '92402', '92401'];   // Nautika, Teknika, KPN
// MPLM (D4) + semua S1: Bisnis Digital, Transportasi, Perdagangan Internasional,
// Teknik Transportasi Laut, Teknik Mesin, Teknik Keselamatan
$prodi_pkl   = ['63317', '61209', '61201', '94205', '21207', '21201', '32204'];

// ---------------------------------------------------------------
// ATURAN BERSAMA
// ---------------------------------------------------------------
$hp   = 'trim|required|numeric|min_length[8]|max_length[15]';
$tgl  = 'trim|required|regex_match[/^\d{4}-\d{2}-\d{2}$/]';
$dsn  = 'trim|required|max_length[10]';
$nilai = 'trim|required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]';

$perusahaan = [
    ['name' => 'nama_perusahaan',   'label' => 'Nama Perusahaan',   'type' => 'text',     'rules' => 'trim|required|max_length[255]'],
    ['name' => 'alamat_perusahaan', 'label' => 'Alamat Perusahaan', 'type' => 'textarea', 'rules' => 'trim|required'],
    ['name' => 'telp_perusahaan',   'label' => 'Telp Perusahaan',   'type' => 'tel',      'rules' => 'trim|required|numeric|min_length[6]|max_length[20]'],
];

$config['menus'] = [

    // 1. PRADA ----------------------------------------------------
    'prada' => [
        'title'  => 'Prada',
        'type'   => 'form',
        'table'  => 'tbl_prada_2026',
        'prodi'  => $prodi_prada,
        'fields' => array_merge(
            [
                ['name' => 'no_hp',      'label' => 'No. HP',           'type' => 'tel', 'rules' => $hp],
                ['name' => 'hp_darurat', 'label' => 'Nomor HP Darurat', 'type' => 'tel', 'rules' => $hp],
                ['name' => 'hp_aktif',   'label' => 'Nomor HP Aktif',   'type' => 'tel', 'rules' => $hp],
            ],
            $perusahaan,
            [
                ['name' => 'dosbing1', 'label' => 'Dosen Pembimbing 1', 'type' => 'dosen', 'rules' => $dsn],
                ['name' => 'dosbing2', 'label' => 'Dosen Pembimbing 2', 'type' => 'dosen', 'rules' => $dsn],
                ['name' => 'file_signon', 'label' => 'Upload Sign On Prada', 'type' => 'file', 'folder' => 'prada_signon'],
            ]
        ),
    ],

    // 2. LAPGIAT PRADA (default 4 bulan; Ketatalaksanaan 6 bulan) ---
    'lapgiat_prada' => [
        'title'       => 'LapGiat Prada',
        'type'        => 'lapgiat',
        'table'       => 'tbl_lapgiat_prada_2026',
        'prodi'       => $prodi_prada,
        'bulan'       => 4,
        'bulan_prodi' => ['92401' => 6],   // KPN / Ketatalaksanaan
        'folder'      => 'lapgiatprada',
        'download'    => [
            ['label' => 'Download Format Laporan Bulanan Prada', 'file' => 'Format_laporan_bulanan_prada'],
        ],
    ],

    // 3. TURUN PRADA ----------------------------------------------
    'turun_prada' => [
        'title'  => 'Turun Prada',
        'type'   => 'form',
        'table'  => 'tbl_turun_prada_2026',
        'prodi'  => $prodi_prada,
        'hook'   => 'mon_prada',   // setelah simpan: insert tbl_mon sekali (nim + status_prada=sudah)
        'download' => [
            ['label' => 'Download Formulir Pengajuan Judul Karya Tulis D3', 'file' => 'Formulir_Pengajuan_Judul_Karya_Tulis_D3'],
        ],
        'fields' => array_merge(
            [
                ['name' => 'no_telp', 'label' => 'No. Telepon', 'type' => 'tel', 'rules' => $hp],
            ],
            $perusahaan,
            [
                ['name' => 'judul_kti', 'label' => 'Judul KTI',          'type' => 'text',  'rules' => 'trim|required|max_length[255]'],
                ['name' => 'dosbing1',  'label' => 'Dosen Pembimbing 1', 'type' => 'dosen', 'rules' => $dsn],
                ['name' => 'dosbing2',  'label' => 'Dosen Pembimbing 2', 'type' => 'dosen', 'rules' => $dsn],
                ['name' => 'file_form_judul', 'label' => 'Upload Form Pengajuan Judul (diketahui Dosbing 1 dan 2)', 'type' => 'file', 'folder' => 'turunprada_formjudul'],
                ['name' => 'file_signoff',  'label' => 'Upload Signoff',        'type' => 'file', 'folder' => 'turunprada_signoff'],
                ['name' => 'file_conduite', 'label' => 'Upload Conduite Prada', 'type' => 'file', 'folder' => 'turunprada_conduite'],
                ['name' => 'file_humas',    'label' => 'File Humas',            'type' => 'file', 'folder' => 'turunprada_humas'],
            ]
        ),
    ],

    // 4. LAPGIAT PKL (6 bulan) ------------------------------------
    'lapgiat_pkl' => [
        'title'  => 'LapGiat PKL',
        'type'   => 'lapgiat',
        'table'  => 'tbl_lapgiat_pkl_2026',
        'prodi'  => $prodi_pkl,
        'bulan'  => 6,
        'folder' => 'lapgiatpkl',
    ],

    // 5. TURUN PKL ------------------------------------------------
    'turun_pkl' => [
        'title'  => 'Turun PKL',
        'type'   => 'form',
        'table'  => 'tbl_turun_pkl_2026',
        'prodi'  => $prodi_pkl,
        'fields' => array_merge(
            [
                ['name' => 'no_hp', 'label' => 'No. HP', 'type' => 'tel', 'rules' => $hp],
            ],
            [
                ['name' => 'nama_perusahaan',   'label' => 'Nama Perusahaan (Tempat PKL)',  'type' => 'text',     'rules' => 'trim|required|max_length[255]'],
                ['name' => 'alamat_perusahaan', 'label' => 'Alamat Tempat PKL',             'type' => 'textarea', 'rules' => 'trim|required'],
                ['name' => 'telp_perusahaan',   'label' => 'No. Telepon Tempat PKL',        'type' => 'tel',      'rules' => 'trim|required|numeric|min_length[6]|max_length[20]'],
            ],
            [
                ['name' => 'judul',               'label' => 'Judul',                              'type' => 'text',   'rules' => 'trim|required|max_length[255]'],
                ['name' => 'dosbing_pkl_teknik',  'label' => 'Dosbing PKL Fakultas Teknik',        'type' => 'dosen',  'rules' => 'trim|max_length[10]'],
                ['name' => 'dosbing_pkl_feb',     'label' => 'Dosbing PKL Fakultas Ekonomi Bisnis', 'type' => 'dosen', 'rules' => 'trim|max_length[10]'],
                ['name' => 'nilai_konduite',      'label' => 'Nilai Konduite',                     'type' => 'number', 'rules' => $nilai],
                ['name' => 'nilai_bimbingan_pkl', 'label' => 'Nilai Bimbingan PKL',                'type' => 'number', 'rules' => $nilai],
                ['name' => 'file_berkas',  'label' => 'Scan PDF Berkas Turun PKL (Surat On Off dan Konduite Nilai dalam 1 file)', 'type' => 'file', 'folder' => 'turunpkl_berkas'],
                ['name' => 'file_signon',  'label' => 'Sign On',    'type' => 'file', 'folder' => 'turunpkl_signon'],
                ['name' => 'file_signoff', 'label' => 'Sign Off',   'type' => 'file', 'folder' => 'turunpkl_signoff'],
                ['name' => 'file_humas',   'label' => 'File Humas', 'type' => 'file', 'folder' => 'turunpkl_humas'],
            ]
        ),
    ],

    // 6. PEMBERKASAN UJIAN SKRIPSI --------------------------------
    'ujian_skripsi' => [
        'title'  => 'Pemberkasan Ujian Skripsi',
        'type'   => 'form',
        'table'  => 'tbl_ujian_skripsi_2026',
        'prodi'  => $prodi_pkl,
        'fields' => [
            ['name' => 'no_hp',         'label' => 'No. HP',             'type' => 'tel',    'rules' => $hp],
            ['name' => 'dosbing1',      'label' => 'Dosen Pembimbing 1', 'type' => 'dosen',  'rules' => $dsn],
            ['name' => 'dosbing2',      'label' => 'Dosen Pembimbing 2', 'type' => 'dosen',  'rules' => $dsn],
            ['name' => 'dosen_penguji', 'label' => 'Dosen Penguji',      'type' => 'dosen',  'rules' => $dsn],
            ['name' => 'judul',         'label' => 'Judul',              'type' => 'text',   'rules' => 'trim|required|max_length[255]'],
            ['name' => 'nilai_proposal', 'label' => 'Nilai Proposal (wajib ditulis dengan angka)', 'type' => 'number', 'rules' => $nilai],
            ['name' => 'nilai_skripsi',  'label' => 'Nilai Skripsi (wajib ditulis dengan angka)',  'type' => 'number', 'rules' => $nilai],
            ['name' => 'file_kliring_proposal', 'label' => 'PDF Scan Berkas Kliring Ujian Proposal Skripsi', 'type' => 'file', 'folder' => 'ujianskripsi_kliring'],
        ],
    ],
];
