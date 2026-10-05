<?php defined('BASEPATH') OR exit('No direct script access allowed');

/** Data SIMKATMAWA yang disimpan lokal (draft) dan statusnya (draft / terkirim / gagal). */
class M_simkatmawa extends CI_Model
{
    protected $table = 'tbl_simkatmawa';

    public function insert_row($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update_row($id, $data)
    {
        $this->db->where('id', (int) $id)->update($this->table, $data);
    }

    public function delete_row($id)
    {
        $this->db->where('id', (int) $id)->delete($this->table);
    }

    public function get_row($id)
    {
        return $this->db->get_where($this->table, ['id' => (int) $id])->row();
    }

    public function by_jenis($jenis)
    {
        return $this->db->where('jenis', $jenis)->order_by('id', 'DESC')->get($this->table)->result();
    }

    /** Semua data yang belum terkirim (draft + gagal), urut dari yang terlama. */
    public function pending($jenis)
    {
        return $this->db->where('jenis', $jenis)->where('status !=', 'terkirim')
                        ->order_by('id', 'ASC')->get($this->table)->result();
    }

    /** Data terpilih yang belum terkirim (data yang sudah terkirim tidak pernah ikut). */
    public function pending_by_ids($jenis, $ids)
    {
        $ids = array_values(array_filter(array_map('intval', (array) $ids)));
        if (!$ids) { return []; }
        return $this->db->where('jenis', $jenis)->where('status !=', 'terkirim')
                        ->where_in('id', $ids)->order_by('id', 'ASC')->get($this->table)->result();
    }

    public function counts($jenis)
    {
        $out = ['draft' => 0, 'terkirim' => 0, 'gagal' => 0];
        $q = $this->db->select('status, COUNT(*) AS n', FALSE)->where('jenis', $jenis)->group_by('status')->get($this->table);
        foreach ($q->result() as $r) { $out[$r->status] = (int) $r->n; }
        return $out;
    }
}
