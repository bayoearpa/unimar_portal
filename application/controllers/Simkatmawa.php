<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Simkatmawa extends CI_Controller
{
    // Level akun portal yang boleh membuka menu ini (1 = Mahatar).
    protected $allowed_levels = ['1'];

    // Method yang boleh dibuka TANPA login SIMKATMAWA. Selain ini wajib login.
    protected $public_methods = ['login', 'logout'];

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url() . 'administrasi?pesan=belumlogin');
        }
        if (!in_array((string) $this->session->userdata('level'), $this->allowed_levels, TRUE)) {
            show_error('Anda tidak memiliki akses ke menu ini.', 403);
        }
        $this->load->library('simkatmawa_api');
        $this->load->model('m_simkatmawa');
        $this->load->helper('form');

        // Semua menu (Prestasi Mandiri, Sertifikasi, Rekognisi, dst.) wajib login SIMKATMAWA.
        $method = strtolower($this->router->fetch_method());
        if (!in_array($method, $this->public_methods, TRUE) && !$this->simkatmawa_api->is_logged_in()) {
            $this->notif_reset();
            $this->notif('warning', 'Silakan login SIMKATMAWA terlebih dahulu untuk membuka menu ini.');
            if ($this->input->method() === 'get') {
                // setelah login, kembali ke menu yang tadi dituju
                $this->session->set_userdata('smw_redirect', current_url());
            }
            redirect(base_url() . 'simkatmawa/login');
        }
    }

    // ---------------- Notifikasi sekali tampil ----------------
    // Disimpan di session lalu ditampilkan oleh mahatar/_notif di header dan LANGSUNG dihapus
    // setelah tampil sekali, jadi hilang begitu pengguna pindah menu. Berbeda dengan flashdata,
    // pesan tidak hilang bila terjadi redirect berantai (belum sempat tampil).
    // Satu pesan per jenis: success | error | warning | info (pesan baru menggantikan yang lama).
    protected function notif($type, $msg)
    {
        $n = $this->session->userdata('smw_notif');
        if (!is_array($n)) { $n = []; }
        $n[$type] = (string) $msg;
        $this->session->set_userdata('smw_notif', $n);
    }

    protected function notif_reset()
    {
        $this->session->unset_userdata('smw_notif');
    }

    protected function render($view, $data = [])
    {
        $data['smw_logged_in'] = $this->simkatmawa_api->is_logged_in();
        $data['smw_user']      = $this->session->userdata('smw_user');
        $data['smw_kode_pt']   = $this->session->userdata('smw_kode_pt');
        $this->load->view('mahatar/header');
        $this->load->view('simkatmawa/' . $view, $data);
        $this->load->view('mahatar/footer');
    }

    /** Ambil modul; jika belum dikonfigurasi tampilkan halaman info dan kembalikan FALSE. */
    protected function usable_module($key)
    {
        $m = $this->simkatmawa_api->module($key);
        if (!$m) { show_404(); }
        if (empty($m['enabled'])) {
            $this->render('belum', ['title' => $m['title']]);
            return FALSE;
        }
        return $m;
    }

    protected function post_only($redirect)
    {
        if ($this->input->method() !== 'post') { redirect($redirect); }
    }

    public function index()
    {
        redirect(base_url() . 'simkatmawa/modul/prestasi_mandiri');
    }

    // ---------------- Login SIMKATMAWA (hanya dibutuhkan saat mengirim) ----------------
    public function login()
    {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('username', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run()) {
                $res = $this->simkatmawa_api->login(
                    $this->input->post('username', TRUE),
                    $this->input->post('password', FALSE)
                );
                $this->notif_reset();
                if ($res['ok']) {
                    $this->notif('success', 'Login SIMKATMAWA berhasil.');
                    $go = $this->session->userdata('smw_redirect');
                    $this->session->unset_userdata('smw_redirect');
                    $prefix = base_url() . 'simkatmawa/';
                    if (!$go || strpos($go, $prefix) !== 0 || strpos($go, $prefix . 'login') === 0) {
                        $go = $prefix . 'modul/prestasi_mandiri';
                    }
                    redirect($go);
                }
                $this->notif('error', $res['error']);
                redirect(base_url() . 'simkatmawa/login');
            }
        }
        $this->render('login', ['title' => 'Login SIMKATMAWA']);
    }

    public function logout()
    {
        $this->simkatmawa_api->logout();
        $this->session->unset_userdata('smw_redirect');
        $this->notif_reset();
        $this->notif('info', 'Anda telah logout dari SIMKATMAWA.');
        redirect(base_url() . 'simkatmawa/login');
    }

    // ---------------- Daftar data lokal ----------------
    public function modul($key)
    {
        $m = $this->usable_module($key);
        if (!$m) { return; }
        $this->render('list', [
            'title'  => $m['title'], 'key' => $key, 'm' => $m,
            'rows'   => $this->m_simkatmawa->by_jenis($key),
            'counts' => $this->m_simkatmawa->counts($key),
        ]);
    }

    public function detail($id)
    {
        $row = $this->m_simkatmawa->get_row($id);
        if (!$row) { show_404(); }
        $m = $this->simkatmawa_api->module($row->jenis);
        if (!$m) { show_404(); }
        $this->render('detail', [
            'title' => 'Detail ' . $m['title'], 'row' => $row, 'm' => $m,
            'payload' => json_decode($row->payload, TRUE),
        ]);
    }

    // ---------------- Input / edit (lokal, tanpa login SIMKATMAWA) ----------------
    public function tambah($key)
    {
        $m = $this->usable_module($key);
        if (!$m) { return; }
        $this->render('form', ['title' => $m['title'], 'key' => $key, 'm' => $m, 'old' => [], 'error' => '', 'id' => NULL]);
    }

    public function edit($id)
    {
        $row = $this->m_simkatmawa->get_row($id);
        if (!$row) { show_404(); }
        $m = $this->usable_module($row->jenis);
        if (!$m) { return; }
        if ($row->status === 'terkirim') {
            $this->notif('error', 'Data yang sudah terkirim tidak dapat diubah dari portal.');
            redirect(base_url() . 'simkatmawa/modul/' . $row->jenis);
        }
        $this->render('form', [
            'title' => $m['title'], 'key' => $row->jenis, 'm' => $m,
            'old' => json_decode($row->payload, TRUE), 'error' => '', 'id' => (int) $row->id,
        ]);
    }

    /** Simpan sebagai draft lokal. $id terisi = ubah data yang sudah ada. */
    public function simpan($key, $id = NULL)
    {
        $m = $this->usable_module($key);
        if (!$m) { return; }
        $this->post_only(base_url() . 'simkatmawa/modul/' . $key);

        $row = NULL;
        if ($id !== NULL) {
            $row = $this->m_simkatmawa->get_row($id);
            if (!$row || $row->jenis !== $key) { show_404(); }
            if ($row->status === 'terkirim') {
                $this->notif('error', 'Data yang sudah terkirim tidak dapat diubah dari portal.');
                redirect(base_url() . 'simkatmawa/modul/' . $key);
            }
        }

        list($payload, $errors) = $this->build_payload($m);
        $this->notif_reset();
        if ($errors) {
            return $this->render('form', [
                'title' => $m['title'], 'key' => $key, 'm' => $m, 'id' => $row ? (int) $row->id : NULL,
                'old' => $this->input->post(NULL, FALSE),
                'error' => implode('<br>', array_map('html_escape', $errors)), 'error_is_html' => TRUE,
            ]);
        }

        $data = [
            'judul'          => isset($payload[$m['title_field']]) ? $payload[$m['title_field']] : '',
            'level'          => isset($payload['level']) ? $payload['level'] : '',
            'tgl_sertifikat' => isset($payload['tgl_sertifikat']) ? $payload['tgl_sertifikat'] : NULL,
            'jml_mhs'        => isset($payload['mahasiswa']) ? count($payload['mahasiswa']) : 0,
            'payload'        => json_encode($payload),
        ];

        if ($row) {
            $data['status']      = 'draft';   // data gagal yang diedit kembali menjadi draft
            $data['error']       = NULL;
            $data['http_status'] = NULL;
            $data['updated_at']  = date('Y-m-d H:i:s');
            $this->m_simkatmawa->update_row($row->id, $data);
            $this->notif('success', 'Perubahan disimpan (draft).');
        } else {
            $data['jenis']      = $key;
            $data['status']     = 'draft';
            $data['id_admin']   = $this->session->userdata('id_admin');
            $data['user']       = $this->session->userdata('user');
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->m_simkatmawa->insert_row($data);
            $this->notif('success', 'Data tersimpan sebagai draft. Belum dikirim ke SIMKATMAWA.');
            if ($this->input->post('lanjut')) {
                redirect(base_url() . 'simkatmawa/tambah/' . $key);
            }
        }
        redirect(base_url() . 'simkatmawa/modul/' . $key);
    }

    public function hapus($id)
    {
        $row = $this->m_simkatmawa->get_row($id);
        if (!$row) { show_404(); }
        $this->post_only(base_url() . 'simkatmawa/modul/' . $row->jenis);
        $this->notif_reset();
        if ($row->status === 'terkirim') {
            $this->notif('error', 'Data yang sudah terkirim tidak dapat dihapus dari portal.');
        } else {
            $this->m_simkatmawa->delete_row($row->id);
            $this->notif('success', 'Data dihapus.');
        }
        redirect(base_url() . 'simkatmawa/modul/' . $row->jenis);
    }

    // ---------------- Kirim ke SIMKATMAWA (satu, terpilih, atau semua) ----------------
    public function kirim($key)
    {
        $m = $this->usable_module($key);
        if (!$m) { return; }
        $back = base_url() . 'simkatmawa/modul/' . $key;
        $this->post_only($back);

        $this->notif_reset();
        $mode = $this->input->post('mode');
        $rows = ($mode === 'semua')
            ? $this->m_simkatmawa->pending($key)
            : $this->m_simkatmawa->pending_by_ids($key, $this->input->post('ids'));

        if (!$rows) {
            $this->notif('error', 'Tidak ada data yang perlu dikirim.');
            redirect($back);
        }

        @set_time_limit(0);
        $ok = 0; $fail = []; $left = 0; $aborted = FALSE;

        foreach ($rows as $i => $r) {
            if ($aborted) { $left++; continue; }

            $payload = json_decode($r->payload, TRUE);
            $res     = $this->simkatmawa_api->request('POST', $m['path'], $payload);

            if ($res['status'] === 401) {   // token berakhir: hentikan, sisanya tetap draft
                $aborted = TRUE; $left++;
                continue;
            }

            if ($res['ok']) {
                $this->m_simkatmawa->update_row($r->id, [
                    'status'      => 'terkirim',
                    'api_id'      => (string) Simkatmawa_api::dot_get($res['data'], 'data.id', ''),
                    'pesan'       => (string) Simkatmawa_api::dot_get($res['data'], 'message', ''),
                    'error'       => NULL,
                    'http_status' => $res['status'],
                    'sent_at'     => date('Y-m-d H:i:s'),
                ]);
                $ok++;
            } else {
                $this->m_simkatmawa->update_row($r->id, [
                    'status'      => 'gagal',
                    'error'       => $res['error'],
                    'http_status' => $res['status'],
                ]);
                $fail[] = '"' . $r->judul . '": ' . $res['error'];
            }
            usleep(250000); // jeda singkat antar request
        }

        if ($ok) {
            $this->notif('success', $ok . ' data berhasil dikirim ke SIMKATMAWA.');
        }
        $msg = [];
        if ($fail) {
            $msg[] = count($fail) . ' data gagal (lihat kolom Status): ' . implode(' | ', array_slice($fail, 0, 5)) . (count($fail) > 5 ? ' | ...' : '');
        }
        if ($aborted) {
            $msg[] = 'Sesi SIMKATMAWA berakhir. ' . $left . ' data belum diproses dan tetap berstatus draft. Silakan login ulang, lalu kirim kembali.';
        }
        if ($msg) { $this->notif('error', implode(' ', $msg)); }

        if ($aborted) { $this->session->set_userdata('smw_redirect', $back); }
        redirect($aborted ? base_url() . 'simkatmawa/login' : $back);
    }

    /** Susun body JSON sesuai dokumentasi + validasi ringan. */
    protected function build_payload($m)
    {
        $payload = []; $errors = [];

        foreach ($m['fields'] as $f) {
            $v = trim((string) $this->input->post($f['name'], FALSE));
            if ($v === '') {
                if (!empty($f['required'])) { $errors[] = $f['label'] . ' wajib diisi.'; }
                continue;
            }
            if ($f['type'] === 'select' && !isset($f['options'][$v])) {
                $errors[] = $f['label'] . ' tidak valid.'; continue;
            }
            if ($f['type'] === 'url' && !filter_var($v, FILTER_VALIDATE_URL)) {
                $errors[] = $f['label'] . ' harus berupa URL yang valid (diawali http:// atau https://).'; continue;
            }
            if ($f['type'] === 'date' && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $v)) {
                $errors[] = $f['label'] . ' harus berformat YYYY-MM-DD.'; continue;
            }
            $payload[$f['name']] = $v;
        }

        foreach ($m['groups'] as $gname => $g) {
            $rows  = $this->input->post($gname, FALSE);
            $clean = [];
            if (is_array($rows)) {
                foreach ($rows as $r) {
                    if (!is_array($r)) { continue; }
                    $row = []; $any = FALSE;
                    foreach ($g['fields'] as $gf) {
                        $val = isset($r[$gf['name']]) ? trim((string) $r[$gf['name']]) : '';
                        if ($val !== '') { $any = TRUE; }
                        $row[$gf['name']] = $val;
                    }
                    if (!$any) { continue; } // baris kosong dilewati
                    foreach ($g['fields'] as $gf) {
                        $val = $row[$gf['name']];
                        if ($val === '' && !empty($gf['required'])) {
                            $errors[] = $g['label'] . ': ' . $gf['label'] . ' wajib diisi.';
                        }
                        if ($val !== '' && $gf['type'] === 'url' && !filter_var($val, FILTER_VALIDATE_URL)) {
                            $errors[] = $g['label'] . ': ' . $gf['label'] . ' bukan URL yang valid.';
                        }
                        if ($val === '') { unset($row[$gf['name']]); }
                    }
                    $clean[] = $row;
                }
            }
            if (count($clean) < $g['min']) {
                $errors[] = 'Minimal ' . $g['min'] . ' data ' . strtolower($g['label']) . ' harus diisi.';
            }
            $payload[$gname] = $clean;
        }

        return [$payload, array_values(array_unique($errors))];
    }
}
