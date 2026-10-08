<script>
$(document).ready(function() {

    var tableSel = '#example31082023';
    var table;

    // Inisialisasi DataTables (dipakai ulang setiap kali tabel dimuat ulang)
    function initTable() {
        return $(tableSel).DataTable({
            paging: true,
            pageLength: 20,
            lengthMenu: [[10, 20, 50, 100], [10, 20, 50, 100]], // 20 harus ada di menu agar dropdown "Show" tidak kosong
            lengthChange: true,
            searching: true,
            ordering: true
        });
    }

    // Muat ulang tabel dari server TANPA merusak DataTables
    function reloadTable() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url('ppk/mon_pradadata'); ?>',
            data: { year: $('#year').val(), program_studi: $('#program_studi').val() },
            success: function(response) {
                var keyword = table.search();          // simpan kata kunci pencarian
                table.destroy();                       // kembalikan <table> ke kondisi semula
                $(tableSel).replaceWith(response);     // ganti elemen <table> lama (BUKAN isinya)
                table = initTable();                   // init ulang DataTables pada tabel baru
                if (keyword) { table.search(keyword).draw(); } // hapus baris ini jika pencarian tidak perlu dipertahankan
            }
        });
    }

    table = initTable();

    // Filter tahun / program studi
    $('#filter-form').submit(function(e) {
        e.preventDefault();
        reloadTable();
    });

    // Tombol Tambah (event didelegasikan ke document supaya tetap hidup setelah tabel diganti)
    $(document).on('click', tableSel + ' .add-button', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url('ppk/mon_pradaadd/'); ?>' + id,
            type: 'GET',
            success: function(data) {
                var p = JSON.parse(data);
                $('#addNim').val(p.nim);
                $('#addNama').val(p.nama);
                $('#addTmptLahir').val(p.tl);
                $('#addTglLahir').val(p.tgll);
                $('#addAlamat').val(p.alamat);
                if (p.jk === 'L') { $('#addjnsklmn').val('Laki-laki'); }
                else if (p.jk === 'P') { $('#addjnsklmn').val('Perempuan'); }
                $('input[name="statprada"]').prop('checked', false);
                if (p.status_prada === 'sudah' || p.status_prada === 'belum') {
                    $('input[name="statprada"][value="' + p.status_prada + '"]').prop('checked', true);
                }
                $('#addKetPrada').val(p.ket_prada);
                $('#addModal').modal('show');
            }
        });
    });

    // Tombol Edit
    $(document).on('click', tableSel + ' .edit-button', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url('ppk/mon_pradaedit/'); ?>' + id,
            type: 'GET',
            success: function(data) {
                var p = JSON.parse(data);
                $('#editidmon').val(p.id_mon);
                $('#editNim').val(p.nim);
                $('#editNama').val(p.nama);
                $('#editTmptLahir').val(p.tl);
                $('#editTglLahir').val(p.tgll);
                $('#editAlamat').val(p.alamat);
                if (p.jk === 'L') { $('#editjnsklmn').val('Laki-laki'); }
                else if (p.jk === 'P') { $('#editjnsklmn').val('Perempuan'); }
                $('input[name="estatprada"]').prop('checked', false);
                if (p.status_prada === 'sudah' || p.status_prada === 'belum') {
                    $('input[name="estatprada"][value="' + p.status_prada + '"]').prop('checked', true);
                }
                $('#editKetPrada').val(p.ket_prada);
                $('#editModal').modal('show');
            }
        });
    });

    // Simpan Tambah
    $('#saveAdd').click(function() {
        $.ajax({
            url: '<?php echo base_url('ppk/mon_pradaaddp'); ?>',
            type: 'POST',
            data: $('#addForm').serialize(),
            success: function(response) {
                if (response == 'sukses') {
                    $('#addModal').modal('hide');
                    reloadTable();
                } else {
                    alert('Gagal menambahkan data baru.');
                }
            }
        });
    });

    // Simpan Edit
    $('#saveEdit').click(function() {
        $.ajax({
            url: '<?php echo base_url('ppk/mon_pradaeditp'); ?>',
            type: 'POST',
            data: $('#editForm').serialize(),
            success: function(response) {
                if (response == 'sukses') {
                    $('#editModal').modal('hide');
                    reloadTable();
                } else {
                    alert('Gagal melakukan edit data baru.');
                }
            }
        });
    });

});
</script>