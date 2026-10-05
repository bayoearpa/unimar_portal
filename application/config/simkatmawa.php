<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * KONFIGURASI SIMKATMAWA
 * Sumber: dokumentasi Postman SIMKATMAWA (Login, Prestasi Mandiri, Sertifikasi).
 * Semua endpoint = POST, body JSON, Authorization: Bearer <token>.
 */

$level_opts = [
    'KAB'  => 'Kabupaten',
    'PROV' => 'Provinsi',
    'NAS'  => 'Nasional',
    'INT'  => 'Internasional',
];

// Pada dokumentasi tidak disebutkan mana yang wajib; "required" di bawah adalah
// validasi ringan sisi portal. Validasi final tetap dari API (pesannya ditampilkan).
$groups = [
    'mahasiswa' => [
        'label' => 'Mahasiswa', 'min' => 1,
        'fields' => [
            ['name' => 'nim',  'label' => 'NIM',  'type' => 'text', 'required' => TRUE],
            ['name' => 'nama', 'label' => 'Nama', 'type' => 'text', 'required' => TRUE],
        ],
    ],
    'dosen' => [
        'label' => 'Dosen Pembimbing / Pendamping', 'min' => 0,
        'fields' => [
            ['name' => 'nuptk',          'label' => 'NUPTK / NIDN',     'type' => 'text', 'required' => TRUE],
            ['name' => 'nama',           'label' => 'Nama',             'type' => 'text', 'required' => TRUE],
            ['name' => 'url_surat_tugas','label' => 'Link Surat Tugas', 'type' => 'url',  'required' => FALSE],
        ],
    ],
];

$common_tail = [
    ['name' => 'url_peserta',          'label' => 'Link Kejuaraan',                    'type' => 'url',      'required' => FALSE],
    ['name' => 'url_sertifikat',       'label' => 'Link Sertifikat',                   'type' => 'url',      'required' => FALSE],
    ['name' => 'tgl_sertifikat',       'label' => 'Tanggal Sertifikat',                'type' => 'date',     'required' => FALSE],
    ['name' => 'url_foto_upp',         'label' => 'Link Foto / Berkas UPP',            'type' => 'url',      'required' => FALSE],
    ['name' => 'url_dokumen_undangan', 'label' => 'Link Undangan / Dokumen Pendukung', 'type' => 'url',      'required' => FALSE],
    ['name' => 'keterangan',           'label' => 'Keterangan',                        'type' => 'textarea', 'required' => FALSE],
];

// Ekor field Rekognisi: sama dengan common_tail, tetapi url_sertifikat berarti "link rekognisi".
$rekognisi_tail = $common_tail;
foreach ($rekognisi_tail as $i => $f) {
    if ($f['name'] === 'url_sertifikat') { $rekognisi_tail[$i]['label'] = 'Link Rekognisi / Sertifikat'; }
}

