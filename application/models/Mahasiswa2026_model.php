<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa2026_model extends CI_Model
{
    /** Data mahasiswa + nama prodi (join tmst_mahasiswa dan tmst_program_studi). */
    public function get_mhs($nim)
    {
        return $this->db
            ->select('m.NIM, m.Nama_mahasiswa, m.Kode_program_studi, p.Nama_program_studi AS nama_prodi')
            ->from('tmst_mahasiswa m')
            ->join('tmst_program_studi p', 'p.Kode_program_studi = m.Kode_program_studi', 'left')
            ->where('m.NIM', $nim)
            ->limit(1)
            ->get()
            ->row();
    }

    /** Satu baris data menu milik NIM (atau NULL jika belum ada). */
    public function get_row($table, $nim)
    {
        return $this->db->where('nim', $nim)->limit(1)->get($table)->row();
    }

    /** Insert jika belum ada, update jika sudah ada (satu baris per NIM). */
    public function save($table, $nim, array $data)
    {
        $ada = $this->db->where('nim', $nim)->count_all_results($table) > 0;

        if ($ada) {
            unset($data['nim']);
            return $this->db->where('nim', $nim)->update($table, $data);
        }

        $data['nim'] = $nim;
        return $this->db->insert($table, $data);
    }

    /** Daftar dosen untuk dropdown: [Kode_dosen => "Gelar Nama, Gelar"]. */
    public function dosen_list()
    {
        $rows = $this->db
            ->select('Kode_dosen, Nama_dosen, Gelar_akademik_depan, Gelar_akademik_belakang')
            ->where('Kode_dosen !=', '')
            ->order_by('Nama_dosen', 'ASC')
            ->get('tmst_dosen')
            ->result();

        $out = [];
        foreach ($rows as $r) {
            $label = trim(trim((string) $r->Gelar_akademik_depan) . ' ' . trim((string) $r->Nama_dosen));
            $belakang = trim((string) $r->Gelar_akademik_belakang);
            if ($belakang !== '') {
                $label .= ', ' . $belakang;
            }
            $out[trim($r->Kode_dosen)] = $label;
        }
        return $out;
    }

    /**
     * Input ke tbl_mon HANYA SEKALI: nim + status_prada = 'sudah'.
     * Jika NIM sudah punya baris di tbl_mon, tidak ada yang diubah.
     *
     * Hampir semua kolom tbl_mon NOT NULL tanpa default. Agar insert dua kolom
     * ini tidak ditolak strict mode, sql_mode sesi dikosongkan sebentar lalu
     * dikembalikan (kolom lain terisi nilai implisit: '', 0000-00-00, 'none').
     * Struktur tbl_mon tidak diubah.
     */
    public function insert_mon_prada_once($nim)
    {
        if ($this->db->where('nim', $nim)->count_all_results('tbl_mon') > 0) {
            return FALSE;
        }

        $old = $this->db->query('SELECT @@SESSION.sql_mode AS m')->row()->m;
        $this->db->query("SET SESSION sql_mode = ''");
        $ok = $this->db->insert('tbl_mon', ['nim' => $nim, 'status_prada' => 'sudah']);
        $this->db->query('SET SESSION sql_mode = ' . $this->db->escape($old));

        return $ok;
    }
}
