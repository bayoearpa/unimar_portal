<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model atau helper jika dibutuhkan
    }

    // Jalur akses: https://domainmu.com/cron/update_status_kelas/RAHASIA123
    public function update_status_tkbi_kelas($token = null)
    {
        // Token rahasia untuk keamanan
        if ($token !== 'RAHASIA180') {
            show_404();
            return;
        }

        // Jalankan update status
        $this->db->query("
            UPDATE diklat_tkbi_kelas
            SET status = 'sudah'
            WHERE CURDATE() >= waktu_pelaksanaan
              AND status != 'sudah'
        ");

        echo "Status berhasil diperbarui.";
    }
}