$config['simkatmawa'] = [

    'base_url'    => 'https://simkatmawa.kemdiktisaintek.go.id/api',
    'timeout'     => 30,
    'ssl_verify'  => TRUE,       // di XAMPP lokal boleh FALSE hanya untuk uji
    'body_format' => 'json',

    'auth_header' => 'Authorization',
    'auth_prefix' => 'Bearer ',

    'login' => [
        'path'         => '/login',
        'method'       => 'POST',
        'user_field'   => 'email',
        'pass_field'   => 'password',
        'token_path'   => 'token',      // respons: {"success":true,"kode_pt":"..","token":".."}
        'kode_pt_path' => 'kode_pt',
    ],

    'modules' => [

        'prestasi_mandiri' => [
            'title'       => 'Prestasi Mandiri',
            'path'        => '/prestasi-mandiri',
            'enabled'     => TRUE,
            'title_field' => 'lomba',
            'fields'      => array_merge([
                ['name' => 'level', 'label' => 'Level', 'type' => 'select', 'required' => TRUE, 'options' => $level_opts],
                ['name' => 'kategori', 'label' => 'Kategori', 'type' => 'select', 'required' => TRUE, 'options' => [
                    'RISNOV'    => 'Riset dan Inovasi STEM',
                    'RISNOVSSH' => 'Riset dan Inovasi SSH',
                    'SENBUD'    => 'Seni dan Budaya',
                    'OLAHRAGA'  => 'Olahraga',
                    'MINAT'     => 'Minat Khusus',
                ]],
                ['name' => 'lomba',         'label' => 'Nama Lomba / Kompetisi / Kegiatan', 'type' => 'text', 'required' => TRUE],
                ['name' => 'cabang',        'label' => 'Cabang / Bidang Lomba',             'type' => 'text', 'required' => TRUE],
                ['name' => 'penyelenggara', 'label' => 'Penyelenggara',                     'type' => 'text', 'required' => TRUE],
                ['name' => 'peringkat', 'label' => 'Peringkat', 'type' => 'select', 'required' => TRUE, 'options' => [
                    'JUARA1'    => 'Juara 1',
                    'JUARA2'    => 'Juara 2',
                    'JUARA3'    => 'Juara 3',
                    'HARAPAN1'  => 'Harapan 1',
                    'HARAPAN2'  => 'Harapan 2',
                    'HARAPAN3'  => 'Harapan 3',
                    'APRESIASI' => 'Apresiasi Kejuaraan / Penghargaan Tambahan / Juara Umum',
                    'PESERTA'   => 'Peserta',
                ]],
                ['name' => 'jumlah_unit_peserta', 'label' => 'Jumlah Unit Peserta', 'type' => 'number', 'required' => TRUE,
                    'hint' => 'Jumlah PT (level nasional) atau jumlah negara (level internasional).'],
                ['name' => 'kelompok_prestasi', 'label' => 'Kelompok Prestasi', 'type' => 'select', 'required' => TRUE,
                    'options' => ['INDIVIDU' => 'Individu', 'KELOMPOK' => 'Kelompok']],
                ['name' => 'bentuk', 'label' => 'Bentuk Pelaksanaan', 'type' => 'select', 'required' => TRUE,
                    'options' => ['DARING' => 'Daring', 'LURING' => 'Luring']],
            ], $common_tail),
            'groups'      => $groups,
        ],

        'sertifikasi' => [
            'title'       => 'Sertifikasi',
            'path'        => '/sertifikasi',
            'enabled'     => TRUE,
            'title_field' => 'nama',
            'fields'      => array_merge([
                ['name' => 'level',         'label' => 'Level', 'type' => 'select', 'required' => TRUE, 'options' => $level_opts],
                ['name' => 'nama',          'label' => 'Nama Sertifikasi / Kegiatan', 'type' => 'text', 'required' => TRUE],
                ['name' => 'penyelenggara', 'label' => 'Penyelenggara',               'type' => 'text', 'required' => TRUE],
            ], $common_tail),
            'groups'      => $groups,
        ],

        // POST /api/rekognisi (dokumentasi Postman: Rekognisi - Create)
        'rekognisi' => [
            'title'       => 'Rekognisi',
            'path'        => '/rekognisi',
            'enabled'     => TRUE,
            'title_field' => 'nama',
            'fields'      => array_merge([
                ['name' => 'level', 'label' => 'Level', 'type' => 'select', 'required' => TRUE, 'options' => $level_opts],
                ['name' => 'jenis', 'label' => 'Jenis Rekognisi', 'type' => 'select', 'required' => TRUE, 'options' => [
                    'SERKOM'  => 'Sertifikat Kompetensi',
                    'JURIOR'  => 'Juri/Pelatih/Wasit Olahraga',
                    'JURINOR' => 'Juri/Pelatih/Wasit Non Olahraga',
                    'KEYCONF' => 'Keynote speaker conference',
                    'KEYWORK' => 'Keynote speaker workshop/pelatihan/bimbingan teknis',
                    'PAMERAN' => 'Pameran karya seni',
                    'KARYA'   => 'Karya cipta lagu dan/atau seni tari',
                    'BUKU'    => 'Penulis buku',
                    'PATEN'   => 'Paten/Paten Sederhana',
                    'PUB'     => 'Publikasi artikel ilmiah',
                    'DUTA'    => 'Duta (Brand Ambassador)',
                    'PTG'     => 'Produk Teknologi tepat guna',
                    'PSB'     => 'Produk Seni dan Budaya',
                    'PKD'     => 'Produk Kreatif Dunia Usaha dan Industri',
                ]],
                ['name' => 'nama',          'label' => 'Nama Kegiatan / Rekognisi',            'type' => 'text', 'required' => TRUE],
                ['name' => 'penyelenggara', 'label' => 'Institusi Penyelenggara / Mitra Kegiatan', 'type' => 'text', 'required' => TRUE],
            ], $rekognisi_tail),
            'groups'      => $groups,
        ],

    ],
];
