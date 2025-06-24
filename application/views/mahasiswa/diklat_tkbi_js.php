<script type="text/javascript">

$(document).ready(function() {
	// Menyimpan perubahan dengan AJAX
    $('#saveValEdit').click(function() {
        $.ajax({
            url: '<?php echo base_url('mahasiswa/tkbip_bayar'); ?>', // Sesuaikan dengan URL yang sesuai
            type: 'POST',
            data: $('#buktiBayarForm').serialize(),
            success: function(response) {
                if (response == 'sukses') {
                    // Tutup modal setelah data berhasil ditambahkan
                    // $('#valModal').modal('hide');
                    // Muat ulang tabel untuk menampilkan data terbaru
                    // reloadTable();
                    alert('Berhasil menambahkan data baru.');
                } else {
                    // Tampilkan pesan kesalahan jika perlu
                    alert('Gagal menambahkan data baru.');
                }
            }
        });
    });
});
</script>