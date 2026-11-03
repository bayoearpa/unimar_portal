<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ppk2026_model extends CI_Model
{
    /** Semua data satu menu + nama mahasiswa + nama prodi (prodi dari tmst_mahasiswa). */
    public function list_data($table)
    {
        return $this->db
            ->select('t.*, m.Nama_mahasiswa, m.Kode_program_studi AS kode_prodi, p.Nama_program_studi AS nama_prodi')
            ->from($table . ' t')
            ->join('tmst_mahasiswa m', 'm.NIM = t.nim', 'left')
            ->join('tmst_program_studi p', 'p.Kode_program_studi = m.Kode_program_studi', 'left')
            ->order_by('t.created_at', 'DESC')
            ->get()
            ->result();
    }

    /** Satu baris data (per NIM) dengan nama mahasiswa dan prodi. */
    public function get_one($table, $nim)
    {
        return $this->db
            ->select('t.*, m.Nama_mahasiswa, p.Nama_program_studi AS nama_prodi')
            ->from($table . ' t')
            ->join('tmst_mahasiswa m', 'm.NIM = t.nim', 'left')
            ->join('tmst_program_studi p', 'p.Kode_program_studi = m.Kode_program_studi', 'left')
            ->where('t.nim', $nim)
            ->limit(1)
            ->get()
            ->row();
    }

    /** Update status dan keterangan laporan per bulan milik satu NIM. */
    public function update_lapgiat($table, $nim, array $data)
    {
        return $this->db->where('nim', $nim)->update($table, $data);
    }
}
